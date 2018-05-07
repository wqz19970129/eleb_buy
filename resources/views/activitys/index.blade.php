@extends('layout.default')
@section('title','首页')
@section('content')
    <table class="table table-bordered" id="activitys">
        <tr>
            <td>id</td>
            <td>活动名称</td>
            <td>活动开始时间</td>
            <td>结束时间</td>
            <td>操作</td>

        </tr>
        @foreach($activitys as $activity)
            @if(strtotime(date('Y-m-d',time()))<strtotime($activity->end))
            <tr data-id="{{$activity->id}}">
                <td>{{$activity->id}}</td>
                <td>{{$activity->name}}</td>
               {{-- <td>{!! $activity->detail !!}</td>--}}
                <td>{{$activity->start}}</td>
                <td>{{$activity->end}}</td>
                <td>
                    <a href="{{route('activity.show',['activity'=>$activity])}}" class="btn btn-success">查看</a>
                </td>
            </tr>
            @endif
        @endforeach
    </table>

@stop
