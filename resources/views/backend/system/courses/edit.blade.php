@extends('backend.system.layouts.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Update Course</h1>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item "><a href="{{route('admin.courses.index')}}">Courses</a></li>
                        <li class="breadcrumb-item active">Update Course</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Course Details</h3>
                        </div>
                        <form method="POST" action="{{route('admin.courses.update',$course->id)}}">
                            @csrf
                            <div class="card-body">
                                <input type="hidden" name="_method" value="PUT">
                                <div class="form-group">
                                    <label for="en_name">English Name</label>
                                    <input type="text" class="form-control" name="en_name" id="en_name" placeholder="Enter English name" value="{{$course->en_name}}">
                                    @if ($errors->has('en_name'))
                                    <p style="color: red">
                                        {{ $errors->first('en_name') }}
                                    </p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="np_name">Nepali Name</label>
                                    <input type="text" class="form-control" name="np_name" id="np_name" placeholder="Enter Nepali name" value="{{$course->np_name}}">
                                    @if ($errors->has('np_name'))
                                    <p style="color: red">
                                        {{ $errors->first('np_name') }}
                                    </p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select class="form-control" aria-label="Default select example" name="status">
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                    @if ($errors->has('status'))
                                    <p style="color: red">
                                        {{ $errors->first('status') }}
                                    </p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="user_id">User</label>
                                    <div>
                                        <select class="form-control" aria-label="Default select example" name="user_id">
                                            <option selected value="">Select a user</option>
                                            @foreach ($users as $user)
                                            <option value="{{ $user->id }}" {{$user->id == $course->user_id ? 'selected' : ''}}>{{ $user->en_name }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('user_id'))
                                        <p style="color: red">
                                            {{ $errors->first('user_id') }}
                                        </p>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="role">Category</label>
                                    <div>
                                        <select class="form-control" aria-label="Default select example" name="category_id">
                                            <option selected value="">Select a category</option>
                                            @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" 
                                            {{$category->id == $course->category_id ? 'selected' : ''}}>
                                            {{ $category->en_name }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('category_id'))
                                        <p style="color: red">
                                            {{ $errors->first('category_id') }}
                                        </p>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <input type="text" class="form-control" name="description" id="description" placeholder="Enter description" value="{{$course->description}}">
                                    @if ($errors->has('description'))
                                    <p style="color: red">
                                        {{ $errors->first('description') }}
                                    </p>
                                    @endif
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{ route('admin.courses.index') }}"
                                class="btn btn-danger">Cancel</a>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->


                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection