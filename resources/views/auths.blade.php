{{-- This is the layout for Create_authorization --}}
@extends('layouts.authorization_table')
{{-- content part inside  Create_authorization --}}
@section('content')

  {{-- It is for veryfy the customer and verified by their ids --}}
      @if ($message = Session::get('success'))
      <div class="alert alert-success">
        <p>{{ $message }}</p>
      </div>
      @endif
   {{-- If not verified then it will show error --}}

	@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
{{-- It shows Create Authorization table inside Create Authorization --}}
 <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Create Authorization</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
         {{-- It is the link of Home btn top right corner --}}
              <li class="breadcrumb-item"><a href="{{ route('dashboard.index')}}">Home</a></li>
              <li class="breadcrumb-item active">Authorization</li>
            </ol>
          </div>
        </div>

		 </div><!-- /.container-fluid -->
    </section>
 <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">

              <div class="modal fade text-left authModal">
        <div class="modal-dialog">
          <div class="modal-content" style="width: 600px; height: 100px;">
  {{-- This is for the edit btn inside Action bar in the table  and it will update the api in the Suprsales_api->Authorization->api-update--}}
                <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Edit Authorization</h3>
				 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              </div>
   {{-- This form popup after clicking  edit btn inside Action bar  --}}
      <form class="form-horizontal" id="auth_form" method="POST">

                <div class="card-body">
				<input type="hidden" name="auth_id" id="auth_Id" class="form-control"  value="">
           {{-- inputEmail3 is used for particular users --}}
				<div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Authorization Name</label>
                    <div class="col-sm-8">
                    <input name="auth_name" id="auth_name" class="form-control"  value="">
                    </div>
                  </div>
				   <div class="form-group row select2-teal">
                  <label class="col-sm-4">Screen Name</label>
				  <div class="col-sm-8">
					<input  id="screen_name" class="form-control"  value="" readonly>
				  </div>
                </div>
				 <div class="form-group row select2-teal">
                  <label class="col-sm-4">Module Name</label>
				  <div class="col-sm-8">
					 <input  class="form-control" id="module_name"  value="" readonly>
				  </div>
                </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-4 col-form-label">Description</label>
                    <div class="col-sm-8">
                      <input name="description" id="description" class="form-control"  value="">
                    </div>
                  </div>
				  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-4 col-form-label">Activate</label>
                    <div class="col-sm-8">
          {{-- It is for the Active user and flag is used for the on off checkbox --}}
                    <input type="checkbox" name="flag" id="flag" class="flag" data-bootstrap-switch data-off-color="danger" data-on-color="success" value="">
                       </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-warning float-right">Update</button>
                  <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
                </div>

              </form>

            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>



   {{-- THis is for the create btn in the top of the table it will Create Authorization --}}
     {{-- This is for the create btn it will create the api in the Suprsales_api->Authorization->api-create--}}

	      <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content" style="width: 600px; height: 100px;">

                <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Create Authorization</h3>
				 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
   {{-- It is for the Created Authorization will store insdie the Auth store --}}
              <form class="form-horizontal" action="{{route('auths.store')}}" method="POST">
		{{-- This function can be used to generate the hidden input field in the HTML form --}}
                {{ csrf_field() }}
                <div class="card-body">


				<div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Authorization Name</label>
                    <div class="col-sm-8">
                      <input name="auth_name" class="form-control"  placeholder="Name" required>
                    </div>
                  </div>
        {{-- It is for Screen Name dropdown  the value get from SCREEN_NAME and store as SCREEN_ID --}}
                  <div class="form-group row select2-teal">
                    <label class="col-sm-4 col-form-label">Screen Name</label>
                    <div class="col-sm-8">
                     <select class="form-control select2"  name="screen_id" data-dropdown-css-class="select2-teal">
					  <option value="" selected>Select Screen</option>
					  @isset($screen)
				        @foreach ($screen as $valu)
				          <option value="{{ $valu['SCREEN_ID'] }}">{{ $valu['SCREEN_NAME'] }}</option>
				        @endforeach
                      @endisset
                     </select>
                    </div>
                  </div>

        {{-- It is for Module Name dropdown  the value get from MODULE_NAME and store as MODULE_ID --}}
				   <div class="form-group row select2-teal">
                    <label class="col-sm-4 col-form-label">Module Name</label>
                    <div class="col-sm-8">
                      <select class="form-control select2"  name="module_id" data-dropdown-css-class="select2-teal">
					   <option value="" selected>Select Module</option>
					  @isset($module)
				        @foreach ($module as $valu)
				          <option value="{{ $valu['MODULE_ID'] }}">{{ $valu['MODULE_NAME'] }}</option>
				        @endforeach
                      @endisset
                      </select>
                    </div>
                  </div>
                  {{-- This class is create for the Description, if you want to add something for the user --}}
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-4 col-form-label">Description</label>
                    <div class="col-sm-8">
                      <input name="description" class="form-control" placeholder="Description" required>
                    </div>
                  </div>

                </div>
                <!-- /.card-body -->

                <!-- /.card-footer -->
                {{-- It is for the update btn use for submit the form and cancel btn --}}
				<div class="card-footer">
                  <button type="submit" class="btn btn-info float-right">Create</button>
                  <button type="submit" class="btn btn-info" data-dismiss="modal">Cancel</button>
                </div>
              </form>
            </div>




          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

{{-- It will show the table data inside the the table it shown the individual perdon individual data --}}
			  <div class="card-body">

			  <table id="authorization" class="table table-bordered table-hover">
			  <thead>
                  <tr>

                    <th>Name</th>
                    <th>Description</th>

					<th>Screen</th>
					 <th>Module</th>
					<th>Action</th>
					<th class="text-center">
                          Status
                      </th>
                  </tr>
                  </thead>
                  <tbody>
                      {{-- Admins contain all data stor eas the value which can call conain data --}}
				  @isset($admins)
			   @foreach ($admins as $value)

            <tr>

					<td>{{ $value['AUTH_NAME'] }}</td>
					<td>{{ $value['DESCRIPTION'] }}</td>
					<td>{{ $value['SCREEN_LINK'] }}</td>

					<td class="text-center">
						{{ $value['MODULE_PATH'] }}
						</td>
					 <td>
    {{-- encoded the json value inside $auths and for the auths users the edit btn is working define by AUTH_ID --}}
				     @php
				$auths = json_encode($value);
				@endphp

					   <a class='btn btn-warning btn-sm auths' href='#' value="{{$auths}}" id="{{$value['AUTH_ID']}}" title="Edit">
                             <i class='fas fa-edit'></i>
                          </a>
                      </td>
      {{-- It shows the activated deactivate valus if the flag value is 1 then only it shows Active or passive  --}}
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

           {{-- If there is no record it will show that --}}
			@empty($admins)
			<script>toastr.warning("No records found.");</script>
			@endempty

</tbody>
</table>

</div>

            </div>
            <!-- /.card -->
            <!-- /.card -->

          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
@endsection
