@extends('layouts.app_head')
<link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="jumbotron" style=" background-color: #e2f4f9">
                <h1>心语学院</h1>
                <p class="lead">
                    <img style="vertical-align: middle;" src="http://www.pingusenglish.cn/upfile/2017/03/20170315174448_354.png" alt="" width="45" height="36">
                    企鹅家族英语是专业面向2-8岁儿童的英语培训机构，课程由世界的语言培训机构Linguaphone 集团和使用获得多项大奖的儿童动画片《从南极来的Pingu  》研发而来。主要是针对母语非英语的儿童，以母语习得为基础，通过小企鹅Pingu 日常生活的冒险经历以及和家人、朋友的故事，再现了儿童日常生活中的真实场景，零距离贴近生活，让儿童身临其境地模仿并使用英语。</p>
                <p><a class="btn btn-lg btn-success" href="#" role="button">了解详情</a></p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div id="myCarousel" class="carousel slide">
                <!-- 轮播（Carousel）指标 -->
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                </ol>
                <!-- 轮播（Carousel）项目 -->
                <div class="carousel-inner">
                    <div class="item active">
                        <img src="{{ asset('mig/slide.png') }}" alt="First slide">
                    </div>
                    <div class="item">
                        <img src="{{ asset('mig/slide.png') }}" alt="Second slide">
                    </div>
                    <div class="item">
                        <img src="{{ asset('mig/slide.png') }}" alt="Third slide">
                    </div>
                </div>
                <!-- 轮播（Carousel）导航 -->
                <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>

        <div class="col-md-4">
            <div class="row">
                <div class="col-md-12" style="background-image: url({{ asset('mig/title_bg.png') }}) ; background-repeat:no-repeat; background-size:100% 100%;-moz-background-size:100% 100%; ">
                    <h2 style="font-weight: bold; text-align: center">教育咨询</h2>
                </div>
            </div>
            <ul class="list-group">
                <li class="list-group-item">
                    <span class="badge">2018-03-30</span>
                    儿童心理辅导</li>
                <li class="list-group-item">
                    <span class="badge">2018-03-30</span>
                    儿童早教</li>
                <li class="list-group-item">
                    <span class="badge">2018-03-30</span>
                    儿童早教活动拓展</li>
                <li class="list-group-item">
                    <span class="badge">2018-03-30</span>
                    1岁儿童教育
                </li>
                <li class="list-group-item">
                    <span class="badge">2018-03-30</span>
                    儿童沟通与教育</li>
                <li class="list-group-item">
                    <span class="badge">2018-03-30</span>
                    如何培养儿童学习兴趣
                </li>
                <li class="list-group-item">
                    <span class="badge">2018-03-30</span>
                    培养孩子的积极性
                </li>
                <li class="list-group-item" style="padding: 0px">
                    <img src="{{ asset('mig/logo01.gif') }}" width="100%">
                </li>
            </ul>
        </div>
    </div>

    <div class="row" style="margin-top: 24px">
        <div class="col-md-12" style="background-image: url({{ asset('mig/title_bg.png') }}) ; background-repeat:no-repeat; background-size:100% 100%;-moz-background-size:100% 100%; ">
            <h2 style="font-weight: bold; text-align: center">心语历程</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 col-md-3">
            <a href="#" class="thumbnail">
                <img src="{{ asset('mig/img01.jpg') }}"
                     alt="通用的占位符缩略图">
            </a>
        </div>
        <div class="col-sm-6 col-md-3">
            <a href="#" class="thumbnail">
                <img src="{{ asset('mig/mig02.jpg') }}"
                     alt="通用的占位符缩略图">
            </a>
        </div>
        <div class="col-sm-6 col-md-3">
            <a href="#" class="thumbnail">
                <img src="{{ asset('mig/img01.jpg') }}"
                     alt="通用的占位符缩略图">
            </a>
        </div>
        <div class="col-sm-6 col-md-3">
            <a href="#" class="thumbnail">
                <img src="{{ asset('mig/mig02.jpg') }}"
                     alt="通用的占位符缩略图">
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4">
            <h2>Safari bug warning!</h2>
            <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
            <p><a class="btn btn-primary" href="#" role="button">View details &raquo;</a></p>
        </div>
        <div class="col-lg-4">
            <h2>Heading</h2>
            <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
            <p><a class="btn btn-primary" href="#" role="button">View details &raquo;</a></p>
        </div>
        <div class="col-lg-4">
            <h2>Heading</h2>
            <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa.</p>
            <p><a class="btn btn-primary" href="#" role="button">View details &raquo;</a></p>
        </div>
    </div>
@endsection

@section('food')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <p>&copy; 2016 Company, Inc.</p>
                </div>
            </div>
        </div>
    </div>
@endsection



