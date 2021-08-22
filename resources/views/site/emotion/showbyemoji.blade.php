@extends('layouts.master')
@section('title','حس و حال | حس و حال ها ')
@section('header')
    @include('/layouts/header')
@endsection
@section('content')
    <div class="row justify-content-start  ">
        <div class="page-section-heading text-center  text-secondary ">
            @if($emotions->count()!=0)
                <spane class="emojititle {{$emotions[0]->emoji->emoji_shape}}"></spane>
            @endif
        </div>
        <!-- Icon Divider-->

{{--        <spane class="{{ $emoji->emoji_shape}}"> {{$emoji->emoji_name}} </spane>--}}
        <div class="divider-custom bg-orange">
            <div class="divider-custom-line bg-orange"></div>
            <div class="divider-custom-icon bg-orange"><i class="fas fa-star bg-orange"></i></div>
            <div class="divider-custom-line bg-orange"></div>
        </div>
        <!-- Portfolio Grid Items-->

        @foreach($emotions as $emotion)
            <div class="col-md-4 col-lg-3 mb-5  ">
                <div class="card text-center">
                    <div class="card-header">{{$emotion->emotion_title}}</div>
                    <div class="card-body">
{{--                        <h5 class="card-title">{{$emotion->emotion_title}}</h5>--}}
                        <p class="card-text">
                            {{$emotion->emotion_text}}
                        </p>
{{--                        @if ($emotion->user_id==auth()->id())--}}

                            <div class=" d-flex justify-content-center">
                                @can('update-emotion',$emotion)
                                <a href="/emotions/{{$emotion->emotion_key}}/edit">
                                <button class="btn btn btn-success" >ویرایش </button>
                                </a>
                                @endcan
                                @can('destroy-emotion',$emotion)
                                <form action="/emotions/{{$emotion->emotion_key}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger mb-2">حذف  </button>
                                </form>
                                 @endcan
                            </div>
{{--                        @endif--}}
                        <br> <br>
                        <a href="#" class="btn btn-primary">گفت و گوها و مشاوره ها   </a>
                    </div>
                    <div class="card-footer text-muted">{{$emotion->emotion_date}}</div>
                    <div class="card-footer text-muted">{{$emotion->user->name}}</div>

                </div>
            </div>
        @endforeach
    </div>

@endsection
