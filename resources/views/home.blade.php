@extends('layouts.app')
<style>
    html, body {
        background-color: #fff;
        color: #636b6f;
        font-family: 'Raleway', sans-serif;
        font-weight: 100;
        height: 100vh;
        margin: 0;
    }

    .full-height {
        height: 100vh;
    }

    .flex-center {
        align-items: center;
        display: flex;
        justify-content: center;
    }

    .position-ref {
        position: relative;
    }

    .top-right {
        position: absolute;
        right: 10px;
        top: 18px;
    }

    .content {
        text-align: center;
    }

    .title {
        font-size: 84px;
    }

    .links > a {
        color: #636b6f;
        padding: 0 25px;
        font-size: 12px;
        font-weight: 600;
        letter-spacing: .1rem;
        text-decoration: none;
        text-transform: uppercase;
    }

    .m-b-md {
        margin-bottom: 30px;
    }
</style>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="flex-center position-ref full-height">

                <div class="content">
                    <div class="title m-b-md">
                        Laravel
                    </div>

                    <div class="links">
                        <a href="https://laravel.com/docs">别墅管家</a>
                        <a href="https://laracasts.com">留言吧</a>
                        <a href="https://forge.laravel.com">交流吧</a>
                        <a href="https://laravel-news.com">旅游资讯</a>
                        <a href="https://github.com/laravel/laravel">联系我们</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
