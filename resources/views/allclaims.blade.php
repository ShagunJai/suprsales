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

 <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
		  <div class="row">
            <h1>All Claims</h1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


			@php 
			$allclaim = Auth::user()->emp_id;
			@endphp
			 <form class="form-horizontal" action="{{route('allclaims.update',$allclaim)}}" method="POST">
			 {{ csrf_field() }}
			 {{ method_field('PUT') }}
			 @isset($claim)


				<input name="emp_status" type="hidden" value="{{$status}}" class="form-control">
				<input name="employees[]" type="hidden" value="{{$employees}}" class="form-control">
				<input name="regions" type="hidden" value="{{$REGION_ID}}" class="form-control">
				<input name="areas" type="hidden" value="{{$AREA_ID}}" class="form-control">
				 <input name="start_date" type="hidden" value="{{$start_date}}" class="form-control">
				<input name="end_date" type="hidden" value="{{$end_date}}" class="form-control">
			  @endisset
			  <button type="submit" class="btn btn-info" style="float:right; height:32px; width:42px;"><i class="fas fa-download"></i></button>
			 </form>
			 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			    <label for="chkYes">
					<input type="radio" id="chkYes" name="chkPassPort" onclick="ShowHideDiv()" />
					Select Employee
				</label>
				&nbsp;&nbsp;&nbsp;
				<label for="chkNo">
					<input type="radio" id="chkNo" name="chkPassPort" onclick="ShowHideDiv()" />
					Select Region
				</label>
			</div>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard.index')}}">Home</a></li>
              <li class="breadcrumb-item active">All Claims</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
 <section class="content">

         <form class="form-horizontal" action="{{route('allclaims.store')}}" method="POST">
			 {{ csrf_field() }}
            <div class="row">

              <div class="col-md-3">

                <div class="form-group">


                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="far fa-calendar-alt"></i>
                      </span>
                    </div>
                    <input type="text" name="days" class="form-control float-right" id="reservation">
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form-group -->
				</div>

				 <div class="col-md-3">
                <div class="form-group select2-teal">

                  <select class="select2" name="status" data-dropdown-css-class="select2-teal" style="width: 100%;">
				  <option value="" selected>Select Status</option>
                    <option value="0">Pending</option>
					<option value="1">Approved</option>
					<option value="2">Rejected</option>
					<option value="3">Zero</option>
                  </select>
                </div>
				</div>

				 <div class="col-md-3">
                <div class="form-group select2-teal" id="region_div" style="display: none">

                  <select class="form-control select2" name="REGION_ID" onchange="empRegion(event)"  data-dropdown-css-class="select2-teal">
					 <option value="" selected>Select Region</option>
					 @isset($region)
					 @foreach ($region as $values)
					<option value="{{ $values['REGION_ID'] }}">{{ $values['REGION_NAME'] }}
					</option>
					@endforeach
					@endisset
				  </select>

                </div>
				</div>

				 <div class="col-md-3">
                <div class="form-group select2-teal" id="area_div" style="display: none">

                 <select class="form-control select2"  name="AREA_ID" id="empdist" data-dropdown-css-class="select2-teal">
					 <option value="" selected>Select Area</option>

				  </select>
                </div>
				</div>

                 	<div class="col-md-3">
                <div class="form-group select2-teal" id="dvPassport" style="display: none">

                  <select class="select2" multiple="multiple" name="emp[]" data-placeholder="Select Employee" data-dropdown-css-class="select2-teal" style="width: 100%;">
					@isset($admins)
					@foreach($admins as $value)
                    <option value="{{$value['EMP_ID']}}">{{$value['EMP_ID']}} - {{$value['EMP_NAME']}}</option>
					@endforeach
					@endisset
                  </select>
                </div>
				</div>


             </div>


             <div class="col-md-3">

			  <div class="form-group row">
			  <button type="submit" class="btn btn-flat btn-success" style="float:right;">Search &nbsp;<i class="fas fa-search"></i></button>
               </div>
                    <!-- /.form-group -->
              <!-- /.col -->

            </div>




			 </form>
            <!-- /.row -->



            <!-- /.row -->

		<div class="row">
          <div class="col-12">
    <div class="card">





			  <div class="card-body">



			  <table id="change_level" class="table table-bordered table-hover">
			  <thead>
                  <tr>

                   <th>Employee</th>
					<th>Travel</th>

					<th>DA</th>
					<th>I</th>
					<th>H</th>
					<th>S</th>
					<th>M</th>
					<th>Total</th>
					<th class="text-center">Date</th>
					<th class="text-center">Status</th>

                  </tr>
                  </thead>
                  <tbody>
				  @isset($claim)
				  @foreach ($claim as $value)
				 <td class="text-center">
				   <div class="row">
				   <div class="col">

				  <span class='badge badge-info'>
				  {{ $value['EMPLOYEE_ID'] }}-{{ $value['EMP_NAME'] }}
                  </span>
				  <span class='badge badge-primary'>
				  {{ $value['REGION_NAME'] }} - {{ $value['AREA_NAME'] }}
				  </span>


				  </div>
				  </div>
					</td>

				  <td class="text-center">
				  <div class="row">
				  <small>

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
					<span class='badge badge-secondary'>{{ $value['EXP_VEH_REPAIR'] }}</span>
					<i class="fas fa-tools text-lime" title="Vehicle Repair"></i>
					 </a> &nbsp;&nbsp;&nbsp;
					  <a class="d-flex flex-column">
					<span class='badge badge-secondary'>{{ $value['EXP_FUEL'] }}</span>
					<i class="fas fa-gas-pump text-pink" title="Max Allowed Fuel"></i>
					 </a> &nbsp;&nbsp;&nbsp;
					</nav>

					</small>
					</div>


				  </td>
				  <td class="text-center">
				  <div class="row">
				  <small>

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

				  <td>{{ $value['TOTAL_CLAIMED_AMOUNT'] }}</td>
				 <td>{{\Carbon\Carbon::parse($value['CLAIM_DATE'])->format('d/m/Y')}}</td>

				  <td>
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



				  </tr>
				  @endforeach
				   @endisset
			@empty($claim)
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

      <!-- /.container-fluid -->
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
<script type="text/javascript">
    function ShowHideDiv() {
        var chkYes = document.getElementById("chkYes");
		var chkNo = document.getElementById("chkNo");
        var dvPassport = document.getElementById("dvPassport");
		var region_div = document.getElementById("region_div");
		var area_div = document.getElementById("area_div");
        dvPassport.style.display = chkYes.checked ? "block" : "none";
		region_div.style.display = chkNo.checked ? "block" : "none";
		area_div.style.display = chkNo.checked ? "block" : "none";
    }
</script>
<script type="text/javascript">
   if($('#customRadio1').is(':checked')) {
   //$("#emp_drop").style.display = "none";
   $("#emp_drop").hide();
   //document.getElementById("emp_drop").style.display = "none";
   }

</script>
<script>
var empss;
function empRegion(e) {
createemployee = e.target.value;
//location.href = '/levelsettings/' + levelsetting;
 $.ajax({
         url: '/createemployee/' + createemployee,
         type: 'get',
         dataType: 'json',
         success: function(response){

           var len = 0;
		   var leng = 0;
		   $("#empdist").empty();
		   $("#region_plant").empty();
         // $('#DA_RATES_LOCAL').empty();


           if(response['data'] != null){
              len = response['data'].length;
           }
		   if(response['dat'] != null){
              leng = response['dat'].length;
           }

           if(len > 0){
              for(var i=0; i<len; i++){
                 var dis = response['data'][i].AREA_NAME;
				 var diss = response['data'][i].AREA_ID;
				var flag = response['data'][i].FLAG;
				 //alert(dis);
			  if(flag == '1') {
				$("#empdist").append("<option value='"+diss+"'>"+dis+"</option>");
			  }

              }
           }

		   if(leng > 0){
              for(var i=0; i<leng; i++){
                 var pltid = response['dat'][i].PLANT_ID;
				 var pltname = response['dat'][i].PLANT_DESCRIPTION;
				 //alert(dis);

				$("#region_plant").append("<option value='"+pltid+"'>"+pltname+"</option>");


              }
           }
			//document.getElementById("DA_RATES_LOCAL").value = DA_RATES_LOCAL;


         }

       });

}
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

	 $('#reservation').daterangepicker()
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

    },
	{
        targets: 8,
		className: 'dt-center'

    },
	{
        targets: 9,
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


</body>



</html>
