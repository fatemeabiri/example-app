@extends('layouts.master')
@section('title','حس و حال |  ثبت حس جدید')
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row justify-content-start  ">
        <div class="page-section-heading text-center  text-secondary ">
            <div>
            <spane class="emojititle {{$emoji->emoji_shape}}"></spane>
        </div>
        <div class="divider-custom bg-orange">
            <div class="divider-custom-line bg-orange"></div>
            <div class="divider-custom-icon bg-orange"><i class="fas fa-star bg-orange"></i></div>
            <div class="divider-custom-line bg-orange"></div>
        </div>
        </div>
        <!-- Portfolio Grid Items-->
        <div class="col-3"></div>
        <div class="col-6 justify-content-start">
            <form action="/emotions/"  method="post" >
                @csrf
                <input class="form-control"  name="emoji_key" type="hidden" value="{{$emoji->emoji_key}}"  >
                <h5 class="bg-orange"> من : {{$emoji->emoji_name}} </h5>

                <div class="form-group" >
                    <label for="emotiontitle">موضوع </label>
                    <input class="form-control"  name="emotion_title" type="text" id="emotiontitle" >
                </div>
                <div class="form-group">
                    <label for="emotiontext">داستان </label>
                    <textarea class="form-control"  name="emotion_text" id="emotiontext" ></textarea>
                </div>
                <br>
                <button type="submit" class="btn btn-primary mb-2">ثبت یه حس جدید</button>

            </form>
        </div>
        <div class="col-3"></div>

@endsection
