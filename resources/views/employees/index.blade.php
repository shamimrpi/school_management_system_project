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

                  <a href="{{route('employee.create')}}" class="btn btn-info fa fa-plus float-sm-right"> Add Employee</a>
                <br>
                <br>
               
                  <table id="example1" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>#SL</th>
                          <th>Name</th>
                          <th>Mobile</th>
                          <th>Address</th>
                          <th>Gender</th>
                          <th>Join Date</th>
                          <th>Salary</th>
                          <th>ID No.</th>
                          <th>Code</th>
                          <th>Photo</th>
                          <th style="width:60px">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @if($employees)
                          @foreach($employees as $key => $employee)
                          <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$employee->name}}</td>
                            <td>{{$employee->mobile}}</td>
                            <td>{{$employee->address}}</td>
                            <td>{{$employee->gender->name}}</td>
                            <td>{{$employee->join_date}}</td>
                            <td>{{$employee->salary}}</td>
                            <td>{{$employee->id_no}}</td>
                            <td>{{$employee->code}}</td>
                            <td>
                              <img src="{{(!empty($employee->image))?url('upload/employee_img/'.$employee->image):''}}" style="height: 100px;width: 100px">
                            </td>
                         

                            <td>
                              <a class="btn btn-info fa fa-edit btn-sm" href="{{route('employee.edit',$employee->id)}}"></a>
                              <a class="btn btn-info fa fa-eye btn-sm" href="{{route('employee.details',$employee->id)}}" target="_blank"></a>
                             
                            </td>
                          </tr>
                          @endforeach
                        @endif
                      </tbody>
                      <tfoot>
                        <tr>
                          <th>#SL</th>
                          <th>Name</th>
                          <th>Mobile</th>
                          <th>Address</th>
                          <th>Gender</th>
                          <th>Join Date</th>
                          <th>Salary</th>
                          <th>ID No.</th>
                          <th>Code</th>
                          <th>Photo</th>
                          <th>Action</th>
                        </tr>
                      </tfoot>
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