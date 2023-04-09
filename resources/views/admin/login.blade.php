@extends('admin.layouts.master')

@section('title')
    Dashboard
@endsection

@push('custom-css-scripts')
  <link rel="stylesheet" href="{{ asset('admin/css/pages/page-auth.css') }}" />
@endpush

@section('login')
  <div class="authentication-wrapper authentication-cover">
      <div class="authentication-inner row m-0">
        <!-- /Left Text -->
        <div class="d-none d-lg-flex col-lg-6 col-xl-6 align-items-center">
          <div class="flex-row text-center mx-auto">
            <img
              src="{{ asset('uploads/' . $setting->logo_image) }}"
              alt="Auth Cover Bg color"
              width="520"
              class="img-fluid authentication-cover-img"
              data-app-light-img="pages/login-light.png"
              data-app-dark-img="pages/login-dark.png"
            />
          </div>
        </div>
        <!-- /Left Text -->

        <!-- Login -->
        <div class="d-flex col-12 col-lg-6 col-xl-6 align-items-center authentication-bg p-sm-5 p-4">
          <div class="w-px-400 mx-auto">
            <!-- Logo -->
            <div class="app-brand mb-4">
              <a href="#" class="app-brand-link gap-2 mb-2">
                <span class="app-brand-text demo menu-text fw-bold ms-2"><img src="{{ asset('uploads/' . $setting->logo_image) }}" width="325px" height="100px" /></span>
              </a>
            </div>
            <!-- /Logo -->
            <h4 class="mb-2">Welcome to Serry Admin Dashboard! 👋</h4>
            <p class="mb-4">Please sign-in to your account and start the adventure</p>

            @if(session('error'))
                <div class="alert alert-danger" style="text-align: center;">
                    <strong>{{ session('error') }}</strong>
                </div>
            @endif
            <form id="formAuthentication" class="mb-3" method="POST" action="{{ route('admin_login') }}">
              @csrf
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input
                  type="text"
                  class="form-control @error('email') is-invalid @enderror"
                  id="email"
                  name="email"
                  value="{{ old('email') }}"
                  placeholder="Enter your email"
                  autofocus
                />
                  @if ($errors->has('email'))
                      <span class="help-block" style="color:red">
                          <strong>{{ $errors->first('email') }} </strong>
                      </span>
                  @endif
              </div>
              <div class="mb-3 form-password-toggle">
                <div class="input-group input-group-merge">
                  <input
                    type="password"
                    id="password"
                    class="form-control @error('password') is-invalid @enderror"
                    name="password"
                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                    aria-describedby="password"
                  />
                  <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                </div>
                  @if ($errors->has('password'))
                      <span class="help-block" style="color:red">
                          <strong>{{ $errors->first('password') }} </strong>
                      </span>
                  @endif
              </div>
              <div class="mb-3">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="remember-me" name="remember" {{ old('remember') ? 'checked' : '' }} />
                  <label class="form-check-label" for="remember-me"> Remember Me </label>
                </div>
              </div>
              <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
            </form>
          </div>
        </div>
        <!-- /Login -->
      </div>
  </div>
@endsection

@push('custom-js-scripts')

@endpush