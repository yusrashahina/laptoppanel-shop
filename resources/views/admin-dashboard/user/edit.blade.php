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
            <!-- Tabs Navigation -->
            <ul class="nav nav-tabs mt-n3" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" data-bs-toggle="tab" href="#userProfileTab" aria-selected="true" role="tab">
                        <em class="icon ni ni-user"></em><span>User Profile</span>
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" data-bs-toggle="tab" href="#emptyTab" aria-selected="false" role="tab" tabindex="-1">
                        <em class="icon ni ni-lock-alt"></em><span>Other Tabs</span>
                    </a>
                </li>
            </ul>

            <!-- Tabs Content -->
            <div class="tab-content">
                <!-- User Profile Tab -->
                <div class="tab-pane active show" id="userProfileTab" role="tabpanel">
                    <form action="{{ route('admin-dashboard.users.update', $user->id) }}" method="POST" class="has-validation">
                        @csrf
                        @method('PUT')
                        <div class="row g-4">
                            <!-- Full Name -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="name">Full Name</label>
                                    <div class="form-control-wrap">
                                        <input type="text" name="name" class="form-control form-control-lg" id="name" value="{{ old('name', $user->name) }}" required>
                                    </div>
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="email">Email address</label>
                                    <div class="form-control-wrap">
                                        <input type="email" name="email" class="form-control form-control-lg" id="email" value="{{ old('email', $user->email) }}" required>
                                    </div>
                                </div>
                            </div>

                            <!-- Role -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="role">Role</label>
                                    <div class="form-control-wrap">
                                        <select class="form-select js-select2" name="role" id="role" data-ui="lg" data-search="off" data-placeholder="Select Role" required>
                                            <option value="">Select Role</option>
                                            @foreach($roles as $role)
                                                <option value="{{ $role->id }}" {{ old('role', $user->roles->first()->id ?? '') == $role->id ? 'selected' : '' }}>
                                                    {{ $role->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- Status -->
                            <div class="col-md-6">
                                <label class="form-label">Status</label>
                                <div class="form-group">
                                    <div class="custom-control custom-control-lg custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="statusSwitch" name="status" value="1"
                                            {{ $user->status ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="statusSwitch">
                                            <span id="statusText">{{ $user->status ? 'Active' : 'Suspended' }}</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>

                <!-- Placeholder for other tabs -->
                <div class="tab-pane" id="emptyTab" role="tabpanel">
                    <!-- Empty for now -->
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts-after-main')
    <script>
        $(document).ready(function () {
            $('#statusSwitch').on('change', function () {
                const statusText = $('#statusText');
                if ($(this).is(':checked')) {
                    statusText.text('Active');
                } else {
                    statusText.text('Suspended');
                }
            });
        });
    </script>
@endpush
