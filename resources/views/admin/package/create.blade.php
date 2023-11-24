@extends('admin.layout.app')
@section('content')

    <main id="main-container">

        <!-- Hero -->
        <div class="bg-body-light">
            <div class="content content-full">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                    <h1 class="flex-grow-1 fs-3 fw-semibold my-2 my-sm-3">Investment Packages</h1>

                </div>
            </div>
        </div>
        <!-- END Hero -->

        <!-- Page Content -->
        <div class="content">
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

            <!-- Striped Table -->
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-block-normal">Add Package</button>
                </div>
                <div class="block-content">
                    <table class="table table-striped table-vcenter">
                        <thead>
                        <tr>
                            <th class="text-center" style="width: 50px;">#</th>
                            <th>Name</th>
                            <th>Term Day(s)</th>
                            <th>Daily Interest(%)</th>
                            <th>Tag</th>
                            <th class="d-none d-sm-table-cell" style="width: 15%;">Min Deposit</th>
                            <th class="d-none d-sm-table-cell" style="width: 15%;">Max Deposit</th>
                            <th class="text-center" style="width: 100px;">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($packages as $index => $item)
                            <tr>
                                <th class="text-center" scope="row">{{ $index + 1 }}</th>
                                <td class="fw-semibold">
                                    {{ $item->name }}
                                </td>
                                <td class="fw-semibold">
                                    {{ $item->term_days }}
                                </td>
                                <td class="fw-semibold">
                                    {{ $item->daily_interest }}
                                </td>
                                <td class="fw-semibold">
                                    <span class="badge bg-primary">{{ $item->tag }}</span>
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    ${{ $item->min_deposit }}
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    ${{ $item->max_deposit }}
                                </td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a href="{{ route('admin.package.edit', $item->id) }}" class="btn btn-sm btn-alt-secondary js-bs-tooltip-enabled" data-bs-toggle="tooltip" title="" data-bs-original-title="Edit">
                                            <i class="fa fa-pencil-alt"></i>
                                        </a>

                                        <form method="POST" action="{!! route('admin.package.destroy', $item->id) !!}" accept-charset="UTF-8">
                                            <input name="_method" value="DELETE" type="hidden">
                                            {{ csrf_field() }}

                                            <div class="btn-group btn-group-xs pull-right" role="group">
                                                <button type="submit" class="btn btn-sm btn-alt-secondary js-bs-tooltip-enabled" data-bs-toggle="tooltip" title="" data-bs-original-title="Delete" onclick="return confirm(&quot;Delete Package?&quot;)">
                                                    <i class="fa fa-times"></i>
                                                </button>

                                            </div>

                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END Striped Table -->

        </div>
        <!-- END Page Content -->
    </main>


    <!-- Normal Block Modal -->
    <div class="modal" id="modal-block-normal" tabindex="-1" role="dialog" aria-labelledby="modal-block-normal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="block block-rounded block-themed block-transparent mb-0">
                    <div class="block-header bg-primary-dark">
                        <h3 class="block-title">Add Package</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                                <i class="fa fa-fw fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content">
                        <form action="{{ route('admin.package.store') }}" method="POST" enctype="multipart/form-data" >
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
                            <!-- Basic Elements -->
                            <div class="row push">
                                <div class="col-lg-8 offset-lg-2">

                                    <div class="row">
                                        <div class="mb-4 col-lg-12">
                                            <label class="form-label" for="example-text-input">Name</label>
                                            <input type="text" class="form-control" id="example-text-input" name="name" >
                                        </div>
                                        <div class="mb-4 col-lg-12">
                                            <label class="form-label" for="example-password-input">Term Days</label>
                                            <input type="number" class="form-control" id="example-password-input" name="term_days" >
                                        </div>
                                        <div class="mb-4 col-lg-12">
                                            <label class="form-label" for="example-password-input">Daily Interest</label>
                                            <input type="number" class="form-control" id="example-password-input" name="daily_interest" >
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="mb-4 col-lg-6">
                                            <label class="form-label" for="example-email-input">Min Deposit</label>
                                            <input type="number" class="form-control" id="example-email-input" name="min_deposit" >
                                        </div>
                                        <div class="mb-4 col-lg-6">
                                            <label class="form-label" for="example-password-input">Max Deposit</label>
                                            <input type="number" class="form-control" id="example-password-input" name="max_deposit" >
                                        </div>
                                    </div>
                                    <div class="mb-4 col-lg-12">
                                        <label class="form-label" for="example-password-input">Tag (Optional)</label>
                                        <input type="text" class="form-control" id="example-password-input" name="tag" >
                                    </div>

                                    <button type="submit" class="btn btn-secondary">Save</button>

                                </div>

                            </div>
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
