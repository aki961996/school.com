@extends('layouts.app')
@section('content')
@section('title','List')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Parents Add</h1>
                </div>

                <div class="col-sm-6" style="text-align: right">
                    <a href="{{route('parent-list')}}" class="btn btn-primary">Back</a>
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
                        <form action="{{route('parent-store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">

                                    <div class="form-group col-md-6">
                                        <label for="">First Name <span style="color: red;">*</span></label>
                                        <input type="text" name="name" value="{{old('name')}}" class="form-control"
                                            id="" placeholder="Enter Firts name">
                                        <div style="color: red">{{$errors->first('name')}}</div>

                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Last Name <span style="color: red;">*</span></label>
                                        <input type="text" name="last_name" value="{{old('last_name')}}"
                                            class="form-control" id="" placeholder="Enter Last name">
                                        <div style="color: red">{{$errors->first('last_name')}}</div>

                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="">Occupation <span style="color: red;">*</span></label>
                                        <input type="text" name="occupation" value="{{old('occupation')}}"
                                            class="form-control" id="" placeholder="Enter Occupation">
                                        <div style="color: red">{{$errors->first('occupation')}}</div>

                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="">Address <span style="color: red;">*</span></label>
                                        <textarea id="" name="address" rows="4" cols="50"></textarea>
                                        <div style="color: red">{{$errors->first('address')}}</div>

                                    </div>



                                    <div class="form-group col-md-6">
                                        <label for="">Gender <span style="color: red;">*</span></label>
                                        <select name="gender" class="form-control">
                                            <option value="">Select Gender</option>
                                            <option {{ (old('gender')=='Male' ) ? 'selected' :''}} value="Male">Male

                                            </option>
                                            <option {{ (old('gender')=='Female' ) ? 'selected' :''}} value="Female">
                                                Female</option>
                                            <option {{ (old('gender')=='Other' ) ? 'selected' :''}} value="Other">Other
                                            </option>

                                        </select>
                                        <div style="color: red">{{$errors->first('gender')}}</div>

                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="">Mobile Number <span style="color: red;"></span></label>
                                        <input type="text" name="mobile_number" value="{{old('mobile_number')}}"
                                            class="form-control" id="" placeholder="Enter Mobile Number">
                                        <div style="color: red">{{$errors->first('mobile_number')}}</div>

                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="">Status <span style="color: red;">*</span></label>
                                        <select name="status" class="form-control">
                                            <option value="">Select Status</option>
                                            <option value="0">Active</option>
                                            <option value="1">Inactive</option>
                                        </select>
                                        <div style="color: red">{{$errors->first('status')}}</div>

                                    </div>



                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address <span
                                            style="color: red;">*</span></label>
                                    <input type="email" name="email" value="{{old('email')}}" class="form-control"
                                        id="exampleInputEmail1" placeholder="Enter email">
                                    <div style="color: red">{{$errors->first('email')}}</div>

                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password <span
                                            style="color: red;">*</span></label>
                                    <input type="password" name="password" class="form-control"
                                        id="exampleInputPassword1" placeholder="Password">
                                    <div style="color: red">{{$errors->first('password')}}</div>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            @endsection