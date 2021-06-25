@extends('layouts.master-layout')
@section('title')
   Manage Support Categories
@endsection

@section('current-page')
    Manage Support Categories
@endsection

@section('breadcrumb-current-page')
    Manage Support Categories
@endsection

@section('main-content')
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('support-categories')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Category Name</label>
                            <input type="text" name="category_name" value="{{old('category_name')}}" placeholder="Category Name" class="form-control">
                            @error('category_name')
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
                    <h4 class="card-title">Category Setup</h4>
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
                                <th>Category Name</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $serial = 1;
                            @endphp
                            @foreach($categories as $cat)
                                <tr>
                                    <td>{{$serial++}}</td>
                                    <td>{{$cat->category_name ?? ''}}</td>
                                    <td>
                                        <a href="javascript:void(0);" data-target="#bankModal_{{$cat->id}}" data-toggle="modal" class="btn btn-primary btn-sm">View</a>
                                        <div class="modal fade" id="bankModal_{{$cat->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{route('update-category-name')}}" method="post">
                                                            @csrf
                                                            <div class="form-group">
                                                                <label for="">Category Name</label>
                                                                <input type="text" name="category_name" value="{{$cat->category_name ?? ''}}" placeholder="Category Name" class="form-control">
                                                                <input type="hidden" name="support" value="{{$cat->id}}">
                                                                @error('category_name')
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
                                <th>Category Name</th>
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
