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
    Serry | {{ $sub_category->title }}
@endsection

@push('custom-css-scripts')
<style>
.cover {
  object-fit: cover;
  width: 100% !important;
  height: 750px !important;
}

@media (max-width: 600px){
.cover {
    height: 500px !important;
}
}
</style>
@endpush

@section('content')
    <!-- ==================== Main ==================== -->
    <main>
        <!-- ________________ Start Banner Section ________________ -->
        <div class="anotherBanner">
          <img src="{{ $sub_category->photo_path }}" alt="" class="anotherBanner_img img-fluid cover" />
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
        <!-- ________________ start details Section ________________ -->
        <div class="details pt-lg-5 pt-4 mt-lg-5 pb-5">
          <div class="container">
            <div class="row">
              <div class="col-md-6">
                <div class="mainBorder">
                  <h4 class="mainCard_content_categorieName mb-2">{{ $sub_category->title }}</h4>
                  <p class="mainCard_content_desc mb-0 w-100">
                    {!! $sub_category->description !!}
                  </p>
                </div>
  
                <div>
                  <h4 class="anotherFont anotherTitle mb-2">At a glance</h4>
                  <p class="mainCard_content_desc mb-0 w-100">
                    {!! $sub_category->at_a_glance !!}
                  </p>
                </div>
              </div>
  
              <div class="col-md-6">
                <div>
                  <h4 class="mainCard_content_categorieName mb-2">ROOM AMENITIES</h4>
                  <p class="mainCard_content_desc mb-0 w-100">
                    {!! $sub_category->amenities !!}
                  </p>
                </div>
              </div>
  
              <div class="col-md-6 text-right">
                <div class="bookingButton">
                  {{-- <span class="bookingButton_totalPrice"
                    >TOTAL PRICE PER STAY</span
                  >
                  <h2 class="bookingButton_price">EGP 7,500</h2> --}}
                  <button class="globalButton ml-auto">More Info</button>
                </div>
              </div>
            </div>
            {{-- <div class="mainBorder">
              <h4 class="mainCard_content_categorieName mb-2">{{ $sub_category->title }}</h4>
              <p class="mainCard_content_desc mb-0 w-100">
                {!! $sub_category->description !!}
              </p>
            </div>
            <div class="row">
              <div class="col-6">
                <div>
                  <h4 class="anotherFont anotherTitle mb-2">At a glance</h4>
                  {!! $sub_category->at_a_glance !!}
                </div>
              </div>
              <div class="col-6 text-right">
                <div class="bookingButton">
                  <span class="bookingButton_totalPrice"
                    >TOTAL PRICE PER STAY</span
                  >
                  <h2 class="bookingButton_price">EGP 7,500</h2>
                  <button class="globalButton ml-auto">BOOK</button>
                </div>
              </div>
            </div> --}}
          </div>
        </div>
        <!-- ________________ End details Section ________________ -->
        <div class="container">
          <hr />
        </div>
        <!-- ________________ start details Section ________________ -->
        <div class="details pt-4 mt-lg-5 pb-5">
          <div class="container">
            <h4 class="mainCard_content_categorieName pb-md-5 pb-5 mb-md-5  text-center">
              BOOKING TERMS & CONDITIONS
            </h4>
            <div class="row">
              <div class="col-md-4 mb-md-4">
                <div class="d-flex justify-content-between mb-4">
                  <div>
                    <h4 class="mainCard_content_categorieName mb-2">Check-in:</h4>
                    <p class="mainCard_content_desc mb-0 w-100">2 pm</p>
                  </div>
                  <div>
                    <h4 class="mainCard_content_categorieName mb-2">
                      Check-out:
                    </h4>
                    <p class="mainCard_content_desc mb-0 w-100">12 pm</p>
                  </div>
                </div>
                <div class="mb-md-5 pb-md-4 mb-4">
                  <h4 class="mainCard_content_categorieName mb-2">
                    Cancellation Policy:
                  </h4>
                  <p class="mainCard_content_desc mb-0 w-100">
                    Cancellation / prepayment:
                  </p>
                  <p class="mainCard_content_desc mb-0 w-100">
                    - If cancelled up to 5 days before date of arrival, no fee
                    will be charged.
                  </p>
                  <p class="mainCard_content_desc mb-0 w-100">
                    If cancelled later or in case of no-show, 100 % of the first
                    night will be charged.
                  </p>
                </div>
                <div class="pt-md-4 mt-md-4 mb-4">
                  <h4 class="mainCard_content_categorieName mb-2">
                    Refund Policy:
                  </h4>
                  <p class="mainCard_content_desc mb-0 w-100">
                    - In case of booking cancellation your online payment will be
                    refunded through the Arab African Bank Egypt.
                  </p>
                  <p class="mainCard_content_desc mb-0 w-100">
                    - The refund time will take approximately 14 working days from
                    your cancellation date.
                  </p>
                  <p class="mainCard_content_desc mb-0 w-100">
                    - Refunds will be done only through the Original Method of
                    Payment
                  </p>
                  <p class="mainCard_content_desc mb-0 w-100">
                    -In the event that transaction error has occurred while making
                    the payment, a refund in most cases will be issued to the same
                    credit card you used for the original purchase.
                  </p>
                </div>
              </div>
              <div class="col-md-4 mb-md-4">
                <div class="mb-4">
                  <h4 class="mainCard_content_categorieName mb-2">
                    Children Policy:
                  </h4>
                  <p class="mainCard_content_desc mb-0 w-100">
                    All children are welcome.
                  </p>
                  <p class="mainCard_content_desc mb-0 w-100">
                    The following policy will be applied for children when sharing
                    parent’s room:
                  </p>
                  <p class="mainCard_content_desc mb-0 w-100">
                    - First child till 11.99 years old will be free of charge
                    sharing parent’s room same meal plan Max one child.
                  </p>
                  <p class="mainCard_content_desc mb-0 w-100">
                    - Second Child from 02 –05.99 years is free of charge and from
                    06- 11.99 is subject to a 50 % discount from the rate per
                    person in double
                  </p>
                  <p class="mainCard_content_desc mb-0 w-100">
                    - In case of two children up to 11.99 in a separate room will
                    be calculated as a single room accommodation.
                  </p>
                  <p class="mainCard_content_desc mb-0 w-100">
                    - In case of Accompanied children copy of birthday
                    certification is required upon check-in.
                  </p>
                </div>
                <div class="mb-md-0 mb-4">
                  <h4 class="mainCard_content_categorieName mb-2">
                    NON-REFUNDABLE Rooms Policy:
                  </h4>
                  <p class="mainCard_content_desc mb-0 w-100">
                    Bookings made at this rate cannot be cancelled or changed. If
                    you need to cancel or make changes, you will be charged 100%
                    of the total accommodation cost. If you have prepaid, that
                    amount will not be refunded.
                  </p>
                  <p class="mainCard_content_desc mb-0 w-100">
                    Rate requires full prepayment. Credit card will be charged the
                    full cost when booking is completed. Booking is paid to
                    Sindbad Club, Hurghada, Egypt. Some credit card issuing banks
                    may apply additional fees for this transaction.
                  </p>
                </div>
              </div>
              <div class="col-md-4 mb-md-4">
                <div>
                  <h4 class="mainCard_content_categorieName mb-2">
                    NON-REFUNDABLE POLICY:
                  </h4>
                  <p class="mainCard_content_desc mb-0 w-100">Terms</p>
                  <p class="mainCard_content_desc mb-0 w-100">
                    Polices and instruction
                  </p>
                  <p class="mainCard_content_desc mb-0 w-100">
                    • Enjoy free swimming(Bikini) at main pool and access whole
                    hotel outlet by upgrading your stay only 250.00 LE per person
                    per night
                  </p>
                  <p class="mainCard_content_desc mb-0 w-100">
                    • International check out is 12:00 noon, should you require to
                    stay longer please ask the reception for a late check out at a
                    surcharge.
                  </p>
                  <p class="mainCard_content_desc mb-0 w-100">
                    (Day Use rooms are available upon availability and depending
                    on occupancy, please contact the Reception)
                  </p>
                  <p class="mainCard_content_desc mb-0 w-100">
                    • Our Club does not accept cash payments in our outlets,
                    please sign for all your expenses and settle your room bill at
                    the Reception 24 hrs before departure.
                  </p>
                  <p class="mainCard_content_desc mb-0 w-100">
                    • In case you have a food allergy, please contact the
                    reception for assistance.
                  </p>
                  <p class="mainCard_content_desc mb-0 w-100">
                    • Pets are not allowed
                  </p>
                  <p class="mainCard_content_desc mb-0 w-100">
                    • Room service 24hrs, please call #0
                  </p>
                  <p class="mainCard_content_desc mb-0 w-100">
                    • Mini bar upon request, please call #0
                  </p>
                  <p class="mainCard_content_desc mb-0 w-100">
                    • Imported Alcoholic Beverages
                  </p>
                  <p class="mainCard_content_desc mb-0 w-100">
                    • Water Pipes (Shisha)
                  </p>
                  <p class="mainCard_content_desc mb-0 w-100">
                    • Fresh Fruit juices
                  </p>
                  <p class="mainCard_content_desc mb-0 w-100">• Spa services</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- ________________ End details Section ________________ -->
    </main>
      <!-- ==================== Main ==================== -->
@endsection

@push('custom-js-scripts')

@endpush
