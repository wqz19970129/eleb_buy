<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{route('help')}}">饿了吧</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class=""><a href="{{route('show',['p_id'=>\Illuminate\Support\Facades\Auth::user()])}}">我的资料 <span class="sr-only">(current)</span></a></li>
                <li><a href="{{route('events.index')}}">查看最新活动</a></li>
                <li><a href="{{route('Addoder.index')}}">查看最新订单</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">店铺管理<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{route('goodscate.index')}}">菜品分类</a></li>
                        <li><a href="{{route('goods.index')}}">我的菜品</a></li>
                        <li><a href="{{route('care')}}">日定单</a></li>
                        <li><a href="{{route('care1')}}">月订单</a></li>
                        <li><a href="{{route('care2')}}">总订单数</a></li>
                        <li><a href="{{route('goods')}}">菜品总订单数</a></li>
                        <li><a href="{{route('goods2')}}">菜品日订单数</a></li>
                        <li><a href="{{route('goods3')}}">菜品月订单数</a></li>
                    </ul>
                </li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                @guest
                <li><a href="{{route('login')}}">登录</a></li>
                <li><a href="{{route('plople.create')}}">注册</a></li>
                @endguest
                @auth
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> {{\Illuminate\Support\Facades\Auth::user()->name}}</a>
                    <ul class="dropdown-menu">
                        <li><a href="{{route('password')}}">修改密码</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li role="separator" class="divider"></li>
                        <li>     <form method="post" action="{{ route('logout') }}">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button class="btn btn-default">注销</button>
                            </form></li>
                    </ul>
                </li>
            </ul>
            @endauth
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>


