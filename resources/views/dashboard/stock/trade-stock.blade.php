@extends('dashboard.layout.app')
@section('content')

    <div class="nk-content nk-content-fluid">
        <div class="container-xl wide-lg">
            <div class="nk-content-body">
                <div class="buysell wide-xs m-auto">

                    <div class="buysell-title text-center">
                        <h2 class="title">Trade Stock</h2>
                    </div><!-- .buysell-title -->
                    <div class="buysell-block">
                        <form action="{{ route('user.processTrade') }}" method="POST" class="buysell-form">
                            @csrf
                            @if(session()->has('success'))
                                <div class="alert alert-success">
                                    {{ session()->get('success') }}
                                </div>
                            @endif
                            @if(session()->has('error'))
                                <div class="alert alert-danger">
                                    {{ session()->get('error') }}
                                </div>
                            @endif
                            <input type="hidden" value="{{ $stock->id }}" name="stock_id">

                            <div class="buysell-field form-group">
                                <div class="form-label-group">
                                    <label class="form-label">Stock</label>
                                </div>
                                <input type="hidden" value="btc" name="bs-currency" id="buysell-choose-currency">
                                <div class="dropdown buysell-cc-dropdown">
                                    <a href="#" class="buysell-cc-choosen " >
                                        <div class="coin-item coin-btc">
                                            <div class="coin-icon">
                                                <img style="border-radius: 50%" height="50" width="50" src="{{ asset('files/'.$stock->image) }}" alt="">
                                            </div>
                                            <div class="coin-info">
                                                <span class="coin-name">{{ $stock->name }}</span>
                                            </div>
                                        </div>
                                    </a>

                                </div><!-- .dropdown -->
                            </div>

                            <div class="buysell-field form-group">
                                <div class="form-label-group">
                                    <label class="form-label" for="buysell-amount">Amount</label>
                                </div>

                                <div class="form-control-group">
                                    <input type="text" class="form-control form-control-lg form-control-number" id="buysell-amount" name="amount" placeholder="@money($stock->min_price)">
                                    <div class="form-dropdown">
                                        <div class="text">{{ $user->currency }}<span></span></div>
                                    </div>
                                </div>
                                <div class="form-note-group">
                                    <span class="buysell-min form-note-alt">Minimum: @money($stock->min_price) {{ $user->currency }}</span>
                                </div>
                            </div>



                            <div class="buysell-field form-action">
                                <button type="submit" class="btn btn-lg btn-block btn-primary">Trade</button>
                            </div><!-- .buysell-field -->
                        </form><!-- .buysell-form -->
                    </div><!-- .buysell-block -->
                </div><!-- .buysell -->
            </div>
        </div>
    </div>



@endsection
