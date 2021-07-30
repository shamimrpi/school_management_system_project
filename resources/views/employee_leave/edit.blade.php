@extends('layouts.master')
@section('content')
  
  <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Leave Edit Manage</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Edit Leave</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

     <div class="content">
      <div class="container-fluid">
     
   
          

            <div class="card card-primary card-outline">
              <div class="card-body">
                <h5 class="card-title">Edit Leave</h5>
                <a class="btn btn-info btn-sm float-sm-right" href="{{route('emaployee.all')}}">Employee Leave</a>
                <br>
                <form action="{{route('emaployee.leave.update',$leave->id)}}" method="POST">
                  @csrf
                
                  @method('PUT')
                
                      <div class="card-body">
                       <div class="row">
                            <div class="col-md-3">
                              <div class="form-group">
                                <label for="exampleInputEmail1">Employee Name</label>
                                <select class="form-control form-control-sm" name="employee_id">
                                  <option>Select Employee</option>
                                  @foreach($employees as $employee)
                                  <option value="{{$employee->id}}" {{(@$leave->user['id'] == $employee->id)?'selected':''}}>{{$employee->name}}</option>
                                  @endforeach
                                </select>
                                @if($errors->has('name'))
                                <span class="text-danger">{{$errors->first('name')}}</span>
                                @endif
                              </div>
                            </div>
                            
                            <div class="col-md-3">
                              <div class="form-group">
                                <label for="exampleInputEmail1">Start Date</label>
                                <input type="date" name="start_date" class="form-control form-control-sm" placeholder="Enter Fee Category name" value="{{$leave->start_date}}" required="1">
                                @if($errors->has('start_date'))
                                <span class="text-danger">{{$errors->first('start_date')}}</span>
                                @endif
                              </div>
                            </div>

                              <div class="col-md-3">
                              <div class="form-group">
                                <label for="exampleInputEmail1">End Date</label>
                                <input type="date" name="end_date" class="form-control form-control-sm" value="{{$leave->end_date}}" required="1">
                                @if($errors->has('start_date'))
                                <span class="text-danger">{{$errors->first('start_date')}}</span>
                                @endif
                              </div>
                            </div>
                            <div class="col-md-3">
                              <div class="form-group">
                                <label for="exampleInputEmail1">Leave Purpose</label>
                                <select class="form-control form-control-sm" name="leave_purpose_id" required="1">
                                  <option>Select Leave Purpose</option>
                                  @foreach($leave_purposes as $leave_purpose)
                                  <option value="{{$leave_purpose->id}}" {{(@$leave->id == $leave_purpose->id)?'selected':''}}{{$leave->name}}>{{$leave_purpose->name}}</option>
                                  @endforeach
                                </select>
                                @if($errors->has('name'))
                                <span class="text-danger">{{$errors->first('name')}}</span>
                                @endif
                              </div>
                            </div>

                        
                    
                        </div>
                        <div class="row"> 
                          <div class="card-footer">
                            <button type="submit" class="btn btn-primary fa fa-save"> Save</button>
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