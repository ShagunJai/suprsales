{{-- It is use for the header footer sidebar --}}
@extends('layouts.app')
{{-- Main section is for the content when the working shows --}}
@section('content')
{{-- It is for veryfy the customer and verified by their ids --}}

      @if ($message = Session::get('success'))
      <div class="alert alert-success">
        <p>{{ $message }}</p>
      </div>
      @endif

  {{-- It is for create employee inside the user --}}
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-3">
              <h1>Create Employee</h1>
            </div>
    {{-- It is the link of Home btn top right corner --}}
            <div class="col-sm-9">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('dashboard.index')}}">Home</a></li>
                <li class="breadcrumb-item active">Create Employee</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>


      {{-- This section shows two methods inside Create Employee --}}

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">


				<div class="card">

				<div class="card-header">
                <h3 class="card-title">Upload CSV or Create Single Record</h3>
                 {{-- this is use for authorize emp_id inside $id--}}
				@php
				$id = Auth::user()->emp_id;
				$createemployee = $id;
				@endphp
               <form class="form-horizontal" action="{{route('createemployee.destroy', $createemployee)}}" method="POST">
						  @csrf
								@method('DELETE')
            {{-- It gives the csv Format for user to download the CSV file --}}

                                <button class='btn btn-light btn-sm' style="float:right;" type="submit"  title="Download CSV Format">
                             <i class='fas fa-download'></i> CSV Format
                          </button>
						  </form>
              </div>
	<div class="card-body">
           {{-- Uploading the CSV file after choose the file from device --}}
		<form class="form-horizontal" action="{{route('createemployee.update',$id)}}" method="POST" enctype="multipart/form-data">
			{{-- This function can be used to generate the hidden input field in the HTML form --}}
            {{ csrf_field() }}
			 {{ method_field('PUT') }}
             <div class="card card-success">
                <div class="card-header">
         {{-- It will save the Employee detais after ceating by the csv file then automatically destroy the file --}}
            <h3 class="card-title">Upload CSV File</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Expand">
                <i class="fas fa-minus"></i></button>

            </div>
          </div>
         {{-- To choose the file from device as the browse btn --}}
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
              {{-- This is the save btn working as a submit btn  --}}
					  <div class="card-footer">
                    <button type="submit" class="btn btn-success btn-normal" style="float:left;" onclick="spinner()"><i class="fa fa-save"></i> Save</button>
                  <div class="loader">
					  <div class="loading">
					  </div>
					</div>
				  </div>
                  </div>
				  </form>

        {{-- It is the create fild which provide the form for user can upload data manually inside Cretate Employee --}}
				  <div class="card card-success">
                     <div class="card-header">
            <h3 class="card-title">Create</h3>
          {{-- It provide the form by clicking + btn in the same field which it is the extends btn for create --}}
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Expand">
                <i class="fas fa-minus"></i></button>

            </div>
          </div>

                {{-- It is the form by which employees can upload data manually --}}

                   <div class="card-body">
            {{-- Instead of defining all of your request handling logic as closures in your route files, it may wish to organize this behavior using "controller" classes. Controllers can group related request handling logic into a single class --}}
					 <form class="form-horizontal" action="{{route('createemployee.store')}}" method="POST">
             {{-- generate the hidden input field in the HTML form --}}
                        {{ csrf_field() }}

                    <div class="row">
            <!-- This is the tag for the Name -->
                      <div class="col-md-12">
                        <label>Name *</label>
                        <div class="form-group">
                            <input name="EMP_NAME" class="form-control" placeholder="Full Name" required>
                        </div>
                      </div>
                    </div>
          <!-- This is the tag for the Email -->
                <div class="row">
                  <div class="col-md-4">
                   <label>Email *</label>
                  <div class="form-group">
                    <input name="EMP_EMAIL" class="form-control" placeholder="Email" required>
                  </div>
                </div>
          <!-- This is the tag for the Code -->
                <div class="col-md-4">
                   <label>Code *</label>
                    <div class="form-group">
                      <input name="EMP_CODE" class="form-control" placeholder="Code" required>
                    </div>
                </div>
             <!-- This is the tag for the Designation -->
                <div class="col-md-4">
                    <label>Designation</label>
                    <div class="form-group">
                      <input name="EMP_DESIGNATION" class="form-control" placeholder="Designation">
                    </div>
                </div>
        </div>
                {{-- Is Admin is controlling admin type  wtih the help of adminType() and onchange use for changing the value  --}}
                    {{-- the adminType () decleard in app.blade.php --}}
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
                    {{-- admin_type is controlled by Is Admin --}}
					<div class="col-md-4">
					 <label>Admin Type</label>
					  <div class="form-group">
						<select class="form-control select2" name="EMP_TYPE" id="admin_type" data-dropdown-css-class="select2-teal">
				        </select>
                      </div>
					</div>
           <!-- This is the tag for the Mobile -->
					 <div class="col-md-4">
                        <label>Mobile</label>
                        <div class="form-group">
                            <input name="EMP_MOBILE_NO" class="form-control" placeholder="Mobile" maxlength="10">
                        </div>
                      </div>
					</div>
           <!-- This is the tag for the Job Type -->
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

                    {{-- here  dropdown came with all employee name and after selecting Employee_id will send to database --}}
					<div class="col-md-4">
					<label>Approver</label>
					 <div class="form-group">
						<select class="form-control select2" name="APPROVER_ID" data-dropdown-css-class="select2-teal">
					 <option value="" selected >Select Approver</option>
                     {{-- $emp contains all Employee with their IDs and get from suprsales_api and decleard in CreateEmployeeController.php--}}
					 @isset($emp)
					 @foreach ($emp as $value)

                     {{-- By selecting the EMP_NAME the EMP_ID will send to the database --}}
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
                {{-- By selecting the EMP_NAME the EMP_ID will send to the database --}}

					<option value="{{ $value['EMP_ID'] }}">{{ $value['EMP_NAME'] }}
					</option>
					@endforeach
					@endisset
				  </select>
                      </div>
                      </div>
					</div>
                    {{-- here  dropdown came with all Select Level and after selecting LEVEL_RANK_ID will send to database --}}
			<div class="row">
				<div class="col-md-4">
					<label>Level</label>
					 <div class="form-group">
						<select class="form-control select2" name="LEVEL_ID" data-dropdown-css-class="select2-teal">
					       <option value="" selected>Select Level</option>
					@isset($level)
					   @foreach ($level as $value)
					       <option value="{{ $value['LEVEL_RANK_ID'] }}">{{ $value['LEVEL_NAME'] }}</option>
					   @endforeach
					@endisset
				        </select>
                    </div>
				</div>
            <!-- This is the tag for the Vehicle Ownership It shows two option as an value 1 and 2 -->
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

            <!-- This is the tag for the VEHICLE_TYPE It shows two option as an value 1 and 2 -->
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
  {{-- here  dropdown came with all REGION_NAME and after selecting REGION_ID will send to database --}}
		<div class="row">
			<div class="col-md-4">
				<label>Region *</label>
				<div class="form-group">
   {{-- Here OnChange event Is use for changing the region name after changing select Region --}}
				  <select class="form-control select2" name="REGION_ID" onchange="empRegion(event)" data-dropdown-css-class="select2-teal" required>
					<option value="" selected>Select Region</option>
				@isset($region)
				  @foreach ($region as $values)
					<option value="{{ $values['REGION_ID'] }}">{{ $values['REGION_NAME'] }}</option>
				  @endforeach
				@endisset
				  </select>
                </div>
			</div>
           <!-- This is the tag for the Area -->
            <div class="col-md-4">
               <label>Area</label>
               <div class="form-group">
			     	<select class="form-control select2"  name="AREA_ID" id="empdist" data-dropdown-css-class="select2-teal">
					 <option value="" selected>Select Area</option>
                    </select>
                </div>
            </div>
           <!-- This is the tag for the Plant -->
             <div class="col-md-4">
                <label>Plant</label>
                <div class="form-group">
					<select class="form-control select2"  name="PLANT_ID" id="region_plant" data-dropdown-css-class="select2-teal">
					<option value="" selected>Select Plant</option>
				    </select>
                </div>
             </div>
        </div>
           <!-- This is the tag for the Password -->
		<div class="row">
			<div class="col-md-4">
			  <label>Password *</label>
				<div class="form-group">
                 <input name="PASSWORD" class="form-control" value="123456" placeholder="Password" required>
                </div>
			</div>
		</div>
                </div>
          {{-- TO submit the form with employee details and Save the details--}}
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
