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
                <h5 class="card-title">Edit Assign Subject</h5>
                 <a href="{{route('assign.index')}}" class="float-right btn btn-info fa fa-list"> Assign Subject List</a>
                <br>
                <form action="{{route('asign.subjects.update',$editData[0]->student_class_id)}}" method="POST" id="myForm" enctype="multipart/form-data">
                  @csrf
                
                   @method('PUT')
 
                  <div class="card-body">
                      <div class="add_item">
                        <div class="row">
                         <div class="col-md-3"> 
                          <div class="form-group">
                            <label for="exampleInputEmail1">Select Class Name</label>
                            <select class="form-control" name="student_class_id" required="">
                              @foreach($classes as $class)
                              <option  value="{{$class->id}}" {{($editData[0]->student_class_id == $class->id)?"selected":""}}>{{$class->name}}</option>
                              @endforeach
                            </select>
                           
                          </div>
                       </div>
                     </div>
                        @foreach($editData as $data)
                        <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
                            <div class="row">
                               <div class="col-md-3"> 
                                  <div class="form-group">
                                    <label for="exampleInputEmail1"> Select Subject</label>
                                    <select class="form-control" name="subject_id[]" required="1">
                                      @foreach($subjects as $subject)
                                      <option  value="{{$subject->id}}" {{($data->subject_id == $subject->id)?"selected":""}}>{{$subject->name}}</option>
                                      @endforeach
                                    </select>
                                
                                  </div>
                                </div>

                                <div class="col-md-2"> 
                                 <div class="form-group">
                                  <label for="exampleInputEmail1">Full Mark</label>
                                  <input type="text" name="full_mark[]" class="form-control" id="name" placeholder="Enter full Mark" required="1" value="{{$data->full_mark}}">
                               
                                  </div>
                                 </div>
                               <div class="col-md-2"> 
                                 <div class="form-group">
                                  <label for="exampleInputEmail1">Pass Mark</label>
                                  <input type="text" name="pass_mark[]" class="form-control" id="name" placeholder="Enter pass Mark" value="{{$data->pass_mark}}"  required="1">
                                  
                                </div>
                              </div>
                               <div class="col-md-2"> 
                                 <div class="form-group">
                                  <label for="exampleInputEmail1">Subjective Mark</label>
                                  <input type="text" name="subjective_mark[]" class="form-control" id="name" placeholder="Enter subjective Mark" value="{{$data->subjective_mark}}" required="1">
                                
                                </div>
                              </div>
                               <div class="col-md-1"> 
                                 <div class="form-group">

                                    <span class="btn btn-success btn-sm addeventmore" style="margin-top: 35px"><i class="fa fa-plus"></i></span>
                                    <span class="btn btn-sm btn-danger removeeventmore" style="margin-top: 35px"><i class="fa fa-minus"></i></span>
                                </div>
                              </div>
                            </div>
                          </div>
                            @endforeach
            
                  </div>
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary fa fa-save">Update</button>
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
                               <div class="col-md-3"> 
                                  <div class="form-group">
                                    <label for="exampleInputEmail1"> Select Subject</label>
                                    <select class="form-control" name="subject_id[]" required="1">
                                      @foreach($subjects as $subject)
                                      <option  value="{{$subject->id}}">{{$subject->name}}</option>
                                      @endforeach
                                    </select>
                                   
                                  </div>
                                </div>

                                <div class="col-md-2"> 
                                 <div class="form-group">
                                  <label for="exampleInputEmail1">Full Mark</label>
                                  <input type="text" name="full_mark[]" class="form-control" id="name" placeholder="Enter full Mark" required="1">
                                 
                                  </div>
                                 </div>
                               <div class="col-md-2"> 
                                 <div class="form-group">
                                  <label for="exampleInputEmail1">Pass Mark</label>
                                  <input type="text" name="pass_mark[]" class="form-control" id="name" placeholder="Enter pass Mark" required="1">
                                 
                                </div>
                              </div>
                               <div class="col-md-2"> 
                                 <div class="form-group">
                                  <label for="exampleInputEmail1">Subjective Mark</label>
                                  <input type="text" name="subjective_mark[]" class="form-control" id="name" placeholder="Enter subjective Mark" required="1">
                                
                                </div>
                              </div>
                               <div class="col-md-1"> 
                                 <div class="form-group">

                                  <span class="btn btn-success btn-sm addeventmore" style="margin-top: 35px"><i class="fa fa-plus"></i></span>
                                  <span class="btn btn-sm btn-danger removeeventmore" style="margin-top:35px"><i class="fa fa-minus"></i></span>
                                </div>
                              </div>
                            </div>
             </div>
           </div>
         </div>
   

@endsection