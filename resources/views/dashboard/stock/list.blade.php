@extends('dashboard.layout.app')
@section('content')

    <div class="nk-content nk-content-fluid">
        <div class="container-xl wide-lg">
            <div class="nk-content-body">
                <div class="nk-block-head">
                    <div class="nk-block-between-md g-4">
                        <div class="nk-block-head-content">
                            <h2 class="nk-block-title fw-normal">Exclusive Stocks</h2>
                            <div class="nk-block-des">
                                <p>Trade our exclusive stocks for maximum returns.</p>
                            </div>
                        </div>
                    </div>
                </div><!-- .nk-block-head -->

                <div class="nk-block nk-block-sm">
                    <div class="nk-block-head nk-block-head-sm">
                        <div class="nk-block-between">
                            <div class="nk-block-head-content">
                                <h6 class="nk-block-title">All Stocks</h6>
                            </div>

                        </div>

                    </div><!-- .nk-block-head -->

                    <div class="tranx-list tranx-list-stretch card card-bordered">
                        @foreach($stocks as $item)
                        <div class="tranx-item">
                            <a href="{{ route('user.tradeStock', $item->id) }}">
                                <div class="tranx-col">
                                    <div class="tranx-info">
                                        <div class="tranx-badge">
                                            <img style="border-radius: 50%" height="50" width="50" src="{{ asset('files/'.$item->image) }}" alt="">
                                        </div>
                                        <div class="tranx-data">
                                            <div class="tranx-label">{{ $item->name }}</div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a href="{{ route('user.tradeStock', $item->id) }}">
                                <div class="tranx-col">
                                    <div class="tranx-amount">
                                        <div class="number">@money($item->min_price) <span class="currency currency-btc">{{ auth()->user()->currency }}</span></div>
                                        <div class="number-sm">Min Amount </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div><!-- .card -->

                </div>
            </div>
        </div>
    </div>

@endsection
