@extends('layouts.master')
@section('content')
	
 <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Attendance Manage</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Attendance List List</li>
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

                <div class="cart-body">
                     <form action="{{route('student.roll.gen.store')}}" method="POST" id="myRollGenerateForm">
                        @csrf
                    
                      <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                               <label for="exampleInputEmail1">Select Employee <span style="color:red">*</span></label>
                               <select class="form-control form-control-sm" id="employee_id" name="employee_id" required="1">
                                  <option value="">Select Employee</option>
                                  @foreach($employees as $employee)
                                    <option value="{{$employee->id}}" >{{$employee->name}}</option>
                                  @endforeach
                                </select>
                                @if($errors->has('employee_id'))
                                <span class="text-danger">{{$errors->first('employee_id')}}</span>
                                @endif
                              </div>
                          </div>
                           <div class="col-md-4">
                             <div class="form-group">
                               <label for="exampleInputEmail1">Select Month <span style="color:red">*</span></label>
                               <input type="date" name="date" id="date" class="form-control form-control-sm" placeholder="Enter Month ">
                            </div>
                          </div>
                      
                        <div class="col-md-4">
                          <a id="month_attendance" name="search" class="btn btn-info btn-sm" style="margin-top: 30px">Search</a>
                        </div>
                   

                        
                      </div>
                   
                      <div class="row d-none" id="attendance-row">
                        <div class="col-md-12">

                          <table class="table table-bordered table-striped">
                            <thead>
                              <tr>
                                <th>#SL</th>
                                <th>Employee Name</th>
                                <th>Date</th>
                                 <th>Attendance Status</th>
                              </tr>
                            </thead>
                            <tbody id="attendance_row">
                              
                            </tbody>
                          </table>

                        </div>
                      </div>
                  
                      

                  </form>
                </div>
         
                <br><br>

               
                
              </div>
            </div><!-- /.card -->
          </div>
        
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

@endsection