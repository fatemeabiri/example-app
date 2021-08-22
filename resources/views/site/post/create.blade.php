@extends('layouts.master')
@section('title','حس و حال | پستها')
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
        <!-- Portfolio Grid Items-->
        <div class="col-3"></div>
        <div class="col-6 justify-content-start">
            <form action="/posts/"  method="post" >
                @csrf
                <div class="form-group" >
                    <label for="postbody">موضوع </label>
                    <input class="form-control"  name="body" type="text" id="postbody" >
                </div>
                <br>
                <button type="submit" class="btn btn-primary mb-2">ثبت پست</button>

            </form>
        </div>
        <div class="col-3"></div>

@endsection
