@extends('admin.layouts.master')

@section('title')
    Create Sub Category
@endsection

@push('custom-css-scripts')
<link rel="stylesheet" href="{{ asset('admin/libs/summernote/summernote.min.css') }}" />
@endpush

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-11">
                        <h3>Add Sub Category</h3>
                    </div>
                    <div class="col-md-1 text-right">
                        @if($language->id == 1)
                            <x-flag-4x3-us style="width: 5rem"/>
                        @elseif($language->id == 2)
                            <x-flag-4x3-sa style="width: 5rem"/>
                        @elseif($language->id == 3)
                            <x-flag-4x3-de style="width: 5rem"/>
                        @elseif($language->id == 4)
                            <x-flag-4x3-ru style="width: 5rem"/>
                        @else
                            <x-flag-4x3-fr style="width: 5rem"/>
                        @endif
                    </div>
                </div>
            </div>


            <!--begin::Form-->
            <form action="{{ route('admin_panel.sub_categories.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">
                        
                        <div class="col-lg-6 {{ $errors->has('title') ? ' has-error' : '' }} mb-50">
                            <label class="text-bold-600"> Title Name <span class="text-danger">*</span> </label>

                            <input type="text" name="title" id="title" class="form-control m-input" required="required"
                                value="{{ old('title') }}" placeholder=" Title Name">

                            @if ($errors->has('title'))
                                <span class="help-block" style="color:red">
                                    <strong>{{ $errors->first('title') }} </strong>
                                </span>
                            @endif
                        </div>
                        
                        <div class="col-lg-6 {{ $errors->has('category_id') ? ' has-error' : '' }} mb-50">
                            <label class="text-bold-600"> Category <span class="text-danger">*</span> </label>
                            <select class="form-control" name="category_id" required>
                                <option value="" selected disabled>Select Category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                                @endforeach
                            </select>

                            @if ($errors->has('category_id'))
                                <span class="help-block" style="color:red">
                                    <strong>{{ $errors->first('category_id') }} </strong>
                                </span>
                            @endif
                        </div>
                        
                       <!---------------------------------------->
                       
                       <div class="mt-3 mb-2 col-lg-6 {{ $errors->has('btn_visibility') ? ' has-error' : '' }} mb-50">

                                <label class="text-bold-600">Button Visability <span class="text-danger">(if have)*</span> </label>
                                
                                <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="btn_visibility" value="1" name="btn_visibility">
                                  <label class="form-check-label" for="flexCheckChecked">
                                    Enable / Disable
                                  </label>
                                </div>
                                

                                @if ($errors->has('btn_visibility'))
                                    <span class="help-block" style="color:red">
                                        <strong>{{ $errors->first('btn_visibility') }} </strong>
                                    </span>
                                @endif
                            </div>

                            
                            <div class="mt-3 mb-2 col-lg-6 {{ $errors->has('btn_text') ? ' has-error' : '' }} mb-50">

                                <label class="text-bold-600">Button Text <span class="text-danger">(if have)*</span> </label>
                                <input type="text" name="btn_text" id="btn_text" class="form-control m-input" placeholder="Enter Button Text">

                                @if ($errors->has('btn_text'))
                                    <span class="help-block" style="color:red">
                                        <strong>{{ $errors->first('btn_text') }} </strong>
                                    </span>
                                @endif
                            </div>
                       
                       <!---------------------------------------->

                        <div class="col-lg-6 {{ $errors->has('description') ? ' has-error' : '' }} mb-50">
                            <label class="text-bold-600">Short Description <span class="text-danger">*</span> </label>

                            <textarea rows="5" name="description" id="description_editor" class="form-control" required="required" placeholder="Description">{{ old('description') }}</textarea>

                            @if ($errors->has('description'))
                                <span class="help-block" style="color:red">
                                    <strong>{{ $errors->first('description') }} </strong>
                                </span>
                            @endif
                        </div>
                        <div class="col-lg-6 {{ $errors->has('long_desc') ? ' has-error' : '' }} mb-50">
                            <label class="text-bold-600">Long Description <span class="text-danger">*</span> </label>

                            <textarea rows="5" name="long_desc" id="long_description_editor" class="form-control" required="required" placeholder="Description">{{ old('description') }}</textarea>

                            @if ($errors->has('long_desc'))
                                <span class="help-block" style="color:red">
                                    <strong>{{ $errors->first('long_desc') }} </strong>
                                </span>
                            @endif
                        </div>

                        <div class="col-lg-12 {{ $errors->has('image') ? ' has-error' : '' }} mb-50">
                            <label class="text-bold-600"> Image (Static / Carousel) <span
                                    class="text-danger">*</span></label>
                            <div class="mb-2">
                                <input name="has_carousel" id="toggle-state" type="checkbox" data-toggle="toggle" data-on="Image Carousel"
                                    data-off="Static Image" data-onstyle="primary" data-offstyle="secondary"
                                    data-width="170" data-height="25">
                                    @if ($errors->has('has_carousel'))
                                    <span class="help-block" style="color:red">
                                        <strong>{{ $errors->first('has_carousel') }} </strong>
                                    </span>
                                @endif
                            </div>
                            <div id="static_img_div">

                                <input type="file" name="image" id="image" class="form-control m-input">
                                <div class="mt-2">
                                    <img src="{{ asset('uploads/carousel/carousel-placeholder.jpg') }}"
                                        id="image-preview" width="200px" height="200px" />
                                </div>
                                @if ($errors->has('image'))
                                    <span class="help-block" style="color:red">
                                        <strong>{{ $errors->first('image') }} </strong>
                                    </span>
                                @endif
                            </div>

                            <div style="display:none;" id="carousel_img_div">

                                <div class="row">
                                    <div class="col-12">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th class="text-center" scope="col">No.</th>
                                                    <th width="45%" class="text-center" scope="col">Slide</th>
                                                    <th width="45%" class="text-center" scope="col">Attach</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th class="text-center" scope="row">1</th>
                                                    <td class="text-center">
                                                        <img src="{{asset('uploads/carousel/carousel-placeholder.jpg') }}"
                                                            id="carousel-preview-1" width="180px" height="70px" />
                                                    </td>
                                                    <td>
                                                        <input type="file" name="carousel_img_1" id="carousel_img_1"
                                                            class="form-control m-input">
                                                        @if ($errors->has('carousel_img_1'))
                                                            <span class="help-block" style="color:red">
                                                                <strong>{{ $errors->first('carousel_img_1') }} </strong>
                                                            </span>
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="text-center" scope="row">2</th>
                                                    <td class="text-center">
                                                        <img src="{{ asset('uploads/carousel/carousel-placeholder.jpg') }}"
                                                            id="carousel-preview-2" width="180px" height="70px" />
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="file" name="carousel_img_2" id="carousel_img_2"
                                                            class="form-control m-input">
                                                        @if ($errors->has('carousel_img_2'))
                                                            <span class="help-block" style="color:red">
                                                                <strong>{{ $errors->first('carousel_img_2') }} </strong>
                                                            </span>
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="text-center" scope="row">3</th>
                                                    <td class="text-center">
                                                        <img src="{{ asset('uploads/carousel/carousel-placeholder.jpg') }}"
                                                            id="carousel-preview-3" width="180px" height="70px" />
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="file" name="carousel_img_3" id="carousel_img_3"
                                                            class="form-control m-input">
                                                        @if ($errors->has('carousel_img_3'))
                                                            <span class="help-block" style="color:red">
                                                                <strong>{{ $errors->first('carousel_img_3') }} </strong>
                                                            </span>
                                                        @endif
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <th class="text-center" scope="row">4</th>
                                                    <td class="text-center">
                                                        <img src="{{  asset('uploads/carousel/carousel-placeholder.jpg') }}"
                                                            id="carousel-preview-4" width="180px" height="70px" />
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="file" name="carousel_img_4" id="carousel_img_4"
                                                            class="form-control m-input">
                                                        @if ($errors->has('carousel_img_4'))
                                                            <span class="help-block" style="color:red">
                                                                <strong>{{ $errors->first('carousel_img_4') }} </strong>
                                                            </span>
                                                        @endif
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <th class="text-center" scope="row">5</th>
                                                    <td class="text-center">
                                                        <img src="{{ asset('uploads/carousel/carousel-placeholder.jpg') }}"
                                                            id="carousel-preview-5" width="180px" height="70px" />
                                                    </td>
                                                    <td>
                                                        <input type="file" name="carousel_img_5" id="carousel_img_5"
                                                            class="form-control m-input">
                                                        @if ($errors->has('carousel_img_5'))
                                                            <span class="help-block" style="color:red">
                                                                <strong>{{ $errors->first('carousel_img_5') }} </strong>
                                                            </span>
                                                        @endif
                                                    </td>
                                                </tr>


                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-6 {{ $errors->has('at_a_glance') ? ' has-error' : '' }} mb-50">
                            <label class="text-bold-600"> At a glance <span class="text-danger">Only if Category is Rest</span></label>

                            <textarea rows="5" name="at_a_glance" id="at_a_glance_editor" class="form-control" placeholder="At a glance">{{ old('at_a_glance') }}</textarea>

                            @if ($errors->has('at_a_glance'))
                                <span class="help-block" style="color:red">
                                    <strong>{{ $errors->first('at_a_glance') }} </strong>
                                </span>
                            @endif
                        </div>
                        <div class="col-lg-6 {{ $errors->has('amenities') ? ' has-error' : '' }} mb-50">
                            <label class="text-bold-600"> Amenities <span class="text-danger">Only if Category is Rest</span></label>

                            <textarea rows="5" name="amenities" id="amenities_editor" class="form-control" placeholder="Amenities">{{ old('amenities') }}</textarea>

                            @if ($errors->has('amenities'))
                                <span class="help-block" style="color:red">
                                    <strong>{{ $errors->first('amenities') }} </strong>
                                </span>
                            @endif
                        </div>


                        <div class="col-lg-6 {{ $errors->has('popup_content') ? ' has-error' : '' }} mb-50">
                            <label class="text-bold-600"> Book Now (PopUp) <span class="text-danger">*</span> </label>

                            <textarea rows="5" name="popup_content" id="popup_content_editor" class="form-control" required="required" placeholder="popup_content"></textarea>

                            @if ($errors->has('popup_content'))
                                <span class="help-block" style="color:red">
                                    <strong>{{ $errors->first('popup_content') }} </strong>
                                </span>
                            @endif
                        </div>
                        <input type="hidden" name="language_id" value="{{$language->id}}">
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary mr-2">Add</button>
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

            $("#toggle-state").change(function() {
                var x = document.getElementById('toggle-state').checked;
                if (x == true) {
                    x = 1
                    $('#static_img_div').fadeOut();
                    $('#carousel_img_div').fadeIn();
                } else {
                    x = 0
                    $('#static_img_div').fadeIn();
                    $('#carousel_img_div').fadeOut();
                }
                $('#toggle-state').val(x);

            });

        $('#description_editor, #amenities_editor, #at_a_glance_editor , #amenities_editor , #popup_content_editor,#long_description_editor').summernote({
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

     function readURL(input, id) {
            var prevId = '#carousel-preview-'+id;
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $(prevId).attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#image").change(function() {
            readURLs7(this);
        });

        $("#carousel_img_1").change(function() {
            readURL(this , 1);
        });

        $("#carousel_img_2").change(function() {
            readURL(this , 2);
        });

        $("#carousel_img_3").change(function() {
            readURL(this , 3);
        });

        $("#carousel_img_4").change(function() {
            readURL(this , 4);
        });

        $("#carousel_img_5").change(function() {
            readURL(this , 5);
        });

 </script>
@endpush
