@extends('layouts.master-layout')
@section('title')
    Add New Admin User
@endsection

@section('current-page')
    Add New Admin User
@endsection

@section('breadcrumb-current-page')
    Add New Admin User
@endsection

@section('main-content')
    <div class="col-xl-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Add New Admin User</h4>
                <a href="{{route('all-admin-users')}}" class="btn btn-primary btn-sm mb-4 float-right">All Admin Users</a>
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
                <div class="basic-form">
                    <form action="{{route('add-new-admin-user')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <input type="text" name="first_name" value="{{old('first_name')}}" class="form-control" placeholder="First name">
                                @error('first_name')
                                    <i class="text-danger">{{$message}}</i>
                                @enderror
                            </div>
                            <div class="col-sm-6 mt-2 mt-sm-0">
                                <input type="text" class="form-control" placeholder="Surname" name="surname" value="{{old('surname')}}">
                                @error('surname')
                                <i class="text-danger">{{$message}}</i>
                                @enderror
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-sm-6">
                                <input type="text" name="email" value="{{old('email')}}" class="form-control" placeholder="Email address">
                                @error('email')
                                    <i class="text-danger">{{$message}}</i>
                                @enderror
                            </div>
                            <div class="col-sm-6 mt-2 mt-sm-0">
                                <input type="text" class="form-control" placeholder="Mobile No." name="mobile_no" value="{{old('mobile_no')}}">
                                @error('mobile_no')
                                <i class="text-danger">{{$message}}</i>
                                @enderror
                            </div>
                        </div>
                        <div class="row mt-4">
                            <p><strong class="text-danger">Note:</strong> We'll generate a random password for this user. Ask the person to change upon successful login.</p>
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-12 d-flex justify-content-center">
                                <div class="btn-group">
                                    <a href="" class="btn btn-secondary btn-sm">Cancel</a>
                                    <button class="btn-primary btn-sm" type="submit">Submit</button>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
