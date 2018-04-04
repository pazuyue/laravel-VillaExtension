@extends('layouts.app_head')
<link href="{{ asset('css/welcome.css') }}" rel="stylesheet">

@section('body')
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li><a href="#">主页</a></li>
            <li class="active">教育咨询</li>
        </ol>
    </div>
</div>

    <div class="row">
        <div class="col-md-3  visible-md visible-lg">
            <ul class="nav nav-tabs nav-stacked" data-offset-top="100">
                <li class="active"><a href="#section-1">标题一</a></li>
                <li><a href="#section-2">标题二</a></li>
                <li><a href="#section-3">标题三</a></li>
                <li><a href="#section-4">标题四</a></li>
                <li><a href="#section-5">标题五</a></li>
            </ul>
        </div>
        <div class="col-xs-12 col-md-9">
            <h2 id="section-1">标题一</h2>
            <div class="col-lg-12">
                <ol class="breadcrumb2">
                    <li>浏览量：20186</li>
                    <li class="active">更新日期：2018-04-03</li>
                </ol>
            </div>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eu sem tempor, varius quam at, luctus dui. Mauris magna metus, dapibus nec turpis vel, semper malesuada ante. Vestibulum id metus ac nisl bibendum scelerisque non non purus. Suspendisse varius nibh non aliquet sagittis. In tincidunt orci sit amet elementum vestibulum. Vivamus fermentum in arcu in aliquam. Quisque aliquam porta odio in fringilla. Vivamus nisl leo, blandit at bibendum eu, tristique eget risus. Integer aliquet quam ut elit suscipit, id interdum neque porttitor. Integer faucibus ligula.</p>
            <p>Vestibulum quis quam ut magna consequat faucibus. Pellentesque eget nisi a mi suscipit tincidunt. Ut tempus dictum risus. Pellentesque viverra sagittis quam at mattis. Suspendisse potenti. Aliquam sit amet gravida nibh, facilisis gravida odio. Phasellus auctor velit at lacus blandit, commodo iaculis justo viverra. Etiam vitae est arcu. Mauris vel congue dolor. Aliquam eget mi mi. Fusce quam tortor, commodo ac dui quis, bibendum viverra erat. Maecenas mattis lectus enim, quis tincidunt dui molestie euismod. Curabitur et diam tristique, accumsan nunc eu, hendrerit tellus.</p>
            <hr>
        </div>
    </div>

@endsection

@section('food')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <p style="text-align: center;">&copy; 2016 Company, Inc.</p>
                </div>
            </div>
        </div>
    </div>
@endsection



