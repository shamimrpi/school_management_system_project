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
                     <form action="{{route('student.roll.gen.store')}}" method="POST" id="myRollGenerateForm">
                        @csrf
                    
                      <div class="row">
                       
                           <div class="col-md-4">
                             <div class="form-group">
                               <label for="exampleInputEmail1">Select Month <span style="color:red">*</span></label>
                               <input type="date" name="date" id="date" class="form-control form-control-sm" placeholder="Enter Month ">
                            </div>
                          </div>
                      
                        <div class="col-md-4">
                          <a id="montly_salary" name="search" class="btn btn-info btn-sm" style="margin-top: 30px">Search</a>
                        </div>
                   

                        
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