<!DOCTYPE html>

<html>
<head>
   <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>SuprSales</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="{!! asset('suprsales_resource/plugins/select2/css/select2.min.css') !!}" rel="stylesheet" type="text/css">
<link href="{!! asset('suprsales_resource/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') !!}" rel="stylesheet" type="text/css">

<link href="{!! asset('suprsales_resource/plugins/fontawesome-free/css/all.min.css') !!}" rel="stylesheet" type="text/css">
<link href="{!! asset('suprsales_resource/dist/css/adminlte.min.css') !!}" rel="stylesheet" type="text/css">
<link href="{!! asset('suprsales_resource/plugins/fonts-googleapis/fonts.googleapis.css') !!}" rel="stylesheet" type="text/css">
<link href="{!! asset('suprsales_resource/plugins/daterangepicker/daterangepicker.css') !!}" rel="stylesheet" type="text/css">
 <link href="{!! asset('suprsales_resource/plugins/icheck-bootstrap/icheck-bootstrap.min.css') !!}" rel="stylesheet" type="text/css">
 <link href="{!! asset('suprsales_resource/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') !!}" rel="stylesheet" type="text/css">
<link href="{!! asset('suprsales_resource/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') !!}" rel="stylesheet" type="text/css">
<link href="{!! asset('suprsales_resource/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css') !!}" rel="stylesheet" type="text/css">

  <link href="{!! asset('suprsales_resource/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') !!}" rel="stylesheet" type="text/css">
  <link href="{!! asset('suprsales_resource/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') !!}" rel="stylesheet" type="text/css">

   <link href="{!! asset('suprsales_resource/plugins/datatables/jquery.dataTables.min.css') !!}" rel="stylesheet" type="text/css">
   <link href="{!! asset('suprsales_resource/plugins/datatables/select.dataTables.min.css') !!}" rel="stylesheet" type="text/css">
  <link href="{!! asset('suprsales_resource/plugins/datatables/buttons.dataTables.min.css') !!}" rel="stylesheet" type="text/css">

  <link href="{!! asset('suprsales_resource/plugins/datatables/dataTables.checkboxes.css') !!}" rel="stylesheet" type="text/css">

 <link href="{!! asset('suprsales_resource/plugins/fontawesome-free/css/fontawesome.min.css') !!}" rel="stylesheet" type="text/css">
<link href="{!! asset('suprsales_resource/plugins/bootstrap/bootstrap-toggle.min.css') !!}" rel="stylesheet" type="text/css">


  <link href="{!! asset('suprsales_resource/plugins/ion-icons/ionicons.min.css') !!}" rel="stylesheet" type="text/css">
	<script type="module" src="{!! asset('https://unpkg.com/ionicons@5.2.3/dist/ionicons/ionicons.esm.js') !!}"></script>
<script nomodule="" src="{!! asset('suprsales_resource/plugins/ion-icons/ionicons.js') !!}"></script>

   <script src="{!! asset('suprsales_resource/plugins/bootstrap/jquery.min.js') !!}" type="text/javascript"></script>
	<link href="{!! asset('suprsales_resource/plugins/toastr/toastr.min.css') !!}" rel="stylesheet" type="text/css">
	<script src="{!! asset('suprsales_resource/plugins/toastr/toastr.min.js') !!}" type="text/javascript"></script>

<style>
.purplenavbar{
 background-color:#210635;
}
</style>
</head>
<body class="hold-transition sidebar-mini accent-teal">
@if(isset(Auth::user()->id))
 <div class="wrapper">

        <!-- Navigation -->

        <!--<nav class="navbar navbar-static-top" role="navigation">-->

			@include('layouts.header')
			@include('layouts.sidebar')






        <div class="content-wrapper">

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

@if(Session::has('message'))
	  <script>
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.success("{{ session('message') }}");
</script>
  @endif

  @if(Session::has('error'))
	  <script>
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.error("{{ session('error') }}");
		</script>
  @endif

  @if(Session::has('info'))
	  <script>
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.info("{{ session('info') }}");
		</script>
  @endif

  @if(Session::has('warning'))
	  <script>
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.warning("{{ session('warning') }}");
		</script>
  @endif


 <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Help & Support</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">Home</a></li>
              <li class="breadcrumb-item active">Help & Support</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

				@php
				$user_count = 0;
                //add
                $beat_count=0;
				$auth_count = 0;
				$task_count = 0;
				$ticket_count = 0;
				$cust_count = 0;
				$order_count = 0;
				$claim_count = 0;
				$ann_count = 0;
				$setting_count = 0;
				@endphp

				@isset($ann)
					@foreach($ann as $val)
						 @if($val['auth_reference'] == 'adminn' || $val['auth_reference'] == 'empss' || $val['auth_reference'] == 'createemployee' || $val['auth_reference'] == 'assignplant' || $val['auth_reference'] == 'changelevel')
							 @php
								 $user_count = $user_count + 1;
								 break;
							 @endphp
						@endif
					@endforeach
				@endisset

                @isset($ann)
					@foreach($ann as $val)
						 @if($val['auth_reference'] == 'adminn')
							 @php
								 $beat_count = $beat_count + 1;
								 break;
							 @endphp
						@endif
					@endforeach
				@endisset

				@isset($ann)
					@foreach($ann as $val)
						@if($val['auth_reference'] == 'auths' || $val['auth_reference'] == 'screens' || $val['auth_reference'] == 'mods' || $val['auth_reference'] == 'roles' || $val['auth_reference'] == 'roless')
							 @php
								 $auth_count = $auth_count + 1;
								 break;
							 @endphp
						@endif
					@endforeach
				@endisset

				@isset($ann)
					@foreach($ann as $val)
						@if($val['auth_reference'] == 'task' || $val['auth_reference'] == 'assigntask' || $val['auth_reference'] == 'delegatedtask')
							 @php
								 $task_count = $task_count + 1;
								 break;
							 @endphp
						@endif
					@endforeach
				@endisset

				@isset($ann)
					@foreach($ann as $val)
						@if($val['auth_reference'] == 'myticket' || $val['auth_reference'] == 'ticket' || $val['auth_reference'] == 'openticket' || $val['auth_reference'] == 'component' || $val['auth_reference'] == 'assigncomponent')
							 @php
								 $ticket_count = $ticket_count + 1;
								 break;
							 @endphp
						@endif
					@endforeach
				@endisset

				@isset($ann)
					@foreach($ann as $val)
						@if($val['auth_reference'] == 'custs' || $val['auth_reference'] == 'customer' || $val['auth_reference'] == 'mycutomer' || $val['auth_reference'] == 'createfarmer' || $val['auth_reference'] == 'createretailer' || $val['auth_reference'] == 'verifydistributor')
							 @php
								 $cust_count = $cust_count + 1;
								 break;
							 @endphp
						@endif
					@endforeach
				@endisset

				@isset($ann)
					@foreach($ann as $val)
						@if($val['auth_reference'] == 'asales'|| $val['auth_reference'] == 'myorder' || $val['auth_reference'] == 'regionorder' || $val['auth_reference'] == 'depotorder')
							 @php
								 $order_count = $order_count + 1;
								 break;
							 @endphp
						@endif
					@endforeach
				@endisset

				@isset($ann)
					@foreach($ann as $val)
						@if($val['auth_reference'] == 'createclaim' || $val['auth_reference'] == 'viewclaim' || $val['auth_reference'] == 'approveclaim' || $val['auth_reference'] == 'rejectedclaim')
							 @php
								 $claim_count = $claim_count + 1;
								 break;
							 @endphp
						@endif
					@endforeach
				@endisset

				@isset($ann)
					@foreach($ann as $val)
						@if($val['auth_reference'] == 'announce' || $val['auth_reference'] == 'announcetype' || $val['auth_reference'] == 'myann')
							 @php
								 $ann_count = $ann_count + 1;
								 break;
							 @endphp
						@endif
					@endforeach
				@endisset

				@isset($ann)
					@foreach($ann as $val)
						@if($val['auth_reference'] == 'levelsettings' || $val['auth_reference'] == 'area' || $val['auth_reference'] == 'zone')
							 @php
								 $setting_count = $setting_count + 1;
								 break;
							 @endphp
						@endif
					@endforeach
				@endisset
    <!-- Main content -->
    <section class="content">

	 <div class="card">
              <div class="card-header p-2 bg-light">
                <ul class="nav nav-pills red">

				 <li class="nav-item"><a class="nav-link active" href="#general" data-toggle="tab">General</a></li>
				@if($user_count > 0)
			   <li class="nav-item"><a class="nav-link" href="#user" data-toggle="tab">User</a></li>
				 @endif
                 @if($beat_count > 0)
			   <li class="nav-item"><a class="nav-link" href="#createbeatplan" data-toggle="tab">Beat Plan</a></li>
				 @endif
				 @if($auth_count > 0)
			   <li class="nav-item"><a class="nav-link" href="#role" data-toggle="tab">Role</a></li>
				 @endif
                  @if($task_count > 0)
			   <li class="nav-item"><a class="nav-link" href="#task" data-toggle="tab">Task</a></li>
				 @endif
				   @if($ticket_count > 0)
			   <li class="nav-item"><a class="nav-link" href="#ticket" data-toggle="tab">Ticket</a></li>
				 @endif
				  @if($cust_count > 0)
			   <li class="nav-item"><a class="nav-link" href="#customer" data-toggle="tab">Customer</a></li>
				 @endif
				 @if($order_count > 0)
			   <li class="nav-item"><a class="nav-link" href="#order" data-toggle="tab">Order</a></li>
				 @endif
				  @if($claim_count > 0)
			   <li class="nav-item"><a class="nav-link" href="#claim" data-toggle="tab">Claim</a></li>
				 @endif
				  @if($ann_count > 0)
			   <li class="nav-item"><a class="nav-link" href="#announcement" data-toggle="tab">Announcement</a></li>
				 @endif
				  @if($setting_count > 0)
			   <li class="nav-item"><a class="nav-link" href="#setting" data-toggle="tab">Settings</a></li>
				 @endif
				</ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">

				<div class="active tab-pane" id="general">
                     <div class="row">
						<div class="col-12" id="accordion">
							<div class="card card-primary card-outline">
								<a class="d-block w-100" data-toggle="collapse" href="#collapseGeneralOne">
									<div class="card-header">
										<h4 class="card-title w-100">
										   Edit Profile
										</h4>
									</div>
								</a>
								<div id="collapseGeneralOne" class="collapse show" data-parent="#accordion">
									<div class="card-body">
									<img src="/suprsales_resource/dist/img/general_module1.png" style="height: 20%; width:100%;" alt="User">
										<br>
										<blockquote>
										Click on profile image on header bar.
										</blockquote>
										<blockquote>
									   Click on "Profile" button.
										</blockquote>
										<blockquote>
									   Click on "Edit" tab.
										</blockquote>
										<blockquote>
									   Fill in the details and click on "Submit" button to save changes.
										</blockquote>
									</div>
								</div>
							</div>

							<div class="card card-primary card-outline">
								<a class="d-block w-100" data-toggle="collapse" href="#collapseGeneralTwo">
									<div class="card-header">
										<h4 class="card-title w-100">
										   Resest Passsword
										</h4>
									</div>
								</a>
								<div id="collapseGeneralTwo" class="collapse" data-parent="#accordion">
									<div class="card-body">
									<img src="/suprsales_resource/dist/img/general_module2.png" style="height: 20%; width:100%;" alt="User">
										<br>
										<blockquote>
										Click on profile image on header bar.
										</blockquote>
										<blockquote>
									   Click on "Profile" button.
										</blockquote>
										<blockquote>
									   Click on "Settings" tab.
										</blockquote>
										<blockquote>
									   Enter details and click on "Submit" button to save changes.
										</blockquote>
									</div>
								</div>
							</div>

							<div class="card card-warning card-outline">
								<a class="d-block w-100" data-toggle="collapse" href="#collapseGeneralThree">
									<div class="card-header">
										<h4 class="card-title w-100">
										   View Team
										</h4>
									</div>
								</a>
								<div id="collapseGeneralThree" class="collapse" data-parent="#accordion">
									<div class="card-body">
									<img src="/suprsales_resource/dist/img/general_module3.png" style="height: 20%; width:100%;" alt="User">
										<br>
										<blockquote>
										Select "Org Chart" from Contacts Menu.
										</blockquote>
										<blockquote>
									   Click on "+" button.
										</blockquote>
										<blockquote>
									   A hierachy opens showing team of user.
										</blockquote>
									</div>
								</div>
							</div>

							<div class="card card-warning card-outline">
								<a class="d-block w-100" data-toggle="collapse" href="#collapseGeneralFour">
									<div class="card-header">
										<h4 class="card-title w-100">
										   View Profile of Team Member
										</h4>
									</div>
								</a>
								<div id="collapseGeneralFour" class="collapse" data-parent="#accordion">
									<div class="card-body">
									<img src="/suprsales_resource/dist/img/general_module4.png" style="height: 20%; width:100%;" alt="User">
										<br>
										<blockquote>
										Select "My Contacts" from Contacts Menu.
										</blockquote>
										<blockquote>
									   Click on "View Team" button.
										</blockquote>
										<blockquote>
									   Click on user name or user image.
										</blockquote>
										<blockquote>
									   User Profile opens in a new page.
										</blockquote>
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>

                  <div class="tab-pane" id="user">
                     <div class="row">
            <div class="col-12" id="accordion">
                <div class="card card-primary card-outline">
                    <a class="d-block w-100" data-toggle="collapse" href="#collapseOne">
                        <div class="card-header">
                            <h4 class="card-title w-100">
                               Activate/Deactivate User
                            </h4>
                        </div>
                    </a>
                    <div id="collapseOne" class="collapse show" data-parent="#accordion">
                        <div class="card-body">
						<img src="/suprsales_resource/dist/img/user_module1.png" style="height: 20%; width:100%;" alt="User">
							<br>
							<blockquote>
                            Select User(s) to activate/deactivate by clicking on the checkbox.
							</blockquote>
							<blockquote>
                           Click on the "Action" button to perform action.
							</blockquote>
							<blockquote>
                           Select "Activate" to activate user or "Deactivate" to deactivate user.
							</blockquote>
							<blockquote>
                           After performing the action, status of user will be changed (if activated then deactivated..vice versa)
							</blockquote>
                        </div>
                    </div>
                </div>
                <div class="card card-primary card-outline">
                    <a class="d-block w-100" data-toggle="collapse" href="#collapseTwo">
                        <div class="card-header">
                            <h4 class="card-title w-100">
                               Edit Vehicle Ownership/ Vehicle Type of Employee
                            </h4>
                        </div>
                    </a>
                    <div id="collapseTwo" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                         <img src="/suprsales_resource/dist/img/user_module2.png" style="width:100%;" alt="User">
							<br>
							<blockquote>
                            Select "All Employees" from User Menu to view list of employees.
							</blockquote>
							<blockquote>
                           Click on "Edit" button in "Action" tab to perform action.
							</blockquote>
							<blockquote>
                           Change Vehicle Ownership/Vehicle Type by selecting values in dropdown.
							</blockquote>
							<blockquote>
                           Click on the "Update" button to save changes.
							</blockquote>
						  </div>
                    </div>
                </div>
                <div class="card card-warning card-outline">
                    <a class="d-block w-100" data-toggle="collapse" href="#collapseThree">
                        <div class="card-header">
                            <h4 class="card-title w-100">
                                Assign Region to Employee
                            </h4>
                        </div>
                    </a>
                    <div id="collapseThree" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                         <img src="/suprsales_resource/dist/img/user_module3.png" style="width:100%;" alt="User">
						  <br>
						  <blockquote>
                            Select "Assign Region" from User Menu.
							</blockquote>
							<blockquote>
                           Select checkbox to view list of employees having no region.
							</blockquote>
							<blockquote>
                           Click on "Assign" button in "Action" tab to perform action.
							</blockquote>
							<blockquote>
                           Select Region from the dropdown and click on the "Update" button to save changes.
							</blockquote>
						   </div>
                    </div>
                </div>
                <div class="card card-warning card-outline">
                    <a class="d-block w-100" data-toggle="collapse" href="#collapseFour">
                        <div class="card-header">
                            <h4 class="card-title w-100">
                                Change Level Expense Rates of Employee
                            </h4>
                        </div>
                    </a>
                    <div id="collapseFour" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                           <img src="/suprsales_resource/dist/img/user_module4.png" style="width:100%;" alt="User">
						  <br>
						  <blockquote>
                            Select "Level" from User Menu.
							</blockquote>
							<blockquote>
                           Click on "Edit" button to change employee level.
							</blockquote>
							<blockquote>
                           Select level from "Change Level" dropdown to change employee level.
							</blockquote>
							<blockquote>
                           Click on "+" in Change Travel Expense/ Change Other Expense to change employee level expense rates.
							</blockquote>
							<blockquote>
                           Click on the "Update" button to save changes.
							</blockquote>
                        </div>
                    </div>
                </div>
               <div class="card card-danger card-outline">
                    <a class="d-block w-100" data-toggle="collapse" href="#collapseFive">
                        <div class="card-header">
                            <h4 class="card-title w-100">
                                Reset Passsword of Employee
                            </h4>
                        </div>
                    </a>
                    <div id="collapseFive" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                           <img src="/suprsales_resource/dist/img/user_module5.png" style="width:100%;" alt="User">
						  <br>
						  <blockquote>
                            Select "All Employees" from User Menu to view list of employees.
							</blockquote>
							<blockquote>
                           Click on "Reset Password" (key) button in "Action" tab to perform action.
							</blockquote>
							<blockquote>
                           Create a new password.
							</blockquote>
							<blockquote>
                           Click on the "Reset" button to save changes.
							</blockquote>
                        </div>
                    </div>
                </div>
                <div class="card card-danger card-outline">
                    <a class="d-block w-100" data-toggle="collapse" href="#collapseSix">
                        <div class="card-header">
                            <h4 class="card-title w-100">
                                View Login Details of Employee
                            </h4>
                        </div>
                    </a>
                    <div id="collapseSix" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                           <img src="/suprsales_resource/dist/img/user_module6.png" style="width:100%;" alt="User">
						  <br>
						  <blockquote>
                            Select "All Employees" from User Menu to view list of employees.
							</blockquote>
							<blockquote>
                           Click on "Login Details" button in "Action" tab to perform action.
							</blockquote>
							<blockquote>
                           View login time, logout time, device type, device model and app verison.
							</blockquote>
                        </div>
                    </div>
                </div>
				 <div class="card card-success card-outline">
                    <a class="d-block w-100" data-toggle="collapse" href="#collapseSeven">
                        <div class="card-header">
                            <h4 class="card-title w-100">
                                View Customers Mapped to Employee
                            </h4>
                        </div>
                    </a>
                    <div id="collapseSeven" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                           <img src="/suprsales_resource/dist/img/user_module7.png" style="width:100%;" alt="User">
						  <br>
						  <blockquote>
                            Select "All Employees" from User Menu to view list of employees.
							</blockquote>
							<blockquote>
                           Click on "Customers" button to view customers mapped to employee.
							</blockquote>
							<blockquote>
                           Green badge (21) on the button is the count of customers mapped to Suresh Singh Tomar.
							</blockquote>
							<blockquote>
                           All the customers mapped to employee will be shown in a new page.
							</blockquote>
							<blockquote>
                           View Customer Ledger and Details (KPIs and Ageing) in Action tab.
							</blockquote>
                        </div>
                    </div>
                </div>
				 <div class="card card-success card-outline">
                    <a class="d-block w-100" data-toggle="collapse" href="#collapseEight">
                        <div class="card-header">
                            <h4 class="card-title w-100">
                                Create New Employee
                            </h4>
                        </div>
                    </a>
                    <div id="collapseEight" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                           <img src="/suprsales_resource/dist/img/user_module8.png" style="width:100%;" alt="User">
						  <br>
						  <blockquote>
                            Select "Create Employee" from User Menu.
							</blockquote>
							<blockquote>
                           To create multiple employees, upload csv file of employees in required format.
							</blockquote>
							<blockquote>
                           Or employee can be created by form.
							</blockquote>
                        </div>
                    </div>
                </div>

            </div>
        </div>

                  </div>


			  <div class="tab-pane" id="role">
                     <div class="row">
            <div class="col-12" id="accordion">

                <div class="card card-primary card-outline">
                    <a class="d-block w-100" data-toggle="collapse" href="#collapseRoleOne">
                        <div class="card-header">
                            <h4 class="card-title w-100">
                               Create a New Role
                            </h4>
                        </div>
                    </a>
                    <div id="collapseRoleOne" class="collapse show" data-parent="#accordion">
                        <div class="card-body">
						<img src="/suprsales_resource/dist/img/role_module1.png" style="height: 20%; width:100%;" alt="User">
							<br>
							<blockquote>
                            Select "Create" from Role Menu.
							</blockquote>
							<blockquote>
                           Click on the "Create" button.
							</blockquote>
							<blockquote>
                           Fill in the details and click on "Create" button to create a new role.
							</blockquote>
							<blockquote>
                           After performing the action, role with multiple authorizations is created.
							</blockquote>
                        </div>
                    </div>
                </div>

				 <div class="card card-primary card-outline">
                    <a class="d-block w-100" data-toggle="collapse" href="#collapseRoleTwo">
                        <div class="card-header">
                            <h4 class="card-title w-100">
                               View Authorization Linked to Screen/Module
                            </h4>
                        </div>
                    </a>
                    <div id="collapseRoleTwo" class="collapse" data-parent="#accordion">
                        <div class="card-body">
						<img src="/suprsales_resource/dist/img/role_module2.png" style="height: 20%; width:100%;" alt="User">
							<br>
							<blockquote>
                            Select "Create Authorization" from Authorization Menu.
							</blockquote>
							<blockquote>
                           Search authorization (e.g. My Tickets) in the search tab to find screen (web screen) and module (mobile screen) linked to that authorization.
							</blockquote>
							<blockquote>
                           Screen path and module path of the authorization can be viewed in the table.
							</blockquote>
                        </div>
                    </div>
                </div>

				<div class="card card-warning card-outline">
                    <a class="d-block w-100" data-toggle="collapse" href="#collapseRoleThree">
                        <div class="card-header">
                            <h4 class="card-title w-100">
                                Assign Role to Single User
                            </h4>
                        </div>
                    </a>
                    <div id="collapseRoleThree" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                         <img src="/suprsales_resource/dist/img/role_module3.png" style="width:100%;" alt="User">
						  <br>
						  <blockquote>
                            Select "Assign" from Role Menu.
							</blockquote>
							<blockquote>
                           Select checkbox to view list of employees having no role.
							</blockquote>
							<blockquote>
                           Click on "Assign" button in "Action" tab to perform action.
							</blockquote>
							<blockquote>
                           Select Role from the dropdown and click on the "Update" button to save changes.
							</blockquote>
						   </div>
                    </div>
                </div>

				<div class="card card-warning card-outline">
                    <a class="d-block w-100" data-toggle="collapse" href="#collapseRoleFour">
                        <div class="card-header">
                            <h4 class="card-title w-100">
                                Assign Role to Multiple Users
                            </h4>
                        </div>
                    </a>
                    <div id="collapseRoleFour" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                         <img src="/suprsales_resource/dist/img/role_module4.png" style="width:100%;" alt="User">
						  <br>
						  <blockquote>
                            Select "Assign" from Role Menu.
							</blockquote>
							<blockquote>
                           Click on "Assign" button.
							</blockquote>
							<blockquote>
                           Select multiple users from the dropdown and assign role by clicking on "Assign" button.
							</blockquote>
						   </div>
                    </div>
                </div>


            </div>
        </div>

                  </div>


				 <div class="tab-pane" id="task">
					<div class="row">
					<div class="col-12" id="accordion">

					 <div class="card card-primary card-outline">
                    <a class="d-block w-100" data-toggle="collapse" href="#collapseEight">
                        <div class="card-header">
                            <h4 class="card-title w-100">
                                Create New Task
                            </h4>
                        </div>
                    </a>
                    <div id="collapseEight" class="collapse show" data-parent="#accordion">
                        <div class="card-body">
                           <img src="/suprsales_resource/dist/img/task_module1.png" style="width:100%;" alt="User">
						  <br>
						  <blockquote>
                            Select "Create Task" from Task Menu.
							</blockquote>
							<blockquote>
                           Click on "Create" button and fill in the details.
							</blockquote>
							<blockquote>
                           A new task is created.
							</blockquote>
                        </div>
                    </div>
                </div>

				<div class="card card-primary card-outline">
                    <a class="d-block w-100" data-toggle="collapse" href="#collapseTaskTwo">
                        <div class="card-header">
                            <h4 class="card-title w-100">
                                Create New Activity
                            </h4>
                        </div>
                    </a>
                    <div id="collapseTaskTwo" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                           <img src="/suprsales_resource/dist/img/task_module2.png" style="width:100%;" alt="User">
						  <br>
						  <blockquote>
                            Select "Create Task" from Task Menu.
							</blockquote>
							<blockquote>
                           Click on "Task Details" button under "View" tab.
							</blockquote>
							<blockquote>
                           Click on "Add Activity" and fill in the details to create a new activity in task.
							</blockquote>
                        </div>
                    </div>
                </div>

				<div class="card card-warning card-outline">
                    <a class="d-block w-100" data-toggle="collapse" href="#collapseTaskThree">
                        <div class="card-header">
                            <h4 class="card-title w-100">
                                Add Task Attachment
                            </h4>
                        </div>
                    </a>
                    <div id="collapseTaskThree" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                           <img src="/suprsales_resource/dist/img/task_module3.png" style="width:100%;" alt="User">
						  <br>
						  <blockquote>
                            Select "Create Task" from Task Menu.
							</blockquote>
							<blockquote>
                           Click on "Task Details" button under "View" tab.
							</blockquote>
							<blockquote>
                           Click on "Add Attachment" to add multiple attachments of task.
							</blockquote>
                        </div>
                    </div>
                </div>

				<div class="card card-warning card-outline">
                    <a class="d-block w-100" data-toggle="collapse" href="#collapseTaskFour">
                        <div class="card-header">
                            <h4 class="card-title w-100">
                                Delegate Activity
                            </h4>
                        </div>
                    </a>
                    <div id="collapseTaskFour" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                           <img src="/suprsales_resource/dist/img/task_module4.png" style="width:100%;" alt="User">
						  <br>
						  <blockquote>
                            Select "Assigned Tasks" from Task Menu.
							</blockquote>
							<blockquote>
                           Click on "Task Details" button under "View" tab.
							</blockquote>
							<blockquote>
                           Click on "Edit" button of activity card.
							</blockquote>
							<blockquote>
                           Select employee from "Delegate" dropdown and click on update to delegate activity.
							</blockquote>
                        </div>
                    </div>
                </div>


					</div>
					</div>
                  </div>


				 <div class="tab-pane" id="ticket">
					<div class="row">
					<div class="col-12" id="accordion">

					 <div class="card card-primary card-outline">
                    <a class="d-block w-100" data-toggle="collapse" href="#collapseTicketOne">
                        <div class="card-header">
                            <h4 class="card-title w-100">
                                Create Ticket Component
                            </h4>
                        </div>
                    </a>
                    <div id="collapseTicketOne" class="collapse show" data-parent="#accordion">
                        <div class="card-body">
                           <img src="/suprsales_resource/dist/img/ticket_module1.png" style="width:100%;" alt="User">
						  <br>
						  <blockquote>
                            Select "Create Component" from Ticket Component Menu.
							</blockquote>
							<blockquote>
                           Click on "Create" button and fill in the details.
							</blockquote>
							<blockquote>
                           A new component is created.
							</blockquote>
                        </div>
                    </div>
                </div>

				<div class="card card-primary card-outline">
                    <a class="d-block w-100" data-toggle="collapse" href="#collapseTicketTwo">
                        <div class="card-header">
                            <h4 class="card-title w-100">
                                Assign Ticket Component
                            </h4>
                        </div>
                    </a>
                    <div id="collapseTicketTwo" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                           <img src="/suprsales_resource/dist/img/ticket_module2.png" style="width:100%;" alt="User">
						  <br>
						  <blockquote>
                            Select "Assign Component" from Ticket Component Menu.
							</blockquote>
							<blockquote>
                           Click on "Assign" button and select multiple processors from the dropdown.
							</blockquote>
							<blockquote>
                           Click on "Create" button to save changes.
							</blockquote>
                        </div>
                    </div>
                </div>

				<div class="card card-warning card-outline">
                    <a class="d-block w-100" data-toggle="collapse" href="#collapseTicketThree">
                        <div class="card-header">
                            <h4 class="card-title w-100">
                                Respond to your Ticket
                            </h4>
                        </div>
                    </a>
                    <div id="collapseTicketThree" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                           <img src="/suprsales_resource/dist/img/ticket_module3.png" style="width:100%;" alt="User">
						  <br>
						  <blockquote>
                            Select "My Tickets" from Tickets Menu.
							</blockquote>
							<blockquote>
                           Select date range and click on "Submit" button to search the ticket.
							</blockquote>
							<blockquote>
                           Click on "Ticket No".
							</blockquote>
							<blockquote>
                           Click on "Add Response".
							</blockquote>
							<blockquote>
                           Enter response and click on "Submit" to add a new response to your ticket.
							</blockquote>
                        </div>
                    </div>
                </div>

				<div class="card card-warning card-outline">
                    <a class="d-block w-100" data-toggle="collapse" href="#collapseTicketFour">
                        <div class="card-header">
                            <h4 class="card-title w-100">
                                Edit Assigned Ticket
                            </h4>
                        </div>
                    </a>
                    <div id="collapseTicketFour" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                           <img src="/suprsales_resource/dist/img/ticket_module4.png" style="width:100%;" alt="User">
						  <br>
						  <blockquote>
                            Select "Assigned Tickets" from Tickets Menu.
							</blockquote>
							<blockquote>
                           Select date range and click on "Submit" button to search the ticket.
							</blockquote>
							<blockquote>
                           Click on "Ticket No".
							</blockquote>
							<blockquote>
                           Click on edit button.
							</blockquote>
							<blockquote>
                           Edit ticket and click on "Update" to save changes.
							</blockquote>
                        </div>
                    </div>
                </div>

				<div class="card card-danger card-outline">
                    <a class="d-block w-100" data-toggle="collapse" href="#collapseTicketFive">
                        <div class="card-header">
                            <h4 class="card-title w-100">
                                Return Assigned Ticket
                            </h4>
                        </div>
                    </a>
                    <div id="collapseTicketFive" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                           <img src="/suprsales_resource/dist/img/ticket_module5.png" style="width:100%;" alt="User">
						  <br>
						  <blockquote>
                            Select "Assigned Tickets" from Tickets Menu.
							</blockquote>
							<blockquote>
                           Select date range and click on "Submit" button to search the ticket.
							</blockquote>
							<blockquote>
                           Click on "Ticket No".
							</blockquote>
							<blockquote>
                           Click on "Return Ticket".
							</blockquote>
							<blockquote>
                           Enter response and click on "Return" to return ticket back to component owner.
							</blockquote>
                        </div>
                    </div>
                </div>



					</div>
					</div>
                  </div>

				<div class="tab-pane" id="customer">
					<div class="row">
					<div class="col-12" id="accordion">

					 <div class="card card-primary card-outline">
                    <a class="d-block w-100" data-toggle="collapse" href="#collapseCustomerOne">
                        <div class="card-header">
                            <h4 class="card-title w-100">
                                Create New Farmer
                            </h4>
                        </div>
                    </a>
                    <div id="collapseCustomerOne" class="collapse show" data-parent="#accordion">
                        <div class="card-body">
                           <img src="/suprsales_resource/dist/img/customer_module1.png" style="width:100%;" alt="User">
						  <br>
						  <blockquote>
                            Select "Create Farmer" from Customer Menu.
							</blockquote>
							<blockquote>
                           To create multiple farmers, upload csv file of farmers in required format.
							</blockquote>
							<blockquote>
                           Or farmer can be created by form.
							</blockquote>
                        </div>
                    </div>
                </div>

				<div class="card card-primary card-outline">
                    <a class="d-block w-100" data-toggle="collapse" href="#collapseCustomerTwo">
                        <div class="card-header">
                            <h4 class="card-title w-100">
                                Create New Retailer
                            </h4>
                        </div>
                    </a>
                    <div id="collapseCustomerTwo" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                           <img src="/suprsales_resource/dist/img/customer_module2.png" style="width:100%;" alt="User">
						  <br>
						  <blockquote>
                            Select "Create Retailer" from Customer Menu.
							</blockquote>
							<blockquote>
                           To create multiple retailers, upload csv file of retailers in required format.
							</blockquote>
							<blockquote>
                           Or retailer can be created by form.
							</blockquote>
                        </div>
                    </div>
                </div>

				<div class="card card-warning card-outline">
                    <a class="d-block w-100" data-toggle="collapse" href="#collapseCustomerThree">
                        <div class="card-header">
                            <h4 class="card-title w-100">
                                Assign Farmer/Retailer to Employee
                            </h4>
                        </div>
                    </a>
                    <div id="collapseCustomerThree" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                           <img src="/suprsales_resource/dist/img/customer_module3.png" style="width:100%;" alt="User">
						  <br>
						  <blockquote>
                            Select "Assign" from Customer Menu.
							</blockquote>
							<blockquote>
                           Select "Employee" from dropdown.
							</blockquote>
							<blockquote>
                           Select multiple farmers/retailers and click on "Save" button to assign farmer/retailer to employee.
							</blockquote>
                        </div>
                    </div>
                </div>

				<div class="card card-warning card-outline">
                    <a class="d-block w-100" data-toggle="collapse" href="#collapseCustomerFour">
                        <div class="card-header">
                            <h4 class="card-title w-100">
                                Edit Farmer/Retailer
                            </h4>
                        </div>
                    </a>
                    <div id="collapseCustomerFour" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                           <img src="/suprsales_resource/dist/img/customer_module4.png" style="width:100%;" alt="User">
						  <br>
						  <blockquote>
                            Select "My Customers" from Customer Menu.
							</blockquote>
							<blockquote>
                           Click on edit button under "Action" tab.
							</blockquote>
							<blockquote>
                           Edit farmer/retailer details and click on "Update" to save changes.
							</blockquote>
                        </div>
                    </div>
                </div>

				<div class="card card-danger card-outline">
                    <a class="d-block w-100" data-toggle="collapse" href="#collapseCustomerFive">
                        <div class="card-header">
                            <h4 class="card-title w-100">
                                View Customer Ledger
                            </h4>
                        </div>
                    </a>
                    <div id="collapseCustomerFive" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                           <img src="/suprsales_resource/dist/img/customer_module5.png" style="width:100%;" alt="User">
						  <br>
						  <blockquote>
                            Select "My Customers" from Customer Menu.
							</blockquote>
							<blockquote>
                           Click on ledger button under "Action" tab.
							</blockquote>
							<blockquote>
                           A window opens with relevant ledger data of customer.
							</blockquote>
                        </div>
                    </div>
                </div>

				<div class="card card-danger card-outline">
                    <a class="d-block w-100" data-toggle="collapse" href="#collapseCustomerSix">
                        <div class="card-header">
                            <h4 class="card-title w-100">
                                View Customer Details (Ageing/Financial KPI)
                            </h4>
                        </div>
                    </a>
                    <div id="collapseCustomerSix" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                           <img src="/suprsales_resource/dist/img/customer_module6.png" style="width:100%;" alt="User">
						  <br>
						  <blockquote>
                            Select "My Customers" from Customer Menu.
							</blockquote>
							<blockquote>
                           Click on view button under "Action" tab.
							</blockquote>
							<blockquote>
                           A window opens with relevant ageing and financial details of customer.
							</blockquote>
                        </div>
                    </div>
                </div>

					</div>
					</div>
                  </div>

				  <div class="tab-pane" id="order">
					<div class="row">
					<div class="col-12" id="accordion">

					 <div class="card card-primary card-outline">
                    <a class="d-block w-100" data-toggle="collapse" href="#collapseOrderOne">
                        <div class="card-header">
                            <h4 class="card-title w-100">
                                Download Orders
                            </h4>
                        </div>
                    </a>
                    <div id="collapseOrderOne" class="collapse show" data-parent="#accordion">
                        <div class="card-body">
                           <img src="/suprsales_resource/dist/img/order_module1.png" style="width:100%;" alt="User">
						  <br>
						  <blockquote>
                            Select "My Depot Orders" from Sales Menu.
							</blockquote>
							<blockquote>
                           Select date range and click on "Submit" button.
							</blockquote>
							<blockquote>
                           Click on download button to download orders.
							</blockquote>
                        </div>
                    </div>
                </div>

				<div class="card card-primary card-outline">
                    <a class="d-block w-100" data-toggle="collapse" href="#collapseOrderTwo">
                        <div class="card-header">
                            <h4 class="card-title w-100">
                                View SKUs mapped to Material Group
                            </h4>
                        </div>
                    </a>
                    <div id="collapseOrderTwo" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                           <img src="/suprsales_resource/dist/img/order_module2.png" style="width:100%;" alt="User">
						  <br>
						  <blockquote>
                            Select "Material Groups" from Products Menu.
							</blockquote>
							<blockquote>
                           Click on "SKU".
							</blockquote>
							<blockquote>
                           A page opens with relevant SKUs mapped to the material group.
							</blockquote>
                        </div>
                    </div>
                </div>

				<div class="card card-warning card-outline">
                    <a class="d-block w-100" data-toggle="collapse" href="#collapseOrderThree">
                        <div class="card-header">
                            <h4 class="card-title w-100">
                                View Stocks
                            </h4>
                        </div>
                    </a>
                    <div id="collapseOrderThree" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                           <img src="/suprsales_resource/dist/img/order_module3.png" style="width:100%;" alt="User">
						  <br>
						  <blockquote>
                            Select "My Stocks" from Products Menu.
							</blockquote>
							<blockquote>
                           A page opens with relevant stock details.
							</blockquote>
                        </div>
                    </div>
                </div>

				<div class="card card-warning card-outline">
                    <a class="d-block w-100" data-toggle="collapse" href="#collapseOrderFour">
                        <div class="card-header">
                            <h4 class="card-title w-100">
                                Edit Plant
                            </h4>
                        </div>
                    </a>
                    <div id="collapseOrderFour" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                           <img src="/suprsales_resource/dist/img/order_module4.png" style="width:100%;" alt="User">
						  <br>
						  <blockquote>
                            Select "All Plants" from Products Menu.
							</blockquote>
							<blockquote>
                           Click on edit button under "Action" tab.
							</blockquote>
							<blockquote>
                           Edit plant and click on "Update" to save changes.
							</blockquote>
                        </div>
                    </div>
                </div>

					</div>
					</div>
                  </div>


				 <div class="tab-pane" id="claim">
					<div class="row">
					<div class="col-12" id="accordion">

					 <div class="card card-primary card-outline">
                    <a class="d-block w-100" data-toggle="collapse" href="#collapseClaimOne">
                        <div class="card-header">
                            <h4 class="card-title w-100">
                               Create a New Claim
                            </h4>
                        </div>
                    </a>
                    <div id="collapseClaimOne" class="collapse show" data-parent="#accordion">
                        <div class="card-body">
                           <img src="/suprsales_resource/dist/img/claim_module1.png" style="width:100%;" alt="User">
						  <br>
						  <blockquote>
                            Select "Create Claim" from Claim Menu.
							</blockquote>
							<blockquote>
                           Select date and fill in the claim amount.
							</blockquote>
							<blockquote>
                           Click on "Save" button to submit a new claim.
							</blockquote>
                        </div>
                    </div>
                </div>

				<div class="card card-primary card-outline">
                    <a class="d-block w-100" data-toggle="collapse" href="#collapseClaimTwo">
                        <div class="card-header">
                            <h4 class="card-title w-100">
                               Mark No Claim (Set Zero Claim Value)
                            </h4>
                        </div>
                    </a>
                    <div id="collapseClaimTwo" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                           <img src="/suprsales_resource/dist/img/claim_module2.png" style="width:100%;" alt="User">
						  <br>
						  <blockquote>
                            Select "Create Claim" from Claim Menu.
							</blockquote>
							<blockquote>
                           Select checkbox to mark zero claim.
							</blockquote>
							<blockquote>
                           Click on "Save" button to submit a new zero claim.
							</blockquote>
                        </div>
                    </div>
                </div>

				<div class="card card-warning card-outline">
                    <a class="d-block w-100" data-toggle="collapse" href="#collapseClaimThree">
                        <div class="card-header">
                            <h4 class="card-title w-100">
                               Withdraw Claim
                            </h4>
                        </div>
                    </a>
                    <div id="collapseClaimThree" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                           <img src="/suprsales_resource/dist/img/claim_module3.png" style="width:100%;" alt="User">
						  <br>
						  <blockquote>
                            Select "My Claims" from Claim Menu.
							</blockquote>
							<blockquote>
                           Select Submission Cycle, Month, Year and click on "Submit".
							</blockquote>
							<blockquote>
                           Click on delete button under "Action" tab.
							</blockquote>
							<blockquote>
                           Click on "Delete" button to withdraw claim.
							</blockquote>
                        </div>
                    </div>
                </div>

				<div class="card card-warning card-outline">
                    <a class="d-block w-100" data-toggle="collapse" href="#collapseClaimFour">
                        <div class="card-header">
                            <h4 class="card-title w-100">
                               Edit Claim
                            </h4>
                        </div>
                    </a>
                    <div id="collapseClaimFour" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                           <img src="/suprsales_resource/dist/img/claim_module4.png" style="width:100%;" alt="User">
						  <br>
						  <blockquote>
                            Select "My Claims" from Claim Menu.
							</blockquote>
							<blockquote>
                           Select Submission Cycle, Month, Year and click on "Submit".
							</blockquote>
							<blockquote>
                           Click on edit button under "Action" tab.
							</blockquote>
							<blockquote>
                           Edit claim and click on "Update" button to save changes.
							</blockquote>
                        </div>
                    </div>
                </div>

				<div class="card card-danger card-outline">
                    <a class="d-block w-100" data-toggle="collapse" href="#collapseClaimFive">
                        <div class="card-header">
                            <h4 class="card-title w-100">
                              Approve/Reject Pending Claim
                            </h4>
                        </div>
                    </a>
                    <div id="collapseClaimFive" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                           <img src="/suprsales_resource/dist/img/claim_module5.png" style="width:100%;" alt="User">
						  <br>
						  <blockquote>
                            Select "Approve Claim" from Claim Menu.
							</blockquote>
							<blockquote>
                           Select Submission Cycle, Month, Year and click on "Submit".
							</blockquote>
							<blockquote>
                           Click on "Pending".
							</blockquote>
							<blockquote>
                           Select checkbox and click on "Approve/Reject" under "Action" dropdown to approve/reject claim.
							</blockquote>
                        </div>
                    </div>
                </div>

				<div class="card card-danger card-outline">
                    <a class="d-block w-100" data-toggle="collapse" href="#collapseClaimSix">
                        <div class="card-header">
                            <h4 class="card-title w-100">
                              Mark Void Rejected Claim
                            </h4>
                        </div>
                    </a>
                    <div id="collapseClaimSix" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                           <img src="/suprsales_resource/dist/img/claim_module6.png" style="width:100%;" alt="User">
						  <br>
						  <blockquote>
                            Select "Rejected Claims" from Claim Menu.
							</blockquote>
							<blockquote>
                           Select Submission Cycle, Month, Year and click on "Submit".
							</blockquote>
							<blockquote>
                           Click on delete button under "Action" tab.
							</blockquote>
							<blockquote>
                           Click on "Delete" button to mark void claim.
							</blockquote>
                        </div>
                    </div>
                </div>


					</div>
					</div>
                  </div>

				<div class="tab-pane" id="announcement">
					<div class="row">
					<div class="col-12" id="accordion">

					 <div class="card card-primary card-outline">
                    <a class="d-block w-100" data-toggle="collapse" href="#collapseAnnOne">
                        <div class="card-header">
                            <h4 class="card-title w-100">
                               Create Announcement Type
                            </h4>
                        </div>
                    </a>
                    <div id="collapseAnnOne" class="collapse show" data-parent="#accordion">
                        <div class="card-body">
                           <img src="/suprsales_resource/dist/img/ann_module1.png" style="width:100%;" alt="User">
						  <br>
						  <blockquote>
                            Select "Create Type" from Announcement Menu.
							</blockquote>
							<blockquote>
                           Click on "Create" button.
							</blockquote>
							<blockquote>
                           Enter an announcement type and click on "Create" to create a new announcement type.
							</blockquote>
                        </div>
                    </div>
                </div>

				<div class="card card-primary card-outline">
                    <a class="d-block w-100" data-toggle="collapse" href="#collapseAnnTwo">
                        <div class="card-header">
                            <h4 class="card-title w-100">
                               Create Announcement
                            </h4>
                        </div>
                    </a>
                    <div id="collapseAnnTwo" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                           <img src="/suprsales_resource/dist/img/ann_module2.png" style="width:100%;" alt="User">
						  <br>
						  <blockquote>
                            Select "Create" from Announcement Menu.
							</blockquote>
							<blockquote>
                           Click on "Create" button.
							</blockquote>
							<blockquote>
                           Fill in the details and click on "Create" to create a new announcement.
							</blockquote>
                        </div>
                    </div>
                </div>

				<div class="card card-warning card-outline">
                    <a class="d-block w-100" data-toggle="collapse" href="#collapseAnnThree">
                        <div class="card-header">
                            <h4 class="card-title w-100">
                               View Announcement Image
                            </h4>
                        </div>
                    </a>
                    <div id="collapseAnnThree" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                           <img src="/suprsales_resource/dist/img/ann_module3.png" style="width:100%;" alt="User">
						  <br>
						  <blockquote>
                            Select "My Announcements" from Announcement Menu.
							</blockquote>
							<blockquote>
                           Click on image button under "Action" tab.
							</blockquote>
							<blockquote>
                           A new window opens with announcement image.
							</blockquote>
                        </div>
                    </div>
                </div>

				</div>
				</div>
				</div>


				<div class="tab-pane" id="setting">
					<div class="row">
					<div class="col-12" id="accordion">

					 <div class="card card-primary card-outline">
                    <a class="d-block w-100" data-toggle="collapse" href="#collapseSettingOne">
                        <div class="card-header">
                            <h4 class="card-title w-100">
                               Create New Level
                            </h4>
                        </div>
                    </a>
                    <div id="collapseSettingOne" class="collapse show" data-parent="#accordion">
                        <div class="card-body">
                           <img src="/suprsales_resource/dist/img/set_module1.png" style="width:100%;" alt="User">
						  <br>
						  <blockquote>
                            Select "Configurations" from Settings Menu.
							</blockquote>
							<blockquote>
                           Open "Create Level" form.
							</blockquote>
							<blockquote>
                           Fill the details and click on "Save" to create a new level.
							</blockquote>
                        </div>
                    </div>
                </div>

				<div class="card card-primary card-outline">
                    <a class="d-block w-100" data-toggle="collapse" href="#collapseSettingTwo">
                        <div class="card-header">
                            <h4 class="card-title w-100">
                               Change Level Settings
                            </h4>
                        </div>
                    </a>
                    <div id="collapseSettingTwo" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                           <img src="/suprsales_resource/dist/img/set_module2.png" style="width:100%;" alt="User">
						  <br>
						  <blockquote>
                            Select "Configurations" from Settings Menu.
							</blockquote>
							<blockquote>
                           Open "Level Settings" form.
							</blockquote>
							<blockquote>
                           Update level amounts and click on "Save" to save changes.
							</blockquote>
                        </div>
                    </div>
                </div>

				<div class="card card-warning card-outline">
                    <a class="d-block w-100" data-toggle="collapse" href="#collapseSettingThree">
                        <div class="card-header">
                            <h4 class="card-title w-100">
                               Update Regions in Zone
                            </h4>
                        </div>
                    </a>
                    <div id="collapseSettingThree" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                           <img src="/suprsales_resource/dist/img/set_module3.png" style="width:100%;" alt="User">
						  <br>
						  <blockquote>
                            Select "Zone" from Settings Menu.
							</blockquote>
							<blockquote>
                           Click on edit button under "Action" tab.
							</blockquote>
							<blockquote>
                           Select regions and click on "Update" to save changes.
							</blockquote>
                        </div>
                    </div>
                </div>

				<div class="card card-warning card-outline">
                    <a class="d-block w-100" data-toggle="collapse" href="#collapseSettingFour">
                        <div class="card-header">
                            <h4 class="card-title w-100">
                               Create New Area
                            </h4>
                        </div>
                    </a>
                    <div id="collapseSettingFour" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                           <img src="/suprsales_resource/dist/img/set_module4.png" style="width:100%;" alt="User">
						  <br>
						  <blockquote>
                            Select "Area" from Settings Menu.
							</blockquote>
							<blockquote>
                           Click on "Create" button.
							</blockquote>
							<blockquote>
                           Fill the details and click on "Create" to create a new area.
							</blockquote>
                        </div>
                    </div>
                </div>



				</div>
				</div>
				</div>

              </div><!-- /.card-body -->
            </div>
	</div>


        <!--<div class="row">
            <div class="col-12 mt-3 text-center">
                <p class="lead">
                    <a href="contact-us.html">Contact us</a>,
                    if you found not the right anwser or you have a other question?<br />
                </p>
            </div>
        </div>-->
    </section>

</div>

        <!-- /#page-wrapper -->

      <footer class="main-footer bg-light">

 <small>   <strong><a href="https://www.samishti.com/" target="_blank">Samishti Infotech Private Ltd.</a></strong></small>
  <div class="float-right d-none d-sm-inline-block text-secondary">
      <b>Version</b> 0.0.1
    </div>
  </footer>
 <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
    </div>

        <!-- /#page-wrapper -->
@else
    <script>window.location = "/userlogin";</script>
   @endif


    <!-- /#wrapper -->


	<script src="{!! asset('suprsales_resource/plugins/jquery/jquery.min.js') !!}" type="text/javascript"></script>
<script src="{!! asset('suprsales_resource/plugins/bootstrap/jquery-3.5.1.js') !!}" type="text/javascript"></script>
	<script src="{!! asset('suprsales_resource/plugins/bootstrap/js/bootstrap.bundle.min.js') !!}" type="text/javascript"></script>

	<script src="{!! asset('suprsales_resource/plugins/select2/js/select2.full.min.js') !!}" type="text/javascript"></script>
	<script src="{!! asset('suprsales_resource/plugins/chart.js/Chart.min.js') !!}" type="text/javascript"></script>

	<script src="{!! asset('suprsales_resource/plugins/sweetalert2/sweetalert2.min.js') !!}" type="text/javascript"></script>

	<script src="{!! asset('suprsales_resource/dist/js/adminlte.min.js') !!}" type="text/javascript"></script>
	<script src="{!! asset('suprsales_resource/dist/js/demo.js') !!}" type="text/javascript"></script>

<script src="{!! asset('suprsales_resource/plugins/toastr/toastr.min.js') !!}" type="text/javascript"></script>
	<script src="{!! asset('https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.7.0') !!}" type="text/javascript"></script>

		<script src="{!! asset('suprsales_resource/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js') !!}" type="text/javascript"></script>
	<script src="{!! asset('suprsales_resource/plugins/moment/moment.min.js') !!}" type="text/javascript"></script>
	<script src="{!! asset('suprsales_resource/plugins/inputmask/min/jquery.inputmask.bundle.min.js') !!}" type="text/javascript"></script>
	<script src="{!! asset('suprsales_resource/plugins/daterangepicker/daterangepicker.js') !!}" type="text/javascript"></script>
	<script src="{!! asset('suprsales_resource/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') !!}" type="text/javascript"></script>
	<script src="{!! asset('suprsales_resource/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') !!}" type="text/javascript"></script>
	<script src="{!! asset('suprsales_resource/plugins/bootstrap-switch/js/bootstrap-switch.min.js') !!}" type="text/javascript"></script>
	<script src="{!! asset('suprsales_resource/plugins/bs-custom-file-input/bs-custom-file-input.min.js') !!}" type="text/javascript"></script>
	<script src="{!! asset('suprsales_resource/plugins/datatables/jquery.dataTables.min.js') !!}" type="text/javascript"></script>
	<script src="{!! asset('suprsales_resource/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') !!}" type="text/javascript"></script>
	<script src="{!! asset('suprsales_resource/plugins/datatables-responsive/js/dataTables.responsive.min.js') !!}" type="text/javascript"></script>
	<script src="{!! asset('suprsales_resource/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') !!}" type="text/javascript"></script>
	<script src="{!! asset('suprsales_resource/plugins/datatables/jquery.dataTables.min.js') !!}" type="text/javascript"></script>
	<script src="{!! asset('suprsales_resource/plugins/datatables/dataTables.select.min.js') !!}" type="text/javascript"></script>
	<script src="{!! asset('suprsales_resource/plugins/datatables/dataTables.buttons.min.js') !!}" type="text/javascript"></script>
	<script src="{!! asset('suprsales_resource/plugins/datatables/jszip.min.js') !!}" type="text/javascript"></script>

	<script src="{!! asset('suprsales_resource/plugins/datatables/buttons.html5.min.js') !!}" type="text/javascript"></script>

	<script src="{!! asset('suprsales_resource/plugins/bootstrap/bootstrap4-toggle.min.js') !!}" type="text/javascript"></script>
	<script src="{!! asset('suprsales_resource/plugins/datatables/dataTables.checkboxes.min.js') !!}" type="text/javascript"></script>
	<!-- page script -->
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()


    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });

  })
</script>
</body>



</html>
