@extends('layout.default')
@section('title','首页')
@section('content')
    <table class="table table-bordered" id="orders">
        <tr>
            <td colspan="4"><input type="text" value="{{$count}}">记录数</td>
        </tr>
    </table>


@stop