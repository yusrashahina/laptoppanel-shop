@extends('admin-dashboard.layouts.dashboard')
@section('title','Users')
@section('content')
    <div class="nk-block-head nk-block-head-sm">
        <div class="nk-block-between">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Users Lists</h3>
            </div><!-- .nk-block-head-content -->
            <div class="nk-block-head-content">
                <div class="toggle-wrap nk-block-tools-toggle">
                    <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                    <div class="toggle-expand-content" data-content="pageMenu">
                        <ul class="nk-block-tools g-3">
                            <li><a href="#" class="btn btn-white btn-outline-light"><em class="icon ni ni-download-cloud"></em><span>Export</span></a></li>
                            <li><a href="#" class="btn btn-white btn-outline-light"><em class="icon ni ni-upload-cloud"></em><span>Import</span></a></li>
                            <li class="nk-block-tools-opt">
                                <a href="#" class="btn btn-primary"><em class="icon ni ni-user-add-fill"></em><span>Add User</span></a>
                            </li>
                        </ul>
                    </div>
                </div><!-- .toggle-wrap -->
            </div><!-- .nk-block-head-content -->
        </div><!-- .nk-block-between -->
    </div><!-- .nk-block-head -->
    <div class="nk-block">
        <ul class="breadcrumb breadcrumb-pipe">
            <li class="breadcrumb-item active">
                <a href="{{route('admin-dashboard.users.index')}}">All ({{$users->count()}})</a>
            </li>
            <li class="breadcrumb-item">
                <a href="#">Active (count)</a>
            </li>
            <li class="breadcrumb-item">
                <a href="#">Suspended (count)</a>
            </li>
            <li class="breadcrumb-item ">
                <a href="#">Trash (count)</a>
            </li>
        </ul>
    </div>
    <div class="nk-block">
        <div class="card card-bordered card-stretch">
            <div class="card-inner-group">
                <div class="card-inner position-relative card-tools-toggle">
                    <div class="card-title-group">
                        <div class="card-tools">
                            <div class="form-inline flex-nowrap gx-3">
                                <div class="form-wrap w-150px">
                                    <select class="form-select js-select2" data-search="off" data-placeholder="Bulk Action">
                                        <option value="">Bulk Action</option>
                                        <option value="suspend">Suspend</option>
                                        <option value="delete">Delete</option>
                                    </select>
                                </div>
                                <div class="btn-wrap">
                                    <span class="d-none d-md-block"><button class="btn btn-dim btn-outline-light disabled">Apply</button></span>
                                    <span class="d-md-none"><button class="btn btn-dim btn-outline-light btn-icon disabled"><em class="icon ni ni-arrow-right"></em></button></span>
                                </div>
                            </div><!-- .form-inline -->
                        </div><!-- .card-tools -->
                        <div class="card-tools me-n1">
                            <ul class="btn-toolbar gx-1">
                                @if(request('search'))
                                    <li>
                                        <span class="badge rounded-pill bg-light text-dark">{{ request('search') }}
                                            <a href="{{ route('admin-dashboard.users.index') }}" class="text-dark ms-2"><em class="icon ni ni-cross"></em></a>
                                        </span>
                                    </li>
                                @endif
                                <li>
                                    <a href="#" class="btn btn-icon search-toggle toggle-search" data-target="search"><em class="icon ni ni-search"></em></a>
                                </li><!-- li -->
                                <li class="btn-toolbar-sep"></li><!-- li -->
                                <li>
                                    <div class="toggle-wrap">
                                        <a href="#" class="btn btn-icon btn-trigger toggle" data-target="cardTools"><em class="icon ni ni-menu-right"></em></a>
                                        <div class="toggle-content" data-content="cardTools">
                                            <ul class="btn-toolbar gx-1">
                                                <li class="toggle-close">
                                                    <a href="#" class="btn btn-icon btn-trigger toggle" data-target="cardTools"><em class="icon ni ni-arrow-left"></em></a>
                                                </li><!-- li -->
                                                <li>
                                                    <div class="dropdown">
                                                        <a href="#" class="btn btn-trigger btn-icon dropdown-toggle" data-bs-toggle="dropdown">
                                                            <div class="dot dot-primary"></div>
                                                            <em class="icon ni ni-filter-alt"></em>
                                                        </a>
                                                        <div class="filter-wg dropdown-menu dropdown-menu-xl dropdown-menu-end">
                                                            <div class="dropdown-head">
                                                                <span class="sub-title dropdown-title">Filter Users</span>
                                                            </div>
                                                            <div class="dropdown-body dropdown-body-rg">
                                                                <div class="row gx-6 gy-3">
                                                                    <div class="col-6">
                                                                        <div class="custom-control custom-control-sm custom-checkbox">
                                                                            <input type="checkbox" class="custom-control-input" id="hasBalance">
                                                                            <label class="custom-control-label" for="hasBalance"> Have Balance</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <div class="custom-control custom-control-sm custom-checkbox">
                                                                            <input type="checkbox" class="custom-control-input" id="hasKYC">
                                                                            <label class="custom-control-label" for="hasKYC"> KYC Verified</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <div class="form-group">
                                                                            <label class="overline-title overline-title-alt">Card Type</label>
                                                                            <select class="form-select js-select2">
                                                                                <option value="any">Any Card</option>
                                                                                <option value="Visa">Visa</option>
                                                                                <option value="Mastercard">Mastercard</option>
                                                                                <option value="AmericanExpress">American Express</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <div class="form-group">
                                                                            <label class="overline-title overline-title-alt">Status</label>
                                                                            <select class="form-select js-select2">
                                                                                <option value="any">Any Status</option>
                                                                                <option value="new">New</option>
                                                                                <option value="active">Active</option>
                                                                                <option value="suspend">Suspend</option>
                                                                                <option value="deleted">Deleted</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <div class="form-group">
                                                                            <button type="button" class="btn btn-secondary">Filter</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="dropdown-foot between">
                                                                <a class="clickable" href="#">Reset Filter</a>
                                                                <a href="#">Save Filter</a>
                                                            </div>
                                                        </div><!-- .filter-wg -->
                                                    </div><!-- .dropdown -->
                                                </li><!-- li -->
                                                <li>
                                                    <div class="dropdown">
                                                        <a href="#" class="btn btn-trigger btn-icon dropdown-toggle" data-bs-toggle="dropdown">
                                                            <em class="icon ni ni-setting"></em>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-xs dropdown-menu-end">
                                                            <ul class="link-check">
                                                                <li><span>Show</span></li>
                                                                <li class="{{ $pageSize == 10 ? 'active' : '' }}">
                                                                    <a href="#" class="update-page-size" data-size="10">10</a>
                                                                </li>
                                                                <li class="{{ $pageSize == 20 ? 'active' : '' }}">
                                                                    <a href="#" class="update-page-size" data-size="20">20</a>
                                                                </li>
                                                                <li class="{{ $pageSize == 50 ? 'active' : '' }}">
                                                                    <a href="#" class="update-page-size" data-size="50">50</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div><!-- .dropdown -->
                                                </li><!-- li -->
                                            </ul><!-- .btn-toolbar -->
                                        </div><!-- .toggle-content -->
                                    </div><!-- .toggle-wrap -->
                                </li><!-- li -->
                            </ul><!-- .btn-toolbar -->
                        </div><!-- .card-tools -->
                    </div><!-- .card-title-group -->
                    <div class="card-search search-wrap" data-search="search">
                        <div class="card-body">
                            <div class="search-content">
                                <!-- Search Form (Updated for Proper Submission) -->
                                <form method="GET" action="{{ route('admin-dashboard.users.index') }}" class="card-search search-wrap" data-search="search">
                                    <div class="card-body">
                                        <div class="search-content">
                                            <a href="#" class="search-back btn btn-icon toggle-search" data-target="search">
                                                <em class="icon ni ni-arrow-left"></em>
                                            </a>
                                            <input
                                                type="text"
                                                class="form-control border-transparent form-focus-none"
                                                name="search"
                                                value="{{ request('search') }}"
                                                placeholder="Search by name or email"
                                                minlength="3"
                                                required
                                            >
                                            <button class="search-submit btn btn-icon" type="submit">
                                                <em class="icon ni ni-search"></em>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div><!-- .card-inner -->
                <div class="card-inner p-0">
                    <div class="nk-tb-list nk-tb-ulist">
                        <div class="nk-tb-item nk-tb-head">
                            <div class="nk-tb-col nk-tb-col-check">
                                <div class="custom-control custom-control-sm custom-checkbox notext">
                                    <input type="checkbox" class="custom-control-input" id="cid">
                                    <label class="custom-control-label" for="cid"></label>
                                </div>
                            </div>
                            <div class="nk-tb-col">
                                @include('admin-dashboard.partials._sortable-column', ['column' => 'name', 'label' => 'Name'])
                            </div>
                            <div class="nk-tb-col tb-col-sm">
                                @include('admin-dashboard.partials._sortable-column', ['column' => 'email', 'label' => 'Email'])
                            </div>
                            <div class="nk-tb-col tb-col-md"><span class="sub-text">Role</span></div>
                            <div class="nk-tb-col tb-col-xxl">
                                @include('admin-dashboard.partials._sortable-column', ['column' => 'created_at', 'label' => 'Joined'])
                            </div>
                            <div class="nk-tb-col tb-col-lg"><span class="sub-text">Last Login</span></div>
                            <div class="nk-tb-col tb-col-lg">@include('admin-dashboard.partials._sortable-column', ['column' => 'status', 'label' => 'Status'])</div>
                            <div class="nk-tb-col text-end"><span class="sub-text">Actions</span></div>
                        </div><!-- .nk-tb-item -->
                        @foreach($users as $user)
                            <div class="nk-tb-item">
                                <div class="nk-tb-col nk-tb-col-check">
                                    <div class="custom-control custom-control-sm custom-checkbox notext">
                                        <input type="checkbox" class="custom-control-input" id="cid1">
                                        <label class="custom-control-label" for="cid1"></label>
                                    </div>
                                </div>
                                <div class="nk-tb-col">
                                    <a href="#">
                                        <div class="user-card">
                                            <div class="user-avatar sm">
                                                <img src="{{asset('admin-dashboard/images/avatar/a-sm.jpg')}}" alt="user avatar">
                                            </div>
                                            <div class="user-name">
                                                <span class="tb-lead">{{$user->name}} <span class="dot dot-success d-lg-none ms-1"></span></span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="nk-tb-col tb-col-sm">
                                    <span class="sub-text">{{$user->email}}</span>
                                </div>
                                <div class="nk-tb-col tb-col-md">
                                    <span class="sub-text">Super Admin</span>
                                </div>
                                <div class="nk-tb-col tb-col-lg">
                                    <span class="sub-text">{{$user->created_at->diffForHumans()}}</span>
                                </div>
                                <div class="nk-tb-col tb-col-xxl">
                                    <span class="sub-text">{{ $user->last_login ? $user->last_login->diffForHumans() : 'N/A' }}</span>
                                </div>
                                <div class="nk-tb-col tb-col-lg">
                                    {!! ($user->status) ? '<span class="badge badge-dim bg-success">Active</span>' : '<span class="badge badge-dim bg-danger">Suspended</span>' !!}
                                </div>
                                <div class="nk-tb-col nk-tb-col-tools">
                                    <ul class="nk-tb-actions gx-1">
                                        <li class="nk-tb-action-hidden">
                                            <a href="#" class="btn btn-trigger btn-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="Suspend">
                                                <em class="icon ni ni-user-cross-fill"></em>
                                            </a>
                                        </li>
                                        <li class="nk-tb-action-hidden">
                                            <a href="#" class="btn btn-trigger btn-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                                                <em class="icon ni ni-trash-fill"></em>
                                            </a>
                                        </li>
                                        <li>
                                            <div class="drodown">
                                                <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <ul class="link-list-opt no-bdr">
                                                        <li><a href="#"><em class="icon ni ni-cart"></em><span>Delete</span></a></li>
                                                        <li><a href="#"><em class="icon ni ni-na"></em><span>Suspend</span></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div><!-- .nk-tb-item -->
                        @endforeach
                    </div><!-- .nk-tb-list -->
                    No data available
                </div><!-- .card-inner -->
                <div class="card-inner">
                    <div class="nk-block-between-md g-3">
                        <div class="g">
                            {{ $users->links('admin-dashboard.vendor.pagination.default') }}
                        </div>
                        <div class="g" style="font-size: 12px; color: #8094ae;">
                            <div>Showing {{ $users->firstItem() }} to {{ $users->lastItem() }} of {{ $users->total() }} records</div>
                        </div>
                    </div><!-- .nk-block-between -->
                </div><!-- .card-inner -->
            </div><!-- .card-inner-group -->
        </div><!-- .card -->
    </div><!-- .nk-block -->
@endsection

@push('scripts-after-main')
    <script>
        $(document).ready(function () {
            $('.update-page-size').on('click', function (e) {
                e.preventDefault();

                let pageSize = $(this).data('size');

                $.post("{{ route('admin-dashboard.users.update-preference') }}", {
                    _token: "{{ csrf_token() }}",
                    page_size: pageSize
                }).done(function () {
                    location.reload();
                }).fail(function () {
                    alert('Failed to update page size. Please try again.');
                });
            });
        });

        $(document).ready(function () {
            $('#searchSubmitButton').on('click', function (e) {
                e.preventDefault();
                let searchValue = $('#userSearchInput').val().trim();
                if (searchValue.length > 0) {
                    window.location.href = "{{ route('admin-dashboard.users.index') }}" + '?search=' + searchValue;
                }
            });
        });
    </script>
@endpush
