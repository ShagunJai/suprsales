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

	<link href="{!! asset('suprsales_resource/plugins/toastr/toastr.min.css') !!}" rel="stylesheet" type="text/css">
	<script src="{!! asset('suprsales_resource/plugins/toastr/toastr.min.js') !!}" type="text/javascript"></script>
 {{-- beatplan and slider --}}
    <!-- Ionicons -->
  <!-- Ion Slider -->
<link href="{!! asset('suprsales_resource/plugins/ion-rangeslider/css/ion.rangeSlider.min.css') !!}" rel="stylesheet" type="text/css">
  <!-- bootstrap slider -->
<link href="{!! asset('suprsales_resource/plugins/bootstrap-slider/css/bootstrap-slider.min.css') !!}" rel="stylesheet" type="text/css">
  <!-- Theme style -->
  <!-- Google Font: Source Sans Pro -->

  <style>
.table{
 background-color:#ede9f7;
}
.purplenavbar{
 background-color:#210635;
}
#task {
    display: none;
}
 .cr {
	display: block;
	margin-bottom: 2.0em;
}
.dr {
	display: block;
	margin-bottom: 2.6em;
}
 .toast {
  opacity: 1 !important;
}

#toast-container > div {
  opacity: 1 !important;
}
.toast-top-center {
top: 12px;
margin: 0 auto;
left: 5%;
}
  .badge-orange {
	background-color: #ff851b;
}
#sku {
    display: none;
}
#beat_table {
    display: none;
}

 #mycustomer {
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
div.ex1 {
  height: 500px;
  overflow: auto;
}
.select2-selection__rendered[title="Red"] {
  color: #dc3545 !important;
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

.square {
  height: 30px;
  width: 30px;
  border-radius: 5px;
  position: absolute;
  left: 20px;
  top:10px;
}
a.paginate_button {
    background-color: #e5def7;
}
  </style>



</head>
<body class="hold-transition sidebar-mini accent-teal">
    {{--to retrieve user's data other than id and it should not be null---}}
@if(isset(Auth::user()->id))
 <div class="wrapper">

  {{-- store the email and the employee id inside the variable --}}
 @php
  $user = Auth::user()->email;
  $id = Auth::user()->emp_id;
  @endphp
        <!-- Navigation -->

        <!--<nav class="navbar navbar-static-top" role="navigation">-->

			@include('layouts.header_by_id')
			@include('layouts.sidebar_by_id')






        <div class="content-wrapper">
   {{--A flash message allows you to create a message on one page and display it once on another page.--}}
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
 {{-- If it store the error information about the user across the requests. --}}
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
 {{-- If it store the information about the user across the requests. --}}
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
{{--it is to define a section in a layout and is constantly used to get content from a child page unto a master page. --}}
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
        {{-- if there is no error or working it will go to the userlogin page --}}
@else
    <script>window.location = "/userlogin";</script>
   @endif



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


{{-- for beatplan --}}



<script>
   
    $('#beat_plan_date').datetimepicker({
  //format: 'DD-MM-YYYY'
  format: 'YYYY-MM-DD'
  //format: 'MM-DD-YYYY'
});

</script>


<script>
$(document).ready(function() {
  var selectWrapper = $('#select-boxes');
  $(document).on('change', '.select', function() {
    var planDay = $(this).val();
    //alert(planDay);
    var beat_plan_dat=document.getElementById("beat_plan_date").value;
             //alert(beat_plan_date)

  
           // console.log(beat_plan_dat);
            var startBeatPlanDate= beat_plan_dat
            let current_datetime = new Date(beat_plan_dat);
            let start_formatted_date = (current_datetime.getMonth() + 1) + "/" + current_datetime.getDate() + "/" + current_datetime.getFullYear();
            //console.log(start_formatted_date);
            var strtDate=start_formatted_date;



             var planDays = parseInt(planDay);
             Date.prototype.addDays = function (days) {
                  const date = new Date(this.valueOf());
                  date.setDate(date.getDate() + days);
                  return date;
              };
              
              // Add 7 Days
              const date = new Date(beat_plan_dat);
              
              //console.log(date.addDays(planDays));
              var endDate=date.addDays(planDays);
              function convert(str) {
                  var date = new Date(str),
                    mnth = ("0" + (date.getMonth() + 1)).slice(-2),
                    day = ("0" + date.getDate()).slice(-2);
                  return [date.getFullYear(), mnth, day].join("-");
                }                      
                var endsDate =convert(endDate);
                console.log(endsDate);
                let end_datetime = new Date(endsDate);
                let end_formatted_date = (end_datetime.getMonth() + 1) + "/" + end_datetime.getDate() + "/" + end_datetime.getFullYear();
                console.log(end_formatted_date);
                   
                var end_date_=end_formatted_date.toString();

                function getBusinessDays(start_date, end_date)
                  {
                      var start = new Date(start_date);
                      var end = new Date(end_date);
                      var current = start;
                      var dates = [];
                  
                    while(current<=end) // while the "current" date is <= the end date
                    {
                      if(current.getDay() !== 7 && current.getDay() !== 0) // check if not Sat or Sun
                      {
                          dates.push(new Date(current)); // add date to array
                      }
                      current.setDate(current.getDate() + 1); // increase current date by 1 day
                    }
                  
                    return dates;
                  }
                  
                  var businessDays = getBusinessDays(strtDate, end_formatted_date);
                  
                  //console.log(businessDays);
                  //it convert arrat the date time to actual date = MM/DD/YYYY format
                  dates_arr = businessDays.map((element) => {
                    var d = new Date(element);
                    // return `${d.getMonth()+1}/${d.getDate()}/${d.getFullYear()}`;
                    return `${d.getFullYear()}/${d.getMonth()+1}/${d.getDate()}`;
                  })
                  console.log(dates_arr);
                 document.getElementById("endDatee").value = endsDate;


  });
});

</script>
<script>
    	$('#show_plan_date').datetimepicker({
        format: 'L'
    });
</script>


<script>
    	$('#plans_date').datetimepicker({
        format: 'L'
    });
</script>


<script >

$(document).ready(function() {
  var interval = setInterval(function() {
    var momentNow = moment();
    $('#date').html(momentNow.format('dddd').substring(0,3).toUpperCase() + ' - ' + momentNow.format('MMMM DD, YYYY'));
    $('#time').html(momentNow.format('hh:mm:ss A'));
  }, 100);

});

</script>

<script>


// To get a list of the selected options, first we need a reference to the select list. Then we loop
//through its options collection and inspect the selected property of each option in turn
//which returns an array of selected options:
function getSelectedOptions(sel) {
	var task_val = document.getElementById("task_val").value;
	var roles = JSON.parse(task_val);
	var arr = [];
	var len = roles.ACTIVITY.length;
	if(len > 0){
	for(var i=0; i<roles.ACTIVITY.length; i++){
	if(roles.ACTIVITY[i].ACTIVITY_OWNER.length > 0)	{
	arr.push(roles.ACTIVITY[i].ACTIVITY_OWNER[0].ACTIVITY_OWNER);
	}
	}
	}
	//alert(arr);
  var opts = [],
    opt;
  var len = sel.options.length;
  for (var i = 0; i < len; i++) {
    opt = sel.options[i];

    if (opt.selected) {

      opts.push(opt.value);
      //alert(opt.value);


    }
  }
let b = new Set(opts);
let difference = [...arr].filter(x => !b.has(x));
//console.log(difference);
if(difference.length > 0){
toastr.options = {
closeButton: true,
extendedTimeOut: 0,
timeOut: 0,
tapToDismiss: false,
positionClass : "toast-top-center"
};
//$(".toast").toast({ autohide: false });
	toastr.error('Removed Employee will also be unassigned from below associated activities!')
}


  //alert(opts);
}
</script>

<script>
  // dateTime picker is very useful to enable input field for date and time entry.

$('#annsdate').datetimepicker({
        format: 'L'
    });


	$('#duedate').datetimepicker({
        format: 'L'
    });
</script>
<script>
  // add verious event on the onclick function
$("body").on("click", ".add_activity", function(event){
var task_start = document.getElementById("task_start").value;
var task_end = document.getElementById("task_end").value;
//var start = JSON.parse(task_start);
//alert(start);


$('#startdate').datetimepicker({
       format: 'L', minDate: task_start, maxDate: task_end
    });

 });
  // add activity event on the onclick function
 $("body").on("click", ".add_activitys", function(event){
var task_start = document.getElementById("task_start").value;
var task_end = document.getElementById("task_end").value;
//var start = JSON.parse(task_start);
//alert(start);

// The task start and end date
$('#startdates').datetimepicker({
       format: 'L', minDate: task_start, maxDate: task_end
    });

 });

//on click function it will edit_due
$("body").on("click", ".edit_due", function(event){
var task_start = document.getElementById("task_start").value;
var task_end = document.getElementById("task_end").value;
//var start = JSON.parse(task_start);
task_start = task_start.split(' ')[0];
task_end = task_end.split(' ')[0];
//alert(task_end);
document.getElementById("duedate").max = task_end;
document.getElementById("duedate").min = task_start;
 });


// it will give the task status
 $("body").on("click", ".task_due", function(event){

var task_end = document.getElementById("task_end").value;
//var start = JSON.parse(task_start);

task_end = task_end.split(' ')[0];
//alert(task_end);

document.getElementById("Duedate").min = task_end;
 });

$("body").on("click", ".end_activity", function(event){
var task_start = document.getElementById("task_start").value;
var task_end = document.getElementById("task_end").value;
//var start = JSON.parse(task_start);
//alert(start);


$('#enddate').datetimepicker({
       format: 'L', minDate: task_start, maxDate: task_end
    });

 });
// this is for the on click tickets it will show tickets individual by the id
$("body").on("click", ".tickets", function(event){

           var auth = $(this).attr("id");
			var values = document.getElementById(auth).getAttribute("value");
			var auths = JSON.parse(values);
			//alert(values);
			$('#tic_id').val(auths.TICKET_ID);
			$("#status").select2().val(auths.CURRENT_STATUS).trigger("change");
			$("#prior_id").select2().val(auths.TICKET_PRIORITY_ID).trigger("change");
			$("#component").select2().val(auths.TICKET_COMPONENT_ID).trigger("change");

			$('.authsModal').modal("show");



		  });
// this is for the on click activity_attach it will show tickets individual by the id
$("body").on("click", ".activity_attach", function(event){

           var auth = $(this).attr("id");
			$('#activity_id').val(auth);

			$('.modal-attachment').modal("show");



		  });

// this is for the on click auths it will show with their details
$("body").on("click", ".auths", function(event){
           var auth = $(this).attr("id");
			var values = document.getElementById(auth).getAttribute("value");
			var auths = JSON.parse(values);
			//alert(values);
			$("#status").select2().val(auths.COMPLETION_STATUS).trigger("change");
			$("#act_name").val(auths.ACTIVITY_HEADER);
			$("#act_Id").val(auths.ACTIVITY_ID);
			$("#act_desc").val(auths.ACTIVITY_DESCRIPTION);

			var date = new Date(auths.START_DATE);
		var dateString = new Date(date.getTime() - (date.getTimezoneOffset() * 60000 ))
                    .toISOString()
                    .split("T")[0];

			var date2 = new Date(auths.DUE_DATE);
		var dateString2 = new Date(date2.getTime() - (date2.getTimezoneOffset() * 60000 ))
                    .toISOString()
                    .split("T")[0];

			$("#start_date").val(dateString);
			$("#duedate").val(dateString2);

			var arr = [];
			for(var i=0; i<auths.ACTIVITY_OWNER.length; i++){
			arr.push(auths.ACTIVITY_OWNER[i].ACTIVITY_OWNER);
			}
		$("#assignment_id").select2().val(arr).trigger("change");

			//$('#auth_name').val(auths.AUTH_NAME);
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


			$('.authModal').modal("show");
		  });

$("body").on("click", ".delegated_modal", function(event){
           var auth = $(this).attr("id");
			var values = document.getElementById(auth).getAttribute("value");
			var auths = JSON.parse(values);
			//alert(values);
			$("#status").select2().val(auths.COMPLETION_STATUS).trigger("change");
			$("#act_name").val(auths.ACTIVITY_HEADER);
			$("#act_Id").val(auths.ACTIVITY_ID);
			$("#act_desc").val(auths.ACTIVITY_DESCRIPTION);

			var date = new Date(auths.START_DATE);
		var dateString = new Date(date.getTime() - (date.getTimezoneOffset() * 60000 ))
                    .toISOString()
                    .split("T")[0];

			var date2 = new Date(auths.DUE_DATE);
		var dateString2 = new Date(date2.getTime() - (date2.getTimezoneOffset() * 60000 ))
                    .toISOString()
                    .split("T")[0];

			$("#start_date").val(dateString);
			$("#duedate").val(dateString2);

			var arr = [];
			for(var i=0; i<auths.ACTIVITY_OWNER.length; i++){
			arr.push(auths.ACTIVITY_OWNER[i].ACTIVITY_OWNER);
			}

			//$('#auth_name').val(auths.AUTH_NAME);
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


			$('.authModal').modal("show");
		  });
// it is for the submit the act form  and it will show the successfull message
$('#act_form').on("submit", function(event){
event.preventDefault();
var activity = document.getElementById("act_Id").value;
let formData = new FormData(this);

$.ajax({
	  type: 'POST',
	  url: '/activity/' + activity,
	  data:formData,
	  cache:false,
        contentType: false,
        processData: false,
        success: (data) => {
           toastr.success('Activity Updated Successfully')

			  location.reload();
        },
        error: function(data){
           console.log(data);
         }
       });


});
// it is for the submit the activity_form  and it will show the successfull message
$('#activity_form').on("submit", function(event){
event.preventDefault();
var assignactivity = document.getElementById("act_Id").value;
let formData = new FormData(this);

$.ajax({
	  type: 'POST',
	  url: '/assignactivity/' + assignactivity,
	  data:formData,
	  cache:false,
        contentType: false,
        processData: false,
        success: (data) => {
           toastr.success('Activity Updated Successfully')

			  location.reload();
        },
        error: function(data){
           console.log(data);
         }
       });


});
// it is for the submit the delegated_activity_form  and it will show the successfull message
$('#delegated_activity_form').on("submit", function(event){
event.preventDefault();
var delegatedactivity = document.getElementById("act_Id").value;
//let formData = new FormData(this);
var assignment_id = document.getElementById("assignment_id").value;
var status = document.getElementById("status").value;
var duedate = document.getElementById("duedate").value;
var flag = document.getElementById("flags").value;
var act_desc = document.getElementById("act_desc").value;
var task_id = document.getElementById("task_id").value;
//alert(assignment_id);
$.ajax({
	   type: 'POST',
	  url: '/delegatedactivity/' + delegatedactivity,
	  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  },
	  data:{'_method':'PUT', assignment_id:assignment_id, status:status, duedate:duedate, flag:flag, act_desc:act_desc, task_id:task_id},
	  success:function(data){
              //alert(data.success);

			  toastr.success('Activity Updated Successfully')

			  location.href = 'http://127.0.0.1:8000/delegatedtask/'+task_id;

           }

});
});
// it is for the submit the task_form  and it will show the successfull message
$('#task_form').on("submit", function(event){
event.preventDefault();
var activity = document.getElementById("Task_Id").value;
let formData = new FormData(this);

$.ajax({
	  type: 'POST',
	  url: '/activity/' + activity,
	  data:formData,
	  cache:false,
        contentType: false,
        processData: false,
        success: (data) => {
           toastr.success('Task Updated Successfully')

			  location.reload();
        },
        error: function(data){
           console.log(data);
         }
       });


});

// it is for the submit the ticket_form  and it will show the successfull message
$('#ticket_form').on("submit", function(event){
event.preventDefault();
var response = document.getElementById("tic_id").value;
let formData = new FormData(this);

$.ajax({
	  type: 'POST',
	  url: '/response/' + response,
	  data:formData,
	  cache:false,
        contentType: false,
        processData: false,
        success: (data) => {
           toastr.success('Ticket Updated Successfully')

			  location.reload();
        },
        error: function(data){
           console.log(data);
         }
       });


});

$("body").on("click", ".authss", function(event){
           var auth = $(this).attr("id");
			var values = document.getElementById(auth).getAttribute("value");
			var auths = JSON.parse(values);
			//alert(values);

			$("#task_name").val(auths.TASK_NAME);
			$("#Task_Id").val(auths.TASK_ID);
			$("#colr_id").select2().val(auths.COLOR).trigger("change");
			$("#prior_id").select2().val(auths.PRIORITY).trigger("change");
			$('#notes').val(auths.NOTES);


			var date = new Date(auths.START_DATE);
		var dateString = new Date(date.getTime() - (date.getTimezoneOffset() * 60000 ))
                    .toISOString()
                    .split("T")[0];

			var date2 = new Date(auths.DUE_DATE);
		var dateString2 = new Date(date2.getTime() - (date2.getTimezoneOffset() * 60000 ))
                    .toISOString()
                    .split("T")[0];

			$("#Start_date").val(dateString);
			$("#Duedate").val(dateString2);

			var arr = [];
			for(var i=0; i<auths.TEAM.length; i++){
			arr.push(auths.TEAM[i].EMP_ID);
			}
		$("#team_mem").select2().val(arr).trigger("change");

			//$('#auth_name').val(auths.AUTH_NAME);
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




			$('.authsModal').modal("show");
		  });


// it will show the activity details calculate with percentage
$("body").on("click", ".activity_detail", function(event){
           var auth = $(this).attr("id");
			var values = document.getElementById(auth).getAttribute("value");
			var auths = JSON.parse(values);
			//alert(values);

			$("#act_title").html(auths.ACTIVITY_HEADER);
			if(auths.COMPLETION_STATUS == "0") {
				$("#completion_status").html('<div class="progress-bar bg-green" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>');
				$("#complete_stat").html(auths.COMPLETION_STATUS + "% Completed");
			}
			else if(auths.COMPLETION_STATUS == "25") {
				$("#completion_status").html('<div class="progress-bar bg-green" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%"></div>');
				$("#complete_stat").html(auths.COMPLETION_STATUS + "% Completed");
			}
			else if(auths.COMPLETION_STATUS == "50") {
				$("#completion_status").html('<div class="progress-bar bg-green" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%"></div>');
				$("#complete_stat").html(auths.COMPLETION_STATUS + "% Completed");
			}
			else if(auths.COMPLETION_STATUS == "75") {
				$("#completion_status").html('<div class="progress-bar bg-green" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%"></div>');
				$("#complete_stat").html(auths.COMPLETION_STATUS + "% Completed");
			}
			else if(auths.COMPLETION_STATUS == "100") {
				$("#completion_status").html('<div class="progress-bar bg-green" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>');
				$("#complete_stat").html(auths.COMPLETION_STATUS + "% Completed");
			}

			   if(auths.FLAG == "1"){
			 $("#activation_status").html('<span class="badge badge-success">Activated</span>');
			   }
			 else {
				  $("#activation_status").html('<span class="badge badge-danger">Deactivated</span>');
			   }

			   	var date = new Date(auths.START_DATE);
		var dateString = new Date(date.getTime() - (date.getTimezoneOffset() * 60000 ))
                    .toISOString()
                    .split("T")[0];

			var date2 = new Date(auths.DUE_DATE);
		var dateString2 = new Date(date2.getTime() - (date2.getTimezoneOffset() * 60000 ))
                    .toISOString()
                    .split("T")[0];

			$("#Start_Date").html(dateString);
			$("#DUEDAte").html(dateString2);
    //  it will show the due work status
			var today = new Date();
			var Difference_In_Time = today.getTime() - date2.getTime();
			var Difference_In_Days = Difference_In_Time / (1000 * 3600 * 24) + 1;
			var dif = parseInt(Math.abs(Difference_In_Days));
			var range = parseInt(Math.abs(Difference_In_Days/3));
			var range1 = Difference_In_Days - range;
			var range2 = Difference_In_Days - (range * 2);
			var completion_status = auths.COMPLETION_STATUS;

			if(completion_status == "100") {
				$("#LATE_BY").html('<span class="badge badge-success">Completed &nbsp;<i class="fas fa-thumbs-up"></i></span>');
			}
			else {
				if(today > date2) {
					$("#LATE_BY").html('<span class="badge badge-danger">Late By &nbsp;<i class="far fa-clock"></i>&nbsp;'+dif+'&nbsp;Days</span>');
					}
					else {
						if(range > 0) {
								if(dif >= range1) {
									$("#LATE_BY").html('<span class="badge badge-success">Due in &nbsp;<i class="far fa-clock"></i>&nbsp;'+dif+'&nbsp;Days</span>');

								}
								else if(dif <= range1 && dif >= range2) {
									$("#LATE_BY").html("<span class='badge badge-info'>Due in &nbsp;<i class='far fa-clock'></i>&nbsp;"+dif+"&nbsp;Days</span>");

								}
								else if(dif <= range2 && dif >= 0) {
									$("#LATE_BY").html("<span class='badge badge-orange'>Due in &nbsp;<i class='far fa-clock'></i>&nbsp;"+dif+"&nbsp;Days</span>");

								}
						}
						else {
							$("#LATE_BY").html("<span class='badge badge-orange'>Due in &nbsp;<i class='far fa-clock'></i>&nbsp;"+dif+"&nbsp;Days</span>");

						}
					}
				}


			$("#DESCRIPTION").val(auths.ACTIVITY_DESCRIPTION);

			var task_id = document.getElementById("TASK_IDS").value;
			var str = "";
			for(var i=0; i<auths.ATTACHMENT.length; i++){
				var path = "http://127.0.0.1:8000/storage/task/"+task_id+"/"+auths.ACTIVITY_ID+"/"+auths.ATTACHMENT[i].ACTIVITY_ATTACHMENT;
				str = str.concat("<blockquote><a class='text-primary' href='"+path+"' target='_blank'>"+auths.ATTACHMENT[i].ACTIVITY_ATTACHMENT+"</a></blockquote>");

			}

			var strr = "";
			for(var i=0; i<auths.ACTIVITY_OWNER.length; i++){
				if(auths.ACTIVITY_OWNER[i].ACTIVITY_OWNER_IMAGE == null){
					strr = strr.concat("<li class='col-2'><img src='/suprsales_resource/dist/img/usericon.png' alt='Member' title='"+auths.ACTIVITY_OWNER[i].ACTIVITY_OWNER_NAME+"'><div class='users-list-name'>"+auths.ACTIVITY_OWNER[i].ACTIVITY_OWNER_NAME+"</div></li>");
				}
				else {
					var path = "http://127.0.0.1:8000/storage/"+auths.ACTIVITY_OWNER[i].ACTIVITY_OWNER_IMAGE;
					strr = strr.concat("<li class='col-2'><img src='"+path+"' alt='Member' title='"+auths.ACTIVITY_OWNER[i].ACTIVITY_OWNER_NAME+"'><div class='users-list-name'>"+auths.ACTIVITY_OWNER[i].ACTIVITY_OWNER_NAME+"</div></li>");
				}

			}

			var stry = "";
			for(var i=0; i<auths.ACTIVITY_DELIGATION.length; i++){
				if(i == 0) {
				if(auths.ACTIVITY_DELIGATION[i].DELIGATION_FROM_IMAGE == null){
					stry = stry.concat("<li class='list-inline-item'><img alt='Lead' class='table-avatar' title='"+auths.ACTIVITY_DELIGATION[i].DELIGATION_FROM_NAME+"'  src='/suprsales_resource/dist/img/usericon.png'></li>");
				}
				else {
					var path = "http://127.0.0.1:8000/storage/"+auths.ACTIVITY_DELIGATION[i].DELIGATION_FROM_IMAGE;
					stry = stry.concat("<li class='list-inline-item'><img src='"+path+"' alt='Lead' class='table-avatar' title='"+auths.ACTIVITY_DELIGATION[i].DELIGATION_FROM_NAME+"'></li>");
				}
				}

			}

			for(var i=0; i<auths.ACTIVITY_DELIGATION.length; i++){
				if(auths.ACTIVITY_DELIGATION[i].DELIGATED_TO_IMAGE == null){
					stry = stry.concat("<li class='list-inline-item'><i class='fas fa-long-arrow-alt-right'></i></li><li class='list-inline-item'><img alt='Lead' class='table-avatar' title='"+auths.ACTIVITY_DELIGATION[i].DELIGATED_TO_NAME+"'  src='/suprsales_resource/dist/img/usericon.png'></li>");
				}
				else {
					var path = "http://127.0.0.1:8000/storage/"+auths.ACTIVITY_DELIGATION[i].DELIGATED_TO_IMAGE;
					stry = stry.concat("<li class='list-inline-item'><i class='fas fa-long-arrow-alt-right'></i></li><li class='list-inline-item'><img src='"+path+"' alt='Lead' class='table-avatar' title='"+auths.ACTIVITY_DELIGATION[i].DELIGATED_TO_NAME+"'></li>");
				}
			}

			$("#delegated_act").html(stry);
			$("#act_team").html(strr);
			$("#activity_ATTACHMENT").html(str);
			$("#team_member").html(auths.ACTIVITY_OWNER_COUNT + " Members");
			$('.activityDetailModal').modal("show");
		  });

</script>
<script type="text/javascript">
//  it is used to create a "new Object()". Like the init() function in jQuery returns a new jQuery object.
$(document).ready(function () {
  bsCustomFileInput.init();
  $("[data-card-widget='collapse']").click()
});
</script>
<script>
$('#emp_id').on('change', function() {
   var cust = $(this).val();

  location.href = 'custs/' + cust;

});
</script>
<script>
var response;
function mycomp(e) {
response = e.target.value;
 var current_id = document.getElementById("procs").value;
	$.ajax({
         url: '/response/' + response,
         type: 'get',
         dataType: 'json',
         success: function(response){

           var len = 0;
		   $("#processorr").empty();
		   //$('#processorr').prop('disabled', false);
		  // $("#processorr").append("<option value='' selected disabled>Select Processor</option>");

           if(response['data'] != null){
              len = response['data'].length;
           }

           if(len > 0){
              for(var i=0; i<len; i++){
                 var proc_id = response['data'][i].PROCESSOR_ID;
				 var proc_name = response['data'][i].PROCESSOR_NAME;
				 if(proc_id == current_id){
					 $("#processorr").append("<option value='"+proc_id+"' selected>"+proc_name+"</option>");
				 }
				 else {
				 $("#processorr").append("<option value='"+proc_id+"'>"+proc_name+"</option>");
				 }

              }
           }


         }

       });

}
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


	var tabll;
  tabll = $('#beat_table').DataTable({
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
            'targets': 0,
            'checkboxes': {
              'selectRow': true
            }
        },

      {   "targets": 1,
        "visible": false},
      {  "targets": 2,  className: 'dt-left'},
      { "targets": 3, className: 'dt-left'},
      {  "targets": 4, className: 'dt-center'}

	  	  ],

		  dom: 'l<"toolbar">Bfrtip',

        buttons: [
           {
                extend:    'excelHtml5',
                text:      '<i style="float:right;" class="fas fa-download"></i>',
                titleAttr: 'Excel'
            }


        ],


             initComplete: function() {
          var btns = $('.dt-button');
          btns.addClass('btn btn-success');
          btns.removeClass('dt-button');
          $("div.toolbar")

            .html('<div class="btn-group"><button  type="submit" id="btncreate" class="btn btn-success btn-sm" title="Submit"><i class="far fa-plus-square"></i> &nbsp;Create</button></div>');



             toastr.info('Select the Radius')


             $('#beatform').on('submit',function(event){
            event.preventDefault();
            
           
            var created_for=document.getElementById("created_for").getAttribute("value");
            var beat_plan_dat=document.getElementById("beat_plan_date").value;
             //alert(beat_plan_date)

            var cust_ids = tabll.rows({selected: true}).data().pluck(1).toArray();
               //var beat_plan_date=document.getElementById("beat_plan_date").value;
            var planDay=document.getElementById("planDays").value;
             // alert(beat_plan_date);==09/11/2020
            console.log(beat_plan_dat);
            var startBeatPlanDate= beat_plan_dat
            let current_datetime = new Date(beat_plan_dat);
            let start_formatted_date = (current_datetime.getMonth() + 1) + "/" + current_datetime.getDate() + "/" + current_datetime.getFullYear();
           // console.log(start_formatted_date);




             var planDays = parseInt(planDay);
             Date.prototype.addDays = function (days) {
                  const date = new Date(this.valueOf());
                  date.setDate(date.getDate() + days);
                  return date;
              };
              
              // Add 7 Days
              const date = new Date(beat_plan_dat);
              
              //console.log(date.addDays(planDays));
              var endDate=date.addDays(planDays);
              function convert(str) {
                  var date = new Date(str),
                    mnth = ("0" + (date.getMonth() + 1)).slice(-2),
                    day = ("0" + date.getDate()).slice(-2);
                  return [date.getFullYear(), mnth, day].join("-");
                }                      
                var endsDate =convert(endDate);
               // console.log(endsDate);
                let end_datetime = new Date(endsDate);
                let end_formatted_date = (end_datetime.getMonth() + 1) + "/" + end_datetime.getDate() + "/" + end_datetime.getFullYear();
               // console.log(end_formatted_date);
                   
                var end_date_=end_formatted_date.toString();

                function getBusinessDays(start_date, end_date)
                  {
                      var start = new Date(start_date);
                      var end = new Date(end_date);
                      var current = start;
                      var dates = [];
                  
                    while(current<=end) // while the "current" date is <= the end date
                    {
                      if(current.getDay() !== 7 && current.getDay() !== 0) // check if not Sat or Sun
                      {
                          dates.push(new Date(current)); // add date to array
                      }
                      current.setDate(current.getDate() + 1); // increase current date by 1 day
                    }
                  
                    return dates;
                  }
                  
                  var businessDays = getBusinessDays(start_formatted_date, end_formatted_date);
                  
                  //console.log(businessDays);
                  //it convert arrat the date time to actual date = MM/DD/YYYY format
                  dates_arr = businessDays.map((element) => {
                    var d = new Date(element);
                    // return `${d.getMonth()+1}/${d.getDate()}/${d.getFullYear()}`;
                    return `${d.getFullYear()}/${d.getMonth()+1}/${d.getDate()}`;
                  })
                  console.log(dates_arr);
                   
//
                  // //console.log(finalEndDate);
//
                  // var newEndBeatDate =convert(finalEndDate);
                  // console.log(newEndBeatDate);
             //var beat_plan_date = parseInt(planDay);    
         
            // let tdays= day1+planDays;
            // alert(tdays);

          //  alert(planDays)
          //  alert(day1);
          //  alert(month1);
          //  alert(year1);
              //  planDays
              //  Date.prototype.addDays = function (days) {
              //           const date = new Date(this.valueOf());
              //           date.setDate(date.getDate() + days);
              //           return date;
              //       };

              //  function addDays(beat_plan_date, planDays) {
              //        var result = new Date(beat_plan_date);
              //        result.setDate(result.getDate() + planDays);
              //        return result;
              //      }
                    
                
              //  // const date = new Date(beat_plan_date);
              //   console.log(beat_plan_date);
              //   console.log(planDays);
              //   console.log(addDays(beat_plan_date,planDays));
              //   //console.log(result);
            //  var endDate= addDays(beat_plan_date,planDays);
            //  console.log(endDate)
              //  //  alert(endDate);
                



        $.ajax({
	     type: 'POST',
         url: "{{ route('createbeatplan.beatupdate') }}" ,
	     //dataType: 'json';
         data:{
      
      cust_ids:cust_ids,
		  beat_plan_date:dates_arr,
     // newEndBeatDate:newEndBeatDate,
		  created_for:created_for
		  },
	      success:function(data){
              //alert(data);

			  toastr.success('Beat Plan Created Successfully')

			location.href = 'http://127.0.0.1:8000/createbeatplan';

           }

            });

        });




        $("#beat_table").show();
        },
        'select': {
          'style': 'multi',
          info: false
        },
         
        'order': [
          [1, 'asc']
        ],

    });





 })



</script>
<script>
  $(function () {

    var ta_ble;
      ta_ble = $('#viewbeattable').DataTable({
        "paging": true,
        "pageLength": 5,
        "lengthMenu": [
          [5, 10, 20, -1],
          [5, 10, 20, "All"]
        ],
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,


        columnDefs: [{
            targets: 0,
            className: 'dt-left'


          },

          {
            "targets": 1,
             className: 'dt-center'
          },
          {
            "targets": 2,
            className: 'dt-center'
          },
          {
            "targets": 3,
            className: 'dt-center'
          },
          {
            "targets": 4,
            className: 'dt-center'
          },
          
          

        ],
        dom: 'l<"toolbar">Bfrtip',

        buttons: [{
            extend: 'excelHtml5',
            text: '<i style="float:right;" class="fas fa-download"></i>',
            titleAttr: 'Excel'
          }


        ],

// The initComplete option is used to specify the function that will be invoked when the DataTable has fully loaded all the data.
        initComplete: function() {
          var btns = $('.dt-button');
          btns.addClass('btn btn-info');
          btns.removeClass('dt-button');
          $("#viewbeattable").show();
        },

        select: {
          style: 'os',
          selector: 'td:first-child'
        },
        order: [
          [1, 'asc']
        ],



      });




	 $('#sku').DataTable({
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

// it is shown for the sku datatable
$("#sku").show();
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
         .html('');


// It will show the task
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
      {  "targets": 4, className: 'dt-center'},
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
//
let barGraph;
	$('#mycustomer').on( 'click', 'tr', function () {
	var id = tabl.row( this ).id();
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

				regions.push(data['data'][i].UPTO30_DAYS)
				regions.push(data['data'][i].UPTO60_DAYS)
				regions.push(data['data'][i].UPTO90_DAYS)
				regions.push(data['data'][i].UPTO120_DAYS)
				regions.push(data['data'][i].UPTO180_DAYS)
				regions.push(data['data'][i].ABOVE180_DAYS)
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

  });

</script>








<script>
    // this is use for the level data in the user tab
var levelsetting;
function myFunction(e) {
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
		  $('#EXP_FUEL').empty();
		  $('#MAX_ALLOWED_KM').empty();

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
				 var EXP_FUEL = response['data'][i].EXP_FUEL;
				 var MAX_ALLOWED_KM = response['data'][i].MAX_ALLOWED_KM;

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
			document.getElementById("EXP_FUEL").value = EXP_FUEL;
			document.getElementById("MAX_ALLOWED_KM").value = MAX_ALLOWED_KM;

         }

       });

}
// it will update the customer exp
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
var EXP_FUEL = document.getElementById("EXP_FUEL").value;
var MAX_ALLOWED_KM = document.getElementById("MAX_ALLOWED_KM").value;

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
	  data:{'_method':'PUT', DA_RATES_LOCAL:DA_RATES_LOCAL, MAX_ALLOWED_KM:MAX_ALLOWED_KM, EXP_FUEL:EXP_FUEL, DA_RATES_OUTST:DA_RATES_OUTST, EXP_PER_KM_RATE:EXP_PER_KM_RATE, exp_bus_train:exp_bus_train, EXP_PLANE:EXP_PLANE, EXP_TAXI_AUTO:EXP_TAXI_AUTO, EXP_VEH_REPAIR:EXP_VEH_REPAIR, EXP_HOTEL:EXP_HOTEL, EXP_STATIONARY:EXP_STATIONARY, EXP_MOBILE_INTERNET:EXP_MOBILE_INTERNET, EXP_MISC:EXP_MISC},
	  success:function(data){
              //alert(data.success);

			  toastr.success('Level Expenses Updated Successfully')

			  location.href = 'http://127.0.0.1:8000/levelsettings/';

           }
});

});
  </script>
  <script>
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
