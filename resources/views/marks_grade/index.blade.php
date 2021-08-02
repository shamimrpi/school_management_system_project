@extends('layouts.master')
@section('content')
	
 <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Student Marks Grade Manage</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Student Marks Grade List</li>
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

                <h5 class="card-title">Grade List</h5>
                <br><br>

                  <a href="{{route('create.marks.grade')}}" class="btn btn-info fa fa-plus float-sm-right"> Add Grade</a>
                <br>
                <br>
               
                  <table id="example1" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>#SL</th>
                          <th>Grade Name</th>
                          <th>Grade Point</th>
                          <th>Start Marks</th>
                           <th>End Marks</th>
                          <th>Point Avarage</th>
                          <th>Remarks</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @if($data)
                          @foreach($data as $key => $value)
                          <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$value->grade_name}}</td>
                            <td>{{$value->grade_point}}</td>
                            <td>{{$value->start_marks}}</td>
                            <td>{{$value->end_marks}}</td>
                            <td>{{$value->start_point }}-{{$value->end_point }}</td>
                            <td>{{$value->remarks}}</td>

                            <td>
                                <a href="{{route('edit.marks.grade',$value->id)}}" class="btn btn-info fa fa-edit"></a>
                            </td>
                          </tr>
                          @endforeach
                      @endif
                      </tbody>
                   
                  </table>
                 
                
              </div>
            </div><!-- /.card -->
          </div>
        
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

@endsection