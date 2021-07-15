@extends('layouts.master')
@section('content')
	
 <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Exam Type List</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Exam Type List</li>
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
                <h5 class="card-title">Exam Type List</h5>
                <br><br>

                  <a href="{{route('examtypes.create')}}" class="btn btn-info fa fa-plus" data-toggle="modal" data-target="#examCreatModal">Add Exam Type </a>
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
                        @if($exams)
                          @foreach($exams as $key => $exam)
                          <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$exam->name}}</td>
                            <td>
                              <a href="{{route('examtypes.edit',$exam->id)}}" class="btn btn-info fa fa-edit"></a>
                              <a href="javascript:;" class="btn btn-danger fa fa-trash sa-delete" data-form-id="exam-delete-{{$exam->id}}"></a>

                              <form id="exam-delete-{{$exam->id}}" action="{{route('examtypes.destroy',$exam->id)}}" method="POST">
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

    <!-- The exam type create Modal -->
  <div class="modal fade" id="examCreatModal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Exam Type Create</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <div class="row">
          <div class="col-lg-12">
          

            <div class="card card-primary card-outline">
              
                <h5 class="card-title">Exam Type</h5>
                <br>
                <form action="{{route('examtypes.store')}}" method="POST">
                  @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Exam Type Name</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter group name">
                    @if($errors->has('name'))
                    <span class="text-danger">{{$errors->first('name')}}</span>
                    @endif
                  </div>
            </div><!-- /.card -->
          </div>
          <!-- /.col-md-6 -->
        </div>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <div class="card-footer">
                  <button type="submit" class="btn btn-primary fa fa-save"> Save</button>
            </div>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </form>
        
      </div>
    </div>
  </div>



  
</div>

@endsection