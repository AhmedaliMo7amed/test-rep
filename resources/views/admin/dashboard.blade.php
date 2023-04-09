@extends('admin.layouts.master')

@section('title')
    Dashboard
@endsection

@push('custom-css-scripts')
  
@endpush

@section('content')
<div class="row g-4 mb-4">
    <div class="col-sm-6 col-xl-3">
      <a href="{{ route('admin_panel.users.index') }}">
      <div class="card">
        <div class="card-body">
          <div class="d-flex align-items-start justify-content-between">
            <div class="content-left">
              <span>Users</span>
              <div class="d-flex align-items-end mt-2">
                <h4 class="mb-0 me-2">{{ $users_count }}</h4>
              </div>
            </div>
            <span class="badge bg-label-danger rounded p-2">
              <i class="bx bx-user bx-sm"></i>
            </span>
          </div>
        </div>
      </div>
      </a>
    </div>
    <div class="col-sm-6 col-xl-3">
      <a href="{{ route('admin_panel.reservations.index') }}">
      <div class="card">
        <div class="card-body">
          <div class="d-flex align-items-start justify-content-between">
            <div class="content-left">
              <span>Reservations</span>
              <div class="d-flex align-items-end mt-2">
                <h4 class="mb-0 me-2">{{ $orders_count }}</h4>
              </div>
            </div>
            <span class="badge bg-label-primary rounded p-2">
              <i class="bx bx-basket bx-sm"></i>
            </span>
          </div>
        </div>
      </div>
      </a>
    </div>
    {{-- <div class="col-sm-6 col-xl-3">
      <a href="{{ route('admin_panel.courses.index') }}">
        <div class="card">
          <div class="card-body">
            <div class="d-flex align-items-start justify-content-between">
              <div class="content-left">
                <span>Courses</span>
                <div class="d-flex align-items-end mt-2">
                  <h4 class="mb-0 me-2">{{ $courses_count }}</h4>
                </div>
              </div>
              <span class="badge bg-label-success rounded p-2">
                <i class="bx bx-video bx-sm"></i>
              </span>
            </div>
          </div>
        </div>
      </a>
    </div> --}}
    <div class="col-sm-6 col-xl-3">
        <a href="{{ route('admin_panel.blogs.index') }}">
            <div class="card">
                <div class="card-body">
                <div class="d-flex align-items-start justify-content-between">
                    <div class="content-left">
                    <span>Blogs</span>
                    <div class="d-flex align-items-end mt-2">
                        <h4 class="mb-0 me-2">{{ $blogs_count }}</h4>
                    </div>
                    </div>
                    <span class="badge bg-label-warning rounded p-2">
                    <i class="bx bx-news bx-sm"></i>
                    </span>
                </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-sm-6 col-xl-6">
        <a href="{{ route('admin_panel.partners.index') }}">
            <div class="card">
                <div class="card-body">
                <div class="d-flex align-items-start justify-content-between">
                    <div class="content-left">
                    <span>Partners</span>
                    <div class="d-flex align-items-end mt-2">
                        <h4 class="mb-0 me-2">{{ $partners_count }}</h4>
                    </div>
                    </div>
                    <span class="badge bg-label-success rounded p-2">
                    <i class="bx bx-user-voice bx-sm"></i>
                    </span>
                </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-sm-6 col-xl-6">
        <a href="{{ route('admin_panel.contact_requests.index') }}">
            <div class="card">
                <div class="card-body">
                <div class="d-flex align-items-start justify-content-between">
                    <div class="content-left">
                    <span>Contact Requests</span>
                    <div class="d-flex align-items-end mt-2">
                        <h4 class="mb-0 me-2">{{ $contact_requests_count }}</h4>
                    </div>
                    </div>
                    <span class="badge bg-label-danger rounded p-2">
                    <i class="bx bx-message-dots bx-sm"></i>
                    </span>
                </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-sm-6 col-xl-12">
        <a href="#">
            <div class="card">
                <div class="card-body">
                <div class="d-flex align-items-start justify-content-between">
                    <div class="content-left">
                    <span>Total Earnings</span>
                    <div class="d-flex align-items-end mt-2">
                        <h4 class="mb-0 me-2">{{ $total_earnings }} EGP</h4>
                    </div>
                    </div>
                    <span class="badge bg-label-info rounded p-2">
                    <i class="bx bx-dollar bx-sm"></i>
                    </span>
                </div>
                </div>
            </div>
        </a>
    </div>
</div>
<div class="row">
    <div class="col-md-6 col-lg-6 col-xl-6 mb-4 order-0">
        <div class="card">
          <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="card-title mb-0">New Orders</h5>
            @if($recent_orders->count())
                <div class="dropdown">
                <a
                    href="{{ route('admin_panel.reservations.index') }}"
                    class="btn btn-sm btn-outline-secondary"
                    type="button"
                    id="orederStatistics"
                >
                    View All
                </a>
                </div>
          </div>
        <div class="card-body pb-3">
            <ul class="p-0 m-0">
            @foreach($recent_orders as $recent_order)
                <span class="d-flex mb-3">
                    <div class="avatar avatar-sm flex-shrink-0 me-3">
                        <span class="avatar-initial rounded-circle bg-label-primary"
                        ><i class="bx bx-cube"></i
                        ></span>
                    </div>
                    <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                        <div class="me-2">
                            <p class="mb-0">Order Date : <strong>{{ $recent_order->created_at }}</strong></p>
                            <p class="mb-0">Order Number : <strong>{{ $recent_order->order_number }}</strong></p>
                            <p class="mb-0">Total : <strong>{{ $recent_order->total }} EGP</strong></p>
                        </div>
                    </div>
                </span>
            @endforeach
            </ul>
        </div>
          @else
          </div>
          <div class="card-body pb-3">
            <h4 class="text-center">No Recent Orders Yet</h4>
          </div>
          @endif
        </div>
    </div>
    <div class="col-md-6 col-lg-6 col-xl-6 mb-4 order-0">
      <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between">
          <h5 class="card-title mb-0">New Users</h5>
          @if($recent_users->count())
            <div class="dropdown">
                <a
                href="{{ route('admin_panel.users.index') }}"
                class="btn btn-sm btn-outline-secondary"
                type="button"
                id="orederStatistics"
                >
                    View All 
            </a>
            </div>
        </div>
        <div class="card-body pb-3">
          <ul class="p-0 m-0">
            @foreach($recent_users as $recent_user)
              <span class="d-flex mb-3">
                <div class="avatar avatar-sm flex-shrink-0 me-3">
                  <span class="avatar-initial rounded-circle bg-label-primary"
                    ><i class="bx bx-cube"></i
                  ></span>
                </div>
                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                  <div class="me-2">
                    <p class="mb-0">Full Name : <strong>{{ $recent_user->name }}</strong></p>
                    <p class="mb-0">Email : <strong>{{ $recent_user->email }}</strong></p>
                    <p class="mb-0">Login By : 
                        @if($recent_user->provider == NULL)
                            <strong>website</strong>
                        @else
                            <strong>{{ $user->provider }}</strong>
                        @endif
                    </p>
                  </div>
                </div>
              </span>
            @endforeach
          </ul>
        </div>
        @else
          </div>
          <div class="card-body pb-3">
            <h4 class="text-center">No New Users Yet</h4>
          </div>
        @endif
      </div>
    </div>
    <div class="col-md-12 col-lg-12 col-xl-12 mb-4 order-0">
        <div class="card">
          <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="card-title mb-0">New Contact Requests</h5>
            @if($recent_contact_requests->count())
              <div class="dropdown">
                  <a
                  href="{{ route('admin_panel.contact_requests.index') }}"
                  class="btn btn-sm btn-outline-secondary"
                  type="button"
                  id="orederStatistics"
                  >
                      View All 
              </a>
              </div>
          </div>
          <div class="card-body pb-3">
            <ul class="p-0 m-0">
              @foreach($recent_contact_requests as $recent_contact_request)
                <span class="d-flex mb-3">
                  <div class="avatar avatar-sm flex-shrink-0 me-3">
                    <span class="avatar-initial rounded-circle bg-label-primary"
                      ><i class="bx bx-cube"></i
                    ></span>
                  </div>
                  <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                    <div class="me-2">
                      <p class="mb-0">Full Name : <strong>{{ $recent_contact_request->first_name . ' ' . $recent_contact_request->last_name }}</strong></p>
                      <p class="mb-0">Email : <strong>{{ $recent_contact_request->email }}</strong></p>
                      <p class="mb-0">Phone : <strong>{{ $recent_contact_request->phone }}</strong></p>
                    </div>
                  </div>
                </span>
              @endforeach
            </ul>
          </div>
          @else
            </div>
            <div class="card-body pb-3">
              <h4 class="text-center">No New Contact Requests Yet</h4>
            </div>
          @endif
        </div>
      </div>
</div>
@endsection

@push('custom-js-scripts')

@endpush