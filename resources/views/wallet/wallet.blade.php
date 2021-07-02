@extends('layouts.master-layout')
@section('title')
    Wallet
@endsection

@section('current-page')
    Wallet
@endsection

@section('breadcrumb-current-page')
    Wallet
@endsection

@section('main-content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Wallet</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 mt-4">
                            <h5>Wallet transactions</h5>
                            <div class="table-responsive">
                                <table id="example" class="display table-responsive-md">
                                    <thead>
                                    <tr>
                                        <th>S/No.</th>
                                        <th>Name</th>
                                        <th>Mobile No.</th>
                                        <th>Email</th>
                                        <th>Balance</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                        $serial = 1;
                                    @endphp
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{$serial++}}</td>
                                            <td>{{$user->full_name ?? ''}}</td>
                                            <td>{{$user->phone_number ?? ''}}</td>
                                            <td>{{$user->email ?? ''}}</td>
                                            <td class="text-right">{{number_format($user->getUserWalletBalanceById($user->id),2)}}</td>
                                            <td>
                                                <a href="{{route('customer-ledger', $user->id)}}" class="btn btn-primary btn-sm">View</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>S/No.</th>
                                        <th>Name</th>
                                        <th>Mobile No.</th>
                                        <th>Email</th>
                                        <th>Balance</th>
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
@endsection
