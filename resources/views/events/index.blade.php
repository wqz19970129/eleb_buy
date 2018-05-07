@extends('layout.default')
@section('title','菜单列表')
    @section('content')
        <table class="table table-bordered table-responsive" id="events">
            <tr>
                <th>ID</th>
                <th>活动标题</th>
                <th>活动内容</th>
                <th>报名时间</th>
                <th>截止时间</th>
                <th>开奖时间</th>
                <th>报名人数限制</th>
                <th>是否开奖</th>
                <th>操作</th>
            </tr>
            @foreach($events as $event)
                <tr data-id="{{ $event->id }}">
                    <td>{{$event->id}}</td>
                    <td>{{$event->title}}</td>
                    <td>{{$event->content}}</td>
                    <td>{{$event->signup_start}}</td>
                    <td>{{$event->signup_end}}</td>
                    <td>{{$event->prize_date}}</td>
                    <td>{{$event->signup_num}}</td>
                    <td>{{$event->is_prize}}</td>
                    <td>
                      {{--  <a href="{{ route('events.edit',['event'=>$event->id]) }}" class="btn btn-warning btn-sm">编辑</a>
                        --}}{{--<a href="{{ route('menus.show',['menu'=>$menu]) }}" class="btn btn-primary btn-sm" >查看</a>--}}{{--
                        <button class="btn btn-danger btn-sm">删除</button>
                    </td>--}}
                        @if(!isset($ids))
                        <a href="{{ route('hert',['event_id'=>$event->id,]) }}" class="btn btn-warning btn-sm">报名</a>
                       @else
                        <a href="{{ route('hert',['event_id'=>$event->id,]) }}" class="btn btn-warning btn-sm">已报名</a>
                    @endif
                </tr>
            @endforeach
        </table>
    @stop
@section('js')
    <script>
        $("#menus .btn-danger").click(function () {
            //确认删除 进入点击事件
//                console.log("ok");
            if(confirm('删除后不能恢复!')){
                var tr = $(this).closest('tr');
                var id=tr.data('id');
                $.ajax({
                    type:"DELETE",
                    url:'events/'+id,
                    data:'_token={{ csrf_token() }}',
                    success: function (msg) {
                        tr.fadeOut();
                    }
                });
            }
        });
    </script>

@stop