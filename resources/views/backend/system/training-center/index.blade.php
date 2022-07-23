@extends('backend.system.layouts.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Training Centers</h1>
          </div>
          
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Training Centers</li>
            </ol>
          </div>
        </div>
        <div class="col-sm-3">
          <a href="{{route('admin.training-centers.create')}}" class="btn btn-block btn-success">New Training Center</a>
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
                <h3 class="card-title">Total Training Centers</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>company Logo</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Contact Number</th>
                    <th>Email Address</th>
                    <th>Website URL</th>
                    <th>User</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($training_centers as $center)
                  <tr>
                    <td>Company Logo</td>
                    <td>{{$center->en_name}}</td>
                    <td>{{$center->address}}</td>
                    <td>{{$center->contact_number}}</td>
                    <td>{{$center->email}}</td>
                    <td>{{$center->website_url}}</td>
                    <td>{{$center->user->en_name}}</td>
                    <td>
                      <a href="{{route('admin.training-centers.edit',$center->id)}}">
                      Edit 
                      </a>
                      
                      | 
                      <a href="{{route('admin.training-centers.destroy',$center->id)}}">
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