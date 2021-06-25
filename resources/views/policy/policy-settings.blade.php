@extends('layouts.master-layout')
@section('title')
    Policy Settings
@endsection

@section('current-page')
    Policy Settings
@endsection

@section('breadcrumb-current-page')
    Policy Settings
@endsection

@section('main-content')
    <div class="row">
        <div class="col-xl-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Policy Settings</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-3 col-xxl-4 col-sm-4">
                            <div class="nav flex-column nav-pills mb-3">
                                <a href="#v-pills-home" data-toggle="pill" class="nav-link active show">General Settings</a>
                                <a href="#v-pills-profile" data-toggle="pill" class="nav-link">Policy Settings</a>
                                <a href="#v-pills-messages" data-toggle="pill" class="nav-link">Messages</a>
                                <a href="#v-pills-settings" data-toggle="pill" class="nav-link">Settings</a>
                            </div>
                        </div>
                        <div class="col-xl-9 col-xxl-8 col-sm-8">
                            @if(session()->has('success'))
                                <div class="alert alert-success alert-dismissible fade show">
                                    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
                                    {!! session()->get('success') !!}
                                    <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                                    </button>
                                </div>
                            @endif
                            <div class="tab-content">
                                <div id="v-pills-home" class="tab-pane fade active show">
                                    <p>Cillum ad ut irure tempor velit nostrud occaecat ullamco aliqua anim Lorem sint. Veniam sint duis incididunt do esse magna mollit excepteur laborum qui. Id id reprehenderit sit est eu aliqua occaecat quis
                                        et velit excepteur laborum mollit dolore eiusmod. Ipsum dolor in occaecat commodo et voluptate minim reprehenderit mollit pariatur. Deserunt non laborum enim et cillum eu deserunt excepteur ea incididunt
                                        minim occaecat.
                                    </p>
                                </div>
                                <div id="v-pills-profile" class="tab-pane fade">
                                    <form action="{{route('policy-settings')}}" method="post">
                                        @csrf
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Minimum Threshold</label>
                                                <input min="1" type="number" step="0.01" name="minimum_threshold" class="form-control" placeholder="Minimum Threshold">
                                                @error('minimum_threshold')
                                                    <i class="text-danger">{{$message}}</i>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Charge Rate</label>
                                                <input type="number" name="charge_rate"  class="form-control" placeholder="Charge Rate" step="0.01">
                                                @error('charge_rate')
                                                    <i class="text-danger">{{$message}}</i>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 d-flex justify-content-center">
                                                <div class="btn-group">
                                                    <a href="{{url()->previous()}}" class="text-white btn btn-secondary btn-sm">Back</a>
                                                    <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div id="v-pills-messages" class="tab-pane fade">
                                    <p>Fugiat id quis dolor culpa eiusmod anim velit excepteur proident dolor aute qui magna. Ad proident laboris ullamco esse anim Lorem Lorem veniam quis Lorem irure occaecat velit nostrud magna nulla. Velit
                                        et et proident Lorem do ea tempor officia dolor. Reprehenderit Lorem aliquip labore est magna commodo est ea veniam consectetur.</p>
                                </div>
                                <div id="v-pills-settings" class="tab-pane fade">
                                    <p>Eu dolore ea ullamco dolore Lorem id cupidatat excepteur reprehenderit consectetur elit id dolor proident in cupidatat officia. Voluptate excepteur commodo labore nisi cillum duis aliqua do. Aliqua amet
                                        qui mollit consectetur nulla mollit velit aliqua veniam nisi id do Lorem deserunt amet. Culpa ullamco sit adipisicing labore officia magna elit nisi in aute tempor commodo eiusmod.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
