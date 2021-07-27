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

                <div class="card-body">
                     <form action="{{route('student.reg.fee.store')}}" method="POST" id="myRollGenerateForm">
                        @csrf
                    
                      <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                               <label for="exampleInputEmail1">Class <span style="color:red">*</span></label>
                               <select class="form-control form-control-sm" id="student_class_id" name="student_class_id" required="1">
                                  <option value="">Select Class</option>
                                  @foreach($classes as $class)
                                    <option value="{{$class->id}}" >{{$class->name}}</option>
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
                            <select class="form-control form-control-sm" id="year_id" name="year_id" required="">
                              <option value="" >Select Year</option>
                              @foreach($years as $year)
                                <option value="{{$year->id}}" >{{$year->name}}</option>
                              @endforeach
                            </select>
                            @if($errors->has('name'))
                            <span class="text-danger">{{$errors->first('name')}}</span>
                            @endif
                          </div>
                        </div>
                        <div class="col-md-4">
                          <a id="roll_reg_search" name="search" class="btn btn-info btn-sm" style="margin-top: 30px">Search</a>
                        </div>
                   

                        
                      </div>
                  

                  </form>
                </div>
         
                <br><br>
                <div class="card-body">
                  <div id="DocumentResults">
                    
                  </div>

                  <script type="text/x-handlebars-template" id="document-template">
                    <table class="table table-bordered table-striped" style="with:100%">
                      <thead>
                        <tr>
                          @{{{thsource}}}
                        </tr>
                      </thead>
                      <tbody>
                        @{{#each this}}
                        <tr>
                          @{{{tdsource}}}
                        </tr>
                        @{{/each}}
                      </tbody>
                    </table>
                  </script>
                </div>
               
                
              </div>
            </div><!-- /.card -->
          </div>
        
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

@endsection
