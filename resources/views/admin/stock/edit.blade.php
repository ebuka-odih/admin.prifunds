@extends('admin.layout.app')
@section('content')

    <main id="main-container">

        <!-- Hero -->
        <div class="content">
            <div class="d-md-flex justify-content-md-between align-items-md-center py-3 pt-md-3 pb-md-0 text-center text-md-start">
                <div>
                    <h1 class="h3 mb-1">
                        Edit Stock
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

                <div class="block-content">
                    <form action="{{ route('admin.stock.update', $stock) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="form-group mb-3">
                            <label for="">Stock Name</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name', optional($stock)->name) }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Min Amount</label>
                            <input type="number" class="form-control" name="min_price" value="{{ old('name', optional($stock)->min_price) }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Stock Icon</label>
                            <input type="file" class="form-control" name="image">
                            <img class="mt-2" height="60" width="60" src="{{ asset('files/'.$stock->image) }}" alt="">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Description</label>
                            <textarea name="description" id="" cols="30" rows="10" class="form-control">{{ old('name', optional($stock)->description) }}</textarea>

                        </div>
                        <div class="form-group mb-3">
                            <button class="btn btn-primary" type="submit">Update Stock</button>
                        </div>
                    </form>
                </div>
            </div>



        </div>
        <!-- END Page Content -->
    </main>



@endsection
