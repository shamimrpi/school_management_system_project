@extends('layouts.master')
@section('content')
  
  <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Create Attendance</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Create Attendance</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

     <div class="content">
      <div class="container-fluid">
     
   
          

            <div class="card card-primary card-outline">
              <div class="card-body">
                <h5 class="card-title">Create Attendance</h5>
                <a class="btn btn-info btn-sm float-sm-right" href="{{route('emaployee.attendnace')}}">Attendance list</a>
                <br>
                <form action="{{route('emaployee.attendnace.store')}}" method="POST">
                  @csrf
                
                  @method('POST')
                
                      <div class="card-body">
                       <div class="row">
                         <div class="col-md-3">
                              <div class="form-group">
                                <label for="exampleInputEmail1">Attendance Date</label>
                                <input type="date" name="date" class="form-control form-control-sm" required="1" >
                                @if($errors->has('start_date'))
                                <span class="text-danger">{{$errors->first('start_date')}}</span>
                                @endif
                              </div>
                            </div>
                          </div>
                            
                            <table class="table table-bordered table-striped dt-responsive">
                                <thead>
                                  <tr>
                                    <th>#SL</th>
                                    <th>Name</th>
                                    <th>ID No.</th>
                                    <th style="width:25%;text-align: center;" colspan="4">Attendance Status</th>

                                  </tr>
                                   <tr >

                                    <th colspan="3"></th>
                                    <th>Absent</th>
                                    <th>Present</th>
                                    <th>Leave</th>
                                  </tr>
                              
                                </thead>
                                <tbody>
                                  @foreach($employees as $key=> $employee)
                                  <tr>
                                    <td>{{$key+1}}
                                      <input type="hidden" name="employee_id[]" value="{{$employee->id}}">
                                    </td>
                                    <td>{{$employee->name}}</td>
                                    <td>{{$employee->id_no}}</td>
                                     
                                    <td><input type="radio" class="btn btn-info" name="attendance_status{{$key}}" value="Present" checked="checked" />Present</td>
                                    <td><input type="radio" class="btn btn-info" name="attendance_status{{$key}}" value="Absent"  />Absent</td>
                                    <td><input type="radio" class="btn btn-info" name="attendance_status{{$key}}" value="Leave"  />Leave</td>
                                  </tr>
                                  @endforeach
                                </tbody>
                            </table>
                            <br/>
                            <div class="row"> 
                              <div class="col-md-3">
                                <button type="submit" class="btn btn-primary fa fa-save"> Save</button>
                              </div>
                            </div>
                        </div>
                      
                      </div>
                </form>
                </div>
             
              </div><!-- /.card -->
          
        
          <!-- /.col-md-6 -->
      
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    

@endsection