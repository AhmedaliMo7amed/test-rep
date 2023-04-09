@extends('admin.layouts.master')

@section('title')
    Edit Profile
@endsection

@push('custom-css-scripts')

@endpush

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3>Update Profile</h3>
                </div>


                <!--begin::Form-->
                <form action="{{ route('admin_panel.profiles.update', $profile->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6 {{ $errors->has('name') ? ' has-error' : '' }} mb-50">
                                <label class="text-bold-600"> Name <span class="text-danger">*</span> </label>
    
                                <input type="text" name="name" id="name" class="form-control m-input" required="required"
                                    value="{{ $profile->name }}" placeholder=" Name">
    
                                @if ($errors->has('name'))
                                    <span class="help-block" style="color:red">
                                        <strong>{{ $errors->first('name') }} </strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-lg-6 {{ $errors->has('age') ? ' has-error' : '' }} mb-50">
                                <label class="text-bold-600"> Age <span class="text-danger">*</span> </label>
    
                                <input type="text" name="age" id="age" class="form-control m-input" required="required"
                                    value="{{ $profile->age }}" placeholder=" Age">
    
                                @if ($errors->has('age'))
                                    <span class="help-block" style="color:red">
                                        <strong>{{ $errors->first('age') }} </strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-lg-6 {{ $errors->has('type') ? ' has-error' : '' }} mb-50">
                                <label class="text-bold-600"> Type <span class="text-danger">*</span> </label>
    
                                <select class="form-control" name="type" required>
                                    <option value="" disabled>Select Type</option>
                                    <option value="Solo" {{ $profile->type == 'Solo' ? 'selected' : '' }}>Solo</option>
                                    <option value="Family" {{ $profile->type == 'Family' ? 'selected' : '' }}>Family</option>
                                    <option value="Group" {{ $profile->type == 'Group' ? 'selected' : '' }}>Group</option>
                                    <option value="Couple" {{ $profile->type == 'Couple' ? 'selected' : '' }}>Couple</option>
                                </select>
    
                                @if ($errors->has('type'))
                                    <span class="help-block" style="color:red">
                                        <strong>{{ $errors->first('type') }} </strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-lg-6 {{ $errors->has('sub_activities') ? ' has-error' : '' }} mb-50">
                                <label class="text-bold-600"> Sub Activities <span class="text-danger">*</span> </label>
    
                                <select class="form-control" name="sub_activities[]" required multiple style="height: 300px;">
                                    <option value="" disabled>Select Sub Activities</option>
                                    @foreach($sub_activities as $sub_activity)
                                        <option value="{{ $sub_activity->id }}" {{ in_array($sub_activity->id, $profile_sub_activities) ? 'selected' : '' }}>{{ $sub_activity->name }}</option>
                                    @endforeach
                                </select>
    
                                @if ($errors->has('sub_activities'))
                                    <span class="help-block" style="color:red">
                                        <strong>{{ $errors->first('sub_activities') }} </strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary mr-2">Update</button>
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