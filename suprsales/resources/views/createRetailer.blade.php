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
              <h1>Create Retailer</h1>
            </div>

            <div class="col-sm-9">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('dashboard.index')}}">Home</a></li>
                <li class="breadcrumb-item active">Retailer</li>
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
              </div>
			  <div class="card-body">
                @php
				$id = Auth::user()->emp_id;
				$createretailer = $id;
				@endphp
				<form class="form-horizontal" action="{{route('createretailer.update',$id)}}" method="POST" enctype="multipart/form-data">
			 {{ csrf_field() }}
			 {{ method_field('PUT') }}
                  <div class="card card-success">
                      <div class="card-header">
            <h3 class="card-title">Upload CSV File</h3>
  
            <div class="card-tools">
			<form class="form-horizontal" action="{{route('createretailer.destroy', $createretailer)}}" method="POST">
						  @csrf
								@method('DELETE')
								
					   <button class='btn btn-light btn-sm' type="submit"  title="Download CSV Format">
                             <i class='fas fa-download'></i> CSV Format     
                          </button> 
						  </form>
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
					  <form class="form-horizontal" action="{{route('createretailer.store')}}" method="POST">
			 {{ csrf_field() }}
                       <div class="row">
              <div class="col-md-12">
                        <label>Name</label>
                        <div class="form-group">

                          
                            <input name="RETAILER_NAME" class="form-control" placeholder="Full Name" required>
                         
                        </div>
                      </div>
				
                  </div>
				  
				  <div class="row">
              <div class="col-md-4">
			   <label>GSTIN</label>
				 <div class="form-group">
                   
                    
                      <input  name="RETAILER_GSTIN" class="form-control" placeholder="GSTIN" required>
                    
                </div>
				</div>
				<div class="col-md-4">
			   <label>Mobile</label>
				 <div class="form-group">
                   
                    
                      <input  name="RETAILER_MOB" class="form-control" placeholder="Mobile" maxlength="10" required>
                    
                </div>
				</div>
				<div class="col-md-4">
				<label>Date of Birth</label>
				<div class="form-group">
                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                        <input type="text" name="RETAILER_DOB" class="form-control datetimepicker-input" data-target="#reservationdate" placeholder="DOB" required />
                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>
                 </div>
                  </div>
				  
				  <div class="row">
              <div class="col-md-4">
			  <label>Aadhar</label>
				 <div class="form-group">
                    
                   
                      <input  name="RETAILER_AADHAR_ID" class="form-control" maxlength="12" placeholder="Aadhar Number" required>
                    
                </div>
				</div>
				<div class="col-md-4">
				<label>PAN</label>
				 <div class="form-group">
				 
                   
                      <input  name="RETAILER_PAN" class="form-control" placeholder="PAN Number" required>
                   
                </div>
                 </div>
                  
              
				<div class="col-md-4">
				<label>Account</label>
				 <div class="form-group">
				 
                    
                      <input  name="RETAILER_BANK_ACC_NO" class="form-control" placeholder="Account Number XXXXXXX" required>
                   
                </div>
                 </div>
                  </div>
				  
				  <div class="row">
              <div class="col-md-12">
			   <label>Address 1</label>
				 <div class="form-group">
                   
                    
                      <input  name="RETAILER_ADDRESS1" class="form-control" placeholder="Address 1" required>
                    
                </div>
				</div>
                  </div>
				   <div class="row">
              <div class="col-md-12">
			   <label>Address 2</label>
				 <div class="form-group">
                   
                    
                      <input  name="RETAILER_ADDRESS2" class="form-control" placeholder="Address 2" required>
                   
                </div>
				</div>
                  </div>
				   <div class="row">
              <div class="col-md-12">
			   <label>Address 3</label>
				 <div class="form-group">
                   
                  
                      <input  name="RETAILER_ADDRESS3" class="form-control" placeholder="Address 3" required>
                    
                </div>
				</div>
                  </div>
				 <div class="row">
				
				 <div class="col-md-4">
				 
				 <div class="form-group">
                    
                      <select class="form-control select2" name="REGION_ID" onchange="reatiler_region(event)"  data-dropdown-css-class="select2-teal" required>
					 <option value="" selected>Select Region</option>
					  @isset($region)
					 @foreach ($region as $valu)
					<option value="{{ $valu['REGION_ID'] }}">{{ $valu['REGION_NAME'] }}</option>
					@endforeach 
					@endisset
				  </select>
                   
                </div>
				      
                 </div>
				  <div class="col-md-4">
				 <div class="form-group">
                    
                      <select class="form-control select2" name="AREA_ID" id="dist" data-dropdown-css-class="select2-teal">
					 <option value="" selected>Select Area</option>
				  </select>
                    
                </div>
                 </div>
				
				 <div class="col-md-4">
				 <div class="form-group">
                    
                      <input  name="RETAILER_PINCODE" class="form-control" placeholder="Pincode" required>
                   
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