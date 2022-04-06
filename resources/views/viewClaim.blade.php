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
  #example2 {
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
.table{
 background-color:#ede9f7;
}
a.paginate_button {
    background-color: #e5def7;
}
  </style>
  <style type="text/css" media="print">
  @page {
    size: landscape;
}
</style>
</head>

<body class="hold-transition sidebar-mini accent-teal">
@if(isset(Auth::user()->id))
 <div class="wrapper">

 @php
  $user = Auth::user()->email;
  $username = Auth::user()->name;
  $id = Auth::user()->emp_id;
  @endphp



        <!-- Navigation -->

        <!--<nav class="navbar navbar-static-top" role="navigation">-->

			@include("layouts.header")
			@include("layouts.sidebar")

        <div class="content-wrapper">

        @if ($message = Session::get("success"))
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
<div id="errors"></div>

        <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>My Claims</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard.index')}}">Home</a></li>
              <li class="breadcrumb-item active">My Claims</li>
            </ol>
          </div>
        </div>

      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">


	  <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">

			  <div class="modal fade text-left del_modal">
				 <div class="modal-dialog">
          <div class="modal-content" style="width: 600px; height: 100px;">

                <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Withdraw Claim</h3>
				 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              </div>
			 	<input type="hidden" name="del_id" id="del_Id" class="form-control"  value="">


				 <form class="form-horizontal"  id="del_form" method="post">
				 @method('DELETE')
					@csrf
				  <div class="card-body">

					  Withdraw Claim for <span id="undo_date"></span>
					</div>
					<div class="card-footer">
					<button type="submit" class="btn btn-danger float-right">Delete</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
					</div>
					</form>
					</div>
				</div>
			</div>
		</div>

	<div class="modal fade text-left rejected_modal">
        <div class="modal-dialog">
          <div class="modal-content" style="width: 600px; height: 100px;">
                <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Comments</h3>
				 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              </div>
                <div class="card-body">
				  <input type="text" id="rejected_comments" class="form-control" value="" readonly>
                </div>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

	<div class="modal fade text-left approved_modal">
        <div class="modal-dialog">
          <div class="modal-content" style="width: 600px; height: 100px;">
                <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Comments</h3>
				 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              </div>
                <div class="card-body">
				  <input type="text" id="approved_comments" class="form-control" value="" readonly>
                </div>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>


			 <div class="modal fade text-left claimModal">
        <div class="modal-dialog">
          <div class="modal-content" style="width: 600px; height: 100px;">

                <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Edit Claim</h3>
				 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              </div>

      <form class="form-horizontal" id="claim_form" method="POST">

                <div class="card-body">
				<input type="hidden" name="claim_id" id="claim_Id" class="form-control"  value="">
                 <div class="card card-info">
				 <div class="card-header">
				 <h3 class="card-title">Change Travel Expense</h3>
				 <div class="card-tools">
				 <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Expand">
				 <i class="fas fa-minus"></i>
				 </button>
				 </div>
				 </div>

				 <div class="card-body">

				 <div class="form-group row">
				 <label class="col-sm-4 col-form-label">
				 <i class="fas fa-bus text-maroon"></i> Bus/Train</label>
				 <div class="col-sm-8">
				 <input name="EXP_BUS_TRAIN" id="EXP_BUS_TRAIN" class="form-control" value="">
				 </div>
				 </div>

				 <div class="form-group row">
				 <label  class="col-sm-4 col-form-label">
				 <i class="fas fa-plane text-indigo"></i> Air</label>
				 <div class="col-sm-8">
				 <input name="EXP_PLANE" id="EXP_PLANE" class="form-control" value="">
				 </div>
				 </div>

				 <div class="form-group row">
				 <label  class="col-sm-4 col-form-label">
				 <i class="fas fa-taxi text-success"></i> Taxi/Auto/Rickshaw</label>
				 <div class="col-sm-8">
				 <input name="EXP_TAXI_AUTO" id="EXP_TAXI_AUTO" class="form-control" value="">
				 </div>
				 </div>

				 <div class="form-group row">
				 <label  class="col-sm-4 col-form-label">
				 <i class="fas fa-tools text-lime"></i> Vehicle Repair</label>
				 <div class="col-sm-8">
				 <input name="EXP_VEH_REPAIR" id="EXP_VEH_REPAIR" class="form-control" value="">
				 </div>
				 </div>

				 <div class="form-group row">
				 <label  class="col-sm-4 col-form-label">
				 <i class="fas fa-gas-pump text-pink"></i> Fuel</label>
				 <div class="col-sm-8">
				 <input name="EXP_FUEL" id="EXP_FUEL" class="form-control" value="">
				 </div>
				 </div>
				 </div>
				 </div>

				 <div class="card card-info">
				 <div class="card-header">
				 <h3 class="card-title">Change Other Expense</h3>
				 <div class="card-tools">
				 <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Expand">
				 <i class="fas fa-minus"></i>
				 </button>
				 </div>
				 </div>

				 <div class="card-body">

				 <div class="form-group row">
				 <label  class="col-sm-4 col-form-label">
				 <i class="fas fa-hotel text-purple"></i> Hotel</label>
				 <div class="col-sm-8">
				 <input name="EXP_HOTEL" id="EXP_HOTEL" class="form-control" value="">
				 </div>
				 </div>

				 <div class="form-group row">
				 <label  class="col-sm-4 col-form-label">
				 <i class="fas fa-map-marker-alt text-fuchsia"></i> DA Local</label>
				 <div class="col-sm-8">
				 <input name="DA_RATES_LOCAL" id="DA_RATES_LOCAL" class="form-control" value="">
				 </div>
				 </div>

				 <div class="form-group row">
				 <label  class="col-sm-4 col-form-label">
				 <i class="fas fa-route text-primary"></i> DA Outsation</label>
				 <div class="col-sm-8">
				 <input name="DA_RATES_OUTST" id="DA_RATES_OUTST" class="form-control" value="">
				 </div>
				 </div>

				 <div class="form-group row">
				 <label  class="col-sm-4 col-form-label">
				 <i class="fas fa-wifi text-orange"></i> Internet\Phone</label>
				 <div class="col-sm-8">
				 <input name="EXP_MOBILE_INTERNET" id="EXP_MOBILE_INTERNET" class="form-control" value="">
				 </div>
				 </div>

				 <div class="form-group row">
				 <label  class="col-sm-4 col-form-label">
				 <i class="fas fa-mobile-alt text-info"></i> Stationary</label>
				 <div class="col-sm-8">
				 <input name="EXP_STATIONARY" id="EXP_STATIONARY" class="form-control" value="">
				 </div>
				 </div>

				 <div class="form-group row">
				 <label  class="col-sm-4 col-form-label">
				 <i class="fab fa-medium-m text-secondary"></i> Misc</label>
				 <div class="col-sm-8">
				 <input name="EXP_MISC" id="EXP_MISC" class="form-control" value="">
				 </div>
				 </div>



				 </div>
				 </div>


				  <div class="card card-info">
				 <div class="card-header">
				 <h3 class="card-title">Comments</h3>
				 <div class="card-tools">
				 <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Expand">
				 <i class="fas fa-minus"></i>
				 </button>
				 </div>
				 </div>

				 <div class="card-body">
				 <input type="text" id="MISC_COMMENTS" name="MISC_COMMENTS" class="form-control" value="">

				  </p>

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

			  <div class="card-body">


		 <form action="{{route("viewclaim.store")}}" method="POST">
		 <div class="row">&nbsp;&nbsp;
			 {{ csrf_field() }}
			 <div class="col">
		<div class="form-group">

                  <select class="form-control select2" name="cycle" data-dropdown-css-class="select2-teal" style="width: 100%;">
                    <option selected="selected" value="null">Submission Cycle</option>
                    <option value="h1">H1 (1st - 15th day)</option>
                    <option value="h2">H2 (16th - 31st day)</option>
                  </select>
                </div>
				</div>

		<div class="col">
		<div class="form-group">

                  <select class="form-control select2" name="month" data-dropdown-css-class="select2-teal" style="width: 100%;">
                    <option selected="selected" value="null">Month</option>
                    <option value="01">January</option>
                    <option value="02">February</option>
                    <option value="03">March</option>
                    <option value="04">April</option>
                    <option value="05">May</option>
                    <option value="06">June</option>
					<option value="07">July</option>
					<option value="08">August</option>
					<option value="09">September</option>
					<option value="10">October</option>
					<option value="11">November</option>
					<option value="12">December</option>
                  </select>
                </div>
				</div>
				<div class="col">
		<div class="form-group">

                  <select class="form-control select2" name="year" id='date-dropdown' data-dropdown-css-class="select2-teal" style="width: 100%;">
                    <option selected="selected" value="null">Year</option>

                  </select>
                </div>
				</div>
				<div class="col">

		<div class="form-group">

                 <button type="submit" id="claimed" class="btn btn-success">Submit</button>

                </div>
				</div>
				</form>


		<div class="col">
				<div class="form-group">

		</div>
		</div>

		<div class="col">
				<div class="form-group">

      <img src="{{ URL::asset("storage/capture.png/") }}"
           alt="AdminLTE Logo"

           style="opacity: .8; width:150px; height:40px; position: absolute; top: 0px; right: 0px;">


		</div>
		</div>

		</div>

		<div class="row">
		<div class="col">
				<div class="form-group">
			<b>For</b>: {{$username}} ({{$id}})
		</div>
		</div>

		<div class="col">
				<div class="form-group">
				@isset($level)
			  @foreach($level as $val)
			<b>Level</b>: {{$val["LEVEL_NAME"]}}
				@endforeach
			@endisset
		</div>
		</div>

		<div class="col">
				<div class="form-group">

			<b>Date From</b>: @isset($claim) {{$start_date}} @endisset
		</div>
		</div>
		<div class="col">
				<div class="form-group">
			<b>To</b>: @isset($claim) {{$end_date}}	@endisset
		</div>
		</div>
		<div class="col">
				<div class="form-group">
				@isset($region)
				@foreach($region as $val)
			<b>State</b>: @foreach($val['REGION'] as $valu)
			       {{ $loop->first ? '' : ', ' }}
					{{ $valu['REGION_NAME'] }}
				 @endforeach
				@endforeach
				@endisset
		</div>
		</div>
		</div>

	 <div class="row"><small><i class="fas fa-bus text-maroon"></i>&nbsp;Bus/Train &nbsp;&nbsp;&nbsp;<i class="fas fa-plane text-indigo"></i>&nbsp;Air &nbsp;&nbsp;&nbsp;<i class="fas fa-taxi text-success"></i>&nbsp;Taxi/Auto/Rickshaw &nbsp;&nbsp;&nbsp;<i class="fas fa-hotel text-purple"></i>&nbsp;<b>(H)</b>&nbsp;Hotel &nbsp;&nbsp;&nbsp;<i class="fas fa-gas-pump text-pink"></i>&nbsp;Fuel &nbsp;&nbsp;&nbsp;<i class="fas fa-tools text-lime"></i>&nbsp;Vehicle Repair &nbsp;&nbsp;&nbsp;<i class="fas fa-route text-primary"></i>&nbsp;DA Outstation &nbsp;&nbsp;&nbsp;<i class="fas fa-map-marker-alt text-fuchsia"></i>&nbsp;DA Local &nbsp;&nbsp;&nbsp;<i class="fas fa-wifi text-orange"></i>&nbsp;<b>(I)</b>&nbsp;Internet/Phone &nbsp;&nbsp;&nbsp;<i class="fas fa-mobile-alt text-info"></i>&nbsp;<b>(S)</b>&nbsp;Stationary&nbsp;&nbsp;&nbsp;<i class="fab fa-medium-m text-secondary"></i>&nbsp;Miscellaneous</small></div>

			<br>
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
			  <table id="example2" class="table table-bordered table-hover" >

			  <thead>

                  <tr>

				  <th>Status</th>
                    <th>Travel</th>
					<th>DA L</th>
					<th>DA O</th>
					<th>I</th>
					<th>H</th>
					<th>S</th>
					<th>M</th>
					<th>Date</th>
					<th class="text-center">
                          
                      </th>
					  <th></th>
					  <th></th>
					  <th></th>
					  <th></th>
                  </tr>
                  </thead>
                  <tbody>

					  @isset($claim)
				 @foreach ($claim as $value)

           <tr>
                  <td class="text-center">

				  @if ($value["APPROVAL_STATUS"] == "0")
				  <span class="badge badge-info">Pending</span>
			      @elseif ($value["APPROVAL_STATUS"] == "1")
				  <span class="badge badge-success">Approved</span>
			   @elseif ($value["APPROVAL_STATUS"] == "2")
				  <span class="badge badge-danger">Rejected</span>
				   @elseif ($value["APPROVAL_STATUS"] == "3")
				  <span class="badge badge-secondary">Zero Claim</span>
				 @endif

				  </td>
                 <td class="text-center">
				  <div class="row">



					<a class="d-flex flex-column">
					<span class='badge badge-light'>{{ $value['EXP_TAXI_AUTO'] }}</span>
					<i class="fas fa-taxi text-success" title="Taxi/Auto/Rickshaw"></i>
					 </a> &nbsp;&nbsp;&nbsp;
					<a class="d-flex flex-column">
					<span class='badge badge-light'>{{ $value['EXP_BUS_TRAIN'] }}</span>
					<i class="fas fa-bus text-maroon" title="Bus/Train"></i>
					 </a> &nbsp;&nbsp;&nbsp;
					 <a class="d-flex flex-column">
					 <span class='badge badge-light'>{{ $value['EXP_PLANE'] }}</span>
					<i class="fas fa-plane text-indigo" title="Air"></i>
					 </a> &nbsp;&nbsp;&nbsp;
					  <a class="d-flex flex-column">
					<span class='badge badge-light'>{{ $value['EXP_VEH_REPAIR'] }}</span>
					<i class="fas fa-tools text-lime" title="Vehicle Repair"></i>
					 </a> &nbsp;&nbsp;&nbsp;
					  <a class="d-flex flex-column">
					<span class='badge badge-light'>{{ $value['EXP_FUEL'] }}</span>
					<i class="fas fa-gas-pump text-pink" title="Max Allowed Fuel"></i>
					 </a>



					</div>


				  </td>

				  <td class="text-center">

					<a class="d-flex flex-column">
					<span class='badge badge-light'>{{ $value['DA_RATES_LOCAL'] }}</span>
					 <i class="fas fa-map-marker-alt text-fuchsia" title="Daily Allowance Local"></i>
					 </a>
					   </td>

				  <td class="text-center">

					<a class="d-flex flex-column">
					<span class='badge badge-light'>{{ $value['DA_RATES_OUTST'] }}</span>
					<i class="fas fa-route text-primary" title="Daily Allowance Outstation"></i>
					 </a>

				  </td>

				  <td class="text-center">

					<a class="d-flex flex-column">
					<span class='badge badge-light'>{{ $value['EXP_MOBILE_INTERNET'] }}</span>
					<i class="fas fa-wifi text-orange" title="Internet/Phone"></i>
					 </a>

				  </td>

				  <td class="text-center">

					<a class="d-flex flex-column">
					<span class='badge badge-light'>{{ $value['EXP_HOTEL'] }}</span>
					<i class="fas fa-hotel text-purple" title="Hotel"></i>
					 </a>


				  </td>

				  <td class="text-center">

					<a class="d-flex flex-column">
					 <span class='badge badge-light'>{{ $value['EXP_STATIONARY'] }}</span>
					<i class="fas fa-mobile-alt text-info" title="Stationary"></i>
					 </a>

				  </td>

				  <td class="text-center">

					<a class="d-flex flex-column">
					<span class='badge badge-light'>{{ $value['EXP_MISC'] }}</span>
					<i class="fab fa-medium-m text-secondary" title="Miscellaneous"></i>
					 </a>


				  </td>

				 <td>{{\Carbon\Carbon::parse($value['CLAIM_DATE'])->format('d/m/Y')}}</td>

				 <td class="text-center">

				 <div class="btn-group btn-group-sm">
				@if ($value["APPROVAL_STATUS"] == "1")
				@php
				$approved_claim = json_encode($value);
				@endphp
				 <a class='btn btn-primary btn-sm approved_claim' href='#' value="{{$approved_claim}}" id="{{$value['CLAIM_ID']}}" title="View Comments">
                             <i class='fas fa-eye'></i>
                          </a>
						   <a class='btn btn-warning btn-sm disabled' href='#' title="Edit">
                             <i class='fas fa-edit'></i>
                          </a>
				 @elseif ($value["APPROVAL_STATUS"] == "2")
				  @php
				$rejected_claim = json_encode($value);
				@endphp
				 <a class='btn btn-primary btn-sm rejected_claim' href='#' value="{{$rejected_claim}}" id="{{$value['CLAIM_ID']}}" title="View Comments">
                             <i class='fas fa-eye'></i>
                          </a>
						   <a class='btn btn-warning btn-sm disabled' href='#' title="Edit">
                             <i class='fas fa-edit'></i>
                          </a>
				  @elseif ($value["APPROVAL_STATUS"] == "3")
				   @php
				$zero_claim_comment = json_encode($value);
				@endphp

				 <a class='btn btn-danger btn-sm zero_claim' href='#' id="{{$value['CLAIM_ID']}}_{{\Carbon\Carbon::parse($value['CLAIM_DATE'])->format('d/m/Y')}}" title="Withdraw Claim">
                             <i class='fas fa-trash'></i>
                          </a>
						 <a class='btn btn-primary btn-sm zero_claim_comment' href='#' value="{{$zero_claim_comment}}" id="{{$value['CLAIM_ID']}}" title="View Comments">
                             <i class='fas fa-eye'></i>
                          </a>



				 @elseif ($value["APPROVAL_STATUS"] == "0")
				  @php
				$claim = json_encode($value);
				@endphp
				 <a class='btn btn-danger btn-sm zero_claim' href='#'  id="{{$value['CLAIM_ID']}}_{{\Carbon\Carbon::parse($value['CLAIM_DATE'])->format('d/m/Y')}}" title="Withdraw Claim">
                             <i class='fas fa-trash'></i>
                          </a>

					   <a class='btn btn-warning btn-sm claim' href='#' value="{{$claim}}" id="{{$value['CLAIM_ID']}}" title="Edit">
                             <i class='fas fa-edit'></i>
                          </a>


				 @endif

				</div>

				 </td>
				 <td>{{$value['TOTAL_CLAIMED_AMOUNT']}}</td>
				 <td>
				 @if($value["APPROVAL_STATUS"] == "1")
				 {{$value['TOTAL_CLAIMED_AMOUNT']}}

			 @endif
				 </td>
				 @php
				 $km = abs($value['END_KM'] - $value['START_KM']);
				 @endphp
				 <td>
				 {{$km}}
				 </td>

				  <td>
				 {{$value['EXP_FUEL']}}
				 </td>
				 </tr>

			@endforeach
			 @endisset
			@empty($claim)
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

        </div>

        <!-- /#page-wrapper -->
        <footer class="main-footer bg-light">

<div class="row">
		<div class="col-md-4">
                    <label>Claimed Amount</label>
                    <div class="form-group">
                     <output id="result" class="form-control"  value="" readonly></output>
                    </div>
                  </div>

				  <div class="col-md-4">
                    <label>Kms Done</label>
                    <div class="form-group">
                     <output id="kms" class="form-control"  value="" readonly></output>
                    </div>
                  </div>

				  <div class="col-md-4">
                    <label>Approved Amount</label>
                    <div class="form-group">
                     <output id="approved" class="form-control"  value="" readonly></output>
                    </div>
                  </div>

				  </div>

				  <div class="row">
				  <div class="col-md-4">
                    <label>Fuel Used</label>
                    <div class="form-group">
                     <output id="fuel" class="form-control"  value="" readonly></output>
                    </div>
                  </div>
		<div class="col-md-4">
                    <label>Employee's Signature</label>
                    <div class="form-group">
					<br>
                    ......................................................
                    </div>
                  </div>




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
<!-- jQuery -->
	<!-- jQuery 2.1.3 -->

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
	<script src="{!! asset('suprsales_resource/plugins/datatables/sum().js') !!}" type="text/javascript"></script>


<script>
$(document).ready(function(){

$(".nav-link").on("click", function(){

$(".nav-link").removeClass("active");

$(this).addClass("active");
$(this).siblings().removeClass("active");
});
});
</script>



<script>
  $(function () {
    //Initialize Select2 Elements
    $(".select2").select2()


    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch("state", $(this).prop("checked"));
    });

  })
</script>


<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });




	var table;

   table =  $("#example2").DataTable({
      "paging": true,
	  "pageLength": -1,
	  "lengthMenu": [[-1, 5, 10, 20], ["All", 5, 10, 20]],
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,



      "columnDefs": [
         {
            "targets": 0,
			 className: "dt-center"
         },
         {
          targets: 1,
		  "width":"200%"
         },
		 {
          targets: 2
         },
		 {
          targets: 3,
		  className: "dt-center"
         },
		 {
          targets: 4,
		   className: "dt-center"
         },
		 {
          targets: 5,
		   className: "dt-center"
         },
		 {
          targets: 6,
		   className: "dt-center"
         },
		 {
          targets: 7,
		   className: "dt-center"
         },
		 {
          targets: 8,
		  className: "dt-center"
         },
		 {
        targets: 9,
		className: "dt-center"
    },
	 {
          targets: 10,
		   "visible": false,
      "searchable": false

         },
		{
          targets: 11,
		   "visible": false,
      "searchable": false
         },
		{
          targets: 12,
		"visible": false,
      "searchable": false
         },
		 	{
          targets: 13,
		"visible": false,
      "searchable": false
         }
      ],



		dom: "l<'toolbar'>Bfrtip",

        buttons: [
			{
                text:      "<a  class='printPage' href='#'><i class='fas fa-print text-white' style='float:right;'></i></a>",

            },


        ],

		initComplete: function () {

            var btns = $(".dt-button");
            btns.addClass("btn btn-info");
            btns.removeClass("dt-button");
			$("a.printPage").click(function(){
           window.print();
           return false;
});
			$("div.toolbar")
         .html("");

$("#btnSelectedRows").on("click", function() {

var emp = table.rows( { selected: true } ).data().pluck(7).toArray();
var flag = table.row( { selected: true } ).data()[8];
var flags = table.rows( { selected: true } ).data().pluck(8).toArray();
const Toast = Swal.mixin({
      toast: true,
      position: "top-end",
      showConfirmButton: false,
      timer: 3000
    });

//const allEqual = arr => arr.every(val => val === arr[0]);
function checkFlag(valueFlag) {
  return valueFlag == 0;
}








});

$("#btnSelectedRow").on("click", function() {

var emp = table.rows( { selected: true } ).data().pluck(7).toArray();
var flag = table.row( { selected: true } ).data()[8];
var flags = table.rows( { selected: true } ).data().pluck(8).toArray();
const Toast = Swal.mixin({ toast: true, position: "top-end", showConfirmButton: false, timer: 3000 });

function checkFlag(valueFlag) {
  return valueFlag == 1;
}




});

$("#example2").show();
        },

		"select": {
         "style": "multi",
		  info: false
      },
      "order": [[1, "asc"]]




    });


var total = table.column( 10 ).data().sum();
var approve = table.column( 11 ).data().sum();
var km = table.column( 12 ).data().sum();
var fuels = table.column( 13 ).data().sum();
$('#result').text(total);
$('#approved').text(approve);
$('#kms').text(km);
$('#fuel').text(fuels);




    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch("state", $(this).prop("checked"));
    });

  });

</script>

<script type="text/javascript">
$(document).ready(function () {
  bsCustomFileInput.init();
  $("[data-card-widget='collapse']").click()
});
</script>

<script>
 $("body").on("click", ".claim", function(event){
           var claim = $(this).attr("id");

			var values = document.getElementById(claim).getAttribute("value");
			var claims = JSON.parse(values);


			$('#claim_Id').val(claims.CLAIM_ID);
			$('#EXP_BUS_TRAIN').val(claims.EXP_BUS_TRAIN);
			$('#EXP_PLANE').val(claims.EXP_PLANE);
			$('#EXP_TAXI_AUTO').val(claims.EXP_TAXI_AUTO);
			$('#EXP_VEH_REPAIR').val(claims.EXP_VEH_REPAIR);
			$('#EXP_PER_KM_RATE').val(claims.EXP_PER_KM_RATE);
			$('#EXP_HOTEL').val(claims.EXP_HOTEL);
			$('#DA_RATES_OUTST').val(claims.DA_RATES_OUTST);
			$('#DA_RATES_LOCAL').val(claims.DA_RATES_LOCAL);
			$('#EXP_MOBILE_INTERNET').val(claims.EXP_MOBILE_INTERNET);
			$('#EXP_STATIONARY').val(claims.EXP_STATIONARY);
			$('#EXP_MISC').val(claims.EXP_MISC);
			$('#EXP_FUEL').val(claims.EXP_FUEL);
			$('#MISC_COMMENTS').val(claims.MISC_COMMENTS);


			$('.claimModal').modal("show");
		  });

$("body").on("click", ".rejected_claim", function(event){
           var rejected_claim = $(this).attr("id");

			var values = document.getElementById(rejected_claim).getAttribute("value");
			var claims = JSON.parse(values);

			$('#rejected_comments').val(claims.MISC_COMMENTS);


			$('.rejected_modal').modal("show");
		  });


  $("body").on("click", ".zero_claim_comment", function(event){
   var rejected_claim = $(this).attr("id");

	var values = document.getElementById(rejected_claim).getAttribute("value");
	var claims = JSON.parse(values);

	$('#rejected_comments').val(claims.MISC_COMMENTS);


	$('.rejected_modal').modal("show");
  });

$("body").on("click", ".approved_claim", function(event){
           var approved_claim = $(this).attr("id");

			var values = document.getElementById(approved_claim).getAttribute("value");
			var claims = JSON.parse(values);

			$('#approved_comments').val(claims.MISC_COMMENTS);


			$('.approved_modal').modal("show");
		  });

  $("body").on("click", ".zero_claim", function(event){
  var zeros_claim = $(this).attr("id");
   var res = zeros_claim.split("_");
	var claim_id = res[0];
	var claim_date = res[1];

  $('#del_Id').val(claim_id);

  document.getElementById("undo_date").innerHTML = claim_date;
	$('.del_modal').modal("show");
  });

$('#del_form').on("submit", function(event){
event.preventDefault();
var viewclaim = document.getElementById("del_Id").value;
let formData = new FormData(this);

$.ajax({
	  type: 'POST',
	  url: 'viewclaim/' + viewclaim,
	  data:formData,
	  cache:false,
        contentType: false,
        processData: false,
        success: (data) => {
           toastr.success('Claim Deleted Successfully')

			  location.reload();
        },
        error: function(data){
           console.log(data);
         }
       });


});
</script>

<script>
$('#claim_form').on("submit", function(event){
event.preventDefault();

var viewclaim = document.getElementById("claim_Id").value;
//alert(viewclaim);

var EXP_BUS_TRAIN = document.getElementById("EXP_BUS_TRAIN").value;
var EXP_PLANE = document.getElementById("EXP_PLANE").value;
var EXP_TAXI_AUTO = document.getElementById("EXP_TAXI_AUTO").value;
var EXP_VEH_REPAIR = document.getElementById("EXP_VEH_REPAIR").value;
var EXP_HOTEL = document.getElementById("EXP_HOTEL").value;
var DA_RATES_OUTST = document.getElementById("DA_RATES_OUTST").value;
var DA_RATES_LOCAL = document.getElementById("DA_RATES_LOCAL").value;
var EXP_MOBILE_INTERNET = document.getElementById("EXP_MOBILE_INTERNET").value;
var EXP_STATIONARY = document.getElementById("EXP_STATIONARY").value;
var EXP_MISC = document.getElementById("EXP_MISC").value;
var EXP_FUEL = document.getElementById("EXP_FUEL").value;
var MISC_COMMENTS = document.getElementById("MISC_COMMENTS").value;

$.ajax({
	  type: 'POST',
	  url: '/viewclaim/' + viewclaim,
	  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  },
	  data:{'_method':'PUT', EXP_BUS_TRAIN:EXP_BUS_TRAIN, MISC_COMMENTS:MISC_COMMENTS, EXP_PLANE:EXP_PLANE, EXP_TAXI_AUTO:EXP_TAXI_AUTO, EXP_VEH_REPAIR:EXP_VEH_REPAIR, EXP_HOTEL:EXP_HOTEL, DA_RATES_OUTST:DA_RATES_OUTST, DA_RATES_LOCAL:DA_RATES_LOCAL, EXP_MOBILE_INTERNET:EXP_MOBILE_INTERNET, EXP_STATIONARY:EXP_STATIONARY, EXP_MISC:EXP_MISC, EXP_FUEL:EXP_FUEL},
	  success:function(data){
              //alert(data.success);

			  toastr.success('Claim Updated Successfully')

			  location.reload();

           },
		      error: function(xhr, status, error)
        {

 var err = "";
          $.each(xhr.responseJSON.errors, function (key, item)
          {

			  err = err.concat(item+"<br>");

          });
		  if(err !== '' && err !== null && err !== undefined){
			  $("#errors").html("<ul class='alert alert-danger'>"+err+"</ul>");
		  }


		toastr.error('Claim Not Updated. Please check permissible values')
        }
});


});
  </script>


  <script>
    let dateDropdown = document.getElementById('date-dropdown');

    let currentYear = new Date().getFullYear();
    let earliestYear = 2000;

    while (currentYear >= earliestYear) {
      let dateOption = document.createElement('option');
      dateOption.text = currentYear;
      dateOption.value = currentYear;
      dateDropdown.add(dateOption);
      currentYear -= 1;
    }
  </script>
</body>



</html>

