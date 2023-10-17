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
                    <h1>Subject List (Total : {{$getRecord->total()}})</h1>
                </div>

                <div class="col-sm-6" style="text-align: right">
                    <a href="{{route('subject-add')}}" class="btn btn-primary">Add new Subject</a>
                </div>

            </div>
        </div><!-- /.container-fluid -->
    </section>

    {{-- add --}}

    <!-- general form elements -->
    <div class="card">
        <div class="card-header">
            <div class="card-title">
                Search Suject List
            </div>
        </div>

        <!-- /.card-header -->
        <!-- form start -->
        <form action="" method="get">


            <div class="card-body">
                <div class="row">


                    <div class="form-group col-sm-3">
                        <label for="">Subject Name</label>
                        <input type="text" name="name" value="{{Request::get('name')}}" class="form-control" id=""
                            placeholder="Enter name">


                    </div>

                    <div class="form-group">
                        <label> Subject Type</label>
                        {{-- value 1 vann active selectil --}}
                        <select class="form-control" value="" name="type">
                            <option value="">Select
                            </option>
                            <option {{(Request::get('type')=='Theory' ) ? 'selected' : '' }} value="Theory">Theory
                            </option>
                            <option {{(Request::get('type')=='Practical' ) ? 'selected' :''}} value="Practical">
                                Practical
                            </option>


                        </select>

                    </div>

                    <div class="form-group col-sm-3">
                        <label for="exampleInputEmail1">Created Date</label>
                        <input type="date" name="date" value="{{Request::get('date')}}" class="form-control" id=""
                            placeholder="Enter date">

                    </div>

                    <div class="form-group col-sm-3">

                        <button class="btn btn-primary" type="submit" style="margin-top: 30px">Search</button>

                        <a href="{{route('subject-list')}}" class="btn btn-success" style="margin-top: 30px">Reset</a>
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
                                            Subject List

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
                                                    <th>Subject Name</th>
                                                    <th> Subject Type</th>
                                                    <th> Status</th>
                                                    <th> Created By</th>

                                                    <th>Created date</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($getRecord as $data)
                                                <tr>
                                                    {{-- <th scope="row">{{$client->firstItem() + $loop->index}}</th>
                                                    --}}
                                                    <td>{{$getRecord->firstItem() + $loop->index}}</td>
                                                    <td>{{$data->name}}</td>
                                                    <td>{{$data->type}}</td>
                                                    <td>{{$data->status_text}}</td>
                                                    <td>{{$data->created_by_name}}</td>
                                                    <td>{{$data->created_at_formated}}</td>
                                                    <td><a href="{{route('subject-edit', encrypt($data->id))}}"
                                                            class="btn btn-primary">Edit</a>
                                                    </td>
                                                    <td><a href="{{route('subject-destroy',encrypt($data->id))}}"
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
                                        $getRecord->appends(\Illuminate\Support\Facades\Request::except('page'))->links()
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