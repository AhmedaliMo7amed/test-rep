@extends('admin.layouts.master')

@section('title')
    Orders
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
                        <h4 class="card-title">
                            Orders
                        </h4>
                    </div>
                </div>
            </div>
            <div class="card-body">
            <div class="table-responsive">
                @if(count($orders))
                <table class="table">
                <thead class=" text-primary">
                    <th>
                    ID
                    </th>
                    <th>
                    User Name
                    </th>
                    <th>
                    Course Name
                    </th>
                    <th>
                    Order Number
                    </th>
                    <th>
                    Total
                    </th>
                    <th class="text-right">
                        Control
                    </th>
                </thead>
                @php $x = 1; @endphp
                @foreach ($orders as $order)
                <tbody>
                    <tr>
                    <td>
                        {{$x}}
                    </td>
                    <td>
                        {{$order->user->name}}
                    </td>
                    <td>
                        {{$order->course->title_en}}
                    </td>
                    <td>
                        {{$order->order_number}}
                    </td>
                    <td>
                        {{$order->total}} EGP
                    </td>
                    <td class="td-actions text-right">
                        <div class="row">
                            <div class="col-lg-2">
                                <a data-bs-toggle="modal" data-id="{{$order->order_number}}" 
                                    class="show-order-content m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" 
                                    data-bs-target="#showOrderDetails">
                                        <i class='bx bx-show'></i>
                                </a>
                            </div>
                        </div>
                    </td>
                    </tr>
                </tbody>
                @php $x = $x + 1; @endphp
                @endforeach
                </table>
                    @else
                    <h3 class="text-center">No Reservations Found</h3>
                @endif
            </div>
            </div>
        </div>
        </div>
    </div>
    <div class="modal fade text-left" id="showOrderDetails" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Reservation Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                <div class="modal-body show-order-body">
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                      Close
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('custom-js-scripts')
    <script>
        $('.show-order-content').click(function () {
            $(".show-order-body").html('Loading...');
            var id = $(this).data('id');
            $.ajax({
                url: '{{ url('admin_panel/reservations') }}' + '/' + id,
                success: data => {
                    $(".show-order-body").html(data.order_details);
                }
            });
        });
    </script>
@endpush