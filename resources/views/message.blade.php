@extends('layouts.app')
@section('content')
    <h3>{{__('message.welcome',["name"=>"سید آرش حمیدزاده"])}}</h3>
    <h3>{{trans_choice('message.car',50,["number"=>50])}}</h3>
@endsection