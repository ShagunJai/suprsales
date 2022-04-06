<!DOCTYPE html>
{{-- this is for the authorization for  all the employee --}}
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
 #authorization {
    display: none;
}
  #screen {
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
.dataTables_wrapper .dt-buttons {
  float:right;
  text-align:center;
  margin-left: 1em;
}
a.paginate_button {
    background-color: #e5def7;
}
  </style>
</head>
<body class="hold-transition sidebar-mini accent-teal">
{{-- Auth::check() calls Auth::user() , gets the result from it, and then checks to see if the user exists.
The main difference is that it checks if the user is null for you so that you get a boolean value.
 As you can see, it calls the user() method, checks if it's null, and then returns a boolean value. --}}
@if(isset(Auth::user()->id))
 <div class="wrapper">

 {{--

    is verified here by email and emp_id  with help of Auth::user() methid --}}
 @php
  $user = Auth::user()->email;
  $id = Auth::user()->emp_id;
  @endphp
        <!-- Navigation -->

        <!--<nav class="navbar navbar-static-top" role="navigation">-->

     {{-- It calls sidebar and header for the authorization page --}}
			@include('layouts.header')
			@include('layouts.sidebar')

        <div class="content-wrapper">
{{-- After verification is the user is verified this will give the success message --}}
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
  // To display message in the form of notification, the message could be type of info, success, warning or error .
  // When a user signs up on your website or performs an action that needs a notification.
		</script>
  @endif
  {{-- it store the information for toster option  --}}
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

  {{-- it store the worning as a toaster for use multiple pages --}}

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

          {{-- saying this section has the name of content --}}
            @yield('content')

        </div>

        <!-- /#page-wrapper -->
        {{-- This provide the link of Samishti Infotech Private Ltd. --}}
 <footer class="main-footer bg-light">
 <small>   <strong><a href="https://www.samishti.com/" target="_blank">Samishti Infotech Private Ltd.</a></strong></small>
  </footer>

 <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
    </div>

        <!-- /#page-wrapper -->
@else
    <script>window.location = "/userlogin";</script>
   @endif

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

<script>
  // The variable which define to have one value until some condition is true
 $('input.flag').on('change.bootstrapSwitch', function (e, state) {
  //  The empty() method removes all child nodes and content from the selected elements.
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
<script type="text/javascript">
// The ready() method is used to make a function available after the document is loaded.
// Whatever code you write inside the $(document ).
//  ready() method will run once the page DOM is ready to execute
	$(document).ready(function () {

    $("#ref_type").change(function () {
      // This is used to make the object available to the private methods.
        var el = $(this);
        if (el.val() === "S") {
			$("#ref_id").empty();
            $("#ref_id").append("@isset($screen) @foreach ($screen as $value) @if($value['FLAG'] == '1')<option value='{{ $value['SCREEN_ID'] }}'>{{ $value['SCREEN_NAME'] }}</option>@endif @endforeach @endisset");
        } else if (el.val() === "M") {
			$("#ref_id").empty();
            $("#ref_id").append("@isset($module) @foreach ($module as $value) @if($value['FLAG'] == '1')<option value='{{ $value['MODULE_ID'] }}'>{{ $value['MODULE_NAME'] }}</option>@endif @endforeach @endisset");
        }
    });

});
	</script>
<!-- page script -->

<script type="text/javascript">
// The ready() method is used to make a function available after the document is loaded.
// Whatever code you write inside the $(document ).
//  ready() method will run once the page DOM is ready to execute
$(document).ready(function () {
  bsCustomFileInput.init();
});
</script>

<script>
$(document).ready(function(){

$('.nav-link').on("click", function(){

$('.nav-link').removeClass('active');

$(this).addClass('active');
// it is use for after  clicking more field
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

  });


</script>
{{-- This is the popup come after clicking edit butn inside Create Authorization Action bar --}}
<script>
 $("body").on("click", ".auths", function(event){
           var auth = $(this).attr("id");

// Get the value by Id and store the value
			var values = document.getElementById(auth).getAttribute("value");
			var auths = JSON.parse(values);

			if(auths.REF_TYPE == 'M') {
				$('#auth_types').html(' <input type="text" class="form-control" placeholder="Module" readonly>');

			}

			else {
				$('#auth_types').html(' <input type="text" class="form-control" placeholder="Screen" readonly>');


			}

    //    it store the auth value inside the the veriable
			$('#auth_name').val(auths.AUTH_NAME);
			$('#screen_name').val(auths.SCREEN_LINK);
			$('#module_name').val(auths.MODULE_PATH);
			$('#description').val(auths.DESCRIPTION);
			$('#auth_Id').val(auths.AUTH_ID);
//    if the  fag is 1 then it will call the function but the state is true
			if(auths.FLAG == '1') {
				$("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', true);
    });

					}
			else {
//    if the  fag is 1 then it will call the function but the state is true
				$("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', false);
    });
	}


			$('.authModal').modal("show");
		  });
// this is the submit function after clicking the update
$('#auth_form').on("submit", function(event){
event.preventDefault();
var auth = document.getElementById("auth_Id").value;
var auth_name = document.getElementById("auth_name").value;
var description = document.getElementById("description").value;
var flag = document.getElementById("flag").value;
// It will update the database
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
      //  after update successfully it will reload the page
			  location.reload();

           }
});


});

</script>

<!-- page script -->

</body>



</html>
