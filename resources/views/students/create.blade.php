@extends('layouts.master')
@section('content')
  
  <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Fee Category</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">@if(isset($editData)) Edit Fee Category @else Fee Category Create @endif</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

     <div class="content">
      <div class="container-fluid">
     
   
          

            <div class="card card-primary card-outline">
              <div class="card-body">
                <h5 class="card-title">Create Student</h5>
                <a class="btn btn-info btn-sm float-sm-right" href="{{route('student.all')}}">Student list</a>
                <br>
                <form action="{{(@$edit_data)?route('students.update',$student->id):route('students.store')}}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <?php 
                  if(isset($editData))
                  {  ?>
                    @method('PUT')
                  <?php }
                    else{ ?>
                       @method('POST')
                   <?php  }
                   ?> 

                <div class="card-body">
                   <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Student Name</label>
                            <input type="text" name="name" class="form-control form-control-sm" id="name" placeholder="Enter Fee Category name">
                            @if($errors->has('name'))
                            <span class="text-danger">{{$errors->first('name')}}</span>
                            @endif
                          </div>
                        </div>

                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Father Name</label>
                            <input type="text" name="f_name" class="form-control form-control-sm" id="name" placeholder="Enter Father Name" value="">
                            @if($errors->has('f_name'))
                            <span class="text-danger">{{$errors->first('f_name')}}</span>
                            @endif
                          </div>
                        </div>

                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Mother Name</label>
                            <input type="text" name="m_name" class="form-control form-control-sm" id="name" placeholder="Enter Mother Name" value="">
                            @if($errors->has('m_name'))
                            <span class="text-danger">{{$errors->first('m_name')}}</span>
                            @endif
                          </div>
                        </div>

                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Mobile</label>
                            <input type="text" name="mobile" class="form-control form-control-sm" id="name" placeholder="Enter Mobile Number" value="">
                            @if($errors->has('mobile'))
                            <span class="text-danger">{{$errors->first('mobile')}}</span>
                            @endif
                          </div>
                        </div>

                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Address</label>
                            <input type="text" name="address" class="form-control form-control-sm" id="name" placeholder="Enter Address" value="">
                            @if($errors->has('address'))
                            <span class="text-danger">{{$errors->first('address')}}</span>
                            @endif
                          </div>
                        </div>

                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Gender</label>
                            <select class="form-control form-control-sm" name="gender_id" >
                              <option value="">Select Gender</option>
                              @foreach($genders as $gender)
                                <option value="{{$gender->id}}" {{(@$a_student->student->gender_id == $gender->id)?'selected':''}}>{{$gender->name}}</option>
                              @endforeach
                            </select>
                             @if($errors->has('gender_id'))
                            <span class="text-danger">{{$errors->first('gender_id')}}</span>
                            @endif
                          
                          </div>
                        </div>

                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Religion</label>
                            <select class="form-control form-control-sm"  name="religion_id">
                              <option value="">Select Religion</option>
                               @foreach($religions as $religion)
                                <option value="{{$religion->id}}" {{(@$a_student->student->religion_id == $religion->id)?'selected':''}}>{{$religion->name}}</option>
                              @endforeach
                            </select>
                            @if($errors->has('religion_id'))
                            <span class="text-danger">{{$errors->first('religion_id')}}</span>
                            @endif
                          </div>
                        </div>

                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Date Of Birth</label>
                            <input type="date" name="dob" class="form-control form-control-sm" id="name" placeholder="Enter Fee Category name" autocomplete="off">
                            @if($errors->has('dob'))
                            <span class="text-danger">{{$errors->first('dob')}}</span>
                            @endif
                          </div>
                        </div>

                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Discount</label>
                            <input type="text" name="discount" class="form-control form-control-sm" id="name" placeholder="Enter Fee Category name" value="">
                            @if($errors->has('discount'))
                            <span class="text-danger">{{$errors->first('discount')}}</span>
                            @endif
                          </div>
                        </div>

                          <div class="col-md-4">
                          <div class="form-group">
                            <label for="exampleInputEmail1">year</label>
                            <select class="form-control form-control-sm" name="year_id">
                              <option value="">Select Year</option>
                              @foreach($years as $year)
                                <option value="{{$year->id}}">{{$year->name}}</option>
                              @endforeach
                            </select>
                            @if($errors->has('year_id'))
                            <span class="text-danger">{{$errors->first('year_id')}}</span>
                            @endif
                          </div>
                        </div>

                          <div class="col-md-4">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Class</label>
                             <select class="form-control form-control-sm" name="student_class_id">
                              <option value="">Select Class</option>
                              @foreach($classes as $class)
                                <option value="{{$class->id}}">{{$class->name}}</option>
                              @endforeach
                            </select>
                            @if($errors->has('student_class_id'))
                            <span class="text-danger">{{$errors->first('student_class_id')}}</span>
                            @endif
                          </div>
                        </div>

                          <div class="col-md-4">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Group</label>
                             <select class="form-control form-control-sm" name="group_id">
                              <option value="">Select Group</option>
                              @foreach($groups as $group)
                                <option value="{{$group->id}}">{{$group->name}}</option>
                              @endforeach
                            </select>
                            @if($errors->has('group_id'))
                            <span class="text-danger">{{$errors->first('group_id')}}</span>
                            @endif
                          </div>
                        </div>

                          <div class="col-md-4">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Shift</label>
                            <select class="form-control form-control-sm" name="shift_id">
                              <option value="">Select Shift</option>
                              @foreach($shifts as $shift)
                                <option value="{{$shift->id}}">{{$shift->name}}</option>
                              @endforeach
                            </select>
                            @if($errors->has('shift_id'))
                            <span class="text-danger">{{$errors->first('shift_id')}}</span>
                            @endif
                          </div>
                        </div>

                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Image</label>
                            <input type="file" name="image" class="form-control form-control-sm" id="imgload">
                            @if($errors->has('name'))
                            <span class="text-danger">{{$errors->first('image')}}</span>
                            @endif
                          </div>
                        </div>

                        <div class="col-md-4">
                          <img id="showImage" src="{{asset('upload/no_found.png')}}"  style="height: 150px;width: 170px;border: 1px solid #eee">
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