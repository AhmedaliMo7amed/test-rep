@extends('admin.layouts.master')

@section('title')
    Create Feedback
@endsection

@push('custom-css-scripts')

@endpush

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3>Add Feedback</h3>
            </div>


            <!--begin::Form-->
            <form action="{{ route('admin_panel.feedbacks.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6 {{ $errors->has('name') ? ' has-error' : '' }} mb-50">
                            <label class="text-bold-600"> Name <span class="text-danger">*</span> </label>

                            <input type="text" name="name" id="name" class="form-control m-input" required="required"
                                value="{{ old('name') }}" placeholder=" Name">

                            @if ($errors->has('name'))
                                <span class="help-block" style="color:red">
                                    <strong>{{ $errors->first('name') }} </strong>
                                </span>
                            @endif
                        </div>
                        <div class="col-lg-6 {{ $errors->has('description') ? ' has-error' : '' }} mb-50">
                            <label class="text-bold-600"> Description <span class="text-danger">*</span> </label>

                            <textarea rows="5" name="description" class="form-control" required="required" placeholder="Description">{{ old('description') }}</textarea>

                            @if ($errors->has('description'))
                                <span class="help-block" style="color:red">
                                    <strong>{{ $errors->first('description') }} </strong>
                                </span>
                            @endif
                        </div>
                        <div class="col-lg-6 {{ $errors->has('job') ? ' has-error' : '' }} mb-50">
                            <label class="text-bold-600"> Job Name <span class="text-danger">*</span> </label>

                            <input type="text" name="job" id="job" class="form-control m-input" required="required"
                                value="{{ old('job') }}" placeholder=" Job Name">

                            @if ($errors->has('job'))
                                <span class="help-block" style="color:red">
                                    <strong>{{ $errors->first('job') }} </strong>
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