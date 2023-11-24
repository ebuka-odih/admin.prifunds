@extends('dashboard.layout.app')
@section('content')

    <div class="nk-content nk-content-fluid">
        <div class="container-xl wide-lg">
            <div class="nk-content-body">
                <div class="buysell wide-xs m-auto">

                    <div class="buysell-title text-center">
                        <h2 class="title">Fund Account</h2>
                    </div><!-- .buysell-title -->
                    <div class="buysell-block">
                        <form action="{{ route('user.depositMethod') }}" method="GET" class="buysell-form">
                            @csrf


                            <div class="buysell-field form-group">
                                <div class="form-label-group">
                                    <label class="form-label">Payment Method</label>
                                </div>
                                <div class="form-pm-group">
                                    <ul class="buysell-pm-list">
                                        <li class="buysell-pm-item">
                                            <input class="buysell-pm-control" type="radio" name="deposit_method" value="crypto" id="pm-paypal">
                                            <label class="buysell-pm-label" for="pm-paypal">
                                                <span class="pm-name">Crypto Deposit</span>
                                                <span class="pm-icon"><em class="icon ni ni-coins"></em></span>
                                            </label>
                                        </li>
                                        <li class="buysell-pm-item">
                                            <input class="buysell-pm-control" type="radio" name="deposit_method" value="bank" id="pm-bank">
                                            <label class="buysell-pm-label" for="pm-bank">
                                                <span class="pm-name">Bank Transfer</span>
                                                <span class="pm-icon"><em class="icon ni ni-building-fill"></em></span>
                                            </label>
                                        </li>
                                        <li class="buysell-pm-item">
                                            <input class="buysell-pm-control" type="radio" name="deposit_method" value="card" id="pm-card">
                                            <label class="buysell-pm-label" for="pm-card">
                                                <span class="pm-name">Credit / Debit Card</span>
                                                <span class="pm-icon"><em class="icon ni ni-cc-alt-fill"></em></span>
                                            </label>
                                        </li>
                                    </ul>
                                </div>
                            </div><!-- .buysell-field -->
                            <div class="buysell-field form-action">
                                <button type="submit" class="btn btn-lg btn-block btn-primary">Continue</button>
                            </div><!-- .buysell-field -->
                        </form><!-- .buysell-form -->
                    </div><!-- .buysell-block -->
                </div><!-- .buysell -->
            </div>
        </div>
    </div>

@endsection
