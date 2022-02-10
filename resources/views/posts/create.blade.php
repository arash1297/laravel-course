@extends('layouts.app')
@section('content')
    @if($errors->any())
        <ul>
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </div>
        </ul>
    @endif
    {{--{!! Form::open(['action'=>'App\Http\Controllers\PostsController@store' , 'method'=>'POST' , 'files'=>'true']) !!}--}}
    {{--<div class="form-group">--}}
    {{--{!! Form::label('title' , 'عنوان : ') !!}--}}
    {{--{!! Form::text('title' , null , ['class'=>'form-control rtl']) !!}--}}
    {{--</div>--}}
    {{--<div class="form-group">--}}
    {{--{!! Form::label('description','محتوا : ') !!}--}}
    {{--{!! Form::textarea('description',null , ['class'=>'form-control']) !!}--}}
    {{--</div>--}}
    {{--<div class="form-group">--}}
    {{--{!! Form::label('files','تصویر اصلی : ') !!}--}}
    {{--{!! Form::file('file', ['class'=>'form-control']) !!}--}}
    {{--</div>--}}
    {{--<div class="form-group">--}}
    {{--{!! Form::submit('ذخیره' , ['class'=>'btn btn-primary']) !!}--}}
    {{--</div>--}}
    {{--{!! Form::close() !!}--}}
    <form action="/posts" method="post">
        @CSRF
        <div class="form-group">
            <label for="title">عنوان : </label>
            <input type="text" name="title" class="form-control" placeholder="عنوان">
        </div>
        <div class="form-group">
            <label for="description">محتوا : </label>
            <textarea name="description" class="form-control" id="" cols="30" rows="10" placeholder="محتوا"></textarea>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="ذخیره">
        </div>
    </form>
@endsection