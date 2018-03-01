@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="flex-center position-ref full-height" style="background: white">

                    <form method="POST" action="{{ route('userinfo') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">头像</label>

                                @if(!empty($user->portrait))
                                <div class="col-md-2">
                                    <img src="{{ asset('storage/'.$user->portrait_img) }}" width="100%">
                                </div>
                                    @endif

                            <div class="col-md-6">
                                <input type="file" id="portrait" name="portrait">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">用户名</label>

                            <div class="col-md-6">
                                <input id="userid" type="hidden" class="form-control" name="userid" value="{{ $user->id }}">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}" required autofocus readonly>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    提交
                                </button>
                            </div>
                        </div>

                    </form>


                </div>
            </div>
        </div>
    </div>
@endsection