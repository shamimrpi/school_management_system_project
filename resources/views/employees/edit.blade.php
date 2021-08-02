@extends('layouts.master')
@section('content')
  
  <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Employee Info</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Edit Employee </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

     <div class="content">
      <div class="container-fluid">
     
   
          

            <div class="card card-primary card-outline">
              <div class="card-body">
                <h5 class="card-title">Edit Employee</h5>
                <a class="btn btn-info btn-sm float-sm-right" href="{{route('emaployee.all')}}">Employee list</a>
                <br>
                <form action="{{route('employee.update',$employee->id)}}" id="studentForm" method="POST" enctype="multipart/form-data">
                  @csrf
                
                  @method('PUT')
                
                <div class="card-body">
                   <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Employee Name</label>
                            <input type="text" name="name" class="form-control form-control-sm" id="name" placeholder="Enter Fee Category name" value="{{$employee->name}}">
                          
                          </div>
                        </div>

                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Father Name</label>
                            <input type="text" name="f_name" class="form-control form-control-sm" id="f_name" placeholder="Enter Father Name" value="{{$employee->f_name}}">
                           
                          </div>
                        </div>

                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Mother Name</label>
                            <input type="text" name="m_name" class="form-control form-control-sm" id="m_name" placeholder="Enter Mother Name" value="{{$employee->m_name}}">
                            @if($errors->has('name'))
                            <span class="text-danger">{{$errors->first('name')}}</span>
                            @endif
                          </div>
                        </div>

                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Mobile</label>
                            <input type="text" name="mobile" class="form-control form-control-sm" id="mobile" placeholder="Enter Mobile Number" value="{{$employee->mobile}}">
                            @if($errors->has('name'))
                            <span class="text-danger">{{$errors->first('name')}}</span>
                            @endif
                          </div>
                        </div>

                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Address</label>
                            <input type="text" name="address" class="form-control form-control-sm" id="address" placeholder="Enter Address" value="{{$employee->address}}">
                            @if($errors->has('name'))
                            <span class="text-danger">{{$errors->first('name')}}</span>
                            @endif
                          </div>
                        </div>

                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Gender</label>
                            <select class="form-control form-control-sm" name="gender_id" id="gender_id">
                              <option value="">Select Gender</option>
                              @foreach($genders as $gender)
                                <option value="{{$gender->id}}" {{(@$employee->gender_id == $gender->id)?'selected':''}}>{{$gender->name}}</option>
                              @endforeach
                            </select>
                          
                          </div>
                        </div>

                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Religion</label>
                            <select class="form-control form-control-sm"  name="religion_id" id="religion_id">
                              <option value="">Select Religion</option>
                               @foreach($religions as $religion)
                                <option value="{{$religion->id}}" {{(@$employee->religion_id == $religion->id)?'selected':''}}>{{$religion->name}}</option>
                              @endforeach
                            </select>
                         
                          </div>
                        </div>

                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Join Date</label>
                            <input type="date" name="join_date" class="form-control form-control-sm" id="join_date" placeholder="Enter Fee Category name" autocomplete="off" value="{{$employee->join_date}}">
                            @if($errors->has('join_date'))
                            <span class="text-danger">{{$errors->first('join_date')}}</span>
                            @endif
                          </div>
                        </div>

                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Date Of Birth</label>
                            <input type="date" name="dob" class="form-control form-control-sm" id="dob" placeholder="Enter Fee Category name" autocomplete="off" value="{{$employee->dob}}">
                            @if($errors->has('dob'))
                            <span class="text-danger">{{$errors->first('dob')}}</span>
                            @endif
                          </div>
                        </div>

                        <div class="col-md-3">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Designation</label>
                            <select class="form-control form-control-sm" name="designation_id" id="designation_id" >
                              <option value="">Select Designation</option>
                              @foreach($designations as $designation)
                                <option value="{{$designation->id}}" {{(@$employee->designation_id == $designation->id)?'selected':''}}>{{$designation->name}}</option>
                              @endforeach
                            </select>
                          
                          </div>
                        </div>
                    
                        <div class="col-md-3">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Image</label>
                            <input type="file" name="image" class="form-control form-control-sm" id="imgload">
                            @if($errors->has('name'))
                            <span class="text-danger">{{$errors->first('image')}}</span>
                            @endif
                          </div>
                        </div>

                        <div class="col-md-3">
                          <img id="showImage" <?php if($employee->image != NULL) { ?> src="{{ URL::to('/') }}/upload/employee_img/{{ $employee->image}}" <?php } else { ?> src="{{asset('upload/no_found.png')}}" <?php } ?> style="height: 150px;width: 170px;border: 1px solid #eee">
                        </div>
                    
                    </div>
                    <div class="row"> 
                      <div class="card-footer">
                        <button type="submit" class="btn btn-primary fa fa-save"> Save</button>
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
    

@endsection