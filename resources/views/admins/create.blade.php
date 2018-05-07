@extends('layout.default')
@section('title','登录')
@section('content')
    <link rel="stylesheet" type="text/css" href="/webuploader/webuploader.css">
    <div class="container">
    <form method="post" action="{{route('admin.store')}}" enctype="multipart/form-data">
        <div class="form-group">
            <label for="shop_name">商家名称</label>
            <input type="text" class="form-control" id="shop_name" placeholder="" name="shop_name" value="{{old('shop_name')}}">
        </div>

{{--@php(var_dump($id);die();)--}}
            <input type="hidden" class="form-control" id="shop_name" placeholder="" name="p_id" value="{{$id}}">

        <div class="form-group">
            <label for="shop_img">商家图片：</label>
            <input type="hidden" name="shop_img" class="form-control" id="logo">
        </div>
        <div class="form-group">
            <div id="uploader-demo">
                <!--用来存放item-->
                <div id="fileList" class="uploader-list"></div>
                <div id="filePicker">选择图片</div>
            </div>
            <img src="" alt="" id="img">
        </div>
        <div class="form-group">
            <label for="brand">是否品牌</label>
            是:<input type="radio" name="brand" value="1">
            否:<input type="radio" name="brand" value="0">
        </div>
        <div class="form-group">
            <label for="on_time">是否品准时</label>
            是:<input type="radio" name="on_time" value="1">
            否:<input type="radio" name="on_time" value="0">
        </div>
        <div class="form-group">
            <label for="fengniao">是否蜂巢</label>
            是:<input type="radio" name="fengniao" value="1">
            否:<input type="radio" name="fengniao" value="0">
        </div>
        <div class="form-group">
            <label for="bao">是否保</label>
            是:<input type="radio" name="bao" value="1">
            否:<input type="radio" name="bao" value="0">
        </div>
        <div class="form-group">
            <label for="piao">是否票</label>
            是:<input type="radio" name="piao" value="1">
            否:<input type="radio" name="piao" value="0">
        </div>
        <div class="form-group">
            <label for="zhun">是否标准</label>
            是:<input type="radio" name="zhun" value="1">
            否:<input type="radio" name="zhun" value="0">
        </div>
        <div class="form-group">
            <label for="start_send">配送金额</label>
            <input type="text" class="form-control" id="name" placeholder="" name="start_send" value="{{old('start_send')}}">
        </div>

        <div class="form-group">
            <label for="start_cost">起送金额</label>
            <input type="text" class="form-control" id="start_cost" placeholder="" name="send_cost" value="{{old('start_cost')}}">
        </div>
        <div class="form-group">
            <label for="notice">公告</label>
            <input type="text" class="form-control" id="notice" placeholder="" name="notice" value="{{old('notice')}}">
        </div>
        <div class="form-group">
            <label for="discount">优惠活动</label>
            <input type="text" class="form-control" id="discount" placeholder="" name="discount" value="{{old('discount')}}">
        </div>
        {{csrf_field()}}
        <button type="submit" class="btn btn-default">提交</button>

    </form>
    </div>
@stop
@section('js')
    <!--引入JS-->
    <script type="text/javascript" src="/webuploader/webuploader.js"></script>
    <script>
        // 初始化Web Uploader
        var uploader = WebUploader.create({

            // 选完文件后，是否自动上传。
            auto: true,

            // swf文件路径
            swf:'/webuploader/Uploader.swf',

            // 文件接收服务端。
            server: '/upload',

            // 选择文件的按钮。可选。
            // 内部根据当前运行是创建，可能是input元素，也可能是flash.
            pick: '#filePicker',
            formData:{'_token':"{{csrf_token()}}"},
            // 只允许选择图片文件。
            accept: {
                title: 'Images',
                extensions: 'gif,jpg,jpeg,bmp,png',
                mimeTypes: 'image/*'
            }
        });
        //事件监听
        uploader.on( 'uploadSuccess', function( file,response ) {
            //$( '#'+file.id ).addClass('upload-state-done');
            var url=response.url;
            //console.log(response);
            $("#img").attr('src',url);
            $('#logo').val(url);
        });
    </script>
@stop






