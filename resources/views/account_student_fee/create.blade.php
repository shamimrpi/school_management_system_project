@extends('layouts.master')
@section('content')
  
 <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Account Studen Fee Add/Edit</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Student Fee Add/Edit</li>
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
                      <div class="row">
                         <div class="col-md-3">
                          <div class="form-group">
                           <label for="year_id">Select Year <span style="color:red">*</span></label>
                            <select class="form-control form-control-sm" id="year_id" name="year_id">
                              <option value="" >Select Year</option>
                              @foreach($years as $year)
                                <option value="{{$year->id}}" >{{$year->name}}</option>
                              @endforeach
                            </select>
                           
                          </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                               <label for="exampleInputEmail1">Class <span style="color:red">*</span></label>
                               <select class="form-control form-control-sm" id="student_class" name="student_class_id">
                                  <option value="">Select Class</option>
                                  @foreach($classes as $class)
                                    <option value="{{$class->id}}" >{{$class->name}}</option>
                                  @endforeach
                                </select>
                            
                              </div>
                          </div>
                        
                         <div class="col-md-3">
                          <div class="form-group">
                           <label for="year_id">Fee Category <span style="color:red">*</span></label>
                            <select class="form-control form-control-sm" id="fee_category_id" name="fee_category_id">
                              <option value="" >Select Year</option>
                              @foreach($fee_categories as $category)
                                <option value="{{$category->id}}" >{{$category->name}}</option>
                              @endforeach
                            </select>
                            
                          </div>
                        </div>
                        <div class="col-md-2">
                          <div class="form-group">
                           <label for="year_id">Date <span style="color:red">*</span></label>
                            <input type="date" class="form-control form-control-sm" id="date" name="date">
                           
                            
                          </div>
                        </div>

                        <div class="col-md-1">
                          <a id="acctStudentFee" name="search" class="btn btn-info btn-sm" style="margin-top: 30px">Search</a>
                        </div>
                   

                        
                      </div>
                  

            
                </div>
         
                <br><br>
                <div class="card-body">
                  <div id="DocumentResults">
                    
                  </div>

                  <script type="text/x-handlebars-template" id="document-template">
                    <form action="{{route('student.fee.store')}}" method="POST"> 
                      @csrf
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
                    <button class="btn btn-success btn-sm"> Submit</button>
                  </form>
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
