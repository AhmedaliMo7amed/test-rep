@extends('admin.layouts.master')

@section('title')
    Why Choose Us
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
                        <h4 class="card-title">Why Choose Us</h4>
                    </div>
                    <div class="col-md-2 text-right">
                        <a class="btn btn-primary btn-round" href="{{ route('admin_panel.why_choose_us.create') }}">Add Why Choose Us</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
            <div class="table-responsive">
                @if(count($whyChooseUs))
                <table class="table">
                <thead class=" text-primary">
                    <th>
                    ID
                    </th>
                    <th>
                    Name
                    </th>
                    <th>
                    Image
                    </th>
                    <th class="text-right">
                        Control
                    </th>
                </thead>
                @php $x = 1; @endphp
                @foreach ($whyChooseUs as $whyChoose)
                <tbody>
                    <tr>
                    <td>
                        {{$x}}
                    </td>
                    <td>
                        {{$whyChoose->title}}
                    </td>
                    <td>
                        <img src="{{ asset('uploads/why_choose_us_images/' . $whyChoose->image) }}" width="100px" height="100px">
                    </td>
                    <td class="td-actions text-right">
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('admin_panel.why_choose_us.edit', $whyChoose->id) }}"
                                    ><i class="bx bx-edit-alt me-1"></i> Edit</a
                                    >
                                <form action="{{ route('admin_panel.why_choose_us.destroy', $whyChoose->id) }}" method="POST">
                                    @csrf
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button class="dropdown-item show_confirm" type="submit" data-toggle="tooltip" title='Delete'><i class="bx bx-trash me-1"></i> Delete</button>
                                </form>
                            </div>
                          </div>
                    </td>
                    </tr>
                </tbody>
                @php $x = $x + 1; @endphp
                @endforeach
                </table>
                    @else
                    <h3 class="text-center">No Why Choose Us Found</h3>
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