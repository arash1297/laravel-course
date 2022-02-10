@extends('layouts.app')
@section('content')
    {{--{!! Form::model($post , ['action'=>['App\Http\Controllers\PostsController@update' , $post->id] , 'method'=>'PATCH']) !!}--}}
    {{--<div class="form-group">--}}
    {{--{!! Form::label('title' , 'عنوان : ') !!}--}}
    {{--{!! Form::text('title' , $post->title , ['class'=>'form-control rtl']) !!}--}}
    {{--</div>--}}
    {{--<div class="form-group">--}}
    {{--{!! Form::label('description','محتوا : ') !!}--}}
    {{--{!! Form::textarea('description',$post->content , ['class'=>'form-control']) !!}--}}
    {{--</div>--}}
    {{--<div class="form-group">--}}
    {{--{!! Form::submit('بروز رسانی' , ['class'=>'btn btn-warning']) !!}--}}
    {{--</div>--}}
    {{--{!! Form::close() !!}--}}
    {{--{!! Form::model($post ,['action'=>['App\Http\Controllers\PostsController@destroy' , $post->id] , 'method'=>'DELETE']) !!}--}}
    {{--<div class="form-group">--}}
    {{--{!! Form::submit('حذف' , ['class'=>'btn btn-danger']) !!}--}}
    {{--</div>--}}
    {{--{!! Form::close() !!}--}}
    <h3>فرم ویرایش</h3>
    @can('update',$post)
        <form action="/posts/{{$post->id}}" method="post">
            @CSRF
            @method('patch')
            <div class="form-group">
                <label for="title">عنوان : </label>
                <input type="text" name="title" class="form-control" value="{{$post->title}}">
            </div>
            <div class="form-group">
                <label for="description">محتوا : </label>
                <textarea name="description" class="form-control" id="" cols="30"
                          rows="10">{{$post->content}}</textarea>
            </div>
            <div class="form-group">
                <input type="submit" value="بروز رسانی" class="btn btn-warning">
            </div>
        </form>
        <form action="/posts/{{$post->id}}" method="post">
            @CSRF
            @method('delete')
            <div class="form-group">
                <input type="submit" value="حذف" class="btn btn-danger">
            </div>
        </form>
    @else
        <h5>شما اجازه ویرایش این پست را ندارید!</h5>
    @endcan
@endsection