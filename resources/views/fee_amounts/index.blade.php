@extends('layouts.master')
@section('content')
	
 <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Fee Category Amount List</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Fee Category Amount List</li>
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
                <h5 class="card-title">Fee Category Amount List</h5>
                <br><br>

                  <a href="{{route('fee_amounts.create')}}" class="float-right btn btn-info fa fa-plus"> Add Fee Category Amount</a>
                <br>
                <br>
                  <table id="example1" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>#SL</th>
                          <th>Fee Category</th>
                          
                          <th>Action</th>

                        </tr>
                      </thead>
                      <tbody>
                        @if($all_data)
                          @foreach($all_data as $key => $data)
                          <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$data['fee_category']['name']}}</td>

                            <td>
                              <a href="{{route('fee_amounts.edit',$data->fee_category_id)}}" class="btn btn-info fa fa-edit"></a>
                               <a href="{{route('fee_amounts.view',$data->fee_category_id)}}" class="btn btn-info fa fa-eye"></a>
                              <a href="javascript:;" class="btn btn-danger fa fa-trash sa-delete" data-form-id="data-delete-{{$data->fee_category_id}}"></a>

                              <form id="data-delete-{{$data->fee_category_id}}" action="{{route('fee_categories.destroy',$data->fee_category_id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                            
                               
                              </form>
                              
                            </td>
                          </tr>
                          @endforeach
                        @endif
                      </tbody>
                      <tfoot>
                         <tr>
                          <th>#SL</th>
                          <th>Name</th>
                          <th>Action</th>
                        </tr>
                      </tfoot>
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