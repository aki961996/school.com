@extends('layouts.app')
@section('content')
@section('title','List')

<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Change Password</h1>
                </div>

                {{-- <div class="col-sm-6" style="text-align: right">
                    <a href="{{route('class-list')}}" class="btn btn-primary">Back</a>
                </div> --}}

            </div>
        </div>
    </section>
    @include('message')
    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12">

                    <div class="card card-primary">
                        <!-- form start -->
                        <form action="" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for=""> Old Password</label>
                                    <input type="password" name="old_password"  value="" class="form-control"
                                        id="" placeholder="Enter Password">
                                    <div style="color: red">{{$errors->first('old_password')}}</div>

                                </div>

                                <div class="form-group">
                                    <label for="">New Password</label>
                                    <input type="password" name="new_password"  value="" class="form-control"
                                        id="" placeholder="Enter New Password">
                                    <div style="color: red">{{$errors->first('new_password')}}</div>

                                </div>

                                {{-- <div class="form-group">
                                    <label>status</label>
                                    <select class="form-control" name="status">
                                        <option value="0">Active</option>
                                        <option value="1">Inactive</option>
                                    </select>

                                </div> --}}


                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary btn-sm">Change Password</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection