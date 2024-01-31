@extends('layouts.app')
@section('content')
@section('title','edit')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Parents Edit </h1>
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
                        <form action="{{route('parent-update')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <input type="hidden" id="hiddenField" name="id" value="{{$datas->id}}">
                                    <div class="form-group col-md-6">
                                        <label for="">First Name <span style="color: red;">*</span></label>
                                        <input type="text" name="name" value="{{old('name', $datas->name)}}"
                                            class="form-control" id="" placeholder="Enter Firts name">
                                        <div style="color: red">{{$errors->first('name')}}</div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Last Name <span style="color: red;">*</span></label>
                                        <input type="text" name="last_name"
                                            value="{{old('last_name', $datas->last_name)}}" class="form-control" id=""
                                            placeholder="Enter Last name">
                                        <div style="color: red">{{$errors->first('last_name')}}</div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Occupation <span style="color: red;">*</span></label>
                                        <input type="text" name="occupation"
                                            value="{{old('occupation', $datas->occupation)}}" class="form-control" id=""
                                            placeholder="Enter Occupation">
                                        <div style="color: red">{{$errors->first('occupation')}}</div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Address <span style="color: red;">*</span></label>
                                        <textarea id="" class="form-control" name="address" rows="4"
                                            cols="50">{{old('address',$datas->address)}}</textarea>
                                        <div style="color: red">{{$errors->first('address')}}</div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Gender <span style="color: red;">*</span></label>
                                        <select name="gender" class="form-control">
                                            <option value="">Select Gender</option>
                                            <option {{ ($datas->gender =='Male' ) ? 'selected' :''}}
                                                value="Male">Male
                                            </option>
                                            <option {{ ($datas->gender == 'Female' ) ? 'selected' :''}}
                                                value="Female">
                                                Female
                                            </option>
                                            <option>
                                                {{ ($datas->gender == 'Other' ) ? 'selected' :''}}
                                                Other
                                            </option>
                                        </select>
                                        <div style="color: red">{{$errors->first('gender')}}</div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="">Mobile Number <span style="color: red;"></span></label>
                                        <input type="text" name="mobile_number"
                                            value="{{old('mobile_number' ,$datas->mobile_number)}}" class="form-control"
                                            id="" placeholder="Enter Mobile Number">
                                        <div style="color: red">{{$errors->first('mobile_number')}}</div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="">Status <span style="color: red;">*</span></label>
                                        <select name="status" class="form-control">
                                            <option value="">Select Status</option>
                                            <option {{($datas->status == 0) ? 'selected' : ''}}
                                                value="0">Active</option>
                                            <option {{($datas->status == 1) ? 'selected' : ''}}
                                                value="1">Inactive</option>
                                        </select>
                                        <div style="color: red">{{$errors->first('status')}}</div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address <span
                                            style="color: red;">*</span></label>
                                    <input type="email" name="email" value="{{old('email',$datas->email)}}"
                                        class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                                    <div style="color: red">{{$errors->first('email')}}</div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password <span
                                            style="color: red;">*</span></label>
                                    <input type="password" value="{{old('email',$datas->password)}}" name="password"
                                        class="form-control" id="exampleInputPassword1" placeholder="Password">
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