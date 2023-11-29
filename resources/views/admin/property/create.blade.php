@extends('admin.layout.app')
@section('content')

    <main id="main-container">

        <!-- Hero -->
        <div class="bg-body-light">
            <div class="content content-full">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                    <h1 class="flex-grow-1 fs-3 fw-semibold my-2 my-sm-3">Add Property</h1>
                </div>
            </div>
        </div>
        <!-- END Hero -->

        <!-- Page Content -->
        <div class="content">
            <!-- Elements -->
            <div class="block block-rounded">

                <div class="block-content">
                    <div class="block-header block-header-default">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-block-normal">Add Package</button>
                    </div>

                   <div class="table-">
                       <table class="table table-striped">
                           <thead class="tb-odr-head">
                           <tr class="tb-odr-item">
                               <th class="tb-odr-info">
                                   <span class="tb-odr-date d-none d-md-inline-block">Date</span>
                               </th>
                               <th class="tb-odr-item">
                                   <span class="tb-odr">Name</span>
                               </th>
                               <th class="tb-odr-item">
                                   <span class="tb-odr">Amount</span>
                               </th>
                               <th class="tb-odr-item">
                                   <span class="tb-odr">Location</span>
                               </th>
                               <th class="tb-odr-action">Action</th>
                           </tr>
                           </thead>
                           <tbody class="tb-odr-body">
                           @foreach($properties as $item)
                               <tr class="tb-odr-item">
                                   <td class="tb-odr">
                                       <span class="tb-odr-date">{{ date('d M, Y', strtotime($item->created_at)) }}</span>
                                   </td>
                                   <td class="tb-odr">
                                       {{ $item->name }}
                                   </td>
                                   <td class="tb-odr">
                                       @money($item->price)
                                   </td>
                                   <td class="tb-odr">
                                       {{ $item->building_location }}
                                   </td>
                                   <td class="tb-odr-action">
                                       <a href="{{ route('admin.property.show', $item->id) }}" class="btn btn-sm btn-primary">View</a>
                                       <div class="dropdown d-inline-block">
                                           <button type="button" class="btn btn-alt-secondary" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                               <i class="fa fa-fw fa-angle-down d-sm-none"></i>
                                               <span class="d-none d-sm-inline-block">

                                            </span>
                                               <i class="fa fa-fw fa-angle-down opacity-50 ms-1 d-none d-sm-inline-block"></i>
                                           </button>
                                           <div class="dropdown-menu dropdown-menu-end p-0" aria-labelledby="page-header-user-dropdown" style="position: absolute; inset: 0px 0px auto auto; margin: 0px; transform: translate(0px, 40px);" data-popper-placement="bottom-end">
                                               <div class="p-2">
                                                   <a class="dropdown-item" href="{{ route('admin.property.edit', $item->id) }}">
                                                       <i class="fa fa-fw fa-pencil-alt me-1"></i> Edit
                                                   </a>
                                                   <a class="dropdown-item" href="{{ route('admin.image', $item->id) }}">
                                                       <i class="fa fa-fw fa-upload me-1"></i> Upload Image
                                                   </a>
                                                   <a class="dropdown-item" href="{{ route('admin.property.show', $item->id) }}">
                                                       <i class="far fa-fw fa-eye me-1"></i> View
                                                   </a>

                                                   <div role="separator" class="dropdown-divider"></div>

                                                   <div role="separator" class="dropdown-divider"></div>

                                                   <form method="POST" action="{!! route('admin.property.destroy', $item->id) !!}" accept-charset="UTF-8">
                                                       <input name="_method" value="DELETE" type="hidden">
                                                       {{ csrf_field() }}

                                                       <div class="btn-group btn-group-xs pull-right" role="group">
                                                           <button data-toggle="tooltip" data-placement="top" type="submit" class="btn  btn-sm btn-danger" onclick="return confirm(&quot;Delete Property?&quot;)">
                                                               <i class="fa fa-fw fa-times me-1"></i> Delete
                                                           </button>
                                                       </div>
                                                   </form>
                                               </div>
                                           </div>
                                       </div>

                                   </td>
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
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="block block-rounded block-themed block-transparent mb-0">
                    <div class="block-header bg-primary-dark">
                        <h3 class="block-title">Add Property</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                                <i class="fa fa-fw fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content">
                        <form action="{{ route('admin.property.store') }}" method="POST">
                            @csrf


                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="form-label mt-2" for="full-name">Name</label>
                                        <div class="form-control-wrap">
                                            <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="full-name">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="form-label mt-2" for="full-name">Price</label>
                                        <div class="form-control-wrap">
                                            <input type="number" name="price" value="{{ old('price') }}" class="form-control" id="full-name">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label class="form-label mt-2" for="full-name">Rooms</label>
                                        <div class="form-control-wrap">
                                            <input type="number" class="form-control" name="rooms" value="{{ old('rooms') }}" id="full-name">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label class="form-label mt-2" for="full-name">Floor</label>
                                        <div class="form-control-wrap">
                                            <input type="number" class="form-control" name="floor" value="{{ old('floor') }}" id="full-name">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label class="form-label mt-2" for="full-name">Type</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control" name="type" value="{{ old('type') }}" id="full-name">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label class="form-label mt-2" for="full-name">Building Year</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control" name="building_year" id="full-name">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label class="form-label mt-2" for="full-name">Square Meter</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control" name="square_meter" id="full-name">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label class="form-label mt-2" for="full-name">Location</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control" name="building_location" id="full-name">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="form-label mt-2" for="full-name">Money Invested</label>
                                        <div class="form-control-wrap">
                                            <input type="number" class="form-control" name="invested" value="{{ old('invested') }}" id="full-name">
                                            <small class="text-danger">How much has been invested already</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="form-label mt-2" for="full-name">Reviews</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control" name="reviews" value="{{ old('reviews') }}" id="full-name">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label mt-2" for="full-name">Description</label>
                                <div class="form-control-wrap">
                                    <textarea class="form-control" name="description"  id="" cols="30" rows="5">{{ old('description') }}</textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label class="form-label mt-2" for="full-name">Min Price</label>
                                        <div class="form-control-wrap">
                                            <input type="number" class="form-control" name="min_price" value="{{ old('min_price') }}" id="full-name">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label class="form-label mt-2" for="full-name">Return Rate</label>
                                        <div class="form-control-wrap">
                                            <input type="number" class="form-control" name="return_rate" value="{{ old('return_rate') }}" id="full-name">
                                            <small class="text-danger">Number of percentage</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label class="form-label mt-2" for="full-name">Return For</label>
                                        <div class="form-control-wrap">
                                            <input type="number" class="form-control" name="return_for" value="{{ old('return_for') }}" id="full-name">
                                            <small class="text-danger">Number of months</small>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="form-label mt-2" for="cap">Capital Return</label>
                                        <div class="form-control-wrap">
                                            <select name="capital_back" id="cap" class="form-control">
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="form-label mt-2" for="full-name">Target Duration</label>
                                        <div class="form-control-wrap">
                                            <input type="number" class="form-control" name="target_duration" value="{{ old('target_duration') }}" id="full-name">
                                            <small class="text-danger">Number of months</small>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mt-3 mb-3">
                                <button type="submit" class="btn btn-lg btn-primary">Save Information</button>
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
