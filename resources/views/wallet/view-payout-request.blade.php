@extends('layouts.master-layout')
@section('title')
{{$payout->getUser->full_name ?? ''}} Payout Request
@endsection

@section('current-page')
    {{$payout->getUser->full_name ?? ''}} Payout Request
@endsection

@section('breadcrumb-current-page')
    {{$payout->getUser->full_name ?? ''}} Payout Request
@endsection

@section('main-content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{$payout->getUser->full_name ?? ''}} Payout Request</h4>
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
                        @if(($wallet->sum('credit') - $wallet->sum('debit')) <= 0 )
                        <div class="alert alert-warning alert-dismissible fade show">
                            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12.01" y2="17"></line></svg>
                            <strong>Whoops!</strong> Your current balance is less than our minimum threshold.
                            <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                            </button>
                        </div>
                    @endif
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
                                <p>{{number_format($wallet/*->whereYear('created_at','=', date('Y'))*/->sum('credit'),2)}}</p>
                            </div>
                        </div>
                        <div class="col-lg-3 mb-3" style="border-left: 1px solid #ddd;">
                            <div class="mb-4">
                                <h4 class="card-title card-intro-title mb-1 text-primary">This Month</h4>
                                <p>902229929993</p>
                            </div>
                        </div>
                        <div class="col-lg-3 mb-3" style="border-left: 1px solid #ddd;">
                            <div class="mb-4">
                                <h4 class="card-title card-intro-title mb-1 text-success">Balance</h4>
                                <p>{{number_format(($wallet->sum('credit') - $wallet->sum('debit')) <= 0 ? 0 : ($wallet->sum('credit') - $wallet->sum('debit')),2)}}</p>
                            </div>
                        </div>
                        <div class="custom-tab-1 mt-3 col-md-12">
                            <ul class="nav nav-tabs">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#home1"> Payout Request</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#profile1">Transactions</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade active show" id="home1" role="tabpanel">
                                    <div class="pt-4">
                                        <h5>Payout Request</h5>
                                        <div class="col-xl-6 col-lg-6 offset-xl-3 offset-lg-3">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="basic-form custom_file_input">
                                                        <form action="{{route('process-payout-request')}}" method="post">
                                                            @csrf
                                                           <div class="form-group">
                                                               <label for="">Full Name</label>
                                                               <input type="text" disabled class="form-control" value="{{$payout->getUser->full_name ?? ''}}">
                                                           </div>
                                                            <div class="form-group">
                                                               <label for="">Amount</label>
                                                               <input type="text" disabled class="form-control" value="{{number_format($payout->amount ?? 0,2) }}">
                                                           </div>
                                                            <div class="form-group">
                                                               <label for="">Balance <abbr title="Current balance; before this action is taken.">?</abbr></label>
                                                               <input type="text" disabled class="form-control" value="{{number_format(($wallet->sum('credit') - $wallet->sum('debit')) <= 0 ? 0 : ($wallet->sum('credit') - $wallet->sum('debit')),2) }}">
                                                           </div>
                                                            <div class="form-group">
                                                                <label for="">Status</label>
                                                                <select name="status" id="status" class="form-control">
                                                                    <option selected disabled>--Select status--</option>
                                                                    <option value="1">Approve</option>
                                                                    <option value="2">Decline</option>
                                                                </select>
                                                                @error('status')
                                                                    <i class="text-danger">{{$message}}</i>
                                                                @enderror
                                                                <input type="hidden" value="{{$payout->id}}" name="payout">
                                                            </div>
                                                            <hr>
                                                            <div class="form-group d-flex justify-content-center">
                                                                <div class="btn-group">
                                                                    <a href="{{url()->previous()}}" class="btn btn-secondary btn-sm text-white">Cancel</a>
                                                                    @if($payout->action_type == 0 && ($wallet->sum('credit') - $wallet->sum('debit')) > 0 )
                                                                        <button class="btn btn-primary btn-sm">Submit</button>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="profile1">
                                    <div class="pt-4">
                                        <h5>Transactions</h5>
                                        <div class="table-responsive">
                                            <table id="example" class="display table-responsive-md">
                                                <thead>
                                                <tr>
                                                    <th>S/No.</th>
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
                                                        <td class="text-right">{{$wall->debit > 0 ? number_format($wall->debit,2) : '-'}}</td>
                                                        <td class="text-right">{{$wall->credit > 0 ? number_format($wall->credit,2) : '-'}}</td>
                                                        <td>{{$wall->narration ?? '-'}}</td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                                <tfoot>
                                                <tr>
                                                    <th>S/No.</th>
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
            </div>
        </div>
    </div>
@endsection
