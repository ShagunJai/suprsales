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

{{-- This is the section inside the role  --}}
 <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Create Role</h1>
          </div>
          {{-- It is the link of Home btn top right corner --}}
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard.index')}}">Home</a></li>
              <li class="breadcrumb-item active">Create Role</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    {{-- It shows the table inside the Create Role --}}
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">

			 <div class="modal fade text-left roleModal">
        <div class="modal-dialog">
          <div class="modal-content" style="width: 600px; height: 100px;">

            {{-- It will shows the popup after clicking the edit btn inside the action bar --}}
                <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Edit Role</h3>
				 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              </div>
          <input type="hidden" name="role_id" id="role_Id" class="form-control"  value="">
      {{-- IT is the form which shows after clicking the edit bt to assign roles for the particular users  --}}
      <form class="form-horizontal" id="role_form" method="POST">
{{-- This function can be used to generate the hidden input field in the HTML form --}}
              {{ csrf_field() }}
			  {{ method_field('PUT') }}
              {{-- it will shows the previous data inside the value="" --}}
                <div class="card-body">
				<div class="form-group row">
                    <label class="col-sm-4 col-form-label">Role Name</label>
                    <div class="col-sm-8">
                      <input  class="form-control" name="role_name" id="role_name" value="">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Role Description</label>
                    <div class="col-sm-8">
                      <input class="form-control" name="role_description" id="role_description" value="">
                    </div>
                  </div>
                  {{-- This is the select option used for the multiple selection --}}
				  <div class="form-group row select2-teal">
                  <label class="col-sm-4 col-form-label">Authorization</label>
				  <div class="col-sm-8">
                  <select class="select2" multiple="multiple" name="auth_id[]" id="auth_id" data-placeholder="Select Authorization" data-dropdown-css-class="select2-teal">
               @foreach ($auths as $auth)
			   <option value="{{$auth['AUTH_ID']}}">
						  {{ $auth['AUTH_NAME'] }}
			   </option>
			   @endforeach
                  </select>
				  </div>
                </div>
            {{-- this is use for the activate btn by using flag --}}
				  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-4 col-form-label">Activate</label>
                    <div class="col-sm-8">

                    <input type="checkbox" name="flag" id="flag" class="flag" data-bootstrap-switch data-off-color="danger" data-on-color="success" value="">
                       </div>
                  </div>
                </div>
                <!-- /.card-body -->
                {{-- It is for the update btn use for submit the form and cancel btn --}}
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

       {{-- this form will visible after clicking the blue create btn in the top --}}
			 <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content" style="width: 600px; height: 100px;">

                <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Create Role</h3>
				 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
      {{-- after submit the the form it will store in te role store --}}
			  <form role="form-horizontal" action="{{route('roles.store')}}" method="POST">
			 {{ csrf_field() }}
                <div class="card-body">
				<div class="form-group row">
                    <label class="col-sm-4 col-form-label">Role Name</label>
                    <div class="col-sm-8">
                      <input class="form-control" name="role_name" placeholder="Role Name" required>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Role Description</label>
                    <div class="col-sm-8">
                      <input class="form-control" name="role_description" placeholder="Role Description" required>
                    </div>
                  </div>

				   <div class="form-group row select2-teal">
                  <label class="col-sm-4 col-form-label">Authorization</label>
				  <div class="col-sm-8">

                  <select class="select2" multiple="multiple" name="auth_id[]" data-placeholder="Select Authorization" data-dropdown-css-class="select2-teal" required>

				   @foreach ($auths as $value)
				    @if($value['FLAG'] == '1')
				<option value="{{ $value['AUTH_ID'] }}">{{ $value['AUTH_NAME'] }}</option>
			@endif
				@endforeach
                  </select>

				  </div>
                </div>
                </div>
                <!-- /.card-body -->

                <!-- /.card-footer -->
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










          <!-- /.modal-content -->

        <!-- /.modal-dialog -->


			  <div class="card-body">


{{-- this is the data table for the create role inside role --}}

			  <table id="create_role" class="table table-bordered table-hover" >
			  <thead>
                  <tr>
                    <th>Name</th>
                    <th>Description</th>
					<th>Authorization</th>
					<th>Action</th>
					<th class="text-center">
                          Status
                      </th>
                  </tr>
                  </thead>
				 <tbody>
				@isset($roles)
				  @foreach ($roles as $value)

            <tr>
            {{-- It will give shows the data inside the table --}}
					<td>{{ $value['ROLE_NAME'] }}</td>
					<td>{{ $value['ROLE_DESCRIPTION'] }}</td>

					<td>
					@foreach ($value['AUTH'] as $auth_name)
					@if($auth_name['FLAG'] == '1')
					   <span class='badge badge-secondary'>{{ $auth_name['AUTH_NAME'] }}</span>
				   @else
					   <span class='badge badge-danger'>{{ $auth_name['AUTH_NAME'] }}</span>
				   @endif
					@endforeach
					</td>

					<td>
				     @php
				$role = json_encode($value);
				@endphp

					   <a class='btn btn-warning btn-sm role' href='#' value="{{$role}}" id="{{$value['ROLE_ID']}}" title="Edit">
                             <i class='fas fa-edit'></i>
                          </a>

                      </td>
        {{-- it is showing the the status of the employee --}}
         <td class='project-state'>
						@if($value['FLAG'] == '1')

                          <span class='badge badge-success'>Activated</span>
					  @else

						   <span class='badge badge-danger'>Deactivated</span>
					   @endif
                      </td>
				</tr>
		 @endforeach
		 @endisset
			@empty($roles)
			<script>toastr.warning("No records found.");</script>
			@endempty
</tbody>
</table>

</div>


              <!-- /.card-body -->
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
