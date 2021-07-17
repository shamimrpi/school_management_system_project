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
                <h5 class="card-title">@if(isset($edit_data)) Edit Fee Category @else Fee Category Create @endif</h5>
                <br>
                <form action="{{(@$edit_data)?route('fee_amounts.update',$f_amount->id):route('fee_amounts.store')}}" method="POST" id="myForm" enctype="multipart/form-data">
                  @csrf
                  <?php 
                  if(isset($edit_data))
                  {  ?>
                    @method('PUT')
                  <?php }
                    else{ ?>
                       @method('POST')
                   <?php  }
                   ?> 
                

                
                  
              <div class="card-body">
                  <div class="add_item">
                     <div class="row">
                        <div class="col-md-5"> 
                          <div class="form-group">
                            <label for="fee_category_id">Select Fee Category Name</label>
                            <select class="form-control" name="fee_category_id" required="1">
                              @foreach($f_cats as $f_cat)
                              <option  value="{{$f_cat->id}}">{{$f_cat->name}}</option>
                              @endforeach
                            </select>
                            @if($errors->has('fee_category_id'))
                            <span class="text-danger">{{$errors->first('fee_category_id')}}</span>
                            @endif
                          </div>
                        </div>
                      </div>
                    <div class="row">
                     <div class="col-md-5"> 
                      <div class="form-group">
                        <label for="class_id">Select Class Name</label>
                        <select class="form-control" name="student_class_id[]" required="">
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
                      <input type="text" name="amount[]" class="form-control" id="name" placeholder="Enter amount" value="{{(@$edit_data)?$f_amount->amount:''}}" required="1">
                      @if($errors->has('amount'))
                      <span class="text-danger">{{$errors->first('amount')}}</span>
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
                        <select class="form-control" name="student_class_id[]" required="">
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
                      <input type="text" name="amount[]" class="form-control" id="name" placeholder="Enter amount" value="{{(@$edit_data)?$f_amount->amouny:''}}" required="">
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