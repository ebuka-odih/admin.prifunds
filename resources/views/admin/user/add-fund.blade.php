@extends('admin.layout.app')
@section('content')


    <main id="main-container">

        <!-- Hero -->
        <div class="content">
            <div class="d-md-flex justify-content-md-between align-items-md-center py-3 pt-md-3 pb-md-0 text-center text-md-start">
                <div>
                    <h1 class="h3 mb-1">
                        Fund Account
                    </h1>
                </div>
            </div>
        </div>
        <!-- END Hero -->

        <!-- Page Content -->
        <div class="content">


            <!-- Elements -->
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-block-normal">Add Fund</button>
                </div>
                <div class="block-content">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Date</th>
                                <th>User</th>
                                <th>Fund Type</th>
                                <th>Amount</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($funds as $item)
                                <tr>
                                    <td>{{ date('d M, Y', strtotime($item->created_at)) }}</td>
                                    <td>{{ $item->user->name }}</td>
                                    <td>{{ $item->fund_type() }}</td>
                                    <td>$@money($item->amount)</td>
                                    <td>{!! $item->status() !!}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- END Elements -->
        </div>

        <!-- END Page Content -->
    </main>


    <!-- Normal Block Modal -->
    <div class="modal" id="modal-block-normal" tabindex="-1" role="dialog" aria-labelledby="modal-block-normal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="block block-rounded block-themed block-transparent mb-0">
                    <div class="block-header bg-primary-dark">
                        <h3 class="block-title">Add Fund</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                                <i class="fa fa-fw fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content">
                        <form action="{{ route('admin.sendFund') }}" method="POST" >
                            <!-- Basic Elements -->
                            @csrf
                            @if(session()->has('success'))
                                <div class="alert alert-success">
                                    {{ session()->get('success') }}
                                </div>
                            @endif
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="row push">
                                <div class="col-lg-12 col-xl-12">
                                    <div class="mb-4">
                                        <label class="form-label" for="example-text-input">User</label>
                                        <select name="user_id" id="" class="form-control" required="">
                                            @foreach($users as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-xl-6">
                                    <div class="mb-4">
                                        <label class="form-label"  for="example-email-input">Type of Fund</label>
                                        <select name="type" id="" class="form-control ">
                                            <option disabled selected>Select </option>
                                            <option value="Balance">Main Balance</option>
                                            <option value="Bonus">Bonus</option>
                                            <option value="Profit">Profit</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-xl-6">
                                    <div class="mb-4">
                                        <label class="form-label" for="example-email-input">Amount</label>
                                        <input type="number" class="form-control" id="example-email-input" name="amount" >
                                    </div>
                                </div>


                                <div class="col-lg-6">
                                    <button type="submit" class="btn btn-secondary">Send</button>
                                </div>
                            </div>

                            <!-- END Basic Elements -->


                        </form>
                    </div>
                    <div class="block-content block-content-full text-end bg-body">
                        <button type="button" class="btn btn-sm btn-alt-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Normal Block Modal -->

@endsection
