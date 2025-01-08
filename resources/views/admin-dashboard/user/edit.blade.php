@extends('admin-dashboard.layouts.dashboard')
@section('title','Edit user')
@section('content')
    <div class="nk-block-head nk-block-head-sm">
        <div class="nk-block-between">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Edit User</h3>
            </div><!-- .nk-block-head-content -->
        </div><!-- .nk-block-between -->
    </div><!-- .nk-block-head -->
    @include('admin-dashboard.partials._alert-error')
    <div class="card card-bordered h-100">
        <div class="card-inner">
            <form action="{{route('admin-dashboard.users.update')}}" method="post" class="has-validation">
                @csrf
                <div class="row g-4">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-label" for="name">Full Name</label>
                            <div class="form-control-wrap">
                                <input type="text" name="name" class="form-control form-control-lg" id="name" value="{{ old('name') }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-label" for="email">Email address</label>
                            <div class="form-control-wrap">
                                <input type="text" name="email" class="form-control form-control-lg" id="email" value="{{ old('email') }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-label" for="password">Password</label>
                            <div class="form-control-wrap">
                                <a href="#" class="form-icon form-icon-right passcode-switch lg" data-target="password">
                                    <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                    <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                </a>
                                <input type="password" name="password" class="form-control form-control-lg" id="password" data-rule-minlength="8" required>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-label" for="role">Role</label>
                            <div class="form-control-wrap">
                                <select class="form-select js-select2" name="role" id="role" data-ui="lg" data-search="off" data-placeholder="Select Role" required>
                                    <option value="">Select Role</option>
                                    @foreach($roles as $role)
                                        <option value="{{ $role->id }}" {{ old('role') == $role->id ? 'selected' : '' }}>
                                            {{ $role->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="customSwitch1">
                                <label class="custom-control-label" for="customSwitch1">Switch</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <button type="submit" class="btn btn-lg btn-primary">Create User</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
