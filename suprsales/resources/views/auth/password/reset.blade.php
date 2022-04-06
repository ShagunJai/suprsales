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
<link href="{!! asset('suprsales_resource/plugins/icheck-bootstrap/icheck-bootstrap.min.css') !!}" rel="stylesheet" type="text/css"> 
 
 
 <link href="{!! asset('suprsales_resource/plugins/fontawesome-free/css/fontawesome.min.css') !!}" rel="stylesheet" type="text/css">

   <script src="{!! asset('suprsales_resource/plugins/bootstrap/jquery.min.js') !!}" type="text/javascript"></script>
	<link href="{!! asset('suprsales_resource/plugins/toastr/toastr.min.css') !!}" rel="stylesheet" type="text/css">
	<script src="{!! asset('suprsales_resource/plugins/toastr/toastr.min.js') !!}" type="text/javascript"></script>

  </style>
</head>

    

 


<body class="hold-transition login-page"  style="background-image: url('storage/Agriculture.jpg'); background-repeat: no-repeat; background-attachment: fixed; background-size: 100% 100%;">

<div class="login-box">
<div class="login-logo">
    <a href="../../index2.html"><h1 class="text-white"><b>SuprSales</b></h1></a>
  </div>
     
            <div class="card-primary">
                 <div class="card-header">Reset Password</div>
                      <div class="card-body login-card-body">
                          <form method="POST" action="/reset-password">
                           @csrf
                           <input type="hidden" name="token" value="{{ $token }}">
						   
						   <label for="email" class="col-form-label">E-Mail Address</label>
						   <div class="input-group mb-3">
						   
						<input id="email" type="email" class="form-control" name="email" value="{{ $email ?? old('email') }}" placeholder="Enter Email" autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
							  <div class="input-group-append">
								<div class="input-group-text">
								  <span class="fas fa-envelope"></span>
								</div>
							  </div>
							</div>
						 <label for="password" class="col-form-label">Password</label>  
                        <div class="input-group mb-3">
						   
						<input id="password" type="password" class="form-control" name="password" placeholder="Enter Password" autocomplete="new-password">

						@error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
							  <div class="input-group-append">
								<div class="input-group-text">
								  <span class="fas fa-lock"></span>
								</div>
							  </div>
							</div>
						
						<label for="password-confirm" class="col-form-label">Confirm Password</label>
                        <div class="input-group mb-3">
						   
						<input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Renter Password" autocomplete="new-password">
                          
							  <div class="input-group-append">
								<div class="input-group-text">
								  <span class="fas fa-lock"></span>
								</div>
							  </div>
							</div>

                      
            <button type="submit" class="btn btn-primary btn-block" style="float:right;">Reset Password</button>
          

                    
                    </form>
                </div>
            </div>
			
			
        

</div>
</body>




     	<script src="{!! asset('suprsales_resource/plugins/jquery/jquery.min.js') !!}" type="text/javascript"></script>
	<script src="{!! asset('suprsales_resource/plugins/bootstrap/js/bootstrap.bundle.min.js') !!}" type="text/javascript"></script>
	<script src="{!! asset('suprsales_resource/plugins/bootstrap/jquery-3.5.1.js') !!}" type="text/javascript"></script>
	<script src="{!! asset('suprsales_resource/plugins/select2/js/select2.full.min.js') !!}" type="text/javascript"></script>
	
	<script src="{!! asset('suprsales_resource/plugins/sweetalert2/sweetalert2.min.js') !!}" type="text/javascript"></script>
	
	<script src="{!! asset('suprsales_resource/dist/js/adminlte.min.js') !!}" type="text/javascript"></script>
	<script src="{!! asset('suprsales_resource/dist/js/demo.js') !!}" type="text/javascript"></script>
	
<script src="{!! asset('suprsales_resource/plugins/toastr/toastr.min.js') !!}" type="text/javascript"></script>	
	
	
<script type="text/javascript">
  $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

    $('.swalDefaultSuccess').click(function() {
      Toast.fire({
        icon: 'success',
        title: 'Data Inserted Successfully'
      })
    });
    $('.swalDefaultInfo').click(function() {
      Toast.fire({
        icon: 'info',
        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.swalDefaultError').click(function() {
      Toast.fire({
        icon: 'error',
        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.swalDefaultWarning').click(function() {
      Toast.fire({
        icon: 'success',
        title: 'Login Successfully'
      })
    });
    $('.swalDefaultQuestion').click(function() {
      Toast.fire({
        icon: 'question',
        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });

    $('.toastrDefaultSuccess').click(function() {
      toastr.success('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
    });
    $('.toastrDefaultInfo').click(function() {
      toastr.info('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
    });
    $('.toastrDefaultError').click(function() {
      toastr.error('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
    });
    $('.toastrDefaultWarning').click(function() {
      toastr.warning('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
    });

    $('.toastsDefaultDefault').click(function() {
      $(document).Toasts('create', {
        title: 'Toast Title',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultTopLeft').click(function() {
      $(document).Toasts('create', {
        title: 'Toast Title',
        position: 'topLeft',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultBottomRight').click(function() {
      $(document).Toasts('create', {
        title: 'Toast Title',
        position: 'bottomRight',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultBottomLeft').click(function() {
      $(document).Toasts('create', {
        title: 'Toast Title',
        position: 'bottomLeft',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultAutohide').click(function() {
      $(document).Toasts('create', {
        title: 'Toast Title',
        autohide: true,
        delay: 750,
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultNotFixed').click(function() {
      $(document).Toasts('create', {
        title: 'Toast Title',
        fixed: false,
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultFull').click(function() {
      $(document).Toasts('create', {
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.',
        title: 'Toast Title',
        subtitle: 'Subtitle',
        icon: 'fas fa-envelope fa-lg',
      })
    });
    $('.toastsDefaultFullImage').click(function() {
      $(document).Toasts('create', {
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.',
        title: 'Toast Title',
        subtitle: 'Subtitle',
        image: '../../dist/img/user3-128x128.jpg',
        imageAlt: 'User Picture',
      })
    });
    $('.toastsDefaultSuccess').click(function() {
      $(document).Toasts('create', {
        class: 'bg-success', 
        title: 'Toast Title',
        subtitle: 'Subtitle',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultInfo').click(function() {
      $(document).Toasts('create', {
        class: 'bg-info', 
        title: 'Toast Title',
        subtitle: 'Subtitle',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultWarning').click(function() {
      $(document).Toasts('create', {
        class: 'bg-warning', 
        title: 'Toast Title',
        subtitle: 'Subtitle',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultDanger').click(function() {
      $(document).Toasts('create', {
        class: 'bg-danger', 
        title: 'Toast Title',
        subtitle: 'Subtitle',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultMaroon').click(function() {
      $(document).Toasts('create', {
        class: 'bg-maroon', 
        title: 'Toast Title',
        subtitle: 'Subtitle',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
  });

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
         .html('<div class="btn-group"><button type="button" class="btn btn-success btn-sm" title="Activate">Action</button><button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown"><div class="dropdown-menu" role="menu"><a class="dropdown-item" id="btnSelectedRows">Activate</a><div class="dropdown-divider"></div><a class="dropdown-item" id="btnSelectedRow">Deactivate</a></div></button></div>');           
         
$('#btnSelectedRows').on('click', function() {

var emp = table.rows( { selected: true } ).data().pluck(6).toArray();	
var flag = table.row( { selected: true } ).data()[7];

 $.ajax({
	  type: 'POST',
	  url: "{{ route('adminn.store') }}",
	  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  },
	  data:{emp:emp, flag:flag},
	  success:function(data){
              //alert(data.success);
			  location.reload();
           }
});


});
	
$('#btnSelectedRow').on('click', function() {

var emp = table.rows( { selected: true } ).data().pluck(6).toArray();	
var flag = table.row( { selected: true } ).data()[7];

 $.ajax({
	  type: 'POST',
	  url: "{{ route('adminn.store') }}",
	  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  },
	  data:{emp:emp, flag:flag},
	  success:function(data){
              //alert(data.success);
			  location.reload();
           }
});
	
});

$("#example2").show();
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
$(document).ready(function(){ 

$('.nav-link').on("click", function(){

$('.nav-link').removeClass('active');

$(this).addClass('active');
$(this).siblings().removeClass("active");

});
});
</script>




</html>