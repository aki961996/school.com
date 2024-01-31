@extends('layouts.app')
@section('content')
@section('title','List')
<div class="content-wrapper">

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
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12">

                    <div class="card card-primary">
                        <!-- form start -->
                        <form action="{{ route('store') }}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" name="name" value="" class="form-control" id=""
                                        placeholder="Enter name">
                                    <div style="color: red">{{$errors->first('name')}}</div>

                                </div>

                                <div class="form-group">
                                    <label>status</label>
                                    <select class="form-control" name="status">
                                        <option value="0">Active</option>
                                        <option value="1">Inactive</option>
                                    </select>

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