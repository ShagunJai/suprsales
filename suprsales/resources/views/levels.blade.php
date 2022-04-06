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
  <link href="{!!asset('suprsales_resource/plugins/ekko-lightbox/ekko-lightbox.css')!!}" rel="stylesheet" type="text/css">

  <link href="{!! asset('suprsales_resource/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') !!}" rel="stylesheet" type="text/css">
  <!-- Toastr -->
  <link href="{!! asset('suprsales_resource/plugins/toastr/toastr.min.css') !!}" rel="stylesheet" type="text/css">

  <link href="{!! asset('suprsales_resource/dist/css/adminlte.min.css') !!}" rel="stylesheet" type="text/css">
  <link href="{!! asset('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700') !!}" rel="stylesheet" type="text/css">
  <link href="{!! asset('suprsales_resource/plugins/daterangepicker/daterangepicker.css') !!}" rel="stylesheet" type="text/css">
  <link href="{!! asset('suprsales_resource/plugins/icheck-bootstrap/icheck-bootstrap.min.css') !!}" rel="stylesheet" type="text/css">
  <link href="{!! asset('suprsales_resource/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') !!}" rel="stylesheet" type="text/css">
  <link href="{!! asset('suprsales_resource/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') !!}" rel="stylesheet" type="text/css">
  <link href="{!! asset('suprsales_resource/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css') !!}" rel="stylesheet" type="text/css">


  <!-- Ionicons -->
  <link href="{!! asset('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css')!!}" rel="stylesheet" type="text/css">


  <link href="{!! asset('suprsales_resource/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') !!}" rel="stylesheet" type="text/css">
  <link href="{!! asset('suprsales_resource/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') !!}" rel="stylesheet" type="text/css">
  <link href="{!! asset('https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css') !!}" rel="stylesheet" type="text/css">
  <link href="{!! asset('https://cdn.datatables.net/select/1.3.1/css/select.dataTables.min.css') !!}" rel="stylesheet" type="text/css">
  <link href="{!! asset('https://cdn.datatables.net/buttons/1.6.4/css/buttons.dataTables.min.css') !!}" rel="stylesheet" type="text/css">

  <link rel="stylesheet" href="{!! asset('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css')!!}">
  <link href="{!! asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css') !!}" rel="stylesheet" type="text/css">

  <link href="{!! asset('https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css') !!}" rel="stylesheet" type="text/css">
  <!-- Font Awesome -->
  <script src="{!! asset('https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js') !!}" type="text/javascript"></script>
	<link href="{!! asset('https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css') !!}" rel="stylesheet" type="text/css">
	<script src="{!! asset('https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js') !!}" type="text/javascript"></script>
	
  <style>
    #announcement-table {
      display: none;
    }

    div.dataTables_length {
      margin-right: 1em;
    }

    .toolbar {
      float: left;
    }

    .dataTables_wrapper .dt-buttons {
      float: right;
      text-align: center;
      margin-left: 1em;
    }
  </style>
</head>

<body class="hold-transition sidebar-mini accent-teal">
  @if(isset(Auth::user()->id))
  <div class="wrapper">



    <!-- Navigation -->

    <!--<nav class="navbar navbar-static-top" role="navigation">-->

   	<nav class="main-header navbar navbar-expand navbar-dark navbar-navy">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="adminn" class="nav-link">Home</a>
      </li>
      
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3" action="/search" method="POST" role="search">
	{{ csrf_field() }}
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" name="q" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item">
      <form action="/announce" method="GET">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="nav-icon fas fa-bullhorn"></i>
          <span class="badge navbar-badge bg-teal">@isset($announcement) {{count($announcement)}} @endisset</span>
       
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header bg-light">@isset($announcement) {{count($announcement)}} Announcements @endisset</span>
		  @isset($announcement)
       @foreach ($announcement as $index => $value)
		  @if((count($announcement) - 1) == $index)
          <a href="#" class="dropdown-item">
		  {{ $value['TITLE'] }}
            <span class="float-right text-muted text-sm">{{ \Carbon\Carbon::parse($value['VALID_TILL'])->format('d/m/Y')}}</span> 
          </a>
		  @endif
          
          @if((count($announcement) - 2) == $index)
          <a href="#" class="dropdown-item">
		  {{ $value['TITLE'] }}
            <span class="float-right text-muted text-sm">{{ \Carbon\Carbon::parse($value['VALID_TILL'])->format('d/m/Y')}}</span> 
          </a>
		  @endif
          
         @if((count($announcement) - 3) == $index)
          <a href="#" class="dropdown-item">
		  {{ $value['TITLE'] }}
            <span class="float-right text-muted text-sm">{{ \Carbon\Carbon::parse($value['VALID_TILL'])->format('d/m/Y')}}</span> 
          </a>
		  @endif
		  @endforeach
        @endisset
        
          <a href="http://apps.insecticidesindia.com:8030/myann" class="dropdown-item dropdown-footer bg-light">See All Announcements</a>
        </div>
		
		</form>
      <!-- Notifications Dropdown Menu -->
      </li>
	  @php
  $username = Auth::user()->name;
  $image = Auth::user()->image;
  $email = Auth::user()->email;
  @endphp
	   <li class="dropdown user user-menu nav-item">
	    <a class="nav-link" data-toggle="dropdown" href="#">
         <img src="{{ URL::asset('storage/'.$image) }}" class="user-image" alt=""/>
                  
        </a>
                
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header bg-secondary">
                    <img src="{{ URL::asset('storage/'.$image) }}" class="img-circle" alt="" />
                    <p>
                      {{ $username }}
                      <small>{{ $email }}</small>
                    </p>
                  </li>
                  
                  <!-- Menu Footer-->
                  <li class="user-footer bg-white">
                      <div class="pull-left">
                      <a href="http://apps.insecticidesindia.com:8030/loginprofile" class="btn btn-default btn-flat bg-primary">Profile</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <div class="pull-right" style="float:right;">
                      <a href="{{ route('userlogin.logout')}}" style="float:right;" class="btn btn-default btn-flat">Sign out</a>
                    </div>
					</div>
                  </li>
                </ul>
              </li>
			  
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
	  
    </ul>
  </nav>
			<aside class="main-sidebar sidebar-dark-teal elevation-4">
    <!-- Brand Logo -->
     <a href="#" class="brand-link bg-success">
      <img src="/suprsales_resource/dist/img/AdminLTELogo.png"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">SuprSales</span>
    </a>
@php
  $username = Auth::user()->name;
  $image = Auth::user()->image;
  @endphp
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ URL::asset('storage/'.$image) }}" class="img-circle elevation-2" alt="">
        </div>
        <div class="info">
          <a href="loginprofile" class="d-block">{{ $username }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
	
      <nav class="mt-2">
	  
         <ul class="nav nav-pills nav-sidebar nav-flat nav-compact flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
		
			@php
			$count = 0;
			@endphp
			
			 @foreach ($ann as $val)
			 @if($val['auth_reference'] == 'adminn' || $val['auth_reference'] == 'empss')
		  <li class="nav-item has-treeview">
		  @if($count==0)
            <a href="" class="nav-link">
             <i class="nav-icon fas fa-user-tie"></i>
              <p>
                User
				<i class="right fas fa-angle-left">
				
				</i>
			  </p>
            </a>
			@endif
			
			@php
			$count++;
			@endphp
            <ul class="nav nav-treeview">
			@foreach ($ann as $val)
			@if($val['auth_reference'] == 'adminn')
              <li class="nav-item">
			  
                <a href="http://apps.insecticidesindia.com:8030/adminn" class="nav-link">
                  <i class="nav-icon fas fa-users-cog"></i>
                  <p>Admin</p>
                </a>
				
              </li>
			 @endif
			 @if($val['auth_reference'] == 'empss')
              <li class="nav-item">
			   
                <a href="http://apps.insecticidesindia.com:8030/empss" class="nav-link">
                 <i class="nav-icon fas fa-user-friends"></i>
                  <p>Employee</p>
                </a>
				
              </li>
			  
			 @endif 
			 
			@endforeach	
            </ul>
			
          </li>
		  @endif 
		  @endforeach	
			
			
			@php
			$counter = 0;
			@endphp
			
			@foreach ($ann as $val)
             @if($val['auth_reference'] == 'auths' || $val['auth_reference'] == 'screens' || $val['auth_reference'] == 'mods')
			<li class="nav-item has-treeview">
		@if($counter==0)
            <a href="" class="nav-link">
            <i class="nav-icon fas fa-user-lock"></i>
              <p>
                 Authorization
                <i class="right fas fa-angle-left">
				</i>
              </p>
            </a>
			@endif
			
			@php
			$counter++;
			@endphp
			
            <ul class="nav nav-treeview">
			@foreach ($ann as $val)
			 @if($val['auth_reference'] == 'auths')
              <li class="nav-item">
                <a href="http://apps.insecticidesindia.com:8030/auths" class="nav-link">
                  <i class="nav-icon fas fa-plus-square"></i>
                  <p>Create Authorization</p>
                </a>
              </li>
			  @endif
			  @if($val['auth_reference'] == 'screens')
              <li class="nav-item">
                <a href="http://apps.insecticidesindia.com:8030/screens" class="nav-link">
                  <i class="nav-icon fas fa-tablet-alt"></i>
                  <p>Create Screen</p>
                </a>
              </li>
			  @endif
			  @if($val['auth_reference'] == 'mods')
			  <li class="nav-item">
                <a href="http://apps.insecticidesindia.com:8030/mods" class="nav-link">
                 <i class="nav-icon fas fa-cubes"></i>
                  <p>Create Module</p>
                </a>
              </li>
			  @endif
			  @endforeach
            </ul>
          </li>
		  @endif
              @endforeach
		   
		   @php
			$counterr = 0;
			@endphp
			
			@foreach ($ann as $val)
             @if($val['auth_reference'] == 'roles' || $val['auth_reference'] == 'roless')
		  <li class="nav-item has-treeview">
	  @if($counterr==0)
            <a href="" class="nav-link">
              <i class="nav-icon fas fa-user-tag"></i>
              <p>
                Role
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
			@endif
			
			@php
			$counterr++;
			@endphp
			
            <ul class="nav nav-treeview">
			@foreach ($ann as $val)
			@if($val['auth_reference'] == 'roles')
              <li class="nav-item">
                <a href="http://apps.insecticidesindia.com:8030/roles" class="nav-link">
                  <i class="nav-icon fas fa-plus-square"></i>
                  <p>Create</p>
                </a>
              </li>
			  @endif
			  @if($val['auth_reference'] == 'roless')
              <li class="nav-item">
                <a href="http://apps.insecticidesindia.com:8030/roless" class="nav-link">
                  <i class="nav-icon fas fa-user-check"></i>
                  <p>Assign</p>
                </a>
              </li>
			  @endif
			  @endforeach
            </ul>
          </li>
		  @endif
			  @endforeach
		  
			@php
			$counters = 0;
			@endphp
			
			@foreach ($ann as $val)
             @if($val['auth_reference'] == 'custs' || $val['auth_reference'] == 'customer' || $val['auth_reference'] == 'createfarmer' || $val['auth_reference'] == 'createretailer')
		  <li class="nav-item has-treeview">
	  @if($counters==0)
            <a href="" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Customer
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
			@endif
			
			@php
			$counters++;
			@endphp
			
            <ul class="nav nav-treeview">
			@foreach ($ann as $val)
			@if($val['auth_reference'] == 'custs')
              <li class="nav-item">
                <a href="http://apps.insecticidesindia.com:8030/custs" class="nav-link">
                  <i class="nav-icon fas fa-user-check"></i>
                  <p>Assign</p>
                </a>
              </li>
			  @endif
			  @if($val['auth_reference'] == 'customer')
              <li class="nav-item">
                <a href="http://apps.insecticidesindia.com:8030/customer" class="nav-link">
                  <i class="nav-icon fas fa-eye"></i>
                  <p>View</p>
                </a>
              </li>
			  @endif
			@if($val['auth_reference'] == 'createfarmer')  
		  <li class="nav-item">
            <a href="http://apps.insecticidesindia.com:8030/createfarmer" class="nav-link">
              <i class="nav-icon fas fa-plus-square"></i>
              <p>
                Create Farmer
              </p>
            </a>
          </li>
		  @endif
		  @if($val['auth_reference'] == 'createretailer')
		  <li class="nav-item">
            <a href="http://apps.insecticidesindia.com:8030/createretailer" class="nav-link">
              <i class="nav-icon fas fa-plus-square"></i>
              <p>
                Create Retailer
              </p>
            </a>
          </li>
		  @endif
			@endforeach  
            </ul>
          </li>
		  @endif
		 @endforeach
		  
			@php
			$counterss = 0;
			@endphp
			
			@foreach ($ann as $val)
             @if($val['auth_reference'] == 'stock' || $val['auth_reference'] == 'asales' || $val['auth_reference'] == 'packing' || $val['auth_reference'] == 'plantview')
		   <li class="nav-item has-treeview">
	   @if($counterss==0)
            <a href="" class="nav-link">
              <i class="nav-icon fas fa-chart-line"></i>
              <p>
                Sales
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
			@endif
			
			@php
			$counterss++;
			@endphp
            <ul class="nav nav-treeview">
			@foreach ($ann as $val)
			@if($val['auth_reference'] == 'stock')
              <li class="nav-item">
                <a href="http://apps.insecticidesindia.com:8030/stock" class="nav-link">
                  <i class="nav-icon fas fa-shopping-cart"></i>
                  <p>Stock</p>
                </a>
              </li>
			  @endif
			  @if($val['auth_reference'] == 'asales')
              <li class="nav-item">
                <a href="http://apps.insecticidesindia.com:8030/asales" class="nav-link">
                  <i class="nav-icon fas fa-truck"></i>
                  <p>Orders</p>
                </a>
              </li>
			  @endif
			  @if($val['auth_reference'] == 'packing')
			  <li class="nav-item">
                <a href="http://apps.insecticidesindia.com:8030/packing" class="nav-link">
                  <i class="nav-icon fas fa-box-open"></i>
                  <p>Packaging Units</p>
                </a>
              </li>
			  @endif
			   @if($val['auth_reference'] == 'plantview')
		  <li class="nav-item">
            <a href="http://apps.insecticidesindia.com:8030/plantview" class="nav-link">
              <i class="nav-icon fas fa-industry"></i>
              <p>
                Plant
              </p>
            </a>
          </li>
		  @endif
			  @endforeach  
            </ul>
          </li>
		  @endif
		@endforeach 
		
		@php
			$county = 0;
			@endphp
			
			@foreach ($ann as $val)
             @if($val['auth_reference'] == 'createclaim' || $val['auth_reference'] == 'viewclaim' || $val['auth_reference'] == 'approveclaim')
           <li class="nav-item has-treeview">
	   @if($county==0)
            <a href="" class="nav-link">
              <i class="nav-icon fas fa-file-signature"></i>
              <p>
                Claim
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
			@endif
			
			@php
			$county++;
			@endphp
            <ul class="nav nav-treeview">
			@foreach ($ann as $val)
			@if($val['auth_reference'] == 'createclaim')
              <li class="nav-item">
                <a href="http://apps.insecticidesindia.com:8030/createclaim" class="nav-link">
                  <i class="nav-icon fas fa-plus-square"></i>
                  <p>Create Claim</p>
                </a>
              </li>
			  @endif
			  @if($val['auth_reference'] == 'viewclaim')
			  <li class="nav-item">
                <a href="http://apps.insecticidesindia.com:8030/viewclaim" class="nav-link">
                  <i class="nav-icon fas fa-eye"></i>
                  <p>My Claims</p>
                </a>
              </li>
			  @endif
			  @if($val['auth_reference'] == 'approveclaim')
			  <li class="nav-item">
                <a href="http://apps.insecticidesindia.com:8030/approveclaim" class="nav-link">
                  <i class="nav-icon fas fa-user-check"></i>
                  <p>Approve Claim</p>
                </a>
              </li>
			  @endif
			  @endforeach  
            </ul>
          </li>
		  @endif
			  @endforeach  
		  
		  @php
			$countyr = 0;
			@endphp
			
			@foreach ($ann as $val)
             @if($val['auth_reference'] == 'levelsettings' || $val['auth_reference'] == 'changelevel')
           <li class="nav-item has-treeview">
	   @if($countyr==0)
            <a href="" class="nav-link">
              <i class="nav-icon fas fa-layer-group"></i>
              <p>
                Level
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
			@endif
			
			@php
			$countyr++;
			@endphp
            <ul class="nav nav-treeview">
			@foreach ($ann as $val)
			  @if($val['auth_reference'] == 'levelsettings')
			  <li class="nav-item">
                <a href="http://apps.insecticidesindia.com:8030/levelsettings" class="nav-link">
                  <i class="nav-icon fas fa-wrench"></i>
                  <p>Configuration</p>
                </a>
              </li>
			  @endif
			  @if($val['auth_reference'] == 'changelevel')
			  <li class="nav-item">
                <a href="http://apps.insecticidesindia.com:8030/changelevel" class="nav-link">
					<i class="nav-icon fas fa-eye"></i>
                  <p>View</p>
                </a>
              </li>
			  @endif
			  @endforeach  
            </ul>
          </li>
		  @endif
			  @endforeach  
			
				@foreach ($ann as $val)
			@if($val['auth_reference'] == 'contactss')
              <li class="nav-item">
                <a href="http://apps.insecticidesindia.com:8030/contactss" class="nav-link">
                  <i class="nav-icon fas fa-address-card"></i>
                  <p>Contacts</p>
                </a>
              </li>
			  @endif
			 @endforeach	
			
			@php
			$countersss = 0;
			@endphp
			
			@foreach ($ann as $val)
             @if($val['auth_reference'] == 'ann' || $val['auth_reference'] == 'anns')
          <li class="nav-item has-treeview">
	  @if($countersss==0)
            <a href="" class="nav-link">
              <i class="nav-icon fas fa-bullhorn"></i>
              <p>
                Announcement
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
			@endif
			
			@php
			$countersss++;
			@endphp
            <ul class="nav nav-treeview">
			@foreach ($ann as $val)
			@if($val['auth_reference'] == 'ann')
              <li class="nav-item">
                <a href="http://apps.insecticidesindia.com:8030/ann" class="nav-link">
                  <i class="nav-icon fas fa-plus-square"></i>
                  <p>Create</p>
                </a>
              </li>
			  @endif
			  @if($val['auth_reference'] == 'anns')
              <li class="nav-item">
                <a href="http://apps.insecticidesindia.com:8030/anns" class="nav-link">
                  <i class="nav-icon fas fa-plus-square"></i>
                  <p>Create Type</p>
                </a>
              </li>
			  @endif
			  @endforeach
            </ul>
          </li>
          @endif
		@endforeach
			  
		
          
		  
		  
          

		
        </ul>
		 
      </nav>
	 
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
	
	<!-- <footer align="center" style="bottom: 0; width: 100%; position: absolute;">
 <br>
    <a href="https://mdbootstrap.com/education/bootstrap/"><img src=""
           alt=""
           class=""
           style="">Samishti Infotech Pvt Ltd</a>
</footer>-->
	
  </aside>

       







    <div class="content-wrapper">

      @if ($message = Session::get('success'))
      <div class="alert alert-success">
        <p>{{ $message }}</p>
      </div>
      @endif

      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-3">
              <h1>Configuration</h1>
            </div>

            <div class="col-sm-9">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('dashboard.index')}}">Home</a></li>
                <li class="breadcrumb-item active">Configuration</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          
          
				
                  <div class="card card-success">
				   <div class="card-header">
            <h3 class="card-title">Maximum Number Of Days To Raise Claim</h3>
  
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Expand">
                <i class="fas fa-minus"></i></button>
             
            </div>
          </div>
                  
                      <div class="card-body">
					   <form class="form-horizontal" action="{{route('levelsettings.globalsettings')}}" method="POST">
			  {{ csrf_field() }}  
				  <h6 class="bg-light">Maximum Allowed Number Of Days To Raise Claim</h6><hr>
				  
                        <div class="form-group row">
                      <label class="col-sm-2 col-form-label">No of days</label>
                      <div class="col-sm-10">

                       <input name="MAX_CLAIM_DAYS_LIMIT" class="form-control"  placeholder="Enter Days" required>
                    
                      </div>
                    </div>
                      </div>
					  <div class="card-footer">
                    <button type="submit" class="btn btn-success btn-normal" style="float:left;"><i class="fa fa-save"></i> Save</button>
                  </div>
                   </form> 
                  </div>
				  
				  <div class="card card-success">
				   <div class="card-header">
            <h3 class="card-title">Create Level</h3>
  
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Expand">
                <i class="fas fa-minus"></i></button>
             
            </div>
          </div>
                  
                   
			 
                <div class="card-body">
				 <form class="form-horizontal" action="{{route('levelsettings.store')}}" method="POST">
			  {{ csrf_field() }}  
				<div class="row">
				
				<div class="col-md-4">
				 <label>Level ID</label>
                        <div class="form-group">
                   
                    
                      <input name="level_id" class="form-control"  placeholder="Enter level ID" required>
                   
                  </div>
                      </div>
				<div class="col-md-4">
				 <label>Level Name</label>
                        <div class="form-group">
                   
                    
                      <input name="level_name" class="form-control"  placeholder="Enter name" required>
                    
                  </div>
                      </div>
					  
                      <div class="col-md-4">
                        <label>Description</label>
                        <div class="form-group">

                          
                            <input name="level_description" class="form-control" placeholder="Enter Description" required>
                          
                        </div>
                      </div>
                      
                    </div> 
                  
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-success btn-normal" style="float:left;"><i class="fa fa-save"></i>   Save</button>
                </div>
                <!-- /.card-footer -->
				</form>
              
                    
                  </div>
				  
				 
				  
				  <div class="card card-success">
				   <div class="card-header">
            <h3 class="card-title">Level Settings </h3>
  
            <div class="card-tools">
              <button type="button" class="btn btn-tool"  data-toggle="tooltip" title="Expand">
                <i class="fas fa-minus"></i></button>
             
            </div>
          </div>
		   
                   
                      <div class="card-body">
                      
					  <div class="row">
					   <div class="col-md-12">
					   <label>Select Level</label>
					   <div class="form-group">
                        
                          <select class="form-control select2" data-dropdown-css-class="select2-teal" required>
						   
					  @foreach($data as $values)
					 @if (empty($values['LEVEL_RANK_ID'] ))
					<option value="{{$id}}" id="LEVEL_RANK_ID" selected disabled>{{$id}}</option>
					@else
					 <option value="{{$values['LEVEL_RANK_ID']}}" id="LEVEL_RANK_ID" selected disabled>{{$values['LEVEL_RANK_ID']}}</option>
					 @endif
					  @endforeach
				  </select>    
						
                        </div>
						
						</div>
						</div>
						
             
      
						<div class="row">
				
				<div class="col-md-4">
				<label><i class="fas fa-route text-primary"></i>
				  &nbsp;&nbsp; Daily Allowance Outstation</label>
						 <div class="form-group">
                      @foreach($data as $values)
					  @if (empty($values['DA_RATES_OUTST'] ))
					<input id="DA_RATES_OUTST" class="form-control" value=""  placeholder="Enter Daily Allowance Outstation">
                    
						  @else
                       <input id="DA_RATES_OUTST" class="form-control" value="{{$values['DA_RATES_OUTST']}}"  placeholder="Enter Daily Allowance Outstation">
                     @endif
					 @endforeach
                    </div>
					</div>
					
					<div class="col-md-4">
					 <label><i class="fas fa-map-marker-alt text-fuchsia"></i>
				  &nbsp;&nbsp; Daily Allowance Local</label>
                     <div class="form-group">
                     @foreach($data as $values)
					 @if (empty($values['DA_RATES_LOCAL'] ))
						<input id="DA_RATES_LOCAL" class="form-control" value="" placeholder="Enter Daily Allowance Local" required>
                     
						 @else
                       <input id="DA_RATES_LOCAL" class="form-control" value="{{$values['DA_RATES_LOCAL']}}" placeholder="Enter Daily Allowance Local" required>
                     @endif
					 @endforeach
                    </div>
					</div>
					<div class="col-md-4">
					<label><i class="fas fa-bus text-maroon"></i>
				  &nbsp;&nbsp; Bus/Train Expense</label>
					<div class="form-group">
                      @foreach($data as $values)
					  @if (empty($values['EXP_BUS_TRAIN'] ))
						   <input id="exp_bus_train"  class="form-control" value="" placeholder="Enter Bus/Train Expense" required>
						
						  @else
                       <input id="exp_bus_train"  class="form-control" value="{{$values['EXP_BUS_TRAIN']}}" placeholder="Enter Bus/Train Expense" required>
						@endif
				   @endforeach
                    </div>
					</div>
					</div>
					
					<div class="row">
				
				<div class="col-md-4">
				<label><i class="fas fa-taxi text-success"></i>
				  &nbsp;&nbsp; Taxi/Auto/Rickshaw Exepnse</label>
                      
					<div class="form-group">
                      @foreach($data as $values)
					  @if (empty($values['EXP_TAXI_AUTO'] ))
						  <input id="EXP_TAXI_AUTO" class="form-control" value="" placeholder="Enter Taxi/Auto/Rickshaw Exepnse" required>
                    
						  @else
                       <input id="EXP_TAXI_AUTO" class="form-control" value="{{$values['EXP_TAXI_AUTO']}}" placeholder="Enter Taxi/Auto/Rickshaw Exepnse" required>
                     @endif
					 @endforeach
                    </div>
					</div>
					<div class="col-md-4">
					 <label><i class="fas fa-plane text-indigo"></i>
				  &nbsp;&nbsp; Air Expense</label>
					<div class="form-group">
                     
                      @foreach($data as $values)
					  @if (empty($values['EXP_PLANE'] ))
						   <input id="EXP_PLANE" class="form-control" value=""  placeholder="Enter Air Expense" required>
                   
						  @else
                       <input id="EXP_PLANE" class="form-control" value="{{$values['EXP_PLANE']}}"  placeholder="Enter Air Expense" required>
                     @endif
					 @endforeach
                    </div>
					</div>
					<div class="col-md-4">
					<label><i class="fas fa-percentage text-lightblue"></i>
				  &nbsp;&nbsp; Per Km Rate</label>
					<div class="form-group">
                      @foreach($data as $values)
                      @if (empty($values['EXP_PER_KM_RATE'] ))
						   <input id="EXP_PER_KM_RATE" class="form-control" value="" placeholder="Enter Per Km Rate" required>
                   
						  @else
                       <input id="EXP_PER_KM_RATE" class="form-control" value="{{$values['EXP_PER_KM_RATE']}}" placeholder="Enter Per Km Rate" required>
                     @endif
					 @endforeach
                    </div>
					</div>
					
					</div>
					
					<div class="row">
				
				<div class="col-md-4">
				<label><i class="fas fa-tools text-lime"></i>
				  &nbsp;&nbsp; Vehicle Repair Expense</label>
                      
					<div class="form-group">
                      @foreach($data as $values)
						@if (empty($values['EXP_VEH_REPAIR'] ))
							 <input id="EXP_VEH_REPAIR" class="form-control" value="" placeholder="Enter Vehicle Repair Expense" required>
                  
							@else
                       <input id="EXP_VEH_REPAIR" class="form-control" value="{{$values['EXP_VEH_REPAIR']}}" placeholder="Enter Vehicle Repair Expense" required>
                    @endif
                       @endforeach
                    </div>
					</div>
					<div class="col-md-4">
					 <label><i class="fas fa-hotel text-purple"></i>
				  &nbsp;&nbsp; Hotel Expense</label>
					<div class="form-group">
                     
                      
					@foreach($data as $values)
					@if (empty($values['EXP_HOTEL'] ))
						 <input id="EXP_HOTEL" class="form-control" value="" placeholder="Enter Hotel Expense" required>
						
						@else
                       <input id="EXP_HOTEL" class="form-control" value="{{$values['EXP_HOTEL']}}" placeholder="Enter Hotel Expense" required>
						@endif
					@endforeach
                     
                    </div>
					</div>
					<div class="col-md-4">
					 <label><i class="fas fa-wifi text-orange"></i>
				  &nbsp;&nbsp; Internet/Phone Expense</label>
					<div class="form-group">
                     
                      @foreach($data as $values)
					  @if (empty($values['EXP_MOBILE_INTERNET'] ))
						  <input id="EXP_MOBILE_INTERNET" class="form-control" value=""  placeholder="Enter Internet\Phone Expense" required>
                    
						  @else
                       <input id="EXP_MOBILE_INTERNET" class="form-control" value="{{$values['EXP_MOBILE_INTERNET']}}"  placeholder="Enter Internet\Phone Expense" required>
                     @endif
					 @endforeach
                     
                    </div>
					</div>
					
					</div>
					
					<div class="row">
				
				<div class="col-md-4">
				 <label><i class="fas fa-mobile-alt text-info"></i>
				  &nbsp;&nbsp; Stationary Expense</label>
					<div class="form-group">
                     @foreach($data as $values)
					 @if (empty($values['EXP_STATIONARY'] ))
						 <input id="EXP_STATIONARY" class="form-control" value="" placeholder="Enter Stationary Expense" required>
                    
						 @else
                       <input id="EXP_STATIONARY" class="form-control" value="{{$values['EXP_STATIONARY']}}" placeholder="Enter Stationary Expense" required>
                     @endif
					 @endforeach
                    </div>
					</div>
					<div class="col-md-4">
					<label><i class="fab fa-medium-m text-secondary"></i>
				  &nbsp;&nbsp; Miscellaneous Expense</label>
					  <div class="form-group">
					  @foreach($data as $values)
					  @if (empty($values['EXP_MISC'] ))
						   <input id="EXP_MISC" class="form-control" value="" placeholder="Enter Miscellaneous Expense" required>
                   
						  @else
                       <input id="EXP_MISC" class="form-control" value="{{$values['EXP_MISC']}}" placeholder="Enter Miscellaneous Expense" required>
                     @endif
					 @endforeach
                    </div>
					</div>
                     
						</div>
                    </div> 
						
					<div class="card-footer">
					
                    <button type="submit" id="btnSelectedRows" class="btn btn-success btn-normal" style="float:left;"><i class="fa fa-save"></i> Save</button>
                  </div>	
                     
					
                    </div>
					
					
					
					
					
					
                  
				
			<script>
  @if(Session::has('message'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.success("{{ session('message') }}");
  @endif

  @if(Session::has('error'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.error("{{ session('error') }}");
  @endif

  @if(Session::has('info'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.info("{{ session('info') }}");
  @endif

  @if(Session::has('warning'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.warning("{{ session('warning') }}");
  @endif
</script> 
        </div>
		</div>
      </section>



    

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
  <script>
    window.location = "/userlogin";
  </script>
  @endif


  <!-- /#wrapper -->

  <script src="{!! asset('suprsales_resource/plugins/jquery/jquery.min.js') !!}" type="text/javascript"></script>
  <script src="{!! asset('suprsales_resource/plugins/bootstrap/js/bootstrap.bundle.min.js') !!}" type="text/javascript"></script>
  <script src="{!! asset('https://code.jquery.com/jquery-3.5.1.js') !!}" type="text/javascript"></script>
  <script src="{!! asset('suprsales_resource/plugins/select2/js/select2.full.min.js') !!}" type="text/javascript"></script>

  <script src="{!! asset('suprsales_resource/plugins/jquery-ui/jquery-ui.min.js') !!}" type="text/javascript"></script>
  <script src="{!! asset('suprsales_resource/plugins/ekko-lightbox/ekko-lightbox.min.js') !!}" type="text/javascript"></script>

  <script src="{!! asset('suprsales_resource/plugins/sweetalert2/sweetalert2.min.js') !!}" type="text/javascript"></script>

  <script src="{!! asset('suprsales_resource/plugins/toastr/toastr.min.js') !!}" type="text/javascript"></script>
  <script src="{!! asset('suprsales_resource/dist/js/adminlte.min.js') !!}" type="text/javascript"></script>
  <script src="{!! asset('suprsales_resource/dist/js/demo.js') !!}" type="text/javascript"></script>
<meta name="csrf-token" content="{{ csrf_token() }}" /> 
<script>
$('#btnSelectedRows').on('click', function() {
	
var levelsetting = document.getElementById("LEVEL_RANK_ID").value;
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
  </script>
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
          title: 'Data Updated Successfully'
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


  <!-- Ekko Lightbox -->

  <!-- Filterizr-->
  <script src="{!! asset('AdminLTE-3.0.5/plugins/filterizr/jquery.filterizr.min.js') !!}" type="text/javascript"></script>
  <script type="text/javascript">
$(document).ready(function () {
  bsCustomFileInput.init();
  $("[data-card-widget='collapse']").click()
});
</script>
  

  <script>
    $(document).ready(function() {

      $('.nav-link').on("click", function() {

        $('.nav-link').removeClass('active');

        $(this).addClass('active');
        $(this).siblings().removeClass("active");
      });
    });
  </script>


  <script>
    $(function() {
      $(document).on('click', '[data-toggle="lightbox"]', function(event) {
        event.preventDefault();
        $(this).ekkoLightbox({
          alwaysShowClose: true
        });
      });

      $('.filter-container').filterizr({
        gutterPixels: 3
      });
      $('.btn[data-filter]').on('click', function() {
        $('.btn[data-filter]').removeClass('active');
        $(this).addClass('active');
      });
    })
  </script>

  <!-- page script -->

  <script>
    $(function() {
      //Initialize Select2 Elements
      $('.select2').select2()

      //Initialize Select2 Elements
      $('.select2bs4').select2({
        theme: 'bootstrap4'
      })

      //Datemask dd/mm/yyyy
      $('#datemask').inputmask('dd/mm/yyyy', {
        'placeholder': 'dd/mm/yyyy'
      })
      //Datemask2 mm/dd/yyyy
      $('#datemask2').inputmask('mm/dd/yyyy', {
        'placeholder': 'mm/dd/yyyy'
      })
      //Money Euro
      $('[data-mask]').inputmask()

      //Date range picker
      $('#reservationdate').datetimepicker({
        format: 'L'
      });
      //Date range picker
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
      $('#daterange-btn').daterangepicker({
          ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          },
          startDate: moment().subtract(29, 'days'),
          endDate: moment()
        },
        function(start, end) {
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

      $("input[data-bootstrap-switch]").each(function() {
        $(this).bootstrapSwitch('state', $(this).prop('checked'));
      });

    })
  </script>
  <script>
    $(function() {

      $('#announcement-table').DataTable({
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




        dom: 'l<"toolbar">Bfrtip',
        buttons: [{
            extend: 'excelHtml5',
            text: '<i style="float:right;" class="fas fa-download"></i>',
            titleAttr: 'Excel'
          }


        ],
        initComplete: function() {
          var btns = $('.dt-button');
          btns.addClass('btn btn-info');
          btns.removeClass('dt-button');
          $("div.toolbar")
            .html('<a class="btn btn-success btn-sm" href="#" data-toggle="modal" data-target="#modal-default" title="Create"><i class="fas fa-user-plus"></i> Create</a>');

          $("#announcement-table").show();
        },
        select: {
          style: 'os',
          selector: 'td:first-child'
        },
        order: [
          [1, 'asc']
        ],
        columnDefs: [{
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

    });
  </script>
  
</body>



</html>