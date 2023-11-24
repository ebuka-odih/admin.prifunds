@extends('dashboard.layout.app') @section('content') <div class="nk-content nk-content-fluid">
    <div class="container-xl wide-lg">
        <div class="nk-content-body">

            <!-- .nk-block-head -->
            <div class="nk-block">
                <div class="card card-bordered card-preview">
                    <div class="card-inner">
                        <ul class="nav nav-tabs nav-tabs-s2 mt-n2" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active"  href="{{ route('user.depositHistory') }}" >Deposit History</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link"  href="{{ route('user.withdrawHistory') }}" >Withdrawal History</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="card card-bordered card-stretch">
                    <div class="card-inner-group">
                        <div class="card-inner">
                            <div class="card-title-group">
                                <div class="card-title">
                                    <h5 class="title">All Deposits</h5>
                                </div>

                                <!-- card-tools -->
                            </div>
                            <!-- .card-title-group -->
                        </div>
                        <!-- .card-inner -->
                        <div class="card-inner p-0">
                            <table class="table table-tranx">
                                <thead>
                                <tr class="tb-tnx-head">
                                    <th class="tb-tnx-id">
                                        <span class="">#</span>
                                    </th>
                                    <th class="tb-tnx-info">
                                     <span class="tb-tnx-date d-md-inline-block d-none">
                                            <span class="d-md-none">Date</span>
                                            <span class="d-none d-md-block">
                                              <span>Date</span>
                                            </span>
                                      </span>
                                    </th>
                                    <th class="tb-tnx-amount is-alt">
                                        <span class="tb-tnx-total">Total</span>
                                        <span class="tb-tnx-status d-none d-md-inline-block">Status</span>
                                    </th>
                                    <th class="tb-tnx-action">
                                        <span>&nbsp;</span>
                                    </th>
                                </tr>
                                <!-- tb-tnx-item -->
                                </thead>
                                <tbody>
                                @foreach($deposits as $item)
                                <tr class="tb-tnx-item">
                                    <td class="tb-tnx-id">
                                         <span class="text-primary">{{ $item->transID() }}</span>
                                    </td>
                                    <td class="tb-tnx-info">
                                        <div class="tb-tnx-date">
                                            <span class="date">{{ date('d-m-Y', strtotime($item->created_at)) }}</span>
                                        </div>
                                    </td>
                                    <td class="tb-tnx-amount is-alt">
                                        <div class="tb-tnx-total">
                                            <span class="amount">@money($item->amount)</span>
                                        </div>
                                        <div class="tb-tnx-status">
                                            {!! $item->status() !!}
                                        </div>
                                    </td>
                                    <td class="tb-tnx-action">
                                        <div class="dropdown">
                                            <a class="text-soft dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown">
                                                <em class="icon ni ni-more-h"></em>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-xs">
                                                <ul class="link-list-plain">
                                                    <li>
{{--                                                        <a href="#">View</a>--}}
                                                    </li>

                                                </ul>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                                <!-- tb-tnx-item -->

                                </tbody>
                            </table>
                        </div>
                        <!-- .card-inner -->
                        <div class="card-inner">
                            <ul class="pagination justify-content-center justify-content-md-start">
                                <li class="page-item">

                                </li>
                            </ul>
                            <!-- .pagination -->
                        </div>
                        <!-- .card-inner -->
                    </div>
                    <!-- .card-inner-group -->
                </div>
                <!-- .card -->
            </div>
            <!-- .nk-block -->
        </div>
    </div>
</div>

@endsection
