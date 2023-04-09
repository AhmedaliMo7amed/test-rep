@extends('front.layouts.master')



@section('content')

    <div class="container py-5 px-5 w-50">

        @isset($status)
            <div class="mb-3">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ $status }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span class="fa fa-times"></span>
                    </button>
                </div>
            </div>
        @endisset


        <form action="{{ route('prepare.checkout') }}" method="POST" enctype="application/x-www-form-urlencoded">
            @csrf
            <div class="form-group">
              <label for="exampleInputEmail1">price</label>
              <input type="text" class="form-control" name="price" placeholder="Enter Price">
            </div>

            <button type="submit" class="btn btn-primary">Buy</button>
          </form>
    </div>
@endsection
