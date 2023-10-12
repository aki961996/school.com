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
                        <form action="{{route('add')}}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" name="name" value="" class="form-control" id=""
                                        placeholder="Enter name">
                                    {{-- <div style="color: red">{{$errors->first('name')}}</div> --}}

                                </div>

                                {{-- created by --}}

                                <div>
                                    <label for="created_by">Created By:</label>
                                    <select id="created_by" name="created_by">
                                        <option value="" selected disabled>Select a user</option>
                                        @foreach($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                </div>



                                <div>
                                    <label for="status">Status:</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="0"
                                            name="status">
                                        <label class="form-check-label" for="inlineCheckbox1">Active</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="1"
                                            name="status">
                                        <label class="form-check-label" for="inlineCheckbox2">Inactive</label>
                                    </div>
                                </div>


                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Add</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            @endsection