@extends('layout.default')
@section('title','首页')
@section('content')
    <table class="table table-bordered" id="goods">
        <tr>

            <td>菜名</td>
            <td>个数</td>

        </tr>

        @foreach($goods as $good)

            <tr>
                <td>{{$good->goods_name}}</td>

                <td>{{$good->a}}个</td>

            </tr>

        @endforeach
    </table>
@stop