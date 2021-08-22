@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12 pt-2">
                <a href="../blog" class="btn btn-outline-primary btn-sm">Go back</a>
                <div class="border rounded mt-5 pl-4 pr-4 pt-4 pb-4">
                    <h1 class="display-4">ویرایش پست ها</h1>
                    <p></p>

                    <hr>

                    <form action="" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="control-group col-12">
                                <label for="title">عنوان پست </label>
                                <input type="text" id="title" class="form-control" name="title"
                                       placeholder="عنوان پست جدید را وارد کنید" value="{{ $post->title }}" required>
                            </div>
                            <div class="control-group col-12 mt-2">
                                <label for="body">متن پست</label>
                                <textarea id="body" class="form-control" name="body" placeholder="متن پست جدید راورد کنید"
                                          rows="50" required>{{ $post->body }}</textarea>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="control-group col-12 text-center">
                                <button id="btn-submit" class="btn btn-primary">
                               به روز کن
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

@endsection