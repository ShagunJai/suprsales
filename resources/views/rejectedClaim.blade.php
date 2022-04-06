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
    
	

<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Rejected Claims</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard.index')}}">Home</a></li>
              <li class="breadcrumb-item active">Rejected Claims</li>
            </ol>
          </div>
        </div>
		
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
	   <form action="{{route('rejectedclaim.store')}}" method="POST">
		 <div class="row">&nbsp;&nbsp;
			 {{ csrf_field() }}	
			 <div class="col">
		<div class="form-group">
                
                  <select class="form-control select2"  name="cycle" data-dropdown-css-class="select2-teal" style="width: 100%;">
                    <option selected="selected" value="null">Submission Cycle</option>
                    <option value="h1">H1 (1st - 15th day)</option>
                    <option value="h2">H2 (16th - 31st day)</option>
                  </select>
                </div>
				</div>
		
		<div class="col">
		<div class="form-group">
                
                  <select class="form-control select2"  name="month" data-dropdown-css-class="select2-teal" style="width: 100%;">
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
                
                  <select class="form-control select2"  name="year" id='date-dropdown' data-dropdown-css-class="select2-teal" style="width: 100%;">
                    <option selected="selected" value="null">Year</option>
                  </select>
                </div>
				</div>
				<div class="col">
		
		<div class="form-group">
                
                 <button type="submit"  class="btn btn-success">Submit</button>
					
                </div>
				</div>
				</div>
				</form>
				
				
		 <div class="row">&nbsp;&nbsp;&nbsp;&nbsp;<small><i class="fas fa-bus text-maroon"></i>&nbsp;Bus/Train &nbsp;&nbsp;&nbsp;<i class="fas fa-plane text-indigo"></i>&nbsp;Air &nbsp;&nbsp;&nbsp;<i class="fas fa-taxi text-success"></i>&nbsp;Taxi/Auto/Rickshaw &nbsp;&nbsp;&nbsp;<i class="fas fa-hotel text-purple"></i>&nbsp;<b>(H)</b>&nbsp;Hotel &nbsp;&nbsp;&nbsp;<i class="fas fa-gas-pump text-pink"></i>&nbsp;Fuel &nbsp;&nbsp;&nbsp;<i class="fas fa-tools text-lime"></i>&nbsp;Vehicle Repair &nbsp;&nbsp;&nbsp;<i class="fas fa-route text-primary"></i>&nbsp;DA Outstation &nbsp;&nbsp;&nbsp;<i class="fas fa-map-marker-alt text-fuchsia"></i>&nbsp;DA Local &nbsp;&nbsp;&nbsp;<i class="fas fa-wifi text-orange"></i>&nbsp;<b>(I)</b>&nbsp;Internet/Phone &nbsp;&nbsp;&nbsp;<i class="fas fa-mobile-alt text-info"></i>&nbsp;<b>(S)</b>&nbsp;Stationary&nbsp;&nbsp;&nbsp;<i class="fab fa-medium-m text-secondary"></i>&nbsp;Miscellaneous</small></div>       
         
        <div class="row">
          <div class="col-12">
            <div class="card">
			
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
			
			  <div class="modal fade text-left del_modal">
				 <div class="modal-dialog">
          <div class="modal-content" style="width: 600px; height: 100px;">
           
                <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Mark Void</h3>
				 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              </div>
			 	<input type="hidden" name="del_id" id="del_Id" class="form-control"  value="">
                 
			  
				 <form class="form-horizontal"  id="del_form" method="post">
				 @method('DELETE')
					@csrf
				  <div class="card-body">
				 
					  Claim for <span id="undo_date"></span> will be marked void.
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
					<th class="text-center">A</th>
					
                  </tr>
                  </thead>
                  <tbody>
				  @isset($claim)
				  @foreach ($claim as $value)
				 <td class="text-center">
				   <div class="row">
				   <div class="col">
				 
				  <span class='badge badge-info'>
				  {{ $value['EMP_NAME'] }}
				  </span> 
				  <span class='badge badge-primary'>
				  @foreach ($value['REGION'] as $val)
				  {{ $val['REGION_NAME'] }}
				  @endforeach
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
				 
					 @php
				$change = json_encode($value);
				@endphp
				<div class="btn-group btn-group-sm">
					  @php
				$claim = json_encode($value);
				@endphp
				 <a class='btn btn-danger btn-sm zero_claim' href='#'  id="{{$value['CLAIM_ID']}}_{{\Carbon\Carbon::parse($value['CLAIM_DATE'])->format('d/m/Y')}}" title="Mark Void">
                             <i class='fas fa-trash'></i>       
                          </a>
						 @php
				$approved_claim = json_encode($value);
				@endphp
				 <a class='btn btn-primary btn-sm approved_claim' href='#' value="{{$approved_claim}}" id="{{$value['CLAIM_ID']}}" title="View Comments">
                             <i class='fas fa-eye'></i>       
                          </a>
				</div>
				  </td>
				  
				  
				  </tr>
				  @endforeach
				   @endisset
			@empty($claim)
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

<script>
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
var rejectedclaim = document.getElementById("del_Id").value;
let formData = new FormData(this);

$.ajax({
	  type: 'POST',
	  url: 'rejectedclaim/' + rejectedclaim,
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

</body>



</html>