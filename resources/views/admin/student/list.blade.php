@extends('layouts.app')
@section('content')
@section('title','List')



<div class="content-wrapper">
    {{-- <h5 class="card-title">@include('message')</h5> --}}
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Student List (Total : {{$getRecord->total()}})</h1>
                </div>

                <div class="col-sm-6" style="text-align: right">
                    <a href="{{route('student-add')}}" class="btn btn-primary">Add new Student</a>
                </div>

            </div>
        </div><!-- /.container-fluid -->
    </section>





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
                                                    <th>Image</th>
                                                    <th> Name</th>
                                                    <th>Last Name</th>
                                                    <th> Email</th>
                                                    <th>Class Name</th>
                                                    <th>Admission Number</th>
                                                    <th>Roll Number </th>
                                                    <th>Gender </th>
                                                    <th>Date Of Birth</th>
                                                    <th>Caste</th>
                                                    <th>Religion</th>
                                                    <th>Phone</th>
                                                    <th>Admission Date</th>
                                                    <th>Blood Group</th>
                                                    <th>Height</th>
                                                    <th>Weight</th>
                                                    <th>Status</th>
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

                                                    <td>
                                                        <img src="{{asset('storage/images/' . $data->profile_pic)}}"
                                                            alt="" style="width:100px;">
                                                    </td>
                                                    <td>{{$data->name}}</td>
                                                    <td>{{$data->last_name}}</td>
                                                    <td>{{$data->email}}</td>
                                                    <td>{{$data->class_model_name}}</td>
                                                    <td>{{$data->admission_number}}</td>
                                                    <td>{{$data->roll_number}}</td>
                                                    <td>{{$data->gender}}</td>
                                                    <td>{{$data->date_of_birth_formated}}</td>
                                                    <td>{{$data->caste}}</td>
                                                    <td>{{$data->religion}}</td>
                                                    <td>{{$data->mobile_number}}</td>
                                                    <td>{{$data->admission_date_formated}}</td>
                                                    <td>{{$data->blood_group}}</td>
                                                    <td>{{$data->height}}</td>
                                                    <td>{{$data->weight}}</td>
                                                    <td>{{$data->status_text}}</td>

                                                    {{-- <td>{{$data->created_by_name}}</td> --}}
                                                    <td>{{$data->created_at_formated}}</td>
                                                    <td><a href="{{route('student-edit', encrypt($data->id))}}"
                                                            class="btn btn-outline-primary  btn-sm ">Edit</a>
                                                    </td>

                                                    <td><a href="{{route('student-destroy', encrypt($data->id))}}"
                                                            class="btn btn-outline-danger btn-sm delete-data">Delete</a>
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