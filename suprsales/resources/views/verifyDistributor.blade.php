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
              <h1>Verify Distributor</h1>
            </div>

            <div class="col-sm-9">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('dashboard.index')}}">Home</a></li>
                <li class="breadcrumb-item active">Verify Distributor</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
	 


      <!-- Main content -->
      <section class="content">
	  
        <div class="container-fluid">
	  <div class="icheck-primary d-inline">
                        <input type="checkbox" id="verified_user">
                        <label for="verified_user">
                        </label>
                      </div> View Verified Distributors
	  
					  <hr>
					  
					  <div class="card" id="user">
					  <div class="card-header">
					  <div class="row">
					  <div class="col">
              <h4>All Verified Distributors</h4>
            </div>
					
                    <button type="submit" class="btn btn-info btn-normal" style="float:right;"><i class="fa fa-download"></i> Download</button>
                  </div>
					</div>
					<div class="card-body">
			 
			  <table id="verify-table" class="table table-bordered table-hover" >
			  <thead>
                
				  
        <tr>
                        
						 <th>Name</th> 
						  <th>Assigned To</th>
						   <th>Region</th>
                        <th>City</th>
						<th>Mobile</th>
                        <th>Status</th>
                        
                    </tr>
               
                  </thead>
                  <tbody>
				  @isset($dist)
				  @foreach ($dist as $value)
                 <tr>
				<td>{{ $value['DISTRIBUTOR_NAME'] }}</td>
				<td>{{ $value['EMP_NAME'] }}</td>
				<td>{{ $value['REGION_NAME'] }}</td>
				<td>{{ $value['DISTRIBUTOR_DISTRICT'] }}</td>
				<td>{{ $value['DISTRIBUTOR_MOB_NO'] }}</td>
				  @if($value['FLAG'] =='1')         
						<td class='project-state'>
                          <span class='badge badge-success'>Activated</span>
                      </td>
				@else
						<td class='project-state'>
                          <span class='badge badge-danger'>Deactivated</span>
                      </td>       
				@endif
				 </tr>
				 @endforeach
				 @endisset
				 @empty($dist)
			<script>toastr.warning("No records found.");</script>
			@endempty	
					</tbody>
					</table>

					</div>			  
             
			  
              <!-- /.card-body -->
            </div>
					 
					 
					  
				<div class="card" id="non_user">
				<div class="card-header bg-light">
				
				 <div class="row">
                  <label class="col-md-2 col-form-label">Distributor</label>
				  <div class="col-md-10">  
                <select class="form-control select2" onchange="verifydist(event)" data-dropdown-css-class="select2-teal" style="width: 100%;" required>
					 <option value="" selected>Select Distributor</option>
					 @isset($levels)
					 @foreach($levels as $value)
					 <option value="{{$value['DISTRIBUTOR_ID']}}">{{$value['DISTRIBUTOR_NAME']}}</option>
					 @endforeach
					 @endisset
				  </select>   
				  </div>
                </div>
				</div>
				<form role="form-horizontal" action="{{route('verifydistributor.store')}}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
			 <div class="card-body">
                    
					
      
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
			   <label>Father's Name</label>
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
			  <label>Email</label>
				 <div class="form-group">
                    
                   
                      <input  name="RETAILER_AADHAR_ID" class="form-control" maxlength="12" placeholder="Aadhar Number" required>
                    
                </div>
				</div>
				<div class="col-md-4">
				<label>Aadhar</label>
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
              <div class="col-md-4">
			  <label>GSTIN</label>
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
				<label>IIL Licence No</label>
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
				<label>Region</label>
				 <div class="form-group">
				 
                   
                      <input  name="RETAILER_PAN" class="form-control" placeholder="PAN Number" required>
                   
                </div>
                 </div>
				 <div class="col-md-4">
				<label>Area</label>
				 <div class="form-group">
				 
                   
                      <input  name="RETAILER_PAN" class="form-control" placeholder="PAN Number" required>
                   
                </div>
                 </div>
				
				<div class="col-md-4">
				<label>Pincode</label>
				 <div class="form-group">
				 
                   
                      <input  name="RETAILER_PAN" class="form-control" placeholder="PAN Number" required>
                   
                </div>
                 </div>
                  </div>
				  <div class="row">
					<div class="col-md-12">
				<label>Attachments (PDF)</label>
				 <div class="custom-file">
				  <input type="file" name="filename" accept=".pdf" id="filename" class="custom-file-input" value="">
				  <label class="custom-file-label"  for="exampleInputFile"></label>
				</div> 
                 </div>	
				 </div>	
				 
				 </div>
					<div class="card-footer">
					
                    <button type="submit" class="btn btn-success btn-normal" style="float:left;"><i class="fas fa-check-circle"></i> Verify</button>
                  </div>		
			</form>
		</div>
		</div>
      </section>

@endsection