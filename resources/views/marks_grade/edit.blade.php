@extends('layouts.master')
@section('content')
  
  <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Create Grade Marks</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Create Grade Marks</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

     <div class="content">
      <div class="container-fluid">
     
   
          

            <div class="card card-primary card-outline">
              <div class="card-body">
                <h5 class="card-title">Create Grade Marks</h5>
                <a class="btn btn-info btn-sm float-sm-right" href="{{route('marks.grade')}}">Marks list</a>
                <br>
                <form action="{{route('edit.store.marks.grade',$data->id)}}" method="POST" enctype="multipart/form-data">
               @csrf

                <div class="card-body">
                   <div class="row">
                        <div class="col-md-3">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Grade Name</label>
                            <input type="text" name="grade_name" class="form-control form-control-sm" id="name" value="{{$data->grade_name}}" placeholder="Enter Grade Name">
                            @if($errors->has('grade_name'))
                            <span class="text-danger">{{$errors->first('grade_name')}}</span>
                            @endif
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Grade Point</label>
                            <input type="text" name="grade_point" class="form-control form-control-sm" id="name" value="{{$data->grade_point}}">
                            @if($errors->has('grade_point'))
                            <span class="text-danger">{{$errors->first('grade_point')}}</span>
                            @endif
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Start Marks</label>
                            <input type="text" name="start_marks" class="form-control form-control-sm" id="name" value="{{$data->start_marks}}">
                            @if($errors->has('start_marks'))
                            <span class="text-danger">{{$errors->first('start_marks')}}</span>
                            @endif
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label for="exampleInputEmail1">End Marks</label>
                            <input type="text" name="end_marks" class="form-control form-control-sm" id="name" value="{{$data->end_marks}}">
                            @if($errors->has('end_marks'))
                            <span class="text-danger">{{$errors->first('end_marks')}}</span>
                            @endif
                          </div>
                        </div>
                         <div class="col-md-3">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Start Point</label>
                            <input type="text" name="start_point" class="form-control form-control-sm" id="name" value="{{$data->start_point}}">
                            @if($errors->has('start_point'))
                            <span class="text-danger">{{$errors->first('start_point')}}</span>
                            @endif
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label for="exampleInputEmail1">End Point</label>
                            <input type="text" name="end_point" class="form-control form-control-sm" id="name" value="{{$data->end_point}}">
                            @if($errors->has('end_point'))
                            <span class="text-danger">{{$errors->first('end_point')}}</span>
                            @endif
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Remarks</label>
                            <input type="text" name="remarks" class="form-control form-control-sm" id="name" value="{{$data->remarks}}">
                            @if($errors->has('name'))
                            <span class="text-danger">{{$errors->first('name')}}</span>
                            @endif
                          </div>
                        </div>
                     

                       
                      </div>
                    <div class="row"> 
                       <div class="col-md-3">
                         <button type="submit" class="btn btn-primary fa fa-save"> Save</button>
                        </div>
                    </div>
                </form>
                </div>
              </div>
            </div><!-- /.card -->
          </div>
        
          <!-- /.col-md-6 -->
      
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    

@endsection