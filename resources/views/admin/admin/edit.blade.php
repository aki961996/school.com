@extends('layouts.app')
@section('content')
@section('title','List')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Data</h1>
                </div>

                <div class="col-sm-6" style="text-align: right">
                    <a href="{{route('admin-list')}}" class="btn btn-primary">Back</a>
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
                        <form action="{{route('update')}}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{$admins->id}}" class="form-control" id=""
                                placeholder="">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" name="name" value="{{old('name', $admins->name) }}"
                                        class="form-control" id="" placeholder="Enter name">

                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" name="email" value="{{ old('email',$admins->email) }}"
                                        class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                                    <div style="color: red">{{$errors->first('email')}}</div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="text" name="password" class="form-control" id="exampleInputPassword1"
                                        placeholder="Password">
                                    <p>Do you want to change password so please add new password</p>
                                </div>


                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>

                @endsection