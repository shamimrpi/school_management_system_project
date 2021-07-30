@extends('layouts.master')
@section('content')
  
  <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Salary Encrement Manage</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Salary Encrement</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

     <div class="content">
      <div class="container-fluid">
     
   
          

            <div class="card card-primary card-outline">
              <div class="card-body">
                <h5 class="card-title">Salary Encrement</h5>
               
                <form action="{{route('employee.salary.store',$employee_salary->id)}}" method="POST" enctype="multipart/form-data">
                  @csrf
                
                  @method('PUT')
                
                <div class="card-body">
                   <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Increment Salary</label>
                            <input type="text" name="increment_salary" class="form-control form-control-sm" id="salary_increment" placeholder="Enter Increment Salary">
                            @if($errors->has('salary_increment'))
                            <span class="text-danger">{{$errors->first('name')}}</span>
                            @endif
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Effective Date</label>
                            <input type="date" name="effective_date" class="form-control form-control-sm" id="effective_date" placeholder="Enter Fee Category name">
                            @if($errors->has('name'))
                            <span class="text-danger">{{$errors->first('effective_date')}}</span>
                            @endif
                          </div>
                        </div>
                         <div class="col-md-4">
                          <div class="form-group">
                            
                              <button type="submit" class="btn btn-primary fa fa-save" style="margin-top: 30px"> Save</button>
                          
                          </div>
                        </div>
                      </div>

                        
                    
                </form>
                <div>

              </div>
            </div><!-- /.card -->
          </div>
        
          <!-- /.col-md-6 -->
      
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    

@endsection