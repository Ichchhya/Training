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
        <button onclick="storeToken()" class="btn btn-primary mb-3">
              Allow Notification
        </button>
        <div class="col-sm-3">
          <a href="{{route('admin.users.create')}}" class="btn  btn-success">New User</a>
          </div>
          <div>
            
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

    <script src="https://www.gstatic.com/firebasejs/8.3.2/firebase.js"></script>
  <script>

var firebaseConfig = {
  apiKey: "AIzaSyDdYmnaD-evdjsUVXAEd_f2DIUE9ts00Y8",
  authDomain: "train-yourself-17ce0.firebaseapp.com",
  projectId: "train-yourself-17ce0",
  storageBucket: "train-yourself-17ce0.appspot.com",
  messagingSenderId: "143314527948",
  appId: "1:143314527948:web:63b299ee6f6ea419f88469",
  measurementId: "G-D7ERY898BN"
  };

    firebase.initializeApp(firebaseConfig);
    const messaging = firebase.messaging();
    function storeToken(){
      messaging.requestPermission()
      .then(function(){
        return messaging.getToken()
      })
      .then(function(token){
        $.ajaxSetup({
          headers : {
            'X-CSRF-TOKEN' : $('meta[name = "csrf-token"]').attr('content')
          }
        });
        $.ajax({
          'url' : '{{route("fcmToken")}}',
          'type' : 'POST',
          'data' : {
            token : token
          },
          dataType : 'JSON',
          success : function(){

            alert('Token Stored');
          },
          error : function(error){

            alert(error);
          },
        });
      }).catch(function(){

          alert(error);
        });
    }
  </script>
@endsection