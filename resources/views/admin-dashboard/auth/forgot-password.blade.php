@extends('admin-dashboard.layouts.simple')
@section('title','Password Reset')
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
        @elseif(session('success'))
            @include('admin-dashboard.partials._alert-success')
        @endif
        <div class="card card-bordered">
            <div class="card-inner card-inner-lg">
                <div class="nk-block-head">
                    <div class="nk-block-head-content">
                        <h5 class="nk-block-title">Forgot your password?</h5>
                        <div class="nk-block-des">
                            <p>Enter the email associated with your account and we'll send you password reset instructions.</p>
                        </div>
                    </div>
                </div>
                <form action="{{route('admin-dashboard.password.email')}}" method="post" class="form-validate">
                    @csrf
                    <div class="form-group">
                        <div class="form-label-group">
                            <label class="form-label" for="email">Email</label>
                        </div>
                        <div class="form-control-wrap">
                            <input type="email" name="email" class="form-control form-control-lg" id="email" placeholder="Enter your email address" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-lg btn-primary btn-block">Send password reset email</button>
                    </div>
                </form>
                <div class="form-note-s2 text-center pt-4">
                    <a href="{{route('admin-dashboard.login')}}"><strong>Return to login</strong></a>
                </div>
            </div>
        </div>
    </div>
@endsection
