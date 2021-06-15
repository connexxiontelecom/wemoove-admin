@extends('layouts.master-layout')
@section('title')
    Bank Setup
@endsection

@section('current-page')
    Bank Setup
@endsection

@section('breadcrumb-current-page')
    Bank Setup
@endsection

@section('main-content')
    <div class="row">
        <div class="col-md-4">
           <div class="card">
               <div class="card-body">
                   <form action="{{route('bank-setup')}}" method="post">
                       @csrf
                       <div class="form-group">
                           <label for="">Bank Name</label>
                           <input type="text" name="bank_name" value="{{old('bank_name')}}" placeholder="Bank Name" class="form-control">
                           @error('bank_name')
                           <i class="text-danger">{{$message}}</i>
                           @enderror
                       </div>
                       <div class="form-group">
                           <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                       </div>
                   </form>
               </div>
           </div>
        </div>
        <div class="col-18">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Bank Setup</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="display table-responsive-md">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Bank Name</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @php
                                    $serial = 1;
                                @endphp
                                @foreach($banks as $bank)
                                    <tr>
                                        <td>{{$serial++}}</td>
                                        <td>{{$bank->bank_name ?? ''}}</td>
                                        <td>
                                            <a href="javascript:void(0);" data-target="#bankModal_{{$bank->id}}" data-toggle="modal" class="btn btn-primary btn-sm">View</a>
                                            <div class="modal fade" id="bankModal_{{$bank->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Edit Bank</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{route('update-bank-name')}}" method="post">
                                                                @csrf
                                                                <div class="form-group">
                                                                    <label for="">Bank Name</label>
                                                                    <input type="text" name="bank_name" value="{{$bank->bank_name ?? ''}}" placeholder="Bank Name" class="form-control">
                                                                    <input type="hidden" name="bank" value="{{$bank->id}}">
                                                                    @error('bank_name')
                                                                    <i class="text-danger">{{$message}}</i>
                                                                    @enderror
                                                                </div>
                                                                <div class="form-group">
                                                                    <button type="submit" class="btn btn-primary btn-sm">Save changes</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Bank Name</th>
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
