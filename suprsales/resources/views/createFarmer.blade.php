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
              <h1>Create Farmer</h1>
            </div>

            <div class="col-sm-9">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('dashboard.index')}}">Home</a></li>
                <li class="breadcrumb-item active">Farmer</li>
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
				$createfarmer = $id;
				@endphp
				<form class="form-horizontal" action="{{route('createfarmer.update',$id)}}" method="POST" enctype="multipart/form-data">
			 {{ csrf_field() }}
			 {{ method_field('PUT') }}
                  <div class="card card-success">
                     <div class="card-header">
            <h3 class="card-title">Upload CSV File</h3>
  
            <div class="card-tools">
			<form class="form-horizontal" action="{{route('createfarmer.destroy', $createfarmer)}}" method="POST">
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
					 <form class="form-horizontal" action="{{route('createfarmer.store')}}" method="POST">
			 {{ csrf_field() }}
                      
                       <div class="row">
                      <div class="col-md-12">
                        <label>Name</label>
                        <div class="form-group">
                            <input name="FARMER_NAME" class="form-control" placeholder="Full Name" required>
                        </div>
                      </div>
                      
                    </div>

                    <div class="row">
                      <div class="col-md-4">
                        <label>Father's Name</label>
                        <div class="form-group">

                          
                            <input name="FARMER_FATHER_NAME" class="form-control" placeholder="Name">
                          
                        </div>
                      </div>
                      <div class="col-md-4">
                        <label>Date of Birth</label>
                        <div class="form-group">
                          <div class="input-group date" id="reservationdate" data-target-input="nearest">
                            <input type="text" name="FARMER_DOB" class="form-control datetimepicker-input" data-target="#reservationdate" placeholder="DOB" required />
                            <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                              <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                          </div>
                        </div>
                      </div>
					  <div class="col-md-4">
                        <label>Mobile</label>
                        <div class="form-group">
                            <input name="FARMER_MOB" class="form-control" placeholder="Mobile" maxlength="10">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      
                      <div class="col-md-4">
                        <label>Aadhar</label>
                        <div class="form-group">
                            <input name="FARMER_AADHAR_ID" class="form-control" maxlength="12" placeholder="Aadhar Number">
                        </div>
                      </div>
                    
                      <div class="col-md-4">
                        <label>Land Holding</label>
                        <div class="form-group">
                            <input name="LAND_HOLDING" class="form-control" placeholder="Land Holding">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <label>Account</label>
                        <div class="form-group">
                            <input name="FARMER_BANK_ACC_NO" class="form-control" placeholder="Account Number XXXXXXX">
                        </div>
                      </div>
					  
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <label>Major Crop 1</label>
                        <div class="form-group">

                            <input name="MAJOR_CROP_1" class="form-control" placeholder="Major Crop 1">
                         
                        </div>
                      </div>
                      <div class="col-md-4">
                        <label>Major Crop 2</label>
                        <div class="form-group">

                            <input name="MAJOR_CROP_2" class="form-control" placeholder="Major Crop 2">
                         
                        </div>
                      </div>

                    
                      <div class="col-md-4">
                        <label>Major Crop 3</label>
                        <div class="form-group">

                          
                            <input name="MAJOR_CROP_3" class="form-control" placeholder="Major Crop 3">
                        
                        </div>
                      </div>


                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <label>Village</label>
                        <div class="form-group">
                            <input name="FARMER_VILLAGE" class="form-control" placeholder="Village">
                        </div>
                      </div>
					  <div class="col-md-6">
                        <label>Tehsil</label>
                        <div class="form-group">
                            <input name="FARMER_TEHSIL" class="form-control" placeholder="Tehsil">
                        </div>
                      </div>
                    </div> 
					
					<div class="row">
					
					<div class="col-md-4">
					 <div class="form-group">
						<select class="form-control select2" onchange="myRegion(event)" name="REGION_ID" data-dropdown-css-class="select2-teal">
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
                       <input name="FARMER_PINCODE" class="form-control" placeholder="Pincode">
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