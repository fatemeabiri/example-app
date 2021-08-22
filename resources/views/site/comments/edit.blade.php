@extends('layouts.master')
@section('title','حس و حال | ویرایش کامنت')
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
            <form  method="post" action="/posts/{{$comment->coment_id}}"  >
                @csrf
                @method('put')
                <div class="form-group" >
                    <label for="comment">موضوع </label>
                    <input class="form-control"  value="{{$comment->body}}" name="body" type="text" id="comment" >
                </div>
                <br>
                <button type="submit" class="btn btn-primary mb-2">ویرایش کامنت    </button>
            </form>
        </div>
        <div class="col-3"></div>

@endsection
