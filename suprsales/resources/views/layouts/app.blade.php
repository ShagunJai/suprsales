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
 #example2 {
    display: none;
}
 #authorization {
    display: none;
}
  #screen {
    display: none;
}
#area {
    display: none;
}
 #module {
    display: none;
}
#create_role {
    display: none;
}
#assign_role {
    display: none;
}
#no_assign_role {
    display: none;
}
#zone {
    display: none;
}
#assign_comp {
    display: none;
}
#assign_plant {
    display: none;
}
#non_region {
    display: none;
}
#stock {
    display: none;
}
#order {
    display: none;
}
#depot_order {
    display: none;
}
#packing {
    display: none;
}
#plant-table {
    display: none;
}
#myorder {
    display: none;
}
#material {
    display: none;
}
#approvals {
    display: none;
}
#myticket {
    display: none;
}
#ticket {
    display: none;
}
#openticket {
    display: none;
}
#announcement-table {
    display: none;
}
#verify-table {
    display: none;
}
#type-announcement {
    display: none;
}
#myan {
    display: none;
}
 #mycustomer {
    display: none;
}
 #customer {
    display: none;
}
#employee {
    display: none;
}
#component {
    display: none;
}
  div.dataTables_length {
  margin-right: 1em;
}
.toolbar {
    float:left;
}
.table{
 background-color:#ede9f7;
}
.purplenavbar{
 background-color:#210635;
}
.dataTables_wrapper .dt-buttons {
  float:right;
  text-align:center;
  margin-left: 1em;
}
ion-icon {
  pointer-events: none;
}
#mark_claim {
	display:none;
}
#non_assigned_user {
	display:none;
}
#non_assigned_role {
	display:none;
}
#user {
	display:none;
}
  /* RESET STYLES & HELPER CLASSES
–––––––––––––––––––––––––––––––––––––––––––––––––– */
:root {
  --level-1: #d9d2f7;
  --level-2: #dcd4f1;
  --level-3: #e5def7;
  --level-4: #f4f3f8;
  --black: black;
}

* {
  padding: 0;
  margin: 0;
  box-sizing: border-box;
}

ol {
  list-style: none;
}


.container {
  max-width: 1000px;
  padding: 0 10px;
  margin: 0 auto;
}

.rectangle {
  position: relative;
  padding: 20px;
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.15);
}


/* LEVEL-1 STYLES
–––––––––––––––––––––––––––––––––––––––––––––––––– */
.level-1 {
  width: 50%;
  margin: 0 auto 40px;
  background: var(--level-1);
}

.level-1::before {
  content: "";
  position: absolute;
  top: 100%;
  left: 50%;
  transform: translateX(-50%);
  width: 2px;
  height: 20px;
  background: var(--black);
}


/* LEVEL-2 STYLES
–––––––––––––––––––––––––––––––––––––––––––––––––– */
.level-2-wrapper {
  position: relative;
  display: grid;
  grid-template-columns: repeat(2, 1fr);
}

.level-2-wrapper::before {
  content: "";
  position: absolute;
  top: -20px;
  left: 25%;
  width: 50%;
  height: 2px;
  background: var(--black);
}

.level-2-wrapper::after {
  display: none;
  content: "";
  position: absolute;
  left: -20px;
  bottom: -20px;
  width: calc(100% + 20px);
  height: 2px;
  background: var(--black);
}

.level-2-wrapper li {
  position: relative;
}

.level-2-wrapper > li::before {
  content: "";
  position: absolute;
  bottom: 100%;
  left: 50%;
  transform: translateX(-50%);
  width: 2px;
  height: 20px;
  background: var(--black);
}

.level-2 {
  width: 70%;
  margin: 0 auto 40px;
  background: var(--level-2);
}

.level-2::before {
  content: "";
  position: absolute;
  top: 100%;
  left: 50%;
  transform: translateX(-50%);
  width: 2px;
  height: 20px;
  background: var(--black);
}

.level-2::after {
  display: none;
  content: "";
  position: absolute;
  top: 50%;
  left: 0%;
  transform: translate(-100%, -50%);
  width: 20px;
  height: 2px;
  background: var(--black);
}


/* LEVEL-3 STYLES
–––––––––––––––––––––––––––––––––––––––––––––––––– */
.level-3-wrapper {
  position: relative;
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  grid-column-gap: 20px;
  width: 90%;
  margin: 0 auto;
}

.level-3-wrapper::before {
  content: "";
  position: absolute;
  top: -20px;
  left: calc(25% - 5px);
  width: calc(50% + 10px);
  height: 2px;
  background: var(--black);
}

.level-3-wrapper > li::before {
  content: "";
  position: absolute;
  top: 0;
  left: 50%;
  transform: translate(-50%, -100%);
  width: 2px;
  height: 20px;
  background: var(--black);
}

.level-3 {
  margin-bottom: 20px;
  background: var(--level-3);
}


/* LEVEL-4 STYLES
–––––––––––––––––––––––––––––––––––––––––––––––––– */
.level-4-wrapper {
  position: relative;
  width: 80%;
  margin-left: auto;
}

.level-4-wrapper::before {
  content: "";
  position: absolute;
  top: -20px;
  left: -20px;
  width: 2px;
  height: calc(100% + 20px);
  background: var(--black);
}

.level-4-wrapper li + li {
  margin-top: 20px;
}

.level-4 {
  font-weight: normal;
  background: var(--level-4);
}

.level-4::before {
  content: "";
  position: absolute;
  top: 50%;
  left: 0%;
  transform: translate(-100%, -50%);
  width: 20px;
  height: 2px;
  background: var(--black);
}


/* MQ STYLES
–––––––––––––––––––––––––––––––––––––––––––––––––– */
@media screen and (max-width: 700px) {
  .rectangle {
    padding: 20px 10px;
  }

  .level-1,
  .level-2 {
    width: 100%;
  }

  .level-1 {
    margin-bottom: 20px;
  }

  .level-1::before,
  .level-2-wrapper > li::before {
    display: none;
  }

  .level-2-wrapper,
  .level-2-wrapper::after,
  .level-2::after {
    display: block;
  }

  .level-2-wrapper {
    width: 90%;
    margin-left: 10%;
  }

  .level-2-wrapper::before {
    left: -20px;
    width: 2px;
    height: calc(100% + 40px);
  }

  .level-2-wrapper > li:not(:first-child) {
    margin-top: 50px;
  }
}

.tooltip {
  position: relative;
  display: inline-block;
  border-bottom: 1px dotted black;
}

.tooltip .tooltiptext {
  visibility: hidden;
  width: 120px;
  background-color: black;
  color: #fff;
  text-align: center;
  border-radius: 6px;
  padding: 5px 0;
  position: absolute;
  z-index: 1;
  bottom: 100%;
  left: 50%;
  margin-left: -60px;

  /* Fade in tooltip - takes 1 second to go from 0% to 100% opac: */
  opacity: 0;
  transition: opacity 1s;
}

.tooltip:hover .tooltiptext {
  visibility: visible;
  opacity: 1;
}

.loader {
  display: none;
  top: 50%;
  left: 50%;
  position: absolute;
  transform: translate(-50%, -50%);
  transition: opacity 0.3s linear;
  z-index: 9999;
}

.loading {
  border: 2px solid #ccc;
  width: 60px;
  height: 60px;
  border-radius: 50%;
  border-top-color: #1ecd97;
  border-left-color: #1ecd97;
  animation: spin 1s infinite ease-in;
}

@keyframes spin {
  0% {
    transform: rotate(0deg);
  }

  100% {
    transform: rotate(360deg);
  }
}
.table-font-color {
	color: #2c0647;
}
a.paginate_button {
    background-color: #e5def7;
}
  </style>

</head>
<body class="hold-transition sidebar-mini accent-teal">



@if(isset(Auth::user()->id))
 <div class="wrapper">

 @php
  $user = Auth::user()->email;
  $id = Auth::id();
  @endphp
        <!-- Navigation -->

        <!--<nav class="navbar navbar-static-top" role="navigation">-->

			@include('layouts.header')
			@include('layouts.sidebar')






        <div class="content-wrapper">

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

            @yield('content')

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
<script type="text/javascript">
    function spinner() {
        document.getElementsByClassName("loader")[0].style.display = "block";
    }
</script>
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
  $("[data-card-widget='collapse']").click()
});
</script>
<script>
 $("body").on("click", ".plant", function(event){
           var auth = $(this).attr("id");

			var values = document.getElementById(auth).getAttribute("value");
			var auths = JSON.parse(values);



			$('#plant_Id').val(auths.PLANT_ID);
			$('#plant_name').val(auths.PLANT_DESCRIPTION);

			if(auths.FLAG == '1') {
				$("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', true);
    });

					}
			else {
				$("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', false);
    });
	}


			$('.plantModal').modal("show");
		  });

$('#plant_form').on("submit", function(event){
event.preventDefault();
var plantview = document.getElementById("plant_Id").value;
var flag = document.getElementById("flag").value;

$.ajax({
	  type: 'POST',
	  url: '/plantview/' + plantview,
	  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  },
	  data:{'_method':'PUT', flag:flag},
	  success:function(data){
              //alert(data.success);

			  toastr.success('Plant Updated Successfully')

			  location.reload();

           }
});


});
</script>
<script>
var region_zone;
function region_zones(e) {
	region_zone = e.target.value;
	  var Region = $("#region_zone").attr("id");

	var values = document.getElementById(Region).getAttribute("value");

	var regions = JSON.parse(values);
	/*var zoneArray = [];
	var regionArray = [];
	var zoneAreaMapping = [];*/

	for(var j=0; j<regions.length; j++){
	//zoneArray.push(regions[i].ZONE_ID);
	if(regions[j].ZONE_ID == region_zone){

		 $('#regionss').empty();

			for(var i=0; i<regions[j].REGION.length; i++){
			var region_id = regions[j].REGION[i].REGION_ID;
			var region_name = regions[j].REGION[i].REGION_NAME;

			$("#regionss").append("<option value='"+region_id+"'>"+region_name+"</option>");
			}


	}
	}

	//$('#zones').val(screens.ZONE_NAME);

}
var createretailer;
function reatiler_region(e) {
createretailer = e.target.value;
//location.href = '/levelsettings/' + levelsetting;

 $.ajax({
         url: '/createretailer/' + createretailer,
         type: 'get',
         dataType: 'json',
         success: function(response){

           var len = 0;
		   $("#dist").empty();
         // $('#DA_RATES_LOCAL').empty();


           if(response['data'] != null){
              len = response['data'].length;
           }

           if(len > 0){
              for(var i=0; i<len; i++){
                 var dis = response['data'][i].AREA_NAME;
				 var diss = response['data'][i].AREA_ID;
				  var flag = response['data'][i].FLAG;
				 //alert(dis);
				if(flag == '1'){
				$("#dist").append("<option value='"+diss+"'>"+dis+"</option>");
				}
              }
           }
			//document.getElementById("DA_RATES_LOCAL").value = DA_RATES_LOCAL;


         }

       });

}
</script>
<script>
var createfarmer;
function myRegion(e) {
createfarmer = e.target.value;
//location.href = '/levelsettings/' + levelsetting;

 $.ajax({
         url: '/createfarmer/' + createfarmer,
         type: 'get',
         dataType: 'json',
         success: function(response){

           var len = 0;
		   $("#dist").empty();
         // $('#DA_RATES_LOCAL').empty();


           if(response['data'] != null){
              len = response['data'].length;
           }

           if(len > 0){
              for(var i=0; i<len; i++){
                 var dis = response['data'][i].AREA_NAME;
				 var diss = response['data'][i].AREA_ID;
				  var flag = response['data'][i].FLAG;
				 //alert(dis);
				if(flag == '1'){
				$("#dist").append("<option value='"+diss+"'>"+dis+"</option>");
				}
              }
           }
			//document.getElementById("DA_RATES_LOCAL").value = DA_RATES_LOCAL;


         }

       });

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
var admintype;
function adminType(e) {

admintype = e.target.value;
$("#admin_type").empty();
if(admintype == "1") {
	$('#admin_type').prop('disabled', false);
$("#admin_type").append("<option value='1'>Depot Manager</option><option value='2'>Org Admin</option>");
}
else{
	$('#admin_type').prop('disabled', true);
}


}
</script>
<script>
$('#emp_id').on('change', function() {
   var cust = $(this).val();

  location.href = 'custs/' + cust;

});
</script>
	<script>
 $('input.flag').on('change.bootstrapSwitch', function (e, state) {
	$(this).empty();
    if (e.target.checked == true) {
        $value = '1';
        $(this).val($value);
    } else {
        $value = '0';
        $(this).val($value);
    }

});
</script>
 <script>
$(document).ready(function() {
    $('table.display').DataTable({
		 "paging": true,
	  "pageLength": 4,
	  "lengthMenu": [[4, 10, -1], [4, 10, "All"]],
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
	  'columnDefs': [
         {
            'targets': 0,
            className: 'dt-center'
         },
         {
          targets: 1,
          className: 'dt-center'
         },
		 {
        targets: 2,
		className: 'dt-center'
    },
			{
        targets: 3,
		className: 'dt-center'

    },
	{
        targets: 4,
		className: 'dt-center'

    }
      ],
      "dom": 'l<"toolbar">frtip',

		'select': {
         'style': 'multi',
		  info: false
      },
      'order': [[1, 'asc']]
    } );

     $('table.claim_status').DataTable({
		 "paging": true,
	  "pageLength": 4,
	  "lengthMenu": [[4, 10, -1], [4, 10, "All"]],
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
          targets: 1
         },
		 {
        targets: 2
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
        targets: 6,
		className: 'dt-center'

    },
	{
        targets: 7,
		className: 'dt-center'

    }

      ],
      "dom": 'l<"toolbar">frtip',

		'select': {
         'style': 'multi',
		  info: false
      },
      'order': [[1, 'asc']]
    } );

} );
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
<meta name="csrf-token" content="{{ csrf_token() }}" />
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });


var table;

   table =  $('#example2').DataTable({
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
            'targets': 0,
            'checkboxes': {
               'selectRow': true
            }
         },
         {
          targets: 1,
          className: 'dt-center'
         },
		 {
        targets: 2
    },
			{
        targets: 3

    },
	{
        targets: 4,
        className: 'dt-right'
    },
		{
        targets: 5,
        className: 'dt-center'
    },
	{
        targets: 6,
        "visible": false,
      "searchable": false
    },
	{
        targets: 7,
        "visible": false,
      "searchable": false
    }
      ],



		dom: 'l<"toolbar">Bfrtip',

        buttons: [
		     {
                extend:    'excelHtml5',
                text:      '<i style="float:right;" class="fas fa-download"></i>',
                titleAttr: 'Excel'
            },


        ],

		initComplete: function () {
            var btns = $('.dt-button');
            btns.addClass('btn btn-info');
            btns.removeClass('dt-button');
			$("div.toolbar")
         .html('<div class="btn-group"><button type="button" class="btn btn-info btn-sm" title="Activate">Action</button><button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown"><div class="dropdown-menu" role="menu"><a class="dropdown-item swalDefaultSuccess" id="btnSelectedRows">Activate</a><div class="dropdown-divider"></div><a class="dropdown-item" id="btnSelectedRow">Deactivate</a></div></button></div>');

$('#btnSelectedRows').on('click', function() {

var emp = table.rows( { selected: true } ).data().pluck(6).toArray();
var flag = table.row( { selected: true } ).data()[7];
var flags = table.rows( { selected: true } ).data().pluck(7).toArray();
const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

//const allEqual = arr => arr.every(val => val === arr[0]);
function checkFlag(valueFlag) {
  return valueFlag == 0;
}

      if (flags.every(checkFlag)) {
        $.ajax({
	  type: 'POST',
	  url: "{{ route('adminn.store') }}",
	  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  },
	  data:{emp:emp, flag:flag},
	  success:function(data){
              //alert(data.success);

			  toastr.success('Activated Successfully')

			  location.reload();

           }
});
      }

	  else {

		 toastr.warning('Select only deactivated values')

	  }




});

$('#btnSelectedRow').on('click', function() {

var emp = table.rows( { selected: true } ).data().pluck(6).toArray();
var flag = table.row( { selected: true } ).data()[7];
var flags = table.rows( { selected: true } ).data().pluck(7).toArray();
const Toast = Swal.mixin({ toast: true, position: 'top-end', showConfirmButton: false, timer: 3000 });

function checkFlag(valueFlag) {
  return valueFlag == 1;
}

      if (flags.every(checkFlag)) {

        $.ajax({
	  type: 'POST',
	  url: "{{ route('adminn.store') }}",
	  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  },
	  data:{emp:emp, flag:flag},
	  success:function(data){
              //alert(data.success);

			  toastr.success('Deactivated Successfully')

			  location.reload();

           }
});
      }

	  else {

		 toastr.warning('Select only activated values')

	  }

});

$("#example2").show();
        },

		'select': {
         'style': 'multi',
		  info: false
      },
      'order': [[1, 'asc']]




    });




$('#authorization').DataTable({
      "paging": true,
	  "pageLength": 5,
	  "lengthMenu": [[5, 10, 20, -1], [5, 10, 20, "All"]],
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,




		dom: 'l<"toolbar">Bfrtip',
        buttons: [
          {
                extend:    'excelHtml5',
                text:      '<i style="float:right;" class="fas fa-download"></i>',
                titleAttr: 'Excel'
            }


        ],
		initComplete: function () {
            var btns = $('.dt-button');
            btns.addClass('btn btn-info');
            btns.removeClass('dt-button');
			$("div.toolbar")
         .html('<a class="btn btn-info btn-sm" href="#" data-toggle="modal" data-target="#modal-default" title="Create"><i class="fas fa-user-plus"></i> Create</a>');

$("#authorization").show();
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

    }
  ]


    });

	$('#screen').DataTable({
      "paging": true,
	  "pageLength": 5,
	  "lengthMenu": [[5, 10, 20, -1], [5, 10, 20, "All"]],
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,




		dom: 'l<"toolbar">Bfrtip',
        buttons: [
          {
                extend:    'excelHtml5',
                text:      '<i style="float:right;" class="fas fa-download"></i>',
                titleAttr: 'Excel'
            }


        ],
		initComplete: function () {
            var btns = $('.dt-button');
            btns.addClass('btn btn-info');
            btns.removeClass('dt-button');
			$("div.toolbar")
         .html('<a class="btn btn-info btn-sm" href="#" data-toggle="modal" data-target="#modal-default" title="Create"><i class="fas fa-user-plus"></i> Create</a>');

	$("#screen").show();
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
        "className": "dt-right"

    },
	{
        targets: 3,
        className: 'dt-center'
    },
	{
        targets: 4,
        className: 'dt-center'

    }
  ]


    });

	$('#area').DataTable({
      "paging": true,
	  "pageLength": 5,
	  "lengthMenu": [[5, 10, 20, -1], [5, 10, 20, "All"]],
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,




		dom: 'l<"toolbar">Bfrtip',
        buttons: [
          {
                extend:    'excelHtml5',
                text:      '<i style="float:right;" class="fas fa-download"></i>',
                titleAttr: 'Excel'
            }


        ],
		initComplete: function () {
            var btns = $('.dt-button');
            btns.addClass('btn btn-info');
            btns.removeClass('dt-button');
			$("div.toolbar")
         .html('<a class="btn btn-info btn-sm" href="#" data-toggle="modal" data-target="#modal-default" title="Create"><i class="fas fa-user-plus"></i> Create</a>');

	$("#area").show();
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
        "className": "dt-center"

    },
	{
        targets: 3,
        className: 'dt-center'
    }
  ]


    });

	$('#component').DataTable({
      "paging": true,
	  "pageLength": 5,
	  "lengthMenu": [[5, 10, 20, -1], [5, 10, 20, "All"]],
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,




		dom: 'l<"toolbar">Bfrtip',
        buttons: [
          {
                extend:    'excelHtml5',
                text:      '<i style="float:right;" class="fas fa-download"></i>',
                titleAttr: 'Excel'
            }


        ],
		initComplete: function () {
            var btns = $('.dt-button');
            btns.addClass('btn btn-info');
            btns.removeClass('dt-button');
			$("div.toolbar")
         .html('<a class="btn btn-info btn-sm" href="#" data-toggle="modal" data-target="#component-default" title="Create"><i class="fas fa-user-plus"></i> Create</a>');

	$("#component").show();
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
        className: 'dt-center'
    },
	{
        targets: 4,
        className: 'dt-center'

    }
  ]


    });



	$('#module').DataTable({
      "paging": true,
	  "pageLength": 5,
	  "lengthMenu": [[5, 10, 20, -1], [5, 10, 20, "All"]],
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,




		dom: 'l<"toolbar">Bfrtip',
        buttons: [
          {
                extend:    'excelHtml5',
                text:      '<i style="float:right;" class="fas fa-download"></i>',
                titleAttr: 'Excel'
            }


        ],
		initComplete: function () {
            var btns = $('.dt-button');
            btns.addClass('btn btn-info');
            btns.removeClass('dt-button');
			$("div.toolbar")
         .html('<a class="btn btn-info btn-sm" href="#" data-toggle="modal" data-target="#modal-default" title="Create"><i class="fas fa-user-plus"></i> Create</a>');

$("#module").show();
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
        "className": "dt-right"

    },
	{
        targets: 3,
        className: 'dt-center'
    },
	{
        targets: 4,
        className: 'dt-center'

    }
  ]


    });

	 $('#create_role').DataTable({
      "paging": true,
	  "pageLength": 5,
	  "lengthMenu": [[5, 10, 20, -1], [5, 10, 20, "All"]],
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,




		dom: 'l<"toolbar">Bfrtip',
        buttons: [
          {
                extend:    'excelHtml5',
                text:      '<i style="float:right;" class="fas fa-download"></i>',
                titleAttr: 'Excel'
            }


        ],
		initComplete: function () {
            var btns = $('.dt-button');
            btns.addClass('btn btn-info');
            btns.removeClass('dt-button');
			$("div.toolbar")
         .html('<a class="btn btn-info btn-sm" href="#" data-toggle="modal" data-target="#modal-default" title="Create"><i class="fas fa-user-plus"></i> Create</a>');

		$("#create_role").show();
        },
        select: {
            style:    'os',
            selector: 'td:first-child'
        },
        order: [[ 1, 'asc' ]],
		columnDefs: [ {
            targets:   0



        },
			{ "targets": 1 },
      { "targets": 2, className: 'dt-center'},
      {  "targets": 3, className: 'dt-center'},
	   { "targets": 4, className: 'dt-center'}

	  ]


    });

	$('#assign_role').DataTable({
      "paging": true,
	  "pageLength": 5,
	  "lengthMenu": [[5, 10, 20, -1], [5, 10, 20, "All"]],
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,




		dom: 'l<"toolbar">Bfrtip',
        buttons: [
          {
                extend:    'excelHtml5',
                text:      '<i style="float:right;" class="fas fa-download"></i>',
                titleAttr: 'Excel'
            }


        ],
		initComplete: function () {
            var btns = $('.dt-button');
            btns.addClass('btn btn-info');
            btns.removeClass('dt-button');
			$("div.toolbar")
         .html('<a class="btn btn-info btn-sm" href="#" data-toggle="modal" data-target="#modal-default" title="Create"><i class="fas fa-user-plus"></i> Assign</a>');

$("#assign_role").show();
        },
        select: {
            style:    'os',
            selector: 'td:first-child'
        },
        order: [[ 1, 'asc' ]],
		columnDefs: [ {
            targets:   0



        },
			{  "targets": 1 },
      {  "targets": 2, className: 'dt-center'},
      { "targets": 3, className: 'dt-center'},
	   { "targets": 4, className: 'dt-center'}

	  ]


    });

	$('#no_assign_role').DataTable({
      "paging": true,
	  "pageLength": 5,
	  "lengthMenu": [[5, 10, 20, -1], [5, 10, 20, "All"]],
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,




		dom: 'l<"toolbar">Bfrtip',
        buttons: [
          {
                extend:    'excelHtml5',
                text:      '<i style="float:right;" class="fas fa-download"></i>',
                titleAttr: 'Excel'
            }


        ],
		initComplete: function () {
            var btns = $('.dt-button');
            btns.addClass('btn btn-info');
            btns.removeClass('dt-button');

$("#no_assign_role").show();
        },
        select: {
            style:    'os',
            selector: 'td:first-child'
        },
        order: [[ 1, 'asc' ]],
		columnDefs: [ {
            targets:   0



        },
			{  "targets": 1 },
      {  "targets": 2, className: 'dt-center'}

	  ]


    });


	$('#zone').DataTable({
      "paging": true,
	  "pageLength": 5,
	  "lengthMenu": [[5, 10, 20, -1], [5, 10, 20, "All"]],
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,




		dom: 'l<"toolbar">Bfrtip',
        buttons: [
          {
                extend:    'excelHtml5',
                text:      '<i style="float:right;" class="fas fa-download"></i>',
                titleAttr: 'Excel'
            }


        ],
		initComplete: function () {
            var btns = $('.dt-button');
            btns.addClass('btn btn-info');
            btns.removeClass('dt-button');
			$("div.toolbar")
         .html('<a class="btn btn-info btn-sm" href="#" data-toggle="modal" data-target="#modal-default" title="Create"><i class="fas fa-user-plus"></i> Create</a>');

$("#zone").show();
        },
        select: {
            style:    'os',
            selector: 'td:first-child'
        },
        order: [[ 1, 'asc' ]],
		columnDefs: [ {
            targets:   0



        },
			{  "targets": 1, className: 'dt-center'},
      {  "targets": 2, className: 'dt-center'},
      { "targets": 3, className: 'dt-center'}

	  ]


    });

	$('#assign_comp').DataTable({
      "paging": true,
	  "pageLength": 5,
	  "lengthMenu": [[5, 10, 20, -1], [5, 10, 20, "All"]],
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,




		dom: 'l<"toolbar">Bfrtip',
        buttons: [
          {
                extend:    'excelHtml5',
                text:      '<i style="float:right;" class="fas fa-download"></i>',
                titleAttr: 'Excel'
            }


        ],
		initComplete: function () {
            var btns = $('.dt-button');
            btns.addClass('btn btn-info');
            btns.removeClass('dt-button');
			$("div.toolbar")
         .html('<a class="btn btn-info btn-sm" href="#" data-toggle="modal" data-target="#modal-default" title="Create"><i class="fas fa-user-plus"></i> Assign</a>');

$("#assign_comp").show();
        },
        select: {
            style:    'os',
            selector: 'td:first-child'
        },
        order: [[ 1, 'asc' ]],
		columnDefs: [ {
            targets:   0



        },
			{  "targets": 1 , className: 'dt-center'},
      {  "targets": 2, className: 'dt-center'}

	  ]


    });

	$('#assign_plant').DataTable({
      "paging": true,
	  "pageLength": 5,
	  "lengthMenu": [[5, 10, 20, -1], [5, 10, 20, "All"]],
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,




		dom: 'l<"toolbar">Bfrtip',
        buttons: [
          {
                extend:    'excelHtml5',
                text:      '<i style="float:right;" class="fas fa-download"></i>',
                titleAttr: 'Excel'
            }


        ],
		initComplete: function () {
            var btns = $('.dt-button');
            btns.addClass('btn btn-info');
            btns.removeClass('dt-button');

$("#assign_plant").show();
        },
        select: {
            style:    'os',
            selector: 'td:first-child'
        },
        order: [[ 1, 'asc' ]],
		columnDefs: [ {
            targets:   0



        },
			{  "targets": 1},
      {  "targets": 2, className: 'dt-center'},
	   {  "targets": 3, className: 'dt-center'}

	  ]


    });


	$('#non_region').DataTable({
      "paging": true,
	  "pageLength": 5,
	  "lengthMenu": [[5, 10, 20, -1], [5, 10, 20, "All"]],
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,




		dom: 'l<"toolbar">Bfrtip',
        buttons: [
          {
                extend:    'excelHtml5',
                text:      '<i style="float:right;" class="fas fa-download"></i>',
                titleAttr: 'Excel'
            }


        ],
		initComplete: function () {
            var btns = $('.dt-button');
            btns.addClass('btn btn-info');
            btns.removeClass('dt-button');

$("#non_region").show();
        },
        select: {
            style:    'os',
            selector: 'td:first-child'
        },
        order: [[ 1, 'asc' ]],
		columnDefs: [ {
            targets:   0



        },
			{  "targets": 1},
      {  "targets": 2, className: 'dt-center'}

	  ]


    });

	$('#stock').DataTable({
      "paging": true,
	  "pageLength": 5,
	  "lengthMenu": [[5, 10, 20, -1], [5, 10, 20, "All"]],
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,


	  columnDefs: [ {
            targets:   0



        },

      {  "targets": 1 },
      {  "targets": 2},
      { "targets": 3, className: 'dt-center'},
      {  "targets": 4, className: 'dt-center'},
	  {  "targets": 5, className: 'dt-right'},
	  { "targets": 6, className: 'dt-right'},
	  { "targets": 7, className: 'dt-right'},
	  { "targets": 8, className: 'dt-right'}

	  	  ],
		  dom: 'l<"toolbar">Bfrtip',

        buttons: [
           {
                extend:    'excelHtml5',
                text:      '<i style="float:right;" class="fas fa-download"></i>',
                titleAttr: 'Excel'
            }


        ],


		initComplete: function () {
            var btns = $('.dt-button');
            btns.addClass('btn btn-info');
            btns.removeClass('dt-button');

$("#stock").show();
        },

        select: {
            style:    'os',
            selector: 'td:first-child'
        },
        order: [[ 1, 'asc' ]],



    });

	$('#order').DataTable({
      "paging": true,
	  "pageLength": 5,
	  "lengthMenu": [[5, 10, 20, -1], [5, 10, 20, "All"]],
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,




		dom: 'l<"toolbar">Bfrtip',
        buttons: [



        ],
		initComplete: function () {
            var btns = $('.dt-button');
            btns.addClass('btn btn-info');
            btns.removeClass('dt-button');
			$("div.toolbar")
         .html('');

$("#order").show();
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
        className: 'dt-center'
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

	$('#depot_order').DataTable({
      "paging": true,
	  "pageLength": 5,
	  "lengthMenu": [[5, 10, 20, -1], [5, 10, 20, "All"]],
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,




		dom: 'l<"toolbar">Bfrtip',
        buttons: [



        ],
		initComplete: function () {
            var btns = $('.dt-button');
            btns.addClass('btn btn-info');
            btns.removeClass('dt-button');
			$("div.toolbar")
         .html('');

$("#depot_order").show();
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
        className: 'dt-center'
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

$('#packing').DataTable({
      "paging": true,
	  "pageLength": 5,
	  "lengthMenu": [[5, 10, 20, -1], [5, 10, 20, "All"]],
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,




		dom: 'l<"toolbar">Bfrtip',
        buttons: [
          {
                extend:    'excelHtml5',
                text:      '<i style="float:right;" class="fas fa-download"></i>',
                titleAttr: 'Excel'
            }


        ],
		initComplete: function () {
            var btns = $('.dt-button');
            btns.addClass('btn btn-info');
            btns.removeClass('dt-button');
			$("div.toolbar")
         //.html('<a class="btn btn-success btn-sm" href="#" data-toggle="modal" data-target="#modal-default"><i class="fas fa-user-plus"></i> Create</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select class="custom-select" style="width: auto;" data-sortOrder><option value="">Filter By</option><option value="index">Gurugram</option><option value="sortData">Amritsar</option><option value="sortData">Jaipur</option></select>');

$("#packing").show();
        },
        select: {
            style:    'os',
            selector: 'td:first-child'
        },
        order: [[ 1, 'asc' ]],
		columnDefs: [
	{
        "targets": 0,

        "className": "dt-center"
    },
	{
        "targets": 1,
        "className": "dt-center"

    },
    {
        "targets": 2,
        "className": "dt-center"

    }


  ]


    });

	$('#plant-table').DataTable({
      "paging": true,
	  "pageLength": 5,
	  "lengthMenu": [[5, 10, 20, -1], [5, 10, 20, "All"]],
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,




		dom: 'l<"toolbar">Bfrtip',
        buttons: [
          {
                extend:    'excelHtml5',
                text:      '<i style="float:right;" class="fas fa-download"></i>',
                titleAttr: 'Excel'
            }


        ],
		initComplete: function () {
            var btns = $('.dt-button');
            btns.addClass('btn btn-success');
            btns.removeClass('dt-button');
			$("div.toolbar")
         //.html('<a class="btn btn-success btn-sm" href="#" data-toggle="modal" data-target="#modal-default"><i class="fas fa-user-plus"></i> Create</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select class="custom-select" style="width: auto;" data-sortOrder><option value="">Filter By</option><option value="index">Gurugram</option><option value="sortData">Amritsar</option><option value="sortData">Jaipur</option></select>');

$("#plant-table").show();
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
        targets: 2,
        className: 'dt-center'
    },
	{
        targets: 3,
        className: 'dt-center'

    },
	{
        targets: 4,
        className: 'dt-center'
    }
  ]


    });

	$('#myorder').DataTable({
      "paging": true,
	  "pageLength": 5,
	  "lengthMenu": [[5, 10, 20, -1], [5, 10, 20, "All"]],
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,




		dom: 'l<"toolbar">Bfrtip',
        buttons: [



        ],
		initComplete: function () {
            var btns = $('.dt-button');
            btns.addClass('btn btn-info');
            btns.removeClass('dt-button');
			$("div.toolbar")
         .html('');

$("#myorder").show();
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
        className: 'dt-center'
    },
	{
        targets: 4,
        className: 'dt-center'

    },
	{
        targets: 5,
        className: 'dt-center'

    }
  ]


    });

	$('#material').DataTable({
      "paging": true,
	  "pageLength": 5,
	  "lengthMenu": [[5, 10, 20, -1], [5, 10, 20, "All"]],
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,




		dom: 'l<"toolbar">Bfrtip',
        buttons: [
          {
                extend:    'excelHtml5',
                text:      '<i style="float:right;" class="fas fa-download"></i>',
                titleAttr: 'Excel'
            }


        ],
		initComplete: function () {
            var btns = $('.dt-button');
            btns.addClass('btn btn-info');
            btns.removeClass('dt-button');
			$("div.toolbar")
         .html('');

$("#material").show();
        },
        select: {
            style:    'os',
            selector: 'td:first-child'
        },
        order: [[ 1, 'asc' ]],
		columnDefs: [
	{
        "targets": 0,
        className: 'dt-center'
    },
	{
        "targets": 1,
        "className": "dt-left"

    },
	{
        "targets": 2,
        className: 'dt-center'

    },
	{
        targets: 3,
        className: 'dt-center'
    },
	{
        targets: 4,
        className: 'dt-center'

    }
  ]


    });

	$('#approvals').DataTable({
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
          className: 'dt-center'
         },
		 {
        targets: 2,
		className: 'dt-center'
    },
			{
        targets: 3,
		className: 'dt-center'

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
    },
	{
        targets: 7,
		 "visible": false,
      "searchable": false
    },

      ],



		dom: 'l<"toolbar">Bfrtip',

        buttons: [
		     {
                extend:    'excelHtml5',
                text:      '<i style="float:right;" class="fas fa-download"></i>',
                titleAttr: 'Excel'
            },


        ],

		initComplete: function () {
            var btns = $('.dt-button');
            btns.addClass('btn btn-info');
            btns.removeClass('dt-button');







$("#approvals").show();
        },

		'select': {
         'style': 'multi',
		  info: false
      },
      'order': [[1, 'asc']]




    });

 $('#myticket').DataTable({
      "paging": true,
	  "pageLength": 5,
	  "lengthMenu": [[5, 10, 20, -1], [5, 10, 20, "All"]],
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,




		dom: 'l<"toolbar">Bfrtip',
        buttons: [
          {
                extend:    'excelHtml5',
                text:      '<i style="float:right;" class="fas fa-download"></i>',
                titleAttr: 'Excel'
            }


        ],
		initComplete: function () {
            var btns = $('.dt-button');
            btns.addClass('btn btn-info');
            btns.removeClass('dt-button');
			$("div.toolbar")
         .html('');

$("#myticket").show();
        },
        select: {
            style:    'os',
            selector: 'td:first-child'
        },
        order: [[ 1, 'asc' ]],
		columnDefs: [
	{
        "targets": 0,
        className: 'dt-center'
    },
	{
        "targets": 1,
        "className": "dt-left"

    },
	{
        "targets": 2,
        className: 'dt-center'

    },
	{
        targets: 3,
        className: 'dt-center'
    },
	{
        targets: 4,
        className: 'dt-center'

    },
	{
        targets: 5,
        className: 'dt-center'

    }
  ]


    });

	 $('#ticket').DataTable({
      "paging": true,
	  "pageLength": 5,
	  "lengthMenu": [[5, 10, 20, -1], [5, 10, 20, "All"]],
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,




		dom: 'l<"toolbar">Bfrtip',
        buttons: [
          {
                extend:    'excelHtml5',
                text:      '<i style="float:right;" class="fas fa-download"></i>',
                titleAttr: 'Excel'
            }


        ],
		initComplete: function () {
            var btns = $('.dt-button');
            btns.addClass('btn btn-info');
            btns.removeClass('dt-button');
			$("div.toolbar")
         .html('');

$("#ticket").show();
        },
        select: {
            style:    'os',
            selector: 'td:first-child'
        },
        order: [[ 1, 'asc' ]],
		columnDefs: [
	{
        "targets": 0,
        className: 'dt-center'
    },
	{
        "targets": 1,
        "className": "dt-left"

    },
	{
        "targets": 2,
        className: 'dt-center'

    },
	{
        targets: 3,
        className: 'dt-center'
    },
	{
        targets: 4,
        className: 'dt-center'

    },
	{
        targets: 5,
        className: 'dt-center'

    }
  ]


    });
$('#openticket').DataTable({
      "paging": true,
	  "pageLength": 5,
	  "lengthMenu": [[5, 10, 20, -1], [5, 10, 20, "All"]],
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,




		dom: 'l<"toolbar">Bfrtip',
        buttons: [
          {
                extend:    'excelHtml5',
                text:      '<i style="float:right;" class="fas fa-download"></i>',
                titleAttr: 'Excel'
            }


        ],
		initComplete: function () {
            var btns = $('.dt-button');
            btns.addClass('btn btn-info');
            btns.removeClass('dt-button');
			$("div.toolbar")
         .html('');

$("#openticket").show();
        },
        select: {
            style:    'os',
            selector: 'td:first-child'
        },
        order: [[ 1, 'asc' ]],
		columnDefs: [
	{
        "targets": 0,
        className: 'dt-center'
    },
	{
        "targets": 1,
        "className": "dt-left"

    },
	{
        "targets": 2,
        className: 'dt-center'

    },
	{
        targets: 3,
        className: 'dt-center'
    },
	{
        targets: 4,
        className: 'dt-center'

    },
	{
        targets: 5,
        className: 'dt-center'

    }
  ]


    });

$('#announcement-table').DataTable({
      "paging": true,
	  "pageLength": 5,
	  "lengthMenu": [[5, 10, 20, -1], [5, 10, 20, "All"]],
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,




		dom: 'l<"toolbar">Bfrtip',
        buttons: [
          {
                extend:    'excelHtml5',
                text:      '<i style="float:right;" class="fas fa-download"></i>',
                titleAttr: 'Excel'
            }


        ],
		initComplete: function () {
            var btns = $('.dt-button');
            btns.addClass('btn btn-info');
            btns.removeClass('dt-button');
			$("div.toolbar")
         .html('<a class="btn btn-info btn-sm" href="#" data-toggle="modal" data-target="#modal-default" title="Create"><i class="fas fa-user-plus"></i> Create</a>');

$("#announcement-table").show();
        },
        select: {
            style:    'os',
            selector: 'td:first-child'
        },
        order: [[ 1, 'asc' ]],
		columnDefs: [
	{
        "targets": 0,
        "className": "dt-center"
    },
	{
        "targets": 1

    },

	{
        targets: 2,
        "className": "dt-left"
    },
	{
        targets: 3,
        className: 'dt-center'

    },
	{
        targets: 4,
        className: 'dt-right'
    },
	{
        targets: 5,
        className: 'dt-right'
    },
	{
        targets: 6,
        className: 'dt-center'
    },
	{
        targets: 7,
        className: 'dt-center'
    }

  ]


    });

	$('#verify-table').DataTable({
      "paging": true,
	  "pageLength": 5,
	  "lengthMenu": [[5, 10, 20, -1], [5, 10, 20, "All"]],
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,




		dom: 'l<"toolbar">Bfrtip',
        buttons: [


        ],
		initComplete: function () {
            var btns = $('.dt-button');
            btns.addClass('btn btn-info');
            btns.removeClass('dt-button');

$("#verify-table").show();
        },
        select: {
            style:    'os',
            selector: 'td:first-child'
        },
        order: [[ 1, 'asc' ]],
		columnDefs: [
	{
        "targets": 0
    },
	{
        "targets": 1

    },

	{
        targets: 2,
        "className": "dt-left"
    },
	{
        targets: 3

    },
	{
        targets: 4,
        className: 'dt-right'
    },
	{
        targets: 5,
        className: 'dt-center'
    }

  ]


    });

$('#type-announcement').DataTable({
      "paging": true,
	  "pageLength": 5,
	  "lengthMenu": [[5, 10, 20, -1], [5, 10, 20, "All"]],
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,


        dom: 'l<"toolbar">Bfrtip',

        buttons: [
           {
                extend:    'excelHtml5',
                text:      '<i style="float:right;" class="fas fa-download"></i>',
                titleAttr: 'Excel'
            }


        ],


        initComplete: function () {
            var btns = $('.dt-button');
            btns.addClass('btn btn-info');
            btns.removeClass('dt-button');
             $("div.toolbar")
         .html('<a class="btn btn-info btn-sm" href="#" data-toggle="modal" data-target="#modal-default"><i class="fas fa-user-plus"></i>Create </a>');

 $("#type-announcement").show();
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
          "className": "dt-center"
      },
	  {
         "targets": 2,
          "className": "dt-center"
      }
	]
 // 	{
 //         targets: 2,
 //         className: 'dt-right',
 // 		"width": "80px"
 //     },
 // 	{
 //         targets: 3,
 //         className: 'dt-right'
 //     },
 // 	{
 //         targets: 4,
 //         className: 'dt-center'
 //     },
 // 	{
 //         targets: 5,
 //         className: 'dt-center'
 //     }
 //   ]

    });

	$('#myan').DataTable({
      "paging": true,
	  "pageLength": 5,
	  "lengthMenu": [[5, 10, 20, -1], [5, 10, 20, "All"]],
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,




		dom: 'l<"toolbar">Bfrtip',
        buttons: [
          {
                extend:    'excelHtml5',
                text:      '<i style="float:right;" class="fas fa-download"></i>',
                titleAttr: 'Excel'
            }


        ],
		initComplete: function () {
            var btns = $('.dt-button');
            btns.addClass('btn btn-info');
            btns.removeClass('dt-button');
			$("div.toolbar")
         .html('');
$("#myan").show();
        },
        select: {
            style:    'os',
            selector: 'td:first-child'
        },
        order: [[ 1, 'asc' ]],
		columnDefs: [
	{
        "targets": 0,
        "className": "dt-center"
    },
	{
        "targets": 1

    },

	{
        targets: 2,
        "className": "dt-left"
    },
	{
        targets: 3,
        className: 'dt-center'

    },
	{
        targets: 4,
        className: 'dt-right'
    },
	{
        targets: 5,
        className: 'dt-right'
    },
	{
        targets: 6,
        className: 'dt-center'
    },
	{
        targets: 7,
        className: 'dt-center'
    }

  ]


    });

	var tabl;
  tabl = $('#mycustomer').DataTable({
      "paging": true,
	  "pageLength": 5,
	  "lengthMenu": [[5, 10, 20, -1], [5, 10, 20, "All"]],
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,


	  columnDefs: [ {
            targets:   0,
            className: 'dt-center'


        },

      {   "targets": 1},
      {  "targets": 2,  className: 'dt-center'},
      { "targets": 3, className: 'dt-center'},
      {  "targets": 4, className: 'dt-right'},
    {  "targets": 5,  className: 'dt-center'}

	  	  ],
		  dom: 'l<"toolbar">Bfrtip',

        buttons: [
           {
                extend:    'excelHtml5',
                text:      '<i style="float:right;" class="fas fa-download"></i>',
                titleAttr: 'Excel'
            }


        ],


		initComplete: function () {
            var btns = $('.dt-button');
            btns.addClass('btn btn-info');
            btns.removeClass('dt-button');
			$("#mycustomer").show();
		},

        select: {
            style:    'os',
            selector: 'td:first-child'
        },
        order: [[ 1, 'asc' ]],



    });
let barGraphy;
	$('#mycustomer').on( 'click', 'tr', function () {
	var id = tabl.row( this ).id();
    var res = id.split("_");
	var mycutomer = res[0];
	var code = res[1];


    function grab() {
        /* Promise to make sure data loads */
        return new Promise((resolve, reject) => {
            $.ajax({
                url: '/mycutomer/'+ mycutomer + '/' + code,
				 type: 'get',
				 dataType: 'json',
                success: function(data) {
                    resolve(data)
                },
                error: function(error) {
                    reject(error);
                }
            })
        })
    }

    $(document).ready(function() {
        grab().then((data) => {
            //console.log('Recieved our data', data);
            let regions = [];
            let value = [];
			len = data['data'].length;

            try {
				if(len > 0){
              for(var i=0; i<len; i++){
				regions.push(Math.abs(data['data'][i].UPTO30_DAYS))
				regions.push(Math.abs(data['data'][i].UPTO60_DAYS))
				regions.push(Math.abs(data['data'][i].UPTO90_DAYS))
				regions.push(Math.abs(data['data'][i].UPTO120_DAYS))
				regions.push(Math.abs(data['data'][i].UPTO180_DAYS))
				regions.push(Math.abs(data['data'][i].ABOVE180_DAYS))
              }
           }


                let chartdata = {
                    labels: ["0-30 Days", "31-60 Days", "61-90 Days", "91-120 Days", "121-180 Days", "> 180 Days"],
                    datasets: [{
                        label: 'Ageing',
                        backgroundColor: [
        'rgba(255, 99, 132, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(255, 206, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(153, 102, 255, 0.2)',
        'rgba(255, 159, 64, 0.2)',
        'rgba(255, 99, 132, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(255, 206, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(153, 102, 255, 0.2)',
        'rgba(255, 159, 64, 0.2)'
      ],
      borderColor: [
        'rgba(255,99,132,1)',
        'rgba(54, 162, 235, 1)',
        'rgba(255, 206, 86, 1)',
        'rgba(75, 192, 192, 1)',
        'rgba(153, 102, 255, 1)',
        'rgba(255, 159, 64, 1)',
        'rgba(255,99,132,1)',
        'rgba(54, 162, 235, 1)',
        'rgba(255, 206, 86, 1)',
        'rgba(75, 192, 192, 1)',
        'rgba(153, 102, 255, 1)',
        'rgba(255, 159, 64, 1)'
      ],
      borderWidth: 1,
                        hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
                        hoverBorderColor: 'rgba(200, 200, 200, 1)',
                        data: [...regions]
                    }]
                };

                let ctx = $("#Chart");

                barGraphy = new Chart(ctx, {
                    type: 'bar',
                    data: chartdata
                });

            } catch (error) {
                console.log('Error parsing JSON data', error)
            }

        }).catch((error) => {
            console.log(error);
        })
		barGraphy.destroy();
    });



});

var tab;
  tab = $('#customer').DataTable({
      "paging": true,
	  "pageLength": 5,
	  "lengthMenu": [[5, 10, 20, -1], [5, 10, 20, "All"]],
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,


	  columnDefs: [ {
            targets:   0,
            className: 'dt-center'


        },

      {   "targets": 1},
      {  "targets": 2,  className: 'dt-center'},
      { "targets": 3, className: 'dt-center'},
      {  "targets": 4, className: 'dt-right'},
    {  "targets": 5,  className: 'dt-center'},
    {  "targets": 6,  className: 'dt-center'}

	  	  ],
		  dom: 'l<"toolbar">Bfrtip',

        buttons: [
           {
                extend:    'excelHtml5',
                text:      '<i style="float:right;" class="fas fa-download"></i>',
                titleAttr: 'Excel'
            }


        ],


		initComplete: function () {
            var btns = $('.dt-button');
            btns.addClass('btn btn-info');
            btns.removeClass('dt-button');



			$("#customer").show();
		},

        select: {
            style:    'os',
            selector: 'td:first-child'
        },
        order: [[ 1, 'asc' ]],



    });

let barGraph;

	$('#customer').on( 'click', 'tr', function () {
	var id = tab.row( this ).id();
    var res = id.split("_");
	var cus = res[0];
	var code = res[1];


    function grab() {
        /* Promise to make sure data loads */
        return new Promise((resolve, reject) => {
            $.ajax({
                url: '/customer/'+ cus +'/' + code,
				 type: 'get',
				 dataType: 'json',
                success: function(data) {
                    resolve(data)
                },
                error: function(error) {
                    reject(error);
                }
            })
        })
    }

    $(document).ready(function() {
        grab().then((data) => {
            //console.log('Recieved our data', data);
            let regions = [];
            let value = [];
			len = data['data'].length;

            try {
				if(len > 0){
              for(var i=0; i<len; i++){

				regions.push(Math.abs(data['data'][i].UPTO30_DAYS))
				regions.push(Math.abs(data['data'][i].UPTO60_DAYS))
				regions.push(Math.abs(data['data'][i].UPTO90_DAYS))
				regions.push(Math.abs(data['data'][i].UPTO120_DAYS))
				regions.push(Math.abs(data['data'][i].UPTO180_DAYS))
				regions.push(Math.abs(data['data'][i].ABOVE180_DAYS))
              }
           }


                let chartdata = {
                    labels: ["0-30 Days", "31-60 Days", "61-90 Days", "91-120 Days", "121-180 Days", "> 180 Days"],
                    datasets: [{
                        label: 'Ageing',
                        backgroundColor: [
        'rgba(255, 99, 132, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(255, 206, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(153, 102, 255, 0.2)',
        'rgba(255, 159, 64, 0.2)',
        'rgba(255, 99, 132, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(255, 206, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(153, 102, 255, 0.2)',
        'rgba(255, 159, 64, 0.2)'
      ],
      borderColor: [
        'rgba(255,99,132,1)',
        'rgba(54, 162, 235, 1)',
        'rgba(255, 206, 86, 1)',
        'rgba(75, 192, 192, 1)',
        'rgba(153, 102, 255, 1)',
        'rgba(255, 159, 64, 1)',
        'rgba(255,99,132,1)',
        'rgba(54, 162, 235, 1)',
        'rgba(255, 206, 86, 1)',
        'rgba(75, 192, 192, 1)',
        'rgba(153, 102, 255, 1)',
        'rgba(255, 159, 64, 1)'
      ],
      borderWidth: 1,
                        hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
                        hoverBorderColor: 'rgba(200, 200, 200, 1)',
                        data: [...regions]
                    }]
                };

                let ctx = $("#Charts");

                 barGraph = new Chart(ctx, {
                    type: 'bar',
                    data: chartdata
                });



            } catch (error) {
                console.log('Error parsing JSON data', error)
            }

        }).catch((error) => {
            console.log(error);
        })
		barGraph.destroy();
    });



});





var ta;
    ta = $('#employee').DataTable({
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
            'targets': 0,
            'checkboxes': {
               'selectRow': true
            }
         },

      {  "targets": 1 },
      { "targets": 2 },
      { "targets": 3},
      {  "targets": 4, className: 'dt-center'},
	  {  "targets": 5, className: 'dt-center'},
	  { "targets": 6, className: 'dt-center'},
	  { "targets": 7, "visible": false, "searchable": false},
	  { "targets": 8, "visible": false, "searchable": false}

	  	  ],

		dom: 'l<"toolbar">Bfrtip',

        buttons: [
		     {
                extend:    'excelHtml5',
                text:      '<i style="float:right;" class="fas fa-download"></i>',
                titleAttr: 'Excel'
            },


        ],

		initComplete: function () {
            var btns = $('.dt-button');
            btns.addClass('btn btn-info');
            btns.removeClass('dt-button');
			$("div.toolbar")
          .html('<div class="btn-group"><button type="button" class="btn btn-info btn-sm" title="Activate">Action</button><button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown"><div class="dropdown-menu" role="menu"><a class="dropdown-item" id="btnSelectedRows">Activate</a><div class="dropdown-divider"></div><a class="dropdown-item" id="btnSelectedRow">Deactivate</a></div></button></div>');

$('#btnSelectedRows').on('click', function() {

var emp = ta.rows( { selected: true } ).data().pluck(7).toArray();
var flag = ta.row( { selected: true } ).data()[8];
var flags = ta.rows( { selected: true } ).data().pluck(8).toArray();
const Toast = Swal.mixin({ toast: true, position: 'top-end', showConfirmButton: false, timer: 3000 });

//const allEqual = arr => arr.every(val => val === arr[0]);
function checkFlag(valueFlag) {
  return valueFlag == 0;
}

      if (flags.every(checkFlag)) {

 $.ajax({
	  type: 'POST',
	  url: "{{ route('adminn.store') }}",
	  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  },
	  data:{emp:emp, flag:flag},
	  success:function(data){
              //alert(data.success);
			   toastr.success('Activated Successfully')
			  location.reload();
           }
});
}
else {

		  toastr.warning('Select only deactivated values')

	  }

});

$('#btnSelectedRow').on('click', function() {

var emp = ta.rows( { selected: true } ).data().pluck(7).toArray();
var flag = ta.row( { selected: true } ).data()[8];
var flags = ta.rows( { selected: true } ).data().pluck(8).toArray();
const Toast = Swal.mixin({ toast: true, position: 'top-end', showConfirmButton: false, timer: 3000 });

//const allEqual = arr => arr.every(val => val === arr[0]);
function checkFlag(valueFlag) {
  return valueFlag == 1;
}

      if (flags.every(checkFlag)) {

 $.ajax({
	  type: 'POST',
	  url: "{{ route('adminn.store') }}",
	  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  },
	  data:{emp:emp, flag:flag},
	  success:function(data){
              //alert(data.success);
			   toastr.success('Deactivated Successfully')
			  location.reload();
           }
});
}
else {

		  toastr.warning('Select only activated values')

	  }

});
$("#employee").show();
        },
        'select': {
         'style': 'multi',
		 info: false
      },
      'order': [[1, 'asc']]


    });





  });

</script>
<script>
  $(function () {
      $("body").on("click", ".view_data", function(event){
           var code = $(this).attr("id");

		   var vals = document.getElementById(code).getAttribute("value");

			var obj = JSON.parse(vals);
			//alert(vals);
			var ownership;
			var vehicle_type;

			if(obj.VEHICLE_OWNERSHIP == 1) {
				ownership = "Company";
			}
			else if(obj.VEHICLE_OWNERSHIP == 2){
				ownership = "Self";
			}
			else{
				ownership = "None";
			}

			if(obj.VEHICLE_TYPE == 1) {
				vehicle_type = "Car";
			}
			else if(obj.VEHICLE_TYPE == 2){
				vehicle_type = "Motorcycle";
			}
			else{
				vehicle_type = "None";
			}
			 let arr = [];
			for(var i=0; i<obj.REGION.length; i++){
			arr.push(obj.REGION[i].REGION_NAME);
			}

			$('#emp_Id').val(obj.EMP_ID);
			$('#employees_id').val(obj.EMP_ID);
			$('#emp_name').val(obj.EMP_NAME);
			$('#emp_email').val(obj.EMP_EMAIL);
			$('#emp_mobile').val(obj.EMP_MOBILE_NO);
			$('#rep_mgr').val(obj.REPORTING_MANAGEER_NAME);
			$('#emp_area').val(obj.AREA_NAME);
			$('#emp_region').val(arr);
			$('#emp_level').val(obj.LEVEL_ID);
			$('#emp_approver').val(obj.APPROVER_NAME);
			$('#emp_plant').val(obj.PLANT_NAME);
			$('#ownership').val(obj.VEHICLE_OWNERSHIP);
			$('#vehicle_type').val(obj.VEHICLE_TYPE);

           // alert ($('#rep_mgr').select2());
            $("#rep_mgr").select2();
            $("#emp_approver").select2();
			$("#ownership").select2();
			$("#vehicle_type").select2();
                    $('.dataModal').modal("show");

      });

	  $('#employee_form').on("submit", function(event){
event.preventDefault();
var empss = document.getElementById("employees_id").value;
var editemp = 9;
var ownership = document.getElementById("ownership").value;
var vehicle_type = document.getElementById("vehicle_type").value;
var rep_mgr = document.getElementById("rep_mgr").value;
var emp_approver = document.getElementById("emp_approver").value;

$.ajax({
	  type: 'POST',
	  url: '/empss/' + empss + '/' + editemp,
	  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  },
	  data:{'_method':'PUT', ownership:ownership, vehicle_type:vehicle_type, rep_mgr:rep_mgr, emp_approver:emp_approver },
	  success:function(data){
              //alert(data.success);

			  toastr.success('Employee Updated Successfully')

			  location.reload();

           }
});


});

	 $("body").on("click", ".login_details", function(event){
          var emplo = $(this).attr("id");
		var rez = emplo.split("_");
		var empss = rez[0];
		var code = rez[1];

	$.ajax({
         url: '/empss/' + empss + '/' + code,
         type: 'get',
         dataType: 'json',
         success: function(response){

           var len = 0;


           if(response['data'] != null){
              len = response['data'].length;
           }

           if(len > 0){
			   var login_row = "";
			 var login_header =   '<div class="card-body"><div class="table-responsive"><table class="login_details table table-bordered table-hover"><thead><tr><th>Login Time</th><th class="text-center">App Version</th><th>Device Type</th><th class="text-center">Device Model</th><th class="text-right">Logout Time</th></tr></thead><tbody>';
              for(var i=0; i<len; i++){
                 var LOGIN_TIME = response['data'][i].LOGIN_TIME;
				 var APP_VERSION = response['data'][i].APP_VERSION;
				 var DEVICE_TYPE = response['data'][i].DEVICE_TYPE;
				 var DEVICE_MODEL = response['data'][i].DEVICE_MODEL;
				 var LOGOUT_TIME = response['data'][i].LOGOUT_TIME;
				var device_icon;

				//alert(TRANSACTION_ID);
				 if(DEVICE_TYPE == "Desktop") {
					device_icon = '<div class="text-primary text-sm" title="Screen\Desktop"><i class="fas fa-desktop"></i></div>';
				 }
				 else {
					 device_icon = '<div class="text-secondary text-sm" title="Module\Mobile"><i class="fas fa-mobile-alt"></i></div>';
				 }
				login_row = login_row.concat('<tr><td>'+LOGIN_TIME+'</td><td class="project-state text-center">'+APP_VERSION+'</td><td><div class="row">&nbsp;&nbsp;&nbsp;&nbsp;'+DEVICE_TYPE+'&nbsp;&nbsp;&nbsp;'+device_icon+'</div></td><td class="text-center">'+DEVICE_MODEL+'</td><td class="text-right">'+LOGOUT_TIME+'</td></tr>');


              }
			  var login_tail = '</tbody></table></div></div>';
			  var login_info = login_header.concat(login_row).concat(login_tail);
			    $('#login_detail').html(login_info);

          $('#logins').modal("show");
           }
		   else {
			   toastr.warning("No records found")
			   $('#logins').modal("hide");
		   }

					 $('table.login_details').DataTable({
      "paging": true,
	  "pageLength": 4,
	  "lengthMenu": [[4, 10, -1], [4, 10, "All"]],
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
	  destroy: true,

	   "order": [[ 4, "desc" ]]


    });

         }

       });


      });

	  $("body").on("click", ".orders", function(event){
          var or = $(this).attr("id");
		var rezz = or.split("_");
		var asale = rezz[0];
		var code = rezz[1];
		var rid = rezz[2];

		$('#total_val').html(code);

	$.ajax({
         url: '/asales/' + asale + '/' + rid,
         type: 'get',
         dataType: 'json',
         success: function(response){

           var len = 0;


           if(response['data'] != null){
              len = response['data'].length;
           }

           if(len > 0){
			   var order_row = "";
			 var order_header =  '<div class="card-body"><div class="table-responsive"><table class="order_details table table-bordered table-hover"><thead><tr><th>Code</th><th>Description</th><th class="text-center">Quantity</th><th class="text-center">Price</th><th class="text-center">Total</th></tr></thead><tbody>';
              for(var i=0; i<len; i++){
                 var SKU_ID = response['data'][i].SKU_ID;
				 var SKU_DESCRIPTION = response['data'][i].SKU_DESCRIPTION;
				 var SKU_QUANTITY = response['data'][i].SKU_QUANTITY;
				 var PRICE = response['data'][i].PRICE;
				 var TOTAL_SKU_VALUE = response['data'][i].TOTAL_SKU_VALUE;


				//alert(TRANSACTION_ID);

				order_row = order_row.concat('<tr><td>'+SKU_ID+'</td><td>'+SKU_DESCRIPTION+'</td><td class="text-center">'+SKU_QUANTITY+'</td><td class="text-center">'+PRICE+'</td><td class="text-center">'+TOTAL_SKU_VALUE+'</td></tr>');


              }
			  var order_tail = '</tbody></table></div></div>';
			  var order_info = order_header.concat(order_row).concat(order_tail);
			    $('#order_detail').html(order_info);

          $('#orders').modal("show");
           }
		   else {
			   toastr.warning("No records found")
			   $('#orders').modal("hide");
		   }

					 $('table.order_details').DataTable({
      "paging": true,
	  "pageLength": 4,
	  "lengthMenu": [[4, 10, -1], [4, 10, "All"]],
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
	  destroy: true,


    });

         }

       });


      });

	   $("body").on("click", "#mark_zero_claim", function(event){
	   var x = document.getElementById("create_claim");
	   var y = document.getElementById("mark_claim");
		  if (x.style.display === "none" && y.style.display === "block") {
			x.style.display = "block";
			y.style.display = "none";

		  } else {
			x.style.display = "none";
			y.style.display = "block";
		  }
	   //$("#main").css("display", "none");
	   });

	   $("body").on("click", "#assigned_regions", function(event){
	   var x = document.getElementById("assign_region");
	   var y = document.getElementById("non_assigned_user");
		  if (x.style.display === "none" && y.style.display === "block") {
			x.style.display = "block";
			y.style.display = "none";

		  } else {
			x.style.display = "none";
			y.style.display = "block";
		  }
	   //$("#main").css("display", "none");
	   });

	   $("body").on("click", "#assigned_roles", function(event){
	   var x = document.getElementById("assigned_role");
	   var y = document.getElementById("non_assigned_role");
		  if (x.style.display === "none" && y.style.display === "block") {
			x.style.display = "block";
			y.style.display = "none";

		  } else {
			x.style.display = "none";
			y.style.display = "block";
		  }
	   //$("#main").css("display", "none");
	   });

	   $("body").on("click", "#verified_user", function(event){
	   var x = document.getElementById("non_user");
	   var y = document.getElementById("user");
		  if (x.style.display === "none" && y.style.display === "block") {
			x.style.display = "block";
			y.style.display = "none";

		  } else {
			x.style.display = "none";
			y.style.display = "block";
		  }
	   //$("#main").css("display", "none");
	   });



	   $("body").on("click", ".reorders", function(event){
          var or = $(this).attr("id");
		var rezz = or.split("_");
		var regionorder = rezz[0];
		var code = rezz[1];
		var rid = rezz[2];

		$('#total_val').html(code);

	$.ajax({
         url: '/regionorder/' + regionorder + '/' + rid,
         type: 'get',
         dataType: 'json',
         success: function(response){

           var len = 0;


           if(response['data'] != null){
              len = response['data'].length;
           }

           if(len > 0){
			   var order_row = "";
			 var order_header =  '<div class="card-body"><div class="table-responsive"><table class="reorder_details table table-bordered table-hover"><thead><tr><th>Code</th><th>Description</th><th class="text-center">Quantity</th><th class="text-center">Price</th><th class="text-center">Total</th></tr></thead><tbody>';
              for(var i=0; i<len; i++){
                 var SKU_ID = response['data'][i].SKU_ID;
				 var SKU_DESCRIPTION = response['data'][i].SKU_DESCRIPTION;
				 var SKU_QUANTITY = response['data'][i].SKU_QUANTITY;
				 var PRICE = response['data'][i].PRICE;
				 var TOTAL_SKU_VALUE = response['data'][i].TOTAL_SKU_VALUE;


				//alert(TRANSACTION_ID);

				order_row = order_row.concat('<tr><td>'+SKU_ID+'</td><td>'+SKU_DESCRIPTION+'</td><td class="text-center">'+SKU_QUANTITY+'</td><td class="text-center">'+PRICE+'</td><td class="text-center">'+TOTAL_SKU_VALUE+'</td></tr>');


              }
			  var order_tail = '</tbody></table></div></div>';
			  var order_info = order_header.concat(order_row).concat(order_tail);
			    $('#order_detail').html(order_info);

          $('#reorders').modal("show");
           }
		   else {
			   toastr.warning("No records found")
			   $('#reorders').modal("hide");
		   }

					 $('table.reorder_details').DataTable({
      "paging": true,
	  "pageLength": 4,
	  "lengthMenu": [[4, 10, -1], [4, 10, "All"]],
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
	  destroy: true,


    });

         }

       });


      });

	  $("body").on("click", ".depoorders", function(event){
          var or = $(this).attr("id");
		var rezz = or.split("_");
		var depotorder = rezz[0];
		var code = rezz[1];
		var rid = rezz[2];

		$('#total_val').html(code);

	$.ajax({
         url: '/depotorder/' + depotorder + '/' + rid,
         type: 'get',
         dataType: 'json',
         success: function(response){

           var len = 0;


           if(response['data'] != null){
              len = response['data'].length;
           }

           if(len > 0){
			   var order_row = "";
			 var order_header =  '<div class="card-body"><div class="table-responsive"><table class="reorder_details table table-bordered table-hover"><thead><tr><th>Code</th><th>Description</th><th class="text-center">Quantity</th><th class="text-center">Price</th><th class="text-center">Total</th></tr></thead><tbody>';
              for(var i=0; i<len; i++){
                 var SKU_ID = response['data'][i].SKU_ID;
				 var SKU_DESCRIPTION = response['data'][i].SKU_DESCRIPTION;
				 var SKU_QUANTITY = response['data'][i].SKU_QUANTITY;
				 var PRICE = response['data'][i].PRICE;
				 var TOTAL_SKU_VALUE = response['data'][i].TOTAL_SKU_VALUE;


				//alert(TRANSACTION_ID);

				order_row = order_row.concat('<tr><td>'+SKU_ID+'</td><td>'+SKU_DESCRIPTION+'</td><td class="text-center">'+SKU_QUANTITY+'</td><td class="text-center">'+PRICE+'</td><td class="text-center">'+TOTAL_SKU_VALUE+'</td></tr>');


              }
			  var order_tail = '</tbody></table></div></div>';
			  var order_info = order_header.concat(order_row).concat(order_tail);
			    $('#deorder_detail').html(order_info);

          $('#deorders').modal("show");
           }
		   else {
			   toastr.warning("No records found")
			   $('#deorders').modal("hide");
		   }

					 $('table.reorder_details').DataTable({
      "paging": true,
	  "pageLength": 4,
	  "lengthMenu": [[4, 10, -1], [4, 10, "All"]],
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
	  destroy: true,


    });

         }

       });


      });

	   $("body").on("click", ".myorders", function(event){
          var orr = $(this).attr("id");
		var rezy = orr.split("_");
		var myorder = rezy[0];
		var codes = rezy[1];
		var rid = rezy[2];

		$('#total_vals').html(codes);

	$.ajax({
         url: '/myorder/' + myorder + '/' + rid,
         type: 'get',
         dataType: 'json',
         success: function(response){

           var len = 0;


           if(response['data'] != null){
              len = response['data'].length;
           }

           if(len > 0){
			   var myorder_row = "";
			 var myorder_header =  '<div class="card-body"><div class="table-responsive"><table class="myorder_details table table-bordered table-hover"><thead><tr><th>Code</th><th>Description</th><th class="text-center">Quantity</th><th class="text-center">Price</th><th class="text-center">Total</th></tr></thead><tbody>';
              for(var i=0; i<len; i++){
                 var SKU_ID = response['data'][i].SKU_ID;
				 var SKU_DESCRIPTION = response['data'][i].SKU_DESCRIPTION;
				 var SKU_QUANTITY = response['data'][i].SKU_QUANTITY;
				 var PRICE = response['data'][i].PRICE;
				 var TOTAL_SKU_VALUE = response['data'][i].TOTAL_SKU_VALUE;


				//alert(TRANSACTION_ID);

				myorder_row = myorder_row.concat('<tr><td>'+SKU_ID+'</td><td>'+SKU_DESCRIPTION+'</td><td class="text-center">'+SKU_QUANTITY+'</td><td class="text-center">'+PRICE+'</td><td class="text-center">'+TOTAL_SKU_VALUE+'</td></tr>');


              }
			  var myorder_tail = '</tbody></table></div></div>';
			  var myorder_info = myorder_header.concat(myorder_row).concat(myorder_tail);
			    $('#myorder_detail').html(myorder_info);

          $('#myorders').modal("show");
           }
		   else {
			   toastr.warning("No records found")
			   $('#myorders').modal("hide");
		   }

					 $('table.myorder_details').DataTable({
      "paging": true,
	  "pageLength": 4,
	  "lengthMenu": [[4, 10, -1], [4, 10, "All"]],
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
	  destroy: true,


    });

         }

       });


      });


	   $("body").on("click", ".ap", function(event){

   var approved_claim = $(this).attr("id");
		var approved_claim_split = approved_claim.split("_");
		var approveclaim = approved_claim_split[0];
		var start_date = approved_claim_split[1];
		var end_date = approved_claim_split[2];
		var status = approved_claim_split[3];

		$.ajax({
         url: '/approveclaim/' + approveclaim + '/' + start_date + '/' + end_date + '/' + status,
         type: 'get',
         dataType: 'json',
         success: function(response){
			  var len = 0;


           if(response['data'] != null){
              len = response['data'].length;
           }

		    if(len > 0){
				var approve_row = "";
			var approve_header =  '<div class="card-body"><div class="tab-content" id="custom-tabs-one-tabContent"><div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab"><table class="approves table table-bordered table-hover"><thead><tr><th>Travel</th><th>Daily Allowance</th><th>Internet</th><th>Hotel</th><th>Stationary</th><th>Misc</th><th class="text-center">Date</th><th class="text-center">Status</th></tr></thead><tbody>';

			   for(var i=0; i<len; i++){
                 var EXP_BUS_TRAIN = response['data'][i].EXP_BUS_TRAIN;
				 var EXP_TAXI_AUTO = response['data'][i].EXP_TAXI_AUTO;
				 var EXP_HOTEL = response['data'][i].EXP_HOTEL;
				 var EXP_STATIONARY = response['data'][i].EXP_STATIONARY;
				 var EXP_MOBILE_INTERNET = response['data'][i].EXP_MOBILE_INTERNET;
				 var DA_RATES_LOCAL = response['data'][i].DA_RATES_LOCAL;
				 var DA_RATES_OUTST = response['data'][i].DA_RATES_OUTST;
				 var EXP_PLANE = response['data'][i].EXP_PLANE;
				 var EXP_VEH_REPAIR = response['data'][i].EXP_VEH_REPAIR;
				 var EXP_MISC = response['data'][i].EXP_MISC;
				 var CLAIM_DATE = response['data'][i].CLAIM_DATE;
				 var EXP_FUEL = response['data'][i].EXP_FUEL;
				 var APPROVAL_STATUS = response['data'][i].APPROVAL_STATUS;

				 var date = new Date(CLAIM_DATE);
				  var claim_date = date.toLocaleDateString();
				 approve_row = approve_row.concat('<tr><td class="text-center"><div class="row"><small><nav class="navbar"><a class="d-flex flex-column"><span class="badge badge-secondary">'+EXP_TAXI_AUTO+'</span><i class="fas fa-taxi text-success"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="d-flex flex-column"><span class="badge badge-secondary">'+EXP_BUS_TRAIN+'</span><i class="fas fa-bus text-maroon"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="d-flex flex-column"><span class="badge badge-secondary">'+EXP_PLANE+'</span><i class="fas fa-plane text-indigo"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="d-flex flex-column"><span class="badge badge-secondary">'+EXP_FUEL+'</span><i class="fas fa-gas-pump text-pink"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="d-flex flex-column"><span class="badge badge-secondary">'+EXP_VEH_REPAIR+'</span><i class="fas fa-tools text-lime"></i></a></nav></small></div></td><td class="text-center"><div class="row"> <small><nav class="navbar"><a class="d-flex flex-column"><span class="badge badge-secondary">'+DA_RATES_LOCAL+'</span><i class="fas fa-map-marker-alt text-fuchsia"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="d-flex flex-column"><span class="badge badge-secondary">'+DA_RATES_OUTST+'</span><i class="fas fa-route text-primary"></i></a></nav></small></div></td><td class="text-center"><div class="row"> <small><nav class="navbar"><a class="d-flex flex-column"><span class="badge badge-secondary">'+EXP_MOBILE_INTERNET+'</span><i class="fas fa-wifi text-orange"></i></a></nav></small></div></td><td class="text-center"><div class="row"> <small><nav class="navbar"><a class="d-flex flex-column"><span class="badge badge-secondary">'+EXP_HOTEL+'</span><i class="fas fa-hotel text-purple"></i></a></nav></small></div></td><td class="text-center"><div class="row"> <small><nav class="navbar"><a class="d-flex flex-column"><span class="badge badge-secondary">'+EXP_STATIONARY+'</span><i class="fas fa-mobile-alt text-info"></i></a></nav></small></div></td><td class="text-center"><div class="row"> <small><nav class="navbar"><a class="d-flex flex-column"><span class="badge badge-secondary">'+EXP_MISC+'</span><i class="fab fa-medium-m text-secondary"></i></a></nav></small></div></td><td class="text-center">'+claim_date+'</td><td class="text-center"><span class="badge badge-success">Approved</span></td></tr>');


              }

			   var approve_tail = '</tbody></table></div></div></div>';
			  var approve_info = approve_header.concat(approve_row).concat(approve_tail);
			    $('#approve_detail').html(approve_info);

          $('#approves').modal("show");

           }
		   else {
			   toastr.warning("No records found")
			   $('#approves').modal("hide");
		   }

					 $('table.approves').DataTable({
      "paging": true,
	  "pageLength": 4,
	  "lengthMenu": [[4, 10, -1], [4, 10, "All"]],
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
	  destroy: true,
    });


		 }

		});

      });

	  $("body").on("click", ".rejected", function(event){

   var approved_claim = $(this).attr("id");
		var approved_claim_split = approved_claim.split("_");
		var approveclaim = approved_claim_split[0];
		var start_date = approved_claim_split[1];
		var end_date = approved_claim_split[2];
		var status = approved_claim_split[3];

		$.ajax({
         url: '/approveclaim/' + approveclaim + '/' + start_date + '/' + end_date + '/' + status,
         type: 'get',
         dataType: 'json',
         success: function(response){
			  var len = 0;


           if(response['data'] != null){
              len = response['data'].length;
           }

		    if(len > 0){
				var approve_row = "";
			var approve_header =  '<div class="card-body"><div class="tab-content" id="custom-tabs-one-tabContent"><div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab"><table class="reject table table-bordered table-hover"><thead><tr><th>Travel</th><th>Daily Allowance</th><th>Internet</th><th>Hotel</th><th>Stationary</th><th>Misc</th><th class="text-center">Date</th><th class="text-center">Status</th></tr></thead><tbody>';

			   for(var i=0; i<len; i++){
                 var EXP_BUS_TRAIN = response['data'][i].EXP_BUS_TRAIN;
				 var EXP_TAXI_AUTO = response['data'][i].EXP_TAXI_AUTO;
				 var EXP_HOTEL = response['data'][i].EXP_HOTEL;
				 var EXP_STATIONARY = response['data'][i].EXP_STATIONARY;
				 var EXP_MOBILE_INTERNET = response['data'][i].EXP_MOBILE_INTERNET;
				 var DA_RATES_LOCAL = response['data'][i].DA_RATES_LOCAL;
				 var DA_RATES_OUTST = response['data'][i].DA_RATES_OUTST;
				 var EXP_PLANE = response['data'][i].EXP_PLANE;
				 var EXP_VEH_REPAIR = response['data'][i].EXP_VEH_REPAIR;
				 var EXP_MISC = response['data'][i].EXP_MISC;
				 var CLAIM_DATE = response['data'][i].CLAIM_DATE;
				 var EXP_FUEL = response['data'][i].EXP_FUEL;
				 var APPROVAL_STATUS = response['data'][i].APPROVAL_STATUS;

				 var date = new Date(CLAIM_DATE);
				  var claim_date = date.toLocaleDateString();
				 approve_row = approve_row.concat('<tr><td class="text-center"><div class="row"><small><nav class="navbar"><a class="d-flex flex-column"><span class="badge badge-secondary">'+EXP_TAXI_AUTO+'</span><i class="fas fa-taxi text-success"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="d-flex flex-column"><span class="badge badge-secondary">'+EXP_BUS_TRAIN+'</span><i class="fas fa-bus text-maroon"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="d-flex flex-column"><span class="badge badge-secondary">'+EXP_PLANE+'</span><i class="fas fa-plane text-indigo"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="d-flex flex-column"><span class="badge badge-secondary">'+EXP_FUEL+'</span><i class="fas fa-gas-pump text-pink"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="d-flex flex-column"><span class="badge badge-secondary">'+EXP_VEH_REPAIR+'</span><i class="fas fa-tools text-lime"></i></a></nav></small></div></td><td class="text-center"><div class="row"> <small><nav class="navbar"><a class="d-flex flex-column"><span class="badge badge-secondary">'+DA_RATES_LOCAL+'</span><i class="fas fa-map-marker-alt text-fuchsia"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="d-flex flex-column"><span class="badge badge-secondary">'+DA_RATES_OUTST+'</span><i class="fas fa-route text-primary"></i></a></nav></small></div></td><td class="text-center"><div class="row"> <small><nav class="navbar"><a class="d-flex flex-column"><span class="badge badge-secondary">'+EXP_MOBILE_INTERNET+'</span><i class="fas fa-wifi text-orange"></i></a></nav></small></div></td><td class="text-center"><div class="row"> <small><nav class="navbar"><a class="d-flex flex-column"><span class="badge badge-secondary">'+EXP_HOTEL+'</span><i class="fas fa-hotel text-purple"></i></a></nav></small></div></td><td class="text-center"><div class="row"> <small><nav class="navbar"><a class="d-flex flex-column"><span class="badge badge-secondary">'+EXP_STATIONARY+'</span><i class="fas fa-mobile-alt text-info"></i></a></nav></small></div></td><td class="text-center"><div class="row"> <small><nav class="navbar"><a class="d-flex flex-column"><span class="badge badge-secondary">'+EXP_MISC+'</span><i class="fab fa-medium-m text-secondary"></i></a></nav></small></div></td><td class="text-center">'+claim_date+'</td><td class="text-center"><span class="badge badge-danger">Rejected</span></td></tr>');


              }

			   var approve_tail = '</tbody></table></div></div></div>';
			  var approve_info = approve_header.concat(approve_row).concat(approve_tail);
			    $('#reject_detail').html(approve_info);

          $('#rejects').modal("show");

           }
		   else {
			   toastr.warning("No records found")
			   $('#rejects').modal("hide");
		   }

					 $('table.reject').DataTable({
      "paging": true,
	  "pageLength": 4,
	  "lengthMenu": [[4, 10, -1], [4, 10, "All"]],
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
	  destroy: true,
    });


		 }

		});

      });

	   $("body").on("click", ".submits", function(event){

   var approved_claim = $(this).attr("id");
		var approved_claim_split = approved_claim.split("_");
		var approveclaim = approved_claim_split[0];
		var start_date = approved_claim_split[1];
		var end_date = approved_claim_split[2];
		var status = approved_claim_split[3];
		var submitted = approved_claim_split[4];

		$.ajax({
         url: '/approveclaim/' + approveclaim + '/' + start_date + '/' + end_date + '/' + status + '/' + submitted,
         type: 'get',
         dataType: 'json',
         success: function(response){
			  var len = 0;


           if(response['data'] != null){
              len = response['data'].length;
           }

		    if(len > 0){
				var approve_row = "";
			var approve_header =  '<div class="card-body"><div class="tab-content" id="custom-tabs-one-tabContent"><div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab"><table class="submitted table table-bordered table-hover"><thead><tr><th>Travel</th><th>Daily Allowance</th><th>Internet</th><th>Hotel</th><th>Stationary</th><th>Misc</th><th class="text-center">Date</th><th class="text-center">Status</th></tr></thead><tbody>';

			   for(var i=0; i<len; i++){
                 var EXP_BUS_TRAIN = response['data'][i].EXP_BUS_TRAIN;
				 var EXP_TAXI_AUTO = response['data'][i].EXP_TAXI_AUTO;
				 var EXP_HOTEL = response['data'][i].EXP_HOTEL;
				 var EXP_STATIONARY = response['data'][i].EXP_STATIONARY;
				 var EXP_MOBILE_INTERNET = response['data'][i].EXP_MOBILE_INTERNET;
				 var DA_RATES_LOCAL = response['data'][i].DA_RATES_LOCAL;
				 var DA_RATES_OUTST = response['data'][i].DA_RATES_OUTST;
				 var EXP_PLANE = response['data'][i].EXP_PLANE;
				 var EXP_VEH_REPAIR = response['data'][i].EXP_VEH_REPAIR;
				 var EXP_MISC = response['data'][i].EXP_MISC;
				 var CLAIM_DATE = response['data'][i].CLAIM_DATE;
				 var EXP_FUEL = response['data'][i].EXP_FUEL;
				 var APPROVAL_STATUS = response['data'][i].APPROVAL_STATUS;
				 var flag;
				 if(APPROVAL_STATUS == '1'){
					 flag = '<span class="badge badge-success">Approved</span>';
				 }
				 else if(APPROVAL_STATUS == '2'){
					 flag = '<span class="badge badge-danger">Rejected</span>';
				 }
				  else if(APPROVAL_STATUS == '3'){
					 flag = '<span class="badge badge-secondary">Zero Claim</span>';
				 }
				 else {
				 flag = '<span class="badge badge-info">Pending</span>';
				 }

				 var date = new Date(CLAIM_DATE);
				  var claim_date = date.toLocaleDateString();
				 approve_row = approve_row.concat('<tr><td class="text-center"><div class="row"><small><nav class="navbar"><a class="d-flex flex-column"><span class="badge badge-secondary">'+EXP_TAXI_AUTO+'</span><i class="fas fa-taxi text-success"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="d-flex flex-column"><span class="badge badge-secondary">'+EXP_BUS_TRAIN+'</span><i class="fas fa-bus text-maroon"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="d-flex flex-column"><span class="badge badge-secondary">'+EXP_PLANE+'</span><i class="fas fa-plane text-indigo"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="d-flex flex-column"><span class="badge badge-secondary">'+EXP_FUEL+'</span><i class="fas fa-gas-pump text-pink"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="d-flex flex-column"><span class="badge badge-secondary">'+EXP_VEH_REPAIR+'</span><i class="fas fa-tools text-lime"></i></a></nav></small></div></td><td class="text-center"><div class="row"> <small><nav class="navbar"><a class="d-flex flex-column"><span class="badge badge-secondary">'+DA_RATES_LOCAL+'</span><i class="fas fa-map-marker-alt text-fuchsia"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="d-flex flex-column"><span class="badge badge-secondary">'+DA_RATES_OUTST+'</span><i class="fas fa-route text-primary"></i></a></nav></small></div></td><td class="text-center"><div class="row"> <small><nav class="navbar"><a class="d-flex flex-column"><span class="badge badge-secondary">'+EXP_MOBILE_INTERNET+'</span><i class="fas fa-wifi text-orange"></i></a></nav></small></div></td><td class="text-center"><div class="row"> <small><nav class="navbar"><a class="d-flex flex-column"><span class="badge badge-secondary">'+EXP_HOTEL+'</span><i class="fas fa-hotel text-purple"></i></a></nav></small></div></td><td class="text-center"><div class="row"> <small><nav class="navbar"><a class="d-flex flex-column"><span class="badge badge-secondary">'+EXP_STATIONARY+'</span><i class="fas fa-mobile-alt text-info"></i></a></nav></small></div></td><td class="text-center"><div class="row"> <small><nav class="navbar"><a class="d-flex flex-column"><span class="badge badge-secondary">'+EXP_MISC+'</span><i class="fab fa-medium-m text-secondary"></i></a></nav></small></div></td><td class="text-center">'+claim_date+'</td><td class="text-center">'+flag+'</td></tr>');


              }

			   var approve_tail = '</tbody></table></div></div></div>';
			  var approve_info = approve_header.concat(approve_row).concat(approve_tail);
			    $('#submit_detail').html(approve_info);

          $('#submitted').modal("show");

           }
		   else {
			   toastr.warning("No records found")
			   $('#submitted').modal("hide");
		   }

					 $('table.submitted').DataTable({
      "paging": true,
	  "pageLength": 4,
	  "lengthMenu": [[4, 10, -1], [4, 10, "All"]],
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
	  destroy: true,
    });


		 }

		});

      });

	  $("body").on("click", ".ledger", function(event){
         var ledger_id = $(this).attr("id");
		 var ledger_split = ledger_id.split("_");
		 var customer = ledger_split[0];
		 var customer_name = ledger_split[1];
		 var type = ledger_split[2];
		 var code = ledger_split[3];

		  $('#customer_name').html(customer_name);
		   $('#customer_type').html(type);

	$.ajax({
         url: '/customer/' + customer + '/' + code + '/' + type,
         type: 'get',
         dataType: 'json',
         success: function(response){

           var len = 0;


           if(response['data'] != null){
              len = response['data'].length;
           }

           if(len > 0){
			   var ledger_row = "";
			 var ledger_header =   '<div class="card-body"><div class="table-responsive"><table class="ledger_details table table-bordered table-hover"><thead><tr><th>Transaction ID</th><th class="text-center">Amount</th><th>Description</th><th class="text-center">Balance</th><th class="text-right">Date</th></tr></thead><tbody>';
              for(var i=0; i<len; i++){
                 var TRANSACTION_ID = response['data'][i].TRANSACTION_ID;
				 var TRANSACTION_AMOUNT = response['data'][i].TRANSACTION_AMOUNT;
				 var TRANSACTION_DESCRIPTION = response['data'][i].TRANSACTION_DESCRIPTION;
				 var BALANCE = response['data'][i].BALANCE;
				 var TRANSACTION_TIME = response['data'][i].TRANSACTION_TIME;


				//alert(TRANSACTION_ID);

				ledger_row = ledger_row.concat('<tr><td>'+TRANSACTION_ID+'</td><td class="project-state text-center">'+TRANSACTION_AMOUNT+'</td><td>'+TRANSACTION_DESCRIPTION+'</td><td class="text-center">'+BALANCE+'</td><td class="text-right">'+TRANSACTION_TIME+'</td></tr>');


              }
			  var ledger_tail = '</tbody></table></div></div>';
			  var ledger_info = ledger_header.concat(ledger_row).concat(ledger_tail);
			    $('#ledger_detail').html(ledger_info);

          $('#ledgers').modal("show");
           }
		   else {
			   toastr.warning("No records found")
			   $('#ledgers').modal("hide");
		   }

					 $('table.ledger_details').DataTable({
      "paging": true,
	  "pageLength": 4,
	  "lengthMenu": [[4, 10, -1], [4, 10, "All"]],
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
	  destroy: true,


    });

         }

       });


      });



	   $("body").on("click", ".cusLedger", function(event){
		var ledger_id = $(this).attr("id");
		 var ledger_split = ledger_id.split("_");
		 var mycutomer = ledger_split[0];
		 var customer_name = ledger_split[1];
		var type = ledger_split[2];
		 var code = ledger_split[3];

		  $('#customer_nam').html(customer_name);
		   $('#customer_typ').html(type);

	$.ajax({
         url: '/mycutomer/' + mycutomer + '/' + code + '/' + type,
         type: 'get',
         dataType: 'json',
         success: function(response){

           var len = 0;


           if(response['data'] != null){
              len = response['data'].length;
           }

           if(len > 0){
			   var ledger_rows = "";
			 var ledger_headers =   '<div class="card-body"><div class="table-responsive"><table class="cusLedgers table table-bordered table-hover"><thead><tr><th>Transaction ID</th><th class="text-center">Amount</th><th>Description</th><th class="text-center">Balance</th><th class="text-right">Date</th></tr></thead><tbody>';
              for(var i=0; i<len; i++){
                 var TRANSACTION_IDs = response['data'][i].TRANSACTION_ID;
				 var TRANSACTION_AMOUNTs = response['data'][i].TRANSACTION_AMOUNT;
				 var TRANSACTION_DESCRIPTIONs = response['data'][i].TRANSACTION_DESCRIPTION;
				 var BALANCEs = response['data'][i].BALANCE;
				 var TRANSACTION_TIMEs = response['data'][i].TRANSACTION_TIME;




				ledger_rows = ledger_rows.concat('<tr><td>'+TRANSACTION_IDs+'</td><td class="project-state text-center">'+TRANSACTION_AMOUNTs+'</td><td>'+TRANSACTION_DESCRIPTIONs+'</td><td class="text-center">'+BALANCEs+'</td><td class="text-right">'+TRANSACTION_TIMEs+'</td></tr>');


              }
			  var ledger_tails = '</tbody></table></div></div>';
			  var ledger_infos = ledger_headers.concat(ledger_rows).concat(ledger_tails);
			    $('#cusLedger_detail').html(ledger_infos);
			$('#cusLedgers').modal("show");
           }
		   else {
			   toastr.warning("No records found")
			   $('#cusLedgers').modal("hide");
		   }


					 $('table.cusLedgers').DataTable({
      "paging": true,
	  "pageLength": 4,
	  "lengthMenu": [[4, 10, -1], [4, 10, "All"]],
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
	  destroy: true,


    });

         }

       });


      });


	  $("body").on("click", ".screen", function(event){
           var screen = $(this).attr("id");

			var values = document.getElementById(screen).getAttribute("value");
			var screens = JSON.parse(values);

			$('#screen_name').val(screens.SCREEN_NAME);
			$('#screen_description').val(screens.SCREEN_DESCRIPTION);
			$('#screen_path').val(screens.SCREEN_LINK);
			$('#screen_Id').val(screens.SCREEN_ID);

			if(screens.FLAG == '1') {
				$("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', true);
    });

					}
			else {
				$("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', false);
    });
	}


			$('.screenModal').modal("show");
		  });

		  $("body").on("click", ".areas", function(event){
           var area = $(this).attr("id");

			var values = document.getElementById(area).getAttribute("value");
			var screens = JSON.parse(values);

			$('#zones').val(screens.ZONE_NAME);
			$('#regions').val(screens.REGION_NAME);
			$('#Area').val(screens.AREA_NAME);
			$('#area_Id').val(screens.AREA_ID);

			if(screens.FLAG == '1') {
				$("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', true);
    });

					}
			else {
				$("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', false);
    });
	}


			$('.areaModal').modal("show");
		  });


		  $("body").on("click", ".comp", function(event){
           var comp = $(this).attr("id");

			var values = document.getElementById(comp).getAttribute("value");
			var comps = JSON.parse(values);

			$('#comp_name').val(comps.COMPONENT_NAME);
			$('#comp_description').val(comps.COMPONENT_DESCRIPTION);
			$('#comp_owner').val(comps.COMPONENT_OWNER);
			$("#comp_owner").select2();
			$('#comp_Id').val(comps.COMPONENT_ID);

			if(comps.FLAG == '1') {
				$("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', true);
    });

					}
			else {
				$("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', false);
    });
	}


			$('.compModal').modal("show");
		  });

		   $("body").on("click", ".module", function(event){
           var mod = $(this).attr("id");

			var values = document.getElementById(mod).getAttribute("value");
			var modules = JSON.parse(values);

			$('#name').val(modules.MODULE_NAME);
			$('#desc').val(modules.MODULE_DESCRIPTION);
			$('#path').val(modules.MODULE_PATH);
			$('#module_Id').val(modules.MODULE_ID);

			if(modules.FLAG == '1') {
				$("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', true);
    });

					}
			else {
				$("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', false);
    });
	}


			$('.moduleModal').modal("show");
		  });

		   $("body").on("click", ".mat", function(event){
           var material = $(this).attr("id");

			var valuess = document.getElementById(material).getAttribute("value");
			var materials = JSON.parse(valuess);

			$('#group_id').val(materials.GROUP_ID);
			$('#GROUP_ID').val(materials.GROUP_ID);
			$('#GROUP_NAME').val(materials.GROUP_NAME);


			if(materials.FLAG == '1') {
				$("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', true);
    });

					}
			else {
				$("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', false);
    });
	}


			$('.materialModal').modal("show");
		  });

		  $("body").on("click", ".announces", function(event){
           var announcetype = $(this).attr("id");

			var valuess = document.getElementById(announcetype).getAttribute("value");
			var announcetypes = JSON.parse(valuess);

			$('#ann_Id').val(announcetypes.ANNOUNCEMENT_ID);
			$('#announcement_type').val(announcetypes.ANNOUNCEMENT_TYPE);


			if(announcetypes.FLAG == '1') {
				$("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', true);
    });

					}
			else {
				$("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', false);
    });
	}


			$('.annModal').modal("show");
		  });

		   $("body").on("click", ".mycust", function(event){
           var mycust = $(this).attr("id");

			var valuess = document.getElementById(mycust).getAttribute("value");
			var mycusts = JSON.parse(valuess);

			$('#mycutomer').val(mycusts.CUSTOMER_ID);
			$('#code').val(mycusts.TYPE_CODE);
			$('#type').val(mycusts.TYPE);
			$('#cust_name').val(mycusts.CUSTOMER_NAME);
			$('#cust_mob').val(mycusts.CUSTOMER_MOB);
			$('#cust_bank').val(mycusts.CUSTOMER_BANK_ACC_NO);


			if(mycusts.CUSTOMER_STATUS == '1') {
				$("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', true);
    });

					}
			else {
				$("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', false);
    });
	}


			$('.mycustModal').modal("show");
		  });

		   $("body").on("click", ".custo", function(event){
           var custo = $(this).attr("id");

			var valuess = document.getElementById(custo).getAttribute("value");
			var custos = JSON.parse(valuess);

			$('#customers').val(custos.CUSTOMER_ID);
			$('#code').val(custos.TYPE_CODE);
			$('#type').val(custos.TYPE);
			$('#cust_name').val(custos.CUSTOMER_NAME);
			$('#cust_mob').val(custos.CUSTOMER_MOB);
			$('#cust_bank').val(custos.CUSTOMER_BANK_ACC_NO);


			if(custos.CUSTOMER_STATUS == '1') {
				$("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', true);
    });

					}
			else {
				$("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', false);
    });
	}


			$('.custModal').modal("show");
		  });

		   $("body").on("click", ".images", function(event){
           var images = $(this).attr("id");

			var values = document.getElementById(images).getAttribute("value");
			var imagess = JSON.parse(values);

			var path = "http://apps.insecticidesindia.com:8030/storage/"+imagess.IMAGE+"";

			var img = "<img src='"+path+"'  alt='' class='img-responsive' style='max-height:300px; max-width:450px;'>";

			$('#annimage').html(img);


			$('.imageModal').modal("show");
		  });

		  $("body").on("click", ".img", function(event){
           var images = $(this).attr("id");

			var values = document.getElementById(images).getAttribute("value");
			var imagess = JSON.parse(values);

			var path = "http://apps.insecticidesindia.com:8030/storage/"+imagess.IMAGE+"";

			var img = "<img src='"+path+"'  alt='' class='img-responsive' style='max-height:300px; max-width:450px;'>";

			$('#annsimage').html(img);


			$('.imgModal').modal("show");
		  });


		  $("body").on("click", ".cus", function(event){
           var cuss = $(this).attr("id");
		   var res = cuss.split("_");
		   var customer = res[0];
		   var code = res[1];

			$.ajax({
         url: '/customer/' + customer + '/' +code,
         type: 'get',
         dataType: 'json',
         success: function(response){

           var len = 0;


           if(response['data'] != null){
              len = response['data'].length;
           }

           if(len > 0){
              for(var i=0; i<len; i++){
                 var CLOSING_BALANCE = response['data'][i].CLOSING_BALANCE;
				 var OPENING_BALANCE = response['data'][i].OPENING_BALANCE;
				 var IMM_DUES = response['data'][i].IMM_DUES;
				 var TOTAL_OUTSTANDING = response['data'][i].TOTAL_OUTSTANDING;
				 var ADVANCE = response['data'][i].ADVANCE;
				 var TOTAL_CREDIT_LIMIT = response['data'][i].TOTAL_CREDIT_LIMIT;
				 var REMAINING_CREDIT_LIMIT = response['data'][i].REMAINING_CREDIT_LIMIT;


				 $('#OPENING_BALANCE').html(OPENING_BALANCE);
			$('#CLOSING_BALANCE').html(CLOSING_BALANCE);
			$('#IMM_DUES').html(IMM_DUES);
			$('#TOTAL_OUTSTANDING').html(TOTAL_OUTSTANDING);
			$('#ADVANCE').html(ADVANCE);
			$('#TOTAL_CREDIT_LIMIT').html(TOTAL_CREDIT_LIMIT);
			$('#REMAINING_CREDIT_LIMIT').html(REMAINING_CREDIT_LIMIT);

              }
           }


         }

       });



			$('.cusModal').modal("show");
		  });

$("body").on("click", ".mycus", function(event){
           var cuss = $(this).attr("id");
		   var res = cuss.split("_");
		   var mycutomer = res[0];
		   var code = res[1];

			$.ajax({
         url: '/mycutomer/' + mycutomer + '/' +code,
         type: 'get',
         dataType: 'json',
         success: function(response){

           var len = 0;


           if(response['data'] != null){
              len = response['data'].length;
           }

           if(len > 0){
              for(var i=0; i<len; i++){
                 var CLOSING_BALANCE = response['data'][i].CLOSING_BALANCE;
				 var OPENING_BALANCE = response['data'][i].OPENING_BALANCE;
				 var IMM_DUES = response['data'][i].IMM_DUES;
				 var TOTAL_OUTSTANDING = response['data'][i].TOTAL_OUTSTANDING;
				 var ADVANCE = response['data'][i].ADVANCE;
				 var TOTAL_CREDIT_LIMIT = response['data'][i].TOTAL_CREDIT_LIMIT;
				 var REMAINING_CREDIT_LIMIT = response['data'][i].REMAINING_CREDIT_LIMIT;


				 $('#OPENING_BALANCES').html(OPENING_BALANCE);
			$('#CLOSING_BALANCES').html(CLOSING_BALANCE);
			$('#IMM_DUESS').html(IMM_DUES);
			$('#TOTAL_OUTSTANDINGS').html(TOTAL_OUTSTANDING);
			$('#ADVANCES').html(ADVANCE);
			$('#TOTAL_CREDIT_LIMITS').html(TOTAL_CREDIT_LIMIT);
			$('#REMAINING_CREDIT_LIMITS').html(REMAINING_CREDIT_LIMIT);

              }
           }


         }

       });



			$('.mycusModal').modal("show");
		  });


		   $("body").on("click", ".updateann", function(event){
           var updateann = $(this).attr("id");

			var valuess = document.getElementById(updateann).getAttribute("value");
			var updateanns = JSON.parse(valuess);



		var date = new Date(updateanns.VALID_FROM);
		var dateString = new Date(date.getTime() - (date.getTimezoneOffset() * 60000 ))
                    .toISOString()
                    .split("T")[0];


		var ann_till = new Date(updateanns.VALID_TILL);
		var date_till = new Date(ann_till.getTime() - (ann_till.getTimezoneOffset() * 60000 ))
                    .toISOString()
                    .split("T")[0];


			$('#announce_Id').val(updateanns.ANNOUNCE_ID);
			$('#announcement_name').val(updateanns.TITLE);
			$('#announcement_description').val(updateanns.DESCRIPTION);
			$("#announcement_id").select2().val(updateanns.ANNOUNCEMENT_ID).trigger("change");
			$("#region_id").select2().val(updateanns.REGION_ID).trigger("change");
			$('#announcement_valid_from').val(dateString);
			$('#announcement_valid_to').val(date_till);
			$('#file_img').html(updateanns.IMAGE);

			if(updateanns.FLAG == '1') {
				$("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', true);
    });

					}
			else {
				$("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', false);
    });
	}


			$('.announceModal').modal("show");
		  });

	 $("body").on("click", ".role", function(event){
           var role = $(this).attr("id");

			var values = document.getElementById(role).getAttribute("value");
			var roles = JSON.parse(values);

			$('#role_name').val(roles.ROLE_NAME);
			$('#role_description').val(roles.ROLE_DESCRIPTION);
			var arr = [];
			for(var i=0; i<roles.AUTH.length; i++){
			arr.push(roles.AUTH[i].AUTH_ID);
			}
		$("#auth_id").select2().val(arr).trigger("change");
			$('#role_Id').val(roles.ROLE_ID);

			if(roles.FLAG == '1') {
				$("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', true);
    });

					}
			else {
				$("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', false);
    });
	}


			$('.roleModal').modal("show");
		  });

		   $("body").on("click", ".assign", function(event){
           var assign = $(this).attr("id");

			var values = document.getElementById(assign).getAttribute("value");
			var assigns = JSON.parse(values);

			$('#user_id').val(assigns.EMP_ID);
			$('#user_name').val(assigns.EMP_NAME);
			var arr = [];
			for(var i=0; i<assigns.ROLE.length; i++){
			arr.push(assigns.ROLE[i].ROLE_ID);
			}
		$("#role_id").select2().val(arr).trigger("change");
			$('#assign_Id').val(assigns.EMP_ID);

			if(assigns.FLAG == '1') {
				$("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', true);
    });

					}
			else {
				$("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', false);
    });
	}


			$('.assignModal').modal("show");
		  });

		  $("body").on("click", ".zone", function(event){
           var zone = $(this).attr("id");

			var values = document.getElementById(zone).getAttribute("value");
			var assigns = JSON.parse(values);

			$('#zone_names').val(assigns.ZONE_NAME);
			var arr = [];
			for(var i=0; i<assigns.REGION.length; i++){
			arr.push(assigns.REGION[i].REGION_ID);
			}
		$("#region_id").select2().val(arr).trigger("change");
			$('#zone_Id').val(assigns.ZONE_ID);

			if(assigns.FLAG == '1') {
				$("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', true);
    });

					}
			else {
				$("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', false);
    });
	}


			$('.zoneModal').modal("show");
		  });


		   $("body").on("click", ".assigncomp", function(event){
           var assign = $(this).attr("id");

			var values = document.getElementById(assign).getAttribute("value");
			var assigns = JSON.parse(values);

			$('#compo_name').val(assigns.COMPONENT_NAME);
			var arr = [];
			for(var i=0; i<assigns.PROCESSOR.length; i++){
			arr.push(assigns.PROCESSOR[i].PROCESSOR_ID);
			}
		$("#proc_id").select2().val(arr).trigger("change");
			$('#comp_Id').val(assigns.COMPONENT_ID);



			$('.assigncompModal').modal("show");
		  });

		   $("body").on("click", ".assignplant", function(event){
           var assign_plt = $(this).attr("id");

			var values = document.getElementById(assign_plt).getAttribute("value");
			var assigns_plt = JSON.parse(values);

			$('#Emp_ID').val(assigns_plt.EMP_ID);
			$('#Emp_Name').val(assigns_plt.EMP_NAME);
			var arr = [];
			for(var i=0; i<assigns_plt.REGION.length; i++){
			arr.push(assigns_plt.REGION[i].REGION_ID);
			}
		$("#emply_id").select2().val(arr).trigger("change");
			$('#plt_Id').val(assigns_plt.EMP_ID);



			$('.assignpltModal').modal("show");
		  });


		   $("body").on("click", ".assignregion", function(event){
           var assign_rgn = $(this).attr("id");

			var values = document.getElementById(assign_rgn).getAttribute("value");
			var assigns_rgns = JSON.parse(values);
			$('#employees_Id').val(assigns_rgns.EMP_ID);
			$('#employees_name').val(assigns_rgns.EMP_NAME);



			$('.assignregionModal').modal("show");
		  });


		  $("body").on("click", ".assignrole", function(event){
           var assign_rgn = $(this).attr("id");

			var values = document.getElementById(assign_rgn).getAttribute("value");
			var assigns_rgns = JSON.parse(values);
			$('#employees_Id').val(assigns_rgns.EMP_ID);
			$('#employees_name').val(assigns_rgns.EMP_NAME);



			$('.assignroleModal').modal("show");
		  });



 });
 </script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });

	$('#anndate').datetimepicker({
        format: 'L'
    });
    //Date range picker

 $("body").on("click", ".claimDay", function(event){
var date = new Date();
		var currentMonth = date.getMonth();
		var currentDate = date.getDate();
		var currentYear = date.getFullYear();

var claim_day_limits = document.getElementById("claim_day_limit").value;
var claim_limit = JSON.parse(claim_day_limits) - 1;

$('#claimdate').datetimepicker({
       format: 'L', minDate: new Date(currentYear, currentMonth, currentDate-claim_limit), maxDate:new Date()
    });

 });

 $("body").on("click", ".markclaimDay", function(event){
var date = new Date();
		var currentMonth = date.getMonth();
		var currentDate = date.getDate();
		var currentYear = date.getFullYear();

var claim_day_limits = document.getElementById("claim_day_limit").value;
var claim_limit = JSON.parse(claim_day_limits) - 1;

$('#markclaimdate').datetimepicker({
       format: 'L', minDate: new Date(currentYear, currentMonth, currentDate-claim_limit), maxDate:new Date()
    });

 });



     //Date range picker for valid to
     $('#reservationdate_validto').datetimepicker({
        format: 'L'
    });
    //Date range picker for valid to
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })

    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    });

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });

  })
</script>
@php
$claim = Auth::id();
@endphp
<script>
$('').on('click', function() {
var createclaim = {{$claim}};
//alert(createclaim);
var DA_RATES_LOCAL = document.getElementById("DA_RATES_LOCAL").value;
var DA_RATES_OUTST = document.getElementById("DA_RATES_OUTST").value;
var EXP_BUS_TRAIN = document.getElementById("EXP_BUS_TRAIN").value;
var EXP_PLANE = document.getElementById("EXP_PLANE").value;
var EXP_TAXI_AUTO = document.getElementById("EXP_TAXI_AUTO").value;
var EXP_VEH_REPAIR = document.getElementById("EXP_VEH_REPAIR").value;
var EXP_HOTEL = document.getElementById("EXP_HOTEL").value;
var EXP_STATIONARY = document.getElementById("EXP_STATIONARY").value;
var EXP_MOBILE_INTERNET = document.getElementById("EXP_MOBILE_INTERNET").value;
var EXP_MISC = document.getElementById("EXP_MISC").value;
var START_KM = document.getElementById("START_KM").value;
var END_KM = document.getElementById("END_KM").value;
var MISC_COMMENTS = document.getElementById("MISC_COMMENTS").value;
var TOTAL_CLAIMED_AMOUNT = document.getElementById("res").value;
var EXP_FUEL = document.getElementById("rest").value;

$.ajax({
         url: '/createclaim/' + createclaim,
         type: 'get',
         dataType: 'json',
         success: function(response){

           var len = 0;


           if(response['data'] != null){
              len = response['data'].length;
           }

           if(len > 0){
              for(var i=0; i<len; i++){
                 var LOCAL = response['data'][i].DA_RATES_LOCAL;
				 var OUTST = response['data'][i].DA_RATES_OUTST;
				 var TRAIN = response['data'][i].EXP_BUS_TRAIN;
				 var PLANE = response['data'][i].EXP_PLANE;
				 var AUTO = response['data'][i].EXP_TAXI_AUTO;
				 var REPAIR = response['data'][i].EXP_VEH_REPAIR;
				 var HOTEL = response['data'][i].EXP_HOTEL;
				 var STATIONARY = response['data'][i].EXP_STATIONARY;
				 var INTERNET = response['data'][i].EXP_MOBILE_INTERNET;
				 var MISC = response['data'][i].EXP_MISC;

              }
           }
		     $.ajax({
	  type: 'POST',
	  url: "{{ route('createclaim.store') }}",
	  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  },
	  data:{TOTAL_CLAIMED_AMOUNT:TOTAL_CLAIMED_AMOUNT,MISC_COMMENTS:MISC_COMMENTS,END_KM:END_KM,START_KM:START_KM,DA_RATES_LOCAL:DA_RATES_LOCAL, DA_RATES_OUTST:DA_RATES_OUTST, EXP_FUEL:EXP_FUEL, EXP_BUS_TRAIN:EXP_BUS_TRAIN, EXP_PLANE:EXP_PLANE, EXP_TAXI_AUTO:EXP_TAXI_AUTO, EXP_VEH_REPAIR:EXP_VEH_REPAIR, EXP_HOTEL:EXP_HOTEL, EXP_STATIONARY:EXP_STATIONARY, EXP_MOBILE_INTERNET:EXP_MOBILE_INTERNET, EXP_MISC:EXP_MISC},
	  success:function(data){
              //alert(data.success);
			  toastr.success('Claim Created Successfully')

			  location.reload();

           }
});






         }

       });








});

$('.form-group').on('input','.pwc',function(){
var createclaim = {{$claim}};
var sum = 0;
var km = 0;
var rem_km = 0;
var max_km = document.getElementById("max_km").value;
var exp = document.getElementById("expense").value;
	$('.form-group .pwc').each(function(){
		var value = $(this).val();
		if($.isNumeric(value)){
			sum = (parseFloat(value) * exp) - sum;
			km = parseFloat(value) - km;
		}
	});

rem_km = max_km - km;


var START_KM = document.getElementById("START_KM").value;
var END_KM = document.getElementById("END_KM").value;
document.getElementById("start_end").value = END_KM - START_KM;
if(END_KM>0 && START_KM>=0 && rem_km>=0){
	if(sum>0){
	document.getElementById("rest").value = sum;
	$('#personal').text(sum);
	$('#allowed_km').text(rem_km);
	}
	else{
	document.getElementById("rest").value = 0;
	 $('#personal').text("");
	 $('#allowed_km').text("");
    }
}

else{
	document.getElementById("rest").value = 0;
	 $('#personal').text("");
	  $('#allowed_km').text("");
    }

       });

function check_total(){


	var owner_check = document.getElementById("ownership").value;
	var  EXP_BUS_TRAIN = document.getElementById("EXP_BUS_TRAIN").value;
var  EXP_TAXI_AUTO = document.getElementById("EXP_TAXI_AUTO").value;
var  EXP_PLANE = document.getElementById("EXP_PLANE").value;
var  EXP_VEH_REPAIR = document.getElementById("EXP_VEH_REPAIR").value;
var  EXP_HOTEL = document.getElementById("EXP_HOTEL").value;
var  EXP_MOBILE_INTERNET = document.getElementById("EXP_MOBILE_INTERNET").value;
var  EXP_STATIONARY = document.getElementById("EXP_STATIONARY").value;
var  DA_RATES_LOCAL = document.getElementById("DA_RATES_LOCAL").value;
var  DA_RATES_OUTST = document.getElementById("DA_RATES_OUTST").value;
var  EXP_MISC = document.getElementById("EXP_MISC").value;

	if(owner_check == 2){
	 var fuel = document.getElementById("rest").value;


var total = parseFloat(EXP_BUS_TRAIN) + parseFloat(DA_RATES_LOCAL) + parseFloat(DA_RATES_OUTST) + parseFloat(EXP_MISC) + parseFloat(EXP_MOBILE_INTERNET) + parseFloat(EXP_STATIONARY) + parseFloat(EXP_TAXI_AUTO) + parseFloat(EXP_PLANE) + parseFloat(EXP_VEH_REPAIR) + parseFloat(EXP_HOTEL) + parseFloat(fuel);

document.getElementById("res").value = total;
$('#result').text(total);

}
	else if(owner_check == 1){
		var fuel_exp = document.getElementById("fuel_exp").value;

		var totals = parseFloat(EXP_BUS_TRAIN) + parseFloat(DA_RATES_LOCAL) + parseFloat(DA_RATES_OUTST) + parseFloat(EXP_MISC) + parseFloat(EXP_MOBILE_INTERNET) + parseFloat(EXP_STATIONARY) + parseFloat(EXP_TAXI_AUTO) + parseFloat(EXP_PLANE) + parseFloat(EXP_VEH_REPAIR) + parseFloat(EXP_HOTEL) + parseFloat(fuel_exp);

document.getElementById("res").value = totals;
$('#result').text(totals);
	}
}



</script>
<script>
var levelsetting;
function verifydist(e) {
levelsetting = e.target.value;
//location.href = '/levelsettings/' + levelsetting;

 $.ajax({
         url: '/levelsettings/' + levelsetting,
         type: 'get',
         dataType: 'json',
         success: function(response){

           var len = 0;
          $('#DA_RATES_LOCAL').empty();
		  $('#DA_RATES_OUTST').empty();
		  $('#EXP_PER_KM_RATE').empty();
		  $('#exp_bus_train').empty();
		  $('#EXP_PLANE').empty();
		  $('#EXP_TAXI_AUTO').empty();
		  $('#EXP_VEH_REPAIR').empty();
		  $('#EXP_HOTEL').empty();
		  $('#EXP_STATIONARY').empty();
		  $('#EXP_MOBILE_INTERNET').empty();
		  $('#EXP_MISC').empty();

           if(response['data'] != null){
              len = response['data'].length;
           }

           if(len > 0){
              for(var i=0; i<len; i++){
                 var DA_RATES_LOCAL = response['data'][i].DA_RATES_LOCAL;
				 var DA_RATES_OUTST = response['data'][i].DA_RATES_OUTST;
				 var EXP_PER_KM_RATE = response['data'][i].EXP_PER_KM_RATE;
				 var exp_bus_train = response['data'][i].EXP_BUS_TRAIN;
				 var EXP_PLANE = response['data'][i].EXP_PLANE;
				 var EXP_TAXI_AUTO = response['data'][i].EXP_TAXI_AUTO;
				 var EXP_VEH_REPAIR = response['data'][i].EXP_VEH_REPAIR;
				 var EXP_HOTEL = response['data'][i].EXP_HOTEL;
				 var EXP_STATIONARY = response['data'][i].EXP_STATIONARY;
				 var EXP_MOBILE_INTERNET = response['data'][i].EXP_MOBILE_INTERNET;
				 var EXP_MISC = response['data'][i].EXP_MISC;

              }
           }
			document.getElementById("DA_RATES_LOCAL").value = DA_RATES_LOCAL;
			document.getElementById("DA_RATES_OUTST").value = DA_RATES_OUTST;
			document.getElementById("EXP_PER_KM_RATE").value = EXP_PER_KM_RATE;
			document.getElementById("exp_bus_train").value = exp_bus_train;
			document.getElementById("EXP_PLANE").value = EXP_PLANE;
			document.getElementById("EXP_TAXI_AUTO").value = EXP_TAXI_AUTO;
			document.getElementById("EXP_VEH_REPAIR").value = EXP_VEH_REPAIR;
			document.getElementById("EXP_HOTEL").value = EXP_HOTEL;
			document.getElementById("EXP_STATIONARY").value = EXP_STATIONARY;
			document.getElementById("EXP_MOBILE_INTERNET").value = EXP_MOBILE_INTERNET;
			document.getElementById("EXP_MISC").value = EXP_MISC;


         }

       });

}

$('#btnSelectedRows').on('click', function() {

//var levelsetting = document.getElementById("LEVEL_RANK_ID").value;
var DA_RATES_LOCAL = document.getElementById("DA_RATES_LOCAL").value;
var DA_RATES_OUTST = document.getElementById("DA_RATES_OUTST").value;
var EXP_PER_KM_RATE = document.getElementById("EXP_PER_KM_RATE").value;
var exp_bus_train = document.getElementById("exp_bus_train").value;
var EXP_PLANE = document.getElementById("EXP_PLANE").value;
var EXP_TAXI_AUTO = document.getElementById("EXP_TAXI_AUTO").value;
var EXP_VEH_REPAIR = document.getElementById("EXP_VEH_REPAIR").value;
var EXP_HOTEL = document.getElementById("EXP_HOTEL").value;
var EXP_STATIONARY = document.getElementById("EXP_STATIONARY").value;
var EXP_MOBILE_INTERNET = document.getElementById("EXP_MOBILE_INTERNET").value;
var EXP_MISC = document.getElementById("EXP_MISC").value;


const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });


$.ajax({
	  type: 'POST',
	  url: '/levelsettings/' + levelsetting,
	  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  },
	  data:{'_method':'PUT', DA_RATES_LOCAL:DA_RATES_LOCAL, DA_RATES_OUTST:DA_RATES_OUTST, EXP_PER_KM_RATE:EXP_PER_KM_RATE, exp_bus_train:exp_bus_train, EXP_PLANE:EXP_PLANE, EXP_TAXI_AUTO:EXP_TAXI_AUTO, EXP_VEH_REPAIR:EXP_VEH_REPAIR, EXP_HOTEL:EXP_HOTEL, EXP_STATIONARY:EXP_STATIONARY, EXP_MOBILE_INTERNET:EXP_MOBILE_INTERNET, EXP_MISC:EXP_MISC},
	  success:function(data){
              //alert(data.success);

			  toastr.success('Level Expenses Updated Successfully')

			  location.href = 'http://apps.insecticidesindia.com:8030/levelsettings/';

           }
});

});

$('#insert_form').on("submit", function(event){
event.preventDefault();
var mod = document.getElementById("module_Id").value;
var module_name = document.getElementById("name").value;
var module_description = document.getElementById("desc").value;
var flag = document.getElementById("flag").value;

$.ajax({
	  type: 'POST',
	  url: '/mods/' + mod,
	  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  },
	  data:{'_method':'PUT', module_name:module_name, module_description:module_description, flag:flag},
	  success:function(data){
              //alert(data.success);

			  toastr.success('Module Updated Successfully')

			  location.reload();

           }
});


});

$('#screen_form').on("submit", function(event){
event.preventDefault();
var screen = document.getElementById("screen_Id").value;
var screen_name = document.getElementById("screen_name").value;
var screen_description = document.getElementById("screen_description").value;
var flag = document.getElementById("flag").value;

$.ajax({
	  type: 'POST',
	  url: '/screens/' + screen,
	  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  },
	  data:{'_method':'PUT', screen_name:screen_name, screen_description:screen_description, flag:flag},
	  success:function(data){
              //alert(data.success);

			  toastr.success('Screen Updated Successfully')

			  location.reload();

           }
});


});

$('#area_form').on("submit", function(event){
event.preventDefault();
var area = document.getElementById("area_Id").value;
var AREA_NAME = document.getElementById("Area").value;
var FLAG = document.getElementById("flag").value;

$.ajax({
	  type: 'POST',
	  url: '/area/' + area,
	  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  },
	  data:{'_method':'PUT', AREA_NAME:AREA_NAME, FLAG:FLAG},
	  success:function(data){
              //alert(data.success);

			  toastr.success('Area Updated Successfully')

			  location.reload();

           }
});


});

$('#area_form').on("submit", function(event){
event.preventDefault();
var screen = document.getElementById("screen_Id").value;
var screen_name = document.getElementById("screen_name").value;
var screen_description = document.getElementById("screen_description").value;
var flag = document.getElementById("flag").value;

$.ajax({
	  type: 'POST',
	  url: '/area/' + area,
	  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  },
	  data:{'_method':'PUT', screen_name:screen_name, screen_description:screen_description, flag:flag},
	  success:function(data){
              //alert(data.success);

			  toastr.success('Screen Updated Successfully')

			  location.reload();

           }
});


});

$('#mycust_form').on("submit", function(event){
event.preventDefault();
var mycutomer = document.getElementById("mycutomer").value;
var code = document.getElementById("code").value;
var cust_name = document.getElementById("cust_name").value;
var cust_mob = document.getElementById("cust_mob").value;
var cust_bank = document.getElementById("cust_bank").value;
var flag = document.getElementById("flag").value;

$.ajax({
	  type: 'POST',
	  url: '/mycutomer/' + mycutomer + '/' + code,
	  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  },
	  data:{'_method':'PUT', cust_name:cust_name, cust_mob:cust_mob, cust_bank:cust_bank, flag:flag},
	  success:function(data){
              //alert(data.success);

			  toastr.success('Customer Updated Successfully')

			  location.reload();

           }
});


});

$('#cust_form').on("submit", function(event){
event.preventDefault();
var customer = document.getElementById("customers").value;
var code = document.getElementById("code").value;
var cust_name = document.getElementById("cust_name").value;
var cust_mob = document.getElementById("cust_mob").value;
var cust_bank = document.getElementById("cust_bank").value;
var flag = document.getElementById("flag").value;

$.ajax({
	  type: 'POST',
	  url: '/customer/' + customer + '/' + code,
	  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  },
	  data:{'_method':'PUT', cust_name:cust_name, cust_mob:cust_mob, cust_bank:cust_bank, flag:flag},
	  success:function(data){
              //alert(data.success);

			  toastr.success('Customer Updated Successfully')

			  location.reload();

           }
});


});

$('#material_form').on("submit", function(event){
event.preventDefault();
var material = document.getElementById("group_id").value;
var GROUP_ID = document.getElementById("GROUP_ID").value;
var GROUP_NAME = document.getElementById("GROUP_NAME").value;
var FLAG = document.getElementById("flag").value;


$.ajax({
	  type: 'POST',
	  url: '/material/' + material,
	  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  },
	  data:{'_method':'PUT', GROUP_ID:GROUP_ID, GROUP_NAME:GROUP_NAME, FLAG:FLAG},
	  success:function(data){
              //alert(data.success);

			  toastr.success('Material Group Updated Successfully')

			  location.reload();

           }
});


});

$('#ann_form').on("submit", function(event){
event.preventDefault();
var announcetype = document.getElementById("ann_Id").value;
var announcement_type = document.getElementById("announcement_type").value;
var flag = document.getElementById("flag").value;


$.ajax({
	  type: 'POST',
	  url: '/announcetype/' + announcetype,
	  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  },
	  data:{'_method':'PUT', announcement_type:announcement_type, flag:flag},
	  success:function(data){
              //alert(data.success);

			  toastr.success('Announcement Type Updated Successfully')

			  location.reload();

           }
});


});


$('#announce_form').on("submit", function(event){
event.preventDefault();
var announce = document.getElementById("announce_Id").value;
let formData = new FormData(this);

$.ajax({
	  type: 'POST',
	  url: '/announce/' + announce,
	  data:formData,
	  cache:false,
        contentType: false,
        processData: false,
        success: (data) => {
           toastr.success('Announcement Updated Successfully')

			  location.reload();
        },
        error: function(data){
           console.log(data);
         }
       });


});

$('#role_form').on("submit", function(event){
event.preventDefault();
var role = document.getElementById("role_Id").value;
let formData = new FormData(this);

$.ajax({
	  type: 'POST',
	  url: '/roles/' + role,
	  data:formData,
	  cache:false,
        contentType: false,
        processData: false,
        success: (data) => {
           toastr.success('Role Updated Successfully')

			  location.reload();
        },
        error: function(data){
           console.log(data);
         }
       });


});

$('#comp_form').on("submit", function(event){
event.preventDefault();
var component = document.getElementById("comp_Id").value;
let formData = new FormData(this);

$.ajax({
	  type: 'POST',
	  url: 'component/' + component,
	  data:formData,
	  cache:false,
        contentType: false,
        processData: false,
        success: (data) => {
           toastr.success('Component Updated Successfully')

			  location.reload();
        },
        error: function(data){
           console.log(data);
         }
       });


});

$('#assign_form').on("submit", function(event){
event.preventDefault();
var roless = document.getElementById("assign_Id").value;
let formData = new FormData(this);

$.ajax({
	  type: 'POST',
	  url: '/roless/' + roless,
	  data:formData,
	  cache:false,
        contentType: false,
        processData: false,
        success: (data) => {
           toastr.success('Assigned Role Updated Successfully')

			  location.reload();
        },
        error: function(data){
           console.log(data);
         }
       });


});

$('#zone_form').on("submit", function(event){
event.preventDefault();
var zone = document.getElementById("zone_Id").value;
let formData = new FormData(this);

$.ajax({
	  type: 'POST',
	  url: '/zone/' + zone,
	  data:formData,
	  cache:false,
        contentType: false,
        processData: false,
        success: (data) => {
           toastr.success('Zone Updated Successfully')

			  location.reload();
        },
        error: function(data){
           console.log(data);
         }
       });


});

$('#assign_comp_form').on("submit", function(event){
event.preventDefault();
var assigncomponent = document.getElementById("comp_Id").value;
let formData = new FormData(this);

$.ajax({
	  type: 'POST',
	  url: '/assigncomponent/' + assigncomponent,
	  data:formData,
	  cache:false,
        contentType: false,
        processData: false,
        success: (data) => {
           toastr.success('Assigned Component Updated Successfully')

			  location.reload();
        },
        error: function(data){
           console.log(data);
         }
       });


});

$('#assign_plt_form').on("submit", function(event){
event.preventDefault();
var assignplant = document.getElementById("plt_Id").value;
let formData = new FormData(this);

$.ajax({
	  type: 'POST',
	  url: '/assignplant/' + assignplant,
	  data:formData,
	  cache:false,
        contentType: false,
        processData: false,
        success: (data) => {
           toastr.success('Assigned Region Updated Successfully')

			  location.reload();
        },
        error: function(data){
           console.log(data);
         }
       });


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

</body>



</html>
