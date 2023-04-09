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
    } elseif ($lang == 'de') {
        $prefix = '/de/';
    } elseif ($lang == 'ru') {
        $prefix = '/ru/';
    } elseif ($lang == 'fr') {
        $prefix = '/fr/';
    } else {
        $prefix = '/en/';
    }
    
@endphp

@extends('front.layouts.master')

@section('title')
    Serry | Signin
@endsection

@push('custom-css-scripts')
    <style>
      .container-sign {
            max-width: 750px;
            margin: 125px auto;
            padding: 0;
        }

        .container-form {
            width: 65%;
            margin: auto;
        }

        .head-form {
            font-size: 40px;
            margin-bottom: 76px;
            text-align: center;
        }

        .form-group-password {
            margin: 20px 0;
        }

        .form-label {
            font-size: 11px;
            font-weight: bold;
        }

        .form-control {
            background-color: #ebe8e5;
            border: 0;
        }

        .reset-link {
            text-decoration: underline !important;
            display: block;
            text-align: end;
        }

        hr {
            margin-bottom: 90px;
            background-color: #000;
        }

        .signin-btn {
            display: block;
            margin: auto;
            font-family: 'Montserrat';
            border: 1px solid #000;
            border-radius: 5px;
            padding: 6px 0;
            width: 260px;
            font-size: 12px;
        }

        .signin-btn:hover {
            background-color: #000;
            color: #fff;
        }

        .signup-link {
            text-decoration: underline !important;
            display: block;
            margin-top: 40px;
            text-align: center;
        }
    </style>
@endpush

@section('content')
    <section class="container container-sign">
        <h2 class="head-form text-capitalize">sign in</h2>
        <form>
            <div class="container-form">
                <div class="form-group-email">
                    <label for="exampleInputEmail1" class="form-label text-uppercase"
                        style="font-family: Montserrat">email *</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>

                <div class="form-group-password">
                    <label for="exampleInputPassword1" class="form-label text-uppercase"
                        style="font-family: Montserrat">password *</label>
                    <input type="password" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="form-check text-right">
                    <a href="#" class="text-capitalize reset-link">forget your password</a>
                </div>
            </div>
            <hr />
            <button type="submit" class="signin-btn text-uppercase">sign in</button>
        </form>
        <a class="text-capitalize signup-link">go to sign up</a>
    </section>
@endsection

@push('custom-js-scripts')
@endpush
