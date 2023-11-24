@extends('admin.layout.app')
@section('content')


    <main id="main-container">

        <!-- Hero -->
        <div class="content">
            <div class="d-md-flex justify-content-md-between align-items-md-center py-3 pt-md-3 pb-md-0 text-center text-md-start">
                <div>
                    <h1 class="h3 mb-1">
                        All Deposits
                    </h1>
                </div>
            </div>
        </div>
        <!-- END Hero -->

        <!-- Page Content -->
        <div class="content">
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <div class="block-content block-content-full">
                        <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
                        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">

                            <div class="row">
                                <div class="col-sm-12">

                                    <div class="block-content">
                                        <button type="button" class="btn btn-primary push" data-bs-toggle="modal" data-bs-target="#modal-block-normal">Add Deposit</button>
                                        <div class="col-12">
                                            <div class="alert alert-info">
                                                To add deposit to users <br>
                                                Note:
                                                <p>Select User, select wallet and add the amount to deposit</p>
                                            </div>
                                        </div>
                                        <br>
                                        <hr>
                                        @if(session()->has('success'))
                                            <div class="alert alert-success">
                                                {{ session()->get('success') }}
                                            </div>
                                        @endif

                                        <div class="table-responsive">
                                            <table class="table table-bordered table-striped table-vcenter">
                                                <thead>
                                                <tr>
                                                    <th class="text-center" style="width: 20%;">
                                                        <i class="far fa-user"></i>
                                                    </th>
                                                    <th>Date</th>
                                                    <th style="width: 30%;">Amount</th>
                                                    <th style="width: 15%;">Status</th>
                                                    <th class="text-center" style="width: 200px;">Actions</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($deposits as $item)

                                                    <tr>
                                                        <td class="text-center">
                                                            {{ optional($item->user)->name }}<br>
                                                        </td>
                                                        <td class="fw-semibold">
                                                            {{ date('d-M-y', strtotime($item->created_at)) }}
                                                        </td>
                                                        <td>$@money($item->amount)</td>
                                                        <td>
                                                            {!! $item->adminStatus() !!}
                                                        </td>

                                                        <td >
                                                            @if($item->status == 0)
                                                                <a href="{{ route('admin.viewDeposit', $item->id) }}" class="btn btn-sm btn-alt-secondary js-bs-tooltip-enabled" data-bs-toggle="tooltip" title="View Deposit" data-bs-original-title="View">
                                                                    <i class="fa fa-eye"></i>
                                                                </a>
                                                                <a href="{{ route('admin.approveDeposit', $item->id) }}" class="btn btn-sm btn-alt-secondary js-bs-tooltip-enabled" data-bs-toggle="tooltip" title="Approve Deposit" data-bs-original-title="Approve">
                                                                    <i class="fa fa-check"></i>
                                                                </a>
                                                                {{--                                                    <a href="{{ route('admin.approve_deposit', $item->id) }}" class="btn btn-sm btn-success mb-1">Approve</a>--}}
                                                            @else
                                                            @endif
                                                            <form method="POST" action="{!! route('admin.deleteDeposit', $item->id) !!}" accept-charset="UTF-8">
                                                                <input name="_method" value="DELETE" type="hidden">
                                                                {{ csrf_field() }}

                                                                <div class="btn-group btn-group-xs pull-right" role="group">
                                                                    <button data-toggle="tooltip" data-placement="top" type="submit" class="btn  btn-sm btn-danger" onclick="return confirm(&quot;Delete Deposit?&quot;)">
                                                                        <span class="fa flaticon-delete" aria-hidden="true"></span>Delete
                                                                    </button>


                                                                </div>

                                                            </form>
                                                            <button type="button" class="btn btn-sm btn-primary push mt-2" data-bs-toggle="modal" data-bs-target="#modal-block-popin">Edit Date</button>

                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>


                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Page Content -->
    </main>


    <div class="modal fade" id="modal-block-popin" tabindex="-1" aria-labelledby="modal-block-popin"  aria-modal="true" role="dialog">
        <div class="modal-dialog modal-dialog-popin" role="document">
            <div class="modal-content">
                <div class="block block-rounded block-themed block-transparent mb-0">
                    <div class="block-header bg-primary-dark">
                        <h3 class="block-title">Modal Title</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                                <i class="fa fa-fw fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content">
                        <form action="">
                            <div class="row">
                                <input type="date" class="form-control" name="created_at" >
                                <button type="submit" class="btn btn-primary col-lg-6 mt-2">Update Date</button>
                            </div>
                        </form>
                        <br>
                    </div>
                    <div class="block-content block-content-full text-end bg-body">
                        <button type="button" class="btn btn-sm btn-alt-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Done</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="modal-block-normal" tabindex="-1" aria-labelledby="modal-block-normal" aria-hidden="true"  role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="block block-rounded block-themed block-transparent mb-0">
                    <div class="block-header bg-primary-dark">
                        <h3 class="block-title">Add Deposit</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                                <i class="fa fa-fw fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <form action="{{ route('admin.adminDeposit') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="block-content">

                            <div class="row">

                                <div class="mb-2 col-lg-12">
                                    <label class="form-label" for="example-text-input">User</label>
                                    <select name="user_id" id="" class="form-control" required="">
                                        <option >Select User...</option>
                                        @foreach($users as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-2 col-lg-12">
                                    <label class="form-label" for="example-text-input">Crypto Wallet</label>
                                    <select class="form-control text-primary" name="payment_method_id" id="cmethod" required="">
                                        <option >Select Wallet...</option>
                                        @foreach($wallets as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-2 col-lg-12">
                                    <label class="form-label" for="example-text-input">Amount</label>
                                    <input type="text" class="form-control" id="example-text-input" name="amount" >
                                </div>
                            </div>

                        </div>

                        <div class="block-content block-content-full text-end bg-body">
                            <button type="button" class="btn btn-sm btn-alt-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Submit</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
