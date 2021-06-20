@extends('layouts.master-layout')
@section('title')
    Manage Payout Requests
@endsection

@section('current-page')
    Manage Payout Requests
@endsection

@section('breadcrumb-current-page')
    Manage Payout Requests
@endsection

@section('main-content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Manage Payout Requests</h4>
                </div>
                <div class="card-body">
                    @if(session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show">
                            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
                            {!! session()->get('success') !!}
                            <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                            </button>
                        </div>
                    @endif

                        <div class="table-responsive">
                            <table id="example" class="display table-responsive-md">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Full Name</th>
                                    <th>Amount</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php
                                    $serial = 1;
                                @endphp
                                    @foreach($payouts as $pay)
                                        <tr>
                                            <td>{{$serial++}}</td>
                                            <td>{{$pay->getUser->full_name ?? ''}}</td>
                                            <td class="text-right">{{number_format($pay->amount ?? 0,2) }}</td>
                                            <td>{{date('d M, Y', strtotime($pay->created_at))}}</td>
                                            <td>
                                                @if($pay->action_type == 0)
                                                    <label for="" class="label label-secondary">Pending</label>
                                                    @elseif($pay->action_type == 1)
                                                    <label for="" class="label label-success">Approved</label>
                                                    @elseif($pay->action_type == 2)
                                                    <label for="" class="label label-danger">Declined</label>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{route('view-payout-request', $pay->id)}}" class="btn btn-primary btn-sm">View</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Full Name</th>
                                    <th>Amount</th>
                                    <th>Date</th>
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
