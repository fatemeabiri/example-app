<header class="masthead bg-header text-white text-center">
    <div class="container d-flex align-items-start flex-column rounded-0" >
        <h2 class="masthead-heading text-uppercase mb-0">الان حس و حال من شبیه کدومه؟ </h2>
        <br>
        <div class="row justify-content-between d-flex   ">
         @foreach($emojies as $emoji)
            <div class="col-md-2 col-lg-1 col-sm-10">
                <a href="/emotions/create/{{$emoji->emoji_key}}/" >
                       <span class=" emojiboxheader  {{$emoji->emoji_shape}}"></span>
                </a>
            </div>
         @endforeach
        </div>
        <!-- Icon Divider-->
{{--        <div class="divider-custom divider-light">--}}
{{--        </div>--}}

        <!-- Masthead Subheading-->
    </div>
</header>
