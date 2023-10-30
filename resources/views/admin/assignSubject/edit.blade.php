@extends('layouts.app')
@section('content')
@section('title','List')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Assign Subject </h1>
                </div>

                <div class="col-sm-6" style="text-align: right">
                    <a href="{{route('assign-subject-list')}}" class="btn btn-primary">Back</a>
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
                        <form action="{{route('subject-update')}}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{$dataAssignSubject->id}}" class="form-control" id=""
                                placeholder="">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" name="name"
                                        value="{{$dataAssignSubject->class_model_name}}" class="form-control"
                                        id="" placeholder="Enter name">
                                    {{-- <div style="color: red">{{$errors->first('name')}}</div> --}}

                                </div>

                                {{-- status --}}
                                <div class="form-group">
                                    <label>Status</label>
                                    {{-- value 1 vann active selectil --}}
                                    <select class="form-control" value="{{$dataAssignSubject->status}}" name=" status">
                                        <option value="0" @if($dataAssignSubject->status == 0) selected="selected"
                                            @endif>Active
                                        </option>
                                        <option value="1" @if($dataAssignSubject->status == 1) selected="selected"
                                            @endif>
                                            Inactive
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