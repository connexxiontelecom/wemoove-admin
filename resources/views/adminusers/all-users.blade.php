@extends('layouts.master-layout')
@section('title')
    Manage Admin Users
@endsection

@section('current-page')
    Manage Admin Users
@endsection

@section('breadcrumb-current-page')
    Manage Admin Users
@endsection

@section('main-content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Manage Admin Users</h4>
                </div>
                <div class="card-body">
                    <a href="{{route('add-new-admin-user')}}" class="btn btn-primary btn-sm mb-4 float-right">Add New Admin User</a>
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
                            @foreach($admin_users as $user)
                                <tr>
                                    <td>{{$user->first_name ?? ''}} {{$user->surname ?? ''}}</td>
                                    <td>{{$user->email ?? ''}}</td>
                                    <td>{{$user->mobile_no ?? ''}}</td>
                                    <td>
                                        @switch($user->account_status)
                                            @case(0)
                                            Active
                                            @break
                                            @case(1)
                                            Deactivated
                                            @break
                                        @endswitch
                                    </td>
                                    <td>{{!is_null($user->created_at) ? date('d M, Y', strtotime($user->created_at)) : '-'}}</td>
                                    <td>
                                        <a href="{{route('view-admin-user', $user->id)}}" class="btn btn-primary btn-sm">View</a>
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
