@extends('layouts.master')
@section('content')
  
 <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Fee Amount List</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active"> Fee Amount List</li>
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
                <a href="{{route('assign.index')}}" class="float-right btn btn-info fa fa-list"> Subject Assign List</a>
                <h3 class="card-title">Mark Assign of <strong>{{$viewData[0]->studentClass->name}}</strong></h3>
                <br>
                
                  <div class="card-body">
                 
                    <table class="table table-bordered table-hover">
                      <thead>
                          <tr>
                            <th>Subject Name</th>
                            <th>Full Mark</th>
                            <th>Pass Mark</th>
                            <th>Subjective Mark</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach($viewData as $data)
                        <tr>
                          <td>{{$data->subject->name}}</td>
                          <td>{{$data->full_mark}}</td>
                          <td>{{$data->pass_mark}}</td>
                          <td>{{$data->subjective_mark}}</td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
             
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