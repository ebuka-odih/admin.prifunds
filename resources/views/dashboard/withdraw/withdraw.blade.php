@extends('dashboard.layout.app')
@section('content')

    <div class="nk-content nk-content-fluid">
        <div class="container-xl wide-lg">
            <div class="nk-content-body">
                <div class="buysell wide-xs m-auto">

                    <div class="buysell-title text-center">
                        <h2 class="title">Withdraw Fund</h2>
                    </div><!-- .buysell-title -->
                    <div class="buysell-block">
                        <form action="{{ route('user.processWithdraw') }}" method="POST" class="buysell-form">
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
                            <div class="buysell-field form-group">
                                <div class="form-label-group">
                                    <label class="form-label" for="buysell-amount">Amount</label>
                                </div>

                                <div class="form-control-group">
                                    <input type="text" class="form-control form-control-lg form-control-number" id="buysell-amount" name="amount" placeholder="100.00">
                                    <div class="form-dropdown">
                                        <div class="text">{{ $user->currency }}<span></span></div>
                                    </div>
                                </div>
                                <div class="form-note-group">
                                    <span class="buysell-min form-note-alt">Minimum: 50.00 {{ $user->currency }}</span>
                                </div>
                            </div>
                            <div class="buysell-field form-group">
                                <div class="form-control-group">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label for="withdrawal_method">Select Withdrawal Method</label>
                                                    <select name="withdrawal_method" class="form-control form-control-lg" id="withdrawalMethod" required="" onchange="toggleBeneficiaryFields()">
                                                        <option value="">--Select Method--</option>
                                                        <option value="Bank Transfer">Bank Transfer</option>
                                                        <option value="Bitcoin">Bitcoin (Recommended)</option>
                                                        <option value="ethereum">Ethereum</option>
                                                        <option value="USDT">USDT</option>
                                                    </select>
                                                </div>

                                                <div id="beneficiaryField1" class="form-group" style="display: none">
                                                    <label for="bank">Bank Name</label>
                                                    <input class="form-control border-primary" type="text" name="bank" placeholder="Enter Bank Name">
                                                </div>

                                                <div id="beneficiaryField2" class="form-group" style="display: none">
                                                    <label for="acct_name">Account Name</label>
                                                    <input class="form-control border-primary" type="text" name="acct_name" placeholder="Enter Account Name">
                                                </div>

                                                <div id="beneficiaryField3" class="form-group" style="display: none">
                                                    <label for="acct_num">Account Number</label>
                                                    <input class="form-control border-primary" type="text" name="acct_num" placeholder="Enter Account Number">
                                                </div>
                                                <div id="beneficiaryField4" class="form-group" style="display: none">
                                                    <label for="swift_code">Swift Code</label>
                                                    <input class="form-control border-primary" type="text" name="swift_code" placeholder="Enter Swift Code">
                                                </div>

                                                <div id="beneficiaryField8" class="form-group" style="display: none">
                                                    <label for="usdt_wallet">USDT Wallet</label>
                                                    <input class="form-control border-primary" type="text" name="usdt_address" placeholder="Enter USDT Wallet Address">
                                                </div>

                                                <div id="beneficiaryField6" class="form-group" style="display: none">
                                                    <label for="btc_address">BTC Wallet</label>
                                                    <input class="form-control border-primary" type="text" name="btc_address" placeholder="Enter Bitcoin Wallet Address">
                                                </div>

                                                <div id="beneficiaryField7" class="form-group" style="display: none">
                                                    <label for="btc_address">ETH Wallet</label>
                                                    <input class="form-control border-primary" type="text" name="eth_address" placeholder="Enter Ethereum Wallet Address">
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="buysell-field form-action">
                                <button type="submit" class="btn btn-lg btn-block btn-primary">Withdraw</button>
                            </div><!-- .buysell-field -->
                        </form><!-- .buysell-form -->
                    </div><!-- .buysell-block -->
                </div><!-- .buysell -->
            </div>
        </div>
    </div>

    <script>
        function toggleBeneficiaryFields() {
            const pairType = document.getElementById('withdrawalMethod').value;
            const beneficiaryField1 = document.getElementById('beneficiaryField1');
            const beneficiaryField2 = document.getElementById('beneficiaryField2');
            const beneficiaryField3 = document.getElementById('beneficiaryField3');
            const beneficiaryField4 = document.getElementById('beneficiaryField4');
            const beneficiaryField5 = document.getElementById('beneficiaryField5');
            const beneficiaryField6 = document.getElementById('beneficiaryField6');
            const beneficiaryField7 = document.getElementById('beneficiaryField7');
            const beneficiaryField8 = document.getElementById('beneficiaryField8');

            if (pairType === 'Bank Transfer') {
                beneficiaryField1.style.display = 'block';
                beneficiaryField2.style.display = 'block';
                beneficiaryField3.style.display = 'block';
                beneficiaryField4.style.display = 'block';
                beneficiaryField5.style.display = 'none';
                beneficiaryField6.style.display = 'none';
                beneficiaryField7.style.display = 'none';
            } else if (pairType === 'USDT') {
                beneficiaryField8.style.display = 'block';
                beneficiaryField1.style.display = 'none';
                beneficiaryField2.style.display = 'none';
                beneficiaryField3.style.display = 'none';
                beneficiaryField4.style.display = 'none';
                beneficiaryField5.style.display = 'none';
                beneficiaryField7.style.display = 'none';
                beneficiaryField6.style.display = 'none';
            }else if (pairType === 'Bitcoin') {
                beneficiaryField6.style.display = 'block';
                beneficiaryField1.style.display = 'none';
                beneficiaryField2.style.display = 'none';
                beneficiaryField3.style.display = 'none';
                beneficiaryField4.style.display = 'none';
                beneficiaryField8.style.display = 'none';
                beneficiaryField7.style.display = 'none';
            }else if (pairType === 'ethereum') {
                beneficiaryField7.style.display = 'block';
                beneficiaryField1.style.display = 'none';
                beneficiaryField2.style.display = 'none';
                beneficiaryField3.style.display = 'none';
                beneficiaryField4.style.display = 'none';
                beneficiaryField8.style.display = 'none';
                beneficiaryField6.style.display = 'none';
            }
        }
    </script>

@endsection
