@extends('layouts.master-layout')
@section('title')
    Credit Wallet
@endsection

@section('current-page')
    Credit Wallet
@endsection

@section('breadcrumb-current-page')
    Credit Wallet
@endsection

@section('main-content')
    <div class="row">
        <div class="col-6 offset-md-3">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Credit Wallet</h4>
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
                    <div class="row">
                        <div class="col-xl-12 col-xxl-12 col-sm-12">
                            <form action="{{route('credit-wallet')}}" method="post" autocomplete="off">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Enter User Mobile No.</label>
                                            <input type="number" id="account" name="account" placeholder="Enter user mobile no." class="form-control">
                                            @error('account')
                                                <i class="text-danger">{{$message}}</i>
                                            @enderror
                                            <i class="text-danger" id="error"></i>
                                            <i class="text-success" id="success"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Amount</label>
                                            <input type="number" step="0.01" name="amount" placeholder="Amount" class="form-control">
                                            @error('amount')
                                            <i class="text-danger">{{$message}}</i>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12 d-flex justify-content-center">
                                        <div class="btn-group">
                                            <a href="{{url()->previous()}}" class="btn text-white btn-secondary btn-sm">Cancel</a>
                                            <button class="btn btn-sm btn-primary" id="submit-btn" type="submit">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('extra-scripts')
    <script>
        $(document).ready(function(){
            var account = null;
            $('#error').hide();
            $('#success').hide();
            $('#submit-btn').hide();
            $(document).on('blur', '#account', function(e){
                account = $(this).val();
                if(account != null){
                    axios.post('/transactions/check-account', {account:account})
                    .then(response=>{
                        if(response.data.error){
                            $('#error').text("No record found.");
                            $('#success').hide();
                            $('#submit-btn').hide();
                            $('#error').show();
                        }else{
                            $('#success').text("Account does exist.");
                            $('#error').hide();
                            $('#submit-btn').show();
                            $('#success').show();
                        }

                    })
                    .catch(error=>{

                    });
                }
            });
        });
    </script>
@endsection
