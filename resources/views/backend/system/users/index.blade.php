@extends('backend.system.layouts.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Users</h1>
          </div>
          
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Users</li>
            </ol>
          </div>
        </div>
        <div class="col-sm-3">
          <a href="{{route('admin.users.create')}}" class="btn btn-block btn-success">New User</a>
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
                <h3 class="card-title">Total Users</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>Designation</th>
                    <th>Contact Number</th>
                    <th>Email</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($users as $user)
                  <tr>
                    <td>{{$user->en_name}}</td>
                    <td>{{$user->gender}}</td>
                    <td>{{$user->designation}}</td>
                    <td>{{$user->contact_number}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                      <a href="{{route('admin.users.edit',$user->id)}}">
                      Edit 
                      </a>
                      
                      | 
                      <a href="{{route('admin.users.destroy',$user->id)}}">
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