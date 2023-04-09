@extends('admin.layouts.master')

@section('title')
    Create Sub Activity
@endsection

@push('custom-css-scripts')

@endpush

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3>Add Sub Activity</h3>
            </div>


            <!--begin::Form-->
            <form action="{{ route('admin_panel.sub_activities.store') }}" method="POST" enctype="multipart/form-data">
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
                        <div class="col-lg-6 {{ $errors->has('activity_id') ? ' has-error' : '' }} mb-50">
                            <label class="text-bold-600"> Activity <span class="text-danger">*</span> </label>

                            <select class="form-control" name="activity_id" required>
                                <option value="" selected disabled>Select Activity</option>
                                @foreach($activities as $activity)
                                    <option value="{{ $activity->id }}">{{ $activity->name }}</option>
                                @endforeach
                            </select>

                            @if ($errors->has('activity_id'))
                                <span class="help-block" style="color:red">
                                    <strong>{{ $errors->first('activity_id') }} </strong>
                                </span>
                            @endif
                        </div>
                        <div class="col-lg-6 {{ $errors->has('user_paid') ? ' has-error' : '' }} mb-50">
                            <label class="text-bold-600"> User Paid <span class="text-danger">*</span> </label>

                            <select class="form-control" name="user_paid" required>
                                <option value="" selected disabled>Select User Paid</option>
                                <option value="0">Not Paid</option>
                                <option value="1">Paid</option>
                            </select>

                            @if ($errors->has('user_paid'))
                                <span class="help-block" style="color:red">
                                    <strong>{{ $errors->first('user_paid') }} </strong>
                                </span>
                            @endif
                        </div>
                        <div class="col-lg-6 {{ $errors->has('price') ? ' has-error' : '' }} mb-50">
                            <label class="text-bold-600"> Price <span class="text-danger">Required Only if Paid*</span> </label>

                            <input type="number" name="price" id="price" class="form-control m-input"
                                value="{{ old('price') }}" placeholder=" Price">

                            @if ($errors->has('price'))
                                <span class="help-block" style="color:red">
                                    <strong>{{ $errors->first('price') }} </strong>
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