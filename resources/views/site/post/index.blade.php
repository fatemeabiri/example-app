@extends('layouts.master')
@section('title','حس و حال |پست ها')
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
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0"> گفت و گوها ی آزاد </h2>
        <!-- Icon Divider-->
        <br><br>

       <div class="col-3">
           @can('create-post')
        <button type="button" class="btn btn-success">
            <a  class="linkbutton" href="/posts/create">ایجاد گفت و گوی جدید  </a>

        </button>
           @endcan
       </div>
    <div class="col-9"></div>
        <!-- Portfolio Grid Items-->
        @foreach($posts as $post)
            <div class="col-md-4 col-lg-3 mb-5  ">
                <div class="card text-center">
                    <div class="card-header bg-success">
                    </div>

                        @php
                            $objectpost=new \App\Models\Post();
                            $objectpost->post_id= \Illuminate\Support\Arr::get($post,'id');
                            $objectpost->user_id= \Illuminate\Support\Arr::get($post,'user_id');

                        echo  \Illuminate\Support\Arr::get($post,'body');

                        @endphp


                    <div class="card-body">
                        <p class="card-text">

                        </p>
                        <div class="row d-flex justify-content-between">
                            <div class="card-footer text-muted">{{ \Illuminate\Support\Arr::get($post,'user')}}
                                {{ \Illuminate\Support\Arr::get($post,'created_at')}}
                            </div>
                            <div class="card-footer text-muted">نفر دوست داشتند{{ \Illuminate\Support\Arr::get($post,'like')}}
                            </div>
                        </div>

                        <div class=" d-flex justify-content-center">

                        <a href="/posts/{{ \Illuminate\Support\Arr::get($post,'id')}}" >
                            <button class="btn btn btn-info" >مشاهده بحث و مذاکره </button>  </a>
                            @can('update-post',$objectpost)

                                <a href="/posts/{{ \Illuminate\Support\Arr::get($post,'id')}}/edit">
                                    <button class="btn btn btn-success" >ویرایش </button>
                                </a>
                            @endcan
                            @can('destroy-post',$objectpost)
                                <form method="post" action="/posts/{{ \Illuminate\Support\Arr::get($post,'id')}}">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger mb-2">حذف  </button>
                                </form>
                            @endcan
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </div>


@endsection
