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
<style>
.mobapp {
position: fixed;
    bottom: 0;
    right: 0;
  }
  .mobapps {
position: absolute;
    bottom: 30px;
    right: 0px;
  }
</style>	
 
</head>

    
@if($errors->any())
  <h6 class="text-white">{{$errors->first()}}</h4>
@endif
 


<body class="hold-transition login-page" style="background-image: url('/storage/Agriculture.jpg'); background-repeat: no-repeat; background-attachment: fixed; background-size: 100% 100%;">
<div class="login-box">
 
  <!-- /.login-logo -->
  <div class="card">
  <br>
   <div class="text-center">
         <img src="/suprsales_resource/dist/img/suprsales.png" style="height:15%; width:15%;">
		    <span>
    <img src="/suprsales_resource/dist/img/SuprsalesText.png" style="height:60%; width:60%;">
  </span>
  </div>
    <div class="card-body login-card-body">
     
		
	@if(isset(Auth::user()->id))
    <script>window.location="/adminn";</script>
   @endif

@if ($message = Session::get('message'))
   <div class="alert alert-info alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
   </div>
   @endif
   
   @if ($message = Session::get('error'))
   <div class="alert alert-danger alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
   </div>
   @endif

   @if (count($errors) > 0)
    <div class="alert alert-danger">
     <ul>
     @foreach($errors->all() as $error)
      <li>{{ $error }}</li>
     @endforeach
     </ul>
    </div>
   @endif

      
	  <form class="form-horizontal" action="{{route('userlogin.store')}}" method="POST">
			 {{ csrf_field() }}
			 
			 <input name="device" id="device" type="hidden" class="form-control" value="">
			 <input name="browser" id="browser" type="hidden" class="form-control" value="">
        <div class="input-group mb-3">
          <input name="emp_id" class="form-control" placeholder="Employee ID">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user-tie"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember" name="remember_me">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" onclick="myFunction()" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

     

      <p class="mb-1">
        <a href="forget-password">I forgot my password</a>
      </p>
	  <br>
	  <div class="card-footer">
         Samishti Infotech Pvt Ltd
        </div>
    </div>
    <!-- /.login-card-body -->
	 


  </div>
 
</div>


 

</body>

@php
$userlogin = 1;
@endphp

<div class="mobapp">
<form class="form-horizontal" action="{{route('userlogin.update', $userlogin)}}" method="POST">
			 {{ csrf_field() }}
			 {{ method_field('PUT') }}
<button type="submit" class="btn btn-info btn-lg"><i class="fas fa-download"></i>
Click here to Download Mobile App
</button>
 </form>
</div>
        <!-- /#page-wrapper -->

		

    <!-- /#wrapper -->


	<script src="{!! asset('suprsales_resource/plugins/jquery/jquery.min.js') !!}" type="text/javascript"></script>
	<script src="{!! asset('suprsales_resource/plugins/bootstrap/js/bootstrap.bundle.min.js') !!}" type="text/javascript"></script>
	<script src="{!! asset('suprsales_resource/plugins/bootstrap/jquery-3.5.1.js') !!}" type="text/javascript"></script>
	<script src="{!! asset('suprsales_resource/plugins/select2/js/select2.full.min.js') !!}" type="text/javascript"></script>
	
	<script src="{!! asset('suprsales_resource/plugins/sweetalert2/sweetalert2.min.js') !!}" type="text/javascript"></script>
	
	<script src="{!! asset('suprsales_resource/dist/js/adminlte.min.js') !!}" type="text/javascript"></script>
	<script src="{!! asset('suprsales_resource/dist/js/demo.js') !!}" type="text/javascript"></script>
	
<script src="{!! asset('suprsales_resource/plugins/toastr/toastr.min.js') !!}" type="text/javascript"></script>	
	<script>
 function myFunction() {
	var userAgent = navigator.userAgent.toLowerCase(); 
			var Windows = userAgent.indexOf("windows") > -1; 
			var Mac = userAgent.indexOf("mac") > -1; 
			var Android = userAgent.indexOf("android") > -1; 
			var Ios = userAgent.indexOf("ios") > -1; 
			var Chrome = userAgent.indexOf("chrome") > -1; 
			var Firefox = userAgent.indexOf("firefox") > -1; 
			
			var res = "Device not found."
			var browser = "Browser Not compatible.";
              
            if(Windows) { 
               res = "Windows"; 
            } 
			
			if(Mac) { 
                res = "Mac"; 
            } 
			
			if(Android) { 
                res = "Android"; 
            } 
			
			if(Ios) { 
                res = "iOS"; 
            } 
			
			
			document.getElementById("device").value = res;
			
			if(Chrome) { 
                browser = "Chrome"; 
            }
			
			if(Firefox) { 
                browser = "Firefox"; 
            } 
			document.getElementById("browser").value = browser;
 }
	</script>
	

</html>