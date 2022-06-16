@extends('backend.system.layouts.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Courses</h1>
          </div>
          
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Courses</li>
            </ol>
          </div>
        </div>
        <div class="col-sm-3">
          <a href="{{route('admin.courses.create')}}" class="btn btn-block btn-success">New Course</a>
          </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Total Courses</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Views</th>
                    <th>Category</th>
                    <th>User</th>
                    <th>Description</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($courses as $course)
                  <tr>
                    <td>{{$course->en_name}}</td>
                    <td>{{$course->status == 1 ? 'Active' : 'Inactive'}}</td>
                    <td>{{$course->views}}</td>
                    <td>{{$course->category_id}}</td>
                    <td>{{$course->user_id}}</td>
                    <td>{{$course->description}}</td>
                    <td>
                      <a href="{{route('admin.courses.edit',$course->id)}}">
                      Edit 
                      </a>
                      
                      | 
                      <a href="{{route('admin.courses.destroy',$course->id)}}">
                      Delete 
                      </a>
                      </td>
                  </tr>
                  @endforeach               
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
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