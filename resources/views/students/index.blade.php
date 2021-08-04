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

                <div class="cart-body">
                  <form action="{{route('students.year.class.wise')}}" method="get">
                      <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                               <label for="exampleInputEmail1">Class <span style="color:red">*</span></label>
                               <select class="form-control form-control-sm" name="student_class_id" required="1">
                                  <option value="">Select Class</option>
                                  @foreach($classes as $class)
                                    <option value="{{$class->id}}" {{(@$student_class_id == $class->id)?"selected":""}}>{{$class->name}}</option>
                                  @endforeach
                                </select>
                                @if($errors->has('student_class_id'))
                                <span class="text-danger">{{$errors->first('student_class_id')}}</span>
                                @endif
                              </div>
                          </div>
                         <div class="col-md-4">
                          <div class="form-group">
                           <label for="year_id">Select Year <span style="color:red">*</span></label>
                            <select class="form-control form-control-sm" name="year_id" required="">
                              <option value="" >Select Year</option>
                              @foreach($years as $year)
                                <option value="{{$year->id}}" {{(@$year_id == $year->id)?"selected":""}}>{{$year->name}}</option>
                              @endforeach
                            </select>
                            @if($errors->has('name'))
                            <span class="text-danger">{{$errors->first('name')}}</span>
                            @endif
                          </div>
                        </div>
                        <div class="col-md-4">
                          <button type="submit" name="search" class="btn btn-info btn-sm" style="margin-top: 30px">Search</button>
                        </div>

                         
                      </div>
                  </form>
                </div>
                <h5 class="card-title">Student List</h5>
                <br><br>

                  <a href="{{route('student.create')}}" class="btn btn-info fa fa-plus float-sm-right"> Add Student</a>
                <br>
                <br>
                @if(!@$search)
                  <table id="example1" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>#SL</th>
                          <th>Name</th>
                          <th>ID NO</th>
                          <th>Roll</th>
                          <th>Year</th>
                          <th>Image</th>
                          <th>Class</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @if($a_students)
                          @foreach($a_students as $key => $data)
                          <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$data->student->name}}</td>
                            <td>{{$data->student->id_no}}</td>

                            <td>{{$data->roll}}</td>
                            <td>{{$data->year->name}}</td>
                            <td>
                              <img src="{{(!empty($data->student->image))?url('upload/studentImage/'.$data->student->image):''}}" style="height: 100px;width: 100px">
                            </td>
                            <td>{{$data->studentClass->name}}</td>

                            <td>
                              <a class="btn btn-info fa fa-edit btn-sm" href="{{route('student.edit',$data->student_id)}}"></a>
                              <a target="_blank" class="btn btn-info fa fa-eye btn-sm" href="{{route('student.details',$data->student_id)}}"></a>
                              <a class="btn btn-info fa fa-check btn-sm" href="{{route('student.promotion',$data->student_id)}}"></a>
                            </td>
                          </tr>
                          @endforeach
                        @endif
                      </tbody>
                      <tfoot>
                         <tr>
                          <th>#SL</th>
                          <th>Name</th>
                          <th>ID NO</th>
                          <th>Roll</th>
                          <th>Year</th>
                          <th>Image</th>
                          <th>Class</th>
                          <th>Action</th>
                        </tr>
                      </tfoot>
                  </table>
                  @else
                  <table id="example1" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>#SL</th>
                          <th>Name</th>
                          <th>ID NO</th>
                          <th>Roll</th>
                          <th>Year</th>
                          <th>Image</th>
                          <th>Class</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @if($a_students)
                          @foreach($a_students as $key => $data)
                          <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$data->student->name}}</td>
                            <td>{{$data->student->id_no}}</td>

                            <td>{{$data->roll}}</td>
                            <td>{{$data->year->name}}</td>
                            <td>
                              <img src="{{(!empty($data->student->image))?url('upload/studentImage/'.$data->student->image):''}}" style="height: 100px;width: 100px">
                            </td>
                            <td>{{$data->studentClass->name}}</td>

                            <td>
                              <a class="btn btn-info fa fa-edit" href="{{route('student.edit',$data->student_id)}}"></a>
                              <a target="_blank" class="btn btn-info fa fa-eye btn-sm" href="{{route('student.details',$data->student_id)}}"></a>
                               <a class="btn btn-info fa fa-check btn-sm" href="{{route('student.promotion',$data->student_id)}}"></a>
                            </td>
                          </tr>
                          @endforeach
                        @endif
                      </tbody>
                      <tfoot>
                         <tr>
                          <th>#SL</th>
                          <th>Name</th>
                          <th>ID NO</th>
                          <th>Roll</th>
                          <th>Year</th>
                          <th>Image</th>
                          <th>Class</th>
                          <th>Action</th>
                        </tr>
                      </tfoot>
                  </table>
                  @endif
                
              </div>
            </div><!-- /.card -->
          </div>
        
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

@endsection