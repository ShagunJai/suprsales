<!DOCTYPE html>

<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
  #example5 {
    display: none;
}
  div.dataTables_length {
  margin-right: 1em;
}

.dataTables_wrapper .dt-buttons {
  float:right;
  text-align:center;
  margin-left: 1em;
}
.toolbar {
    float: left;
}
  </style>
</head>

<body class="hold-transition sidebar-mini accent-teal">
@if(isset(Auth::user()->id))
 <div class="wrapper">

 @php
  $user = Auth::user()->email;
  $id = Auth::user()->emp_id;
  @endphp



        <!-- Navigation -->

        <!--<nav class="navbar navbar-static-top" role="navigation">-->

			<nav class="main-header navbar navbar-expand navbar-dark purplenavbar">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('dashboard.index')}}" class="nav-link">Home</a>
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



         <li class="nav-item" id="timer">
       	  <form action="/empatten" method="POST">
			 {{ csrf_field() }}
        <a class="nav-link" title="Attendance" data-toggle="dropdown" href="#">
                    <i class="nav-icon fas fa-clock nav-icon">
                    <span></span>
                </a>
                 <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                 <span class="dropdown-item dropdown-header bg-light">


          		<div id="date"></div>
                <div id="time" class="bold"></div>

                </span>
                  @php
                  $ide = Auth::user()->emp_id;
                  @endphp
			 <div class="input-group mb-3">

          <input id="emp_attn" name="emp_attn" class="form-control"value="{{$ide}}" disabled></input>


          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user-tie"></span>
            </div>
          </div>
        </div>
          <div class="input-group mb-3">
         <div class="col-4">
            <input type="submit" value="Present" class="btn btn-primary btn-block" {{--onclick="return change(this)";--}} />
          </div>
          </div>
		</form>
            </li>




    <li class="nav-item">
	  <a class="nav-link" title="Help" href="http://127.0.0.1:8000/faq">
        <i class="nav-icon fas fa-question-circle fa-lg"></i>
        </a>
		</li>
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

          <a href="http://127.0.0.1:8000/myann" class="dropdown-item dropdown-footer bg-light">See All Announcements</a>
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
           @if (filled($image))
         <img src="{{ URL::asset('storage/'.$image) }}" class="user-image" alt=""/>
	 @else
		<img src="/suprsales_resource/dist/img/usericon.png" class="user-image" alt="User">
        @endif
        </a>

                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header bg-secondary">
				  <br/>
                     @if (filled($image))
         <img src="{{ URL::asset('storage/'.$image) }}" class="user-image" alt=""/>
	@else
		<img src="/suprsales_resource/dist/img/usericon.png" class="user-image" alt="User">
        @endif
				   <p>
                      {{ $username }}
                      <small>{{ $email }}</small>
                    </p>
                  </li>

                  <!-- Menu Footer-->
                  <li class="user-footer bg-white">
                      <div class="pull-left">
                      <a href="http://127.0.0.1:8000/loginprofile" class="btn btn-default btn-flat bg-primary">Profile</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                    <div class="pull-right" style="float:right;">
                      <a href="{{ route('userlogin.logout')}}" class="btn btn-default btn-flat">Sign out</a>
                    </div>
					</div>
                  </li>
                </ul>
              </li>



    </ul>
  </nav>
				<aside class="main-sidebar sidebar-dark-navy elevation-4">
    <!-- Brand Logo -->
      <a href="#" class="brand-link bg-light">
      <img src="/suprsales_resource/dist/img/suprsales.png" class="brand-image img-circle elevation-3"
           style="opacity: .8" style="height:10%; width:10%;">
      <span class="brand-text font-weight-light"><img src="/suprsales_resource/dist/img/SuprsalesText.png" style="height:50%; width:50%;"></span>
    </a>
@php
  $username = Auth::user()->name;
  $image = Auth::user()->image;
  @endphp
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->



      <!-- Sidebar Menu -->

      <nav class="mt-2">

         <ul class="nav nav-pills nav-sidebar nav-flat nav-compact flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

			@php
			$count = 0;
			@endphp

			 @foreach ($ann as $val)
			 @if($val['auth_reference'] == 'adminn' || $val['auth_reference'] == 'empss' || $val['auth_reference'] == 'createemployee' || $val['auth_reference'] == 'assignplant' || $val['auth_reference'] == 'changelevel')
		  <li class="nav-item has-treeview">
		  @if($count==0)
            <a href="#" class="nav-link">
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

                <a href="http://127.0.0.1:8000/adminn" class="nav-link">
                  <i class="nav-icon fas fa-users-cog"></i>
                  <p>All Admins</p>
                </a>

              </li>
			 @endif
			 @if($val['auth_reference'] == 'empss')
              <li class="nav-item">

                <a href="http://127.0.0.1:8000/empss" class="nav-link">
                 <i class="nav-icon fas fa-user-friends"></i>
                  <p>All Employees</p>
                </a>

              </li>

			 @endif
			  @if($val['auth_reference'] == 'createemployee')
              <li class="nav-item">
                <a href="http://127.0.0.1:8000/createemployee" class="nav-link">
                  <i class="nav-icon fas fa-plus-square"></i>
                  <p>Create Employee</p>
                </a>
              </li>
			  @endif
			    @if($val['auth_reference'] == 'assignplant')
		  <li class="nav-item">
            <a href="http://127.0.0.1:8000/assignplant" class="nav-link">
              <i class="nav-icon fas fa-user-check"></i>
              <p>
                Assign Region
              </p>
            </a>
          </li>
		  @endif
		  @if($val['auth_reference'] == 'changelevel')
			  <li class="nav-item">
                <a href="http://127.0.0.1:8000/changelevel" class="nav-link">
					<i class="nav-icon fas fa-layer-group"></i>
                  <p>Level</p>
                </a>
              </li>
			  @endif
			@endforeach
            </ul>

          </li>
		  @endif
		  @endforeach

{{-----------------------------------------------Attandance---------------------------------------------------}}

            @php
			$attn = 0;
			@endphp
			@foreach ($ann as $val)
      @if($val['auth_reference'] == 'attendance' || $val['auth_reference'] == 'empatten' || $val['auth_reference'] == 'regularity'  )
			<li class="nav-item has-treeview">
		    @if($attn==0)
            <a href="#" class="nav-link">
                  <i class="nav-icon fas fad fa-font"></i>
              <p>
                 Attendance
                <i class="right fas fa-angle-left">
				</i>
              </p>
            </a>
			@endif

			@php
			$attn++;
			@endphp

            <ul class="nav nav-treeview">
			@foreach ($ann as $val)
			 @if($val['auth_reference'] == 'attendance')

              <li class="nav-item">
                <a href="http://127.0.0.1:8000/attendance" class="nav-link">
                  <i class="nav-icon fas fa-clipboard"></i>
                  <p>Attendance (Admin)</p>
                </a>
              </li>
			  @endif
            @if($val['auth_reference'] == 'empatten')
              <li class="nav-item">
                <a href="http://127.0.0.1:8000/empatten" class="nav-link">
                  <i class="nav-icon fas fa-highlighter"></i>
                  <p>Attendance Details</p>
                </a>
              </li>
			  @endif

        @if($val['auth_reference'] == 'regularity')
              <li class="nav-item">
                <a href="http://127.0.0.1:8000/regularity" class="nav-link">
                  <i class="nav-icon fas fa fa-user-times"></i>
                  <p>Attendance Regularity</p>
                </a>
              </li>
			  @endif
      		  @endforeach
            </ul>
          </li>
		  @endif
		  @endforeach


{{----------------------------------------------------------------------------------------------------}}

          {{-- creae BEat plan --}}
            @php
			$beat = 0;
			@endphp
         {{-- for each ann as val and the value of respective iten stored as auth_reference so that we can use auth_reference throughout the program --}}
			@foreach ($ann as $val)
             @if($val['auth_reference'] == 'createbeatplan'|| $val['auth_reference'] == 'viewbeatmap')
			<li class="nav-item has-treeview">
		@if($beat==0)
            <a href="#" class="nav-link">
            <i class="nav-icon fas fa-map-marker"></i>
              <p>
                 Beat Plan
                <i class="right fas fa-angle-left">
				</i>
              </p>
            </a>
			@endif
           {{-- counter incriment --}}
			@php
			$beat++;
			@endphp

            <ul class="nav nav-treeview">
			@foreach ($ann as $val)
			 @if($val['auth_reference'] == 'createbeatplan' )

              <li class="nav-item">
                <a href="http://127.0.0.1:8000/createbeatplan" class="nav-link">
                  <i class="nav-icon fas fa-plus-square"></i>
                  <p>Create Beat Plan</p>
                </a>
              </li>
			  @endif

			 @if($val['auth_reference'] == 'viewbeatmap')

              <li class="nav-item">
                <a href="http://127.0.0.1:8000/viewbeatmap" class="nav-link">
                  <i class="nav-icon fas fa-route"></i>
                  <p>View Beat Map</p>
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
            <a href="#" class="nav-link">
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
                <a href="http://127.0.0.1:8000/auths" class="nav-link">
                  <i class="nav-icon fas fa-plus-square"></i>
                  <p>Create Authorization</p>
                </a>
              </li>
			  @endif
			  @if($val['auth_reference'] == 'screens')
              <li class="nav-item">
                <a href="http://127.0.0.1:8000/screens" class="nav-link">
                  <i class="nav-icon fas fa-tablet-alt"></i>
                  <p>Create Screen</p>
                </a>
              </li>
			  @endif
			  @if($val['auth_reference'] == 'mods')
			  <li class="nav-item">
                <a href="http://127.0.0.1:8000/mods" class="nav-link">
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
             @if($val['auth_reference'] == 'createorder' || $val['auth_reference'] == 'custallorder')
		  <li class="nav-item has-treeview">
	  @if($counterr==0)
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user-tag"></i>
              <p>
                Orders
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
			@endif
			
			@php
			$counterr++;
			@endphp
			
            <ul class="nav nav-treeview">
			@foreach ($ann as $val)
      @if($val['auth_reference'] == 'custallorder')
              <li class="nav-item">
                <a href="http://127.0.0.1:8000/custallorder" class="nav-link">
                  <i class="nav-icon fas fa-truck"></i>
                  <p>All Order</p> 
                </a>
              </li>
			  @endif
        @if($val['auth_reference'] == 'createorder')
              <li class="nav-item">
                <a href="http://127.0.0.1:8000/createorder" class="nav-link">
                  <i class="nav-icon fas fa-plus-square"></i>
                  <p>Create Order</p> 
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
            <a href="#" class="nav-link">
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
                <a href="http://127.0.0.1:8000/roles" class="nav-link">
                  <i class="nav-icon fas fa-plus-square"></i>
                  <p>Create</p>
                </a>
              </li>
			  @endif
			  @if($val['auth_reference'] == 'roless')
              <li class="nav-item">
                <a href="http://127.0.0.1:8000/roless" class="nav-link">
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
             @if($val['auth_reference'] == 'custs' || $val['auth_reference'] == 'customer' || $val['auth_reference'] == 'mycutomer' || $val['auth_reference'] == 'createfarmer' || $val['auth_reference'] == 'createretailer' || $val['auth_reference'] == 'verifydistributor')
		 <li class="nav-item has-treeview">
	  @if($counters==0)
            <a href="#" class="nav-link">
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
                <a href="http://127.0.0.1:8000/custs" class="nav-link">
                  <i class="nav-icon fas fa-user-check"></i>
                  <p>Assign</p>
                </a>
              </li>
			  @endif
			  @if($val['auth_reference'] == 'customer')
              <li class="nav-item">
                <a href="http://127.0.0.1:8000/customer" class="nav-link">
                  <i class="nav-icon fas fa-eye"></i>
                  <p>All Customers</p>
                </a>
              </li>
			  @endif
			@if($val['auth_reference'] == 'createfarmer')
		  <li class="nav-item">
            <a href="http://127.0.0.1:8000/createfarmer" class="nav-link">
              <i class="nav-icon fas fa-plus-square"></i>
              <p>
                Create Farmer
              </p>
            </a>
          </li>
		  @endif
		  @if($val['auth_reference'] == 'createretailer')
		  <li class="nav-item">
            <a href="http://127.0.0.1:8000/createretailer" class="nav-link">
              <i class="nav-icon fas fa-plus-square"></i>
              <p>
                Create Retailer
              </p>
            </a>
          </li>
		  @endif
		  @if($val['auth_reference'] == 'mycutomer')
			   <li class="nav-item">
                <a href="http://127.0.0.1:8000/mycutomer" class="nav-link">
                  <i class="nav-icon fas fa-users"></i>
                  <p>My Customers</p>
                </a>
              </li>
			   @endif
			    @if($val['auth_reference'] == 'verifydistributor')
		  <li class="nav-item">
            <a href="http://127.0.0.1:8000/verifydistributor" class="nav-link">
             <i class="nav-icon fas fa-user-check"></i>
              <p>
                Verify Distributor
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
             @if($val['auth_reference'] == 'asales'||$val['auth_reference'] == 'corder'|| $val['auth_reference'] == 'myorder' || $val['auth_reference'] == 'regionorder' || $val['auth_reference'] == 'depotorder')
		   <li class="nav-item has-treeview">
	   @if($counterss==0)
            <a href="#" class="nav-link">
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
			  @if($val['auth_reference'] == 'asales')
              <li class="nav-item">
                <a href="http://127.0.0.1:8000/asales" class="nav-link">
                  <i class="nav-icon fas fa-truck"></i>
                  <p>All Orders</p>
                </a>
              </li>
			  @endif
{{-------------------------------------------Customer Order------------------------------------------}}

      @if($val['auth_reference'] == 'corder')
              <li class="nav-item">
                <a href="http://127.0.0.1:8000/corder" class="nav-link">
                  <i class="nav-icon fas fa-truck"></i>
                  <p>Customer Orders</p> 
                </a>
              </li>
			  @endif




{{-------------------------------------------------------------------------}}



			  @if($val['auth_reference'] == 'myorder')
              <li class="nav-item">
                <a href="http://127.0.0.1:8000/myorder" class="nav-link">
                  <i class="nav-icon fas fa-truck"></i>
                  <p>My Orders</p>
                </a>
              </li>
			  @endif
			  @if($val['auth_reference'] == 'regionorder')
              <li class="nav-item">
                <a href="http://127.0.0.1:8000/regionorder" class="nav-link">
                  <i class="nav-icon fas fa-truck"></i>
                  <p>My Region Orders</p>
                </a>
              </li>
			  @endif
			   @if($val['auth_reference'] == 'depotorder')
              <li class="nav-item">
                <a href="http://127.0.0.1:8000/depotorder" class="nav-link">
                  <i class="nav-icon fas fa-truck"></i>
                  <p>My Depot Orders</p>
                </a>
              </li>
			  @endif
			  @endforeach
            </ul>
          </li>
		  @endif
		@endforeach


		@php
			$salesview = 0;
			@endphp

			@foreach ($ann as $val)
             @if($val['auth_reference'] == 'stock' || $val['auth_reference'] == 'stocklist' || $val['auth_reference'] == 'plantview' || $val['auth_reference'] == 'myplant' || $val['auth_reference'] == 'material' || $val['auth_reference'] == 'packing')
		   <li class="nav-item has-treeview">
	   @if($salesview==0)
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-shopping-cart"></i>
              <p>
                Products
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
			@endif

			@php
			$salesview++;
			@endphp
            <ul class="nav nav-treeview">
			@foreach ($ann as $val)
			@if($val['auth_reference'] == 'stock')
              <li class="nav-item">
                <a href="http://127.0.0.1:8000/stock" class="nav-link">
                  <i class="nav-icon fas fa-shopping-cart"></i>
                  <p>All Stocks</p>
                </a>
              </li>
			  @endif

			  @if($val['auth_reference'] == 'stocklist')
              <li class="nav-item">
                <a href="http://127.0.0.1:8000/stocklist" class="nav-link">
                  <i class="nav-icon fas fa-shopping-cart"></i>
                  <p>My Stocks</p>
                </a>
              </li>
			  @endif
			   @if($val['auth_reference'] == 'plantview')
		  <li class="nav-item">
            <a href="http://127.0.0.1:8000/plantview" class="nav-link">
              <i class="nav-icon fas fa-industry"></i>
              <p>
                All Plants
              </p>
            </a>
          </li>
		  @endif
		  @if($val['auth_reference'] == 'myplant')
		  <li class="nav-item">
            <a href="http://127.0.0.1:8000/myplant" class="nav-link">
              <i class="nav-icon fas fa-industry"></i>
              <p>
                My Plants
              </p>
            </a>
          </li>
		  @endif
		  @if($val['auth_reference'] == 'material')
              <li class="nav-item">
                <a href="http://127.0.0.1:8000/material" class="nav-link">
                  <i class="nav-icon fas fa-cube"></i>
                  <p>Material Groups</p>
                </a>
              </li>

		  @endif
		   @if($val['auth_reference'] == 'packing')
			  <li class="nav-item">
                <a href="http://127.0.0.1:8000/packing" class="nav-link">
                  <i class="nav-icon fas fa-box-open"></i>
                  <p>Packaging Units</p>
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
             @if($val['auth_reference'] == 'createclaim' || $val['auth_reference'] == 'viewclaim' || $val['auth_reference'] == 'allclaims' || $val['auth_reference'] == 'approveclaim' || $val['auth_reference'] == 'rejectedclaim')
           <li class="nav-item has-treeview">
	   @if($county==0)
            <a href="#" class="nav-link">
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
                <a href="http://127.0.0.1:8000/createclaim" class="nav-link">
                  <i class="nav-icon fas fa-plus-square"></i>
                  <p>Create Claim</p>
                </a>
              </li>
			  @endif
			  @if($val['auth_reference'] == 'viewclaim')
			  <li class="nav-item">
                <a href="http://127.0.0.1:8000/viewclaim" class="nav-link">
                  <i class="nav-icon fas fa-eye"></i>
                  <p>My Claims</p>
                </a>
              </li>
			  @endif
			   @if($val['auth_reference'] == 'allclaims')
			  <li class="nav-item">
                <a href="http://127.0.0.1:8000/allclaims" class="nav-link">
                  <i class="nav-icon fas fa-eye"></i>
                  <p>All Claims</p>
                </a>
              </li>
			  @endif
			  @if($val['auth_reference'] == 'approveclaim')
			  <li class="nav-item">
                <a href="http://127.0.0.1:8000/approveclaim" class="nav-link">
                  <i class="nav-icon fas fa-user-check"></i>
                  <p>Approve Claim</p>
                </a>
              </li>
			  @endif
			   @if($val['auth_reference'] == 'rejectedclaim')
			  <li class="nav-item">
                <a href="http://127.0.0.1:8000/rejectedclaim" class="nav-link">
                  <i class="nav-icon fas fa-exclamation-triangle"></i>
                  <p>Rejected Claims</p>
                </a>
              </li>
			  @endif
			  @endforeach
            </ul>
          </li>
		  @endif
			  @endforeach



		  @php
			$counteryu = 0;
			@endphp

			@foreach ($ann as $val)
             @if($val['auth_reference'] == 'contactss' || $val['auth_reference'] == 'conatctview')
          <li class="nav-item has-treeview">
	  @if($counteryu==0)
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-address-card"></i>
              <p>
               Contacts
                <i class="right fas fa-angle-left"></i>
              </p>

            </a>
			@endif

			@php
			$counteryu++;
			@endphp
            <ul class="nav nav-treeview">
			@foreach ($ann as $val)
			@if($val['auth_reference'] == 'contactss')
              <li class="nav-item">
                <a href="http://127.0.0.1:8000/contactss" class="nav-link">
                  <i class="nav-icon fas fa-sitemap"></i>
                  <p>Org Chart</p>
                </a>
              </li>
			  @endif
			  @if($val['auth_reference'] == 'conatctview')
              <li class="nav-item">
                <a href="http://127.0.0.1:8000/conatctview" class="nav-link">
                 <i class="nav-icon fas fa-address-card"></i>
                  <p>My Contacts</p>
                </a>
              </li>
			  @endif
			  @endforeach
            </ul>
          </li>
          @endif
		@endforeach



			 @php
			$countery = 0;
			@endphp

			@foreach ($ann as $val)
             @if($val['auth_reference'] == 'myticket' || $val['auth_reference'] == 'ticket' || $val['auth_reference'] == 'openticket')
          <li class="nav-item has-treeview">
	  @if($countery==0)
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-ticket-alt"></i>
              <p>
                Tickets
				<i class="right fas fa-angle-left"></i>
              </p>

            </a>
			@endif

			@php
			$countery++;
			@endphp
            <ul class="nav nav-treeview">
			@foreach ($ann as $val)
			@if($val['auth_reference'] == 'myticket')
              <li class="nav-item">
                <a href="http://127.0.0.1:8000/myticket" class="nav-link">
                  <i class="nav-icon fas fa-ticket-alt"></i>
                  <p>My Tickets</p>
                </a>
              </li>
			  @endif
			  @if($val['auth_reference'] == 'ticket')
              <li class="nav-item">
                <a href="http://127.0.0.1:8000/ticket" class="nav-link">
                 <i class="nav-icon fas fa-eye"></i>
                  <p>All Tickets</p>
                </a>
              </li>
			  @endif
			   @if($val['auth_reference'] == 'openticket')
              <li class="nav-item">
                <a href="http://127.0.0.1:8000/openticket" class="nav-link">
                 <i class="nav-icon fas fa-user-check"></i>
                  <p>Assigned Tickets</p>
                </a>
              </li>
			  @endif
			  @endforeach
            </ul>
          </li>
          @endif
		@endforeach

		@php
			$tic_comp = 0;
			@endphp

			@foreach ($ann as $val)
             @if($val['auth_reference'] == 'component' || $val['auth_reference'] == 'assigncomponent')
          <li class="nav-item has-treeview">
	  @if($tic_comp==0)
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-swatchbook"></i>
              <p>
                Ticket Component
				<i class="right fas fa-angle-left"></i>
              </p>

            </a>
			@endif

			@php
			$tic_comp++;
			@endphp
            <ul class="nav nav-treeview">
			@foreach ($ann as $val)
			@if($val['auth_reference'] == 'component')
              <li class="nav-item">
                <a href="http://127.0.0.1:8000/component" class="nav-link">
                  <i class="nav-icon fas fa-plus-square"></i>
                  <p>Create Component</p>
                </a>
              </li>
			  @endif
			  @if($val['auth_reference'] == 'assigncomponent')
              <li class="nav-item">
                <a href="http://127.0.0.1:8000/assigncomponent" class="nav-link">
                  <i class="nav-icon fas fa-user-check"></i>
                  <p>Assign Component</p>
                </a>
              </li>
			  @endif
			  @endforeach
            </ul>
          </li>
          @endif
		@endforeach

		@php
			$countersss1 = 0;
			@endphp

			@foreach ($ann as $val)
             @if($val['auth_reference'] == 'task' || $val['auth_reference'] == 'assigntask' || $val['auth_reference'] == 'delegatedtask')
          <li class="nav-item has-treeview">
	  @if($countersss1==0)
            <a href="#" class="nav-link">
		<i class="nav-icon fas fa-tasks"></i>
              <p>
                Task
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
			@endif

			@php
			$countersss1++;
			@endphp
            <ul class="nav nav-treeview">
			@foreach ($ann as $val)
			@if($val['auth_reference'] == 'task')
              <li class="nav-item">
                <a href="http://127.0.0.1:8000/task" class="nav-link">
                 <i class="nav-icon fas fa-plus-square"></i>
                  <p>Create Task</p>
                </a>
              </li>
			  @endif
			 @if($val['auth_reference'] == 'assigntask')
              <li class="nav-item">
                <a href="http://127.0.0.1:8000/assigntask" class="nav-link">
                  <i class="nav-icon fas fa-user-check"></i>
                  <p>Assigned Tasks</p>
                </a>
              </li>
			  @endif
			   @if($val['auth_reference'] == 'delegatedtask')
              <li class="nav-item">
                <a href="http://127.0.0.1:8000/delegatedtask" class="nav-link">
                  <i class="nav-icon fas fa-sitemap"></i>
                  <p>Delegated Tasks</p>
                </a>
              </li>
			  @endif
			  @endforeach
            </ul>
          </li>
          @endif
		@endforeach

			@php
			$countersss = 0;
			@endphp

			@foreach ($ann as $val)
             @if($val['auth_reference'] == 'announce' || $val['auth_reference'] == 'announcetype' || $val['auth_reference'] == 'myann' || $val['auth_reference'] == 'newproductlaunch')
          <li class="nav-item has-treeview">
	  @if($countersss==0)
            <a href="#" class="nav-link">
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
			@if($val['auth_reference'] == 'announce')
              <li class="nav-item">
                <a href="http://127.0.0.1:8000/announce" class="nav-link">
                  <i class="nav-icon fas fa-plus-square"></i>
                  <p>Create</p>
                </a>
              </li>
			  @endif
			  @if($val['auth_reference'] == 'announcetype')
              <li class="nav-item">
                <a href="http://127.0.0.1:8000/announcetype" class="nav-link">
                  <i class="nav-icon fas fa-plus-square"></i>
                  <p>Create Type</p>
                </a>
              </li>
			  @endif
			   @if($val['auth_reference'] == 'myann')
              <li class="nav-item">
                <a href="http://127.0.0.1:8000/myann" class="nav-link">
                  <i class="nav-icon fas fa-eye"></i>
                  <p>My Announcements</p>
                </a>
              </li>
			  @endif
        @if($val['auth_reference'] == 'newproductlaunch')
            <li class="nav-item">
              <a href="http://127.0.0.1:8000/newproductlaunch" class="nav-link">
                <i class="nav-icon fas fa-plus-square"></i>
                <p> New Product Launch</p>
              </a>
            </li>
            @endif
			  @endforeach
            </ul>
          </li>
          @endif
		@endforeach

		@php
			$arae = 0;
			@endphp

			@foreach ($ann as $val)
             @if($val['auth_reference'] == 'levelsettings' || $val['auth_reference'] == 'area' || $val['auth_reference'] == 'zone')
          <li class="nav-item has-treeview">
	  @if($arae==0)
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                Settings
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
			@endif

			@php
			$arae++;
			@endphp
            <ul class="nav nav-treeview">
			@foreach ($ann as $val)
			 @if($val['auth_reference'] == 'levelsettings')
			  <li class="nav-item">
                <a href="http://127.0.0.1:8000/levelsettings" class="nav-link">
                  <i class="nav-icon fas fa-wrench"></i>
                  <p>Configurations</p>
                </a>
              </li>
			  @endif
			  @if($val['auth_reference'] == 'area')
              <li class="nav-item">
                <a href="http://127.0.0.1:8000/area" class="nav-link">
                  <i class="nav-icon fas fa-map-marked-alt"></i>
                  <p>Area</p>
                </a>
              </li>
			  @endif
			   @if($val['auth_reference'] == 'zone')
              <li class="nav-item">
                <a href="http://127.0.0.1:8000/zone" class="nav-link">
                  <i class="nav-icon fas fa-broadcast-tower"></i>
                  <p>Zone</p>
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


  </aside>




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
<div id="errors"></div>


        <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
		  <div class="row">
            <h1>Pending Claims</h1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<form action="{{route('approveclaim.store')}}" method="POST">
			{{csrf_field()}}
			<input type="hidden" name="cycle" value="{{session('cycle')}}">
			<input type="hidden" name="month" value="{{session('month')}}">
			<input type="hidden" name="year" value="{{session('year')}}">
			<button class="btn btn-info" type="submit"><i class="fas fa-arrow-alt-circle-left"></i> Go Back</button>
			</form>
			</div>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard.index')}}">Home</a></li>
              <li class="breadcrumb-item active">Pending Claims</li>
            </ol>
          </div>
        </div>
		<br>
		<div class="row">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<small><i class="fas fa-bus text-maroon"></i>&nbsp;Bus/Train &nbsp;&nbsp;&nbsp;<i class="fas fa-plane text-indigo"></i>&nbsp;Air &nbsp;&nbsp;&nbsp;<i class="fas fa-taxi text-success"></i>&nbsp;Taxi/Auto/Rickshaw &nbsp;&nbsp;&nbsp;<i class="fas fa-hotel text-purple"></i>&nbsp;<b>(H)</b>&nbsp;Hotel &nbsp;&nbsp;&nbsp;<i class="fas fa-gas-pump text-pink"></i>&nbsp;Fuel &nbsp;&nbsp;&nbsp;<i class="fas fa-tools text-lime"></i>&nbsp;Vehicle Repair &nbsp;&nbsp;&nbsp;<i class="fas fa-route text-primary"></i>&nbsp;DA Outstation &nbsp;&nbsp;&nbsp;<i class="fas fa-map-marker-alt text-fuchsia"></i>&nbsp;DA Local &nbsp;&nbsp;&nbsp;<i class="fas fa-wifi text-orange"></i>&nbsp;<b>(I)</b>&nbsp;Internet/Phone &nbsp;&nbsp;&nbsp;<i class="fas fa-mobile-alt text-info"></i>&nbsp;<b>(S)</b>&nbsp;Stationary&nbsp;&nbsp;&nbsp;<i class="fab fa-medium-m text-secondary"></i>&nbsp;Miscellaneous</small></div>

      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
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

			  	 <div class="modal fade text-left claimModal">
        <div class="modal-dialog">
          <div class="modal-content" style="width: 600px; height: 100px;">

                <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Edit Claim</h3>
				 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              </div>

      <form class="form-horizontal" id="claim_form" method="POST">

                <div class="card-body">
				<input type="hidden" name="claim_id" id="claim_Id" class="form-control"  value="">
				<input type="hidden" name="EMPLOYEE_ID" id="EMPLOYEE_ID" class="form-control"  value="">
                 <div class="card card-info">
				 <div class="card-header">
				 <h3 class="card-title">Change Travel Expense</h3>
				 <div class="card-tools">
				 <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Expand">
				 <i class="fas fa-minus"></i>
				 </button>
				 </div>
				 </div>

				 <div class="card-body">

				 <div class="form-group row">
				 <label class="col-sm-4 col-form-label">
				 <i class="fas fa-bus text-maroon"></i> Bus/Train</label>
				 <div class="col-sm-8">
				 <input name="EXP_BUS_TRAIN" id="EXP_BUS_TRAIN" class="form-control" value="">
				 </div>
				 </div>

				 <div class="form-group row">
				 <label  class="col-sm-4 col-form-label">
				 <i class="fas fa-plane text-indigo"></i> Air</label>
				 <div class="col-sm-8">
				 <input name="EXP_PLANE" id="EXP_PLANE" class="form-control" value="">
				 </div>
				 </div>

				 <div class="form-group row">
				 <label  class="col-sm-4 col-form-label">
				 <i class="fas fa-taxi text-success"></i> Taxi/Auto/Rickshaw</label>
				 <div class="col-sm-8">
				 <input name="EXP_TAXI_AUTO" id="EXP_TAXI_AUTO" class="form-control" value="">
				 </div>
				 </div>

				 <div class="form-group row">
				 <label  class="col-sm-4 col-form-label">
				 <i class="fas fa-tools text-lime"></i> Vehicle Repair</label>
				 <div class="col-sm-8">
				 <input name="EXP_VEH_REPAIR" id="EXP_VEH_REPAIR" class="form-control" value="">
				 </div>
				 </div>

				 <div class="form-group row">
				 <label  class="col-sm-4 col-form-label">
				 <i class="fas fa-gas-pump text-pink"></i> Fuel</label>
				 <div class="col-sm-8">
				 <input name="EXP_FUEL" id="EXP_FUEL" class="form-control" value="">
				 </div>
				 </div>
				 </div>
				 </div>

				 <div class="card card-info">
				 <div class="card-header">
				 <h3 class="card-title">Change Other Expense</h3>
				 <div class="card-tools">
				 <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Expand">
				 <i class="fas fa-minus"></i>
				 </button>
				 </div>
				 </div>

				 <div class="card-body">

				 <div class="form-group row">
				 <label  class="col-sm-4 col-form-label">
				 <i class="fas fa-hotel text-purple"></i> Hotel</label>
				 <div class="col-sm-8">
				 <input name="EXP_HOTEL" id="EXP_HOTEL" class="form-control" value="">
				 </div>
				 </div>

				 <div class="form-group row">
				 <label  class="col-sm-4 col-form-label">
				 <i class="fas fa-map-marker-alt text-fuchsia"></i> DA Local</label>
				 <div class="col-sm-8">
				 <input name="DA_RATES_LOCAL" id="DA_RATES_LOCAL" class="form-control" value="">
				 </div>
				 </div>

				 <div class="form-group row">
				 <label  class="col-sm-4 col-form-label">
				 <i class="fas fa-route text-primary"></i> DA Outsation</label>
				 <div class="col-sm-8">
				 <input name="DA_RATES_OUTST" id="DA_RATES_OUTST" class="form-control" value="">
				 </div>
				 </div>

				 <div class="form-group row">
				 <label  class="col-sm-4 col-form-label">
				 <i class="fas fa-wifi text-orange"></i> Internet\Phone</label>
				 <div class="col-sm-8">
				 <input name="EXP_MOBILE_INTERNET" id="EXP_MOBILE_INTERNET" class="form-control" value="">
				 </div>
				 </div>

				 <div class="form-group row">
				 <label  class="col-sm-4 col-form-label">
				 <i class="fas fa-mobile-alt text-info"></i> Stationary</label>
				 <div class="col-sm-8">
				 <input name="EXP_STATIONARY" id="EXP_STATIONARY" class="form-control" value="">
				 </div>
				 </div>

				 <div class="form-group row">
				 <label  class="col-sm-4 col-form-label">
				 <i class="fab fa-medium-m text-secondary"></i> Misc</label>
				 <div class="col-sm-8">
				 <input name="EXP_MISC" id="EXP_MISC" class="form-control" value="">
				 </div>
				 </div>



				 </div>
				 </div>
				  <div class="card card-info">
				 <div class="card-header">
				 <h3 class="card-title">Comments</h3>
				 <div class="card-tools">
				 <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Expand">
				 <i class="fas fa-minus"></i>
				 </button>
				 </div>
				 </div>

				 <div class="card-body">
				 <input type="text" id="comments" name="comments" class="form-control" value="">

				  </p>

				 </div>

				 </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-warning float-right">Update</button>
                  <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
                </div>

              </form>

            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

<div class="card-body">
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
                <table id="example5" class="table table-bordered table-hover">

			  <thead>
                  <tr>
				  <th></th>
                    <th>Travel</th>
					<th>DA</th>
					<th>I</th>
					<th>H</th>
					<th>S</th>
					<th>M</th>
					<th>Date</th>
					<th>A</th>
					<th>Status</th>
					<th></th>
					<th></th>
                  </tr>
                  </thead>
                  <tbody>
				   @isset($pending)
				   @foreach($pending as $valu)

				@if($valu['APPROVAL_STATUS'] == "0" || $valu['APPROVAL_STATUS'] == "3")

				  <tr>
				  <td class="text-center"></td>
				 <td class="text-center">
				  <div class="row" id="printableArea">
				  <small>

				  <nav class="navbar">
					<a class="d-flex flex-column">
					<span class='badge badge-secondary'>{{$valu['EXP_TAXI_AUTO']}}</span>
					<i class="fas fa-taxi text-success"></i>
					 </a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<a class="d-flex flex-column">
					<span class='badge badge-secondary'>{{$valu['EXP_BUS_TRAIN']}}</span>
					<i class="fas fa-bus text-maroon"></i>
					 </a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					 <a class="d-flex flex-column">
					 <span class='badge badge-secondary'>{{$valu['EXP_PLANE']}}</span>
					<i class="fas fa-plane text-indigo"></i>
					 </a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					  <a class="d-flex flex-column">
					<span class='badge badge-secondary'>{{$valu['EXP_FUEL']}}</span>
					<i class="fas fa-gas-pump text-pink"></i>
					 </a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					  <a class="d-flex flex-column">
					<span class='badge badge-secondary'>{{$valu['EXP_VEH_REPAIR']}}</span>
					<i class="fas fa-tools text-lime"></i>
					 </a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					</nav>

					</small>
					</div>


				  </td>
				  <td class="text-center">
				  <div class="row">
				  <small>

				  <nav class="navbar">
					<a class="d-flex flex-column">
					<span class='badge badge-secondary'>{{$valu['DA_RATES_LOCAL']}}</span>
					 <i class="fas fa-map-marker-alt text-fuchsia"></i>
					 </a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<a class="d-flex flex-column">
					<span class='badge badge-secondary'>{{$valu['DA_RATES_OUTST']}}</span>
					<i class="fas fa-route text-primary"></i>
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
					<span class='badge badge-secondary'>{{$valu['EXP_MOBILE_INTERNET']}}</span>
					<i class="fas fa-wifi text-orange"></i>
					 </a>

					</nav>

					</small>
					</div>

				  </td>

				  <td class="text-center">
				  <div class="row" id="printTable">
				  <small>

				  <nav class="navbar">
					<a class="d-flex flex-column">
					<span class='badge badge-secondary'>{{$valu['EXP_HOTEL']}}</span>
					<i class="fas fa-hotel text-purple"></i>
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
					 <span class='badge badge-secondary'>{{$valu['EXP_STATIONARY']}}</span>
					<i class="fas fa-mobile-alt text-info"></i>
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
					<span class='badge badge-secondary'>{{$valu['EXP_MISC']}}</span>
					<i class="fab fa-medium-m text-secondary"></i>
					 </a>
					</nav>

					</small>
					</div>

				  </td>

				  <td>{{\Carbon\Carbon::parse($valu['CLAIM_DATE'])->format('d/m/Y')}}</td>

				  <td>
				   @if($valu['APPROVAL_STATUS'] == "0")
				   @php
				$claim = json_encode($valu);
				@endphp

					   <a class='btn btn-warning btn-sm claim' href='#' value="{{$claim}}" id="{{$valu['CLAIM_ID']}}" title="Edit">
                             <i class='fas fa-edit'></i>
                          </a>
					 @else
				  @php
				$approved_claim = json_encode($valu);
				@endphp
				 <a class='btn btn-primary btn-sm approved_claim' href='#' value="{{$approved_claim}}" id="{{$valu['CLAIM_ID']}}" title="View Comments">
                             <i class='fas fa-eye'></i>
                          </a>
			   @endif
				  </td>
				   <td>
				   @if($valu['APPROVAL_STATUS'] == "0")
				  <span class="badge badge-info">Pending</span>
			  @else
				  <span class="badge badge-secondary">Zero Claim</span>
			   @endif
				   </td>
				   <td>{{$valu['CLAIM_ID']}}</td>
				    <td>{{$valu['EMPLOYEE_ID']}}</td>
					<td>{{$valu['APPROVAL_STATUS']}}</td>
				  </tr>

				  @endif
				  @endforeach
				   @endisset
			@empty($pending)
			<script>toastr.warning("No records found.");</script>
			@endempty
				  </tbody>
				  </table>
				  <br>


              <!-- /.card -->









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
	<script src="{!! asset('suprsales_resource/plugins/datatables/sum().js') !!}" type="text/javascript"></script>



<meta name="csrf-token" content="{{ csrf_token() }}" />
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
$(document).ready(function() {
var tables =    $('#example5').DataTable({
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
            'checkboxes': {
               'selectRow': true
            }
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

    },
	{
        targets: 10,
		className: 'dt-center',
		"visible": false,
      "searchable": false

    },
	{
        targets: 11,
		className: 'dt-center',
		"visible": false,
      "searchable": false

    },
		{
        targets: 12,
		className: 'dt-center',
		"visible": false,
      "searchable": false

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
         .html('<div class="btn-group"><button type="button" class="btn btn-info btn-sm" title="Approve">Action</button><button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown"><div class="dropdown-menu" role="menu"><a class="dropdown-item" id="btnSelectedRows">Approve</a><div class="dropdown-divider"></div><a class="dropdown-item" id="btnSelectedRow">Reject</a></div></button></div>');

$('#btnSelectedRows').on('click', function() {

  var claim = tables.rows( { selected: true } ).data().pluck(10).toArray();
  var emp = tables.row( { selected: true } ).data()[11];
  //var status = tables.rows('.selected').data().pluck(10);
   var start_date = "{{$start_date}}";
  var end_date = "{{$end_date}}";
  var status = 1;
 const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

	$.ajax({
	  type: 'POST',
	  url: "{{ route('approval.store') }}",
	  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  },
	  data:{status:status, claim:claim, emp:emp, start_date:start_date, end_date:start_date},
	  success:function(data){
              if (data == 'success') {
        toastr.success('Approved Successfully. Please refresh if results do not appear shortly')
		location.reload();
			  }
    else if (data == "failed") {
        toastr.success('Approved Successfully. Please refresh if results do not appear shortly')
		location.reload();
			  }




           }
});


toastr.success('Approved Successfully. Please refresh if results do not appear shortly')
 location.reload();
});

$('#btnSelectedRow').on('click', function() {

  var claim = tables.rows('.selected').data().pluck(10).toArray();
  var emp = tables.row( { selected: true } ).data()[11];
  //var status = tables.rows('.selected').data().pluck(10);
  var status = 2;
  var start_date = "{{$start_date}}";
  var end_date = "{{$end_date}}";


 const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

	$.ajax({
	  type: 'POST',
	  url: "{{ route('approval.store') }}",
	  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  },
	  data:{status:status, claim:claim, emp:emp, start_date:start_date, end_date:start_date},
	  success:function(data){
             if (data == 'success') {
        toastr.success('Rejected Successfully. Please refresh if results do not appear shortly')
		location.reload();
			  }
    else if (data == "failed") {
        toastr.success('Rejected Successfully. Please refresh if results do not appear shortly')
		location.reload();
			  }

           }
});
toastr.success('Rejected Successfully. Please refresh if results do not appear shortly')
 location.reload();

});
$("#example5").show();
		},

		'select': {
         'style': 'multi',
		  info: false
      },
      'order': [[1, 'asc']]
    });


});
</script>


<script type="text/javascript">
$(document).ready(function () {
  bsCustomFileInput.init();
  $("[data-card-widget='collapse']").click()
});
</script>

<script type="text/javascript">
$(document).ready(function () {
function myFunction() {
  $("#view4").modal("hide");
}
});
</script>

<script>

 $("body").on("click", ".claim", function(event){
           var claim = $(this).attr("id");

			var values = document.getElementById(claim).getAttribute("value");
			var claims = JSON.parse(values);


			$('#claim_Id').val(claims.CLAIM_ID);
			$('#EXP_BUS_TRAIN').val(claims.EXP_BUS_TRAIN);
			$('#EXP_PLANE').val(claims.EXP_PLANE);
			$('#EXP_TAXI_AUTO').val(claims.EXP_TAXI_AUTO);
			$('#EXP_VEH_REPAIR').val(claims.EXP_VEH_REPAIR);
			$('#EXP_PER_KM_RATE').val(claims.EXP_PER_KM_RATE);
			$('#EXP_HOTEL').val(claims.EXP_HOTEL);
			$('#DA_RATES_OUTST').val(claims.DA_RATES_OUTST);
			$('#DA_RATES_LOCAL').val(claims.DA_RATES_LOCAL);
			$('#EXP_MOBILE_INTERNET').val(claims.EXP_MOBILE_INTERNET);
			$('#EXP_STATIONARY').val(claims.EXP_STATIONARY);
			$('#EXP_MISC').val(claims.EXP_MISC);
			$('#EXP_FUEL').val(claims.EXP_FUEL);
			$('#comments').val(claims.MISC_COMMENTS);
			$('#EMPLOYEE_ID').val(claims.EMPLOYEE_ID);

			$('.claimModal').modal("show");
		  });

		  $("body").on("click", ".approved_claim", function(event){
           var approved_claim = $(this).attr("id");

			var values = document.getElementById(approved_claim).getAttribute("value");
			var claims = JSON.parse(values);

			$('#approved_comments').val(claims.MISC_COMMENTS);


			$('.approved_modal').modal("show");
		  });
</script>

<script>
$('#claim_form').on("submit", function(event){
event.preventDefault();

var approveclaim = document.getElementById("claim_Id").value;
//alert(viewclaim);

var EXP_BUS_TRAIN = document.getElementById("EXP_BUS_TRAIN").value;
var EXP_PLANE = document.getElementById("EXP_PLANE").value;
var EXP_TAXI_AUTO = document.getElementById("EXP_TAXI_AUTO").value;
var EXP_VEH_REPAIR = document.getElementById("EXP_VEH_REPAIR").value;
var EXP_HOTEL = document.getElementById("EXP_HOTEL").value;
var DA_RATES_OUTST = document.getElementById("DA_RATES_OUTST").value;
var DA_RATES_LOCAL = document.getElementById("DA_RATES_LOCAL").value;
var EXP_MOBILE_INTERNET = document.getElementById("EXP_MOBILE_INTERNET").value;
var EXP_STATIONARY = document.getElementById("EXP_STATIONARY").value;
var EXP_MISC = document.getElementById("EXP_MISC").value;
var EXP_FUEL = document.getElementById("EXP_FUEL").value;
var MISC_COMMENTS = document.getElementById("comments").value;
var EMPLOYEE_ID = document.getElementById("EMPLOYEE_ID").value;

$.ajax({
	  type: 'POST',
	  url: '/approveclaim/' + approveclaim,
	  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  },
	  data:{'_method':'PUT', EXP_BUS_TRAIN:EXP_BUS_TRAIN, EMPLOYEE_ID:EMPLOYEE_ID, MISC_COMMENTS:MISC_COMMENTS, EXP_PLANE:EXP_PLANE, EXP_TAXI_AUTO:EXP_TAXI_AUTO, EXP_VEH_REPAIR:EXP_VEH_REPAIR, EXP_HOTEL:EXP_HOTEL, DA_RATES_OUTST:DA_RATES_OUTST, DA_RATES_LOCAL:DA_RATES_LOCAL, EXP_MOBILE_INTERNET:EXP_MOBILE_INTERNET, EXP_STATIONARY:EXP_STATIONARY, EXP_MISC:EXP_MISC, EXP_FUEL:EXP_FUEL},
	  success:function(data){
              //alert(data.success);

			  toastr.success('Claim Updated Successfully')

			  location.reload();

           },
		      error: function(xhr, status, error)
        {

         var err = "";
          $.each(xhr.responseJSON.errors, function (key, item)
          {

			  err = err.concat(item+"<br>");

          });
		  if(err !== '' && err !== null && err !== undefined){
			  $("#errors").html("<ul class='alert alert-danger'>"+err+"</ul>");
		  }
		toastr.error('Claim Not Updated. Please check permissible values')
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


