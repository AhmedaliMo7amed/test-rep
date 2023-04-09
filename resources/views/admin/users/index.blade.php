@extends('admin.layouts.master')

@section('title')
    Users
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
                        <h4 class="card-title">Users</h4>
                    </div>
                </div>
            </div>
            <div class="card-body">
            <div class="table-responsive">
                @if(count($users))
                <table class="table">
                <thead class=" text-primary">
                    <th>
                    ID
                    </th>
                    <th>
                    Name
                    </th>
                    <th>
                    Email
                    </th>
                    <th>
                    Login By
                    </th>
                </thead>
                @foreach ($users as $user)
                <tbody>
                    <tr>
                        <td>
                            {{$user->id}}
                        </td>
                        <td>
                            {{$user->name}}
                        </td>
                        <td>
                            {{$user->email}}
                        </td>
                        <td>
                            @if($user->provider == NULL)
                                website
                            @else
                                {{ $user->provider }}
                            @endif
                        </td>
                    </tr>
                </tbody>
                @endforeach
                </table>
                    @else
                    <h3 class="text-center">No Users Found</h3>
                @endif
            </div>
            </div>
        </div>
        </div>
    </div>
@endsection

@push('custom-js-scripts')
    
@endpush