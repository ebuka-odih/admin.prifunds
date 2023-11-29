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
                <a href="{{ route('admin.property.create') }}" class="btn btn-primary m-4">Back</a>
                <div class="block-content">

                        <div class="product-info mt-5 me-xxl-5">
                            <h4 class="product-price text-primary">$@money($property->price) </h4>
                            <h2 class="product-title">{{ $property->name }}</h2>

                            <div class="product-excrept text-soft">
                                <p class="lead">{{ $property->description }}</p>
                            </div>
                            <div class="product-meta">
                                <table class="table table-striped" style="width:100%">
                                    <tr>
                                        <th>Room:</th>
                                        <td>{{ $property->rooms }}</td>
                                    </tr>
                                    <tr>
                                        <th>Floor:</th>
                                        <td>{{ $property->floor }}</td>
                                    </tr>
                                    <tr>
                                        <th>Building Year:</th>
                                        <td>{{ $property->building_year }}</td>
                                    </tr>
                                    <tr>
                                        <th>Square Meter:</th>
                                        <td>{{ $property->square_meter }} Sqr</td>
                                    </tr>
                                    <tr>
                                        <th>Location:</th>
                                        <td>{{ $property->building_location }}</td>
                                    </tr>
                                </table>
                            </div>

                            <div class="product-meta">
                                <h6 class="title">Investment Detail</h6>
                                <table class="table table-striped" style="width:100%">
                                    <tr>
                                        <th>Min Amount:</th>
                                        <td>{{ $property->min_price }}</td>
                                    </tr>

                                    <tr>
                                        <th>Return Rate:</th>
                                        <td>{{ $property->return_rate }}%</td>
                                    </tr>
                                    <tr>
                                        <th>Return for:</th>
                                        <td>{{ $property->return_for }} Months</td>
                                    </tr>
                                    <tr>
                                        <th>Capital Back:</th>
                                        <td>{{ $property->capital_back }}</td>
                                    </tr>
                                    <tr>
                                        <th>Target Duration:</th>
                                        <td>{{ $property->target_duration }}</td>
                                    </tr>
                                </table>
                            </div><!-- .product-meta -->

                        </div><!-- .product-info -->

                </div>
            </div>
            <!-- END Striped Table -->

        </div>
        <!-- END Page Content -->
    </main>




@endsection
