{{-- It is use for the header footer sidebar --}}

@extends('layouts.app')
@section('content')
  {{-- It is for veryfy the customer and verified by their ids --}}


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
{{-- This is inside Role attr use to show List of Employees with Assigned and No Assigned role --}}
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Assign Role</h1>
          </div>

          {{-- It is the link of Home btn --}}
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard.index')}}">Home</a></li>
              <li class="breadcrumb-item active">Assign Role</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

{{-- After click the check box of List of Employees with No Role Assigned --}}
 {{-- Blue Assign btn inside the Action bar inside the table --}}

	  <div class="modal fade text-left assignroleModal">
        <div class="modal-dialog">
          <div class="modal-content" style="width: 600px; height: 100px;">

                <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Assign Role</h3>
				 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              </div>
          <input type="hidden" name="non_id" id="non_Id" class="form-control"  value="">

          {{-- User ID and Name came from store() inside AssignRoleController.php --}}
      <form class="form-horizontal" action="{{route('roless.store')}}" method="POST">
             {{ csrf_field() }}


                <div class="card-body">

				<div class="form-group row">
                    <label  class="col-sm-4 col-form-label">User ID</label>
                    <div class="col-sm-8">
                   <input name="emp_name[]" id="employees_Id" class="form-control"  value="" readonly>
                    </div>
                  </div>
				  <div class="form-group row">
                    <label  class="col-sm-4 col-form-label">User Name</label>
                    <div class="col-sm-8">
                   <input name="employees_name" id="employees_name" class="form-control"  value="" readonly>
                    </div>
                  </div>
             {{-- Assign role for the User --}}
		<div class="form-group row select2-teal">
          <label class="col-sm-4 col-form-label">Assign Role</label>
          <div class="col-sm-8">
            <select class="select2" multiple="multiple" name="role_name[]" data-placeholder="Select Role" data-dropdown-css-class="select2-teal">
                 @isset($role)
				 @foreach ($role as $values)
				<option value="{{ $values['ROLE_ID'] }}">{{ $values['ROLE_NAME'] }}</option>
				@endforeach
				@endisset
              </select>

          </div>
            </div>

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info float-right">Assign</button>
                  <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
                </div>

              </form>

            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

    {{-- This is for the Edit btn inside Action bar inside the table --}}
	 <div class="modal fade text-left assignModal">
        <div class="modal-dialog">
          <div class="modal-content" style="width: 600px; height: 100px;">

                <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Update Role</h3>
				 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              </div>
          <input type="hidden" name="assign_id" id="assign_Id" class="form-control"  value="">

      {{-- It shows the assign role with particular userId and name  --}}
      <form class="form-horizontal" id="assign_form" method="POST">
           {{-- This function can be used to generate the hidden input field --}}
             {{ csrf_field() }}
			  {{ method_field('PUT') }}
                <div class="card-body">
				<div class="form-group row">
                    <label  class="col-sm-4 col-form-label">User ID</label>
                    <div class="col-sm-8">
                      <input class="form-control" id="user_id" value="" readonly>
                    </div>
                  </div>
				<div class="form-group row">
                    <label  class="col-sm-4 col-form-label">User Name</label>
                    <div class="col-sm-8">
                      <input class="form-control" id="user_name" value="" readonly>
                    </div>
                  </div>

  {{-- It shows the assign role  and it gives options of all roles we can select or cut the roles  --}}

		<div class="form-group row select2-teal">
          <label class="col-sm-4 col-form-label">Assign</label>
          <div class="col-sm-8">
            <select class="select2" multiple="multiple" name="role_id[]" id="role_id" data-placeholder="Select a Role" data-dropdown-css-class="select2-teal">
                @foreach ($role as $values)
				<option value="{{ $values['ROLE_ID'] }}">{{ $values['ROLE_NAME'] }}</option>
				@endforeach
              </select>

          </div>
            </div>
            {{-- Here we use flag for Activate on/off btn --}}
				  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-4 col-form-label">Activate</label>
                    <div class="col-sm-8">

                    <input type="checkbox" name="flag" id="flag" class="flag" data-bootstrap-switch data-off-color="danger" data-on-color="success" value="">
                       </div>
                  </div>
                </div>
                <!-- /.card-body -->
                {{-- For update the editing role  --}}
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

{{-- blue color Assign btn on the top of the table --}}
                <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content" style="width: 600px; height: 100px;">
                <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Assign Role</h3>
				 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

              {{-- It shows on click of blue color Assign btn on the top of the table --}}
              {{-- Select the user from dropdown  --}}
              <form class="form-horizontal" action="{{route('roless.store')}}" method="POST">
             {{-- generate the hidden input field in the HTML form --}}
                {{ csrf_field() }}
                <div class="card-body">
				<div class="form-group row select2-teal">
          <label class="col-sm-4 col-form-label">Select User</label>
          <div class="col-sm-8">
              {{-- it shows the mane list with id --}}
            <select class="select2" name="emp_name[]" multiple="multiple" data-placeholder="Select User" data-dropdown-css-class="select2-teal" required>
			 @foreach ($emp as $valu)
                 <option selected="selected" >{{ $valu['EMP_NAME'] }}</option>

				<option value="{{ $valu['EMP_ID'] }}">{{ $valu['EMP_NAME'] }} [{{ $valu['EMP_ID'] }}]</option>
				@endforeach

              </select>
          </div>
        </div>

      {{-- Assign the role from drop_down for the particular user --}}
		<div class="form-group row select2-teal">
          <label class="col-sm-4 col-form-label">Assign Role</label>
          <div class="col-sm-8">
            <select class="select2" name="role_name[]" multiple="multiple" data-placeholder="Select Role" data-dropdown-css-class="select2-teal" required>
               @foreach ($role as $val)
			   @if($val['FLAG'] == '1')
				<option value="{{ $val['ROLE_ID'] }}">{{ $val['ROLE_NAME'] }}</option>
			@endif
				@endforeach
              </select>

          </div>

            </div>

                </div>
                <!-- /.card-body -->

                <!-- /.card-footer -->
                {{-- fot update the assign role or cancle --}}
				<div class="card-footer">
                  <button type="submit" class="btn btn-info float-right">Assign</button>
                  <button type="submit" class="btn btn-info" data-dismiss="modal">Cancel</button>
                </div>
              </form>
            </div>




          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

{{-- Section shows the check_box to show List of Employees with No Role Assigned on the top of the table  --}}
	 <section class="content">
      <div class="container-fluid">
	  <div class="icheck-primary d-inline">
                        <input type="checkbox" id="assigned_roles">
                        <label for="assigned_roles">
                        </label>
                      </div> List of Employees with No Role Assigned
					  <hr>
{{-- It shows the table of Assign Role  --}}
        <div class="row">
          <div class="col-12">
            <div class="card" id="assigned_role">

			  <div class="card-body">

			  <table id="assign_role" class="table table-bordered table-hover">
			  <thead>


                  <tr>
                     <th>User ID</th>
                        <th>User Name</th>
                       <th>Roles</th>
                        <th>Action</th>
                        <th>Status</th>

                    </tr>
                  </thead>
                  <tbody>
    {{-- To show the Employee role with respective Id and their name --}}
    {{-- $details contain Employee id,name with their assign role --}}
				  @isset($details)
				  @foreach ($details as $value)
				  <tr>
			  <td>{{ $value['EMP_ID'] }}</td>
					<td>{{ $value['EMP_NAME'] }}</td>
					<td>
					@foreach ($value['ROLE'] as $role_name)
					@if($role_name['FLAG'] == '1')
          <span class='badge badge-secondary'>{{ $role_name['ROLE_NAME'] }} </span>
			@else
		  <span class='badge badge-danger'>{{ $role_name['ROLE_NAME'] }} </span>
	  @endif
					@endforeach
					</td>
					<td>
             {{-- store the role value in json format --}}
					 @php
				$assign = json_encode($value);
				@endphp

					   <a class='btn btn-warning btn-sm assign' href='#' value="{{$assign}}" id="{{$value['EMP_ID']}}" title="Edit">
                             <i class='fas fa-edit'></i>
             </a>

			   </td>
        {{-- This is used to show the status inside the table Active or Deactive --}}
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
			@empty($details)
			<script>toastr.warning("No records found.");</script>
			@endempty
</tbody>
</table>
</div>
            </div>
          </div>
          <!-- /.col -->
        </div>

   {{-- Click the check_box to show the List of Employees with No Role Assigned --}}
		 <div class="card" id="non_assigned_role">

			  <div class="card-body">

			  <table id="no_assign_role" class="table table-bordered table-hover">
			        <thead>
                  <tr>
                    <th>User ID</th>
                    <th>User Name</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>

  {{-- To assign the role from the List of Employees with No Role Assigned   --}}
          {{-- Inside Action table the blue color Assign btn --}}
				  @isset($emp)
				  @foreach ($emp as $value)
				  <tr>
			  <td>{{ $value['EMP_ID'] }}</td>
					<td>{{ $value['EMP_NAME'] }}</td>

					<td>
					 @php
				$assign_role = json_encode($value);
				@endphp
				<a class="btn btn-info btn-sm assignrole" href="#" value="{{$assign_role}}" id="{{$value['EMP_ID']}}" title="Assign">
				<i class="fas fa-user-plus"></i> Assign
				</a>

			   </td>


				</tr>
					  @endforeach
					   @endisset

</tbody>
</table>

</div>


              <!-- /.card-body -->
            </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>

@endsection
