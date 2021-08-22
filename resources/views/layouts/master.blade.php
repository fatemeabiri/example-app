<!DOCTYPE html>
<html lang="fa" dir="rtl">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>@yield('title')</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script type="text/javascript" src="{{ URL::asset('js/blog.js') }}"></script>

        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="/css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">

        @include('/layouts/firsthead')
        <!-- Navigation-->
        @include('/layouts/navbar')
        <!-- Masthead-->
        @yield('header')
        <!-- Portfolio Section-->
        <section class="page-section portfolio" id="portfolio">
            <div class="container mas-con">
        @yield('content')
            </div>
        </section>
        <!-- About Section-->
        @include('/layouts/about')
        <!-- Contact Section-->
         @include('/layouts/contact')
        <!-- Footer-->
        @include('/layouts/footer')
        <!-- Copyright Section-->
        @include('/layouts/copyright')

        <!-- Bootstrap core JS-->
    </body>
</html>
