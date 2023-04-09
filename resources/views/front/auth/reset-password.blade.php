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

@extends('front.layouts.master')

@section('title')
    Serry | Coming Soon
@endsection

@push('custom-css-scripts')
<style>
    h1 {
        font-size: 4rem;
        text-align: center;

    }
    .coming-soon {
        padding-bottom: 210px;
        padding-top: 210px;
    }
</style>
@endpush

@section('content')
<div class="coming-soon">
    <h1>Serry | Reset Password</h1>
</div>
@endsection

@push('custom-js-scripts')

@endpush
