@extends('admin.layouts.master')

@section('title')
    Create Category
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
                        <h3>Add Category</h3>
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
            <form action="{{ route('admin_panel.categories.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6 {{ $errors->has('header_title') ? ' has-error' : '' }} mb-50">
                            <label class="text-bold-600"> Header Title Name <span class="text-danger">*</span> </label>

                            <input type="text" name="header_title" id="header_title" class="form-control m-input" required="required"
                                value="{{ old('header_title') }}" placeholder=" Header Title Name">

                            @if ($errors->has('header_title'))
                                <span class="help-block" style="color:red">
                                    <strong>{{ $errors->first('header_title') }} </strong>
                                </span>
                            @endif
                        </div>
                        <div class="col-lg-6 {{ $errors->has('header_subtitle') ? ' has-error' : '' }} mb-50">
                            <label class="text-bold-600"> Header Subtitle Name <span class="text-danger">*</span> </label>

                            <input type="text" name="header_subtitle" id="header_subtitle" class="form-control m-input" required="required"
                                value="{{ old('header_subtitle') }}" placeholder=" Header Subtitle Name">

                            @if ($errors->has('header_subtitle'))
                                <span class="help-block" style="color:red">
                                    <strong>{{ $errors->first('header_subtitle') }} </strong>
                                </span>
                            @endif
                        </div>
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
                        <div class="col-lg-6 {{ $errors->has('description') ? ' has-error' : '' }} mb-50">
                            <label class="text-bold-600"> Description <span class="text-danger">*</span> </label>

                            <textarea rows="5" name="description" id="english_editor" class="form-control" required="required" placeholder="Description">{{ old('description') }}</textarea>

                            @if ($errors->has('description'))
                                <span class="help-block" style="color:red">
                                    <strong>{{ $errors->first('description') }} </strong>
                                </span>
                            @endif
                        </div>
                        <div class="col-lg-6 {{ $errors->has('image') ? ' has-error' : '' }} mb-50">
                            <label class="text-bold-600"> Image <span class="text-danger">*</span></label>

                            <input type="file" name="image" id="image" class="form-control m-input" required="required"
                                >
                                <div class="mt-2">
                                    <img id="image-preview" width="200px" height="200px" />
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
                                <option value="" selected disabled>Select an option</option>
                                <option value="rest">Rest</option>
                                <option value="restore">Restore</option>
                                <option value="inspire">Inspire</option>
                                <option value="play">Play</option>
                                <option value="explore">Explore</option>
                                <option value="connect">Connect</option>
                            </select>

                            @if ($errors->has('real_title'))
                                <span class="help-block" style="color:red">
                                    <strong>{{ $errors->first('real_title') }} </strong>
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
        $('#english_editor').summernote({
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