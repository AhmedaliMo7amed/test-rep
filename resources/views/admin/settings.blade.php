@extends('admin.layouts.master')

@section('title')
    Settings
@endsection

@push('custom-css-scripts')
    <link rel="stylesheet" href="{{ asset('admin/libs/summernote/summernote.min.css') }}" />

    <style>
        .form-check-input-black:checked {
            background-color: #000000;
            border-color: #5a8dee;
        }

        .form-check-input-white:checked {
            background-color: #e3e3e3;
            border-color: #5a8dee;
        }
    </style>

@endpush

@section('content')
<div class="row">
    <div class="col-12">
        @include('admin.flash-message')
        <div class="card">
            <div class="card-header">
                <h3>Settings</h3>
            </div>


            <!--begin::Form-->
            <form action="{{ route('admin_panel.update_settings') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12 {{ $errors->has('website_name') ? ' has-error' : '' }} mb-50">
                            <label class="text-bold-600">Website Name <span class="text-danger">*</span> </label>

                            <input type="text" name="website_name" class="form-control m-input" required="required"
                                value="{{ $setting->website_name != null ? $setting->website_name : old('website_name') }}" placeholder="Website Name">

                            @if ($errors->has('website_name'))
                                <span class="help-block" style="color:red">
                                    <strong>{{ $errors->first('website_name') }} </strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 {{ $errors->has('email') ? ' has-error' : '' }} mb-50">
                            <label class="text-bold-600"> Email <span class="text-danger">*</span> </label>

                            <input type="email" name="email" class="form-control m-input" required="required"
                                value="{{ $setting->email != null ? $setting->email : old('email') }}" placeholder="  Email  ">

                            @if ($errors->has('email'))
                                <span class="help-block" style="color:red">
                                    <strong>{{ $errors->first('email') }} </strong>
                                </span>
                            @endif
                        </div>


                        <div class="col-lg-6 {{ $errors->has('mobile') ? ' has-error' : '' }} mb-50">
                            <label class="text-bold-600"> Mobile <span class="text-danger">*</span> </label>

                            <input type="number" name="mobile" class="form-control m-input" required="required"
                                value="{{ $setting->mobile != null ? $setting->mobile : old('mobile') }}" placeholder=" Mobile ">

                            @if ($errors->has('mobile'))
                                <span class="help-block" style="color:red">
                                    <strong>{{ $errors->first('mobile') }} </strong>
                                </span>
                            @endif
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-lg-6 {{ $errors->has('address') ? ' has-error' : '' }} mb-50">
                            <label class="text-bold-600"> Address <span class="text-danger">*</span> </label>

                            <input type="text" name="address" class="form-control m-input" required="required"
                                value="{{ $setting->address != null ? $setting->address : old('address') }}" placeholder=" Address ">

                            @if ($errors->has('address'))
                                <span class="help-block" style="color:red">
                                    <strong>{{ $errors->first('address') }} </strong>
                                </span>
                            @endif
                        </div>
                        <div class="col-lg-6 {{ $errors->has('facebook_link') ? ' has-error' : '' }} mb-50">
                            <label class="text-bold-600"> Facebook Link </label>

                            <input type="text" name="facebook_link" class="form-control m-input"
                                value="{{ $setting->facebook_link != null ? $setting->facebook_link : old('facebook_link') }}" placeholder=" Facebook Link">

                            @if ($errors->has('facebook_link'))
                                <span class="help-block" style="color:red">
                                    <strong>{{ $errors->first('facebook_link') }} </strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 {{ $errors->has('twitter_link') ? ' has-error' : '' }} mb-50">
                            <label class="text-bold-600"> Twitter Link </label>

                            <input type="text" name="twitter_link" class="form-control m-input"
                                value="{{ $setting->twitter_link != null ? $setting->twitter_link : old('twitter_link') }}" placeholder=" twitter Link">

                            @if ($errors->has('twitter_link'))
                                <span class="help-block" style="color:red">
                                    <strong>{{ $errors->first('twitter_link') }} </strong>
                                </span>
                            @endif
                        </div>
                        <div class="col-lg-6 {{ $errors->has('instagram_link') ? ' has-error' : '' }} mb-50">
                            <label class="text-bold-600"> Instagram Link </label>

                            <input type="text" name="instagram_link" class="form-control m-input"
                                value="{{ $setting->instagram_link != null ? $setting->instagram_link : old('instagram_link') }}" placeholder=" instagram Link">

                            @if ($errors->has('instagram_link'))
                                <span class="help-block" style="color:red">
                                    <strong>{{ $errors->first('instagram_link') }} </strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 {{ $errors->has('linkedin_link') ? ' has-error' : '' }} mb-50">
                            <label class="text-bold-600"> Linkedin Link </label>

                            <input type="text" name="linkedin_link" class="form-control m-input"
                                value="{{ $setting->linkedin_link != null ? $setting->linkedin_link : old('linkedin_link') }}" placeholder=" linkedin Link">

                            @if ($errors->has('linkedin_link'))
                                <span class="help-block" style="color:red">
                                    <strong>{{ $errors->first('linkedin_link') }} </strong>
                                </span>
                            @endif
                        </div>
                        <div class="col-lg-6 {{ $errors->has('youtube_link') ? ' has-error' : '' }} mb-50">
                            <label class="text-bold-600"> Youtube Link </label>

                            <input type="text" name="youtube_link" class="form-control m-input"
                                value="{{ $setting->youtube_link != null ? $setting->youtube_link : old('youtube_link') }}" placeholder=" youtube Link">

                            @if ($errors->has('youtube_link'))
                                <span class="help-block" style="color:red">
                                    <strong>{{ $errors->first('youtube_link') }} </strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 {{ $errors->has('map_link') ? ' has-error' : '' }} mb-50">
                            <label class="text-bold-600"> Map Link </label>

                            <input type="text" name="map_link" class="form-control m-input"
                                value="{{ $setting->map_link != null ? $setting->map_link : old('map_link') }}" placeholder=" map Link">

                            @if ($errors->has('map_link'))
                                <span class="help-block" style="color:red">
                                    <strong>{{ $errors->first('map_link') }} </strong>
                                </span>
                            @endif
                        </div>
                        <div class="col-lg-6 {{ $errors->has('logo_image') ? ' has-error' : '' }} mb-50">
                            <label class="text-bold-600"> Logo Image </label>

                            <input type="file" name="logo_image" id="logo_image" class="form-control m-input"
                                >
                                <div class="mt-2">
                                    <img src="{{ asset('uploads/' . $setting->logo_image) }}" id="logo-image-preview" width="200px" />
                                </div>


                            @if ($errors->has('logo_image'))
                                <span class="help-block" style="color:red">
                                    <strong>{{ $errors->first('logo_image') }} </strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 {{ $errors->has('description') ? ' has-error' : '' }} mb-50">
                            <label class="text-bold-600"> Description </label>

                            <textarea name="description" id="english_editor" class="form-control m-input"
                                value="" placeholder="Description">{{ $setting->description != null ? $setting->description : old('description') }}</textarea>

                            @if ($errors->has('description'))
                                <span class="help-block" style="color:red">
                                    <strong>{{ $errors->first('description') }} </strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 {{ $errors->has('keywords') ? ' has-error' : '' }} mb-50">
                            <label class="text-bold-600"> keywords </label>

                            <textarea rows="5" cols="5" name="keywords" class="form-control m-input"
                                value="" placeholder="keywords">{{ $setting->keywords != null ? $setting->keywords : old('keywords') }}</textarea>

                            @if ($errors->has('keywords'))
                                <span class="help-block" style="color:red">
                                    <strong>{{ $errors->first('keywords') }} </strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 {{ $errors->has('header_code') ? ' has-error' : '' }} mb-50">
                            <label class="text-bold-600"> Header Code </label>

                            <textarea rows="5" cols="5" name="header_code" class="form-control m-input"
                                value="" placeholder="Header Code">{{ $setting->header_code != null ? $setting->header_code : old('header_code') }}</textarea>

                            @if ($errors->has('header_code'))
                                <span class="help-block" style="color:red">
                                    <strong>{{ $errors->first('header_code') }} </strong>
                                </span>
                            @endif
                        </div>
                        <div class="col-lg-6 {{ $errors->has('footer_code') ? ' has-error' : '' }} mb-50">
                            <label class="text-bold-600"> Footer Code </label>

                            <textarea cols="5" rows="5" name="footer_code" class="form-control m-input"
                                value="" placeholder="Footer Code">{{ $setting->footer_code != null ? $setting->footer_code : old('footer_code') }}</textarea>

                            @if ($errors->has('footer_code'))
                                <span class="help-block" style="color:red">
                                    <strong>{{ $errors->first('footer_code') }} </strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <hr>

                    <div>
                        <div class="collapse collapse-horizontal" id="collapseWidthExample">
                            <div class="card card-body" style="">
                                <h5>Banner Options</h5>
                                <div class="row">
                                    <div
                                        class="col-lg-4 {{ $errors->has('banner_header') ? ' has-error' : '' }} mb-50">
                                        <label class="text-bold-600"> Banner Header <span class="text-danger">*</span>
                                        </label>

                                        <input type="text" name="banner_header" id="banner_header"
                                            class="form-control m-input" required="required"
                                            value="{{ $setting->banner_header }}" placeholder=" Banner Header Name">

                                        @if ($errors->has('banner_header'))
                                            <span class="help-block" style="color:red">
                                                <strong>{{ $errors->first('banner_header') }} </strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div
                                        class="col-lg-4 {{ $errors->has('banner_title') ? ' has-error' : '' }} mb-50">
                                        <label class="text-bold-600"> Banner Title <span class="text-danger">*</span>
                                        </label>

                                        <input type="text" name="banner_title" id="banner_title"
                                            class="form-control m-input" required="required"
                                            value="{{ $setting->banner_title }}" placeholder=" Banner Title Name">

                                        @if ($errors->has('banner_title'))
                                            <span class="help-block" style="color:red">
                                                <strong>{{ $errors->first('banner_title') }} </strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div
                                        class="col-lg-4 {{ $errors->has('banner_color') ? ' has-error' : '' }} mb-50">
                                        <label class="text-bold-600"> Banner Color <span class="text-danger">*</span>
                                        </label>

                                        <div class="form-check row">
                                            <div class="col">
                                                <label class="form-check-label" for="banner_color">
                                                    <input class="form-check-input form-check-input-black"
                                                        type="radio" name="banner_color" value="0"
                                                        {{ $setting->banner_color == 0 ? 'checked' : '' }}>Black
                                                </label>


                                            </div>
                                            <div class="col">
                                                <label class="form-check-label ml-5" for="banner_color">
                                                    <input class="form-check-input form-check-input-white"
                                                        type="radio" name="banner_color" value="1"
                                                        {{ $setting->banner_color == 1 ? 'checked' : '' }}>
                                                    White
                                                </label>
                                            </div>
                                        </div>



                                        @if ($errors->has('banner_color'))
                                            <span class="help-block" style="color:red">
                                                <strong>{{ $errors->first('banner_color') }} </strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div
                                        class="col-lg-6 {{ $errors->has('banner_description') ? ' has-error' : '' }} mb-50">
                                        <label class="text-bold-600"> Banner Description <span
                                                class="text-danger">*</span> </label>

                                        <textarea rows="5" name="banner_description" id="banner_english_editor" class="form-control"
                                            required="required" placeholder="banner_description">{{ $setting->banner_description }}</textarea>

                                        @if ($errors->has('banner_description'))
                                            <span class="help-block" style="color:red">
                                                <strong>{{ $errors->first('banner_description') }} </strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div
                                        class="col-lg-6 {{ $errors->has('banner_image') ? ' has-error' : '' }} mb-50">
                                        <label class="text-bold-600"> Banner Image <span
                                                class="text-danger">*</span></label>

                                        <input type="file" name="banner_image" id="banner_image"
                                            class="form-control m-input">
                                        <div class="mt-2">
                                            <img src="{{ $setting->banner_image != '' ? asset('uploads/home-banners/' . $setting->banner_image) : '' }}"
                                                id="banner-image-preview" width="200px" height="200px" />
                                        </div>
                                        @if ($errors->has('banner_image'))
                                            <span class="help-block" style="color:red">
                                                <strong>{{ $errors->first('banner_image') }} </strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer text-center">
                    <button type="submit" class="btn btn-primary mr-2">Update</button>
                    <button class="btn btn-info" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseWidthExample" aria-expanded="false"
                        aria-controls="collapseWidthExample">
                        Edit Banner
                    </button>
                </div>
            </form>
            <!--end::Form-->
        </div>

        <!--end::Card-->
    </div>
</div>
@endsection

@push('custom-js-scripts')
    <script src="{{ asset('admin/libs/summernote/summernote.min.js')}}" ></script>

    <script>
        $(document).ready(function() {
            $('#english_editor ,#banner_english_editor').summernote({
                height: 200,
                minHeight: 200,
                maxHeight: null,
            });
        });
    </script>

    <script>
        function readURLs7(input) {
            var id = '#logo-image-preview';
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $(id).attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#logo_image").change(function() {
            readURLs7(this);
        });
    </script>
@endpush
