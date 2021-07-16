@extends('layouts.master')
@section('content')
  
 <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Fee Category</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">@if(isset($edit_data)) Edit Fee Category @else Fee Category Create @endif</li>
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
                <h5 class="card-title">Fee Category Create</h5>
                <br>
                <form action="{{route('assign.store')}}" method="POST" id="myForm" enctype="multipart/form-data">
                  @csrf
  
                  
                  <div class="card-body">
                      <div class="add_item">
                         <div class="col-md-5"> 
                          <div class="form-group">
                            <label for="exampleInputEmail1">Select Class Name</label>
                            <select class="form-control" name="student_class_id" required="">
                              @foreach($classes as $class)
                              <option  value="{{$class->id}}">{{$class->name}}</option>
                              @endforeach
                            </select>
                            @if($errors->has('student_class_id'))
                            <span class="text-danger">{{$errors->first('student_class_id')}}</span>
                            @endif
                          </div>
                       </div>
                    <div class="row">
                       <div class="col-md-2"> 
                          <div class="form-group">
                            <label for="exampleInputEmail1"> Select Subject</label>
                            <select class="form-control" name="subject_id[]" required="1">
                              @foreach($subjects as $subject)
                              <option  value="{{$subject->id}}">{{$subject->name}}</option>
                              @endforeach
                            </select>
                            @if($errors->has('subject_id'))
                            <span class="text-danger">{{$errors->first('subject_id')}}</span>
                            @endif
                          </div>
                        </div>

                        <div class="col-md-2"> 
                         <div class="form-group">
                          <label for="exampleInputEmail1">Full Mark</label>
                          <input type="text" name="full_mark[]" class="form-control" id="name" placeholder="Enter full Mark" required="1">
                          @if($errors->has('full_mark'))
                          <span class="text-danger">{{$errors->first('full_mark')}}</span>
                          @endif
                          </div>
                         </div>
                       <div class="col-md-2"> 
                         <div class="form-group">
                          <label for="exampleInputEmail1">Pass Mark</label>
                          <input type="text" name="pass_mark[]" class="form-control" id="name" placeholder="Enter pass Mark" required="1">
                          @if($errors->has('pass_mark'))
                          <span class="text-danger">{{$errors->first('pass_mark')}}</span>
                          @endif
                        </div>
                      </div>
                       <div class="col-md-2"> 
                         <div class="form-group">
                          <label for="exampleInputEmail1">Subjective Mark</label>
                          <input type="text" name="subjective_mark[]" class="form-control" id="name" placeholder="Enter subjective Mark" required="1">
                          @if($errors->has('subjective_mark'))
                          <span class="text-danger">{{$errors->first('subjective_mark')}}</span>
                          @endif
                        </div>
                      </div>
                       <div class="col-md-1"> 
                         <div class="form-group">

                            <span class="btn btn-success btn-sm addeventmore" style="margin-top: 35px"><i class="fa fa-plus"></i></span>
                        </div>
                      </div>
                    </div>
            
                  </div>
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary fa fa-save">Save</button>
                    </div>
             
               </div>
              </form>
                
              </div>
            </div><!-- /.card -->
          </div>
        
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>


          <div style="visibility: hidden;">
            <div class="whole_extra_item_add" id="whole_extra_item_add">
              <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
                <div class="row">
                       <div class="col-md-2"> 
                          <div class="form-group">
                            <label for="exampleInputEmail1"> Select Subject</label>
                            <select class="form-control" name="subject_id[]" required="1">
                              @foreach($subjects as $subject)
                              <option  value="{{$subject->id}}">{{$subject->name}}</option>
                              @endforeach
                            </select>
                            @if($errors->has('subject_id'))
                            <span class="text-danger">{{$errors->first('subject_id')}}</span>
                            @endif
                          </div>
                        </div>

                        <div class="col-md-2"> 
                         <div class="form-group">
                          <label for="exampleInputEmail1">Full Mark</label>
                          <input type="text" name="full_mark[]" class="form-control" id="name" placeholder="Enter full Mark" required="1">
                          @if($errors->has('full_mark'))
                          <span class="text-danger">{{$errors->first('full_mark')}}</span>
                          @endif
                        </div>
                      </div>
                       <div class="col-md-2"> 
                         <div class="form-group">
                          <label for="exampleInputEmail1">Pass Mark</label>
                          <input type="text" name="pass_mark[]" class="form-control" id="name" placeholder="Enter pass Mark" required="1">
                          @if($errors->has('pass_mark'))
                          <span class="text-danger">{{$errors->first('pass_mark')}}</span>
                          @endif
                        </div>
                      </div>
                       <div class="col-md-2"> 
                         <div class="form-group">
                          <label for="exampleInputEmail1">Get Mark</label>
                          <input type="text" name="subjective_mark[]" class="form-control" id="name" placeholder="Enter Subjective Mark" required="1">
                          @if($errors->has('get_mark'))
                          <span class="text-danger">{{$errors->first('get_mark')}}</span>
                          @endif
                        </div>
                      </div>
                   <div class="col-md-1"> 
                     <div class="form-group">
                        <span class="btn btn-sm btn-success addeventmore" style="margin-top: 30px"><i class="fa fa-plus"></i></span>
                        <span class="btn btn-sm btn-danger removeeventmore" style="margin-top: 30px"><i class="fa fa-minus"></i></span>
                    </div>
                  </div>
                </div>
             </div>
           </div>
         </div>
   

@endsection