<div  class="bg-neskafe" >
<div  class="d-flex container text-uppercase  justify-content-between " >
   <div class="page-brand">
       <a href="{{ url('/home') }}" class="text-sm text-gray-700 underline">
       <img src="/assets/img/logo.png" alt="حس و حال">
           </a>
   </div>
    @if (Route::has('login'))
        <div class="hidden  align-self-center">
            @auth
                <div class="d-flex justify-content-between">
                <form action="{{ route('logout') }}" method="post">
                @csrf
                    <button  type="submit" class="btn bg-danger text-sm text-gray-700 underline">خروج</button>
               </form>
                    @if(\Illuminate\Support\Facades\Auth::user()->isAdmin())
                   <a href="{{ route('admin.admin_dashboard') }}">
                       <button  type="submit" class="btn bg-success text-sm text-gray-700 underline">پنل ادمین </button>
                   </a>
                    @endcan
                    @if(\Illuminate\Support\Facades\Auth::user()->isUser())
                    <a href="{{ route('user_dashboard') }}">
                       <button  type="submit" class="btn bg-success text-sm text-gray-700 underline">پروفایل </button>
                   </a>
                    @endcan
                </div>
            @else
                <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">
                    <button  type="submit" class="btn bg-success text-sm text-gray-700 underline">ورود </button>

                </a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 ">
                    <button  type="submit" class="btn btn-warning text-sm text-gray-700 underline">ثبت نام </button>
                    </a>
                @endif
            @endauth
        </div>
    @endif

</div>
</div>

