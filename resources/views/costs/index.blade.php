@extends('layouts.master')
@section('content')
	
 <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Other Cost Manage</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Other Cost List</li>
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
                <h5 class="card-title">User List</h5>
                <br><br>

                  <a href="{{route('others.cost.create')}}" class="btn btn-info fa fa-plus float-sm-right"> Add Other Cost</a>
                <br>
                <br>
                  <table id="example1" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>#SL</th>
                          <th>Date</th>
                          <th>Amount</th>
                          <th>Image</th>
                          <th>Description</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @if($data)
                          @foreach($data as $key => $value)
                          <tr>
                            <td>{{$key+1}}</td>
                            <td>{{date('d-M-Y',strtotime($value->date))}}</td>
                            <td>{{$value->amount}}</td>
                            <td><img src="{{(!empty($value->image))?url('upload/document/'.$value->image):''}}" style="height: 100px;width: 100px"></td>
                            <td>{{$value->description}}</td>
                            <td>
                              <a class="btn btn-info fa fa-edit" href="{{route('others.cost.edit',$value->id)}}">
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