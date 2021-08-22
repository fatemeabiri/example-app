@extends('layouts.admin.admin')
@section('title','پنل مدیر | ویرایش ایموجی')
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

    <div class="col-4">
        <form method="post" action="/admin/emojis/{{$emoji->emoji_key}}" >
            @csrf
            @method('put')
            <div class="form-group" >
                <label for="emojishape">شکل احساس یا ایموجی</label>
                <input type="text" value="{{$emoji->emoji_shape}}" name="emoji_shape" class="form-control" id="emojishape" placeholder="copy&paste">
            </div>
            <div class="form-group">
                <label for="emojiname">نام احساس</label>
                <input type="text"  value="{{$emoji->emoji_name}}" name="emoji_name" class=" form-control" id="emojiname">
            </div>
            <div class="form-group">
                <label for="emojiweight">بار منفی و مثبت ایموجی</label>
                <input type="range" name="emoji_weight" class="form-range" min="-10" max="10"
                       value="{{$emoji->emoji_weight}}" id="emojiweight">

            </div>
            <button type="submit" class="btn btn-warning mb-2">به روز کن</button>

        </form>
    </div>
@endsection
