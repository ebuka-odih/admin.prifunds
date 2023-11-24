@extends('dashboard.layout.app')
@section('content')

    <div class="nk-content nk-content-fluid">
        <div class="container-xl wide-lg">
            <div class="nk-content-body">

                <div class="nk-block">
                    <div class="card card-bordered card-preview">
                        <div class="card-inner">
                            <ul class="nav nav-tabs nav-tabs-s2 mt-n2" role="tablist">
                                <li class="nav-item" role="presentation">
                                    {{--                                    <Link class="nav-link active" href="{{ route('user.forexHistory') }}">Contact</Link>--}}
                                    <a class="nav-link"  href="{{ route('user.forexHistory') }}" >Forex Trades</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active"  href="{{ route('user.stockHistory') }}" >Stock Trades</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" href="#tabItem11" >Real Estate</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="card card-bordered card-stretch">
                        <div class="card-inner-group">
                            <div class="card-inner">
                                <div class="card-title-group">
                                    <div class="card-title">
                                        <h5 class="title">Stock Orders</h5>
                                    </div>

                                    <div class="card-search search-wrap" data-search="search">
                                        <div class="search-content">
                                            <a href="#" class="search-back btn btn-icon toggle-search" data-target="search"><em class="icon ni ni-arrow-left"></em></a>
                                            <input type="text" class="form-control form-control-sm border-transparent form-focus-none" placeholder="Quick search by order id">
                                            <button class="search-submit btn btn-icon"><em class="icon ni ni-search"></em></button>
                                        </div>
                                    </div><!-- card-search -->
                                </div><!-- .card-title-group -->
                            </div><!-- .card-inner -->
                            <div class="card-inner p-0">
                                <table class="table table-tranx">
                                    <thead>
                                    <tr>
                                        <th>Time</th>
                                        <th>Stock</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                        <th>ROI</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($stock as $item)
                                        <tr>
                                            <td>{{ $item->created_at }}</td>
                                            <td><span class="badge bg-primary">{{ $item->stock->name }}</span></td>
                                            <td>@money($item->amount) {{ auth()->user()->currency }}</td>
                                            <td>{!! $item->status() !!}</td>
                                            <td>{{ $item->profit ? : "$ 0.00" }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div><!-- .card-inner -->
                            <div class="card-inner">
                                <ul class="pagination justify-content-center justify-content-md-start">

                                </ul><!-- .pagination -->
                            </div><!-- .card-inner -->
                        </div><!-- .card-inner-group -->
                    </div><!-- .card -->
                </div><!-- .nk-block -->
            </div>
        </div>
    </div>

@endsection
