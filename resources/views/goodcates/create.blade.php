@extends('layout.default')
@section('title','添加')
@section('content')
    <div class="col-md-offset-2 col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h5>添加</h5>
            </div>
            <div class="panel-body">
                <form method="POST" action="{{ route('goodscate.store') }}">
                    <div class="form-group">
                        <label for="name">菜分类：</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                    </div>
                    <div class="form-group">
                        <label for="name">详情：</label>
                        <input type="text" name="detail" class="form-control" value="{{ old('detail') }}">
                    </div>
                    {{csrf_field()}}
                    <button type="submit" class="btn btn-primary">添加</button>
                </form>
            </div>
        </div>
    </div>
@stop





