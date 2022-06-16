@extends('backend.system.layouts.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>New Category</h1>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item "><a href="{{route('admin.categories.index')}}">Categories</a></li>
                        <li class="breadcrumb-item active">New Category</li>
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
                            <h3 class="card-title">Category Details</h3>
                        </div>
                        <form method="POST" action="{{route('admin.categories.store')}}" enctype="multipart/form-data">
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
                                    <label for="exampleInputFile">Icon</label>
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
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{ route('admin.categories.index') }}"
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