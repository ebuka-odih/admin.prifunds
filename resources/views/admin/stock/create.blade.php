@extends('admin.layout.app')
@section('content')

    <main id="main-container">

        <!-- Hero -->
        <div class="content">
            <div class="d-md-flex justify-content-md-between align-items-md-center py-3 pt-md-3 pb-md-0 text-center text-md-start">
                <div>
                    <h1 class="h3 mb-1">
                        Stocks
                    </h1>
                </div>

            </div>
        </div>
        <!-- END Hero -->

        <!-- Page Content -->
        <div class="content">
            <!-- Overview -->

            <!-- END Overview -->
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-block-normal">Add Stock</button>
                </div>
                <div class="block-content">
                    <table class="table table-hover table-vcenter">
                        <thead>
                        <tr>
                            <th class="text-center" >Icon</th>
                            <th>Name</th>
                            <th>Min Amount</th>
                            <th class="text-center" style="width: 100px;">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($stocks as $item)
                        <tr>
                            <th ><img style="border-radius: 50%" height="50" width="50" src="{{ asset('files/'.$item->image) }}" alt=""></th>
                            <td class="fw-semibold">
                                {{ $item->name }}
                            </td>
                            <td class="d-none d-sm-table-cell">
                                $@money($item->min_price)
                            </td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <a href="{{ route('admin.stock.edit', $item->id) }}" class="btn btn-sm btn-alt-secondary js-bs-tooltip-enabled" >
                                        <i class="fa fa-pencil-alt"></i>
                                    </a>
                                    <button type="button" class="btn btn-sm btn-alt-secondary js-bs-tooltip-enabled" data-bs-toggle="tooltip" title="" data-bs-original-title="Delete">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>



        </div>
        <!-- END Page Content -->
    </main>

    <!-- Normal Block Modal -->
    <div class="modal" id="modal-block-normal" tabindex="-1" role="dialog" aria-labelledby="modal-block-normal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="block block-rounded block-themed block-transparent mb-0">
                    <div class="block-header bg-primary-dark">
                        <h3 class="block-title">Add Stock</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                                <i class="fa fa-fw fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content">
                        <form action="{{ route('admin.stock.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="">Stock Name</label>
                                <input type="text" class="form-control" name="name">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Min Amount</label>
                                <input type="number" class="form-control" name="min_price">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Stock Icon</label>
                                <input type="file" class="form-control" name="image">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Description</label>
                                <textarea name="description" id="" cols="30" rows="10" class="form-control"></textarea>

                            </div>
                            <div class="form-group mb-3">
                               <button class="btn btn-primary" type="submit">Submit</button>
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
