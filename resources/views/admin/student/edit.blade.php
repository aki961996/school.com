@extends('layouts.app')
@section('content')
@section('title','List')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Student </h1>
                </div>

                <div class="col-sm-6" style="text-align: right">
                    <a href="{{route('student-list')}}" class="btn btn-primary">Back</a>
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
                        <form action="{{route('student-update')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">

                                    <input type="hidden" id="hiddenField" name="id" value="{{$datas->id}}">

                                    <div class="form-group col-md-6">
                                        <label for="">First Name <span style="color: red;">*</span></label>
                                        <input type="text" name="name" value="{{old('name', $datas->name)}}"
                                            class="form-control" id="" placeholder="Enter Firts name">
                                        <div style="color: red">{{$errors->first('name')}}</div>

                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Last Name <span style="color: red;">*</span></label>
                                        <input type="text" name="last_name"
                                            value="{{old('last_name', $datas->last_name)}}" class="form-control" id=""
                                            placeholder="Enter Last name">
                                        <div style="color: red">{{$errors->first('last_name')}}</div>

                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="">Admission Number <span style="color: red;">*</span></label>
                                        <input type="text" name="admission_number"
                                            value="{{old('admission_number' , $datas->admission_number)}}"
                                            class="form-control" id="" placeholder="Enter Admission Number">
                                        <div style="color: red">{{$errors->first('admission_number')}}</div>

                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Roll Number <span style="color: red;">*</span></label>
                                        <input type="text" name="roll_number"
                                            value="{{old('roll_number', $datas->roll_number)}}" class="form-control"
                                            id="" placeholder="Enter Roll Number">
                                        <div style="color: red">{{$errors->first('roll_number')}}</div>

                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="">Class <span style="color: red;">*</span></label>
                                        <select name="class_id" class="form-control">
                                            <option value="">Select Class</option>

                                            @foreach($getClass as $classData)
                                            <option {{($getRecord->class_id == $classData->id) ? 'selected' : ''}}
                                                value="{{$classData->id}}">{{$classData->name}}</option>
                                            @endforeach

                                        </select>
                                        <div style="color: red">{{$errors->first('class_id')}}</div>

                                    </div>



                                    <div class="form-group col-md-6">
                                        <label for="">Gender <span style="color: red;">*</span></label>
                                        <select name="gender" class="form-control">
                                            <option value="">Select Gender</option>
                                            <option {{ ($getRecord->gender =='Male' ) ? 'selected' :''}}
                                                value="Male">Male

                                            </option>
                                            <option {{ ($getRecord->gender == 'Female' ) ? 'selected' :''}}
                                                value="Female">
                                                Female</option>
                                            <option {{ ($getRecord->gender == 'Other' ) ? 'selected' :''}}
                                                value="Other">Other
                                            </option>

                                        </select>
                                        <div style="color: red">{{$errors->first('gender')}}</div>

                                    </div>



                                    <div class="form-group col-md-6">
                                        <label for="">Date Of Birth <span style="color: red;">*</span></label>
                                        <input type="date" name="date_of_birth"
                                            value="{{old('date_of_birth',$datas->date_of_birth)}}" class="form-control"
                                            id="">
                                        <div style="color: red">{{$errors->first('date_of_birth')}}</div>

                                    </div>


                                    <div class="form-group col-md-6">
                                        <label for="">Caste <span style="color: red;"></span></label>
                                        <input type="text" name="caste" value="{{old('caste' ,$datas->caste)}}"
                                            class="form-control" id="" placeholder="Enter Caste">
                                        <div style="color: red">{{$errors->first('caste')}}</div>

                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="">Religion <span style="color: red;"></span></label>
                                        <input type="text" name="religion" value="{{old('religion' ,$datas->religion)}}"
                                            class="form-control" id="" placeholder="Enter Religion">
                                        <div style="color: red">{{$errors->first('religion')}}</div>

                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="">Mobile Number <span style="color: red;"></span></label>
                                        <input type="text" name="mobile_number"
                                            value="{{old('mobile_number' ,$datas->mobile_number)}}" class="form-control"
                                            id="" placeholder="Enter Mobile Number">
                                        <div style="color: red">{{$errors->first('mobile_number')}}</div>

                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="">Admission Date <span style="color: red;">*</span></label>
                                        <input type="date" name="admission_date"
                                            value="{{old('admission_date' ,$datas->admission_date)}}"
                                            class="form-control" id="">
                                        <div style="color: red">{{$errors->first('admission_date')}}</div>

                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="">Profile Picture <span style="color: red;"></span></label>
                                        <input type="file" name="profile_pic" class="form-control" id="">
                                        <div style="color: red">{{$errors->first('profile_pic' )}}</div>

                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="">Blood Group <span style="color: red;"></span></label>
                                        <input type="text" name="blood_group"
                                            value="{{old('blood_group',$datas->blood_group)}}" class="form-control"
                                            placeholder="Enter blood group" id="">
                                        <div style="color: red">{{$errors->first('blood_group')}}</div>

                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="">Height<span style="color: red;"></span></label>
                                        <input type="text" name="height" value="{{old('height' ,$datas->height)}}"
                                            class="form-control" placeholder="Enter height" id="">
                                        <div style="color: red">{{$errors->first('height')}}</div>

                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">weight <span style="color: red;"></span></label>
                                        <input type="text" name="weight" value="{{old('weight' ,$datas->weight)}}"
                                            class="form-control" placeholder="Enter weight" id="">
                                        <div style="color: red">{{$errors->first('weight')}}</div>

                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="">Status <span style="color: red;">*</span></label>
                                        <select name="status" class="form-control">
                                            <option value="">Select Status</option>
                                            <option {{($getRecord->status == 0) ? 'selected' : ''}}
                                                value="0">Active</option>
                                            <option {{($getRecord->status == 1) ? 'selected' : ''}}
                                                value="0">Active</option>


                                        </select>
                                        <div style="color: red">{{$errors->first('status')}}</div>

                                    </div>



                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address <span
                                            style="color: red;">*</span></label>
                                    <input type="email" name="email" value="{{old('email',$datas->email)}}"
                                        class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                                    <div style="color: red">{{$errors->first('email')}}</div>

                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password <span
                                            style="color: red;">*</span></label>
                                    <input type="password"  value="{{old('email',$datas->password)}}" name="password" class="form-control"
                                        id="exampleInputPassword1" placeholder="Password">
                                </div>




                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            @endsection