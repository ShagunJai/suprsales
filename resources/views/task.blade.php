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
.table{
 background-color:#ede9f7;
}
a.paginate_button {
    background-color: #e5def7;
}
#task {
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
.badge-orange {
	background-color: #ff851b;
}
.select2-selection__rendered[title="Red"] {
  color: #dc3545 !important;
}

.select2-results__option[id="01"] {
  color: #dc3545;
}
.select2-selection__rendered[title="Green"] {
  color: #28a745 !important;
}


.select2-selection__rendered[title="Blue"] {
  color: #007bff !important;
}


.select2-selection__rendered[title="Yellow"] {
  color: #ffc107 !important;
}


.select2-selection__rendered[title="Light Blue"] {
  color: #17a2b8 !important;
}


.select2-selection__rendered[title="Grey"] {
  color: #6c757d !important;
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
            <h1>Create Task</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard.index')}}">Home</a></li>
              <li class="breadcrumb-item active">Create Tasks</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
@php
  $image = Auth::user()->image;
  @endphp
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

	    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content" style="width: 600px; height: 100px;">

                <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Create Task</h3>
				 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
      <form role="form-horizontal" action="{{route('task.store')}}" method="POST">
                {{ csrf_field() }}
                <div class="card-body">

				<div class="form-group row">
                    <label  class="col-sm-4 col-form-label">Name</label>
                    <div class="col-sm-8">
                      <input  name="TASK_NAME" class="form-control"  placeholder="Name" required>
                    </div>
                  </div>


				  <div class="form-group row select2-teal">
                                  <label class="col-sm-4 col-form-label">Priority</label>
                                  <div class="col-md-8">

                                    <select class="form-control select2" name="PRIORITY" style="width: 100%;" data-dropdown-css-class="select2-teal" required>
                                         <option value="" selected>Select Priority</option>
										<option value="0">High</option>
										<option value="1">Medium</option>
										<option value="2">Low</option>
                                      </select>

                                  </div>

                                </div>

							 <div class="form-group row select2-teal">
                                  <label class="col-sm-4 col-form-label">Color</label>
                                  <div class="col-md-8">

                                   <select class="select2" name="COLOR" style="width: 100%;" data-dropdown-css-class="select2-teal" required>
									  <option value="" selected>Select Color</option>
									  <option value="11" class="red-option">Red</option>
									  <option value="12" class="green-option">Green</option>
									  <option value="13" class="blue-option">Blue</option>
									  <option value="14" class="yellow-option">Yellow</option>
									  <option value="15" class="lightblue-option">Aqua</option>
									  <option value="16" class="grey-option">Grey</option>
									</select>

                                  </div>

                                  </div>

                                <div class="form-group row select2-teal">
          <label class="col-sm-4 col-form-label">Assign</label>
          <div class="col-sm-8">
            <select class="select2" multiple="multiple" name="ASSIGNED_TO[]" style="width: 100%;" data-placeholder="Select Employees" data-dropdown-css-class="select2-teal">
                 @isset($emp)
				@foreach ($emp as $values)
				<option value="{{ $values['EMP_ID'] }}">{{ $values['EMP_NAME'] }}</option>
				@endforeach
				@endisset
              </select>

          </div>
            </div>

								<div class="form-group row">
                                    <label  class="col-sm-4 col-form-label">Start Date</label>
                                    <div class="col-sm-8">
                                       <div class="input-group date" id="reservationdate" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" name="START_DATE" data-target="#reservationdate" placeholder="Start Date" required />
                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                                    </div>
                                  </div>

                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Due Date</label>
                                        <div class="col-sm-8">
                                              <div class="input-group date" id="anndate" data-target-input="nearest">
                        <input type="text" name="DUE_DATE" class="form-control datetimepicker-input" data-target="#anndate" placeholder="End Date" required />
                        <div class="input-group-append" data-target="#anndate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>


                                        </div>
                                    </div>



									<div class="form-group row">
                                      <label class="col-sm-4 col-form-label">Notes</label>
                                      <div class="col-sm-8">

                                          <textarea placeholder="Enter Notes" name="NOTES"
                          style="width: 100%; height: 150px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>

									</div>
									</div>


                <!-- /.card-body -->
              </div>
                <!-- /.card-footer -->
				<div class="card-footer">
                  <button type="submit" class="btn btn-info float-right">Create</button>
                  <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
                </div>
              </form>
            </div>




          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>


            <div class="card">
              <div class="card-header p-2 bg-light">
                <ul class="nav nav-pills red">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Lists</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Charts</a></li>
				</ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <!-- Post -->
					<table id="task" class="table table-bordered table-hover projects" >
			  <thead>
        <tr>
		 <th class="text-center">Color</th>

                        <th class="text-center">Description</th>
                        <th>Completion</th>
                       <th>
                          Team Members
                      </th>
					  <th>Due Date</th>
					  <th>View</th>
                        <th>Status</th>


                    </tr>
                  </thead>


					 <tbody>
				  @isset($task)
			   @foreach ($task as $value)
            <tr>
            <td class="text-center">
			@if($value['COLOR'] == '11')
				 <span class='badge badge-danger'>Red</span>
			@elseif($value['COLOR'] == '12')
			 <span class='badge badge-success'>Green</span>
			 @elseif($value['COLOR'] == '13')
			 <span class='badge badge-primary'>Blue</span>
			 @elseif($value['COLOR'] == '14')
			 <span class='badge badge-warning'>Yellow</span>
			 @elseif($value['COLOR'] == '15')
			 <span class='badge badge-info'>Aqua</span>
			 @elseif($value['COLOR'] == '16')
			 <span class='badge badge-secondary'>Grey</span>
			 @else
			 <span class='badge badge-light'>No Color</span>
		 @endif
			   </td>
			 <td class="text-center">
				   <div class="row">
				   <div class="col">
				  @if($value['PRIORITY'] == '0')
				 <span class='badge badge-danger'>High</span>
			@elseif($value['PRIORITY'] == '1')
			 <span class='badge badge-success'>Medium</span>
			 @elseif($value['PRIORITY'] == '2')
			 <span class='badge badge-warning'>Low</span>
			 @else
				  <span class='badge badge-light'>No Priority</span>
			  @endif
				   <br>
				   {{$value['TASK_NAME']}}

				  </div>
				  </div>
					</td>
					 <td class="project_progress">
                          <div class="progress progress-sm">
                              <div class="progress-bar bg-green" role="progressbar" aria-valuenow="{{$value['COMPLETION_STATUS']}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$value['COMPLETION_STATUS']}}%">
                              </div>
                          </div>
                          <small>
                              {{$value['COMPLETION_STATUS']}}% Completed
                          </small>
						  <br>
						  @php
						  $due_date = $value['DUE_DATE'];
						  $today = \Carbon\Carbon::now();
						 $dif = \Carbon\Carbon::parse($due_date)->diffInDays($today);
						 $dif = $dif + 1;
						 $range = (int)abs($dif/3);
						 $range1 = $dif - $range;
						 $range2 = $dif - ($range * 2);
						  $completion_status = $value['COMPLETION_STATUS'];

						  @endphp

						  @if($completion_status == "100")
							  <span class='badge badge-success'>Completed &nbsp;<i class="fas fa-thumbs-up"></i></span>
						  @else
							  @if($today > $due_date)

							<span class='badge badge-danger'>Late By &nbsp;<i class="far fa-clock"></i>&nbsp;{{$dif}}&nbsp;Days</span>
								@else
								@if($range > 0)
								<?php
								if($dif >= $range1) {
									echo "<span class='badge badge-success'>Due in &nbsp;<i class='far fa-clock'></i>&nbsp;".$dif."&nbsp;Days</span>";

									}
								elseif($dif <= $range1 && $dif >= $range2) {
									echo "<span class='badge badge-info'>Due in &nbsp;<i class='far fa-clock'></i>&nbsp;".$dif."&nbsp;Days</span>";

								}
								elseif($dif <= $range2 && $dif >= 0) {
									echo "<span class='badge badge-orange'>Due in &nbsp;<i class='far fa-clock'></i>&nbsp;".$dif."&nbsp;Days</span>";

								}
							?>
							@else
							<span class='badge badge-orange'>Due in &nbsp;<i class='far fa-clock'></i>&nbsp;{{$dif}}&nbsp;Days</span>
							@endif

							  @endif

					  @endif
                      </td>
					<td>
					 <ul class="list-inline">
					<table class="table table-borderless">
					<tr>

					@php
				  $image = Auth::user()->image;
				  @endphp

					<td style="width:10%">
					  <li class="list-inline-item">
					    @php
				  $activity = Auth::user()->emp_id;
				  @endphp
					  @if(filled($image))

			<a href="{{route('activity.show', $activity)}}"><img alt="Lead" class="table-avatar" title="{{$value['CREATED_BY_NAME']}}"  src="{{ URL::asset('storage/'.$image) }}"></a>
		@else
		 <a href="{{route('activity.show', $activity)}}"><img alt="Lead" class="table-avatar" title="{{$value['CREATED_BY_NAME']}}" src="/suprsales_resource/dist/img/usericon.png"></a>
        @endif
                                </li>
								</td>
								<td style="width:10%">
							   <li class="list-inline-item">
                                 <i class="fas fa-long-arrow-alt-right"></i>
								 </li>
								</td>
								<td style="width:100%">
								 @foreach ($value['ASSIGNED_TO'] as $assigned)
								 @php
								 $img = $assigned['EMP_IMAGE'];
								 $activity = $assigned['EMP_ID'];
								 @endphp
								 @if(filled($img))
									 <li class="list-inline-item">
                                 <a href="{{route('activity.show', $activity)}}"> <img alt="Member" class="table-avatar" title="{{$assigned['EMP_NAME']}}" src="{{ URL::asset('storage/'.$img) }}"></a>
                              </li>

								@else
									 <li class="list-inline-item">
                                 <a href="{{route('activity.show', $activity)}}"> <img alt="Member" class="table-avatar" title="{{$assigned['EMP_NAME']}}" src="/suprsales_resource/dist/img/usericon.png"></a>
                              </li>

								@endif

						  @endforeach
						  </td>

					 </tr>
					 </table>
					 </ul>
					</td>
						<td>
						{{ \Carbon\Carbon::parse($value['DUE_DATE'])->format('d/m/Y')}}
                      </td>
					  <td>
				@php
				$task  = $value['TASK_ID'];
				@endphp
                       <a class='btn btn-warning btn-app btn-xs' href="{{route('task.show',$task)}}"  style="padding-top:18px;"  title="View activities">
                  <span class='badge bg-teal'>{{$value['NO_OF_ACTIVITIES']}} Activities</span>
                  <i class="fas fa-user-clock"></i>Task Details
                </a>


                     </td>

			    <td>

				 @if($value['FLAG'] == '1')
			 <span class='badge badge-success'>Activated</span>
			 @else
				  <span class='badge badge-danger'>Deactivated</span>
			  @endif
					</td>


				</tr>
	 @endforeach
           @endisset
			@empty($task)
			<script>toastr.warning("No records found.");</script>
			@endempty
				</tbody>


</table>

                  </div>
                  <!-- /.tab-pane -->

                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="settings">
				   <div class="row">
				   <div class="col-md-6">
				  <div class="card card-success">
				   @php
			  $stats = json_encode($task_status);
			  @endphp
                     <canvas id="pie" value="{{$stats}}"></canvas>

					</div>
					</div>
					<div class="col-md-6">
				  <div class="card card-success">
				   @php
			  $prior = json_encode($priority);
			  @endphp
                     <canvas id="bar" value="{{$prior}}"></canvas>

					</div>
					</div>
					</div>

					<div class="row">
				   <div class="col-md-12">
				  <div class="card card-success">
				   @php
			  $teams = json_encode($team_status);
			  @endphp
                     <canvas id="ticket" value="{{$teams}}"></canvas>

					</div>
					</div>

					</div>
                  </div>


                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->


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


<script type="text/javascript">
$(function () {
//var start = document.getElementById('#reservationdate').val();

	$('#reservationdate').datetimepicker({
        format: 'L'
    });

	$('#anndate').datetimepicker({
        format: 'L'
    });

	$('#annsdate').datetimepicker({
        format: 'L'
    });




		  $("body").on("click", ".img", function(event){
           var images = $(this).attr("id");

			var values = document.getElementById(images).getAttribute("value");



			$('.imgModal').modal("show");
		  });

$('#auth_form').on("submit", function(event){
event.preventDefault();
var auth = document.getElementById("auth_Id").value;
var auth_name = document.getElementById("auth_name").value;
var description = document.getElementById("description").value;
var flag = document.getElementById("flag").value;

$.ajax({
	  type: 'POST',
	  url: '/auths/' + auth,
	  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  },
	  data:{'_method':'PUT', auth_name:auth_name, description:description, flag:flag},
	  success:function(data){
              //alert(data.success);

			  toastr.success('Authorization Updated Successfully')

			  location.reload();

           }
});


});


$('#task').DataTable({
      "paging": true,
	  "pageLength": 5,
	  "lengthMenu": [[5, 10, 20, -1], [5, 10, 20, "All"]],
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,




		dom: 'l<"toolbar">frtip',

		initComplete: function () {
            var btns = $('.dt-button');
            btns.addClass('btn btn-info');
            btns.removeClass('dt-button');
			$("div.toolbar")
         .html('&nbsp;&nbsp;&nbsp;<a class="btn btn-info btn-sm" href="#" data-toggle="modal" data-target="#modal-default" title="Create"><i class="fas fa-user-plus"></i> Create</a>');

	$("#task").show();
        },
        select: {
            style:    'os',
            selector: 'td:first-child'
        },
        order: [[ 1, 'asc' ]],
		columnDefs: [
	{
        "targets": 0,
        "className": "dt-left"
    },
	{
        "targets": 1,
        "className": "dt-left"

    },
	{
        "targets": 2,
        "className": "dt-left"

    },
	{
        targets: 3,
        className: 'dt-left'
    },
	{
        targets: 4,
        className: 'dt-center'

    },
	{
        targets: 5,
        className: 'dt-center'

    },
	{
        targets: 6,
        className: 'dt-center'

    }
  ]


    });


var values = document.getElementById("pie").getAttribute("value");
		var mon = JSON.parse(values);

	 var lent = 0;

           if(mon != null){
              lent = mon.length;
           }
		   if(lent > 0){
	for(var j=0; j<lent; j++){

		var late = mon[j].LATE;
		var not_stat = mon[j].NOT_STARTED;
		var completed = mon[j].COMPLETED;
		var in_prog = mon[j].IN_PROGRESS;
		var total_task = mon[j].TOTAL;
	}


var ctxx = document.getElementById('pie');
var chart = new Chart(ctxx, {
    // The type of chart we want to create
    type: 'doughnut',

    // The data for our dataset
    data: {
        labels: [
    'Not Started',
    'In Progress',
    'Late',
	'Completed'
  ],
  datasets: [{
    label: 'My First Dataset',
    data: [not_stat, in_prog, late, completed],
    backgroundColor: [
    'rgba(255, 99, 132, 0.2)',
	'rgba(54, 162, 235, 0.2)',
	'rgba(255, 206, 86, 0.2)',
	'rgba(75, 192, 192, 0.2)'
    ],
	 borderColor: [
        'rgba(255,99,132,1)',
        'rgba(54, 162, 235, 1)',
        'rgba(255, 206, 86, 1)',
        'rgba(75, 192, 192, 1)'
      ],
    hoverOffset: 4
  }]
    },


    // Configuration options go here
     options: {
    plugins: {
      datalabels: {
        formatter: (value) => {
			var num = (value*100)/total_task;
          return num.toFixed(1) + '%';
        }
      }
    }
  }
});
}
else {
				toastr.warning('No Task Records Found')
			}

var valuess = document.getElementById("bar").getAttribute("value");
		var monsales = JSON.parse(valuess);

	 var len = 0;

           if(monsales != null){
              len = monsales.length;
           }
		   if(len > 0){
	for(var j=0; j<len; j++){

		 var high = monsales[j].HIGH;
		var med = monsales[j].MEDIUM;
		var low = monsales[j].LOW;

	}
var ctx = document.getElementById('bar');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'bar',

    // The data for our dataset
    data: {
        labels : ["High","Medium","Low"],
        datasets: [{
                        label: 'Priority',
                        backgroundColor: [
		 'rgba(153, 102, 255, 0.2)',
        'rgba(255, 99, 132, 0.2)',
         'rgba(255, 159, 64, 0.2)',

      ],
      borderColor: [
	  'rgba(153, 102, 255, 1)',
        'rgba(255,99,132,1)',
         'rgba(255, 159, 64, 1)',

      ],
      borderWidth: 1,
                        hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
                        hoverBorderColor: 'rgba(200, 200, 200, 1)',
                        data: [high,med,low],
                    }]
    },

    // Configuration options go here
     options: {
		 scales: {
      yAxes: [{
        ticks: {
          min: 0,
        }
      }]
    },
    plugins: {
      datalabels: {
         // hide datalabels for all datasets
         display: false
      }
    }
  }
});
}
else {
				toastr.warning('No Task Priority Records Found')
			}



var valuesy = document.getElementById("ticket").getAttribute("value");
		var team = JSON.parse(valuesy);

	 var lenh = 0;
	let resolved = [];
	let pending = [];
	let in_process = [];
	let month_year = [];
	let emp_name = [];

           if(team != null){
              lenh = team.length;
           }
		   if(lenh > 0){
	for(var j=0; j<lenh; j++){
	emp_name.push(team[j].EMP_NAME);
	resolved.push(team[j].STATUS[0].LATE);
	pending.push(team[j].STATUS[0].NOT_STARTED);
	in_process.push(team[j].STATUS[0].COMPLETED);
	month_year.push(team[j].STATUS[0].IN_PROGRESS);
	}
var ctxy = document.getElementById("ticket");

var data = {
  labels: [...emp_name],
  datasets: [{
    label: "Not Started",
    backgroundColor: 'rgba(255, 99, 132, 1)',
    data: [...pending]
  }, {
    label: "In Progress",
    backgroundColor: 'rgba(54, 162, 235, 1)',
    data: [...month_year]
  }, {
    label: "Late",
    backgroundColor: 'rgba(255, 206, 86, 1)',
    data: [...resolved]
  },
  {
    label: "Completed",
    backgroundColor: 'rgba(75, 192, 192, 1)',
    data: [...in_process]
  }]
};

var myBarChart = new Chart(ctxy, {
  type: 'horizontalBar',
  data: data,
  options: {
    barValueSpacing: 20,
    scales: {
      yAxes: [{
        ticks: {
          min: 0,
        }
      }]
    },
	plugins: {
      datalabels: {
         // hide datalabels for all datasets
         display: false
      }
    }
  }
});
}
else {
				toastr.warning('No Task Records Found')
			}

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
</body>



</html>
