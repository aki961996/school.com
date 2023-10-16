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
                        <label for="">Name</label>
                        <input type="text" name="name" value="{{Request::get('name')}}" class="form-control" id=""
                            placeholder="Enter name">
                    </div>

                    {{-- created by --}}
                    <div>
                        <label for="created_by">Created By:</label>
                        <select id="created_by" name="created_by">
                            <option value="" selected disabled>Select a admin</option>
                            @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    {{-- status --}}
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
                    {{-- date --}}
                    <div class="form-group col-sm-3">
                        <label for="exampleInputEmail1">Date</label>
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
                                                    <th>Name</th>
                                                    <th>Status</th>
                                                    <th>Created_by</th>
                                                    <th>Created_at</th>
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