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

              
                <h5 class="card-title">Leave List</h5>
                <br><br>

                  <a href="{{route('emaployee.leave.create')}}" class="btn btn-info fa fa-plus float-sm-right"> Add Leave</a>
                <br>
                <br>
               
                  <table id="example1" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>#SL</th>
                          <th>Name</th>
                          <th>ID No.</th>
                          <th>Start Date</th>
                          <th>End Date</th>
                          <th>Leave Purpose</th>
                          <th>Active</th>
                        
                        </tr>
                      </thead>
                      <tbody>
                        @if($employees)
                          @foreach($employees as $key => $employee)
                          <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$employee['user']['name']}}</td>
                            <td>{{$employee['user']['id_no']}}</td>
                            <td>{{$employee['start_date']}}</td>
                            <td>{{$employee['end_date']}}</td>
                            <td>{{$employee['leave_purpose']['name']}}</td>
                            <td>
                              <a class="btn btn-info fa fa-plus btn-sm" title="Leave Edit" href="{{route('emaployee.leave.edit',$employee->id)}}"></a>
                              <a class="btn btn-danger fa fa-trash btn-sm" href="{{route('leave.delete',$employee->id)}}"></a>
                             
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