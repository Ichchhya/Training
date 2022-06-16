@extends('backend.system.layouts.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Update User</h1>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item "><a href="{{route('admin.users.index')}}">Users</a></li>
                        <li class="breadcrumb-item active">Update User</li>
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
                        <form method="POST" action="{{route('admin.users.update',$user->id)}}">
                            @csrf
                            <div class="card-body">
                            <input type="hidden" name="_method" value="PUT">
                                <div class="form-group">
                                    <label for="en_name">English Name</label>
                                    <input type="text" class="form-control"  name="en_name" value="{{$user->en_name}}" id="en_name" placeholder="Enter English name">
                                </div>
                                <div class="form-group">
                                    <label for="np_name">Nepali Name</label>
                                    <input type="text" class="form-control" name="np_name" value="{{$user->np_name}}" id="np_name" placeholder="Enter Nepali name">
                                </div>
                                <div class="form-group">
                                    <label for="gender">Gender</label>
                                    <input type="text" class="form-control" name="gender" value="{{$user->gender}}" id="gender" placeholder="Enter gender">
                                </div>
                                <div class="form-group">
                                    <label for="designation">Designation</label>
                                    <input type="text" class="form-control" name="designation" value="{{$user->designation}}" id="designation" placeholder="Enter designation">
                                </div>
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="text" class="form-control" name="address" value="{{$user->address}}" id="address" placeholder="Enter address">
                                </div>
                                <div class="form-group">
                                    <label for="contact_number">Contact Number</label>
                                    <input type="text" class="form-control" name="contact_number" value="{{$user->contact_number}}" id="contact_number" placeholder="Enter contact number">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email address</label>
                                    <input type="email" class="form-control" name="email" id="email" value="{{$user->email}}" placeholder="Enter email">
                                </div>
                                
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" name="password" value="{{$user->email}}" id="password" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Profile Image</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="exampleInputFile">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
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