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
          <div class="col-lg-6">
          

            <div class="card card-primary card-outline">
              <div class="card-body">
                <h5 class="card-title">@if(isset($edit_data)) Edit Fee Category @else Fee Category Create @endif</h5>
                <br>
                <form action="{{(@$edit_data)?route('fee_categories.update',$f_cat->id):route('fee_categories.store')}}" method="POST">
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
                  <div class="form-group">
                    <label for="exampleInputEmail1">Fee Category Name</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter Fee Category name" value="{{(@$edit_data)?$f_cat->name:''}}">
                    @if($errors->has('name'))
                    <span class="text-danger">{{$errors->first('name')}}</span>
                    @endif
                  </div>
            

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary fa fa-save"> Save</button>
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