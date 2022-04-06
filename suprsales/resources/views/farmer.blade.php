@extends('layouts.show_by_id')
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

			@isset($emp)
				 @foreach ($emp as $value)
				 @php
				 $emp_name = $value['EMP_NAME'];
				 $emp_id = $value['EMP_ID'];
				 @endphp
				 @break
				 
				 @endforeach
			 @endisset
 <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-10">
		   <div class="row">
            <h1>Assign Customer to @isset($emp) {{$emp_name}} @endisset</h1>&nbsp;&nbsp;&nbsp;&nbsp;
			<button class="btn btn-info"><a href="Javascript:history.go(-1);Location.reload()" class="text-white"><i class="fas fa-arrow-alt-circle-left"></i> Go Back</a></button>
           
			</div>
		  </div>
          <div class="col-sm-2">
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
             <form class="form-horizontal" action="{{route('custs.store')}}" method="POST">
			 {{ csrf_field() }}
			  
                <div class="card-body">
			<div class="form-group row select2-teal">
                  <label class="col-sm-2 col-form-label">Employee</label>
				  <div class="col-sm-10">
				  
					@isset($emp)
					<input name="emp_id" type="hidden" value="{{$emp_id}}">
				  <input  class="form-control" value="{{$emp_name}}" readonly>
                  @endisset
				  </div>
                </div>
			
			
			
				<div class="form-group row select2-teal">
				
                  <label class="col-sm-2 col-form-label">Farmer</label>
				  <div class="col-sm-10">
                  <select class="select2" multiple="multiple" name="farmer_id[]" data-placeholder="Select Farmer" data-dropdown-css-class="select2-teal" style="width: 100%;">
					@isset($farmer)
					@foreach ($farmer as $customer)
					@if (empty($customer['FARMER_ID'] ))
					<option value=""></option>
					@else
					<option value="{{ $customer['FARMER_ID'] }}">{{ $customer['FARMER_NAME'] }}</option>
					@endif
					@endforeach
					@endisset
				  </select>
				  
				  </div>
				  
                </div>
				<div class="form-group row select2-teal">
                  <label class="col-sm-2 col-form-label">Retailer</label>
				  <div class="col-sm-10">
                  <select class="select2" multiple="multiple" name="retailer_id[]" data-placeholder="Select Retailer" data-dropdown-css-class="select2-teal" style="width: 100%;">
                  
				   
				   @isset($retailer)
				   @foreach ($retailer as $customers)
				   @if (empty($customers['RETAILER_ID'] ))
					<option value=""></option>
					@else
					<option value="{{ $customers['RETAILER_ID'] }}">{{ $customers['RETAILER_NAME'] }}</option>
				@endif
                    @endforeach
					@endisset
                  </select>
				  </div>
                </div>
				
                 
                  
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-success btn-normal" style="float:left;"><i class="fa fa-save"></i>   Save</button>
                </div>
                <!-- /.card-footer -->
				
              </form>
            </div>
		  
	
	
      </div>
              </div>
			 
			

</div>		
</section>	
@endsection