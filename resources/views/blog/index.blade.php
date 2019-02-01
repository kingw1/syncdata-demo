@extends('layouts.app')

@section ('content')

    @if ($blogs->count())
    @foreach ($blogs as $blog)
    <div class="card" style="margin-top: 20px;">
        <div class="card-header bg-primary text-light">{{ $blog->title }}</div>
        <div class="card-body">{!! $blog->content !!}</div>
        <div class="card-footer">Created At: {{ $blog->created_at }}</div>
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