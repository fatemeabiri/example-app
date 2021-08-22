@extends('layouts.master')
@section('title','حس و حال | حس و حال ها')
@section('header')
    @include('/layouts/header')
@endsection
@section('content')
    <div class="row justify-content-start  ">
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">همه حس و حال ها  </h2>
        <!-- Icon Divider-->
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>
        <!-- Portfolio Grid Items-->

    @foreach($emotions as $emotion)
            <div class="col-md-4 col-lg-3 mb-5  ">
            <div class="card text-center  " >
                <div class="card-header">

                    @php
                        $emoji=$emotion->emoji;

                @endphp
                    <span class="{{$emoji->emoji_shape}} emojititle"></span>
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{$emotion->emotion_title}}</h5>
                    <p class="card-text">
                        {{$emotion->emotion_text}}
                    </p>
                    <a href="#" class="btn btn-primary">گفت و گوها و مشاوره ها   </a>
                </div>
                <div class="card-footer text-muted">{{$emotion->emotion_date}}</div>
                <div class="card-footer text-muted">{{$emotion->user->name}}</div>
            </div>
            </div>
        @endforeach
    </div>

@endsection
