@extends('layouts.master')
@section('content')
	
 <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Brands List</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Brands List</li>
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
                <h5 class="card-title">Class List</h5>
                <br><br>

                  <a href="{{route('classes.create')}}" class="btn btn-info fa fa-plus"> Add Class</a>
                <br>
                <br>
                  <table id="example1" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>#SL</th>
                          <th>Name</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @if($classes)
                          @foreach($classes as $key => $s_class)
                          <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$s_class->name}}</td>
                            <td>
                              <a href="{{route('classes.edit',$s_class->id)}}" class="btn btn-info fa fa-edit"></a>
                              <a href="javascript:;" class="btn btn-danger fa fa-trash sa-delete" data-form-id="s_class-delete-{{$s_class->id}}"></a>

                              <form id="s_class-delete-{{$s_class->id}}" action="{{route('classes.destroy',$s_class->id)}}" method="POST">
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