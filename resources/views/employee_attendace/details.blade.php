@extends('layouts.master')
@section('content')
	
 <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Student Manage</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Student List</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

     <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">


            <div class="card card-primary card-outline">
              <div class="card-body">

              
                <h5 class="card-title">User List</h5>
                <br><br>

                  <a href="{{route('emaployee.attendnace')}}" class="btn btn-info fa fa-plus float-sm-right">Attendance List</a>
                <br>
                <br>
               
                  <table id="example1" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>#SL</th>
                          <th>Name</th>
                          <th>ID No.</th>
                        
                          <th>Date</th>
                          <th>Status</th>
                         
                     
                        </tr>
                      </thead>
                      <tbody>
                        @if($attendances)
                          @foreach($attendances as $key => $attendance)
                          <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$attendance->user->name}}</td>
                            <td>{{$attendance->user->id_no}}</td>
                           
                            <td>{{$attendance->date}}</td>
                            <td>{{$attendance->attendance_status}}</td>
                            
                        
                          </tr>
                          @endforeach
                        @endif
                      </tbody>
                 
                  </table>
                
                 
                
              </div>
            </div><!-- /.card -->
          </div>
        
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

@endsection