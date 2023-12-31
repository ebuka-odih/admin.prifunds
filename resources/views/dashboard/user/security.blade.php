@extends('dashboard.layout.app')
@section('content')

    <div class="nk-content nk-content-fluid">
        <div class="container-xl wide-lg">
            <div class="nk-content-body">
                <div class="nk-block">
                    <div class="card card-bordered">
                        <div class="card-aside-wrap">
                            <div class="card-inner card-inner-lg">
                                <div class="nk-block-head nk-block-head-lg">
                                    <div class="nk-block-between">
                                        <div class="nk-block-head-content">
                                            <h4 class="nk-block-title">Change Password</h4>
                                        </div>
                                        <div class="nk-block-head-content align-self-start d-lg-none">
                                            <a href="#" class="toggle btn btn-icon btn-trigger mt-n1" data-target="userAside"><em class="icon ni ni-menu-alt-r"></em></a>
                                        </div>
                                    </div>
                                </div><!-- .nk-block-head -->
                                <div class="nk-block">
                                    <div class="col-lg-8">
                                        <div class="card card-bordered h-100">
                                            <div class="card-inner">
                                                <form action="{{ route('user.changePasswordSave') }}" method="POST">
                                                    @csrf
                                                    @if ($errors->any())
                                                        <div class="alert alert-danger">
                                                            <ul>
                                                                @foreach ($errors->all() as $error)
                                                                    <li>{{ $error }}</li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    @endif
                                                    @if(session()->has('error'))
                                                        <div class="alert alert-danger">
                                                            {{ session()->get('error') }}
                                                        </div>
                                                    @endif
                                                    @if(session()->has('success'))
                                                        <div class="alert alert-success">
                                                            {{ session()->get('success') }}
                                                        </div>
                                                    @endif
                                                    <div class="form-group">
                                                        <label class="form-label" for="full-name">Current Password</label>
                                                        <div class="form-control-wrap">
                                                            <input type="password" name="current_password" class="form-control" id="full-name">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label" for="email-address">New Password</label>
                                                        <div class="form-control-wrap">
                                                            <input type="password" name="new_password" class="form-control" id="email-address">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label" for="phone-no">Confirm New Password</label>
                                                        <div class="form-control-wrap">
                                                            <input type="password" name="new_password_confirmation" class="form-control" id="phone-no">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-lg btn-primary">Update Password</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                </div><!-- .nk-block -->
                            </div>
                            <div class="card-aside card-aside-left user-aside toggle-slide toggle-slide-left toggle-break-lg toggle-screen-lg" data-toggle-body="true" data-content="userAside" data-toggle-screen="lg" data-toggle-overlay="true">
                                <div class="card-inner-group" data-simplebar="init"><div class="simplebar-wrapper" style="margin: 0px;"><div class="simplebar-height-auto-observer-wrapper"><div class="simplebar-height-auto-observer"></div></div><div class="simplebar-mask"><div class="simplebar-offset" style="right: 0px; bottom: 0px;"><div class="simplebar-content-wrapper" tabindex="0" role="region" aria-label="scrollable content" style="height: auto; overflow: hidden;"><div class="simplebar-content" style="padding: 0px;">
                                                        <div class="card-inner">
                                                            <div class="user-card">
                                                                <div class="user-avatar bg-primary">
                                                                    <span>AB</span>
                                                                </div>
                                                                <div class="user-info">
                                                                    <span class="lead-text">{{ $user->name }}</span>
                                                                    <span class="sub-text">{{ $user->email }}</span>
                                                                </div>
                                                                <div class="user-action">
                                                                    <div class="dropdown">
                                                                        <a class="btn btn-icon btn-trigger me-n2" data-bs-toggle="dropdown" href="#"><em class="icon ni ni-more-v"></em></a>
                                                                        <div class="dropdown-menu dropdown-menu-end">
                                                                            <ul class="link-list-opt no-bdr">
                                                                                <li><a href="#"><em class="icon ni ni-camera-fill"></em><span>Change Photo</span></a></li>
                                                                                <li><a href="#"><em class="icon ni ni-edit-fill"></em><span>Update Profile</span></a></li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div><!-- .user-card -->
                                                        </div><!-- .card-inner -->
                                                        <div class="card-inner">
                                                            <div class="user-account-info py-0">
                                                                <h6 class="overline-title-alt">Account Wallet</h6>
                                                                <div class="user-balance">@money($user->balance) <small class="currency currency-btc">{{ $user->currency }}</small></div>
                                                                <div class="user-balance-sub"><span class="text-success">Profit</span> <span>@money($user->profit) <span class="currency currency-btc">{{ $user->currency }}</span></span></div>
                                                            </div>
                                                        </div><!-- .card-inner -->
                                                        <div class="card-inner p-0">
                                                            <ul class="link-list-menu">
                                                                <li><a  href="{{ route('user.profile') }}"><em class="icon ni ni-user-fill-c"></em><span>Personal Information</span></a></li>
                                                                <li><a href="{{ route('user.setting') }}"><em class="icon ni ni-setting"></em><span>Account Settings</span></a></li>

                                                                <li><a class="active" href="{{ route('user.security') }}"><em class="icon ni ni-lock-alt-fill"></em><span>Security Settings</span></a></li>
                                                            </ul>
                                                        </div><!-- .card-inner -->
                                                    </div></div></div></div><div class="simplebar-placeholder" style="width: auto; height: 451px;"></div></div><div class="simplebar-track simplebar-horizontal" style="visibility: hidden;"><div class="simplebar-scrollbar" style="width: 0px; display: none;"></div></div><div class="simplebar-track simplebar-vertical" style="visibility: hidden;"><div class="simplebar-scrollbar" style="height: 0px; display: none;"></div></div></div><!-- .card-inner-group -->
                            </div><!-- card-aside -->
                        </div><!-- .card-aside-wrap -->
                    </div><!-- .card -->
                </div><!-- .nk-block -->
            </div>
        </div>
    </div>

@endsection
