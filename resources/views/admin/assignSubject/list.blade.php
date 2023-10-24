@extends('layouts.app')
@section('content')
@section('title','List')



<div class="content-wrapper">
    <h3 class="card-title">@include('message')</h3>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Assign Subject List (Total : {{$users->total()}})</h1>
                </div>

                <div class="col-sm-6 " style="text-align: right">
                    <a href="{{route('assign-subject-add')}}" id="AddNewAdmin" class="btn btn-primary">Add new Assign
                        Subject</a>
                </div>

            </div>
        </div><!-- /.container-fluid -->
    </section>

    {{-- add --}}

    <!-- general form elements -->
    <div class="card">
        <div class="card-header">
            <div class="card-title">
                Search Assign Subject List
            </div>
        </div>

        <!-- /.card-header -->
        <!-- form start -->
        <form action="" method="get">


            <div class="card-body">
                <div class="row">


                    <div class="form-group col-sm-3">
                        <label for="">Name</label>
                        <input type="text" name="name" value="{{Request::get('name')}}" class="form-control" id=""
                            placeholder="Enter name">


                    </div>
                    <div class="form-group col-sm-3">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="text" name="email" value="{{Request::get('email')}}" class="form-control"
                            id="exampleInputEmail1" placeholder="Enter email">


                    </div>
                    <div class="form-group col-sm-3">
                        <label for="exampleInputEmail1">Date</label>
                        <input type="date" name="date" value="{{Request::get('date')}}" class="form-control" id=""
                            placeholder="Enter date">

                    </div>

                    <div class="form-group col-sm-3">

                        <button class="btn btn-primary" type="submit" style="margin-top: 30px">Search</button>

                        <a href="{{route('assign-subject-list')}}" class="btn btn-success"
                            style="margin-top: 30px">Reset</a>
                    </div>
                </div>



            </div>
            <!-- /.card-body -->


        </form>
    </div>


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
                                            Assign Subject

                                        </div>

                                        <div class="card-tools">
                                            <h3 style="color: rgba(39, 6, 82)">{{"Page :".$users->count()}}</h3>
                                        </div>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body table-responsive p-0">
                                        <table class="table table-hover text-nowrap">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Class name</th>
                                                    <th>Subject Name</th>
                                                    <th>Status</th>
                                                    <th>Created By</th>
                                                    <th>Created_at</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($users as $classandsubjectdata)
                                                <tr>
                                                    {{-- <th scope="row">{{$client->firstItem() + $loop->index}}</th>
                                                    --}}
                                                    <td>{{$users->firstItem() + $loop->index}}</td>
                                                    <td>{{$classandsubjectdata->class_id}}</td>
                                                    <td>{{$classandsubjectdata->subject_id}}</td>
                                                    <td>{{$classandsubjectdata->status_text}}</td>
                                                    <td>{{$classandsubjectdata->created_by_name}}</td>
                                                    <td>{{$classandsubjectdata->created_at_formated}}</td>
                                                    <td><a href="{{route('edit', encrypt($classandsubjectdata->id))}}"
                                                            class="btn btn-primary">Edit</a>
                                                    </td>
                                                    <td><a href="{{route('delete',encrypt($classandsubjectdata->id))}}"
                                                            class="btn btn-danger">Delete</a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                    {{-- {{ $users->links() }} --}}
                                    <div style="padding: 10px; float:right;">
                                        {!!
                                        $users->appends(\Illuminate\Support\Facades\Request::except('page'))->links()
                                        !!}
                                    </div>


                                </div>
                                <!-- /.card -->
                            </div>
                        </div>

                    </div><!-- /.container-fluid -->
                </div>
            </div>
    </section>
    <!-- /.content -->
</div>


@endsection