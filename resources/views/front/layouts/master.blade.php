@php

$lang = app()->getLocale();

$dir = 'left';
$dir2 = 'right';
$direction = 'ltr';
$prefix = '/en/';

if ($lang == 'ar') {
    $dir = 'right';
    $dir2 = 'left';
    $direction = 'rtl';
    $prefix = '/ar/';
} else if($lang == 'de') {
    $prefix = '/de/';
} else if($lang == 'ru') {
    $prefix = '/ru/';
} else if($lang == 'fr') {
    $prefix = '/fr/';
} else {
    $prefix = '/en/';
}

@endphp

<!DOCTYPE html>
<html lang="{{ $lang }}" dir="{{ $dir }}">

  <head>

    <!-- Basic Page Needs -->
    <meta charset="UTF-8" />
    <!-- description -->
    <meta name="description" content="@yield('description')" />
    <!-- keywords -->
    <meta name="keywords" content="@yield('keywords')" />
    <!-- author -->
    <meta name="author" content="Icon Creations" />
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- IE Browser Support -->
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <!-- upper bar color for mobile -->
    <meta content="#627E90" name="theme-color" />
    <!-- Page Title -->

    <title>@yield('title')</title>


    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('front/favicon.ico') }}" />



    @include('front.layouts.scripts.css')

    <!-- Page CSS -->
    @stack('custom-css-scripts')

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-LELND6FC6W"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'G-LELND6FC6W');
    </script>

    <style>
        .anotherBanner_img{
            width: 100%;
            height: 650px;
        }
        .evenOddCard::before,
        .mainCard::before{
            display: none;
        }

        @media (max-width: 600px ){
          .evenOddCard:nth-child(even) .evenOddCard_img,
                .evenOddCard:nth-child(odd) .evenOddCard_img{
                  order: 2
                }
                .anotherBanner_img{
            height: 500px;
        }
        }

    </style>

  </head>

  <body>

    @include('front.layouts.header')

    @yield('content')

    @include('front.layouts.footer')

    @include('front.layouts.scripts.js')

    @stack('custom-js-scripts')

  </body>
</html>
