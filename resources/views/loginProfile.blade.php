<!DOCTYPE html>

<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SuprSales</title>
  <!-- Tell the browser to be responsive to screen width -->
  {{-- this is for the profile details of the user  --}}
  {{-- it will show when the user click the profile option shown inside the top right corner users picture --}}
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
  {{-- It is for veryfy the customer and verified by their ids --}}
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


{{-- This is the profile content shown after clicking the profile option --}}
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                {{-- This is the link for home page it route to the dashboard --}}
              <li class="breadcrumb-item"><a href="{{ route('dashboard.index')}}">Home</a></li>
              <li class="breadcrumb-item active">Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
{{-- this is for the image of the  Authenticate users to set their image--}}
@php
  $image = Auth::user()->image;
  @endphp
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
            {{-- $data contain all employee get by their ids from database through controller set as values --}}
		@isset($data)
		@foreach ($data as $value)
          <div class="col-md-4">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
             <div class="card-body box-profile">
                <div class="text-center">
        {{-- if $image is filled means If the image is there then only it is filled --}}
		@if(filled($image))
			 <img class="profile-user-img img-fluid img-circle"
             {{-- this is the storage in which image is there --}}
                       src="{{ URL::asset('storage/'.$image) }}"
                       alt="User profile picture">
                       {{-- otherwise it is the default image shown for every users  --}}
		@else
		<img src="suprsales_resource/dist/img/usericon.png" class="profile-user-img img-fluid img-circle" alt="User">
        @endif
                </div>
                 {{-- It gives the Employee name from $values --}}
                <h3 class="profile-username text-center">{{ $value['EMP_NAME'] }}</h3>

                 {{-- It gives the Employee DESIGNATION from $values like mobile emali and reporting to --}}
                <p class="text-muted text-center">{{ $value['EMP_DESIGNATION'] }}</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Mobile</b> <a class="float-right">{{ $value['EMP_MOBILE_NO'] }}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Email</b> <a class="float-right">{{ $value['EMP_EMAIL'] }}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Report To</b> <a class="float-right">{{ $value['REPORTING_MANAGER'] }}</a>
                  </li>
                </ul>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->

            <!-- /.card -->
          </div>
          <!-- /.col -->
          {{-- There is three btn beside the profile after clicking the respective btn they gives their respective data --}}
          <div class="col-md-8">
            <div class="card">
              <div class="card-header p-2 bg-light">
                <ul class="nav nav-pills red">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Details</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
				  <li class="nav-item"><a class="nav-link" href="#edit" data-toggle="tab">Edit</a></li>
				</ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <!-- Post -->
      {{-- This form open after clicking the details btn --}}
                  <form class="form-horizontal">

				<dl class="form-group row">
            {{-- This tab is use for Employee ID which contain plant with respective users --}}
                  <dt class="col-sm-3"><a><b>Employee ID</b></a></dt>
                  <dd class="col-sm-7">{{ $value['EMP_ID'] }}</dd>
                </dl>
				<dl class="form-group row">
            {{-- This tab is use for Employee Type which contain plant with respective users --}}
                  <dt class="col-sm-3"><a><b>Employee Type</b></a></dt>
                  <dd class="col-sm-7">
		    @if ($value['EMP_CONTRACT_TYPE'] =='0')
				<span class='badge badge-secondary'>Permanent</span>
			@elseif ($value['EMP_CONTRACT_TYPE'] =='1')
				<span class='badge badge-primary'>Contract</span>
				@endif
				</dd>
                </dl>
				<dl class="form-group row">
                  <dt class="col-sm-3"><a><b>Is Admin</b></a></dt>
                  <dd class="col-sm-7">
				  @if ($value['IS_ADMIN'] =='0')
				        No
			  @elseif ($value['IS_ADMIN'] =='1')
			          Yes &nbsp;&nbsp;
					   @if ($value['EMP_TYPE'] =='0')
								<span class='badge badge-secondary'>Depot Manager</span>
						@elseif ($value['EMP_TYPE'] =='1')
								<span class='badge badge-primary'>Org Admin</span>
					     @endif
					  @endif
					  </dd>
                </dl>
            {{-- This tab is use for Is Approver which contain plant with respective users --}}
				<dl class="form-group row">
                  <dt class="col-sm-3"><a><b>Is Approver</b></a></dt>
                  <dd class="col-sm-7">
				  @if ($value['IS_APPROVER'] =='0')
				    No
				  @elseif ($value['IS_APPROVER'] =='1')
				  Yes
				  @endif
				  </dd>
                </dl>
            {{-- This tab is use for Region which contain plant with respective users --}}
				<dl class="form-group row">
                  <dt class="col-sm-3"><a><b>Region</b></a></dt>
                  <dd class="col-sm-7">
				  @foreach($value['REGION'] as $valu)
					 {{ $loop->first ? '' : ', ' }}
					{{ $valu['REGION_NAME'] }}
				  @endforeach
				  </dd>
                </dl>
            {{-- This tab is use for plant which contain plant with respective users --}}
				<dl class="form-group row">
                  <dt class="col-sm-3"><a><b>Plant</b></a></dt>
                  <dd class="col-sm-7">{{ $value['PLANT'] }}</dd>
                </dl>

              </form>
                  </div>
                  <!-- /.tab-pane -->

                  <!-- /.tab-pane -->
              {{-- This tab is for reset the password with help of the user email --}}
                  <div class="tab-pane" id="settings">
				  <div class="card card-success">
                    <form method="POST" class="form-horizontal" action="{{route('loginprofile.store')}}">
                      {{ csrf_field() }}
					<div class="card-body">

                   {{-- This tab contain Email --}}
					<div class="form-group row">
                        <label for="inputName" class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-7">
                          <input type="email" class="form-control" name="email" placeholder="Enter Email">
                        </div>
                      </div>
                   {{-- This tab contain New Password --}}
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-3 col-form-label">New Password</label>
                        <div class="col-sm-7">
                          <input type="password" class="form-control" name="password" placeholder="Enter Password">
                        </div>
                      </div>
                      {{-- This tab contain Confirm Password --}}
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-3 col-form-label">Confirm Password</label>
                        <div class="col-sm-7">
                          <input type="password" class="form-control" name="password_confirmation" placeholder="Renter Password">
                        </div>
                      </div>
						</div>
                      <div class="card-footer">
                        <div class="col-sm-7">
                            {{-- after clicking submit btn the data updated --}}
                          <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>


                    </form>
					</div>

                  </div>
				  <script>
    //  It store the value to the server
  @if(Session::has('message'))
//   here toastr.options is use for non blocking notificatin if both are true then it will give the success message
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.success("{{ session('message') }}");
  @endif

  @if(Session::has('error'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.error("{{ session('error') }}");
  @endif

  @if(Session::has('info'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.info("{{ session('info') }}");
  @endif

  @if(Session::has('warning'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.warning("{{ session('warning') }}");
  @endif
</script>

              {{-- This is for the setting btn  --}}
				  <div class="tab-pane" id="edit">
				  <div class="card card-success">
                      {{-- It is for verifying the user with the emp_id --}}
				  @php
				$loginprofile = Auth::user()->emp_id;
				@endphp


					<div class="card-body">
                        {{-- after clicking the setting btn The profile is ready to update if we make any change andf clink the update btn --}}
					<form class="form-horizontal" action="{{route('loginprofile.update',$loginprofile)}}" method="POST" enctype="multipart/form-data">
                {{-- This function can be used to generate the hidden input field in the HTML form. --}}
             {{ csrf_field() }}
             {{-- it is used to update resource available on the server.  --}}
			 {{ method_field('PUT') }}
                      <div class="form-group row">
                          {{-- This tab contain Mobile number and the data  --}}
                        <label for="inputName" class="col-sm-3 col-form-label">Mobile</label>
                        <div class="col-sm-7">
                          <input type="tel" class="form-control" name="mobile" value="{{ $value['EMP_MOBILE_NO'] }}"  pattern="[0-9]{10}" maxlength="10">
                        </div>
                      </div>
                          {{-- This tab contain Profile Picture choose from the device   --}}
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-3 col-form-label">Profile Picture</label>
                        <div class="col-sm-7">
                         <div class="custom-file">
                                          <input type="file" name="filename"  class="custom-file-input" />
                                          <label class="custom-file-label">Choose file</label>
                                        </div>
						  </div>
                      </div>
						</div>
                      <div class="card-footer">
                        <div class="col-sm-7">
                            {{-- This tab is for submit btn which update the data --}}
                          <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>


                    </form>
					</div>

                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
		  @endforeach
		   @endisset
           {{-- if there is no record inside the data it shown no records found --}}
			@empty($data)
			<script>toastr.warning("No records found.");</script>
			@endempty
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
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
	<script src="{!! asset('suprsales_resource/plugins/bootstrap/js/bootstrap.bundle.min.js') !!}" type="text/javascript"></script>
	<script src="{!! asset('suprsales_resource/plugins/bootstrap/jquery-3.5.1.js') !!}" type="text/javascript"></script>
	<script src="{!! asset('suprsales_resource/plugins/select2/js/select2.full.min.js') !!}" type="text/javascript"></script>
	<script src="{!! asset('suprsales_resource/plugins/chart.js/Chart.min.js') !!}" type="text/javascript"></script>

	<script src="{!! asset('suprsales_resource/plugins/sweetalert2/sweetalert2.min.js') !!}" type="text/javascript"></script>

	<script src="{!! asset('suprsales_resource/dist/js/adminlte.min.js') !!}" type="text/javascript"></script>
	<script src="{!! asset('suprsales_resource/dist/js/demo.js') !!}" type="text/javascript"></script>

<script src="{!! asset('suprsales_resource/plugins/toastr/toastr.min.js') !!}" type="text/javascript"></script>

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
	<script src="{!! asset('suprsales_resource/plugins/datatables/buttons.html5.min.js') !!}" type="text/javascript"></script>
	<script src="{!! asset('suprsales_resource/plugins/bootstrap/bootstrap4-toggle.min.js') !!}" type="text/javascript"></script>
	<script src="{!! asset('suprsales_resource/plugins/datatables/dataTables.checkboxes.min.js') !!}" type="text/javascript"></script>


<script type="text/javascript">
$(document).ready(function () {
  bsCustomFileInput.init();
});
</script>


</body>



</html>
