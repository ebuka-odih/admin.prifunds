<!DOCTYPE html>
<html lang="zxx" class="js">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Gain deeper insight into your trading behavior to drive sustainable profits through the power of {{ env('APP_NAME') }} journal. Start seeing actionable results today!">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="./images/favicon.png">
    <!-- Page Title  -->
    <title > Dashboard | {{ env('APP_NAME') }}</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="{{ asset('dash/assets/css/dashlite.css?ver=3.2.0') }}">
    <link id="skin-default" rel="stylesheet" href="{{ asset('dash/assets/css/theme.css?ver=3.2.0') }}">

    <script src="//code.jivosite.com/widget/mFUCXZvcxs" async></script>

</head>

<body class="nk-body npc-crypto bg-white is-dark has-sidebar dark-mode">
<div class="nk-app-root">
    <!-- main @s -->
    <div class="nk-main ">
        <!-- sidebar @s -->
        <div class="nk-sidebar nk-sidebar-fixed " data-content="sidebarMenu">
            <div class="nk-sidebar-element nk-sidebar-head">
                <div class="nk-sidebar-brand">
                    <a href="{{ route('index') }}" class="logo-link nk-sidebar-logo">
                        <img class=" logo-img" src="{{ asset('img/logo.png') }}" srcset="{{ asset('img/logo.png') }} 2x" alt="logo">
{{--                        <span class="nio-version">Crypto</span>--}}
                    </a>
                </div>
                <div class="nk-menu-trigger me-n2">
                    <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em class="icon ni ni-arrow-left"></em></a>
                </div>
            </div><!-- .nk-sidebar-element -->
            <div class="nk-sidebar-element">
                <div class="nk-sidebar-body" data-simplebar>
                    <div class="nk-sidebar-content">
                        <div class="nk-sidebar-widget d-none d-xl-block">
                            <div class="user-account-info between-center">
                                <div class="user-account-main">
                                    <h6 class="overline-title-alt">Available Balance</h6>
                                    <div class="user-balance">@money(auth()->user()->balance) <small class="currency currency-btc">{{ auth()->user()->currency ? : "USD" }}</small></div>

                                </div>
                                <a href="#" class="btn btn-white btn-icon btn-light"><em class="icon ni ni-line-chart"></em></a>
                            </div>
                            <ul class="user-account-data gy-1">
                                <li>
                                    <div class="user-account-label">
                                        <span class="sub-text">Profits </span>
                                    </div>
                                    <div class="user-account-value">
                                        <span class="lead-text">+ @money(auth()->user()->balance) <span class="currency currency-btc">{{ auth()->user()->currency ? : "USD" }}</span></span>
                                    </div>
                                </li>

                            </ul>
                            <div class="user-account-actions">
                                <ul class="g-3">
                                    <li><a href="{{ route('user.deposit') }}" class="btn btn-lg btn-primary"><span> Add Funds</span></a></li>
                                    <li><a href="{{ route('user.withdraw') }}" class="btn btn-lg btn-warning"><span>Withdraw</span></a></li>
                                </ul>
                            </div>
                        </div><!-- .nk-sidebar-widget -->
                        <div class="nk-sidebar-widget nk-sidebar-widget-full d-xl-none pt-0">
                            <a class="nk-profile-toggle toggle-expand" data-target="sidebarProfile" href="#">
                                <div class="user-card-wrap">
                                    <div class="user-card">
                                        <div class="user-avatar">
                                            <span>AB</span>
                                        </div>
                                        <div class="user-info">
                                            <span class="lead-text">{{ auth()->user()->name }}</span>
                                            <span class="sub-text">{{ auth()->user()->email }}</span>
                                        </div>
                                        <div class="user-action">
                                            <em class="icon ni ni-chevron-down"></em>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <div class="nk-profile-content toggle-expand-content" data-content="sidebarProfile">
                                <div class="user-account-info between-center">
                                    <div class="user-account-main">
                                        <h6 class="overline-title-alt">Available Balance</h6>
                                        <div class="user-balance">{{ auth()->user()->balance }} <small class="currency currency-btc">{{ auth()->user()->currency }}</small></div>
                                    </div>
                                    <a href="#" class="btn btn-icon btn-light"><em class="icon ni ni-line-chart"></em></a>
                                </div>
                                <ul class="user-account-data">
                                    <li>
                                        <div class="user-account-label">
                                            <span class="sub-text">Profits</span>
                                        </div>
                                        <div class="user-account-value">
                                            <span class="lead-text">+ {{ auth()->user()->profit }} <span class="currency currency-btc">{{ auth()->user()->currency }}</span></span>
                                        </div>
                                    </li>

                                </ul>
                                <ul class="user-account-links">
                                    <li><a href="{{ route('user.withdraw') }}" class="link"><span>Withdraw Funds</span> <em class="icon ni ni-wallet-out"></em></a></li>
                                    <li><a href="{{ route('user.deposit') }}" class="link"><span>Add Funds</span> <em class="icon ni ni-wallet-in"></em></a></li>
                                </ul>
                                <ul class="link-list">
                                    <li><a href="{{ route('user.profile') }}"><em class="icon ni ni-user-alt"></em><span>View Profile</span></a></li>
                                    <li><a href="{{ route('user.setting') }}"><em class="icon ni ni-setting-alt"></em><span>Account Setting</span></a></li>
                                </ul>
                                <ul class="link-list">
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf

                                            <a href="#" :href="route('logout')"
                                               onclick="event.preventDefault();
                                                this.closest('form').submit();"><em class="icon ni ni-signout"></em><span>Sign out</span></a>
                                        </form>
                                       </li>
                                </ul>
                            </div>
                        </div><!-- .nk-sidebar-widget -->

                        <div class="nk-sidebar-menu">
                            <!-- Menu -->
                            <ul class="nk-menu">
                                <li class="nk-menu-heading">
                                    <h6 class="overline-title">Menu</h6>
                                </li>
                                <li class="nk-menu-item">
                                    <a href="{{ route('user.dashboard') }}" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-dashboard"></em></span>
                                        <span class="nk-menu-text">Dashboard</span>
                                    </a>
                                </li>
                                <li class="nk-menu-item">
                                    <a href="{{ route('user.depositHistory') }}" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-money"></em></span>
                                        <span class="nk-menu-text">Transactions</span>
                                    </a>
                                </li>
                                <li class="nk-menu-item">
                                    <a href="{{ route('user.forexHistory') }}" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-history"></em></span>
                                        <span class="nk-menu-text"> History</span>
                                    </a>
                                </li>
                                <li class="nk-menu-item">
                                    <a href="{{ route('user.trade') }}" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-coin-alt"></em></span>
                                        <span class="nk-menu-text">Trade Forex</span>
                                    </a>
                                </li>
                                <li class="nk-menu-item">
                                    <a href="{{ route('user.stock.list') }}" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-chart-up"></em></span>
                                        <span class="nk-menu-text">Stocks</span>
                                    </a>
                                </li>
                                <li class="nk-menu-item">
                                    <a href="#" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-houzz"></em></span>
                                        <span class="nk-menu-text">Real Estate</span>
                                        <span class="badge bg-danger">New</span>
                                    </a>
                                </li>


                                <li class="nk-menu-item">
                                    <a href="{{ route('user.profile') }}" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-account-setting"></em></span>
                                        <span class="nk-menu-text">My Profile</span>
                                    </a>
                                </li>

                                <li class="nk-menu-heading">
                                    <h6 class="overline-title">Return to</h6>
                                </li>
                                <li class="nk-menu-item">
                                    <a href="{{ route('index') }}" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-dashlite"></em></span>
                                        <span class="nk-menu-text">Main Site</span>
                                    </a>
                                </li>
                            </ul><!-- .nk-menu -->
                        </div><!-- .nk-sidebar-menu -->

                        <div class="nk-sidebar-footer">
                            <ul class="nk-menu nk-menu-footer">
                                <li class="nk-menu-item">
                                    <a href="#" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-help-alt"></em></span>
                                        <span class="nk-menu-text">Support</span>
                                    </a>
                                </li>

                            </ul><!-- .nk-footer-menu -->
                        </div><!-- .nk-sidebar-footer -->
                    </div><!-- .nk-sidebar-content -->
                </div><!-- .nk-sidebar-body -->
            </div><!-- .nk-sidebar-element -->
        </div>
        <!-- sidebar @e -->
        <!-- wrap @s -->
        <div class="nk-wrap ">
            <!-- main header @s -->
            <div class="nk-header nk-header-fluid nk-header-fixed is-light">
                <div class="container-fluid">
                    <div class="nk-header-wrap">
                        <div class="nk-menu-trigger d-xl-none ms-n1">
                            <a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
                        </div>
                        <div class="nk-header-brand d-xl-none">
                            <a href="{{ route('index') }}" class="logo-link">
                               <h3 style="font-weight: bolder; color: white">{{ env('APP_NAME') }}</h3>
                            </a>
                        </div>

                        <div class="nk-header-tools">
                            <ul class="nk-quick-nav">

                                <li class="dropdown user-dropdown">
                                    <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
                                        <div class="user-toggle">
                                            <div class="user-avatar sm">
                                                <img src="{{ asset('files/'.auth()->user()->avatar ) }}" alt="">
                                            </div>
                                            <div class="user-info d-none d-md-block">
                                                <div class="user-status user-status-unverified">{!! auth()->user()->status() !!}</div>
                                                <div class="user-name dropdown-indicator">{{ auth()->user()->name }}</div>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-md dropdown-menu-end dropdown-menu-s1">
                                        <div class="dropdown-inner user-card-wrap bg-lighter d-none d-md-block">
                                            <div class="user-card">
                                                <div class="user-avatar">
                                                    <img src="{{ asset('files/'.auth()->user()->avatar ) }}" alt="">
                                                </div>
                                                <div class="user-info">
                                                    <span class="lead-text">{{ auth()->user()->name }}</span>
                                                    <span class="sub-text">{{ auth()->user()->email }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="dropdown-inner user-account-info">
                                            <h6 class="overline-title-alt">Account Balance</h6>
                                            <div class="user-balance">@money(auth()->user()->balance) <small class="currency currency-btc">{{ auth()->user()->currency }}</small></div>
                                            <a href="{{ route('user.withdraw') }}" class="link"><span>Withdraw Funds</span> <em class="icon ni ni-wallet-out"></em></a>
                                        </div>
                                        <div class="dropdown-inner">
                                            <ul class="link-list">
                                                <li><a href="{{ route('user.profile') }}"><em class="icon ni ni-user-alt"></em><span>View Profile</span></a></li>
                                                <li><a href="{{ route('user.setting') }}"><em class="icon ni ni-setting-alt"></em><span>Account Setting</span></a></li>
                                            </ul>
                                        </div>
                                        <div class="dropdown-inner">
                                            <ul class="link-list">

                                                <li>
                                                    <form method="POST" action="{{ route('logout') }}">
                                                        @csrf

                                                        <a href="#" :href="route('logout')"
                                                           onclick="event.preventDefault();
                                                this.closest('form').submit();"><em class="icon ni ni-signout"></em><span>Sign out</span></a>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- main header @e -->
            <!-- content @s -->
            @yield('content')
            <!-- content @e -->
            <div class="nk-footer">
                <div class="container-fluid">
                    <div class="nk-footer-wrap">
                        <div class="nk-footer-copyright"> &copy; {{ Date('Y') }} {{ env('APP_NAME') }}.
                        </div>

                    </div>
                </div>
            </div>
            <!-- footer @e -->
        </div>
        <!-- wrap @e -->
    </div>
    <!-- main @e -->
</div>
<!-- app-root @e -->

<!-- JavaScript -->
<script src="{{ asset('dash/assets/js/bundle.js?ver=3.2.0') }}"></script>
<script src="{{ asset('dash/assets/js/scripts.js?ver=3.2.0') }}"></script>
<script src="{{ asset('dash/assets/js/charts/chart-crypto.js?ver=3.2.0') }}"></script>

@livewireScripts
</body>

</html>
