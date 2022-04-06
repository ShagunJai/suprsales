@extends('layouts.app')
@section('content')

      @if ($message = Session::get('success'))
      <div class="alert alert-success">
        <p>{{ $message }}</p>
      </div>
      @endif

      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-3">
              <h1>Create Employee</h1>
            </div>

            <div class="col-sm-9">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('dashboard.index')}}">Home</a></li>
                <li class="breadcrumb-item active">Create Employee</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          
          
				<div class="card">
				 
				<div class="card-header">
                <h3 class="card-title">Upload CSV or Create Single Record</h3>
				@php
				$id = Auth::user()->emp_id;
				$createemployee = $id;
				@endphp
               <form class="form-horizontal" action="{{route('createemployee.destroy', $createemployee)}}" method="POST">
						  @csrf
								@method('DELETE')
								
					   <button class='btn btn-light btn-sm' style="float:right;" type="submit"  title="Download CSV Format">
                             <i class='fas fa-download'></i> CSV Format     
                          </button> 
						  </form>
              </div>
			  <div class="card-body">
			  
				
				<form class="form-horizontal" action="{{route('createemployee.update',$id)}}" method="POST" enctype="multipart/form-data">
			 {{ csrf_field() }}
			 {{ method_field('PUT') }}
                  <div class="card card-success">
                     <div class="card-header">
            <h3 class="card-title">Upload CSV File</h3>
  
            <div class="card-tools">
			
              <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Expand">
                <i class="fas fa-minus"></i></button>
             
            </div>
          </div>
                    
                      <div class="card-body">
                        <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Choose CSV File</label>
                      <div class="col-sm-10">

                        <div class="custom-file">
                          <input type="file" accept=".csv" name="excel" class="custom-file-input">
                          <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                      </div>
                    </div>
                      </div>
					  <div class="card-footer">
                    <button type="submit" class="btn btn-success btn-normal" style="float:left;" onclick="spinner()"><i class="fa fa-save"></i> Save</button>
                  <div class="loader">
					  <div class="loading">
					  </div>
					</div>
				  </div>
                    
                  </div>
				  </form>
				 
				 
				  <div class="card card-success">
                     <div class="card-header">
            <h3 class="card-title">Create</h3>
  
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Expand">
                <i class="fas fa-minus"></i></button>
             
            </div>
          </div>
                   <div class="card-body">
					 <form class="form-horizontal" action="{{route('createemployee.store')}}" method="POST">
			 {{ csrf_field() }}
                      
                       <div class="row">
                      <div class="col-md-12">
                        <label>Name *</label>
                        <div class="form-group">
                            <input name="EMP_NAME" class="form-control" placeholder="Full Name" required>
                        </div>
                      </div>
                      
                    </div>

                    <div class="row">
                      <div class="col-md-4">
                        <label>Email *</label>
                        <div class="form-group">

                          
                            <input name="EMP_EMAIL" class="form-control" placeholder="Email" required>
                          
                        </div>
                      </div>
                      <div class="col-md-4">
                        <label>Code *</label>
                        <div class="form-group">

                          
                            <input name="EMP_CODE" class="form-control" placeholder="Code" required>
                          
                        </div>
                      </div>
					  <div class="col-md-4">
                        <label>Designation</label>
                        <div class="form-group">
                            <input name="EMP_DESIGNATION" class="form-control" placeholder="Designation">
                        </div>
                      </div>
                    </div>
					
					<div class="row">
					<div class="col-md-4">
					<label>Is Admin</label>
					 <div class="form-group">
						<select class="form-control select2" name="IS_ADMIN" onchange="adminType(event)" data-dropdown-css-class="select2-teal">
					 <option value="" selected disabled>Select Is Admin</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				  </select>  
                      </div>
					</div>
					<div class="col-md-4">
					<label>Admin Type</label>
					 <div class="form-group">
						<select class="form-control select2" name="EMP_TYPE" id="admin_type" data-dropdown-css-class="select2-teal">
					
					
				  </select>  
                      </div>
					</div>
					 <div class="col-md-4">
                        <label>Mobile</label>
                        <div class="form-group">
                            <input name="EMP_MOBILE_NO" class="form-control" placeholder="Mobile" maxlength="10">
                        </div>
                      </div>
					
					</div>	
					
                   
                   
                  
					<div class="row">
					<div class="col-md-4">
					<label>Job Type</label>
					<div class="form-group">   
                   <select class="form-control select2" name="EMP_CONTRACT_TYPE" data-dropdown-css-class="select2-teal">
					 <option value="" selected>Select Job Type</option>
					 <option value="0">Permanent</option>
					 <option value="1">Contract</option>
				  </select>    		  
                   </div>
					</div>
					<div class="col-md-4">
					<label>Approver</label>
					 <div class="form-group">
						<select class="form-control select2" name="APPROVER_ID" data-dropdown-css-class="select2-teal">
					 <option value="" selected>Select Approver</option>
					 @isset($emp)
					 @foreach ($emp as $value)
					<option value="{{ $value['EMP_ID'] }}">{{ $value['EMP_NAME'] }} 	
					</option>
					@endforeach 
					@endisset
				  </select>  
                      </div>
					</div>
					<div class="col-md-4">
                        <label>Reports To</label>
                         <div class="form-group">
						<select class="form-control select2" name="REPORTING_MANAGER_ID" data-dropdown-css-class="select2-teal">
					 <option value="" selected>Select Reporter</option>
					 @isset($emp)
					 @foreach ($emp as $value)
					<option value="{{ $value['EMP_ID'] }}">{{ $value['EMP_NAME'] }} 	
					</option>
					@endforeach 
					@endisset
				  </select>  
                      </div>
                      </div>
					
					
					</div>
					<div class="row">
					<div class="col-md-4">
					<label>Level</label>
					 <div class="form-group">
						<select class="form-control select2" name="LEVEL_ID" data-dropdown-css-class="select2-teal">
					 <option value="" selected>Select Level</option>
					 @isset($level)
					 @foreach ($level as $value)
					<option value="{{ $value['LEVEL_RANK_ID'] }}">{{ $value['LEVEL_NAME'] }} 	
					</option>
					@endforeach 
					@endisset
				  </select>  
                      </div>
					</div>
					<div class="col-md-4">
					<label>Vehicle Ownership</label>
					 <div class="form-group">
						<select class="form-control select2" name="VEHICLE_OWNERSHIP" data-dropdown-css-class="select2-teal">
					 <option value="" selected>Select Vehicle Ownership</option>
					<option value="1">Company</option>
					<option value="2">Self</option>
				  </select>  
                      </div>
					</div>
					<div class="col-md-4">
					<label>Vehicle Type</label>
					 <div class="form-group">
						<select class="form-control select2" name="VEHICLE_TYPE" data-dropdown-css-class="select2-teal">
					 <option value="" selected>Select Vehicle Type</option>
					<option value="1">Car</option>
					<option value="2">Motorcycle</option>
				  </select>  
                      </div>
					</div>
					
					</div>	
					
					 <div class="row">
					<div class="col-md-4">
					<label>Region *</label>
					 <div class="form-group">
						<select class="form-control select2" name="REGION_ID" onchange="empRegion(event)" data-dropdown-css-class="select2-teal" required>
					 <option value="" selected>Select Region</option>
					 @isset($region)
					 @foreach ($region as $values)
					<option value="{{ $values['REGION_ID'] }}">{{ $values['REGION_NAME'] }} 	
					</option>
					@endforeach 
					@endisset
				  </select>  
                      </div>
					</div>
                       
                      
                    
                      <div class="col-md-4">
                        <label>Area</label>
                        <div class="form-group">
						<select class="form-control select2"  name="AREA_ID" id="empdist" data-dropdown-css-class="select2-teal">
					 <option value="" selected>Select Area</option>
					 
				  </select>  
                      </div>
                      </div>
					  
                      <div class="col-md-4">
                        <label>Plant</label>
                        <div class="form-group">
						<select class="form-control select2"  name="PLANT_ID" id="region_plant" data-dropdown-css-class="select2-teal">
					 <option value="" selected>Select Plant</option>
					
				  </select>  
                      </div>
                      </div>
					  
                    </div>
					
					<div class="row">
					<div class="col-md-4">
					<label>Password *</label>
					<div class="form-group">
                       <input name="PASSWORD" class="form-control" value="123456" placeholder="Password" required>
                        </div>
					</div>
					</div>
						
                      </div>
					  <div class="card-footer">
                    <button type="submit" class="btn btn-success btn-normal" style="float:left;"><i class="fa fa-save"></i> Save</button>
                  </div>
				  </form>
                   
                  </div>
				  
                
				</div>
				</div>
             
			
        
		</div>
      </section>

@endsection