@extends('layouts.master-layout')
@section('title')
    Profile
@endsection

@section('current-page')
    Profile
@endsection

@section('breadcrumb-current-page')
    Profile
@endsection

@section('main-content')
    <div class="row">
        <div class="col-lg-12">
            <div class="profile card card-body px-3 pt-3 pb-0">
                <div class="profile-head">
                    <div class="photo-content">
                        <div class="cover-photo"></div>
                    </div>
                    <div class="profile-info">
                        <div class="profile-photo">
                            <img src="{{$assets["user"]["profile_image"]}}" class="img-fluid rounded-circle" alt="">
                        </div>
                        <div class="profile-details">
                            <div class="profile-name px-3 pt-2">
                                <h4 class="text-primary mb-0">{{$user->full_name ?? ''}}</h4>
                                @if($user->user_type == 0)
                                    <label for="" class="label label-info">Passenger</label>
                                    @else
                                    <label for="" class="label label-info">Driver</label>
                                @endif
                            </div>
                            <div class="profile-email px-2 pt-2">
                                <h4 class="text-muted mb-0">{{$user->email ?? ''}}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-4">
            <div class="card">
                <div class="card-body">
                    <div class="profile-statistics mb-5">
                        <div class="text-center">
                            <div class="row">
                                <div class="col">
                                    <h3 class="m-b-0">{{number_format($user->getDriverRides->count())}}</h3>
                                    <span>Rides</span>
                                </div>
                                <div class="col">
                                    <h3 class="m-b-0">0</h3>
                                    <span>Passengers</span>
                                </div>
                                <div class="col">
                                    <h3 class="m-b-0">{{number_format($user->getDriverReviews->count())}}</h3>
                                    <span>Reviews</span>
                                </div>
                            </div>
                        </div>

                    </div>
                    @if($user->user_type == 1)
                        <div class="profile-news">
                            <h5 class="text-primary d-inline">Vehicles</h5>
                            @foreach($user->getDriverVehicles as $vehicle)
                                <div class="media pt-3 pb-3">
                                    <img
                                        src="{{$assets["user"]["profile_image"]}}"
                                        alt="image"
                                        class="mr-3 rounded"
                                        width="75"
                                    >
                                    <div class="media-body">
                                        <h5 class="m-b-5">
                                            <a href="#" class="text-black">{{$vehicle->brand ?? ''}} {{$vehicle->model ?? ''}}</a>
                                        </h5>
                                        <p class="mb-0">{{$vehicle->plate_number ?? ''}}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif

                </div>
            </div>
        </div>
        <div class="col-xl-8">
            <div class="card">
                <div class="card-body">
                    <div class="btn-group float-right" role="group">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Account Operations</button>
                        <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 56px, 0px);">
                            @if($user->confirmed == 0 && $user->declined == 0)
                                <a class="dropdown-item text-danger modal-action" data-toggle="modal" data-target="#profileActionModal" data-action="decline" href="javascript:void()">Decline</a>
                                <a class="dropdown-item text-primary modal-action" data-toggle="modal" data-target="#profileActionModal" data-action="approve" href="javascript:void()">Approve</a>
                            @endif
                                <a class="dropdown-item text-warning modal-action" data-toggle="modal" data-target="#profileActionModal" data-action="suspend" href="javascript:void()">Suspend</a>
                                <a class="dropdown-item modal-action" data-toggle="modal" data-target="#profileActionModal" data-action="ban" href="javascript:void()">Ban</a>
                                <a class="dropdown-item text-success modal-action" data-toggle="modal" data-target="#profileActionModal" data-action="activate" href="javascript:void()">Activate</a>
                        </div>
                    </div>
                    <div class="profile-tab">
                        <div class="custom-tab-1">
                            <ul class="nav nav-tabs">
                                <li class="nav-item">
                                    <a href="#my-posts" data-toggle="tab" class="nav-link active show">Personal Info</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#about-me" data-toggle="tab" class="nav-link">Rides</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div id="my-posts" class="tab-pane fade active show">
                                    <div class="profile-personal-info mt-5">
                                        <div class="row mb-4 mb-sm-2">
                                            <div class="col-sm-3">
                                                <h5 class="f-w-500">Full Name
                                                    <span class="pull-right d-none d-sm-block">:</span>
                                                </h5>
                                            </div>
                                            <div class="col-sm-9">
                                                <span>{{$user->full_name ?? ''}}</span>
                                            </div>
                                        </div>
                                        <div class="row mb-4 mb-sm-2">
                                            <div class="col-sm-3">
                                                <h5 class="f-w-500">Email Address
                                                    <span class="pull-right d-none d-sm-block">:</span>
                                                </h5>
                                            </div>
                                            <div class="col-sm-9">
                                                <span>{{$user->email ?? ''}}</span>
                                            </div>
                                        </div>
                                        <div class="row mb-4 mb-sm-2">
                                            <div class="col-sm-3">
                                                <h5 class="f-w-500">Phone No.
                                                    <span class="pull-right d-none d-sm-block">:</span>
                                                </h5>
                                            </div>
                                            <div class="col-9">
                                                <span>{{$user->phone_number ?? ''}}</span>
                                            </div>
                                        </div>
                                        <div class="row mb-4 mb-sm-2">
                                            <div class="col-sm-3">
                                                <h5 class="f-w-500">Address
                                                    <span class="pull-right d-none d-sm-block">:</span>
                                                </h5>
                                            </div>
                                            <div class="col-9">
                                                <span>{{$user->address ?? ''}}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="about-me" class="tab-pane fade">
                                    <div class="profile-about-me mt-5">
                                        <div class="table-responsive">
                                            <table id="example" class="display table-responsive-md">
                                                <thead>
                                                <tr>
                                                    <th>S/No.</th>
                                                    <th>Amount</th>
                                                    <th>Destination</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @php
                                                    $serial = 1;
                                                @endphp
                                                @foreach($user->getDriverRides as $ride)
                                                    <tr>
                                                        <td>{{$serial++}}</td>
                                                        <td>{{$ride->amount ?? ''}}</td>
                                                        <td>{{$ride->destination ?? ''}}</td>
                                                        <td>
                                                            @switch($ride->status)
                                                                @case(1)
                                                                Pending
                                                                @break
                                                                @case(2)
                                                                In-progress
                                                                @break
                                                                @case(3)
                                                                Cancelled
                                                                @break
                                                                @case(4)
                                                                Done
                                                                @break
                                                            @endswitch
                                                        </td>
                                                        <td>
                                                            <a href="javascript:void(0);" data-target="#rideModal_{{$ride->id}}" data-toggle="modal" class="btn btn-sm btn-primary">View</a>
                                                            <!-- Modal -->
                                                            <div class="modal fade" id="rideModal_{{$ride->id}}">
                                                                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title">Ride Details</h5>
                                                                            <button type="button" class="close" data-dismiss="modal">
                                                                                <span>&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div class="profile-personal-info">
                                                                                <div class="custom-tab-1">
                                                                                    <ul class="nav nav-tabs">
                                                                                        <li class="nav-item">
                                                                                            <a href="#detail_{{$ride->id}}" data-toggle="tab" class="nav-link active show">Detail</a>
                                                                                        </li>
                                                                                        <li class="nav-item">
                                                                                            <a href="#passengers_{{$ride->id}}" data-toggle="tab" class="nav-link">Passengers</a>
                                                                                        </li>
                                                                                    </ul>
                                                                                </div>
                                                                                <div class="tab-content mt-3">
                                                                                    <div id="detail_{{$ride->id}}" class="tab-pane fade active show">
                                                                                        <div class="row mb-4 mb-sm-2">
                                                                                            <div class="col-sm-3">
                                                                                                <h5 class="f-w-500">Destination
                                                                                                    <span class="pull-right d-none d-sm-block">:</span>
                                                                                                </h5>
                                                                                            </div>
                                                                                            <div class="col-sm-9">
                                                                                                <span>{{$ride->destination ?? ''}}</span>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row mb-4 mb-sm-2">
                                                                                            <div class="col-sm-3">
                                                                                                <h5 class="f-w-500">Amount
                                                                                                    <span class="pull-right d-none d-sm-block">:</span>
                                                                                                </h5>
                                                                                            </div>
                                                                                            <div class="col-sm-9">
                                                                                                <span>{{number_format($ride->amount,2)}}</span>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row mb-4 mb-sm-2">
                                                                                            <div class="col-sm-3">
                                                                                                <h5 class="f-w-500">Pickup 1
                                                                                                    <span class="pull-right d-none d-sm-block">:</span>
                                                                                                </h5>
                                                                                            </div>
                                                                                            <div class="col-9">
                                                                                                <span>{{$ride->pickup1 ?? ''}}</span>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row mb-4 mb-sm-2">
                                                                                            <div class="col-sm-3">
                                                                                                <h5 class="f-w-500">Pickup 2
                                                                                                    <span class="pull-right d-none d-sm-block">:</span>
                                                                                                </h5>
                                                                                            </div>
                                                                                            <div class="col-9">
                                                                                                <span>{{$ride->pickup2 ?? ''}}</span>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row mb-4 mb-sm-2">
                                                                                            <div class="col-sm-3">
                                                                                                <h5 class="f-w-500">Departure Time
                                                                                                    <span class="pull-right d-none d-sm-block">:</span>
                                                                                                </h5>
                                                                                            </div>
                                                                                            <div class="col-9">
                                                                                        <span>
                                                                                            {{$ride->departure_time ?? ''}}
                                                                                        </span>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row mb-4 mb-sm-2">
                                                                                            <div class="col-sm-3">
                                                                                                <h5 class="f-w-500">Capacity
                                                                                                    <span class="pull-right d-none d-sm-block">:</span>
                                                                                                </h5>
                                                                                            </div>
                                                                                            <div class="col-sm-9">
                                                                                                <span>{{$ride->capacity ?? ''}}</span>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row mb-4 mb-sm-2">
                                                                                            <div class="col-sm-3">
                                                                                                <h5 class="f-w-500">Status
                                                                                                    <span class="pull-right d-none d-sm-block">:</span>
                                                                                                </h5>
                                                                                            </div>
                                                                                            <div class="col-sm-9">
                                                                                                <span>{{$ride->status ?? ''}}</span>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row mb-4 mb-sm-2">
                                                                                            <div class="col-sm-3">
                                                                                                <h5 class="f-w-500">Date
                                                                                                    <span class="pull-right d-none d-sm-block">:</span>
                                                                                                </h5>
                                                                                            </div>
                                                                                            <div class="col-sm-9">
                                                                                                <span>{{!is_null($ride->created_at) ? date('d M, Y', strtotime($ride->created_at)) : '-'}}</span>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div id="passengers_{{$ride->id}}" data-toggle="tab" class="nav-link">
                                                                                        <div class="table-responsive">
                                                                                            <table class="table table-bordered table-striped">
                                                                                                <tr>
                                                                                                    <th>S/No.</th>
                                                                                                    <th>Name</th>
                                                                                                    <th>Pickup</th>
                                                                                                    <th>Request</th>
                                                                                                    <th>Ride</th>
                                                                                                </tr>
                                                                                                @php
                                                                                                    $serial = 1;
                                                                                                @endphp
                                                                                                @foreach($ride->getRidePassengers as $pass)
                                                                                                    <tr>
                                                                                                        <td>{{$serial++}}</td>
                                                                                                        <td>{{$pass->getUser->full_name ?? ''}}</td>
                                                                                                        <td>{{$pass->pickup ?? ''}}</td>
                                                                                                        <td>{{$pass->request_status ?? ''}}</td>
                                                                                                        <td>{{$pass->passenger_ride_status ?? ''}}</td>
                                                                                                    </tr>
                                                                                                @endforeach
                                                                                            </table>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                                <tfoot>
                                                <tr>
                                                    <th>S/No.</th>
                                                    <th>Amount</th>
                                                    <th>Destination</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="profile-tab">
                        <div class="custom-tab-1">
                            <ul class="nav nav-tabs">
                                <li class="nav-item">
                                    <a href="#my-posts" data-toggle="tab" class="nav-link active show">KYC</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div id="my-posts" class="tab-pane fade active show">
                                    <div class="profile-personal-info mt-5">
                                        <div class="row mb-4 mb-sm-2">
                                            <div class="col-sm-3">
                                                <h5 class="f-w-500">Full Name
                                                    <span class="pull-right d-none d-sm-block">:</span>
                                                </h5>
                                            </div>
                                            <div class="col-sm-9">
                                                <span>{{$user->full_name ?? ''}}</span>
                                            </div>
                                        </div>
                                        <div class="row mb-4 mb-sm-2">
                                            <div class="col-sm-3">
                                                <h5 class="f-w-500">Email Address
                                                    <span class="pull-right d-none d-sm-block">:</span>
                                                </h5>
                                            </div>
                                            <div class="col-sm-9">
                                                <span>{{$user->email ?? ''}}</span>
                                            </div>
                                        </div>
                                        <div class="row mb-4 mb-sm-2">
                                            <div class="col-sm-3">
                                                <h5 class="f-w-500">Phone No.
                                                    <span class="pull-right d-none d-sm-block">:</span>
                                                </h5>
                                            </div>
                                            <div class="col-9">
                                                <span>{{$user->phone_number ?? ''}}</span>
                                            </div>
                                        </div>
                                        <div class="row mb-4 mb-sm-2">
                                            <div class="col-sm-3">
                                                <h5 class="f-w-500">Address
                                                    <span class="pull-right d-none d-sm-block">:</span>
                                                </h5>
                                            </div>
                                            <div class="col-9">
                                                <span>{{$user->address ?? ''}}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('dialog-section')
    <div class="modal fade" id="profileActionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form class="modal-content" method="post" action="{{route('update-account-status')}}">
                <div class="modal-header">
                    <h5 class="modal-title" id="profileActionModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p id="textId"></p>
                        @csrf
                        <input type="hidden" id="actionType" name="action">
                        <input type="hidden" id="user" value="{{$user->id}}" name="user">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
            </div>
        </div>
    </div>
@endsection

@section('extra-scripts')
    <script>
        $(document).ready(function(){
            $(document).on('click', '.modal-action', function(e){
                e.preventDefault();
                var action = $(this).data('action');
                var title = '';
                var text = '';
                switch(action){
                    case 'decline':
                        title = "Decline Application";
                        $('#profileActionModalLabel').text(title);
                        text = "Are you sure you want to decline this application?";
                        $('#textId').text(text);
                        $('#actionType').val('decline');
                    break;
                    case 'approve':
                        title = "Approve Application";
                        $('#profileActionModalLabel').text(title);
                        text = "Are you sure you want to approve this application?";
                        $('#textId').text(text);
                        $('#actionType').val('approve');
                    break;
                    case 'suspend':
                        title = "Suspend Account";
                        $('#profileActionModalLabel').text(title);
                        text = "Are you sure you want to suspend this account?";
                        $('#textId').text(text);
                        $('#actionType').val('suspend');
                    break;
                    case 'ban':
                        title = "Ban Account";
                        $('#profileActionModalLabel').text(title);
                        text = "Are you sure you want to ban this account?";
                        $('#textId').text(text);
                        $('#actionType').val('ban');
                    break;
                    case 'activate':
                        title = "Activate Account";
                        $('#profileActionModalLabel').text(title);
                        text = "Are you sure you want to activate this account?";
                        $('#textId').text(text);
                        $('#actionType').val('activate');
                    break;
                }
            });
        });
    </script>
@endsection
