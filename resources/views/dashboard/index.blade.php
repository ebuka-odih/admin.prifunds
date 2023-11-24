@extends('dashboard.layout.app')
@section('content')

    <div class="nk-content nk-content-fluid">
        <div class="container-xl wide-lg">
            <div class="nk-content-body">
                <div class="nk-block-head">
                    <div class="nk-block-head-sub"><span>Welcome!</span>
                    </div>
                    <div class="nk-block-between-md g-4">
                        <div class="nk-block-head-content">
                            <h2 class="nk-block-title fw-normal">{{ $user->name }}</h2>
                            <div class="nk-block-des">
                                <p>At a glance summary of your account.</p>
                            </div>
                        </div><!-- .nk-block-head-content -->
                        <div class="nk-block-head-content">
                            <ul class="nk-block-tools gx-3">
                                <li><a href="{{ route('user.deposit') }}" class="btn btn-primary"><span>Deposit</span> <em class="icon ni ni-arrow-long-right"></em></a></li>
                                <li><a href="{{ route('user.trade') }}" class="btn btn-white btn-light"><span>Trade Forex</span> <em class="icon ni ni-arrow-long-right d-none d-sm-inline-block"></em></a></li>

                            </ul>
                        </div><!-- .nk-block-head-content -->
                    </div><!-- .nk-block-between -->
                </div><!-- .nk-block-head -->
                <div class="nk-block">
                    <div class="row gy-gs">
                        <div class="col-lg-5 col-xl-4">
                            <div class="nk-block">
                                <div class="nk-block-head-xs">
                                    <div class="nk-block-head-content">
                                        <h5 class="nk-block-title title">Overview</h5>
                                    </div>
                                </div><!-- .nk-block-head -->
                                <div class="nk-block">
                                    <div class="card card-bordered text-light is-dark h-100">
                                        <div class="card-inner">
                                            <div class="nk-wg7">
                                                <div class="nk-wg7-stats">
                                                    <div class="nk-wg7-title">Available balance in {{ $user->currency }}</div>
                                                    <div class="number-lg amount">@money($user->balance)</div>
                                                </div>
                                                <div class="nk-wg7-stats-group">
                                                    <div class="nk-wg7-stats w-50">
                                                        <div class="nk-wg7-title">Profit</div>
                                                        <div class="number">@money($user->profit) <span class="text-success">{{ $user->currency }}</span></div>
                                                    </div>
                                                </div>

                                            </div><!-- .nk-wg7 -->
                                        </div><!-- .card-inner -->
                                    </div><!-- .card -->
                                </div><!-- .nk-block -->
                            </div><!-- .nk-block -->
                        </div><!-- .col -->
                        <div class="col-lg-7 col-xl-8">
                            <div class="nk-block">
                                <div class="nk-block-head-xs">
                                    <div class="nk-block-between-md g-2">
                                        <div class="nk-block-head-content">
                                            <h5 class="nk-block-title title">Account Summary</h5>
                                        </div>
                                        <div class="nk-block-head-content">
{{--                                            <a href="html/crypto/wallets.html" class="link link-primary">See All</a>--}}
                                        </div>
                                    </div>
                                </div><!-- .nk-block-head -->
                                <div class="row g-2">
                                    <div class="col-sm-4">
                                        <div class="card bg-light">
                                            <div class="nk-wgw sm">
                                                <a class="nk-wgw-inner" >
                                                    <div class="nk-wgw-name">
                                                        <div class="nk-wgw-icon">
                                                            <em class="icon ni ni-money"></em>
                                                        </div>
                                                        <h5 class="nk-wgw-title title">Total Invested</h5>
                                                    </div>
                                                    <div class="nk-wgw-balance">
                                                        <div class="amount">@money($asset)<span class="currency currency-nio">{{ $user->currency }}</span></div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div><!-- .col -->
                                    <div class="col-sm-4">
                                        <div class="card bg-light">
                                            <div class="nk-wgw sm">
                                                <a class="nk-wgw-inner" >
                                                    <div class="nk-wgw-name">
                                                        <div class="nk-wgw-icon">
                                                            <em class="icon ni ni-money"></em>
                                                        </div>
                                                        <h5 class="nk-wgw-title title">Total Deposit</h5>
                                                    </div>
                                                    <div class="nk-wgw-balance">
                                                        <div class="amount">@money($deposit)<span class="currency currency-btc">{{ $user->currency }}</span></div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div><!-- .col -->
                                    <div class="col-sm-4">
                                        <div class="card bg-light">
                                            <div class="nk-wgw sm">
                                                <a class="nk-wgw-inner" >
                                                    <div class="nk-wgw-name">
                                                        <div class="nk-wgw-icon">
                                                            <em class="icon ni ni-money"></em>
                                                        </div>
                                                        <h5 class="nk-wgw-title title">Total Withdrawal</h5>
                                                    </div>
                                                    <div class="nk-wgw-balance">
                                                        <div class="amount">@money($withdrawal)<span class="currency currency-btc">{{ $user->currency }}</span></div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div><!-- .col -->

                                </div><!-- .row -->
                            </div><!-- .nk-block -->

                        </div><!-- .col -->
                    </div><!-- .row -->
                </div><!-- .nk-block -->
                <div class="nk-block nk-block-lg">
                    <div class="row gy-gs">
                       <div class="col-12">
                           <!-- TradingView Widget BEGIN -->
                           <div class="tradingview-widget-container">
                               <div id="tradingview_f221c"></div>
                               <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/" rel="noopener nofollow" target="_blank"><span class="blue-text">Track all markets on TradingView</span></a></div>
                               <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
                               <script type="text/javascript">
                                   new TradingView.widget(
                                       {
                                           "width": "100%",
                                           "height": "500",
                                           "symbol": "FX:EURUSD",
                                           "interval": "D",
                                           "timezone": "Etc/UTC",
                                           "theme": "dark",
                                           "style": "1",
                                           "locale": "en",
                                           "enable_publishing": false,
                                           "allow_symbol_change": true,
                                           "container_id": "tradingview_f221c"
                                       }
                                   );
                               </script>
                           </div>
                           <!-- TradingView Widget END -->
                       </div>
                    </div><!-- .row -->
                </div><!-- .nk-block -->
                <div class="nk-block">
                    <div class="card card-bordered">
                        <div class="nk-refwg">
                            <div class="nk-refwg-invite card-inner col-12">
                                <div class="nk-refwg-head g-3">
                                    <div class="nk-refwg-title">
                                        <h5 class="title">Refer Us & Earn</h5>
                                        <div class="title-sub">Use the bellow link to invite your friends.</div>
                                    </div>
                                </div>
                                <div class="nk-refwg-url">
                                    <div class="form-control-wrap">
                                        <div class="form-clip clipboard-init" data-clipboard-target="#refUrl" data-success="Copied" data-text="Copy Link"><em class="clipboard-icon icon ni ni-copy"></em> <span class="clipboard-text">Copy Link</span></div>
                                        <div class="form-icon">
                                            <em class="icon ni ni-link-alt"></em>
                                        </div>
                                        <input type="text" class="form-control copy-text" id="refUrl" value="{{ auth()->user()->referral_link }}">
                                    </div>
                                </div>
                            </div><!-- .nk-refwg-invite -->

                        </div><!-- .nk-refwg -->
                    </div><!-- .card -->
                </div><!-- .nk-block -->

            </div>
        </div>
    </div>

@endsection
