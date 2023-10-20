@extends('layouts.app')
@section('content')
@section('title','List')



<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    {{-- <h1>Image List (Total : {{$getRecord->total()}})</h1> --}}
                </div>

                <div class="col-sm-6" style="text-align: right">
                    {{-- <a href="{{route('subject-add')}}" class="btn btn-primary">Add new Subject</a> --}}
                </div>

            </div>
        </div><!-- /.container-fluid -->
    </section>

    {{-- add --}}

    <!-- general form elements -->
    <div class="card">
        <div class="card-header">
            <div class="card-title">
                image

                {{-- @foreach($image as $todos)
                <div>
                    <td class="align-middle">
                        <img style='width:100px;' src="{{ asset('storage/images/'.$todos->image) }}" alt="">
                    </td>
                </div>
                @endforeach --}}

            </div>
        </div>

        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label>image name</label>
                <input type="text" name="team_member" class="form-control">
                {{-- @error('team_member')
                <div class="alert-danger">{{$message}}</div>
                @enderror --}}
            </div>
            <div class="form-group">
                <label>Image</label>
                <input type="file" name="image" class="form-control">
                {{-- @error('image')
                <div class="alert-danger">{{$message}}</div>
                @enderror --}}
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-info btn-block">Submit</button>
                {{-- <button type="submit" class="btn btn-info btn-block">Add Data</button> --}}

            </div>
        </form>
    </div>


    {{-- add end --}}


</div>

@endsection