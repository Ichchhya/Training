@extends('backend.system.layouts.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>New User</h1>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item "><a href="{{route('admin.users.index')}}">Users</a></li>
                        <li class="breadcrumb-item active">New User</li>
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
                            <h3 class="card-title">User Details</h3>
                        </div>
                        <form method="POST" action="{{route('admin.users.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="en_name">English Name</label>
                                    <input type="text" class="form-control"  name="en_name" id="en_name" placeholder="Enter English name">
                                    @if ($errors->has('en_name'))
                                        <p style="color: red">
                                            {{ $errors->first('en_name') }}
                                        </p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="np_name">Nepali Name</label>
                                    <input type="text" class="form-control" name="np_name" id="np_name" placeholder="Enter Nepali name">
                                    @if ($errors->has('np_name'))
                                        <p style="color: red">
                                            {{ $errors->first('np_name') }}
                                        </p>
                                        @endif
                                </div>
                                <div class="form-group">
                                    <label for="gender">Gender</label>
                                    <input type="text" class="form-control" name="gender" id="gender" placeholder="Enter gender">
                                    @if ($errors->has('gender'))
                                        <p style="color: red">
                                            {{ $errors->first('gender') }}
                                        </p>
                                        @endif
                                </div>
                                <div class="form-group">
                                    <label for="designation">Designation</label>
                                    <input type="text" class="form-control" name="designation" id="designation" placeholder="Enter designation">
                                    @if ($errors->has('designation'))
                                        <p style="color: red">
                                            {{ $errors->first('designation') }}
                                        </p>
                                        @endif
                                </div>
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="text" class="form-control" name="address" id="address" placeholder="Enter address">
                                    @if ($errors->has('address'))
                                        <p style="color: red">
                                            {{ $errors->first('address') }}
                                        </p>
                                        @endif
                                </div>
                                <div class="form-group">
                                    <label for="contact_number">Contact Number</label>
                                    <input type="text" class="form-control" name="contact_number" id="contact_number" placeholder="Enter contact number">
                                    @if ($errors->has('contact_number'))
                                        <p style="color: red">
                                            {{ $errors->first('contact_number') }}
                                        </p>
                                        @endif
                                </div>
                                <div class="form-group">
                                    <label for="email">Email address</label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Enter email">
                                    @if ($errors->has('email'))
                                        <p style="color: red">
                                            {{ $errors->first('email') }}
                                        </p>
                                        @endif
                                </div>
                                
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                                    @if ($errors->has('password'))
                                        <p style="color: red">
                                            {{ $errors->first('password') }}
                                        </p>
                                        @endif
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Profile Image</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="exampleInputFile">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                            @if ($errors->has('profile_image'))
                                        <p style="color: red">
                                            {{ $errors->first('profile_image') }}
                                        </p>
                                        @endif
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Verify</label>
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{ route('admin.users.index') }}"
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