<form  action="{{ route('user.cryptoDeposit') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="buysell wide-xs m-auto">


        <div class="buysell-title text-center">
            <h2 class="title mb-3">Crypto Deposit</h2>
        </div><!-- .buysell-title -->
        <hr>
        {{--                    <h5 class="mt-3 mb-3 text-center text-warning">Amount to Send @money($amount) {{ auth()->user()->currency }}</h5>--}}
        <div class="buysell-block" >
            @if ($errors->any())
                <div class="alert alert-danger mt-2">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            @if(session()->has('declined'))
                <div class="alert alert-danger">
                    {{ session()->get('declined') }}
                </div>
            @endif


                <div class="buysell-field form-group">
                    <div class="form-label-group">
                        <label class="form-label" for="buysell-amount">Amount to Deposit</label>
                    </div>
                    <div class="form-control-group">
                        <input type="number" required  class="form-control form-control-lg form-control-number" id="buysell-amount" name="amount" placeholder="1000">
                        <div class="form-dropdown">
                            <div class="text text-primary">
                                {{ auth()->user()->currency }}
                            </div>
                        </div>
                    </div>
                    <div class="form-note-group">
                        <span class="buysell-min form-note-alt">Minimum: 50 {{ auth()->user()->currency }}</span>
                    </div>
                </div><!-- .buysell-field -->

                <div class="buysell-field form-group">
                    <div class="form-label-group">
                        <label class="form-label" for="buysell-amount">Select Wallet</label>
                    </div>
                    <div class="form-control-group">

                        <select wire:model.live="selectedWallet"  name="payment_method_id" id="paymentMethodSelect" class="form-control form-control-lg form-control-number">
                            <option selected >choose wallet</option>
                            @foreach($wallets as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>

                    </div>

                </div><!-- .buysell-field -->


                @if($selectedWallet)
                    <div class="buysell-field form-group" >


                        <div class="buysell-field form-group">

                            <h5 class=" text-center mb-2">Scan to Copy Wallet</h5>

                            <div class="form-pm-group">
                                <div class="col-8 offset-4 mb-3">
                                    {!! QrCode::size(150)->generate($selectedWallet); !!}
                                </div>
                            </div>
                        </div>

                        <div class="nk-refwg-url">
                            <div class="form-control-wrap">
                                <div class="form-clip clipboard-init" data-clipboard-target="#refUrl" data-success="Copied" data-text="Copy Link"><em class="clipboard-icon icon ni ni-copy"></em> <span class="clipboard-text">Copy Address</span></div>
                                <div class="form-icon">
                                    <em class="icon ni ni-link-alt"></em>
                                </div>
                                <input type="text" class="form-control copy-text" id="refUrl" value="{{ $selectedWallet }}">
                            </div>
                        </div>


                    </div><!-- .buysell-field -->
                    <div class="buysell-field form-action">
                        <a class="btn btn-lg btn-block btn-primary" data-bs-toggle="modal" href="#buy-coin" >Confirm Transaction</a>
                    </div><!-- .buysell-field -->
                @endif


        </div><!-- .buysell-block -->
    </div><!-- .buysell -->


    <div class="modal fade" tabindex="-1" role="dialog" id="buy-coin">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-bs-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                <div class="modal-body modal-body-lg">

                    <div class="nk-block-head nk-block-head-xs text-center">
                        <h5 class="nk-block-title">Confirm Transaction</h5>

                    </div>
                    <div class="nk-block">
                        <div class="buysell-field form-group">
                            <div class="form-label-group">
                                <label class="form-label" for="buysell-amount">Upload Payment Proof</label>
                            </div>
                            <div class="form-control-group">
                                <input type="file" required class="form-control form-control-lg " id="buysell-amount" name="reference" >
                            </div>

                        </div>

                        <div class="buysell-field form-action text-center">
                            <div>
                                <button type="submit" class="btn btn-primary btn-lg" onclick="captureInputs()">Confirm the Order</button>
                            </div>
                            <div class="pt-3">
                                <a href="#" data-bs-dismiss="modal" class="link link-danger">Cancel Order</a>
                            </div>
                        </div>
                    </div><!-- .nk-block -->

                </div><!-- .modal-body -->
            </div><!-- .modal-content -->
        </div><!-- .modla-dialog -->
    </div><!-- .modal -->
</form>




