
<form wire:submit="save" enctype="multipart/form-data">
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
                    <input type="number" required wire:model="amount"  class="form-control form-control-lg form-control-number" id="buysell-amount"  placeholder="1000">
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

                    <select wire:model.live="selectedWallet"  wire:model="payment_method_id" id="paymentMethodSelect" class="form-control form-control-lg form-control-number">
                        <option selected >choose wallet</option>
                        @foreach($wallets as $item)
                            <option value="{{ $item->value }}" data-value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>

                </div>

            </div><!-- .buysell-field -->



            @if($selectedWallet)
                <div class="buysell-field form-group" >


                    <div class="buysell-field form-group">

                        <h6 class="text-center mb-2">Scan to Copy Wallet</h6>

                        <div class="form-pm-group">
                            <div class="col-8 offset-4 mb-3">
                                {!! QrCode::size(100)->generate($selectedWallet); !!}
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

                <div class="nk-block mt-2">
                    <div class="buysell-field form-group">
                        <div class="form-label-group">
                            <label class="form-label" for="buysell-amount">Upload Payment Proof</label>
                        </div>
                        <div class="form-control-group">
                            <input type="file" wire:model="reference"  class="form-control " id="buysell-amount"  >
                        </div>

                    </div>

                </div>
                <div class="buysell-field form-action">
                    <button type="submit" class="btn btn-primary btn-lg" >Confirm </button>
{{--                    <a class="btn btn-lg btn-block btn-primary" data-bs-toggle="modal" href="#buy-coin" >Confirm Transaction</a>--}}
                </div><!-- .buysell-field -->
            @endif


        </div><!-- .buysell-block -->
    </div><!-- .buysell -->

</form>




