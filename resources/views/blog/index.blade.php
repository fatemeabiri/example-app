@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 pt-2">
                 <div class="row">
                    <div class="col-8">
                        <h1 class="display-one">وبلاگ من!</h1>
                        <p> لذت خواندن پستهای به روز از همه اتفاقات  هیجان انگیز رو تجربه کنید! </p>
                    </div>
                    <div class="col-4">
                        <p>تو هم یه پست جدید ثبت کن</p>
                        <a href="./blog/create/post" class="btn btn-primary btn-sm">پست جدید</a>
                    </div>
                </div>                
                @forelse($posts as $post)
                    <ul>
                        <li><a href="./blog/{{ $post->id }}">{{ ucfirst($post->title) }}</a></li>
                    </ul>
                @empty
                    <p class="text-warning"></p>
                @endforelse
            </div>
        </div>
    </div>
@endsection