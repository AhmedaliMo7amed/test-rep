@extends('front.layouts.master')


@push('custom-js-scripts')
    <script src="https://eu-test.oppwa.com/v1/paymentWidgets.js?checkoutId={{ $checkoutId }}"></script>
@endpush


@section('content')
    <div class="container py-5 px-5 w-50">
        @isset($error)
            <div class="mb-3">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ $error }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span class="fa fa-times"></span>
                    </button>
                </div>
            </div>
        @endisset

        @isset($success)
            <div class="mb-3">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ $success }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span class="fa fa-times"></span>
                    </button>
                </div>
            </div>
        @endisset


        <form action="{{ route('payment.status', $checkoutId) }}" class="paymentWidgets" data-brands="VISA MASTER AMEX">
        </form>
    </div>
@endsection
