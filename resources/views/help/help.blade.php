@extends('layout.default')
@section('content')
    <h1><button class="btn btn-block"><a href="{{route('admin.create',['plople'=>\Illuminate\Support\Facades\Auth::user()])}}">注册商铺信息</a></button></h1>

@stop