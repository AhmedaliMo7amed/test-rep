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

    Serry Beach Resort | Experience Luxury in Hurghada, Egypt

@endsection



@section('description')

    Serry offers the beauty of Sinai for a fun holiday with friends or family. Relax in warm hospitality, explore our food

    culture, and enjoy various activities.

@endsection



@section('keywords')

    hurghada hotels, best hotels in hurghada, tripadvisor hurghada, hurghada resorts, hurghada hotels booking, book hotel in

    hurghada, booking hurghada, serry beach resort, book hotel in egypt

@endsection



@push('custom-css-scripts')



    <style>

        .swiper-slide{
            height: 650px !important;
        }

        .anotherBanner_content_title-b:first-of-type:before {
            background: #000;
        }

        .anotherBanner_content_title-w:first-of-type:before {
            background: #fff;
        }

        @media (max-width: 768px) {
            .home-banner-image,
            .anotherBanner_content {
                height: 40vh !important
            }
            .anotherBanner_content {
                margin-top: 20% !important;
                padding: 0 !important;
            }
            .swiper-slide{
                height: 540px !important;
            }

        }

    </style>

@endpush



@section('content')

    <!-- ==================== Main ==================== -->

    <main>

        <!-- ________________ Start Banner Section ________________ -->

        <section class="banner">

            <div class="swiper-container mySwiper">

                <div class="swiper-wrapper">

                    <div class="swiper-slide">

                        <img src="{{ asset('uploads/home-banners/' . $setting->banner_image) }}" alt=""

                            class="img-fluid anotherBanner_img" />



                        <div class="anotherBanner_content">



                            <div class="container">



                                <h1 class="arabFont anotherBanner_content_title {{ $setting->banner_color == 0 ? 'anotherBanner_content_title-b' : 'anotherBanner_content_title-w' }}"

                                    style='{{ $setting->banner_color == 0 ? 'color:#000' : 'color:#fff' }}'>

                                    {{ $setting->banner_header }}</h1>



                                <h1 class="anotherBanner_content_title"

                                    style='{{ $setting->banner_color == 0 ? 'color:#000' : 'color:#fff' }}'>

                                    {{ $setting->banner_title }}</h1>



                                <p class="anotherBanner_content_desc"

                                    style='{{ $setting->banner_color == 0 ? 'color:#000' : 'color:#fff' }}'>

                                    {!! $setting->banner_description !!}



                                </p>



                            </div>



                        </div>

                    </div>

                </div>

            </div>

            <!--<div class="checkIn">-->

            <!--  <form>-->

            <!--    <div class="row">-->

            <!--      <div class="mb-lg-0 mb-4 col-lg-4 col-md-9 col-12">-->

            <!--        <div class="form-gorup">-->

            <!--          <label>CHECK-IN / CHECK-OUT</label>-->

            <!--          <div class="dateContainer">-->

            <!--            <input class="check-in form-control js-daterangepicker" type="text" name="daterange" value="01/01/2023 - 01/01/2023" />-->

            <!--          </div>-->

            <!--        </div>-->

            <!--      </div>-->

            <!--      <div class="mb-lg-0 mb-4 col-lg-2 col-md-4 col-6">-->

            <!--        <div class="form-gorup">-->

            <!--          <label>ADULTS</label>-->

            <!--          <div class="quantity">-->

            <!--            <input-->

            <!--              type="button"-->

            <!--              value="-"-->

            <!--              class="quantity_button quantity_button__minus"-->

            <!--            />-->

            <!--            <input-->

            <!--              type="number"-->

            <!--              class="quantity_control"-->

            <!--              disabled-->

            <!--              value="0"-->

            <!--            />-->

            <!--            <input-->

            <!--              type="button"-->

            <!--              value="+"-->

            <!--              class="quantity_button quantity_button__plus"-->

            <!--            />-->

            <!--          </div>-->

            <!--        </div>-->

            <!--      </div>-->

            <!--      <div class="mb-lg-0 mb-4 col-lg-2 col-md-4 col-6">-->

            <!--        <div class="form-gorup">-->

            <!--          <label>CHILDREN</label>-->

            <!--          <div class="quantity">-->

            <!--            <input-->

            <!--              type="button"-->

            <!--              value="-"-->

            <!--              class="quantity_button quantity_button__minus"-->

            <!--            />-->

            <!--            <input-->

            <!--              type="number"-->

            <!--              class="quantity_control"-->

            <!--              disabled-->

            <!--              value="0"-->

            <!--            />-->

            <!--            <input-->

            <!--              type="button"-->

            <!--              value="+"-->

            <!--              class="quantity_button quantity_button__plus"-->

            <!--            />-->

            <!--          </div>-->

            <!--        </div>-->

            <!--      </div>-->



            <!--      <div class="align-self-center col-lg-4 col-md-4">-->

            <!--        <button class="globalButton ml-md-auto">-->

            <!--          CHECK AVAILABILITY-->

            <!--        </button>-->

            <!--      </div>-->

            <!--    </div>-->

            <!--  </form>-->

            <!--</div>-->

        </section>

        <!-- ________________ End Banner Section ________________ -->

        <!-- ________________ start categories Section ________________ -->

        <section class="categories pt-lg-5 pt-4 mt-lg-5 pb-5">

            <div class="container">

                <div class="row">

                    @foreach ($categories as $category)

                        <div class="col-md-6 mainCard">

                            <img src="{{ $category->photo_path }}" alt="" class="mainCard_img" />



                            <div class="mainCard_content">

                                <h6 class="mainCard_content_categorieName">{{ $category->title }}</h6>

                                <h5 class="anotherFont mainCard_content_activityName">

                                    {{ $category->header_subtitle }}

                                </h5>

                                <h4 class="anotherFont mainCard_content_title">

                                    {{ $category->header_title }}

                                </h4>

                                <p class="mainCard_content_desc">

                                    {!! $category->description !!}

                                </p>

                                @if ($category->real_title !== 'explore')

                                    <a href="{{ url($prefix . $category->real_title) }}"

                                        class="anotherFont mainCard_content_link">

                                        read more

                                    </a>

                                @else

                                    <a href="#" style="pointer-events: none; cursor: default;"

                                        class="anotherFont mainCard_content_link">

                                        read more (Coming Soon)

                                    </a>

                                @endif

                            </div>

                        </div>

                    @endforeach

                </div>

            </div>

        </section>

        <!-- ________________ End categories Section ________________ -->

    </main>

    <!-- ==================== Main ==================== -->

@endsection



@push('custom-js-scripts')

@endpush

