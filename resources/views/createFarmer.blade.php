{{-- It is for layout header, footer and sidebar --}}
@extends('layouts.app')
{{-- Main section is for the content when the working shows --}}
@section('content')
  {{-- It is for veryfy the customer and verified by their ids --}}
      @if ($message = Session::get('success'))
      <div class="alert alert-success">
        <p>{{ $message }}</p>
      </div>
      @endif
{{-- After verification It is for create Farmer inside the user --}}

      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-3">
              <h1>Create Farmer</h1>
            </div>
    {{-- It is the link of Home btn top right corner --}}
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
        {{-- This section shows two methods inside Create Farmer --}}
      <section class="content">
        <div class="container-fluid">


				<div class="card">
				<div class="card-header">
                <h3 class="card-title">Upload CSV or Create Single Record</h3>
              </div>
			  <div class="card-body">
          {{-- this is use for authorize emp_id --}}
				@php
				$id = Auth::user()->emp_id;
				$createfarmer = $id;
				@endphp
                {{-- instead of injecting a user's ID, you can inject the entire User model instance that matches the given ID. --}}
				<form class="form-horizontal" action="{{route('createfarmer.update',$id)}}" method="POST" enctype="multipart/form-data">
              {{-- This function can be used to generate the hidden input field in the HTML form --}}
             {{ csrf_field() }}
			 {{ method_field('PUT') }}
      {{-- It gives the csv Format for user to download the CSV file --}}

                  <div class="card card-success">
                     <div class="card-header">
            <h3 class="card-title">Upload CSV File</h3>
{{-- It will save the farmer detais after ceating by the csv file then automatically destroy the file --}}
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
             {{-- The browse option ude to choose the file from the device  --}}
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
            {{-- After clicking the save btn it download another xlsx file because of the save class and the --}}
                    <button type="submit" class="btn btn-success btn-normal" style="float:left;" onclick="spinner()"><i class="fa fa-save"></i> Save</button>
                  <div class="loader">
					  <div class="loading">
					  </div>
					</div>
				  </div>

                  </div>
				  </form>

          {{-- This is for the manual update the create farmer form --}}
				  <div class="card card-success">
                     <div class="card-header">
            <h3 class="card-title">Create</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Expand">
                <i class="fas fa-minus"></i></button>

            </div>
          </div>
          {{-- After completion the form it will directly store the data for the farmer to the create farmer store by help of route --}}
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
                      {{-- This provides a choose calender --}}
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
                    {{-- here  dropdown came with all REGION_NAME and after selecting REGION_ID will send to database --}}

					<div class="col-md-4">
					 <div class="form-group">
						<select class="form-control select2" onchange="myRegion(event)" name="REGION_ID" data-dropdown-css-class="select2-teal">
					 <option value="" selected>Select Region</option>
					 @isset($region)
					 @foreach ($region as $valu)
					<option  value="{{ $valu['REGION_ID'] }}">{{ $valu['REGION_NAME'] }}</option>
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
                    </form>

                      </div>
                      {{-- this is the save btn for the manually updated the form after it work as submit btn and send the data to database --}}
					  <div class="card-footer">
                    <button type="submit" class="btn btn-success btn-normal" style="float:left;"><i class="fa fa-save"></i> Save</button>
                  </div>


                  </div>


				</div>
				</div>



		</div>
      </section>

@endsection
