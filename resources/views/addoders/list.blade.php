@extends('layout.default')
@section('title','首页')
@section('content')
    <table class="table table-bordered" id="goods">
        <tr>
            <td>id</td>
            <td>菜名</td>
            <td>是否选中</td>
            <td>评分</td>
            <td>图片</td>
            <td>价格</td>
            <td>描述</td>
            <td>月销</td>

            <td>好评数</td>
            <td>日点数量</td>

        </tr>
        @foreach($goods as $good)
            <tr>
                <td>{{$good->id}}</td>
                <td>{{$good->goods_name}}</td>
                <td>{{$good->is_selected==0?'no':'yes'}}</td>
                <td>{{$good->rating}}</td>
                <td>@if($good->goods_img)<img src="{{$good->goods_img}}" alt="">@endif</td>
                <td>{{$good->goods_price}}</td>
                <td>{{$good->detail}}</td>
                <td>{{$good->month_sales}}</td>
                <td>{{$good->satisfy_count}}</td>
                <td>{{$amount}}个</td>
            </tr>
        @endforeach
    </table>
@stop