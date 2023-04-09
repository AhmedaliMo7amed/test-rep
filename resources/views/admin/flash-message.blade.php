@if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ $message }}</strong>
    </div>
@endif


@if ($message = Session::get('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>{{ $message }}</strong>
    </div>
@endif

@if ($message = Session::get('error_message'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>{{ $message }}</strong>
    </div>
@endif



@if ($message = Session::get('warning'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>{{ $message }}</strong>
    </div>
@endif



@if ($message = Session::get('info'))
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        <strong>{{ $message }}</strong>
    </div>
@endif

@if ($errors->any())
    <ul class="alert alert-danger list-unstyled">
        @foreach ($errors->all() as $error)
            <li class="mb-1">{{ $error }}</li>
        @endforeach
    </ul>
@endif
