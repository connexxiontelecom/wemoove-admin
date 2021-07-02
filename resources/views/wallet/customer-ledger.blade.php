@extends('layouts.master-layout')
@section('title')
{{$user->full_name ?? ''}}'s Ledger
@endsection

@section('current-page')
    {{$user->full_name ?? ''}}'s Ledger
@endsection

@section('breadcrumb-current-page')
    {{$user->full_name ?? ''}}'s Ledger
@endsection

@section('main-content')
    <div class="row">
        <div class="col-lg-3 mb-3">
            <div class="mb-4">
                <h4 class="card-title card-intro-title mb-1 text-warning">All Time</h4>
                <p>{{number_format($wallet->sum('credit'),2)}}</p>
            </div>
        </div>
        <div class="col-lg-3 mb-3" style="border-left: 1px solid #ddd;">
            <div class="mb-4">
                <h4 class="card-title card-intro-title mb-1 text-secondary">This Year {{date('Y')}}</h4>
                <p>{{number_format($thisyear,2)}}</p>
            </div>
        </div>
        <div class="col-lg-3 mb-3" style="border-left: 1px solid #ddd;">
            <div class="mb-4">
                <h4 class="card-title card-intro-title mb-1 text-primary">This Month</h4>
                <p>{{number_format($thismonth,2)}}</p>
            </div>
        </div>
        <div class="col-lg-3 mb-3" style="border-left: 1px solid #ddd;">
            <div class="mb-4">
                <h4 class="card-title card-intro-title mb-1 text-success">Balance</h4>
                <p>{{number_format(($wallet->sum('credit') - $wallet->sum('debit')) <= 0 ? 0 : ($wallet->sum('credit') - $wallet->sum('debit')),2)}}</p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{$user->full_name ?? ''}}'s Ledger</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 mt-4">
                            <h5>Transactions</h5>
                            <div class="table-responsive">
                                <table id="example" class="display table-responsive-md">
                                    <thead>
                                    <tr>
                                        <th>S/No.</th>
                                        <th>Name</th>
                                        <th>Debit</th>
                                        <th>Credit</th>
                                        <th>Narration</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                        $serial = 1;
                                    @endphp
                                    @foreach($wallet as $wall)
                                        <tr>
                                            <td>{{$serial++}}</td>
                                            <td>{{$wall->getUser->full_name ?? ''}}</td>
                                            <td class="text-right">{{$wall->debit > 0 ? number_format($wall->debit,2) : '-'}}</td>
                                            <td class="text-right">{{$wall->credit > 0 ? number_format($wall->credit,2) : '-'}}</td>
                                            <td>{{$wall->narration ?? '-'}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>S/No.</th>
                                        <th>Name</th>
                                        <th>Debit</th>
                                        <th>Credit</th>
                                        <th>Narration</th>
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
