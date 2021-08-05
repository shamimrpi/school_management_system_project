@extends('layouts.master')
@section('content')
	
 <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Salary View Manage</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Employee Salary</li>
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
                      <form action="{{route('get.marksheet')}}" method="GET" id="marksheet">
                        <div class="row">
                       
                             <div class="col-md-3">
                               <div class="form-group">
                                 <label for="exampleInputEmail1">Year <span style="color:red">*</span></label>
                                 <select class="form-control" name="year_id" id="year_id">
                                  <option value="">Select Year</option>
                                    @foreach($years as $year)
                                    <option value="{{$year->id}}">{{$year->name}}</option>
                                    @endforeach
                                 </select>
                              </div>
                            </div>
                            <div class="col-md-3">
                               <div class="form-group">
                                 <label for="exampleInputEmail1">Class <span style="color:red">*</span></label>
                                 <select class="form-control" name="student_class_id" id="student_class_id">
                                  <option value="">Select Class</option>
                                  @foreach($classes as $class)
                                    <option value="{{$class->id}}">{{$class->name}}</option>
                                    @endforeach
                                 </select>
                              </div>
                            </div>
                            <div class="col-md-3">
                               <div class="form-group">
                                 <label for="exampleInputEmail1">Exam Type <span style="color:red">*</span></label>
                                 <select class="form-control" name="exam_type_id" id="exam_type_id">
                                    <option value="">Select Exam Type</option>
                                    @foreach($examtypes as $examtype)
                                      <option value="{{$examtype->id}}">{{$examtype->name}}</option>
                                    @endforeach
                                 </select>
                              </div>
                            </div>
                            <div class="col-md-2">
                               <div class="form-group">
                                 <label for="exampleInputEmail1">ID No. <span style="color:red">*</span></label>
                                 <input type="text" name="id_no" id="id_no" class="form-control" placeholder="Enter ID NO">
                              </div>
                            </div>
                        
                          <div class="col-md-1">
                            <button type="submit" class="btn btn-info btn-sm" style="margin-top: 35px">Submit</button>
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