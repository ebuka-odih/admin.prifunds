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
                    <a href="" class="btn btn-primary m-3">Add Property</a>

                    <table class="table table-orders">
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
                                            <span class="tb-odr-total">
                                                <span class="amount">{{ $item->name }}</span>
                                            </span>
                                </td>
                                <td class="tb-odr">
                                            <span class="tb-odr-total">
                                                <span class="amount">@money($item->price)</span>
                                            </span>
                                </td>
                                <td class="tb-odr">
                                            <span class="tb-odr-total">
                                                <span class="amount">{{ $item->building_location }}</span>
                                            </span>
                                </td>
                                <td class="tb-odr-action">
                                    <div class="tb-odr-btns d-none d-md-inline">
                                        <a href="{{ route('admin.property.show', $item->id) }}" class="btn btn-sm btn-primary">View</a>
                                    </div>
                                    <div class="dropdown">
                                        <a class="text-soft dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown" data-offset="-8,0" aria-expanded="false"><em class="icon ni ni-more-h"></em></a>
                                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-xs" style="">
                                            <ul class="link-list-plain">
                                                <li><a href="{{ route('admin.property.edit', $item->id) }}" class="text-primary">Edit</a></li>
                                                <li><a href="{{ route('admin.image', $item->id) }}" class="text-primary">Upload Image</a></li>
                                                <li><a href="{{ route('admin.property.show', $item->id) }}" class="text-primary">View</a></li>
                                                <li class="m-2">
                                                    <form method="POST" action="{!! route('admin.property.destroy', $item->id) !!}" accept-charset="UTF-8">
                                                        <input name="_method" value="DELETE" type="hidden">
                                                        {{ csrf_field() }}

                                                        <div class="btn-group btn-group-xs pull-right" role="group">
                                                            <button data-toggle="tooltip" data-placement="top" type="submit" class="btn  btn-sm btn-danger" onclick="return confirm(&quot;Delete Property?&quot;)">
                                                                <span class="fa flaticon-delete" aria-hidden="true"></span>Remove
                                                            </button>
                                                        </div>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
            <!-- END Elements -->
        </div>
        <!-- END Page Content -->
    </main>



@endsection
