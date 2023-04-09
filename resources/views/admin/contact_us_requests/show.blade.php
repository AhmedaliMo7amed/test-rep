@extends('admin.layouts.master')

@section('title')
    Show Contact Request
@endsection

@push('custom-css-scripts')
  
@endpush

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3>View Contact Request</h3>
                </div>


                <!--begin::Form-->
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6 mb-50">
                            <label class="text-bold-600"> First Name</label>
                            <input type="text" name="first_name" class="form-control m-input"
                                value="{{ $contactUsRequest->first_name }}" placeholder="First Name" readonly>
                        </div>
                        <div class="col-lg-6 mb-50">
                            <label class="text-bold-600"> Last Name</label>
                            <input type="text" name="last_name" class="form-control m-input"
                                value="{{ $contactUsRequest->last_name }}" placeholder="Last Name" readonly>
                        </div>
                        <div class="col-lg-6 mb-50">
                            <label class="text-bold-600"> Email</label>
                            <input type="text" name="email" class="form-control m-input"
                                value="{{ $contactUsRequest->email }}" placeholder="Email" readonly>
                        </div>
                        <div class="col-lg-6 mb-50">
                            <label class="text-bold-600"> Phone</label>
                            <input type="text" name="phone" class="form-control m-input"
                                value="{{ $contactUsRequest->phone }}" placeholder="Phone" readonly>
                        </div>
                        <div class="col-lg-6 mb-50">
                            <label class="text-bold-600"> Message</label>
                            <textarea name="message" class="form-control m-input" rows="10" placeholder="Message" readonly>{{ $contactUsRequest->message }}</textarea>
                        </div>
                    </div>
                </div>
                <!--end::Form-->
            </div>

            <!--end::Card-->
        </div>
    </div>
@endsection

@push('custom-js-scripts')

@endpush