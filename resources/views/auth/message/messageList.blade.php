@extends('layouts.app_head')

@section('content')
    @foreach ($message_rows as $row)
        <div class="media">
            <a class="media-left" href="#">

                <img class="media-object" src="{{asset('storage/'.json_decode($row->portrait)->store_name)}}" alt="{{$row->name}}" width="64">
            </a>
            <div class="media-body">
                <h4 class="media-heading">{{$row->name}}</h4>
                {{$row->message}}
                @if(!empty($row->child_team))
                    @foreach ($row->child_team as $row)
                        <div class="media">
                            <a class="media-left" href="#">
                                <img class="media-object" src="{{asset('storage/'.json_decode($row->portrait)->store_name)}}" alt="{{$row->name}}" width="64">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">{{$row->name}}</h4>
                                {{$row->message}}
                                @if(!empty($row->child_team))
                                    @foreach ($row->child_team as $row)
                                        <div class="media">
                                            <a class="media-left" href="#">
                                                <img class="media-object" src="{{asset('storage/'.json_decode($row->portrait)->store_name)}}" alt="{{$row->name}}" width="64">
                                            </a>
                                            <div class="media-body">
                                                <h4 class="media-heading">{{$row->name}}</h4>
                                                {{$row->message}}
                                                @if(!empty($row->child_team))
                                                    @foreach ($row->child_team as $row)
                                                        <div class="media">
                                                            <a class="media-left" href="#">
                                                                <img class="media-object" src="{{asset('storage/'.json_decode($row->portrait)->store_name)}}" alt="{{$row->name}}" width="64">
                                                            </a>
                                                            <div class="media-body">
                                                                <h4 class="media-heading">{{$row->name}}</h4>
                                                                {{$row->message}}
                                                                @if(!empty($row->child_team))
                                                                    @foreach ($row->child_team as $row)
                                                                        <div class="media">
                                                                            <a class="media-left" href="#">
                                                                                <img class="media-object" src="{{asset('storage/'.json_decode($row->portrait)->store_name)}}" alt="{{$row->name}}" width="64">
                                                                            </a>
                                                                            <div class="media-body">
                                                                                <h4 class="media-heading">{{$row->name}}</h4>
                                                                                {{$row->message}}
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                @endif
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    @endforeach

    {{ $message_rows->links() }}
@endsection