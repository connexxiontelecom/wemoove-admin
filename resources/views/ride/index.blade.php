@extends('layouts.master-layout')
@section('title')
    Manage Rides
@endsection

@section('current-page')
    Manage Rides
@endsection

@section('breadcrumb-current-page')
    Manage Rides
@endsection

@section('main-content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Manage Rides</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="display table-responsive-md">
                            <thead>
                            <tr>
                                <th>S/No.</th>
                                <th>Driver</th>
                                <th>Departure Time</th>
                                <th>Amount</th>
                                <th>Destination</th>
                                <th>Capacity</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $serial = 1;
                            @endphp
                            @foreach($rides as $ride)
                                <tr>
                                    <td>{{$serial++}}</td>
                                    <td>{{$ride->getDriver->full_name ?? ''}}</td>
                                    <td>{{$ride->departure_time ?? ''}}</td>
                                    <td>{{$ride->amount ?? ''}}</td>
                                    <td>{{$ride->destination ?? ''}}</td>
                                    <td>{{$ride->capacity ?? ''}}</td>
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
                                <th>Driver</th>
                                <th>Departure Time</th>
                                <th>Amount</th>
                                <th>Destination</th>
                                <th>Capacity</th>
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
@endsection