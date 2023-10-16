@extends('layouts.app')
@section('content')
@section('title','List')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Class Add</h1>
                </div>

                <div class="col-sm-6" style="text-align: right">
                    <a href="{{route('class-list')}}" class="btn btn-primary">Back</a>
                </div>

            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">

                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{route('classUpdate')}}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{$admin->id}}" class="form-control" id=""
                                placeholder="">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" name="name" value="{{old('name', $admin->name) }}"
                                        class="form-control" id="" placeholder="Enter name">
                                    {{-- <div style="color: red">{{$errors->first('name')}}</div> --}}

                                </div>

                                {{-- created by --}}
                                <div class="form-group">
                                    <label>Created By</label>
                                    {{-- value 1 vann active selectil --}}
                                    <select class="form-control" value="" name="created_by">
                                        <option value="1" @if($admin->created_by == 1) selected="selected" @endif>Admin
                                        </option>
                                        <option value="2" @if($admin->created_by == 2) selected="selected" @endif>
                                            Teacher
                                        </option>
                                        <option value="3" @if($admin->created_by == 3) selected="selected" @endif>
                                            Student
                                        </option>
                                        <option value="4" @if($admin->created_by == 4) selected="selected" @endif>
                                            Parent
                                        </option>
                                    </select>

                                </div>

                                {{-- status --}}

                                <div class="form-group">
                                    <label>Status</label>
                                    {{-- value 1 vann active selectil --}}
                                    <select class="form-control" value="{{$admin->status}}" name=" status">
                                        <option value="0" @if($admin->status == 0) selected="selected" @endif>Active
                                        </option>
                                        <option value="1" @if($admin->status == 1) selected="selected" @endif> Inactive
                                        </option>
                                    </select>

                                </div>


                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            @endsection