@extends('layouts.app')
<link rel="stylesheet" href="{{ elixir('css/index.css') }}">
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
                        <a href="{{ url('/home') }}">别墅管家</a>
                        <a href="{{ url('/message') }}">留言吧</a>
                        <a href="https://forge.laravel.com">交流吧</a>
                        <a href="https://laravel-news.com">旅游资讯</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
