@extends('layouts.app')
@section('content')
@section('title','Parents List')




<div class="content-wrapper">
    {{-- <h3 class="card-title">@include('message')</h3> --}}
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Parent students List (Total : {{$getRecord->total()}})</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>


    <div class="card">
        <div class="card-header">
            <div class="card-title">
                Search Student
            </div>
        </div>
        <!-- form start -->
        <form action="" method="get">
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-sm-3">
                        <label for="">Student ID</label>
                        <input type="text" name="id" value="{{Request::get('id')}}" class="form-control" id=""
                            placeholder="Enter student id">
                    </div>
                    <div class="form-group col-sm-3">
                        <label for="">Name</label>
                        <input type="text" name="name" value="{{Request::get('name')}}" class="form-control" id=""
                            placeholder="Enter name">
                    </div>

                    <div class="form-group col-sm-3">
                        <label for="">Last name</label>
                        <input type="text" name="last_name" value="{{Request::get('last_name')}}" class="form-control"
                            id="" placeholder="Enter last name">
                    </div>

                    <div class="form-group col-sm-3">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="text" name="email" value="{{Request::get('email')}}" class="form-control"
                            id="exampleInputEmail1" placeholder="Enter email">
                    </div>

                    <div class="form-group col-sm-3">
                        <button class="btn btn-primary" type="submit" style="margin-top: 30px">Search</button>
                        <a href="{{ route('parent-myStudent', encrypt($parent_id)) }}" class="btn btn-success"
                            style="margin-top: 30px">Reset</a>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </form>
    </div>
    @include('message')
    {{-- add end --}}
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title">
                                            Student List
                                        </div>

                                        <div class="card-tools">
                                            <h3 style="color: rgba(39, 6, 82)">{{"Page :".$getRecord->count()}}</h3>
                                        </div>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body table-responsive p-0">
                                        <table class="table table-hover text-nowrap">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Created_at</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                    {{-- {{ $users->links() }} --}}
                                    <div style="padding: 10px; float:right;">
                                        {!!
                                        //
                                        //
                                        $getRecord->appends(\Illuminate\Support\Facades\Request::except('page'))->links()
                                        !!}
                                    </div>
                                </div>
                                <!-- /.card -->

                                {{-- new list parnet studnen--}}
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title">
                                            Parent school List
                                        </div>

                                        <div class="card-tools">
                                            <h3 style="color: rgba(39, 6, 82)">{{"Page :".$getRecord->count()}}</h3>
                                        </div>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body table-responsive p-0">
                                        <table class="table table-hover text-nowrap">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Name</th>
                                                    <th>Last Name</th>
                                                    <th>Email</th>
                                                    <th>Gender</th>
                                                    <th>Phone</th>
                                                    <th>Occupation</th>
                                                    <th>Address</th>
                                                    <th>Status</th>
                                                    <th>Created_at</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                    {{-- {{ $users->links() }} --}}
                                    <div style="padding: 10px; float:right;">
                                        {!!
                                        //
                                        //
                                        $getRecord->appends(\Illuminate\Support\Facades\Request::except('page'))->links()
                                        !!}
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div><!-- /.container-fluid -->

                </div>
            </div>
    </section>
    <!-- /.content -->
</div>





@endsection