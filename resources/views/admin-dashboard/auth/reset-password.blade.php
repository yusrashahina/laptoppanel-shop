@extends('admin-dashboard.layouts.simple')
@section('title','Reset your password')
@section('content')
    <div class="nk-block nk-block-middle nk-auth-body  wide-xs">
        <div class="brand-logo pb-4 text-center">
            <a href="{{route('admin-dashboard.dashboard')}}" class="logo-link">
                <img class="logo-light logo-img logo-img-lg" src="{{asset('admin-dashboard/images/logo.png')}}" srcset="{{asset('images/logo2x.png 2x')}}" alt="logo">
                <img class="logo-dark logo-img logo-img-lg" src="{{asset('admin-dashboard/images/logo-dark.png')}}" srcset="{{asset('images/logo-dark2x.png 2x')}}" alt="logo-dark">
            </a>
        </div>

        @include('admin-dashboard.partials._alert-error')
        @include('admin-dashboard.partials._alert-success')

        <div class="card card-bordered">
            <div class="card-inner card-inner-lg">
                <div class="nk-block-head">
                    <div class="nk-block-head-content">
                        <h5 class="nk-block-title">New Password</h5>
                        <div class="nk-block-des">
                            <p>Enter a new password that is minimum 8 characters long.</p>
                        </div>
                    </div>
                </div>
                <form action="{{route('admin-dashboard.password.update')}}" method="post" class="form-validate">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    <input type="hidden" name="email" value="{{ $email }}">
                    <div class="form-group">
                        <div class="form-label-group">
                            <label class="form-label" for="password">Password</label>
                        </div>
                        <div class="form-control-wrap">
                            <a href="#" class="form-icon form-icon-right passcode-switch lg" data-target="password">
                                <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                            </a>
                            <input type="password" name="password" class="form-control form-control-lg" id="password" placeholder="Enter your new password" data-rule-minlength="8" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-label-group">
                            <label class="form-label" for="password_confirmation">Confirm Password</label>
                        </div>
                        <div class="form-control-wrap">
                            <a href="#" class="form-icon form-icon-right passcode-switch lg" data-target="password_confirmation">
                                <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                            </a>
                            <input type="password" name="password_confirmation" class="form-control form-control-lg" id="password_confirmation" placeholder="Confirm your new password" data-rule-equalTo="#password" data-rule-minlength="8" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-lg btn-primary btn-block">Reset Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
