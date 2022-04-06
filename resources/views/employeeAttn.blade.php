@extends('layouts.app')
{{-- Main section is for the content when the working shows --}}
@section('content')
  {{-- It is for veryfy the customer and verified by their ids --}}
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

 @isset($emp)
		 @foreach ($emp as $value)
		  @php
		   $emid = $value['EMP_ID'];

		  @endphp
	       @break
		 @endforeach
      @endisset
<section>
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-9">
		 <div class="row">

            <h1>Attendance Details</h1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<!-- <button class="btn btn-info"><a href="Javascript:history.go(-1);Location.reload()" class="text-white"><i class="fas fa-arrow-alt-circle-left"></i> Go Back</a></button> -->

			</div>
          </div>
          <div class="col-sm-3">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard.index')}}">Home</a></li>
              <li class="breadcrumb-item active">Daily Attendance</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
@if(isset(Auth::user()->id))

    <!-- <section class="content">
        <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-3">
          </div>

  <div class="card" style="height:50%; width:50% ">
  <br>
  {{-- This is the Suprsales icon and the Text in the login tab --}}
   <div class="text-center">
         <img src="/suprsales_resource/dist/img/suprsales.png" style="height:15%; width:15%;">
		    <span>
    <img src="/suprsales_resource/dist/img/SuprsalesText.png" style="height:60%; width:60%;">
  </span>
  </div>
    <div class="card-body login-card-body" >
			 {{ csrf_field() }}
       {{-- This tab is used for the employee id tab --}}
         	<div class="login-logo">

  		<div id="datee"></div>
      <div id="timee" class="bold"></div>
  	</div>


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

        </div>
          </div>

        </div>

        </div>
    </section> -->
    <section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">


          {{-- This is the table heading inside the all employees --}}
          <div class="card-body">

            <table id="atn_table" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th></th>
                  <th>Employee Code</th>
                  <th>Name</th>
                  <th>Leave Request</th>
                  <th>Leave Approve</th>
                  <th>Action</th>
                  <th class="text-center">Status</th>

                </tr>
              </thead>
              <tbody>
                {{-- Get the employees details from the API and store the details inside $admins --}}
                @isset($admins)
                @foreach ($admins as $value)

                <tr>
                  <td> </td>

                  {{-- It gives the Employee ID from API --}}
                  <td>{{ $value['EMP_CODE'] }}</td>


                  <td>
                    {{-- inside the name column It shows permanent or contract --}}
                    @if ($value['EMP_CONTRACT_TYPE'] =='0')
                    <span class='badge badge-secondary'>Permanent</span>
                    @elseif ($value['EMP_CONTRACT_TYPE'] =='1')

                    <span class='badge badge-primary'>Contract</span>
                    @endif
                    &nbsp;&nbsp;
                    {{ $value['EMP_NAME'] }}


                  </td>
                  {{-- It gives the Employee Email from API --}}
                  <td>{{ $value['EMP_EMAIL'] }}</td>

                  <td>
                      {{-- For the FLag 1 users the eye btn is enable otherwise it is disable --}}
                    <div class="btn-group btn-group-sm">
                      @if($value['FLAG'] =='1')
                      <a class='btn btn-info reset' href='#' id="{{$value['EMP_ID']}}" data-target="#vie" data-toggle="modal" title="reset password">
                        <i class='fa fa-key'></i></a>
                      @else
                      <a class='btn btn-info reset disabled' href='#' id="{{$value['EMP_ID']}}" data-target="#vie" data-toggle="modal" title="reset password">
                        <i class='fa fa-key'></i></a>
                      @endif
                    {{-- It encode the value as Admins and store in $emp_record in json format --}}
                      @php
                      $emp_record = json_encode($value);
                      @endphp

                      {{-- For the FLag 1 users the edit btn is enable otherwise it is disable --}}
                      @if($value['FLAG'] =='1')
                      <a class='btn btn-success view_data' href='#' value="{{$emp_record}}" id="view1_{{$value['EMP_ID']}}" title="View/Edit Employee Details">
                        <i class='fas fa-edit'></i>
                      </a>
                      @else
                      <a class='btn btn-success view_data disabled' href='#' value="{{$emp_record}}" id="view1_{{$value['EMP_ID']}}" title="View/Edit Employee Details">
                        <i class='fas fa-edit'></i>
                      </a>
                      @endif
                       {{-- For the FLag 1 users the login btn is enable otherwise it is disable define by EMP_ID --}}
                      @if($value['FLAG'] =='1')
                      <a class='btn btn-warning login_details' href='#' id="{{$value['EMP_ID']}}_Desktop" title="login details">
                        <i class='fas fa-sign-in-alt'></i>
                      </a>
                      @else
                      <a class='btn btn-warning login_details disabled' href='#' id="{{$value['EMP_ID']}}_Desktop" title="login details">
                        <i class='fas fa-sign-in-alt'></i>
                      </a>
                      @endif

                    </div>
                  </td>
                  <td>
            {{-- Value inside EMP_id Stored at $empss --}}
                    @php
                    $empss = $value['EMP_ID'];
                    @endphp
                      {{-- For the FLag 1 users the Customer is enable inside view  otherwise it is disable --}}
                    @if($value['FLAG'] =='1')
                    <a class='btn btn-warning btn-app btn-xs' href="{{ route('empss.show',$empss)}}" style="height:40px; max-width:1%; padding-left:0px; padding-right:0px;" title="View assigned customers">
                      <span class='badge bg-teal'>{{ $value['EMP_TOTAL_CUSTOMER'] }}</span>
                      <i class='fas fa-users'></i>Customers
                    </a>
                    @else
                    <a class='btn btn-warning btn-app btn-xs disabled' href="{{ route('empss.show',$empss)}}" style="height:40px; max-width:1%; padding-left:0px; padding-right:0px;" title="View assigned customers">
                      <span class='badge bg-teal'>{{ $value['EMP_TOTAL_CUSTOMER'] }}</span>
                      <i class='fas fa-users'></i>Customers
                    </a>
                    @endif

                  </td>

                      {{-- For the FLag 1 users the Activated is enable otherwise it is deActivated --}}
                  @if($value['FLAG'] =='1')
                  <td class='project-state'>
                    <span class='badge badge-success'>Activated</span>
                  </td>
                  @else
                  <td class='project-state'>
                    <span class='badge badge-danger'>Deactivated</span>
                  </td>
                  @endif
                  <td>{{ $value['EMP_ID'] }}</td>

                  <td>{{ $value['FLAG'] }}</td>
                </tr>
                @endforeach
                @endisset

                <!--  If there is no record when the search by the name or ID -->
                @empty($admins)
                <script>
                  toastr.warning("No records found.");
                </script>
                @endempty



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
@endif
<!-- <div class="card-body">

            <div class="card card-primary">
              <div class="card-body p-0">
                 THE CALENDAR 
                <div id="calendar"></div>
              </div>
           
            </div>
           
</div> -->
<!-- <script type="text/javascript">


  var interval = setInterval(function() {
    var momentNow = moment();
    $('#datee').html(momentNow.format('dddd').substring(0,3).toUpperCase() + ' - ' + momentNow.format('MMMM DD, YYYY'));
    $('#timee').html(momentNow.format('hh:mm:ss A'));
  }, 100);


</script>

<script src="{!! asset('suprsales_resource/plugins/fullcalendar/main.min.js') !!}" type="text/javascript"></script>
<script src="{!! asset('suprsales_resource/plugins/fullcalendar-daygrid/main.min.js') !!}" type="text/javascript"></script>
<script src="{!! asset('suprsales_resource/plugins/fullcalendar-timegrid/main.min.js') !!}" type="text/javascript"></script>
<script src="{!! asset('suprsales_resource/plugins/fullcalendar-interaction/main.min.js') !!}" type="text/javascript"></script>
<script src="{!! asset('suprsales_resource/plugins/fullcalendar-bootstrap/main.min.js') !!}" type="text/javascript"></script>

<script type="text/javascript">



    //Date for the calendar events (dummy data)
    var date = new Date()
    var d    = date.getDate(),
        m    = date.getMonth(),
        y    = date.getFullYear()

    var Calendar = FullCalendar.Calendar;

    var calendarEl = document.getElementById('calendar');



    var calendar = new Calendar(calendarEl, {
      plugins: [ 'bootstrap', 'interaction', 'dayGrid', 'timeGrid' ],
      header    : {
        left  : 'prev,next today',
        center: 'title',
        right : 'dayGridMonth,timeGridWeek,timeGridDay'
      },
      'themeSystem': 'bootstrap',
      //Random default events
      events    : [

      ],
      editable  : true,
      droppable : true, // this allows things to be dropped onto the calendar !!!
      drop      : function(info) {
        // is the "remove after drop" checkbox checked?
        if (checkbox.checked) {
          // if so, remove the element from the "Draggable Events" list
          info.draggedEl.parentNode.removeChild(info.draggedEl);
        }
      }
    });

    calendar.render();




</script> -->
@endsection
