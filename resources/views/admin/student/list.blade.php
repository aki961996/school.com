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

    {{-- filtering form --}}
    <div class="card">
        <div class="card-header">
            <div class="card-title">
                Search Student List
            </div>
        </div>

        <!-- /.card-header -->
        <!-- form start -->
        <form action="" method="get">
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-sm-2">
                        <label for="">Name</label>
                        <input type="text" name="name" value="{{Request::get('name')}}" class="form-control" id=""
                            placeholder="Enter name">


                    </div>
                    <div class="form-group col-sm-2">
                        <label for="">Last Name</label>
                        <input type="text" name="last_name" value="{{Request::get('last_name')}}" class="form-control"
                            id="" placeholder="Enter Last Name">
                    </div>

                    <div class="form-group col-sm-2">
                        <label for="">Admission Number</label>
                        <input type="text" name="admission_number" value="{{Request::get('admission_number')}}"
                            class="form-control" id="" placeholder="Enter Admission Number">
                    </div>

                    <div class="form-group col-sm-2">
                        <label for="">Roll Number</label>
                        <input type="text" name="roll_number" value="{{Request::get('roll_number')}}"
                            class="form-control" id="" placeholder="Enter Roll Number">
                    </div>

                    <div class="form-group col-sm-2">
                        <label for="">Class</label>
                        <input type="text" name="class" value="{{Request::get('class')}}" class="form-control" id=""
                            placeholder="Enter class">
                    </div>

                    <div class="form-group col-sm-2">
                        <label for="">Gender</label>
                        <select name="gender" class="form-control">
                            <option value="">Select Gender</option>
                            <option {{ (Request::get('gender')=='Male' ) ? 'selected' :''}} value="Male">Male

                            </option>
                            <option {{ (Request::get('gender')=='Female' ) ? 'selected' :''}} value="Female">
                                Female</option>
                            <option {{ (Request::get('gender')=='Other' ) ? 'selected' :''}} value="Other">Other
                            </option>

                        </select>

                    </div>

                    <div class="form-group col-sm-2">
                        <label for="">Caste</label>
                        <input type="text" name="caste" value="{{Request::get('caste')}}" class="form-control" id=""
                            placeholder="Enter caste">
                    </div>

                    <div class="form-group col-sm-2">
                        <label for="">Religion</label>
                        <input type="text" name="religion" value="{{Request::get('religion')}}" class="form-control"
                            id="" placeholder="Enter Religion">
                    </div>
                    <div class="form-group col-sm-2">
                        <label for="">Phone</label>
                        <input type="text" name="mobile_number" value="{{Request::get('mobile_number')}}"
                            class="form-control" id="" placeholder="Enter Phone">
                    </div>




                    <div class="form-group col-sm-2">
                        <label for="">Email address</label>
                        <input type="text" name="email" value="{{Request::get('email')}}" class="form-control"
                            id="exampleInputEmail1" placeholder="Enter email">


                    </div>
                    <div class="form-group col-sm-2">
                        <label for="">Admission Date</label>
                        <input type="date" name="admission_date" value="{{Request::get('admission_date')}}"
                            class="form-control" id="" placeholder="Enter date">
                    </div>

                    <div class="form-group col-sm-2">
                        <label for="">Blood Group</label>
                        <input type="text" name="blood_group" value="{{Request::get('blood_group')}}"
                            class="form-control" id="" placeholder="Enter blood group">
                    </div>

                    <div class="form-group col-sm-2">
                        <label for="">Status</label>

                        <select name="status" class="form-control">
                            <option value="">Select Status</option>
                            <option {{(Request::get('status')==100) ? 'Selected' : '' }} value="100">Active</option>
                            <option {{(Request::get('status')==1) ? 'Selected' : '' }} value="1">Inactive</option>

                        </select>
                    </div>

                    <div class="form-group col-sm-2">
                        <label for="exampleInputEmail1">Created date</label>
                        <input type="date" name="date" value="{{Request::get('date')}}" class="form-control" id=""
                            placeholder="Enter date">
                    </div>
                    <div class="form-group col-sm-3">

                        <button class="btn btn-primary" type="submit" style="margin-top: 30px">Search</button>
                        <a href="{{route('student-list')}}" class="btn btn-success" style="margin-top: 30px">Reset</a>
                    </div>
                </div>



            </div>
            <!-- /.card-body -->


        </form>
    </div>

    {{-- end form --}}





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
                                                    <td>{{$data->class_models_name}}</td>
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