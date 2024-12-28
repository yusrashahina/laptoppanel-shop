@extends('admin-dashboard.layouts.simple')
@section('title','Login')
@section('content')
    <div class="nk-block nk-block-middle nk-auth-body  wide-xs">
        <div class="brand-logo pb-4 text-center">
            <a href="{{route('admin-dashboard.dashboard')}}" class="logo-link">
                <img class="logo-light logo-img logo-img-lg" src="{{asset('admin-dashboard/images/logo.png')}}" srcset="{{asset('images/logo2x.png 2x')}}" alt="logo">
                <img class="logo-dark logo-img logo-img-lg" src="{{asset('admin-dashboard/images/logo-dark.png')}}" srcset="{{asset('images/logo-dark2x.png 2x')}}" alt="logo-dark">
            </a>
        </div>
        @if(session('error'))
            @include('admin-dashboard.partials._alert-error')
        @endif
        <div class="card card-bordered">
            <div class="card-inner card-inner-lg">
                <div class="nk-block-head">
                    <div class="nk-block-head-content">
                        <h4 class="nk-block-title">Sign-In</h4>
                    </div>
                </div>
                <form action="{{route('admin-dashboard.authenticate')}}" method="POST" class="form-validate">
                    @csrf
                    <div class="form-group">
                        <div class="form-label-group">
                            <label class="form-label" for="email">Email</label>
                        </div>
                        <div class="form-control-wrap">
                            <input type="email" name="email" class="form-control form-control-lg" id="email" value="{{ old('email') }}" placeholder="Enter your email address" required tabindex="1">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-label-group">
                            <label class="form-label" for="password">Password</label>
                            <a class="link link-primary link-sm" href="">Forgot password?</a>
                        </div>
                        <div class="form-control-wrap">
                            <a href="#" class="form-icon form-icon-right passcode-switch lg" data-target="password">
                                <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                            </a>
                            <input type="password" name="password" class="form-control form-control-lg" id="password" placeholder="Enter your password" required tabindex="2">
                        </div>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-lg btn-primary btn-block" tabindex="3">Sign in</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
