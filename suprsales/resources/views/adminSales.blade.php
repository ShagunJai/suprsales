<!DOCTYPE html>

<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SuprSales</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="{!! asset('suprsales_resource/plugins/fontawesome-free/css/all.min.css') !!}" rel="stylesheet" type="text/css">
<link href="{!! asset('suprsales_resource/dist/css/adminlte.min.css') !!}" rel="stylesheet" type="text/css">
<link href="{!! asset('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700') !!}" rel="stylesheet" type="text/css">
<link href="{!! asset('suprsales_resource/plugins/daterangepicker/daterangepicker.css') !!}" rel="stylesheet" type="text/css">
 <link href="{!! asset('suprsales_resource/plugins/icheck-bootstrap/icheck-bootstrap.min.css') !!}" rel="stylesheet" type="text/css"> 
 <link href="{!! asset('suprsales_resource/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') !!}" rel="stylesheet" type="text/css">
<link href="{!! asset('suprsales_resource/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') !!}" rel="stylesheet" type="text/css">
<link href="{!! asset('suprsales_resource/plugins/select2/css/select2.min.css') !!}" rel="stylesheet" type="text/css">
<link href="{!! asset('suprsales_resource/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') !!}" rel="stylesheet" type="text/css">
<link href="{!! asset('suprsales_resource/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css') !!}" rel="stylesheet" type="text/css">


  
  
  <link href="{!! asset('suprsales_resource/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') !!}" rel="stylesheet" type="text/css">
  <link href="{!! asset('suprsales_resource/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') !!}" rel="stylesheet" type="text/css">
  <link href="{!! asset('https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css') !!}" rel="stylesheet" type="text/css">
  <link href="{!! asset('https://cdn.datatables.net/select/1.3.1/css/select.dataTables.min.css') !!}" rel="stylesheet" type="text/css">
  <link href="{!! asset('https://cdn.datatables.net/buttons/1.6.4/css/buttons.dataTables.min.css') !!}" rel="stylesheet" type="text/css">
  
  
  <link href="{!! asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css') !!}" rel="stylesheet" type="text/css">
  
  <link href="{!! asset('https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css') !!}" rel="stylesheet" type="text/css">
  <!-- Font Awesome -->
  <style>
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
            <h1> Sales Order </h1>
            
        
          </div>
         
          <div class="col-sm-6">


            
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard.index')}}">Home</a></li>
              <li class="breadcrumb-item active">Sales</li>
            </ol>




          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
	
<section class="content">
      <div class="container-fluid">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Apply Search</h3>
  
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Expand">
                <i class="fas fa-minus"></i></button>
             
            </div>
          </div>

          <div class="card-body">
            <form class="form-horizontal">
              <div class="form-group row select2-green">
                <label  class="col-sm-2 col-form-label">Employee Name:</label>
                <div class="col-sm-5">
                  <select class="select2" multiple="multiple" data-placeholder="Select a Role" data-dropdown-css-class="select2-green" style="width: 100%;">
                      <option>Aman jain</option>
                      <option>jaisharma</option>
                      <option>luck Soni</option>
                      <option>viay</option>
                  
                    </select>
                  
                </div>
              </div>
              <div class="form-group row ">
                        
                <label  class="col-sm-2  col-form-label">Date range:</label>
                
                 
    
                  <div class=" col-sm-5 input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="far fa-calendar-alt"></i>
                      </span>
                    </div>
                    <input type="text" class="form-control float-right" id="reservation">
                  </div>
    
               
                
              </div>
              <div class="form-group row ">
                        
                
                
                <label  class="col-sm-2  col-form-label">Date:</label>
                <div class="col-sm-5">
                     <div class="input-group date" id="reservationdate" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate"/>
                            <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
             
                </div>
              </div>
              <div class="form-group row select2-green">
                <label  class="col-sm-2 col-form-label">Quarter:</label>
                <div class="col-sm-5">
                  <select class="select2" multiple="multiple" data-placeholder="Select a Quarter" data-dropdown-css-class="select2-green" style="width: 100%;">
                      <option>Q1</option>
                      <option>Q2</option>
                      <option>Q3</option>
                      <option>Q4</option>
                  
                    </select>
                  
                </div>
    
    
                  
    
               
                
              </div>




              <div class="form-group row select2-green">  

              <label  class="col-sm-2  col-form-label">Year:</label>
              <div class="col-sm-5">
                  <select class="select2" multiple="multiple" data-placeholder="Select Year" style="width: 100%;">
              
                    <option selected="selected">2020</option>
                  
                    <option>2025</option>
                    <option>2024</option>
                    <option>2023</option>
                    <option>2022</option>
                    <option>2021</option>
                    <option>2020</option>
                    <option>2020</option>
                    <option>2019</option>
                    <option>2018</option>
                    <option>2017</option>
                    <option>2016</option>
                  
  
  
                   
                  </select>
              </div>
              </div>

              

            </form>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
          
          </div>
          <!-- /.card-footer-->
        </div>
  

       
          <hr><br>
         
        <div class="row">
              <!-- /.content -->
               <!-- Small boxes (Stat box) -->
   
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3>150</h3>
  
                  <p>Total Order</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3>53<sup style="font-size: 20px">$</sup></h3>
  
                  <p>Order Value</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                  <div class="inner">
                    <h3>150</h3>
    
                    <p>Unique Orders</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-bag"></i>
                  </div>
                  </div>
              </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-danger">
                <div class="inner">
                  <h3>65</h3>
  
                  <p>Top Territories</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                 </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                
                  <div class="card-body">
                    <div class="tab-content">
                  
                      <!-- /.tab-pane -->
                     
                        <!-- The timeline -->
                        <div class="timeline timeline-inverse">
                          <!-- timeline time label -->
                          <div class="time-label">
                            <span class="bg-danger">
                              10 Feb. 2014
                            </span>
                          </div>
                          <!-- /.timeline-label -->
                          <!-- timeline item -->
                          <div>
                            <i class="fas fa-envelope bg-primary"></i>
    
                            <div class="timeline-item">
                              <span class="time"><i class="far fa-clock"></i> 12:05</span>
    
                              <h3 class="timeline-header"><a href="#">Company Name-Address</a></h3>
    
                              <div class="timeline-body">
                               <h6>Customer code</h6>
                               <h6>Order Number</h6>
                               <h6>Plant</h6>
                               <h6>Ordered Items</h6>
                                    
                                <table class="table table-bordered table-striped" cellspacing  ="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Code</th>
                                        <th>Description</th>
                                        
                                        <th>Quantity</th>
                                        <th>Price / Unit</th>
                                        
                                        <th>Total</th>
                                        
                    
                                    </tr>
                                </thead>
                                    <tbody>
                                    <tr>
                              <td>FCPRIALP0003</td>
                              <td>Prime Gold 100MlX50 Peb</td>
                                  <td>1</td>
                                  <td>	419</td>
                                  <td>419</td>
                                
                             
                              
                            </tr>
                            <tr>
                                <td>FCTWISLH0000</td>
                              <td>Twister 1 Ltrx10 Plb</td>
                                  <td>5</td>
                                  <td>	224.6</td>
                                  <td>1123</td> 
                            </tr>
                    
                            <tr>
                                <td>FCHIT4LH0004</td>
                                <td>	Hit-44 1 Ltrx10 Pet Bottle</td>
                                    <td>10</td>
                                    <td>199</td>
                                    <td>1990</td>
                                       
                            </tr>
                            <tr>
                                <td>FCVICBGI0001</td>
                                <td>	Victor Plus 30 Gmx75 Hdpeb</td>
                                    <td>1</td>
                                    <td>2492</td>
                                    <td>2492</td>
                                       
                            </tr>
                            <tr>
                                <td>FSWEEAWH0002</td>
                                <td>Weed Grip 8Gmx50 Units</td>
                                
                                    <td>2</td>
                                    <td>33</td>
                                    <td>3300</td>
                                       
                            </tr>
                        
                                    </tbody>
                                    <tfoot>
                                      <th></th>
                                      <th></th>
                                      
                                      <th></th>
                                      <th>Grand Total</th>
                                      
                                      <th>9324</th>
                                    </tfoot>
                           </table>
                               
                              </div>
                            
                            </div>
                          </div>
                          <!-- END timeline item -->
                          <!-- timeline item -->
                         
                          <!-- END timeline item -->
                          <!-- timeline item -->
                          
                          <!-- END timeline item -->
                          <div>
                            <i class="far fa-clock bg-gray"></i>
                          </div>
                        </div>
                      </div>
                      <!-- /.tab-pane -->
    
                     
                      <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                  </div><!-- /.card-body -->
                </div>
                <!-- /.nav-tabs-custom -->
              </div>   

  <!-- /.content-wrapper -->
</div>

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
	<script src="{!! asset('https://code.jquery.com/jquery-3.5.1.js') !!}" type="text/javascript"></script>
	<script src="{!! asset('suprsales_resource/plugins/select2/js/select2.full.min.js') !!}" type="text/javascript"></script>
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
	<script src="{!! asset('https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js') !!}" type="text/javascript"></script>
	<script src="{!! asset('https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js') !!}" type="text/javascript"></script>
	<script src="{!! asset('https://cdn.datatables.net/buttons/1.6.4/js/dataTables.buttons.min.js') !!}" type="text/javascript"></script>
	<script src="{!! asset('https://cdn.datatables.net/buttons/1.6.4/js/buttons.print.min.js') !!}" type="text/javascript"></script>
	<script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.colVis.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.print.min.js"></script>
	<script src="{!! asset('https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js') !!}" type="text/javascript"></script>
	
	<script src="{!! asset('suprsales_resource/dist/js/adminlte.min.js') !!}" type="text/javascript"></script>
	<script src="{!! asset('suprsales_resource/dist/js/demo.js') !!}" type="text/javascript"></script>
<!-- page script -->
<script>
  $(document).ready(function(){
   $(".update").click(function(){
       var id = $(this).data("uid");
       var f1 = $("#f1").html();
       var l1 = $("#l1").html();
       var m1 = $("#m1").html();
       var f2 = $("#f2").html();
       var l2 = $("#l2").html();
       var m2 = $("#m2").html();
       if(id==1){
           $("#fn").val(f1);
           $("#mn").val(m1);
           $("#ln").val(l1);
       }else if(id==2){
           $("#fn").val(f2);
           $("#mn").val(m2);
           $("#ln").val(l2);
       }
       $("#up").click(function(){
           if(id==1){
               var fn = $("#fn").val();
               var mn = $("#mn").val();
               var ln = $("#ln").val();    
               $("#f1").html(fn);
               $("#m1").html(mn);
               $("#l1").html(ln);
           }else if(id==2){
               var fn = $("#fn").val();
               var mn = $("#mn").val();
               var ln = $("#ln").val();    
               $("#f2").html(fn);
               $("#m2").html(mn);
               $("#l2").html(ln);              
           }
       });
   });
   $(".delete").click(function(){
      var id = $(this).data("uid");
      $("#del").click(function(){
          if(id==1){
              $("#d1").html('');
          }else if(id==2){
              $("#d2").html('');
          }
      });
   });
});
</script>

<!--asiign role table script-->
<script>
  $(function () {
    $("#assignrole").DataTable({
      "responsive": true,
      "autoWidth": false,
      "paging": true,
      "ordering": true,
      "info": true,
    });
    
  });
</script>
<!-- Page script -->


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
    //Date range picker

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