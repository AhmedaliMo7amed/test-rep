@extends('admin.layouts.master')

@section('title')
    Edit Category
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
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-11">
                            <h3>Update Category</h3>
                        </div>
                        <div class="col-md-1">
                            <div class="col-md-1 text-right">
                                @if ($language->id == 1)
                                    <x-flag-4x3-us style="width: 5rem" />
                                @elseif($language->id == 2)
                                    <x-flag-4x3-sa style="width: 5rem" />
                                @elseif($language->id == 3)
                                    <x-flag-4x3-de style="width: 5rem" />
                                @elseif($language->id == 4)
                                    <x-flag-4x3-ru style="width: 5rem" />
                                @else
                                    <x-flag-4x3-fr style="width: 5rem" />
                                @endif
                            </div>
                        </div>
                    </div>
                </div>


                <!--begin::Form-->
                <form action="{{ route('admin_panel.categories.update', $category->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="card-body">
                        <h5>Catrgory Options</h5>
                        <div class="row">
                            <div class="col-lg-6 {{ $errors->has('header_title') ? ' has-error' : '' }} mb-50">
                                <label class="text-bold-600"> Header Title Name <span class="text-danger">*</span> </label>

                                <input type="text" name="header_title" id="header_title" class="form-control m-input"
                                    required="required" value="{{ $category->header_title }}"
                                    placeholder=" Header Title Name">

                                @if ($errors->has('header_title'))
                                    <span class="help-block" style="color:red">
                                        <strong>{{ $errors->first('header_title') }} </strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-lg-6 {{ $errors->has('header_subtitle') ? ' has-error' : '' }} mb-50">
                                <label class="text-bold-600"> Header Subtitle Name <span class="text-danger">*</span>
                                </label>

                                <input type="text" name="header_subtitle" id="header_subtitle"
                                    class="form-control m-input" required="required"
                                    value="{{ $category->header_subtitle }}" placeholder=" Header Subtitle Name">

                                @if ($errors->has('header_subtitle'))
                                    <span class="help-block" style="color:red">
                                        <strong>{{ $errors->first('header_subtitle') }} </strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-lg-6 {{ $errors->has('title') ? ' has-error' : '' }} mb-50">
                                <label class="text-bold-600"> Title Name <span class="text-danger">*</span> </label>

                                <input type="text" name="title" id="title" class="form-control m-input"
                                    required="required" value="{{ $category->title }}" placeholder=" Title Name">

                                @if ($errors->has('title'))
                                    <span class="help-block" style="color:red">
                                        <strong>{{ $errors->first('title') }} </strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-lg-6 {{ $errors->has('description') ? ' has-error' : '' }} mb-50">
                                <label class="text-bold-600"> Description <span class="text-danger">*</span> </label>

                                <textarea rows="5" name="description" id="english_editor" class="form-control" required="required"
                                    placeholder="Description">{{ $category->description }}</textarea>

                                @if ($errors->has('description'))
                                    <span class="help-block" style="color:red">
                                        <strong>{{ $errors->first('description') }} </strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-lg-6 {{ $errors->has('image') ? ' has-error' : '' }} mb-50">
                                <label class="text-bold-600"> Image <span class="text-danger">*</span></label>

                                <input type="file" name="image" id="image" class="form-control m-input">
                                <div class="mt-2">
                                    <img src="{{ $category->image != '' ? asset('uploads/category_images/' . $category->image) : '' }}"
                                        id="image-preview" width="200px" height="200px" />
                                </div>
                                @if ($errors->has('image'))
                                    <span class="help-block" style="color:red">
                                        <strong>{{ $errors->first('image') }} </strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-lg-6 {{ $errors->has('real_title') ? ' has-error' : '' }} mb-50">
                                <label class="text-bold-600"> Real Title <span class="text-danger">*</span> </label>

                                <select class="form-control" name="real_title" required>
                                    <option value="" disabled>Select an option</option>
                                    <option value="rest" {{ $category->real_title == 'rest' ? 'selected' : '' }}>Rest
                                    </option>
                                    <option value="discover" {{ $category->real_title == 'discover' ? 'selected' : '' }}>
                                        Discover</option>
                                    <option value="restore" {{ $category->real_title == 'restore' ? 'selected' : '' }}>
                                        Restore</option>
                                    <option value="inspire" {{ $category->real_title == 'inspire' ? 'selected' : '' }}>
                                        Inspire</option>
                                    <option value="play" {{ $category->real_title == 'play' ? 'selected' : '' }}>Play
                                    </option>
                                    <option value="connect" {{ $category->real_title == 'connect' ? 'selected' : '' }}>
                                        Connect</option>
                                </select>

                                @if ($errors->has('real_title'))
                                    <span class="help-block" style="color:red">
                                        <strong>{{ $errors->first('real_title') }} </strong>
                                    </span>
                                @endif
                            </div>
                            <input type="hidden" name="language_id" value="{{ $language->id }}">
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
                                                value="{{ $category->banner_header }}" placeholder=" Banner Header Name">

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
                                                value="{{ $category->banner_title }}" placeholder=" Banner Title Name">

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
                                                            {{ $category->banner_color == 0 ? 'checked' : '' }}>Black
                                                    </label>


                                                </div>
                                                <div class="col">
                                                    <label class="form-check-label ml-5" for="banner_color">
                                                        <input class="form-check-input form-check-input-white"
                                                            type="radio" name="banner_color" value="1"
                                                            {{ $category->banner_color == 1 ? 'checked' : '' }}>
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
                                                required="required" placeholder="banner_description">{{ $category->banner_description }}</textarea>

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
                                                <img src="{{ $category->banner_image != '' ? asset('uploads/category_images/banners/' . $category->banner_image) : '' }}"
                                                    id="banner-image-preview" width="200px" height="200px" />
                                            </div>
                                            @if ($errors->has('banner_image'))
                                                <span class="help-block" style="color:red">
                                                    <strong>{{ $errors->first('banner_image') }} </strong>
                                                </span>
                                            @endif
                                        </div>

                                        <input type="hidden" name="language_id" value="{{ $language->id }}">
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
    <script src="{{ asset('admin/libs/summernote/summernote.min.js') }}"></script>

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


        function readURLs7(input) {
            var id = '#banner-image-preview';
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $(id).attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#banner_image").change(function() {
            readURLs7(this);
        });
    </script>
@endpush
