@extends('layout.default')
@section('title','首页')
@section('content')
    <table class="table table-bordered" id="orders">
        <tr>
            <td>id</td>
            <td>菜品</td>
            <td>图片</td>
            <td>价格</td>
        </tr>
        @foreach($orders as $order)
            <tr data-id="">
                <td>{{$order->id}}</td>
                <td>{{$order->goods_name}}</td>
                <td>@if($order->goods_img)<img src="{{$order->goods_img}}" alt="">@endif</td>
                <td>{{$order->goods_price}}</td>
            </tr>
        @endforeach
    </table>
@stop