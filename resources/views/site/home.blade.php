@extends('layouts.master')
@section('title','حس و حال | صفحه اصلی')
@section('header')
    @include('/layouts/header')
@endsection
@section('content')
    @include('site.emoji.emoji_section_index')
@endsection
