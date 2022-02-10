@extends('layouts.app')
@section('content')
    <ul>
        @foreach($posts as $post)
            <li>
                <a href="{{route('posts.show',$post->id)}}">{{$post->title}}</a>
                <ul>
                    <li>
                        {{$post->user->name}}
                    </li>
                </ul>
            </li>
        @endforeach
    </ul>
@endsection