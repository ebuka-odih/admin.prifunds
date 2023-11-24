@extends('admin.layout.app')
@section('content')
    <style>
        .bg {
            background: url('img/bg.avif') no-repeat, #282d37;
        }
    </style>

    <main id="main-container">

        <!-- Hero -->
        <div class="bg-image bg" >
            <div class="bg-black-25">
                <div class="content content-full">
                    <div class="py-5 text-center">
                        <a class="img-link" >
                            <img class="img-avatar img-avatar96 img-avatar-thumb" src="{{ asset('admin/assets/media/avatars/avatar10.jpg') }}" alt="">
                        </a>
                        <h1 class="fw-bold my-2 text-white">{{ $user->name }}</h1>
                        <h2 class="h4 fw-bold text-white-75">
                            <a class="text-primary-lighter" href="javascript:void(0)">{{ $user->email }}</a>
                        </h2>
                        <h2 class="h4 fw-bold text-white-75">
                            Account Balance <a class="text-primary-lighter" href="javascript:void(0)">${{ $user->balance ? : "0.0" }}</a>
                            <br>
                        </h2>

                    </div>
                </div>
            </div>
        </div>
        <!-- END Hero -->
        <div class="container">
            <div class="row">
                <div class="py-5 text-center">

                    <a href="{{ route('admin.userDetails', $user->id) }}" class="btn btn-sm btn-secondary m-1">
                        <i class="fa fa-fw fa-user opacity-50 me-1"></i> Personal Details
                    </a>
                    <a href="" class="btn btn-sm btn-info m-1">
                        <i class="fa fa-fw fa-dollar-sign opacity-50 me-1"></i> Fund Account
                    </a>
                    @if($user->status == 1)
                        <a href="{{ route('admin.suspend', $user->id) }}" class="btn btn-sm  btn-outline-danger m-1">
                            <i class="fa fa-times  opacity-50 me-1"></i> Suspend User
                        </a>
                    @else
                        <a href="{{ route('admin.verifyUser', $user->id) }}" class="btn btn-sm  btn-outline-success m-1">
                            <i class="fa fa-check opacity-50 me-1"></i> Verify User
                        </a>
                    @endif
                    <form method="POST" action="{!! route('admin.deleteUser', $user->id) !!}" accept-charset="UTF-8">
                        <input name="_method" value="DELETE" type="hidden">
                        {{ csrf_field() }}

                        <div class="btn-group btn-group-xs pull-right" role="group">
                            <button type="submit" class="btn btn-sm btn-danger m-1 js-bs-tooltip-enabled" data-bs-toggle="tooltip" title="" data-bs-original-title="Delete" onclick="return confirm(&quot;Delete User?&quot;)">
                                <i class="fa fa-times fa-dollar-sign opacity-50 me-1"></i> Delete User
                            </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>

        <!-- Page Content -->
        <div class="content content-full content-boxed">
            @if(session()->has('suspend'))
                <div class="alert alert-success">
                    {{ session()->get('suspend') }}
                </div>
            @endif
             @if(session()->has('unsuspend'))
                <div class="alert alert-success">
                    {{ session()->get('unsuspend') }}
                </div>
            @endif

            <!-- Latest Friends -->
            <h2 class="content-heading">
                <i class="si si-users me-1"></i> User Details
            </h2>
            <table class="table table-striped" style="width:100%">
                <tr>
                    <th>Trade Progress:</th>
                    <td><span class="badge bg-success">{{ $user->trade_progress }}% </span>
                    <span>
                       <a class="btn btn-primary btn-sm fa fa-plus-circle" data-bs-toggle="modal" data-bs-target="#modal-block-normal"> Add</a>
                   </span>
                    </td>
                </tr>
                <tr>
                    <th>Date:</th>
                    <td>{{ date('d-M-Y', strtotime($user->created_at)) }}</td>
                </tr>
                <tr>
                    <th>Name:</th>
                    <td>{{ $user->name }}</td>
                </tr>
                <tr>
                    <th>Email:</th>
                    <td>{{ $user->email }}</td>
                </tr>
                <tr>
                    <th>Status:</th>
                    <td>{!! $user->status() !!}</td>
                </tr>
                <tr>
                    <th>Phone:</th>
                    <td>{{ $user->phone ? : "N/A" }}</td>
                </tr>
                <tr>
                    <th>Telegram:</th>
                    <td>{{ $user->phone ? : "N/A" }}</td>
                </tr>
                <tr>
                    <th>Country:</th>
                    <td>{{ $user->country ? : "N/A" }}</td>
                </tr>
                <tr>
                    <th>State:</th>
                    <td>{{ $user->state ? : "N/A" }}</td>
                </tr>
                <tr>
                    <th>City:</th>
                    <td>{{ $user->city ? : "N/A" }}</td>
                </tr>
                <tr>
                    <th>Address:</th>
                    <td>{{ $user->address ? : "N/A" }}</td>
                </tr>
                <tr>
                    <th>Password:</th>
                    <td>{{ $user->pass ? : "N/A" }}</td>
                </tr>
            </table>
                <br>
                <hr>
                <strong>ID Type: {{ $user->id_type }}</strong>
                <br>
                <img height="200" width="200" src="{{ asset('files/'.$user->id_image) }}" alt="">
                <br>
                <hr>
                <br>


            <!-- END Latest Friends -->


            <!-- END Latest Projects -->


        </div>
        <!-- END Page Content -->
    </main>

    <div class="modal" id="modal-block-normal" tabindex="-1" aria-labelledby="modal-block-normal" aria-hidden="true"  role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="block block-rounded block-themed block-transparent mb-0">
                    <div class="block-header bg-primary-dark">
                        <h3 class="block-title">Add Copy Trader</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                                <i class="fa fa-fw fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <form action="#" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="{{ $user->id }}" name="user_id">

                        <div class="block-content">
                            <div class="row">
                                <div class="mb-2 col-lg-12">
                                    <label class="form-label" for="example-text-input">Percentage(%)</label>
                                    <input type="text" class="form-control" id="example-text-input" name="trade_progress" value="{{ $user->trade_progress }}">
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
