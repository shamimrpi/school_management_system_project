@extends('layouts.master')
@section('content')
	
 <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Leave Manage</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Attendance List</li>
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

              
                <h5 class="card-title">Attendance List</h5>
                <br><br>

                  <a href="{{route('emaployee.attendnace.create')}}" class="btn btn-info fa fa-plus float-sm-right"> Add Attendance</a>
                <br>
                <br>
               
                  <table id="example1" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>#SL</th>
                          
                          <th>Date</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @if($employees)
                          @foreach($employees as $key => $employee)
                          <tr>
                            <td>{{$key+1}}</td>
                          
                            <td>{{date('d-m-Y',strtotime($employee->date))}}</td>
                            
                          
                            <td>
                              <a class="btn btn-info fa fa-edit btn-sm" title="Attendance Edit" href="{{route('emaployee.attendance.edit',$employee->date)}}"></a>
                              <a class="btn btn-info fa fa-eye btn-sm" title="Attendance View" href="{{route('attendnace.details',$employee->date)}}"></a>
                              
                             
                            </td>
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