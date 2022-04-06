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



  <div class="modal fade text-left" id="vie">

		 <script>
		  $("body").on("click", ".reset", function(event){
           var emp = $(this).attr("id");
			document.getElementById("employee_id").value = emp;
		  });
		 </script>

        <div class="modal-dialog">
          <div class="modal-content" style="width: 700px; height:100px;">

                 <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Reset Password</h3>
				 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              </div>


		  @php
			$empss = Str::random(60);
			@endphp

      <form class="form-horizontal" action="{{route('empss.update',$empss)}}" method="POST">
              {{ csrf_field() }}
			  {{ method_field('PUT') }}

					<div class="card-body">


					<div class="form-group row">
                        <label for="inputName" class="col-sm-4 col-form-label">Employee ID</label>
                        <div class="col-sm-8">
                          <input  class="form-control" name="emp_id" id="employee_id" value="" readonly>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-4 col-form-label">New Password</label>
                        <div class="col-sm-8">
                          <input type="password" class="form-control" name="password" placeholder="Enter Password">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-4 col-form-label">Confirm Password</label>
                        <div class="col-sm-8">
                          <input type="password" class="form-control" name="password_confirmation" placeholder="Renter Password">
                        </div>
                      </div>
						</div>
                      <div class="card-footer">

                          <button type="submit" class="btn btn-info float-right">Reset</button>
                        <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
                      </div>


                    </form>


            </div>

          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>


<div class="modal fade text-left dataModal"  role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content" style="width: 700px; height:100px;">
	   <div class="card card-success">
        <div class='card-header'>
		<h3 class='card-title'>Edit Employee Details</h3>
		 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
		</div>


        <form class="form-horizontal" id="employee_form" method="POST">



            <div class="card-body">

                 <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Employee ID</label>
                    <div class="col-sm-8">
                    <input id="employees_id" class="form-control"  value="" readonly>
                    </div>
                  </div>
				<div class="form-group row select2-teal">
                  <label class="col-sm-4">Name</label>
				  <div class="col-sm-8">
				   <input id="emp_name" class="form-control"  value="" readonly>
				  </div>
                </div>
				<div class="form-group row select2-teal">
                  <label class="col-sm-4">Email</label>
				  <div class="col-sm-8">
					<input id="emp_email" class="form-control"  value="" readonly>
				  </div>
                </div>
				<div class="form-group row select2-teal">
                  <label class="col-sm-4">Mobile</label>
				  <div class="col-sm-8">
					<input id="emp_mobile" class="form-control"  value="" readonly>
				  </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Reporting Manager</label>
                    <div class="col-sm-8">

                        
                    <select class="select2" name="rep_mgr" id="rep_mgr" style="width: 100%;" data-dropdown-css-class="select2-teal" required>
                            @isset($admins)
                            @foreach ($admins as $values)
                        <option value="{{ $values['EMP_ID'] }}">{{ $values['EMP_NAME'] }}</option>
                        @endforeach
                        @endisset
                        </select>

                    </div>

                </div>





				<div class="form-group row select2-teal">
                  <label class="col-sm-4">Area</label>
				  <div class="col-sm-8">
					<input id="emp_area" class="form-control"  value="" readonly>
				  </div>
                </div>
				<div class="form-group row select2-teal">
                  <label class="col-sm-4">Region</label>
				  <div class="col-sm-8">
					<input id="emp_region" class="form-control"  value="" readonly>
				  </div>
                </div>
				<div class="form-group row select2-teal">
                  <label class="col-sm-4">Level</label>
				  <div class="col-sm-8">
					<input id="emp_level" class="form-control"  value="" readonly>
				  </div>
                </div>
				<div class="form-group row">
                  <label class="col-sm-4 col-form-label">Approver</label>
				  <div class="col-sm-8">
           
         
<select class="select2" name="emp_approver" id="emp_approver" style="width: 100%;"  data-dropdown-css-class="select2-teal" required>

 @isset($admins)
@foreach ($admins as $approver_values)

   <option value="{{ $approver_values['EMP_ID'] }}" >{{ $approver_values['EMP_NAME'] }}</option>

@endforeach
   @endisset</select>




              
				  </div>
                </div>


				<div class="form-group row select2-teal">
                  <label class="col-sm-4">Plant</label>
				  <div class="col-sm-8">
					<input id="emp_plant" class="form-control"  value="" readonly>
				  </div>
                </div>
				<div class="form-group row">
                    <label class="col-sm-4 col-form-label">Vehicle Ownership</label>
                    <div class="col-sm-8">
					<select class="select2" name="ownership" id="ownership" style="width: 100%;" data-dropdown-css-class="select2-teal" required>
                   <option value="1">Company</option>
					<option value="2">Self</option>
					<option value="0">None</option>
                  </select>
                    </div>
                  </div>
				  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Vehicle Type</label>
                    <div class="col-sm-8">
                    <select class="select2" name="vehicle_type" id="vehicle_type" style="width: 100%;" data-dropdown-css-class="select2-teal" required>
                   <option value="1">Car</option>
					<option value="2">Motorcycle</option>
					<option value="0">None</option>
                  </select>
                    </div>
                  </div>

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-success float-right">Update</button>
                  <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                </div>

              </form>




      </div>
      </div>
    </div>
  </div>



  <div class="modal fade text-left" id="logins" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content" style="width: 900px; height:100px;">
	   <div class="card card-warning">
        <div class='card-header'>
		<h3 class='card-title'>Login Details</h3>
		 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
		</div>
        <div class="modal-body" id="login_detail">

        </div>

      </div>
      </div>
    </div>
  </div>



<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Employee</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard.index')}}">Home</a></li>
              <li class="breadcrumb-item active">Employee</li>
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



			  <div class="card-body">

			  <table id="employee" class="table table-bordered table-hover">
			  <thead>
                  <tr>
				  <th></th>
				  <th>Employee Code</th>

                    <th>Name</th>
					<th>Email</th>
					<th>Action</th>
					<th>View</th>
					<th class="text-center">
                          Status
                      </th>

                  </tr>
                  </thead>
                  <tbody>

				@isset($admins)
			@foreach ($admins as $value)
            <tr>
			<td> </td>
                <td>{{ $value['EMP_CODE'] }}</td>


                <td>
				@if ($value['EMP_CONTRACT_TYPE'] =='0')
				<span class='badge badge-secondary'>Permanent</span>
			@elseif ($value['EMP_CONTRACT_TYPE'] =='1')

								<span class='badge badge-primary'>Contract</span>
				@endif
				&nbsp;&nbsp;
				{{ $value['EMP_NAME'] }}


				</td>
                <td>{{ $value['EMP_EMAIL'] }}</td>

				<td>


				<div class="btn-group btn-group-sm">
				@if($value['FLAG'] =='1')
                      <a class='btn btn-info reset' href='#' id="{{$value['EMP_ID']}}" data-target="#vie"  data-toggle="modal" title="reset password">
					  <i class='fa fa-key'></i></a>
					  @else
						   <a class='btn btn-info reset disabled' href='#' id="{{$value['EMP_ID']}}" data-target="#vie"  data-toggle="modal" title="reset password">
					  <i class='fa fa-key'></i></a>
						 @endif

					   @php
				$emp_record = json_encode($value);
				@endphp
				@if($value['FLAG'] =='1')
					   <a class='btn btn-success view_data' href='#' value="{{$emp_record}}" id="view1_{{$value['EMP_ID']}}" title="View/Edit Employee Details">
                             <i class='fas fa-edit'></i>
                          </a>
						   @else
						  <a class='btn btn-success view_data disabled' href='#' value="{{$emp_record}}" id="view1_{{$value['EMP_ID']}}" title="View/Edit Employee Details">
                             <i class='fas fa-edit'></i>
                          </a>
						 @endif
				@if($value['FLAG'] =='1')
					  <a class='btn btn-warning login_details' href='#'  id="{{$value['EMP_ID']}}_Desktop" title="login details">
					  <i class='fas fa-sign-in-alt'></i>
					  </a>
					   @else
						  <a class='btn btn-warning login_details disabled' href='#'  id="{{$value['EMP_ID']}}_Desktop" title="login details">
					  <i class='fas fa-sign-in-alt'></i>
					  </a>
						 @endif

						  </div>
                     </td>
				<td>
				@php
			$empss = $value['EMP_ID'];
			@endphp
			@if($value['FLAG'] =='1')
                       <a class='btn btn-warning btn-app btn-xs' href="{{ route('empss.show',$empss)}}"  style="height:40px; max-width:1%; padding-left:0px; padding-right:0px;"  title="View assigned customers">
                  <span class='badge bg-teal'>{{ $value['EMP_TOTAL_CUSTOMER'] }}</span>
                  <i class='fas fa-users'></i>Customers
                </a>
				@else
						   <a class='btn btn-warning btn-app btn-xs disabled' href="{{ route('empss.show',$empss)}}"  style="height:40px; max-width:1%; padding-left:0px; padding-right:0px;"  title="View assigned customers">
                  <span class='badge bg-teal'>{{ $value['EMP_TOTAL_CUSTOMER'] }}</span>
                  <i class='fas fa-users'></i>Customers
                </a>
						 @endif

                     </td>


					  @if($value['FLAG'] =='1')
						<td class='project-state'>
                          <span class='badge badge-success'>Activated</span>
                      </td>
				@else
						<td class='project-state'>
                          <span class='badge badge-danger'>Deactivated</span>
                      </td>
				@endif
				<td>{{ $value['EMP_ID'] }}</td>

				 <td>{{ $value['FLAG'] }}</td>
            </tr>
			 @endforeach
        @endisset
			@empty($admins)
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


