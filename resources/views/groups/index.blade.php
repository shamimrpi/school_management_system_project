@extends('layouts.master')
@section('content')
	
 <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Group List</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Group List</li>
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
                <h5 class="card-title">Group List</h5>
                <br><br>

                  <a href="{{route('groups.create')}}" class="btn btn-info fa fa-plus"> Add Group</a>
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
                        @if($groups)
                          @foreach($groups as $key => $group)
                          <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$group->name}}</td>
                            <td>
                              <a href="{{route('groups.edit',$group->id)}}" class="btn btn-info fa fa-edit"></a>
                              <a href="javascript:;" class="btn btn-danger fa fa-trash sa-delete" data-form-id="group-delete-{{$group->id}}"></a>

                              <form id="group-delete-{{$group->id}}" action="{{route('groups.destroy',$group->id)}}" method="POST">
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