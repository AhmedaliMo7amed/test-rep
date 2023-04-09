@extends('admin.layouts.master')

@section('title')
    Home Sliders
@endsection

@push('custom-css-scripts')
  
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">
        @include('admin.flash-message')
        <div class="card">
            <div class="card-header card-header-primary">
                <div class="row">
                    <div class="col-md-10">
                        <h4 class="card-title">Home Sliders</h4>
                    </div>
                    <div class="col-md-2 text-right">
                        <a class="btn btn-primary btn-round" href="{{ route('admin_panel.sliders.create') }}">Add Home Slider</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
            <div class="table-responsive">
                @if(count($sliders))
                <table class="table">
                <thead class=" text-primary">
                    <th>
                    ID
                    </th>
                    <th>
                    Image
                    </th>
                    <th class="text-right">
                        Control
                    </th>
                </thead>
                @foreach ($sliders as $slider)
                <tbody>
                    <tr>
                    <td>
                        {{$slider->id}}
                    </td>
                    <td>
                        <img src="{{ asset('uploads/slider_images/' . $slider->image) }}" width="100px" height="100px">
                    </td>
                    <td class="td-actions text-right">
                        <div class="col-lg-2">
                            <form action="{{ route('admin_panel.sliders.destroy', $slider->id) }}" method="POST">
                                @csrf
                                <input name="_method" type="hidden" value="DELETE">
                                <button class="dropdown-item show_confirm" type="submit" data-toggle="tooltip" title='Delete'><i class="bx bx-trash me-1"></i></button>
                            </form>
                        </div>
                    </td>
                    </tr>
                </tbody>
                @endforeach
                </table>
                    @else
                    <h3 class="text-center">No Home Sliders Found</h3>
                @endif
            </div>
            </div>
        </div>
        </div>
    </div>
@endsection

@push('custom-js-scripts')
    <script>
        $('.show_confirm').click(function(event) {
            var form =  $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                title: `Are you sure you want to delete this record?`,
                text: "If you delete this, it will be gone forever.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    form.submit();
                }
            });
        });
    </script>
@endpush