@extends('admin.layouts.master')

@section('title')
    Edit Activity
@endsection

@push('custom-css-scripts')

@endpush

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3>Update Activity</h3>
                </div>


                <!--begin::Form-->
                <form action="{{ route('admin_panel.activities.update', $activity->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6 {{ $errors->has('name') ? ' has-error' : '' }} mb-50">
                                <label class="text-bold-600"> Name <span class="text-danger">*</span> </label>
    
                                <input type="text" name="name" id="name" class="form-control m-input" required="required"
                                    value="{{ $activity->name }}" placeholder=" Name">
    
                                @if ($errors->has('name'))
                                    <span class="help-block" style="color:red">
                                        <strong>{{ $errors->first('name') }} </strong>
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