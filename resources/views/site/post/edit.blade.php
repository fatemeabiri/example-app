@extends('layouts.master')
@section('title','حس و حال | ویرایش پست')
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
                <spane class="emojititle "></spane>
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
            <form  method="post" action="/posts/{{$post->post_id}}"  >
                @csrf
                @method('put')
                <div class="form-group" >
                    <label for="post">موضوع </label>
                    <input class="form-control"  value="{{$post->body}}" name="body" type="text" id="post" >
                </div>
                <br>
                <button type="submit" class="btn btn-primary mb-2">ویرایش پست   </button>
            </form>
        </div>
        <div class="col-3"></div>

@endsection
