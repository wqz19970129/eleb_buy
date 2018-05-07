@extends('layout.default')
@section('title','登录')
@section('content')
    <form method="post" action="{{route('plople.store')}}">
        <div class="form-group">
            <label for="name">用户名</label>
            <input type="text" class="form-control" id="name" placeholder="用户名" name="name" value="{{old('name')}}">
        </div>
        <div class="form-group">
            <label for="phone">电话号码</label>
            <input type="text" class="form-control" id="name" placeholder="用户名" name="phone" value="{{old('phone')}}">
        </div>
        <div class="form-group">
            <label for="password">密码</label>
            <input type="password" class="form-control" id="password" placeholder="密码" name="password" value="{{old('password')}}">
        </div>
        <div class="form-group">
            <label for="password_confirmation">确认密码：</label>
            <input type="password" name="password_confirmation" class="form-control" value="{{ old('password_confirmation') }}">
        </div>
        <div class="form-group">
            <label for="password">验证码</label>
            <div class="row">
                <div class="col-md-8">
                    <input id="captcha" class="form-control" name="captcha" >
                </div>
                <div class="col-lg-offset-6">
                    <img class="thumbnail captcha" src="{{ captcha_src('flat') }}" onclick="this.src='/captcha/flat?'+Math.random()" title="点击图片重新获取验证码">
                </div>
            </div>
        </div>
        {{csrf_field()}}
        <button type="submit" class="btn btn-default">提交</button>
    </form>
@stop
