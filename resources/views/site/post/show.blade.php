@extends('layouts.master')
@section('title','حس و حال |مشاهده پست ')
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
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">بحث ها   </h2>
        <!-- Icon Divider-->
       <div class="col-3">
           @can('create-post')
        <button type="button" class="btn btn-success">
            <a  class="linkbutton" href="#createcomment">نظر من  </a>

        </button>
           @endcan
       </div>
    <div class="row">
    <div class="col-3"></div>
        <div class="col-6">
        <!-- Portfolio Grid Items-->


                <div class="card text-center">
                    <div class="card-header bg-orange">
                    </div>

                    @php
                        echo $post['body'];
                             $objectpost=new \App\Models\Post();
                            $objectpost->post_id= \Illuminate\Support\Arr::get($post,'id');
                            $objectpost->user_id= \Illuminate\Support\Arr::get($post,'user_id');
                    @endphp

                    <div class="card-footer text-muted">{{$post['user'] }}</div>
                    <div class="card-footer text-muted">{{ $post['created_at']}}</div>
{{--                    <div class="card-footer text-muted"> نفر دوست داشتند{{ $post['like']}}</div>--}}
                    <div class="card-body">
                        <p class="card-text">

                        </p>
                    </div>
                </div>



        <br>


        @foreach($comments as $comment)

            <div class="list-group">
                <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
                    <div class="d-flex w-100 justify-content-between">




                        <small></small>
                    </div></a>
                <p class="mb-1">
                    {{ \Illuminate\Support\Arr::get($comment,'body')}}
                </p>
                <p class="mb-1"></p>
                    <div class="d-flex bg-orange">

                        @can('update-post',$objectpost)

                        <form method="post" action="/comments/{{\Illuminate\Support\Arr::get($comment,'id')}}">
                        @csrf
                        @method('delete')
                        <input type="hidden" name="post_id" value="{{$post['id']}}">
                        <button type="submit" class="btn btn-danger mb-2">حذف  </button>
                    </form>
                        @endcan
{{--                        @can('destroy-post',$objectpost)--}}


{{--                            <a href="/posts/{{ \Illuminate\Support\Arr::get($comment,'id')}}/edit">--}}
{{--                        <button class="btn btn btn-success" >ویرایش </button>--}}
{{--                    </a>--}}
{{--                         @endcan--}}
                    </div>

                     <small class="d-flex justify-content-right">
                    <div class="card-footer text-muted">{{ \Illuminate\Support\Arr::get($comment,'user')}}</div>
                    <div class="card-footer text-muted">{{ \Illuminate\Support\Arr::get($comment,'created_at')}}</div>
                    <div class="card-footer text-muted"> نفر دوست داشتند{{ \Illuminate\Support\Arr::get($comment,'like')}}</div>


                   </small>


            </div>

        @endforeach
        </div>
        <div class="col-3"></div>
       </div>

        <div class="row justify-content-start  ">
            <!-- Portfolio Grid Items-->
            <div class="col-3"></div>
            <div class="col-6 justify-content-start">
                @can('create-post')
                <form action="/comments/"  method="post" id="createcomment" >
                    @csrf
                    @method('post')
                    <input type="hidden" name="post_id" value="{{$post['id']}}">
                    <div class="form-group" >
                        <label for="commentbody">نظر شما چیست </label>
                        <input class="form-control"  name="body" type="text" id="commentbody" >
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary mb-2">ثبت کامنت</button>

                </form>
                @endcan
            </div>
            <div class="col-3"></div>


        </div>


@endsection
