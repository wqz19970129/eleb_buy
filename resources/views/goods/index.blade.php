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
                <td>评分比率</td>
                <td>好评数</td>
                <td>好评率</td>
                <td>操作</td>
            </tr>
            @foreach($goods as $good)
                <tr data-id="{{$good->goods_id}}">
                    <td>{{$good->id}}</td>
                    <td>{{$good->goods_name}}</td>
                    <td>{{$good->is_selected==0?'no':'yes'}}</td>
                    <td>{{$good->rating}}</td>
                    <td>@if($good->goods_img)<img src="{{$good->goods_img}}" alt="">@endif</td>
                    <td>{{$good->goods_price}}</td>
                    <td>{{$good->detail}}</td>
                    <td>{{$good->month_sales}}</td>
                    <td>{{$good->rating_count}}</td>
                    <td>{{$good->satisfy_count}}</td>
                    <td>{{$good->satisfy_rate}}</td>
                    <td>
                        <a href="{{route('goods.edit',['good'=>$good])}}" class="btn btn-success">修改</a>
                        <button class="btn btn-danger">删除</button>
                    </td>
                </tr>
                @endforeach
        </table>
        {{$goods->links()}}
        <a href="{{route('goods.create')}}" class="btn btn-success">添加</a>

    @stop

@section('js')
    <script>
        $('#goods .btn-danger').click(function () {
            if(confirm('确认删除数据吗?不要后悔哟!')){
                var tr =$(this).closest('tr');
                var id=tr.data('id');
                $.ajax(
                    {
                        type:"DELETE",
                        url:'goods/'+id,
                        data:'_token={{csrf_token()}}',
                        success:function (msg) {
                        tr.fadeOut();
                        }
                    }
                )
            }
        })
    </script>
    @stop