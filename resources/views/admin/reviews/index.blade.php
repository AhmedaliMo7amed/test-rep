@extends('admin.layouts.master')

@section('title')
    Reviews
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
                            <a href="{{ route('admin_panel.courses.index') }}">{{ $course->title_en }}</a> |
                            Reviews
                        </h4>
                    </div>
                </div>
            </div>
            <div class="card-body">
            <div class="table-responsive">
                @if(count($reviews))
                <table class="table">
                <thead class=" text-primary">
                    <th>
                    ID
                    </th>
                    <th>
                    User Name
                    </th>
                    <th>
                    Status
                    </th>
                    <th class="text-right">
                        Control
                    </th>
                </thead>
                @php $x = 1; @endphp
                @foreach ($reviews as $review)
                <tbody>
                    <tr>
                    <td>
                        {{$x}}
                    </td>
                    <td>
                        {{$review->user->name}}
                    </td>
                    <td>
                        {{$review->status}}
                    </td>
                    <td class="td-actions text-right">
                        <div class="row">
                            <div class="col-lg-2">
                                <a data-bs-toggle="modal" data-id="{{$review->id}}" 
                                    class="show-review-content m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" 
                                    data-bs-target="#showReviewDetails">
                                        <i class='bx bx-show'></i>
                                </a>
                            </div>
                            <div class="col-lg-2">
                                <form action="{{ route('admin_panel.update_review_status') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="review_id" value="{{$review->id}}">
                                    <input type="hidden" name="review_status" value="approved">
                                    <button class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill approved_show_confirm" 
                                        type="submit" title='Approved'>
                                        <i class="bx bx-check"></i>
                                    </button>
                                </form>
                            </div>
                            <div class="col-lg-2">
                                <form action="{{ route('admin_panel.update_review_status') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="review_id" value="{{$review->id}}">
                                    <input type="hidden" name="review_status" value="rejected">
                                    <button class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill rejected_show_confirm" 
                                        type="submit" title='Rejected'>
                                        <i class="bx bx-x"></i>
                                    </button>
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
                    <h3 class="text-center">No Reviews Found</h3>
                @endif
            </div>
            </div>
        </div>
        </div>
    </div>
    <div class="modal fade text-left" id="showReviewDetails" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Review Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                <div class="modal-body show-review-body">
                    
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
        $('.show-review-content').click(function () {
            $(".show-review-body").html('Loading...');
            var id = $(this).data('id');
            $.ajax({
                url: '{{ url('admin_panel/review_details') }}' + '/' + id,
                success: data => {
                    $(".show-review-body").html(data.review_details);
                }
            });
        });

        $('.approved_show_confirm').click(function(event) {
            var form =  $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                title: 'Are you Sure ?',
                text: "If you confirmed, Review will be approved and shown",
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

        $('.rejected_show_confirm').click(function(event) {
            var form =  $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                title: 'Are you Sure ?',
                text: "If you rejected, Review will be rejected and not shown",
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