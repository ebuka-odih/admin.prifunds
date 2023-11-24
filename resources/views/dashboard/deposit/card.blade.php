@extends('dashboard.layout.app')
@section('content')

    <div class="nk-content nk-content-fluid">
        <div class="container-xl wide-lg">
            <div class="nk-content-body">
                <div class="buysell wide-xs m-auto">

                    <div class="buysell-title text-center">
                        <h2 class="title">Add Fund</h2>
                    </div><!-- .buysell-title -->
                    <div class="buysell-block">
                        <form action="{{ route('user.generatePaymentUrl') }}" method="POST" class="buysell-form" target="_blank">
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

                            <input type="hidden" value="{{ auth()->id() }}" name="user_id">
                            <div class="buysell-field form-group">
                                <div class="form-label-group">
                                    <label class="form-label" for="buysell-amount">Amount</label>
                                </div>
                                <div class="form-control-group">
                                    <input type="text" min="100" required class="form-control form-control-lg form-control-number" id="buysell-amount" name="amount" placeholder="100.00">

                                </div>
                                <div class="form-note-group">
{{--                                    <span class="buysell-min form-note-alt">Minimum: 100.00 USD</span>--}}
                                </div>
                            </div><!-- .buysell-field -->

                            <div class="buysell-field form-action">
                                <button type="submit" class="btn btn-lg btn-block btn-primary">Continue to Card</button>
                            </div><!-- .buysell-field -->

                        </form><!-- .buysell-form -->
                    </div><!-- .buysell-block -->
                </div><!-- .buysell -->
            </div>
        </div>
    </div>

@endsection
