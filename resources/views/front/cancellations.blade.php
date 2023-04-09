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
    Serry | Cancellations
@endsection

@push('custom-css-scripts')

@endpush

@section('content')
    <!-- ==================== Main ==================== -->
    <main>
        <!-- ________________ Start Banner Section ________________ -->
        <div class="anotherBanner">
            <img src="{{ asset('front/img/rest/bg.jpg') }}" alt="" class="img-fluid anotherBanner_img" />
            <div class="anotherBanner_content">
              <div class="container">

              </div>
            </div>
          </div>
        <!-- ________________ End Banner Section ________________ -->
        <div class="container my-5">

          <div class="accordion" id="accordionExample">
            <div class="card">
              <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                  <button class="d-flex justify-content-between align-items-center btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    <h5 class="">BOOKING CONDITIONS</h5>
                    <i class="fa fa-plus"></i>
                    <i class="fa fa-minus"></i>
                  </button>
                </h2>
              </div>

              <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                  <p>Serry website is owned and operated by Sindbad Hospitality Developments. Customers are
                    responsible for reading the terms and conditions including booking conditions. The guest agree
                    to abide by the terms and conditions of purchase imposed by The Serry Collection with whom
                    guest elect to deal. Guest understand that any violation of any such conditions of purchase may
                    result in cancellation of client reservations or purchases, in client being denied access to Serry,
                    and in forfeiting any monies paid for such reservations or purchases, and Serry debiting guest
                    account for any costs we incur as a result of such violation. Guest will be completely responsible
                    for all charges, fees, duties, taxes, and assessments arising out of client use of this website, and,
                    without limitation, guest will be responsible for all charges, fees, duties, taxes, and assessments</p>
                    
                  <p>arising out of transactions performed by others on guest behalf, whether or not such uses were
                    performed with client consent. With respect to hotel reservations and ground arrangements
                    made directly through this website, guest reservation will become confirmed once guest have
                    sent an on-line confirmation and provided guest credit card details, and paid the total amount
                    due in full OR any required deposits and when we acknowledge receipt of full payment OR
                    deposit. In some cases an initial non-refundable deposit may be charged.</p>
                </div>
              </div>
            </div>


              <div class="card">
                <div class="card-header" id="headingTwo">
                  <h2 class="mb-0">
                    <button class="d-flex justify-content-between align-items-center btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                      <h5 class="">BOOKING YOUR STAY</h5>
                      <i class="fa fa-plus"></i>
                      <i class="fa fa-minus"></i>
                    </button>
                  </h2>
                </div>
            
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                  <div class="card-body">
                    <p>A booking is accepted only after we receive written confirmation from the guest along with full
                      payment for accommodation and travel arrangements. (This may be waived solely at the
                      discretion of Serry. For booking made via our Internet Booking Engine the full payment or for
                      email inquiries, the full payment or payment of a deposit or guest written confirmation will
                      indicate an acceptance of these terms and conditions by the guest.</p>
                  </div>
                </div>
              </div>


              <div class="card">
                <div class="card-header" id="headingThree">
                  <h2 class="mb-0">
                    <button class="d-flex justify-content-between align-items-center btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                      <h5>FINAL PAYMENT</h5>
                      <i class="fa fa-plus"></i>
                      <i class="fa fa-minus"></i>
                    </button>
                  </h2>
                </div>
            
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                  <div class="card-body">
                    <p>If balance of payment is due for the guest travel arrangements/hotel reservation, the balance
                      payment must be paid by the guest before leaving the hotel.</p>
                  </div>
                </div>
              </div>


              <div class="card">
                <div class="card-header" id="headingFour">
                  <h2 class="mb-0">
                    <button class="d-flex justify-content-between align-items-center btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                      <h5>METHODS OF PAYMENT</h5>
                      <i class="fa fa-plus"></i>
                      <i class="fa fa-minus"></i>
                    </button>
                  </h2>
                </div>
            
                <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                  <div class="card-body">
                    <p>Payments for full or part payment for the travel arrangements/ hotel Reservation may be made
                      either by 1) bank transfer or 2) credit card (Visa, MasterCard). If paid via bank transfer, all
                      additional charges and fees related to the transfer will be borne by the guest.
                      If paying by credit card you can either pay through our secure internet payment gateway facility
                      available on our website theserry.com</p>

                     <p> Or, guest could do so by filling in, signing and returning to us a credit card authorization form
                      that we will send to the guest indicating the total amount due. Providing Serry this information
                      in a form via email at the client’s own discretion/risk. Client can return these forms to Serry
                      either through email.
                      If paying by credit through the secure internet online payment gateway, the guest payments are
                      processed entirely on the Secure Payment Sites for MasterCard, American Express and Visa card
                      payments. Guest card details are not received or stored by Serry in any form, and when client
                      place an order as part of the checkout process the guest is automatically taken to the Secure
                      Payment facility for MasterCard, American Express and Visa card payments.
                      SSL, security internet protocol known as Secure Socket Layer, uses connection-oriented end-to-
                      end encryption to provide data confidentiality service and data integrity service for application
                      layer traffic between the guest web browser and the secured payment gateway servers. It
                      provides data encryption, server and guest authentication and message integrity between the
                      guest and the web server.</p>
                  </div>
                </div>
              </div>



              <div class="card">
                <div class="card-header" id="headingFive">
                  <h2 class="mb-0">
                    <button class="d-flex justify-content-between align-items-center btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
                      <h5>PRICE POLICY</h5>
                      <i class="fa fa-plus"></i>
                      <i class="fa fa-minus"></i>
                    </button>
                  </h2>
                </div>
            
                <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
                  <div class="card-body">
                    <p>The price of guest travel arrangements/ hotel reservation is subject to the possibility of changes
                      and surcharges beyond our control and may occur because of governmental action, currency
                      exchange rate fluctuation and increases in suppliers’ prices as an example. If the price of client
                      travel arrangements/hotel reservation is increased by any matters outside our control then the
                      guest must either pay the additional price to us when we request it or cancel guest travel
                      arrangements/ hotel reservation in accordance with these Booking Conditions.</p>
                  </div>
                </div>
              </div>

              
              <div class="card">
                <div class="card-header" id="headingSix">
                  <h2 class="mb-0">
                    <button class="d-flex justify-content-between align-items-center btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="true" aria-controls="collapseSix">
                      <h5>CHILD POLICY</h5>
                      <i class="fa fa-plus"></i>
                      <i class="fa fa-minus"></i>
                    </button>
                  </h2>
                </div>
            
                <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionExample">
                  <div class="card-body">
                    <p>Serry will consider the following conditions as our Child Policy: A kid that is aged younger than
                      24 months old is considered as ‘Infant’ and will be FOC when sharing parents’ bed. If an extra
                      bed is required, there will be an additional supplement as specified by the resort. A kid that is
                      aged anywhere between 24 months and 12 years old is considered as ‘Child’ and the respective
                      resorts Child Policies and rates will apply to them. 12 years old and above will be considered as
                      ‘Adult’..</p>
                  </div>
                </div>
              </div>


              <div class="card">
                <div class="card-header" id="headingSeven">
                  <h2 class="mb-0">
                    <button class="d-flex justify-content-between align-items-center btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="true" aria-controls="collapseSeven">
                      <h5>BOOKING CONFIRMATION</h5>
                      <i class="fa fa-plus"></i>
                      <i class="fa fa-minus"></i>
                    </button>
                  </h2>
                </div>
            
                <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordionExample">
                  <div class="card-body">
                    <p>If booking is made through the internet payment gateway</p>    
                    <p>Please do not reply to the guest auto generated booking confirmation email. Should the guest
                        like to contact us regarding guest reservation please email us on reservation@theserry.com and
                        mention guest booking reference number, including name, dates and the hotel. Guest can also
                        call us on +20 65 340 4228 anytime of the day, all week long..</p>
                  </div>
                </div>
              </div>




              <div class="card">
                <div class="card-header" id="headingEight">
                  <h2 class="mb-0">
                    <button class="d-flex justify-content-between align-items-center btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseEight" aria-expanded="true" aria-controls="collapseEight">
                      <h5>RATES</h5>
                      <i class="fa fa-plus"></i>
                      <i class="fa fa-minus"></i>
                    </button>
                  </h2>
                </div>
            
                <div id="collapseEight" class="collapse" aria-labelledby="headingEight" data-parent="#accordionExample">
                  <div class="card-body">
                    <p>The rates listed on the online booking engine may vary depending on if guest is an Egyptian,
                      Egypt resident visa holder or a foreign national. These rates may/will vary depending on the
                      nationality of the guest who is attempting to make a reservation through the online booking
                      engine. Each section may have different rate structures depending on the offers available and
                      the guest will be able to make a reservation depending on all the criteria of the booking
                      conditions being met. If all the requested criteria are not met, Serry has the right to request the
                      guest to amend the reservation or cancel the reservation..</p>
                  </div>
                </div>
              </div>

              <div class="card">
                <div class="card-header" id="headingNine">
                  <h2 class="mb-0">
                    <button class="d-flex justify-content-between align-items-center btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseNine" aria-expanded="true" aria-controls="collapseNine">
                      <h5>RATE CHANGES</h5>
                      <i class="fa fa-plus"></i>
                      <i class="fa fa-minus"></i>
                    </button>
                  </h2>
                </div>
            
                <div id="collapseNine" class="collapse" aria-labelledby="headingNine" data-parent="#accordionExample">
                  <div class="card-body">
                    <p>Different rate categories are listed on the online booking engine, regardless of the currency it is
                      listed under or/and the offer(s) available is subject to change at the discretion of Serry. Since
                      rates are subject to change frequently there might be more than one rate for a given date. Once
                      the confirmation voucher is generated through the booking engine and provided that the
                      booking is within the cancelation period. (Please see below for more information about
                      amendments and cancellations) it is not possible to change/amend the original rate the
                      reservation was confirmed under.</p>
                  </div>
                </div>
              </div>


              <div class="card">
                <div class="card-header" id="headingTen">
                  <h2 class="mb-0">
                    <button class="d-flex justify-content-between align-items-center btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTen" aria-expanded="true" aria-controls="collapseTen">
                      <h5>AMENDMENTS AND CANCELLATION POLICY</h5>
                      <i class="fa fa-plus"></i>
                      <i class="fa fa-minus"></i>
                    </button>
                  </h2>
                </div>
            
                <div id="collapseTen" class="collapse" aria-labelledby="headingTen" data-parent="#accordionExample">
                  <div class="card-body">
                    <p>While we will use our best endeavors to provide all travel arrangements/hotel reservations as
                      confirmed, reasonable changes in the reservation may occur.</p>

                      <strong>Nonrefundable Rate plan:</strong>
                      <p>We will not be able to provide cancellations or changes for nonrefundable bookings. Full
                        payment will be charged after the reservation.</p>

                        <strong>Standard Rate plan:</strong>
                        <p>The guest can cancel or amend his booking free of charge up to seven days before the date of
                          arrival. After that, 100% of the room rate for the entire stay will be charged as a cancellation fee
                          or no-show.</p>


                       <strong>Important information:</strong>   
                       <p>-Guests are required to show a photo identification and credit card upon check-in. Please
                        note that all special requests are subject to availability and additional charges may apply.</p>

                        <p>- Please inform us in advance of your expected arrival time via bookings@theserry.com</p>

                        <p>- Languages spoken:  Arabic, English, French and German.</p>



                  </div>
                </div>
              </div>



        </div>
    </main>
    <!-- ==================== Main ==================== -->
@endsection

@push('custom-js-scripts')

@endpush
