@extends('admin.layouts.master')

@section('title')
    About Us Details
@endsection

@push('custom-css-scripts')
<link rel="stylesheet" href="{{ asset('admin/libs/summernote/summernote.min.css') }}" />
@endpush

@section('content')
<div class="row">
    <div class="col-12">
        @include('admin.flash-message')
        <div class="card">
            <div class="card-header">
                <h3>About Us Details</h3>
            </div>


            <!--begin::Form-->
            <form action="{{ route('admin_panel.update_details') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6 {{ $errors->has('title') ? ' has-error' : '' }} mb-50">
                            <label class="text-bold-600"> Name <span class="text-danger">*</span> </label>

                            <input type="text" name="title" class="form-control m-input" required="required"
                                value="{{ $aboutUsDetail->title != null ? $aboutUsDetail->title : old('title') }}" placeholder="Name">

                            @if ($errors->has('title'))
                                <span class="help-block" style="color:red">
                                    <strong>{{ $errors->first('title') }} </strong>
                                </span>
                            @endif
                        </div>
                        <div class="col-lg-6 {{ $errors->has('description') ? ' has-error' : '' }} mb-50">
                            <label class="text-bold-600"> Description <span class="text-danger">*</span> </label>

                            <textarea rows="5" name="description" id="english_editor" class="form-control" required="required" placeholder="Description">{{ $aboutUsDetail->description != null ? $aboutUsDetail->description : old('description') }}</textarea>

                            @if ($errors->has('description'))
                                <span class="help-block" style="color:red">
                                    <strong>{{ $errors->first('description') }} </strong>
                                </span>
                            @endif
                        </div>
                        <div class="col-lg-6 {{ $errors->has('button') ? ' has-error' : '' }} mb-50">
                            <label class="text-bold-600"> Button <span class="text-danger">*</span> </label>

                            <input type="text" name="button" class="form-control m-input" required="required"
                                value="{{ $aboutUsDetail->button != null ? $aboutUsDetail->button : old('button') }}" placeholder="Button">

                            @if ($errors->has('button'))
                                <span class="help-block" style="color:red">
                                    <strong>{{ $errors->first('button') }} </strong>
                                </span>
                            @endif
                        </div>
                        <div class="col-lg-6 {{ $errors->has('button_link') ? ' has-error' : '' }} mb-50">
                            <label class="text-bold-600"> Button Link </label>

                            <input type="text" name="button_link" class="form-control m-input"
                                value="{{ $aboutUsDetail->button_link != null ? $aboutUsDetail->button_link : old('button_link') }}" placeholder="Button Link">

                            @if ($errors->has('button_link'))
                                <span class="help-block" style="color:red">
                                    <strong>{{ $errors->first('button_link') }} </strong>
                                </span>
                            @endif
                        </div>
                        <div class="col-lg-6 {{ $errors->has('image') ? ' has-error' : '' }} mb-50">
                            <label class="text-bold-600"> Image <span class="text-danger">*</span></label>

                            <input type="file" name="image" id="image" class="form-control m-input">
                                <div class="mt-2">
                                    <img src="{{ $aboutUsDetail->image != '' ? asset('uploads/about_us_detail_image/' . $aboutUsDetail->image) :  '' }}" id="image-preview" width="200px" height="200px" />
                                </div>
                            @if ($errors->has('image'))
                                <span class="help-block" style="color:red">
                                    <strong>{{ $errors->first('image') }} </strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary mr-2">Save</button>
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
            $('#english_editor,#arabic_editor').summernote({
                height: 300,
                minHeight: 200,
                maxHeight: null,            
            });
        });
    </script>

    <script>
        function readURLs7(input) {
            var id = '#image-preview';
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $(id).attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#image").change(function() {
            readURLs7(this);
        });
    </script>
@endpush