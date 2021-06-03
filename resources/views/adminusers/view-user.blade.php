@extends('layouts.master-layout')
@section('title')
{{$user->first_name ?? ''}}'s Profile
@endsection

@section('current-page')
    {{$user->first_name ?? ''}}'s Profile
@endsection

@section('breadcrumb-current-page')
    {{$user->first_name ?? ''}}'s Profile
@endsection

@section('main-content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="profile-tab">
                        <div class="custom-tab-1">
                            <ul class="nav nav-tabs">
                                <li class="nav-item">
                                    <a href="#about-me" data-toggle="tab" class="nav-link active show">About {{$user->first_name ?? ''}}</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div id="about-me" class="tab-pane fade active show mt-4">
                                    <div class="profile-personal-info">
                                        <h4 class="text-primary mb-4">Personal Information</h4>
                                        <div class="row mb-4 mb-sm-2">
                                            <div class="col-sm-3">
                                                <h5 class="f-w-500">Full Name
                                                    <span class="pull-right d-none d-sm-block">:</span>
                                                </h5>
                                            </div>
                                            <div class="col-sm-9">
                                                <span>{{$user->first_name ?? ''}} {{$user->surname ?? ''}}</span>
                                            </div>
                                        </div>
                                        <div class="row mb-4 mb-sm-2">
                                            <div class="col-sm-3">
                                                <h5 class="f-w-500">Email
                                                    <span class="pull-right d-none d-sm-block">:</span>
                                                </h5>
                                            </div>
                                            <div class="col-sm-9">
                                                <span>{{$user->email ?? ''}}</span>
                                            </div>
                                        </div>
                                        <div class="row mb-4 mb-sm-2">
                                            <div class="col-sm-3">
                                                <h5 class="f-w-500">Mobile No.
                                                    <span class="pull-right d-none d-sm-block">:</span>
                                                </h5>
                                            </div>
                                            <div class="col-9">
                                                <span>{{$user->mobile_no ?? ''}}</span>
                                            </div>
                                        </div>
                                        <div class="row mb-4 mb-sm-2">
                                            <div class="col-sm-3">
                                                <h5 class="f-w-500">Status
                                                    <span class="pull-right d-none d-sm-block">:</span>
                                                </h5>
                                            </div>
                                            <div class="col-9">
                                                <span>{{$user->acccount_status == 1 ? 'Active' : 'Inactive'}}</span>
                                            </div>
                                        </div>
                                        <div class="row mb-4 mb-sm-2">
                                            <div class="col-sm-3">
                                                <h5 class="f-w-500">Address
                                                    <span class="pull-right d-none d-sm-block">:</span>
                                                </h5>
                                            </div>
                                            <div class="col-9">
                                                <span>
                                                    {{$user->address ?? ''}}
                                                </span>
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
