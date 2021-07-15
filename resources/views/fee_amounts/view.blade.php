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
                <a href="{{route('fee_amounts.index')}}" class="float-right btn btn-info fa fa-list"> Fee Category Amount List</a>
                <h5 class="card-title">Fee Amount List of <strong>{{$editData[0]->fee_category->name}}</strong></h5>
                <br>
                
                  <div class="card-body">
                 
                    <table class="table table-bordered table-hover">
                      <thead>
                          <tr>
                            <th>Class</th>
                            <th>Amount</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach($editData as $data)
                        <tr>
                          <td>{{$data->studentClass->name}}</td>
                          <td>{{$data->amount}}</td>
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