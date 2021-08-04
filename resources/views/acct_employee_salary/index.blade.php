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

                  <a href="{{route('employee.salary.create')}}" class="btn btn-info fa fa-plus float-sm-right"> Add/Edit Salary</a>
              
                  <table id="example1" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>#SL</th>
                          <th>Name</th>
                          <th>ID NO</th>
                          <th>Amount</th>
                          <th>Date</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($data as $key => $value)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$value->user->name}}</td>
                                <td>{{$value->user->id_no}}</td>
                                <td>{{$value->amount}}</td>
                                <td>{{$value->date}}</td>
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