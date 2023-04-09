@extends('admin.layouts.master')

@section('title')
    Contact Requests
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
                        <h4 class="card-title">Contact Requests</h4>
                    </div>
                </div>
            </div>
            <div class="card-body">
            <div class="table-responsive">
                @if(count($contact_us_requests))
                <table class="table">
                <thead class=" text-primary">
                    <th>
                    ID
                    </th>
                    <th>
                    First Name
                    </th>
                    <th>
                    Last Name
                    </th>
                    <th>
                    Email
                    </th>
                    <th>
                    Phone
                    </th>
                    <th class="text-right">
                        Control
                    </th>
                </thead>
                @foreach ($contact_us_requests as $contact_us_request)
                <tbody>
                    <tr>
                    <td>
                        {{$contact_us_request->id}}
                    </td>
                    <td>
                        {{$contact_us_request->first_name}}
                    </td>
                    <td>
                        {{$contact_us_request->last_name}}
                    </td>
                    <td>
                        {{$contact_us_request->email}}
                    </td>
                    <td>
                        {{$contact_us_request->phone}}
                    </td>
                    <td class="td-actions text-right">
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('admin_panel.contact_requests.show', $contact_us_request->id) }}"
                                    ><i class="bx bx-show-alt me-1"></i> View</a
                                    >
                                <form action="{{ route('admin_panel.contact_requests.destroy', $contact_us_request->id) }}" method="POST">
                                    @csrf
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button class="dropdown-item show_confirm" type="submit" data-toggle="tooltip" title='Delete'><i class="bx bx-trash me-1"></i> Delete</button>
                                </form>
                            </div>
                          </div>
                    </td>
                    </tr>
                </tbody>
                @endforeach
                </table>
                    @else
                    <h3 class="text-center">No Contact Us Requests Found</h3>
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