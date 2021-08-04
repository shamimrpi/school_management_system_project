@extends('layouts.master')
@section('content')
	
 <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Fee Manage</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Student Fee List</li>
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
                 
                </div>
                <h5 class="card-title">Account Student Fee List</h5>
                <br><br>

                  <a href="{{route('student.fee.create')}}" class="btn btn-info fa fa-plus float-sm-right"> Add/Edit Fee</a>
              
                  <table id="example1" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>#SL</th>
                          <th>Name</th>
                          <th>ID NO</th>
                          <th>Year </th>
                          <th>Class</th>
                         
                          <th>Fee Type</th>
                          <th>Amount</th>
                          <th>Date</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($allData as $key => $value)
                            <tr>
                              <td>{{$key+1}}</td>
                              <td>{{$value->student->name}}</td>
                              <td>{{$value->student->id_no}}</td>
                              <td>{{$value->years->name}}</td>
                              <td>{{$value->studentClass->name}}</td>
                              <td>{{$value->feetype->name}}</td>
                              <td>{{$value->amount}}</td>
                              <td>{{$value->year}}-{{$value->month}}</td>
                            </tr>
                        @endforeach
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