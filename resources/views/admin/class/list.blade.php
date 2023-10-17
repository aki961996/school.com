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
                    <h1>Class List </h1>
                </div>

                <div class="col-sm-6" style="text-align: right">
                    <a href="{{route('class-add')}}" class="btn btn-primary">Add new Class</a>
                </div>

            </div>
        </div><!-- /.container-fluid -->
    </section>

    {{-- add --}}

    <!-- general form elements -->
    <div class="card">
        <div class="card-header">
            <div class="card-title">
                Search Class List
            </div>
        </div>

        <!-- /.card-header -->
        <!-- form start -->
        <form action="" method="get">
            <div class="card-body">
                <div class="row">
                    {{-- name --}}
                    <div class="form-group col-sm-3">
                        <label for="">Class Name</label>
                        <input type="text" name="name" value="{{Request::get('name')}}" class="form-control" id=""
                            placeholder="Enter name">
                    </div>

                    {{-- created by --}}
                    <div class="form-group">
                        <label for="created_by">Created By:</label>
                        <select class="form-control" id="" name="created_by">
                            <option value="">Select a admin</option>
                            @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="form-group col-sm-3">
                        <label for="exampleInputEmail1">Created date</label>
                        <input type="date" name="date" value="{{Request::get('date')}}" class="form-control" id=""
                            placeholder="Enter date">
                    </div>

                    <div class="form-group col-sm-3">
                        <button class="btn btn-primary" type="submit" style="margin-top: 30px">Search</button>
                        <a href="{{route('class-list')}}" class="btn btn-success" style="margin-top: 30px">Reset</a>
                    </div>
                </div>
            </div>
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
                                            Class List

                                        </div>


                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body table-responsive p-0">
                                        <table class="table table-hover text-nowrap">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Class Name</th>
                                                    <th>Status</th>
                                                    <th>Created by</th>
                                                    <th>Created date</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @foreach($classModel as $d)
                                                <tr>
                                                    {{-- <th scope="row">{{$client->firstItem() + $loop->index}}</th>
                                                    --}}
                                                    {{-- <td>{{$classModel->firstItem() + $loop->index}}</td> --}}
                                                    <td>{{$d->id}}</td>
                                                    <td>{{$d->name}}</td>
                                                    <td>{{$d->status_text}}</td>
                                                    <td>{{$d->created_by_text}}</td>
                                                    <td>{{$d->created_at_formated}}</td>
                                                    <td><a href="{{route('ClassEdit', encrypt($d->id))}}"
                                                            class="btn btn-primary">Edit</a>
                                                    </td>
                                                    <td><a href="{{route('classDelete',encrypt($d->id))}}"
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
                                        $classModel->appends(\Illuminate\Support\Facades\Request::except('page'))->links()
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