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
    Serry | Contact Us
@endsection

@push('custom-css-scripts')
@endpush

@section('content')
    <!-- ==================== Main ==================== -->
    <main>
        <!-- ________________ Start Banner Section ________________ -->
        <div class="anotherBanner">
            <img src="img/searchResults/bg.jpg" alt="" class="anotherBanner_img img-fluid" />
            <div class="anotherBanner_content">
                <div class="container">
                    <img src="img/global/presonal.png" alt="" class="img-fluid" />
                </div>
            </div>
        </div>
        <!-- ________________ End Banner Section ________________ -->
        <!-- ________________ start form Section ________________ -->
        <div class="mainForm mt-5 mb-5">
            <div class="container">
                <h3 class="mainForm_title">
                    CONTACT US
                </h3>
                <form action="#" name="coolform" id="coolform" method="post" onSubmit="return false">
                    <div class="form-row">
                        <div class="form-group col-md-6 pl-md-6 pr-md-6">
                            <label for="first_name">FIRST NAME*</label>
                            <input type="text" class="form-control" id="first_name" name="first_name">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="last_name">LAST NAME*</label>
                            <input type="text" class="form-control" id="last_name" name="last_name">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="phone">MOBILE NUMBER*</label>
                            <input type="number" class="form-control" id="phone" name="phone">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="email">EMAIL*</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>
                        <div class="form-group col-md-6 pl-md-6 pr-md-6">
                            <label for="message">MESSAGE*</label>
                            <textarea rows="5" class="form-control" id="message" name="message"></textarea>
                        </div>
                    </div>
                    <hr>
                    <div class="row justify-content-center">
                        <div class="col-3">
                            <button type="submit" onclick="goldenConinsForm()"
                                class="sendBTN globalButton mt-3 pt-2 pb-2 w-100">SEND MESSAGE</button>
                        </div>
                    </div>
                </form>
                <div class="loader" style="display: none; text-align:center; font-size: 50px;">...</div>
                <div id="errorMsg" style="display:none; text-align:center; padding-top: 30px;">
                    <p style="font-size:13px; text-align:center; float:none; color:red;"></p>
                </div>
                <div id="successMsg" style="display:none; text-align:center; padding-top: 30px;">
                    <p style="font-size:13px; text-align:center; float:none; color:green;"></p>
                </div>
            </div>
        </div>
        <!-- ________________ End form Section ________________ -->
    </main>
    <!-- ==================== Main ==================== -->
@endsection

@push('custom-js-scripts')
    <script>
        function goldenConinsForm() {

            $('.sendBTN').attr("disabled", "disabled");

            var reg = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;

            var reg_mob = /^([+]?[\s0-9]+)?(\d{3}|[(]?[0-9]+[)])?([-]?[\s]?[0-9])+$/i;

            var first_name = $('#first_name').val();

            var last_name = $('#last_name').val();

            var phone = $('#phone').val();

            var email = $('#email').val();

            var message = $('#message').val();

            $('#errorMsg').fadeOut();

            if (first_name.trim() === '') {

                $('#first_name').focus();

                $('#errorMsg p').text('Please enter your first name');

                $('#errorMsg').fadeIn();

                $('.sendBTN').removeAttr("disabled");

                return false;

            } else if (last_name.trim() === '') {

                $('#last_name').focus();

                $('#errorMsg p').text('Please enter your last name');

                $('#errorMsg').fadeIn();

                $('.sendBTN').removeAttr("disabled");

                return false;

            } else if (phone.trim() === '') {

                $('#phone').focus();

                $('#errorMsg p').text('Please enter your mobile number');

                $('#errorMsg').fadeIn();

                $('.sendBTN').removeAttr("disabled");

                return false;

            }

            else if (phone.length < 11 || phone.length > 16) {

                $('#phone').focus();

                $('#errorMsg p').text('Mobile number must be between 11 : 16 digits');

                $('#errorMsg').fadeIn();

                $('.sendBTN').removeAttr("disabled");

                return false;

            }

            else if (!phone.match(reg_mob)) {

                $('#phone').focus();

                $('#errorMsg p').text('Phone is not valid');

                $('#errorMsg').fadeIn();

                $('.sendBTN').removeAttr("disabled");

                return false;

            } else if (email.trim() === '') {

                $('#email').focus();

                $('#errorMsg p').text('Please enter your email');

                $('#errorMsg').fadeIn();

                $('.sendBTN').removeAttr("disabled");

                return false;

            } else if (!email.match(reg)) {

                $('#email').focus();

                $('#errorMsg p').text('Email is not valid');

                $('#errorMsg').fadeIn();

                $('.sendBTN').removeAttr("disabled");

                return false;

            } else if (message.trim() === '') {

                $('#message').focus();

                $('#errorMsg p').text('Please enter your message');

                $('#errorMsg').fadeIn();

                $('.sendBTN').removeAttr("disabled");

                return false;

            } else {

                $('#errorMsg').fadeOut();

                var data = {};

                data['_token'] = '{{ csrf_token() }}';

                data['first_name'] = first_name;

                data['last_name'] = last_name;

                data['phone'] = phone;

                data['email'] = email;

                data['message'] = message;

                $('.loader').fadeIn();


                $.ajax({

                    url: "{{ route('contactUsRequest') }}",

                    type: 'POST',

                    data: data,

                    success: function(response) {
                        console.log(response)

                        $('.loader').fadeOut();

                        $('.sendBTN').removeAttr("disabled");

                        if (response.success) {

                            $('#errorMsg').fadeOut();

                            $('input#first_name, input#last_name, input#email, input#phone, textarea#message')
                                .val('');

                            $('#successMsg p').html(
                                'Thank you for contacting Serry! <br> We have successfully received your message, and our team will get back to you as soon as possible.'
                            );

                            $('#successMsg').fadeIn();

                        } else {

                            $('#errorMsg p').text('Something went wrong... Please try again later');

                            $('#errorMsg').fadeIn();

                        }

                    }

                });

            }

        }
    </script>
@endpush
