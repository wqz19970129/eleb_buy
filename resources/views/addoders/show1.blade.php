@extends('layout.default')
@section('title','首页')
@section('content')
    <table class="table table-bordered" id="orders">
        <tr>
            <td>id</td>
            <td>姓名</td>
            <td>电话</td>
            <td>详细地址</td>

        </tr>
        @foreach($orders as $order)
            <tr data-id="">
                <td>{{$order->id}}</td>
                <td>{{$order->name}}</td>
                <td>@if($order->shop_img)<img src="{{$order->shop_img}}" alt="">@endif</td>
                <td>{{$order->detail_address}}</td>
            </tr>
        @endforeach
        <tr>
            <td colspan="4"><input type="text" value="{{$count}}">记录数</td>
        </tr>
    </table>


@stop