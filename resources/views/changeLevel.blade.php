<!DOCTYPE html>

<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>SuprSales</title>
   <!-- Tell the browser to be responsive to screen width -->
  {{-- It connect the link with the css fies and JS files --}}
  {{-- In this LEVEL ALL the header footer and Sidebar Contain in this one file --}}
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
.table{
 background-color:#ede9f7;
}
a.paginate_button {
    background-color: #e5def7;
}
   #change_level {
    display: none;
}
  div.dataTables_length {
  margin-right: 1em;
}
.toolbar {
    float:left;
}
.dataTables_wrapper .dt-buttons {
  float:right;
  text-align:center;
  margin-left: 1em;
}
ion-icon {
  pointer-events: none;
}

  </style>
</head>

<body class="hold-transition sidebar-mini accent-teal">
{{-- for the authorised users it will redirect the next level --}}
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


<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Change Level</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                {{-- It gives the link inside home btn in to top corner --}}
              <li class="breadcrumb-item"><a href="{{ route('dashboard.index')}}">Home</a></li>
              <li class="breadcrumb-item active">Change Level</li>
            </ol>
          </div>
        </div>
		<br>
		<div class="row"><small><i class="fas fa-bus text-maroon"></i>&nbsp;Bus/Train &nbsp;<i class="fas fa-tachometer-alt text-danger"></i>&nbsp;Km &nbsp;<i class="fas fa-plane text-indigo"></i>&nbsp;Air &nbsp;<i class="fas fa-taxi text-success"></i>&nbsp;Taxi/Auto/Rickshaw &nbsp;<i class="fas fa-hotel text-purple"></i>&nbsp;Hotel &nbsp;<i class="fas fa-percentage text-lightblue"></i>&nbsp;Per Km Rate &nbsp;<i class="fas fa-tools text-lime"></i>&nbsp;Vehicle Repair &nbsp;<i class="fas fa-gas-pump text-pink"></i>&nbsp;Fuel &nbsp;<i class="fas fa-route text-primary"></i>&nbsp;DA Outstation &nbsp;<i class="fas fa-map-marker-alt text-fuchsia"></i>&nbsp;DA Local &nbsp;<i class="fas fa-wifi text-orange"></i>&nbsp;Internet/Phone &nbsp;<i class="fas fa-mobile-alt text-info"></i>&nbsp;Stationary &nbsp;<i class="fab fa-medium-m text-secondary"></i>&nbsp;Miscellaneous</small></div>

      </div><!-- /.container-fluid -->
    </section>

	<script>
  @if(Session::has("message"))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.success("{{ session("message") }}");
  @endif

  @if(Session::has("error"))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.error("{{ session("error") }}");
  @endif

  @if(Session::has("info"))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.info("{{ session("info") }}");
  @endif

  @if(Session::has("warning"))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.warning("{{ session("warning") }}");
  @endif
</script>


 <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
{{-- After clicking the edit btn inside A column this form shown for individual users  --}}
			  <div class="modal fade text-left changeModal">
        <div class="modal-dialog">
          <div class="modal-content" style="width: 800px; height: 100px;">

                <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Edit Employee Level</h3>
				 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              </div>


              {{-- This for is shown after clicking the edit btn inside the A Column --}}
      <form class="form-horizontal" id="change_form" method="POST">
                 {{-- this tab is used for Emp ID --}}
                <div class="card-body">
				<input type="hidden" name="emp_id" id="emp_Id" class="form-control"  value="">

				 <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Emp ID</label>
                    <div class="col-sm-9">
                    <input class="form-control" id="employee_id"  value="" disabled>
                    </div>
                  </div>
                  {{-- this tab is used for Employee --}}
				  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Employee</label>
                    <div class="col-sm-9">
                    <input class="form-control"  id="employee_name" value="" disabled>
                    </div>
                </div>
                {{-- this tab is used for Vehicle Ownership --}}
				<div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Vehicle Ownership</label>
                    <div class="col-sm-9">
                    <input class="form-control"  id="vehicle_owner" value="" disabled>
                    </div>
                </div>
                {{-- this tab is used for Vehicle Type --}}
				<div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Vehicle Type</label>
                    <div class="col-sm-9">
                    <input class="form-control"  id="vehicle_type" value="" disabled>
                    </div>
                </div>
                {{-- this tab is used for Change Level here Onchange use for after clicking onchange myFunction will be called  --}}
				<div class="form-group row select2-teal">
                  <label class="col-sm-3 col-form-label">Change Level</label>
			 <div class="col-sm-9">
           <select class="form-control select2" name="LEVEL_RANK_ID" id="LEVEL_RANK_ID" onchange="myFunction(event)" style="width: 100%;" data-dropdown-css-class="select2-teal" required>
                   @foreach ($levels as $valuess)
				<option value="{{ $valuess['LEVEL_RANK_ID'] }}">{{ $valuess['LEVEL_NAME'] }}</option>
				@endforeach

                  </select>
				 </div>
                </div>
       {{-- This is  for the Change Other Expense tab inside Edit btn --}}
				<div class="card card-info">
				 <div class="card-header">
            <h3 class="card-title">Change Travel Expense</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Expand">
                <i class="fas fa-minus text-white"></i></button>

            </div>
          </div>
                {{-- this tab is used for Bus/Train --}}
				<div class="card-body">
				<div class="form-group row">
                    <label class="col-sm-4 col-form-label"><i class="fas fa-bus text-maroon"></i> Bus/Train</label>
                    <div class="col-sm-8">
                    <input name="exp_bus_train" id="exp_bus_train" class="form-control bus"  value="">
                    </div>
                  </div>
                    {{-- this tab is used for Air --}}
                  <div class="form-group row">
                    <label  class="col-sm-4 col-form-label"><i class="fas fa-plane text-indigo"></i> Air</label>
                    <div class="col-sm-8">
                      <input name="EXP_PLANE" id="EXP_PLANE" class="form-control plane"  value="">
                    </div>
                  </div>
                  {{-- this tab is used for Taxi/Auto/Rickshaw --}}
				  <div class="form-group row">
                    <label class="col-sm-4 col-form-label"><i class="fas fa-taxi text-success"></i> Taxi/Auto/Rickshaw</label>
                    <div class="col-sm-8">
                      <input name="EXP_TAXI_AUTO" id="EXP_TAXI_AUTO" class="form-control taxi"  value="">
                    </div>
                  </div>
                  {{-- this tab is used for Per Km Rate --}}
				  <div class="form-group row">
                    <label class="col-sm-4 col-form-label"><i class="fas fa-percentage text-lightblue"></i> Per Km Rate</label>
                    <div class="col-sm-8">
                      <input name="EXP_PER_KM_RATE" id="EXP_PER_KM_RATE" class="form-control per"  value="">
                    </div>
                  </div>
                  {{-- this tab is used for Vehicle Repair --}}
				  <div class="form-group row">
                    <label class="col-sm-4 col-form-label"><i class="fas fa-tools text-lime"></i> Vehicle Repair</label>
                    <div class="col-sm-8">
                      <input name="EXP_VEH_REPAIR" id="EXP_VEH_REPAIR" class="form-control vehicle"  value="">
                    </div>
                  </div>
                  {{-- this tab is used for Fuel --}}
				  <div class="form-group row">
                    <label class="col-sm-4 col-form-label"><i class="fas fa-gas-pump text-pink"></i> Fuel</label>
                    <div class="col-sm-8">
                      <input name="EXP_FUEL" id="EXP_FUE" class="form-control fuel"  value="">
                    </div>
                  </div>
                  {{-- this tab is used for KM--}}
				  <div class="form-group row">
                    <label class="col-sm-4 col-form-label"><i class="fas fa-tachometer-alt text-danger"></i> Km</label>
                    <div class="col-sm-8">
                      <input name="Max_Km" id="Max_Km" class="form-control maxKM"  value="">
                    </div>
                  </div>

				  </div>
				  </div>
{{-- This is  for the Change Other Expense tab inside Edit btn --}}
				  <div class="card card-info">
				 <div class="card-header">
            <h3 class="card-title">Change Other Expense</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Expand">
                <i class="fas fa-minus text-white"></i></button>

            </div>
          </div>
{{-- This is  for the Change Other Expense tab after clicking the + btn --}}
   {{-- this tab is used for Hotel --}}
				<div class="card-body">
				  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-4 col-form-label"><i class="fas fa-hotel text-purple"></i> Hotel</label>
                    <div class="col-sm-8">
                      <input name="EXP_HOTEL" id="EXP_HOTEL" class="form-control hotel"  value="">
                    </div>
                  </div>
     {{-- this tab is used for DA Outstation --}}
				  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-4 col-form-label"><i class="fas fa-route text-primary"></i> DA Outstation</label>
                    <div class="col-sm-8">
                      <input name="DA_RATES_OUTST" id="DA_RATES_OUTST"  class="form-control out"  value="">
                    </div>
                  </div>
         {{-- this tab is used for DA Local --}}
				  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-4 col-form-label"><i class="fas fa-map-marker-alt text-fuchsia"></i> DA Local</label>
                    <div class="col-sm-8">


                      <input name="DA_RATES_LOCAL" id="DA_RATES_LOCAL" class="form-control local"  value="">

					</div>
                  </div>
         {{-- this tab is used for Internet/Phone --}}
				  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-4 col-form-label"><i class="fas fa-wifi text-orange"></i> Internet/Phone</label>
                    <div class="col-sm-8">
                      <input name="EXP_MOBILE_INTERNET" id="EXP_MOBILE_INTERNET" class="form-control mobile"  value="">
                    </div>
                  </div>
          {{-- this tab is used for Stationary --}}
				  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-4 col-form-label"><i class="fas fa-mobile-alt text-info"></i> Stationary</label>
                    <div class="col-sm-8">
                      <input name="EXP_STATIONARY" id="EXP_STATIONARY" class="form-control stat"  value="">
                    </div>
                  </div>
          {{-- this tab is used for Misc --}}
				  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-4 col-form-label"><i class="fab fa-medium-m text-secondary"></i> Misc</label>
                    <div class="col-sm-8">
                      <input name="EXP_MISC" id="EXP_MISC" class="form-control misc"  value="">
                    </div>
                  </div>
                </div>
				</div>
				</div>
                <!-- /.card-body -->
                {{-- For update the edited value inside edit btn in the Action column --}}
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

{{-- This is for the data inside level tab --}}
			  <div class="card-body">

			  <table id="change_level" class="table table-bordered table-hover">
			  <thead>
                  <tr>

                   <th>Employee</th>
					<th>Travel</th>

					<th>DA</th>
					<th>Internet</th>
					<th>Hotel</th>
					<th>Stationary</th>
					<th>Misc</th>

					<th class="text-center">A</th>
                  </tr>
                  </thead>
                  <tbody>
             {{-- $level get from the ChangeLevelController it contain all given Employee data --}}
				  @isset($level)
				  @foreach ($level as $value)
				  <td class="text-center">
				   <div class="row">
				   <div class="col">
				  <small>
                  {{-- this column contain EMPLOYEE_ID ,LEVEL_NAME,EMPLOYEE_NAME in the Employee tab--}}
				  <span class='badge badge-info'>{{ $value['EMPLOYEE_ID'] }}
				  </span>
				  <span class='badge badge-primary'>
				  {{$value['LEVEL_NAME']}}
				  </span>
				  <br>
				 {{ $value['EMPLOYEE_NAME'] }}
				  </small>
				  </div>
				  </div>
					</td>
				  <td class="text-center">
				  <div class="row">
				  <small>
                  {{-- this column contain EXP_TAXI_AUTO,EXP_BUS_TRAIN,EXP_PLANE,EXP_PER_KM_RATE,EXP_VEH_REPAIR,EXP_FUEL and MAX_ALLOWED_KM data in the TRAVEL tab--}}
				  <nav class="navbar">
					<a class="d-flex flex-column">
					<span class='badge badge-secondary'>{{ $value['EXP_TAXI_AUTO'] }}</span>
					<i class="fas fa-taxi text-success" title="Taxi/Auto/Rickshaw"></i>
					 </a> &nbsp;&nbsp;&nbsp;
					<a class="d-flex flex-column">
					<span class='badge badge-secondary'>{{ $value['EXP_BUS_TRAIN'] }}</span>
					<i class="fas fa-bus text-maroon" title="Bus/Train"></i>
					 </a> &nbsp;&nbsp;&nbsp;
					 <a class="d-flex flex-column">
					 <span class='badge badge-secondary'>{{ $value['EXP_PLANE'] }}</span>
					<i class="fas fa-plane text-indigo" title="Air"></i>
					 </a> &nbsp;&nbsp;&nbsp;
					  <a class="d-flex flex-column">
					<span class='badge badge-secondary'>{{ $value['EXP_PER_KM_RATE'] }}</span>
					<i class="fas fa-percentage text-lightblue" title="Per Km Rate"></i>
					 </a> &nbsp;&nbsp;&nbsp;
					  <a class="d-flex flex-column">
					<span class='badge badge-secondary'>{{ $value['EXP_VEH_REPAIR'] }}</span>
					<i class="fas fa-tools text-lime" title="Vehicle Repair"></i>
					 </a> &nbsp;&nbsp;&nbsp;
					  <a class="d-flex flex-column">
					<span class='badge badge-secondary'>{{ $value['EXP_FUEL'] }}</span>
					<i class="fas fa-gas-pump text-pink" title="Max Allowed Fuel"></i>
					 </a> &nbsp;&nbsp;&nbsp;
					  <a class="d-flex flex-column">
					<span class='badge badge-secondary'>{{ $value['MAX_ALLOWED_KM'] }}</span>
					<i class="fas fa-tachometer-alt text-danger" title="Max Allowed Km"></i>
					 </a> &nbsp;&nbsp;&nbsp;
					</nav>

					</small>
					</div>


				  </td>
				  <td class="text-center">
				  <div class="row">
				  <small>
                  {{-- this column contain DA_RATES_LOCAL and DA_RATES_OUTST data in the DA tab--}}

				  <nav class="navbar">
					<a class="d-flex flex-column">
					<span class='badge badge-secondary'>{{ $value['DA_RATES_LOCAL'] }}</span>
					 <i class="fas fa-map-marker-alt text-fuchsia" title="Daily Allowance Local"></i>
					 </a> &nbsp;&nbsp;&nbsp;
					<a class="d-flex flex-column">
					<span class='badge badge-secondary'>{{ $value['DA_RATES_OUTST'] }}</span>
					<i class="fas fa-route text-primary" title="Daily Allowance Outstation"></i>
					 </a>
					</nav>

					</small>
					</div>

				  </td>

				  <td class="text-center">
				  <div class="row">
				  <small>
                  {{-- this column contain EXP_MOBILE_INTERNET data in the Internet tab--}}
				  <nav class="navbar">
					<a class="d-flex flex-column">
					<span class='badge badge-secondary'>{{ $value['EXP_MOBILE_INTERNET'] }}</span>
					<i class="fas fa-wifi text-orange" title="Internet/Phone"></i>
					 </a>

					</nav>

					</small>
					</div>

				  </td>

				  <td class="text-center">
				  <div class="row">
				  <small>
                    {{-- this column contain EXP_HOTEL data in the Hotel tab--}}
				  <nav class="navbar">
					<a class="d-flex flex-column">
					<span class='badge badge-secondary'>{{ $value['EXP_HOTEL'] }}</span>
					<i class="fas fa-hotel text-purple" title="Hotel"></i>
					 </a>
					</nav>

					</small>
					</div>

				  </td>

				  <td class="text-center">
				  <div class="row">
				  <small>
                  {{-- this tab contain STATIONARY data --}}
				  <nav class="navbar">
					<a class="d-flex flex-column">
					 <span class='badge badge-secondary'>{{ $value['EXP_STATIONARY'] }}</span>
					<i class="fas fa-mobile-alt text-info" title="Stationary"></i>
					 </a>
					</nav>

					</small>
					</div>

				  </td>

				  <td class="text-center">
				  <div class="row">
				  <small>

				  <nav class="navbar">
					<a class="d-flex flex-column">
					<span class='badge badge-secondary'>{{ $value['EXP_MISC'] }}</span>
					<i class="fab fa-medium-m text-secondary" title="Miscellaneous"></i>
					 </a>
					</nav>

					</small>
					</div>

				  </td>





				  <td>
                 {{-- Encode the json value and store in the $change --}}
					 @php
				$change = json_encode($value);
				@endphp
                  {{-- value contain the details of the employee ans define b their IDs --}}
					   <a class='btn btn-warning btn-sm change' href='#' value="{{$change}}" id="{{$value['EMPLOYEE_ID']}}" title="Edit">
                             <i class='fas fa-edit'></i>
                          </a>

				  </td>


				  </tr>
				  @endforeach
				   @endisset
              {{-- If there will be no search element then it shows  --}}
			@empty($level)
			<script>toastr.warning("No records found.");</script>
			@endempty
                  </tbody>
                </table>


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


        </div>
{{-- This is the link given in every page in the bottom --}}
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
<script type="text/javascript">
$(document).ready(function () {
  bsCustomFileInput.init();
});
</script>

<script>
$(document).ready(function(){

$('.nav-link').on("click", function(){

$('.nav-link').removeClass('active');

$(this).addClass('active');
$(this).siblings().removeClass("active");
});
});
</script>




<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()


    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });

  })
</script>
<script type="text/javascript">
$(document).ready(function () {
  bsCustomFileInput.init();
  $("[data-card-widget='collapse']").click()
});
</script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
  $('#change_level').DataTable({
      "paging": true,
	  "pageLength": 5,
	  "lengthMenu": [[5, 10, 20, -1], [5, 10, 20, "All"]],
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,


	 'columnDefs': [
         {
            'targets': 0
         },
         {
          targets: 1,
		  "width":"80%"
         },
		 {
        targets: 2,
		"width":"20%"
    },
			{
        targets: 3

    },
	{
        targets: 4

    },
	{
        targets: 5

    },
	{
        targets: 6

    },
	{
        targets: 7,
		className: 'dt-center'

    }
      ],
		  dom: 'l<"toolbar">Bfrtip',

        buttons: [



        ],


		initComplete: function () {
            var btns = $('.dt-button');
            btns.addClass('btn btn-info');
            btns.removeClass('dt-button');
			$("div.toolbar")
         .html('');
			$("#change_level").show();
		},

        select: {
            style:    'os',
            selector: 'td:first-child'
        },
        order: [[ 1, 'asc' ]],



    });


  });


</script>
It is for the
<script>

  // here on_click is the function and view_data is class
 $("body").on("click", ".change", function(event){
           var change = $(this).attr("id");

			var values = document.getElementById(change).getAttribute("value");
			var changes = JSON.parse(values);


			var ownership;
			var vehicle_type;
           // It is for VEHICLE_OWNERSHIP option dropdown I for company, 2 dor self none for none

			if(changes.VEHICLE_OWNERSHIP == 1) {
				ownership = "Company";
			}
			else if(changes.VEHICLE_OWNERSHIP == 2){
				ownership = "Self";
			}
			else{
				ownership = "None";
			}
           // It is for VEHICLE_TYPE option dropdown I for car, 2 for Motorcycle none for none
			if(changes.VEHICLE_TYPE == 1) {
				vehicle_type = "Car";
			}
			else if(changes.VEHICLE_TYPE == 2){
				vehicle_type = "Motorcycle";
			}
			else{
				vehicle_type = "None";
			}
        //   It is for showing the given data with respect their ids
			$('#emp_Id').val(changes.EMPLOYEE_ID);
			$('#employee_id').val(changes.EMPLOYEE_ID);
			$('#employee_name').val(changes.EMPLOYEE_NAME);
			$('#exp_bus_train').val(changes.EXP_BUS_TRAIN);
			$('#EXP_PLANE').val(changes.EXP_PLANE);
			$('#EXP_TAXI_AUTO').val(changes.EXP_TAXI_AUTO);
			$('#EXP_VEH_REPAIR').val(changes.EXP_VEH_REPAIR);
			$('#EXP_PER_KM_RATE').val(changes.EXP_PER_KM_RATE);
			$('#EXP_HOTEL').val(changes.EXP_HOTEL);
			$('#DA_RATES_OUTST').val(changes.DA_RATES_OUTST);
			$('#DA_RATES_LOCAL').val(changes.DA_RATES_LOCAL);
			$('#EXP_MOBILE_INTERNET').val(changes.EXP_MOBILE_INTERNET);
			$('#EXP_STATIONARY').val(changes.EXP_STATIONARY);
			$('#EXP_MISC').val(changes.EXP_MISC);
			$('#EXP_FUE').val(changes.EXP_FUEL);
			$('#Max_Km').val(changes.MAX_ALLOWED_KM);
			$('#vehicle_owner').val(ownership);
			$('#vehicle_type').val(vehicle_type);

			//document.getElementById("mySelect").value = "Level //3";
			//$('#mySelect').val(changes.LEVEL_RANK_ID);
     		 $("#LEVEL_RANK_ID").val(changes.LEVEL_RANK_ID);
			 $("#LEVEL_RANK_ID").select2();
		//$("#LEVEL_RANK_ID").select2().val(changes.LEVEL_RANK_ID).trigger("change");
			$('.changeModal').modal("show");
		  });
</script>
<script>
var changelevel;
// The e is the event object passed to the function in most cases,
// it's checking the keyCode property of the event object that was passed in.
function myFunction(e) {
	//  .e.target is the value property of some object element,
	//  in this case that means the text entered in the search input
changelevel = e.target.value;

       $.ajax({
         url: '/changelevel/' + changelevel,
         type: 'get',
         dataType: 'json',
         success: function(response){

           var len = 0;

           if(response['data'] != null){
              len = response['data'].length;
           }
    //    For len is non zero the i value is increased with the incriment of len
           if(len > 0){
              for(var i=0; i<len; i++){
                 var DA_RATES_LOCAL = response['data'][i].DA_RATES_LOCAL;
				 var DA_RATES_OUTST = response['data'][i].DA_RATES_OUTST;
				 var EXP_PER_KM_RATE = response['data'][i].EXP_PER_KM_RATE;
				 var EXP_BUS_TRAIN = response['data'][i].EXP_BUS_TRAIN;
				 var EXP_PLANE = response['data'][i].EXP_PLANE;
				 var EXP_TAXI_AUTO = response['data'][i].EXP_TAXI_AUTO;
				 var EXP_VEH_REPAIR = response['data'][i].EXP_VEH_REPAIR;
				 var EXP_HOTEL = response['data'][i].EXP_HOTEL;
				 var EXP_STATIONARY = response['data'][i].EXP_STATIONARY;
				 var EXP_MOBILE_INTERNET = response['data'][i].EXP_MOBILE_INTERNET;
				 var EXP_MISC = response['data'][i].EXP_MISC;
				 var EXP_FUEL = response['data'][i].EXP_FUEL;
				 var MAX_ALLOWED_KM = response['data'][i].MAX_ALLOWED_KM;
              }
           }

// Here each() function is used to loop through each element of the target jQuery object
$('.form-group .maxKM').each(function(){
		var inputval = $(this).val();
		inputval = MAX_ALLOWED_KM;
		 $(".form-group .maxKM").val(inputval);
		//alert(inputval);
	});

	$('.form-group .hotel').each(function(){
		var inputval = $(this).val();
		inputval = EXP_HOTEL;
		 $(".form-group .hotel").val(inputval);
		//alert(inputval);
	});

	$('.form-group .taxi').each(function(){
		var inputval = $(this).val();
		inputval = EXP_TAXI_AUTO;
		 $(".form-group .taxi").val(inputval);
	});

	$('.form-group .bus').each(function(){
		var inputval = $(this).val();
		inputval = EXP_BUS_TRAIN;
		 $(".form-group .bus").val(inputval);
	});

	$('.form-group .plane').each(function(){
		var inputval = $(this).val();
		inputval = EXP_PLANE;
		 $(".form-group .plane").val(inputval);
	});

	$('.form-group .per').each(function(){
		var inputval = $(this).val();
		inputval = EXP_PER_KM_RATE;
		 $(".form-group .per").val(inputval);
	});

	$('.form-group .vehicle').each(function(){
		var inputval = $(this).val();
		inputval = EXP_VEH_REPAIR;
		 $(".form-group .vehicle").val(inputval);
	});

	$('.form-group .stat').each(function(){
		var inputval = $(this).val();
		inputval = EXP_STATIONARY;
		 $(".form-group .stat").val(inputval);
	});

	$('.form-group .mobile').each(function(){
		var inputval = $(this).val();
		inputval = EXP_MOBILE_INTERNET;
		 $(".form-group .mobile").val(inputval);
	});

	$('.form-group .misc').each(function(){
		var inputval = $(this).val();
		inputval = EXP_MISC;
		 $(".form-group .misc").val(inputval);
	});

	$('.form-group .local').each(function(){
		var inputval = $(this).val();
		inputval = DA_RATES_LOCAL;
		 $(".form-group .local").val(inputval);
	});

	$('.form-group .out').each(function(){
		var inputval = $(this).val();
		inputval = DA_RATES_OUTST;
		 $(".form-group .out").val(inputval);
	});

	$('.form-group .fuel').each(function(){
		var inputval = $(this).val();
		inputval = EXP_FUEL;
		 $(".form-group .fuel").val(inputval);
	});


         }

       });

}
  </script>
<script>
//  This  is for the update as submit the data to the database in the change_form inside
$('#change_form').on("submit", function(event){
event.preventDefault();
// The variable contain the data given by the user
var changelevel = document.getElementById("emp_Id").value;
var LEVEL_RANK_ID = document.getElementById("LEVEL_RANK_ID").value;
var exp_bus_train = document.getElementById("exp_bus_train").value;
var EXP_PLANE = document.getElementById("EXP_PLANE").value;
var EXP_TAXI_AUTO = document.getElementById("EXP_TAXI_AUTO").value;
var EXP_PER_KM_RATE = document.getElementById("EXP_PER_KM_RATE").value;
var EXP_VEH_REPAIR = document.getElementById("EXP_VEH_REPAIR").value;
var EXP_HOTEL = document.getElementById("EXP_HOTEL").value;
var DA_RATES_OUTST = document.getElementById("DA_RATES_OUTST").value;
var DA_RATES_LOCAL = document.getElementById("DA_RATES_LOCAL").value;
var EXP_MOBILE_INTERNET = document.getElementById("EXP_MOBILE_INTERNET").value;
var EXP_STATIONARY = document.getElementById("EXP_STATIONARY").value;
var EXP_MISC = document.getElementById("EXP_MISC").value;
var EXP_FUEL = document.getElementById("EXP_FUE").value;
var MAX_ALLOWED_KM = document.getElementById("Max_Km").value;

// PUT _method is use for the update the form to the database
$.ajax({
	  type: 'POST',
	  url: '/changelevel/' + changelevel,
	  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  },
	  data:{'_method':'PUT', LEVEL_RANK_ID:LEVEL_RANK_ID, MAX_ALLOWED_KM:MAX_ALLOWED_KM, exp_bus_train:exp_bus_train, EXP_FUEL:EXP_FUEL, EXP_PLANE:EXP_PLANE, EXP_TAXI_AUTO:EXP_TAXI_AUTO, EXP_PER_KM_RATE:EXP_PER_KM_RATE, EXP_VEH_REPAIR:EXP_VEH_REPAIR, EXP_HOTEL:EXP_HOTEL, DA_RATES_OUTST:DA_RATES_OUTST, DA_RATES_LOCAL:DA_RATES_LOCAL, EXP_MOBILE_INTERNET:EXP_MOBILE_INTERNET, EXP_STATIONARY:EXP_STATIONARY, EXP_MISC:EXP_MISC},
	  success:function(data){
              //alert(data.success);

			  toastr.success('Employee Level Expenses Updated Successfully')

			  location.reload();

           }
});


});
  </script>
</body>



</html>
