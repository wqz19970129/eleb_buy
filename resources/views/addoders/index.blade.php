@extends('layout.default')
@section('title','首页')
@section('content')
    <table class="table table-bordered" id="orders">
        <tr>
            <td>id</td>
            <td>姓名</td>
            <td>电话</td>
            <td>详细地址</td>
            <td>创建时间</td>
            <td>付款状态</td>
            <td>发送状态</td>
            <td>审核状态</td>
        </tr>
        @foreach($orders as $order)
            <tr data-id="">
                <td>{{$order->id}}</td>
                <td>{{$order->name}}</td>
                <td>@if($order->shop_img)<img src="{{$order->shop_img}}" alt="">@endif</td>
                <td>{{$order->detail_address}}</td>

                <td>{{$order->created_at}}</td>
                <td>{{$order->order_status}}</td>
                <td>{{$order->status==0?'正在接单':'已取消'}}</td>
                <td>
                   <a href="{{route('Addoder.edit',[$order->id])}}" class="btn btn-success">是否取消订单</a>
                   <a href="{{route('Addoder.show',[$order->id])}}" class="btn btn-success">查看订单</a>
                </td>
            </tr>
        @endforeach
    </table>


@stop