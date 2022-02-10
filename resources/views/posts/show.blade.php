@extends('layouts.app')
@section('content')
    <h3><a href="/posts/{{$post->id}}/edit">{{$post->title}}</a></h3>
    <div class="content">
        <div class="image-container text-center">
            {{--<img src="..." class="rounded" alt="...">--}}
            <img src="{{$post->path}}" class="img-responsive" alt="image">
        </div>

        {{$post->content}}
    </div>
@endsection