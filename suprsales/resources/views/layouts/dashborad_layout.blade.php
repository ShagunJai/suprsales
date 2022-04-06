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

<link href="{!! asset('suprsales_resource/dist/css/adminlte/dist.css') !!}" rel="stylesheet" type="text/css">

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
.sidebar-dark-navy .nav-sidebar>.nav-item>.nav-link.active,.sidebar-light-navy .nav-sidebar>.nav-item>.nav-link.active{
	background-color:#210635;color:#fff
	}
.purplenavbar{
 background-color:#210635;
}
ion-icon {
  pointer-events: none;
}
.cr {
	display: block;
	margin-bottom: 0.8em;
}
.dr {
	display: block;
	margin-bottom: -0.4em;
}
.badge-orange {
	background-color: #ff851b;
}
.table{
 background-color:#ede9f7;
}
a.paginate_button {
    background-color: #e5def7;
}
</style>	
  
</head>
<body class="hold-transition sidebar-mini accent-teal"> 

  
   
@if(isset(Auth::user()->id))
 <div class="wrapper">

<div class="preloader flex-column justify-content-center align-items-center" style="background-image: url('storage/cloud.jpg'); background-repeat: no-repeat; background-attachment: fixed; background-size: 100% 100%;">

    <img class="animation__wobble" src="suprsales_resource/dist/img/suprsales.png" alt="SuprSales" height="100" width="100">
	 <img src="suprsales_resource/dist/img/SuprsalesText.png" alt="SuprSales" height="150" width="500">
  
  </div>

 @php
  $user = Auth::user()->email;
  $id = Auth::id();
  @endphp
        <!-- Navigation -->

        <!--<nav class="navbar navbar-static-top" role="navigation">-->
			
			@include('layouts.header')
			@include('layouts.sidebar')
             

       



        <div class="content-wrapper" style="background-image: url('data:image/jpeg;base64,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'); background-repeat: no-repeat; background-attachment: fixed; background-size: 100% 100%;">


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
	<script src="{!! asset('https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.7.0') !!}" type="text/javascript"></script>
	
	<script src="{!! asset('suprsales_resource/plugins/sweetalert2/sweetalert2.min.js') !!}" type="text/javascript"></script>
	
	
	<script src="{!! asset('suprsales_resource/dist/js/adminlte/admin3.js') !!}" type="text/javascript"></script>
	
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
	
	<script src="{!! asset('suprsales_resource/plugins/jquery-knob/jquery.knob.min.js') !!}" type="text/javascript"></script>
	
	<script src="{!! asset('suprsales_resource/plugins/datatables/buttons.html5.min.js') !!}" type="text/javascript"></script>
	
	<script src="{!! asset('suprsales_resource/plugins/bootstrap/bootstrap4-toggle.min.js') !!}" type="text/javascript"></script>
	<script src="{!! asset('suprsales_resource/plugins/datatables/dataTables.checkboxes.min.js') !!}" type="text/javascript"></script>
	<!-- page script -->
<script>
  $(function () {
    /* jQueryKnob */

    $('.knob').knob({
      /*change : function (value) {
       //console.log("change : " + value);
       },
       release : function (value) {
       console.log("release : " + value);
       },
       cancel : function () {
       console.log("cancel : " + this.value);
       },*/
      draw: function () {

        // "tron" case
        if (this.$.data('skin') == 'tron') {

          var a   = this.angle(this.cv)  // Angle
            ,
              sa  = this.startAngle          // Previous start angle
            ,
              sat = this.startAngle         // Start angle
            ,
              ea                            // Previous end angle
            ,
              eat = sat + a                 // End angle
            ,
              r   = true

          this.g.lineWidth = this.lineWidth

          this.o.cursor
          && (sat = eat - 0.3)
          && (eat = eat + 0.3)

          if (this.o.displayPrevious) {
            ea = this.startAngle + this.angle(this.value)
            this.o.cursor
            && (sa = ea - 0.3)
            && (ea = ea + 0.3)
            this.g.beginPath()
            this.g.strokeStyle = this.previousColor
            this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sa, ea, false)
            this.g.stroke()
          }

          this.g.beginPath()
          this.g.strokeStyle = r ? this.o.fgColor : this.fgColor
          this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sat, eat, false)
          this.g.stroke()

          this.g.lineWidth = 2
          this.g.beginPath()
          this.g.strokeStyle = this.o.fgColor
          this.g.arc(this.xy, this.xy, this.radius - this.lineWidth + 1 + this.lineWidth * 2 / 3, 0, 2 * Math.PI, false)
          this.g.stroke()

          return false
        }
      }
    })
    /* END JQUERY KNOB */

   
  })

</script>
<script type="text/javascript">
var ctx = document.getElementById('line');
		
		var valuess = document.getElementById("line").getAttribute("value");
		var monsales = JSON.parse(valuess);
	let total_sales = [];
	let mon_year = [];
	 var monlen = 0;
		  
           if(monsales != null){
              monlen = monsales.length;
           }
		   if(monlen > 0){
	for(var j=0; j<monlen; j++){
	
		 total_sales.push(Math.abs(monsales[j].TOTAL_SALES));
		mon_year.push(monsales[j].MONTH_YEAR)	
		
			
	}
		   
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'line',

    // The data for our dataset
    data: {
        labels: [...mon_year],
        datasets: [{
            label: 'Total Sales',
			backgroundColor: [
         'rgba(54, 162, 235, 0.2)',
      ],
      borderColor: [
        'rgba(54, 162, 235, 1)',
        'rgba(255,99,132, 1)',
        'rgba(255, 206, 86, 1)',
        'rgba(60,186,159, 1)',
        'rgba(153, 102, 255, 1)',
        'rgba(255, 159, 64, 1)',
        'rgba(255,99,132,1)',
        'rgba(255, 159, 64, 1)',
        'rgba(255, 206, 86, 1)',
        'rgba(75, 192, 192, 1)',
        'rgba(153, 102, 255, 1)',
        'rgba(255, 159, 64, 1)'
      ],
      borderWidth: 1,
      hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
      hoverBorderColor: 'rgba(200, 200, 200, 1)',
            data: [...total_sales]
        }]
    },

    // Configuration options go here
   options: {
    plugins: {
      datalabels: {
         // hide datalabels for all datasets
         display: false
      }
    }
  }
});
}

</script>

<script type="text/javascript">
var ctx = document.getElementById('world-map');
var valu = document.getElementById("world-map").getAttribute("value");
		var plantsales = JSON.parse(valu);
		
	let tota_sales = [];
	let mon_yea = [];
	 var monle = 0;
		  
           if(plantsales != null){
              monle = plantsales.length;
           }
		   if(monle > 0){
	for(var j=0; j<monle; j++){
	
		 tota_sales.push(Math.abs(plantsales[j].TOTAL_SALES));
		mon_yea.push(plantsales[j].PLANT_NAME)	
		
			
	}
var myBubbleChart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'horizontalBar',

    // The data for our dataset
    data: {
        labels : [...mon_yea],
        datasets: [{
                        label: 'Total Sales',
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
                        data: [...tota_sales],
                    }]
    },

    // Configuration options go here
     options: {
		 indexAxis: 'y',
    plugins: {
      datalabels: {
         // hide datalabels for all datasets
         display: false
      }
    }
  }
});
		   }
		   

</script>
<script>
 $("body").on("click", ".sales", function(event){   
           var sales = $(this).attr("id"); 
		 	   
			var valuess = document.getElementById(sales).getAttribute("value");
			var sales = JSON.parse(valuess);
	let tot_sales = [];
	let qt_year = [];
	 var len = 0;
		  
           if(sales != null){
              len = sales.length;
           }
		   if(len > 0){
	for(var j=0; j<len; j++){
	
		 tot_sales.push(Math.abs(sales[j].TOTAL_SALES));
		qt_year.push(sales[j].QTR_YEAR)	
		
			
	}
		  
			
			var ctx = document.getElementById('bar');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'bar',

    // The data for our dataset
    data: {
        labels : [...qt_year],
        datasets: [{
                        label: 'Total Sales',
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
                        data: [...tot_sales],
                    }]
    },

    // Configuration options go here
     options: {
    plugins: {
      datalabels: {
         // hide datalabels for all datasets
         display: false
      }
    }
  }
});
			
			$('.salesModal').modal("show"); 
			 }
			else {
				toastr.warning('No Quarterly Sales Records Found')
			}
		  });
		  
		  
$("body").on("click", ".claim", function(event){   
           var claim = $(this).attr("id"); 
		 	   
			var valuess = document.getElementById(claim).getAttribute("value");
			var claim = JSON.parse(valuess);
	for(var j=0; j<claim.length; j++){
		var submits = claim[j].SUBMITTED_AMOUNT;
	}		
		
	 if(submits != null){		
	for(var j=0; j<claim.length; j++){
		var SUBMITTED_AMOUNT = Math.abs(claim[j].SUBMITTED_AMOUNT);
		var PENDING_AMOUNT = Math.abs(claim[j].PENDING_AMOUNT);
		var APPROVED_AMOUNT = Math.abs(claim[j].APPROVED_AMOUNT);
		var REJECTED_AMOUNT = Math.abs(claim[j].REJECTED_AMOUNT);	
	}
			
			var ctx = document.getElementById('pie');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'doughnut',

    // The data for our dataset
    data: {
        labels: [
    'Approved',
    'Pending',
    'Rejected'
  ],
  datasets: [{
    label: 'My First Dataset',
    data: [APPROVED_AMOUNT, PENDING_AMOUNT, REJECTED_AMOUNT],
    backgroundColor: [
      '#28a745',
      '#17a2b8',
      '#dc3545'
    ],
    hoverOffset: 4
  }]
    },


    // Configuration options go here
     options: {
    plugins: {
      datalabels: {
		  color: '#FFFFFF',
        formatter: (value) => {
			var num = (value*100)/SUBMITTED_AMOUNT;
          return num.toFixed(1) + '%';
        }
      }
    }
  }
});
			
			$('.claimModal').modal("show"); 
	 }

	 else {
				toastr.warning('No Claims Found')
			}
		  });
		  
		  
 $("body").on("click", ".ticket", function(event){   
           var ticket = $(this).attr("id"); 
		 	   
			var valuess = document.getElementById(ticket).getAttribute("value");
			var ticket = JSON.parse(valuess);
			
	let resolved = [];
	let pending = [];
	let in_process = [];
	let month_year = [];
	 var len = 0;
		  
           if(ticket != null){
              len = ticket.length;
           }
		   if(len > 0){
	for(var j=0; j<len; j++){
	
		 resolved.push(ticket[j].RESOLVED);
		pending.push(ticket[j].PENDING);	
		in_process.push(ticket[j].IN_PROCESS);
		month_year.push(ticket[j].MONTH_YEAR);
	}
				var ctx = document.getElementById("ticket");

var data = {
  labels: [...month_year],
  datasets: [{
    label: "Resolved",
    backgroundColor: "#28a745",
    data: [...resolved]
  }, {
    label: "Pending",
    backgroundColor: "#17a2b8",
    data: [...pending]
  }, {
    label: "In Process",
    backgroundColor: "#ffc107",
    data: [...in_process]
  }]
};

var myBarChart = new Chart(ctx, {
  type: 'bar',
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

			
			
			$('.ticketModal').modal("show"); 
		   }
		   else{
			   toastr.warning('No Tickets Found')
		   }
		  });

 $('#prod').DataTable({
		 "paging": true,
	  "pageLength": 4,
	  "lengthMenu": [[4, 10, -1], [4, 10, "All"]],
      "lengthChange": true,
      "searching": true,
      "ordering": false,
      "info": true,
      "autoWidth": false,
      "responsive": true,
	  'columnDefs': [
         {
            'targets': 0,
			className: 'dt-center'
         },
         {
          targets: 1
         },
		 {
          targets: 2
         },
		 {
          targets: 3,
          className: 'dt-right'
         }
      ],
      "dom": 'l<"toolbar">frtip',
		
		'select': {
         'style': 'multi',
		  info: false
      }
    } );
	
	$('#tasks').DataTable({
		 "paging": false,
      "lengthChange": false,
      "searching": true,
      "ordering": false,
      "info": true,
      "autoWidth": false,
      "responsive": true,
	  'columnDefs': [
         {
            'targets': 0,
			"width" : "35%"
         },
         {
          targets: 1,
		  "width" : "65%"
         }
      ],
      "dom": 'l<"toolbar">frtip',
		
		'select': {
         'style': 'multi',
		  info: false
      }
    } );

$('#distributor').DataTable({
		 "paging": true,
	  "pageLength": 4,
	  "lengthMenu": [[4, 10, -1], [4, 10, "All"]],
      "lengthChange": true,
      "searching": true,
      "ordering": false,
      "info": true,
      "autoWidth": false,
      "responsive": true,
	  'columnDefs': [
         {
            'targets': 0
         },
         {
          targets: 1,
          className: 'dt-right',
		  width:"20%"
         }
      ],
      "dom": 'l<"toolbar">frtip',
		
		'select': {
         'style': 'multi',
		  info: false
      }
    } );	
		  
$("body").on("click", ".products", function(event){   
           var products = $(this).attr("id"); 
		 	   
			var valuess = document.getElementById(products).getAttribute("value");
			var productss = JSON.parse(valuess);
			
			//$('#customers').val(productss.CUSTOMER_ID); 
	
			$('.productsModal').modal("show"); 
		  });
		  
$("body").on("click", ".task", function(event){   
          
	
			$('.taskModal').modal("show"); 
		  });
		  
  $("body").on("click", ".dist", function(event){   
   var dist = $(this).attr("id"); 
	   
	var valuess = document.getElementById(dist).getAttribute("value");
	var dists = JSON.parse(valuess);
	
	//$('#customers').val(dists.CUSTOMER_ID); 

	$('.distModal').modal("show"); 
  });
		  
</script>
<script type="text/javascript">
$(document).ready(function () {
  bsCustomFileInput.init();
  $("[data-card-widget='collapse']").click()
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