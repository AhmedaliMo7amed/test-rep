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

Spa, Gym & Yoga | Serry Beach Resort

@endsection



@section('description')

Find inspiration & wellness in yoga at Serry’s Nomad Spa, play beach volleyball, work out at the gym, or explore underwater beauty with PADI diving classes.

@endsection



@section('keywords')

nomad spa, hurghada gym, spa hurghada, hurghada diving, diving in hurghada prices, fitness hurghada, aquatic workouts, water exercise, beach volleyball, play pingpong, padi open water in hurghada, open water course in hurghada, dive base academy, hurghada yoga

@endsection



@push('custom-css-scripts')

<style>
    .anotherBanner_content_title-b:first-of-type:before{
        background: #000;
    }

    .anotherBanner_content_title-w:first-of-type:before{
        background: #fff;
    }
    </style>
@endpush



@section('content')

    <!-- ==================== Main ==================== -->

    <main>

        <!-- ________________ Start Banner Section ________________ -->

        <div class="anotherBanner">

            <img src="{{ asset('uploads/category_images/banners/'.$category->banner_image) }}" alt="" class="img-fluid anotherBanner_img" />

            <div class="anotherBanner_content">

              <div class="container">

                <h1 class="arabFont anotherBanner_content_title {{ $category->banner_color == 0 ? 'anotherBanner_content_title-b' : 'anotherBanner_content_title-w' }}" style='{{ $category->banner_color == 0 ? 'color:#000' : 'color:#fff' }}'>{{ $category->banner_header }}</h1>

                <h1 class="anotherBanner_content_title" style='{{ $category->banner_color == 0 ? 'color:#000' : 'color:#fff' }}'>{{ $category->banner_title }}</h1>

                <p class="anotherBanner_content_desc" style='{{ $category->banner_color == 0 ? 'color:#000' : 'color:#fff' }}'>

                  {{ $category->banner_description }}

                </p>

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

        </div>

        <!-- ________________ End Banner Section ________________ -->

        <!-- ________________ start categories Section ________________ -->

        <section class="categories pt-lg-5 pt-4 mt-lg-5 pb-5">

          <div class="container">

            <div class="row">

                @if(isset($category))

                    @foreach($category->sub_categories as $sub_category)

                        <div class="col-md-6 evenOddCard">

                            <div class="d-flex flex-column">

                                @if ($sub_category->has_carousel == 0)

                                <img src="{{ $sub_category->photo_path }}" alt="" class="evenOddCard_img" />

                                @elseif ($sub_category->has_carousel == 1)


                                <div id="carouselExampleIndicators{{ $sub_category->id }}" class="evenOddCard_img carousel slide" data-interval="false">
                                    <ol class="carousel-indicators">
                                        @isset($sub_category->carousel_img_1)
                                        <li data-target="#carouselExampleIndicators{{ $sub_category->id }}" data-slide-to="0" class="active"></li>
                                        @endisset
                                        @isset($sub_category->carousel_img_2)
                                        <li data-target="#carouselExampleIndicators{{ $sub_category->id }}" data-slide-to="1" class="active"></li>
                                        @endisset
                                        @isset($sub_category->carousel_img_3)
                                        <li data-target="#carouselExampleIndicators{{ $sub_category->id }}" data-slide-to="2" class="active"></li>
                                        @endisset
                                        @isset($sub_category->carousel_img_4)
                                        <li data-target="#carouselExampleIndicators{{ $sub_category->id }}" data-slide-to="3" class="active"></li>
                                        @endisset
                                        @isset($sub_category->carousel_img_5)
                                        <li data-target="#carouselExampleIndicators{{ $sub_category->id }}" data-slide-to="4" class="active"></li>
                                        @endisset


                                    </ol>
                                    <div class="carousel-inner">
                                        @isset($sub_category->carousel_img_1)
                                        <div class="carousel-item active">
                                            <img class="d-block w-100 evenOddCard_img" src="{{ asset('uploads/carousel/'.$sub_category->carousel_img_1) }}" alt="Serry Carousel">
                                        </div>
                                        @endisset
                                        @isset($sub_category->carousel_img_2)
                                        <div class="carousel-item">
                                            <img class="d-block w-100 evenOddCard_img" src="{{ asset('uploads/carousel/'.$sub_category->carousel_img_2) }}" alt="Serry Carousel">
                                        </div>
                                        @endisset
                                        @isset($sub_category->carousel_img_3)
                                        <div class="carousel-item">
                                            <img class="d-block w-100 evenOddCard_img" src="{{ asset('uploads/carousel/'.$sub_category->carousel_img_3) }}" alt="Serry Carousel">
                                        </div>
                                        @endisset
                                        @isset($sub_category->carousel_img_4)
                                        <div class="carousel-item">
                                            <img class="d-block w-100 evenOddCard_img" src="{{ asset('uploads/carousel/'.$sub_category->carousel_img_4) }}" alt="Serry Carousel">
                                        </div>
                                        @endisset
                                        @isset($sub_category->carousel_img_5)
                                        <div class="carousel-item">
                                            <img class="d-block w-100 evenOddCard_img" src="{{ asset('uploads/carousel/'.$sub_category->carousel_img_5) }}" alt="Serry Carousel">
                                        </div>
                                        @endisset





                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleIndicators{{ $sub_category->id }}" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"
                                            style="background-image: url({{ asset('uploads/helpers/left.svg') }});"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleIndicators{{ $sub_category->id }}" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"
                                            style="background-image: url({{ asset('uploads/helpers/right.svg') }});"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>


                                @endif


                                <div class="classes.evenOddCard_content">

                                    <h4 class="anotherFont evenOddCard_content_title">

                                        {{ $sub_category->title }}

                                    </h4>

                                    <p class="evenOddCard_content_desc">

                                        {!! $sub_category->description !!}

                                   @isset($sub_category->long_desc)
                                        @if(strlen(strip_tags($sub_category->long_desc)) > 0)
                                        <p><button href="#" class="show_hide" data-content="toggle-text" data-action="long_desc{{ $sub_category->id }}">Read More</button>
                                            <div id="long_desc{{ $sub_category->id }}" class="long_desc">{!! $sub_category->long_desc  !!}</div>
                                        </p>
                                        @endif
                                    @endisset

                                    </p>

                                </div>

                            </div>

                        </div>

                    @endforeach

                @endif

            </div>

          </div>

        </section>

        <!-- ________________ End categories Section ________________ -->

    </main>

      <!-- ==================== Main ==================== -->

@endsection



@push('custom-js-scripts')

<script>
    $(document).ready(function () {

        $(".long_desc").hide();

        $(".show_hide").on("click", function () {
            var data_id = $(this).data("action");
            var txt = $("#"+data_id).is(':visible') ? 'Read More' : 'Read Less';
            $(".show_hide").text(txt);
            $("#"+data_id).slideToggle(200);
        });
    });
    </script>



@endpush

