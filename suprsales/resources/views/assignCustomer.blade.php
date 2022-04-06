@extends('layouts.app')
@section('content')

        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
	
	@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

 <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-3">
            <h1>Assign Customer</h1>
          </div>
		 
          <div class="col-sm-9">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard.index')}}">Home</a></li>
              <li class="breadcrumb-item active">Customers</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
	
 <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
		  <div class="card card-success">
             
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal">
			  
                <div class="card-body">
			
			
			<div class="form-group row select2-teal">
                  <label class="col-sm-2 col-form-label">Select Employee</label>
				  <div class="col-sm-10">  
                  <select class="form-control select2" name="emp_id" id="emp_id"  style="width: 100%;" data-dropdown-css-class="select2-teal">
                 <option value="" selected disabled>Select Employee</option>
				 @foreach ($admins as $value)
				 <option value="{{ $value['EMP_ID'] }}">{{ $value['EMP_NAME'] }}</option>
                   @endforeach 
				  </select>
				  </div>
                </div>
			 
				<div class="form-group row select2-teal">
				
                  <label class="col-sm-2 col-form-label">Farmer</label>
				  <div class="col-sm-10">
                  <select class="select2" multiple="multiple"  name="farmer_id" id="farmer_id" data-placeholder="Select Farmer" data-dropdown-css-class="select2-teal" style="width: 100%;">
                  
                  </select>
				  
				  </div>
				  
                </div>
				<div class="form-group row select2-teal">
                  <label class="col-sm-2 col-form-label">Retailer</label>
				  <div class="col-sm-10">
                  <select class="select2" multiple="multiple" data-placeholder="Select Retailer" data-dropdown-css-class="select2-teal" style="width: 100%;">
                   
                  </select>
				  </div>
                </div>
				
                 
                  
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="button" class="btn btn-success btn-normal" style="float:left;"><i class="fa fa-save"></i>   Save</button>
                </div>
                <!-- /.card-footer -->
				
              </form>
            </div>
		  
		
		
		
		
		
		
        <!-- /.modal-dialog -->
      </div>
              </div>
			 
			

</div>		
</section>	


@endsection