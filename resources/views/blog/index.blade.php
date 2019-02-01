@extends('layouts.app')

@section ('content')

    @if ($blogs->count())
    @foreach ($blogs as $blog)
    <div class="card" style="margin-top: 20px;">
        <div class="card-header bg-primary text-light">{{ $blog->title }}</div>
        <div class="card-body">{!! $blog->content !!}</div>
        <div class="card-footer">
            <div class="float-left">
            Created At: {{ $blog->created_at }}
            </div>
            <div class="float-right">
            Sync: {{ $blog->is_sync ? $blog->sync_at : 'false' }}
            </div>
        </div>
    </div>
    @endforeach

    <p>
        {!! $blogs->links() !!}
    </p>

    @else
    <div class="alert alert-danger">
        No Data.
    </div>
    @endif

@endsection