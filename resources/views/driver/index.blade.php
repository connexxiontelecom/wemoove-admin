@extends('layouts.master-layout')
@section('title')
    Manage Drivers
@endsection

@section('current-page')
    Manage Drivers
@endsection

@section('breadcrumb-current-page')
    Manage Drivers
@endsection

@section('main-content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Manage Drivers</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="display table-responsive-md">
                            <thead>
                            <tr>
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>Mobile No.</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($drivers as $driver)
                                <tr>
                                    <td>{{$driver->full_name ?? ''}}</td>
                                    <td>{{$driver->email ?? ''}}</td>
                                    <td>{{$driver->phone_number ?? ''}}</td>
                                    <td>
                                        @switch($driver->status)
                                            @case(0)
                                            Suspended
                                            @break
                                            @case(1)
                                            Active
                                            @break
                                        @endswitch
                                    </td>
                                    <td>{{!is_null($driver->created_at) ? date('d M, Y', strtotime($driver->created_at)) : '-'}}</td>
                                    <td>
                                        <a href="{{route('user-detail',$driver->id)}}">View</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>Mobile No.</th>
                                <th>Status</th>
                                <th>Date</th>
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