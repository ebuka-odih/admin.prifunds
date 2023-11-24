@extends('dashboard.layout.app')
@section('content')

    <div class="nk-content nk-content-fluid">
        <div class="container-xl wide-lg">
            <div class="nk-content-body">
                <div class="buysell wide-xs m-auto">

                    <form action="{{ route('user.depositMethod') }}" method="GET" class="buysell-form">
                        @csrf


                        <div class="buysell-field form-group">
                            <div class="form-pm-group">

                                <div class="card card-bordered">
                                    <div class="card-inner">
                                        <h5 class="card-title text-center">Trade Confirmation</h5>
                                        <em style="font-size: 100px; margin: 40%" class="icon ni ni-check-circle text-success"></em>
                                        <p class="card-text text-white text-center"><span class="badge bg-primary">{{ $trade->stock->name }}</span> has been traded successfully</p>
                                        <a href="{{ route('user.stock.list') }}" class="card-link">Trade Again</a>

                                    </div>
                                </div>

                            </div>
                        </div><!-- .buysell-field -->
                    </form><!-- .buysell-form -->
                </div><!-- .buysell-block -->
            </div><!-- .buysell -->
        </div>
    </div>
    </div>

@endsection
