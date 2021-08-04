@extends('layouts.master')
@section('content')
  
 <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Cost Manage</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">@if(isset($edit_data)) Edit Other Cost @else  Create Other Cost @endif<</li>
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
                <h5 class="card-title">@if(isset($edit_data)) Edit Other Cost @else  Create Other Cost @endif</h5>
                <br>
                <form action="{{route('others.cost.update',$edit_data->id)}}" method="POST" id="costForm" enctype="multipart/form-data">
                  @csrf
                
                    @method('PUT')
                
 
                    <div class="card-body">
                       <div class="add_item">
                          
                          <div class="row">
                            <div class="col-md-3"> 
                               <div class="form-group">
                                <label for="exampleInputEmail1">Amount</label>
                                <input type="text" name="amount" class="form-control" id="amount" placeholder="Enter amount" value="{{(@$edit_data)?$edit_data->amount:''}}">
                               
                              </div>
                            </div>
                             <div class="col-md-3"> 
                               <div class="form-group">
                                <label for="exampleInputEmail1">Date</label>
                                <input type="date" name="date" class="form-control" id="date" placeholder="Enter date" value="{{(@$edit_data)?$edit_data->date:''}}">
                              
                              </div>
                            </div>
                             <div class="col-md-3"> 
                               <div class="form-group">
                                <label for="exampleInputEmail1">Image Document</label>
                                <input type="file" name="image" id="imgload" class="form-control" id="name" placeholder="Enter amount"  r>
                               
                              </div>
                           </div>
                           @if($edit_data->image == true)
                            <div class="col-md-3">
                              <img id="showImage" src="{{(!empty($edit_data->image))?url('upload/document/'.$edit_data->image):''}}" style="height: 150px;width: 250px;border: 1px solid #eee">
                            </div>
                            
                            @else
                            <div class="col-md-3">
                              <img id="showImage" src="{{asset('upload/no_found.png')}}"  style="height: 150px;width: 170px;border: 1px solid #eee">
                            </div>
                            @endif
                             <div class="col-md-9">
                                <textarea class="form-control" name="description" placeholder="Enter endsection">{{$edit_data->description}}</textarea>
                              </div>
                              <div class="col-md-3">
                                <button type="submit" class="btn btn-primary fa fa-save" style="margin-top:20px">{{@$edit_data?' Update':' Save'}}</button>
                              </div>
                        </div>
                        
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

   

@endsection