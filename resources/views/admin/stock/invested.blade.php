@extends('admin.layout.app')
@section('content')

    <main id="main-container">

        <!-- Hero -->
        <div class="bg-body-light">
            <div class="content content-full">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                    <h1 class="flex-grow-1 fs-3 fw-semibold my-2 my-sm-3">Invested Stocks</h1>
                </div>
            </div>
        </div>
        <!-- END Hero -->

        <!-- Page Content -->
        <div class="content">

            <!-- Striped Table -->
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    {{--                    <a href="" class="btn btn-secondary">Add Trader</a>--}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
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
                </div>
                <div class="block-content">

                    <div class="block block-rounded">
                        <div class="block-content block-content-full">
                            <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
                            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">

                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-striped table-vcenter js-dataTable-full dataTable no-footer" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
                                                <thead>
                                                <tr>
                                                    <th class="text-center sorting sorting_asc" style="width: 100px;" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="#: activate to sort column descending">#</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">User</th>
                                                    <th class="sorting"  tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending">Amount</th>
                                                    <th class="sorting"  tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Access: activate to sort column ascending">ROI</th>
                                                    <th class="sorting"  tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Access: activate to sort column ascending">Status</th>
                                                    <th class="sorting"  tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Access: activate to sort column ascending">Trade Details</th>
                                                    <th  class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Registered: activate to sort column ascending">Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($stocks as $index => $item)
                                                    <tr class="odd">
                                                        <td class="text-center sorting_1">{{ $index + 1 }}</td>
                                                        <td class="fw-semibold">
                                                            <a href="{{ route('admin.userDetails', $item->id) }}">{{ optional($item->user)->name }}</a>
                                                        </td>
                                                        <td class="fw-semibold">
                                                            $@money($item->amount)
                                                        </td>
                                                        <td class="fw-semibold">
                                                            $@money($item->roi)({{ $item->roi_pec }}%)
                                                        </td>
                                                        <td class="fw-semibold">
                                                            {!! $item->status() !!}
                                                        </td>
                                                        <td class="d-none d-sm-table-cell">
                                                            <span>{{ $item->stock->name }}</span>
                                                        </td>
                                                        <td>
                                                            <a href="" class="btn btn-sm btn-primary">Action</a>
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
            <!-- END Striped Table -->

        </div>
        <!-- END Page Content -->
    </main>

@endsection
