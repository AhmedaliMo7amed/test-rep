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

Book Deluxe Rooms, Suites & Chalets | Serry Beach Resort

@endsection



@section('description')

Relax in family rooms, two-bedroom chalets or penthouse suites with sea or pool views. Book at Serry Beach Resort and enjoy quality time in comfort and privacy.

@endsection



@section('keywords')

book hotel hurghada, two bedroom suite, luxury penthouse suite, two bedroom chalet, hotels with 2 bedroom suites, double room suites, double bedroom suites, 2 room hotel suites, four bedroom hotel, serry beach resort, red sea view resort hurghada

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

                <h1 class="arabFont anotherBanner_content_title  {{ $category->banner_color == 0 ? 'anotherBanner_content_title-b' : 'anotherBanner_content_title-w' }}" style='{{ $category->banner_color == 0 ? 'color:#000' : 'color:#fff' }}'>{{ $category->banner_header }}</h1>

                <h1 class="anotherBanner_content_title" style='{{ $category->banner_color == 0 ? 'color:#000' : 'color:#fff' }}'>{{ $category->banner_title }}</h1>

                <p class="anotherBanner_content_desc" style='{{ $category->banner_color == 0 ? 'color:#000' : 'color:#fff' }}'>

                  {{ $category->banner_description }}

                </p>

              </div>

            </div>

          <!--<div class="checkIn">-->

          <!--  <form>-->

          <!--    <div class="row">-->

          <!--      <div class="mb-lg-0 mb-4 col-lg-3 col-md-9 col-12">-->

          <!--        <div class="form-gorup">-->

          <!--          <label>CHECK-IN / CHECK-OUT</label>-->

          <!--          <div class="dateContainer">-->

          <!--            <input class="check-in form-control js-daterangepicker" type="text" name="daterange" value="01/01/2023 - 01/01/2023" />-->

          <!--          </div>-->

          <!--        </div>-->

          <!--      </div>-->

          <!--      <div class="mb-lg-0 mb-4 col-lg-2 col-md-3 col-6">-->

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

          <!--      <div class="mb-lg-0 mb-4 col-lg-2 col-md-3 col-6">-->

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

          <!--      <div class="mb-lg-0 mb-4 col-lg-3 col-md-9 col-12">-->

          <!--        <div class="form-gorup">-->

          <!--          <label>ROOM TYPE</label>-->

          <!--          <div class="dateContainer">-->

          <!--            <select name="ROOM TYPE" id="room-type" class="form-control">-->

          <!--              <option value="roomtype">DELUXE ROOM</option>-->

          <!--              <option value="room">DELUXE FAMILY ROOM</option>-->

          <!--              <option value="room">TWO-BEDROOM CHALET</option>-->

          <!--              <option value="room">PENTHOUSE SUITE</option>-->

          <!--              <option value="room">TWO-BEDROOM SUITE</option>-->

          <!--              <option value="room">SIGNATURE SUITE</option>-->

          <!--              <option value="room">FOUR-BEDROOM SUITE</option>-->



          <!--            </select>-->

          <!--          </div>-->

          <!--        </div>-->

          <!--      </div>-->

          <!--      <div class="align-self-center col-lg-2 col-md-4">-->

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

            <div class="row " >

                @if(isset($category))

                    @foreach($category->sub_categories as $sub_category)

                        <div class="col-md-6 mainCard p-4">

                            @if ($sub_category->has_carousel == 0)

                            <img src="{{ $sub_category->photo_path }}" alt="" class="mainCard_img mb-0" />

                            @elseif ($sub_category->has_carousel == 1)


                            <div id="carouselExampleIndicators{{ $sub_category->id }}" class="carousel slide" data-interval="false">
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
                                        <img class="d-block w-100" src="{{ asset('uploads/carousel/'.$sub_category->carousel_img_1) }}" alt="Serry Carousel">
                                    </div>
                                    @endisset
                                    @isset($sub_category->carousel_img_2)
                                    <div class="carousel-item">
                                        <img class="d-block w-100" src="{{ asset('uploads/carousel/'.$sub_category->carousel_img_2) }}" alt="Serry Carousel">
                                    </div>
                                    @endisset
                                    @isset($sub_category->carousel_img_3)
                                    <div class="carousel-item">
                                        <img class="d-block w-100" src="{{ asset('uploads/carousel/'.$sub_category->carousel_img_3) }}" alt="Serry Carousel">
                                    </div>
                                    @endisset
                                    @isset($sub_category->carousel_img_4)
                                    <div class="carousel-item">
                                        <img class="d-block w-100" src="{{ asset('uploads/carousel/'.$sub_category->carousel_img_4) }}" alt="Serry Carousel">
                                    </div>
                                    @endisset
                                    @isset($sub_category->carousel_img_5)
                                    <div class="carousel-item">
                                        <img class="d-block w-100" src="{{ asset('uploads/carousel/'.$sub_category->carousel_img_5) }}" alt="Serry Carousel">
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


                            <div class="mainCard_content">

                            <h4 class="anotherFont mainCard_content_title mt-3">{{ $sub_category->title }}</h4>

                            <div class="mainCard_content_desc">

                               <p>
                                   {!! $sub_category->description !!}
                               
                               </p> 

                                @isset($sub_category->long_desc)
                                        @if(strlen(strip_tags($sub_category->long_desc)) > 0)
                                        <p><button href="#" class="show_hide" data-content="toggle-text" data-action="long_desc{{ $sub_category->id }}">Read More</button>
                                            <div id="long_desc{{ $sub_category->id }}" class="long_desc">{!! $sub_category->long_desc  !!}</div>
                                        </p>
                                        @endif
                                @endisset

                            </div>
                            
                            @if($sub_category->btn_visibility)

                                <a href="{{ url($prefix . 'rest/' . $sub_category->slug) }}" class="anotherFont mainCard_content_link">
                                    @if($sub_category->btn_text)
                                        {{$sub_category->btn_text}}
                                    @else
                                        More Info
                                    @endif
                                </a>
                            @endif


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

