@extends('layouts.admin.admin')
@section('title','پنل مدیر | ایموجی ها')
@section('content')
    <section class="bg-dark rounded " id="portfolio">
        <h2  class="page-section-heading text-center text-uppercase
                 mb-0  header bg-orange" >ایموجی  ها</h2>
    </section>
    <br>
    <button type="button" class="btn btn-success">
    <a  class="linkbutton" href="/admin/emojis/create">اضافه کردن </a>

    </button>

    <br>
    @php
        $loopvar=0;
    @endphp

    <div class="list-group col-6">
    @foreach($emojies as $emoji)


            <div class="list-group-item list-group-item-action " aria-current="true">
                <div class="d-flex w-100 justify-content-between">
                    <span class=" emojibox {{$emoji->emoji_shape}}"></span>
                    <small>وزن این احساس:  {{$emoji->emoji_weight}}</small>
                </div>
                <div class="d-flex w-100 justify-content-between">
                    <p class="mb-1 ">
                        {{$emoji->emoji_name}}</p>
                    <div class="d-flex justify-content-between">
                         <form action="/admin/emojis/{{$emoji->emoji_key}}" method="post">
                             @csrf
                             @method('delete')
                            <button type="submit"  class="btn btn-danger " href="">حذف</button>
                         </form>
                        <p></p>
                        <button type="button" class="btn btn-warning  ">
                            <a class="linkbutton" href="/admin/emojis/{{$emoji->emoji_key}}/edit">به روزرسانی</a>
                        </button>

                    </div>
                </div>


            </div>


    @endforeach
    </div>
@endsection

