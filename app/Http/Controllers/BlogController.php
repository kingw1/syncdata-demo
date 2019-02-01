<?php

namespace App\Http\Controllers;

use App\Blog;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::orderBy('created_at', 'DESC')->paginate(2);

        return view('blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datas = $request->all();
        $datas['id'] = (string) Str::uuid();
        $datas['created_at'] = date('Y-m-d H:i:s');
        $datas['updated_at'] = date('Y-m-d H:i:s');
        Blog::create($datas);

        return redirect()->route('blog.index');
    }

    public function pushData()
    {
        Blog::where('is_sync', 0)->orderBy('created_at', 'ASC')->chunk(10, function ($blogs) {
            $client = new Client();
            $result = $client->post(config('app.url_sync_data'), ['form_params' => $blogs->toArray()]);
            $response = json_decode($result->getBody(), true);
            if ($response['result']) {
                Blog::whereIn('id', $blogs->pluck('id')->toArray())->update(['is_sync' => 1]);
            }
        });

        return redirect()->back()->with('message-success', 'Sync data completed.');
    }

    public function syncData(Request $request)
    {
        $datas = $request->all();

        if (count($datas) === 0) {
            return response()->json([
                'result' => false,
                'message' => 'no data found.',
            ], 200);
        }

        foreach ($datas as $data) {
            $data['is_sync'] = 1;
            $data['sync_at'] = date('Y-m-d H:i:s');
            Blog::create($data);
        }

        return response()->json([
            'result' => true,
            'message' => 'sync data completed.',
        ], 200);
    }
}
