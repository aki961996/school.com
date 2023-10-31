@extends('layouts.app')
@section('content')
@section('title','List')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Assign Subject</h1>
                </div>

                <div class="col-sm-6" style="text-align: right">
                    <a href="{{route('assign-subject-list')}}" class="btn btn-primary">Back</a>
                </div>

            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12">

                    <div class="card card-primary">


                        <!-- form start -->
                        <form action="{{route('assign-subject-update')}}" method="post">
                            @csrf
                            <div class="card-body">




                                <div class="form-group">
                                    <label>Class Name</label>
                                    <select class="form-control" name="class_id">
                                        <option value="">Select Class</option>
                                        @foreach($getClass as $ClassDataShow)
                                        <option {{($getRecord->class_id == $ClassDataShow->id) ? 'selected' : ''}}
                                            value="{{$ClassDataShow->id}}">{{$ClassDataShow->name}}</option>
                                        @endforeach
                                    </select>

                                </div>


                                <div class="form-group">
                                    <label>Subject Name</label>
                                    @foreach($getSubject as $SubjectDataShow)
                                    @php
                                    $checked = '';

                                    @endphp

                                    @foreach($getAssignSubjectId as $subjectAssign)

                                    @if($subjectAssign->subject_id == $SubjectDataShow->id )
                                    @php
                                    $checked = 'checked';

                                    @endphp

                                    @endif


                                    @endforeach

                                    <div>
                                        <label>
                                            <input {{$checked}} type="checkbox" name="subject_id[]"
                                                value="{{$SubjectDataShow->id}}">
                                            {{$SubjectDataShow->name}}
                                        </label>
                                    </div>
                                    @endforeach
                                </div>


                                <div class="form-group">
                                    <label>status</label>
                                    <select class="form-control" name="status">
                                        <option {{($getRecord->status == 0) ? 'selected' : ''}}
                                            value="0">Active</option>
                                        <option {{($getRecord->status == 1) ? 'selected' : ''}}
                                            value="1">Inactive</option>
                                    </select>

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