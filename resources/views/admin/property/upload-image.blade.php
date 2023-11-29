@extends('admin.layout.app')
@section('content')

    <main id="main-container">

        <!-- Hero -->
        <div class="bg-body-light">
            <div class="content content-full">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                    <h1 class="flex-grow-1 fs-3 fw-semibold my-2 my-sm-3">Add Investment Package</h1>
                </div>
            </div>
        </div>
        <!-- END Hero -->

        <!-- Page Content -->
        <div class="content">
            <!-- Elements -->
            <div class="block block-rounded">

                <div class="block-content">
                    <div class="container m-2">
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
                        @if(session()->has('updated'))
                            <div class="alert alert-success">
                                {{ session()->get('updated') }}
                            </div>
                        @endif
                        @if(session()->has('deleted'))
                            <div class="alert alert-danger">
                                {{ session()->get('deleted') }}
                            </div>
                        @endif
                    </div>

                    <table class="table table-striped" style="width:100%">
                        <tr>
                            <th>Name:</th>
                            <td>{{ $property->name }}</td>
                        </tr>
                        <tr>
                            <th>Price:</th>
                            <td>$@money($property->price)</td>
                        </tr>
                        <tr>
                            <th>Location:</th>
                            <td>{{ $property->building_location }}</td>
                        </tr>
                    </table>
                    <hr>
                    <form action="{{ route('admin.storeImage') }}" method="POST" enctype="multipart/form-data">
                        @csrf


                        <div class="mb-3">
                            <div class="row">
                                <input type="hidden" name="properties_id" value="{{ $property->id }}">

                                <div class="col-4">
                                    <div class="form-group">
                                        <label class="form-label mt-2" for="full-name">Image</label>
                                        <div class="form-control-wrap">
                                            <input type="file" class="form-control" name="image[]" id="full-name" multiple required="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="form-group">
                            <button type="submit" class="btn btn-lg btn-primary">Save Informations</button>
                        </div>
                    </form>

                    <br>
                    <hr>


                    <div class="row mb-5">
                        @if ($property->images->count() > 0)
                            @foreach ($property->images as $image)
                                <div class="col-3">
                                    <img height="150" width="150" src="{{ asset($image->image_path) }}" alt="Product Image">

                                    <form method="POST" class="mt-2" action="{!! route('admin.deleteImage', $image->id) !!}" accept-charset="UTF-8">
                                        <input name="_method" value="DELETE" type="hidden">
                                        {{ csrf_field() }}

                                        <div class="btn-group btn-group-xs pull-right" role="group">
                                            <button data-toggle="tooltip" data-placement="top" type="submit" class="btn btn-sm btn-danger" onclick="return confirm(&quot;Delete Item?&quot;)">
                                                <span class="fa flaticon-delete" aria-hidden="true"></span>Delete
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            @endforeach
                        @else
                            <p>No images available for this product.</p>
                        @endif
                    </div>




                </div>
            </div>
            <!-- END Elements -->
        </div>
        <!-- END Page Content -->
    </main>




@endsection
