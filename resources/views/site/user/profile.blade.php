@extends('layouts.user.user')
@section('title','حس  و حال | پروفایل کاربر')
@section('content')
    <div class="page-content page-container" id="page-content">
    <div class="padding">
        <div class="row container d-flex justify-content-center">
            <div class="col-xl-12 col-md-12">
                <div class="card user-card-full">
                    <div class="row m-l-0 m-r-0">
                        <div class="col-sm-4 bg-c-lite-green user-profile">
                            <div class="card-block text-center text-white">
                                <div class="m-b-25"> <img src="https://img.icons8.com/bubbles/100/000000/user.png" class="img-radius" alt="User-Profile-Image"> </div>
                                <h6 class="f-w-600 text-black-50">{{\Illuminate\Support\Facades\Auth::user()->name}}</h6>
                                <p></p> <i class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="card-block">
                                <h6 class="m-b-20 p-b-5 b-b-default f-w-600">اطلاعات</h6>
                                <div class="row">
                                    <div class=" col-7 d-flex">
                                        <p class="m-b-10 f-w-600">نام کاربری: </p>
                                        <h6 class="text-muted f-w-400">{{\Illuminate\Support\Facades\Auth::user()->email}}</h6>
                                    </div>
                                    <div class="col-6 d-flex">
                                        <p class="m-b-10 f-w-600">وضعیت :  </p>
                                        <h6 class="text-muted f-w-400">
                                            @php
                                            if(\Illuminate\Support\Facades\Auth::user()->role=='user')
                                                    echo "کاربر معمولی";
                                            else if(\Illuminate\Support\Facades\Auth::user()->role=='psychologist')
                                                    echo "مشاور روان شناس";
                                            @endphp

                                        </h6>
                                    </div>

                                </div>

                                <ul class="social-link list-unstyled m-t-40 m-b-10">
                                    <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="facebook" data-abc="true"><i class="mdi mdi-facebook feather icon-facebook facebook" aria-hidden="true"></i></a></li>
                                    <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="twitter" data-abc="true"><i class="mdi mdi-twitter feather icon-twitter twitter" aria-hidden="true"></i></a></li>
                                    <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="instagram" data-abc="true"><i class="mdi mdi-instagram feather icon-instagram instagram" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

