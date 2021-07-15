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
                <h5 class="card-title">Edit Fee Category</h5>
                 <a href="{{route('fee_amounts.index')}}" class="float-right btn btn-info fa fa-list"> Fee Category Amount List</a>
                <br>
                <form action="{{route('fee_amounts.update',$editData[0]->fee_category_id)}}" method="POST" id="myForm" enctype="multipart/form-data">
                  @csrf
                
                   @method('PUT')
 
                  <div class="card-body">
                      <div class="add_item">
                         <div class="row">
                            <div class="col-md-5"> 
                              <div class="form-group">
                                <label for="exampleInputEmail1">Select Fee Category Name</label>
                                <select class="form-control" name="fee_category_id" required="1">
                                  @foreach($f_cats as $f_cat)
                                  <option  value="{{$f_cat->id}}" {{($editData[0]->fee_category_id == $f_cat->id)?"selected":""}}>{{$f_cat->name}}</option>
                                  @endforeach
                                </select>
                                @if($errors->has('fee_category_id'))
                                <span class="text-danger">{{$errors->first('fee_category_id')}}</span>
                                @endif
                              </div>
                            </div>
                          </div>
                      @foreach($editData as $edit)
                      <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
                        <div class="row">
                         <div class="col-md-5"> 
                          <div class="form-group">
                            <label for="exampleInputEmail1">Select Class Name</label>
                            <select class="form-control" name="student_class_id[]" required="">
                              @foreach($classes as $class)
                              <option  value="{{$class->id}}" {{($edit->student_class_id == $class->id)?"selected": ""}}>{{$class->name}}</option>
                              @endforeach
                            </select>
                            @if($errors->has('student_class_id'))
                            <span class="text-danger">{{$errors->first('student_class_id')}}</span>
                            @endif
                              </div>
                           </div>

                            <div class="col-md-5"> 
                             <div class="form-group">
                              <label for="exampleInputEmail1">Amount</label>
                              <input type="text" name="amount[]" class="form-control" id="name" placeholder="Enter amount" value="{{$edit->amount}}" required="1">
                              @if($errors->has('amount'))
                              <span class="text-danger">{{$errors->first('amount')}}</span>
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
                @endforeach
            
                 </div>
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary fa fa-save">{{@$edit_data?' Update':' Save'}}</button>
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
                     <div class="col-md-5"> 
                      <div class="form-group">
                        <label for="exampleInputEmail1">Select Class Name</label>
                        <select class="form-control" name="student_class_id[]">
                          @foreach($classes as $class)
                          <option  value="{{$class->id}}">{{$class->name}}</option>
                          @endforeach
                        </select>
                        @if($errors->has('class_id'))
                        <span class="text-danger">{{$errors->first('class_id')}}</span>
                        @endif
                      </div>
                   </div>

                    <div class="col-md-5"> 
                     <div class="form-group">
                      <label for="exampleInputEmail1">Amount</label>
                      <input type="text" name="amount[]" class="form-control" id="name" placeholder="Enter amount" value="{{(@$edit_data)?$f_amount->amouny:''}}">
                      @if($errors->has('amount'))
                      <span class="text-danger">{{$errors->first('amount')}}</span>
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