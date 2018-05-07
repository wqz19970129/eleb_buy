@extends('layout.default')
@section('title','首页')
@section('content')
    <table class="table table-bordered" id="goodscates">
        <tr>
            <td>id</td>
            <td>分类</td>
            <td>详情</td>
            <td>操作</td>
        </tr>
        @foreach($goodscates as $goodscate)
            <tr data-id="{{$goodscate->id}}">
                <td>{{$goodscate->id}}</td>
                <td>{{$goodscate->name}}</td>
                <td>{{$goodscate->detail}}</td>
                <td>{{--<a href="{{route('buys',['cate'=>$cate])}}" class="btn btn-primary btn-sm">查看</a>--}}
                    <a href="{{route('goodscate.edit',['goodscate'=>$goodscate])}}" class="btn btn-warning btn-sm"> 编辑</a>
                    <form action="{{route('goodscate.destroy',['goodscate'=>$goodscate])}}" method="post">
                        <button class="btn btn-success"> 删除</button>
                        {{method_field('DELETE')}}
                        {{csrf_field()}}
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
        <a class="btn btn-success" href="{{route('goodscate.create')}}">添加</a>
@stop
{{--
@section('js')
    <script>
        $("#goodscates .btn-danger").click(function () {
            if(confirm('确认删除数据吗?不要后悔哟!')){
                var tr=$(this).closest('tr');
                var id=tr.data('id');
                $.ajax(
                    {
                        type:"DELETE",
                        url:'goodscate/'+id,
                        data:'_token={{csrf_token()}}',
                        success:function (msg) {
                            tr.fadeOut();
                        }
                    }
                )
            }
        })
    </script>
@stop--}}
