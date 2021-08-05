@extends('layouts.master')
@section('content')
	
 <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Employee Salary Manage</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Salary List</li>
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

              
                <h5 class="card-title">Salary Details of <strong>{{$employee->name}}</strong></h5>
                <a href="{{route('emaployee.salary')}}" class="float-right btn btn-sm btn-info"> Employee Salary List</a>
                <br><br>

                  
                <br>
                <br>
               
                  <table class="table table-bordered table-striped">
                      <thead>
                        <tr>
                       
                          <th>Previous Salary</th>
                          <th>Present Salary</th>
                          <th>Increment Salary</th>
                          <th>Effective Date</th>
                        </tr>
                      </thead>
                      <tbody>
                        @if($employee_salary)
                          @foreach($employee_salary as $key => $employee_s)
                          <tr>
                            @if($key==0)
                            <td class="text-center" colspan="5"><strong>Joining Salary:</strong>{{$employee_s->present_salary}}</td>
                            @else
                            <td>{{$employee_s->previous_salary}}</td>
                            <td>{{$employee_s->present_salary}}</td>
                            <td>{{$employee_s->increment_salary}}</td>
                            <td>{{$employee_s->effective_date}}</td>
                            @endif

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