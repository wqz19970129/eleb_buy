@extends('layout.default')
@section('title','分类')
@section('content')
    商家名:<h3>{{$admin->shop_name}}</h3>
    图片名:<h3>@if($admin->shop_img)<img src="{{$admin->shop_img}}" alt="">@endif</h3>
    是否品牌:<h3>{{$admin->brand1==1?'是':'否'}}</h3>
    是否准时:<h3>{{$admin->on_time==1?'是':'否'}}</h3>
    是否蜂鸟:<h3>{{$admin->fengniao==1?'是':'否'}}</h3>
    是否保:<h3>{{$admin->bao==1?'是':'否'}}</h3>
    是否票:<h3>{{$admin->piao==1?'是':'否'}}</h3>
    准时:<h3>{{$admin->zhun==1?'是':'否'}}</h3>
    起送金额:<h3>{{$admin->start_send}}</h3>
    配送费:<h3>{{$admin->send_cost}}</h3>
    是否审核过:<h3>{{$admin->status==1?'通过':'未审核'}}</h3>
    <a href="{{route('admin.edit',['admin'=>$admin])}}" class="btn btn-primary btn-sm">完善</a>
@stop


