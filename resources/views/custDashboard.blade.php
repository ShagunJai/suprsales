
{{-- this is the layouts contain inside the layouts folder --}}
@extends('layouts.dashborad_layout')
{{-- it shows content part --}}
@section('content')
{{-- after verified the user it content of the dashboard shown --}}
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
{{-- Carbon::now() returns the current date and time --}}
@if(\Carbon\Carbon::now()->format('d') >= '16')
           {{-- $cycle assess. their performance and cyclability.  --}}
           {{--H2 is for $start_day = "16"; $end_day = "31";--}}
			  @php
		  $cycle = "H2";
		  @endphp

			  @else
           {{--H1 is for $start_day = "01"; $end_day = "15";--}}
			  @php
		  $cycle = "H1";
		  @endphp

 @endif

<div class="modal fade text-left productsModal">
        <div class="modal-dialog">
          <div class="modal-content" style="width: 800px; height: 100px;">

                <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Top Products</h3>
				 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              </div>

          <div class="card-body">

		<div class="row"><small>&nbsp;&nbsp;<ion-icon name="water" color="primary"></ion-icon>&nbsp;Liquid&nbsp;&nbsp;&nbsp;<ion-icon name="layers" color="success"></ion-icon>&nbsp;Unit&nbsp;&nbsp;&nbsp;<ion-icon name="apps" color="warning"></ion-icon>&nbsp;Dust</small></div>
       <br>
			  <table id="prod" class="table table-bordered table-hover">
			  <thead>
                  <tr>
				  <th>Category</th>
				  <th>Product ID</th>
				  <th>Description</th>
                    <th>Sold</th>
                  </tr>
                  </thead>
                  <tbody>
				    @isset($top_prod)
				@foreach($top_prod as $values)
				  <tr>
				  @if (empty($values['CATEGORY'] ))
				<td>
			  <div class="text-primary text-lg" title="Undefined Category"><ion-icon name="help-outline"></ion-icon>

                   </div>   </td>
				   @else
             @if ($values['CATEGORY'] =='LIQUID')
							<td>
			  <div class="text-primary text-lg" title="Liquid"><ion-icon name="water"></ion-icon>

                   </div>   </td>
						@elseif ($values['CATEGORY'] =='UNIT')
							<td> <div class="text-success text-lg" title="Unit"><ion-icon name="layers"></ion-icon>
                    </div>  </td>
						@elseif ($values['CATEGORY'] =='DUST')
							 <td><div class="text-warning text-lg" title="Dust"><ion-icon name="apps"></ion-icon>
                 </div>    </td>
						@endif
			@endif
				  <td>{{$values['SKU_ID']}}</td>
				   <td>{{$values['SKU_DESCRIPTION']}}</td>
				  <td>{{$values['TOTAL_SKU']}}</td>
				  </tr>
				  @endforeach
				  @endisset
				  </tbody>
				  </table>

			  </div>

		 <div class="card-footer">
		 <button class="btn btn-primary float-right"><a href="{{ route('stocklist.index')}}" class="text-white">More Details</a></button>
		<button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                </div>

            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>


	  <div class="modal fade text-left taskModal">
        <div class="modal-dialog modal-xl">
          <div class="modal-content" style="width: 1200px;">

                <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Task Details</h3>
				 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              </div>

          <div class="card-body">


			  <table id="tasks" class="table table-bordered table-hover">
			  <thead>
                  <tr>
				  <th>Task</th>
				  <th>Activities</th>
                  </tr>
                  </thead>
                  <tbody>


				 @isset($task_det)
					 @foreach ($task_det as $value)
					 <tr>
				 <td class="project_progress">
				 {{$value['TASK_NAME']}}<br>

						  @php
				$task  = $value['TASK_ID'];
				$assigntask = $value['TASK_ID'];
				$emp_id = Auth::user()->emp_id;
				@endphp

				@php
				  $due_date = $value['DUE_DATE'];
				  $today = \Carbon\Carbon::now();
				 $dif = \Carbon\Carbon::parse($due_date)->diffInDays($today);
				  $dif = $dif + 1;
				  $range = (int)abs($dif/3);
				 $range1 = $dif - $range;
				 $range2 = $dif - ($range * 2);
				  $completion_status = $value['COMPLETION_STATUS'];
				  @endphp


				  @if($completion_status == "100")
							  <span class='badge badge-success'>Completed &nbsp;<i class="fas fa-thumbs-up"></i></span>
						  @else
							  @if($today > $due_date)

							<span class='badge badge-danger'>Late By &nbsp;<i class="far fa-clock"></i>&nbsp;{{$dif}}&nbsp;Days</span>
								@else

								@if($range > 0)
								<?php
								if($dif >= $range1) {
									echo "<span class='badge badge-success'>Due in &nbsp;<i class='far fa-clock'></i>&nbsp;".$dif."&nbsp;Days</span>";

									}
								elseif($dif <= $range1 && $dif >= $range2) {
									echo "<span class='badge badge-info'>Due in &nbsp;<i class='far fa-clock'></i>&nbsp;".$dif."&nbsp;Days</span>";

								}
								elseif($dif <= $range2 && $dif >= 0) {
									echo "<span class='badge badge-orange'>Due in &nbsp;<i class='far fa-clock'></i>&nbsp;".$dif."&nbsp;Days</span>";

								}
							?>
							@else
							<span class='badge badge-orange'>Due in &nbsp;<i class='far fa-clock'></i>&nbsp;{{$dif}}&nbsp;Days</span>
							@endif

							  @endif

					  @endif
					   <br><br>
					   <div class="progress progress-sm">
                              <div class="progress-bar bg-green" role="progressbar" aria-valuenow="{{$value['COMPLETION_STATUS']}}%" aria-valuemin="0" aria-valuemax="100" style="width: {{$value['COMPLETION_STATUS']}}%">
                              </div>
                          </div>
                          <small>
                              {{$value['COMPLETION_STATUS']}}% Completed
                          </small>

				<br>
				@if($value['CREATED_BY'] == $emp_id)
						   <a href="{{route('task.show',$task)}}" class="btn btn-block btn-outline-primary btn-xs">Click here for task details</a>
				@else
					<a href="{{route('assigntask.show',$assigntask)}}" class="btn btn-block btn-outline-primary btn-xs">Click here for task details</a>
					@endif
						  </td>
				   <td>
				   <div class="row">
				   @foreach ($value['ACTIVITY'] as $act)
                  <div class="col col-md-3 text-center">
				   <div class="knob-label">
				   @php
				  $due_date = $act['DUE_DATE'];
				  $today = \Carbon\Carbon::now();
				 $dif = \Carbon\Carbon::parse($due_date)->diffInDays($today);
				  $dif = $dif + 1;
				  $range = (int)abs($dif/3);
				 $range1 = $dif - $range;
				 $range2 = $dif - ($range * 2);
				  $completion_status = $act['COMPLETION_STATUS'];
				  @endphp
				   @if($completion_status == "100")
							  <span class='badge badge-success'>Completed &nbsp;<i class="fas fa-thumbs-up"></i></span>
						  @else
							  @if($today > $due_date)

							<span class='badge badge-danger'>Late By &nbsp;<i class="far fa-clock"></i>&nbsp;{{$dif}}&nbsp;Days</span>
								@else
								@if($range > 0)
								<?php
								if($dif >= $range1) {
									echo "<span class='badge badge-success'>Due in &nbsp;<i class='far fa-clock'></i>&nbsp;".$dif."&nbsp;Days</span>";

									}
								elseif($dif <= $range1 && $dif >= $range2) {
									echo "<span class='badge badge-info'>Due in &nbsp;<i class='far fa-clock'></i>&nbsp;".$dif."&nbsp;Days</span>";

								}
								elseif($dif <= $range2 && $dif >= 0) {
									echo "<span class='badge badge-orange'>Due in &nbsp;<i class='far fa-clock'></i>&nbsp;".$dif."&nbsp;Days</span>";

								}
							?>
							@else
							<span class='badge badge-orange'>Due in &nbsp;<i class='far fa-clock'></i>&nbsp;{{$dif}}&nbsp;Days</span>
							@endif

							  @endif

					  @endif
				   </div>
                    <input type="text" class="knob" value="{{$act['COMPLETION_STATUS']}}" data-skin="tron" data-thickness="0.2" data-width="90"
                           data-height="90" data-fgColor="#00c0ef" data-readonly="true" />

                    <div class="knob-label">{{$act['ACTIVITY_HEADER']}}</div>
                  </div>
				  @endforeach
				  </div>
				   </td>
				    </tr>

				 @endforeach
				  @endisset

				  </tbody>
				  </table>

			  </div>

		 <div class="card-footer">
		 <button class="btn float-right bg-info"><a href="{{ route('assigntask.index')}}" class="text-white">More Details</a></button>
		<button type="button" class="btn bg-info" data-dismiss="modal">Cancel</button>
				</div>

            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

<div class="modal fade text-left distModal">
        <div class="modal-dialog">
          <div class="modal-content" style="width: 800px; height: 100px;">

                <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Top Distributors</h3>
				 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              </div>

          <div class="card-body">
			  <table id="distributor" class="table table-bordered table-hover">
			  <thead>
                  <tr>
				  <th>Distributor</th>
                    <th>Total Order</th>
                  </tr>
                  </thead>
                  <tbody>
				   @isset($top_dist)
				@foreach($top_dist as $values)
				  <tr>
				  <td>{{$values['CUSTOMER_NAME']}}</td>
				  <td><i class="fas fa-rupee-sign"></i> {{$values['TOTAL_SALES']}}</td>
				  </tr>
				  @endforeach
				  @endisset
				  </tbody>
				  </table>

			  </div>

		 <div class="card-footer">
		 <button class="btn btn-primary float-right"><a href="{{ route('myorder.index')}}" class="text-white">More Details</a></button>
		<button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                </div>

            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>


 <div class="modal fade text-left salesModal">
        <div class="modal-dialog">
          <div class="modal-content" style="width: 600px; height: 100px;">

                <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Quarterly Sales</h3>
				 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              </div>

          <div class="card-body">
			  <canvas id="bar" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
			  </div>

		 <div class="card-footer">
		 <button class="btn btn-success float-right"><a href="{{ route('myorder.index')}}" class="text-white">More Details</a></button>
		<button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
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
                <h3 class="card-title">Total Claimed Amount ({{ \Carbon\Carbon::now()->format('F')}} - {{$cycle}})</h3>
				 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              </div>

          <div class="card-body">
			  <canvas id="pie" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
			  </div>

		 <div class="card-footer">
		 <button class="btn btn-warning float-right"><a href="{{ route('viewclaim.index')}}" style="color:black">More Details</a></button>
		<button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
                </div>

            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

<div class="modal fade text-left ticketModal">
        <div class="modal-dialog">
          <div class="modal-content" style="width: 600px; height: 100px;">

                <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Monthly Tickets</h3>
				 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              </div>

          <div class="card-body">
			  <canvas id="ticket" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
			  </div>

		 <div class="card-footer">
		 <button class="btn btn-danger float-right"><a href="{{ route('myticket.index')}}" class="text-white">More Details</a></button>
		<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>

            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

<br>

    <!-- Main content -->
     <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
		<div class="col-md-12">
     {{-- IT shows the image of the profile --}}
		<div class="info-box mb-12 bg-secondary">
		 @isset($user)
				@foreach($user as $val)
              <span class="info-box-icon">
			 @if(filled($val['EMP_IMAGE']))
                  <img class="img-circle elevation-3"  src="{{ URL::asset('storage/'.$val['EMP_IMAGE']) }}">
			  @else
               <img src="/suprsales_resource/dist/img/usericon.png"  class="img-circle elevation-3" alt="User">
                @endif
			  </span>
            {{-- This is the home page top welcome heading with respective name --}}
              <div class="info-box-content">
                <span class="info-box-number">Welcome, {{$val['EMP_NAME']}} ({{$val['EMP_ID']}})</span>
				@if ($val['EMP_CONTRACT_TYPE'] =='1')
				<span style="position: absolute; right: 20px;">
				 <a class='btn btn-warning btn-app' href="{{ route('createclaim.index')}}">
                   <i class="fas fa-plus-square"></i>New Claim
                </a>
				</span>
				@endif
                <span class="info-box-text">
				{{$val['EMP_DESIGNATION']}} - [ Assigned Regions:
				@foreach($val['REGION'] as $valu)
				{{ $loop->first ? '' : ', ' }}
					{{ $valu['REGION_NAME'] }}
					@endforeach
					]
				</span>
              </div>
              <!-- /.info-box-content -->
			  @endforeach
				@endisset
            </div>
            <!-- Widget: user widget style 2 -->

          </div>
		  </div>
		  <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><i class="fas fa-rupee-sign"></i>
				@isset($currentSales)
					 @foreach ($currentSales as $value)
					 @if($value['TOTAL_SALES'] == null)
					 0
					@else
						@php
					$cur_sales = round($value['TOTAL_SALES']);
					@endphp
						{{$cur_sales}}
					@endif
					 @endforeach
				@endisset
				@empty($currentSales)
					0
			@endempty
			 </h3>

                <p>Sales ({{ \Carbon\Carbon::now()->format('F')}})</p>
              </div>
              <div class="icon">
               <i class="far fa-chart-bar"></i>
              </div>
			  @php
			  $quarter = json_encode($quat_sales);
			  @endphp
              <a href="#" class="small-box-footer sales" value="{{$quarter}}" id="1">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
			  @isset($Task)
					 @foreach ($Task as $value)
					 @php
					 $completion  = round($value['TOTAL_COMPLETION_STATUS']);
					 @endphp
                <h3>{{$completion}}<sup style="font-size: 20px;">%</sup></h3>

                <p>Completed Tasks</p>
				<span style="position: absolute; top: 25px; right: 2px;">
                <b>{{$value['DUE']}}</b> <span class="badge badge-warning">Due</span><br>
			    <b>{{$value['LATE']}}</b> <span class="badge badge-danger">Late</span><br>
				<b>{{$value['COMPLETED']}}</b> <span class="badge badge-success">Completed</span>
              </span>
			   @endforeach
				@endisset
              </div>

              <a href="#" class="btn small-box-footer task">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->




          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
			  @isset($currentClaim)
			   @foreach ($currentClaim as $value)
                <h3>{{$value['SUBMITTED']}}</h3>

                <p>Claims ({{ \Carbon\Carbon::now()->format('F')}} - {{$cycle}})</p>
				<span style="position: absolute; top: 15px; right: 2px;">
				 <b>{{$value['APPROVED']}}</b> <span class="badge badge-success">Approved</span><br>
                 <b>{{$value['PENDING']}}</b> <span class="badge badge-info">Pending</span><br>
			     <b>{{$value['REJECTED']}}</b> <span class="badge badge-danger">Rejected</span><br>
			     <b>{{$value['ZERO']}}</b> <span class="badge badge-secondary">Zero</span><br>

              </span>
			   @endforeach
				@endisset
              </div>
			  @php
			  $cur_claim = json_encode($currentClaim);
			  @endphp
              <a href="#" class="small-box-footer claim" value="{{$cur_claim}}" id="2">More info <i class="fas fa-arrow-circle-right"></i></a>
             </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
			  @isset($currentTicket)
			   @foreach ($currentTicket as $value)
			   @php
			   $submit_tic = $value['RESOLVED'] + $value['PENDING'] + $value['IN_PROCESS'];
			   @endphp
                <h3>{{$submit_tic}}</h3>

                <p>Tickets ({{ \Carbon\Carbon::now()->format('F')}})</p>
				<span style="position: absolute; top: 25px; right: 2px;">
				<b>{{$value['RESOLVED']}}</b> <span class="badge badge-success">Resolved</span><br>
                <b>{{$value['PENDING']}}</b> <span class="badge badge-info">Pending</span><br>
			    <b>{{$value['IN_PROCESS']}}</b> <span class="badge badge-warning">In Process</span>
              </span>
			    @endforeach
				@endisset
              </div>
			  @php
			  $month_ticket = json_encode($mon_tic);
			  @endphp
              <a href="#" class="small-box-footer ticket" value="{{$month_ticket}}" id="month_ticket">More info <i class="fas fa-arrow-circle-right"></i></a>
             </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-6 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header border-0">
                <h3 class="card-title">
				<i class="fas fa-chart-line mr-1"></i>
                  Monthly Sales
                </h3>


              </div>
              <div class="card-body">
			   @php
			  $month_sales = json_encode($mon_sales);
			  @endphp
			  <canvas id="line" value="{{$month_sales}}" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
			  </div>
              <!-- /.card-body -->

            </div>
            <!-- /.card -->

            <!-- DIRECT CHAT -->
           <div class="card">


			<div class="card-header bg-light">
			<h3 class="card-title">
                  <i class="fas fa-users"></i>
                  Top Distributors
                </h3>
			 </div>
			 <div class="col-md-12">
			 <br>
			 <p><strong> Distributor</strong><span style="position: absolute; right: 10px;"><strong>Total Order</strong>  <span class="dr"></span><small>(Base : <i class="fas fa-rupee-sign"></i>1 Cr)</small></span></p>
                  <hr>

				 @php
				 $sum_sales = 10000000;
				 @endphp

				  @isset($top_dist)
				@foreach($top_dist as $key => $values)
					@php
					$top_sales = round($values['TOTAL_SALES']);
					$variable = substr($values['CUSTOMER_NAME'], 0, strpos($values['CUSTOMER_NAME'], "-"));
					@endphp


					@if($key == 0)

				  <div class="progress-group">
                      {{$variable}}
                      <span class="float-right"><b><i class="fas fa-rupee-sign"></i> {{$top_sales}}</b></span>
                      <div class="progress progress-sm">
					  @php
					  $sale1 = ($top_sales*100)/$sum_sales;
					  @endphp

                        <div class="progress-bar bg-primary" style="width: {{$sale1}}%"></div>
                      </div>
                    </div>
					@endif
                    <!-- /.progress-group -->
					@if($key == 1)
                    <div class="progress-group">
                      {{$variable}}
                      <span class="float-right"><b><i class="fas fa-rupee-sign"></i> {{$top_sales}}</b></span>
                      <div class="progress progress-sm">
					   @php
					  $sale2 = ($top_sales*100)/$sum_sales;
					  @endphp
                        <div class="progress-bar bg-danger" style="width: {{$sale2}}%"></div>
                      </div>
                    </div>
					@endif
                    <!-- /.progress-group -->
					@if($key == 2)
                    <div class="progress-group">
                      <span class="progress-text">{{$variable}}</span>
                      <span class="float-right"><b><i class="fas fa-rupee-sign"></i> {{$top_sales}}</b></span>
                      <div class="progress progress-sm">
					   @php
					  $sale3 = ($top_sales*100)/$sum_sales;
					  @endphp
                        <div class="progress-bar bg-success" style="width: {{$sale3}}%"></div>
                      </div>
                    </div>
					@endif
                    <!-- /.progress-group -->
					@if($key == 3)
                    <div class="progress-group">
                      {{$variable}}
                      <span class="float-right"><b><i class="fas fa-rupee-sign"></i> {{$top_sales}}</b></span>
                      <div class="progress progress-sm">
					   @php
					  $sale4 = ($top_sales*100)/$sum_sales;
					  @endphp
                        <div class="progress-bar bg-warning" style="width: {{$sale4}}%"></div>
                      </div>
                    </div>
					@endif

					@if($key == 4)
					<div class="progress-group">
                      {{$variable}}
                      <span class="float-right"><b><i class="fas fa-rupee-sign"></i> {{$top_sales}}</b></span>
                      <div class="progress progress-sm">
					   @php
					  $sale5 = ($top_sales*100)/$sum_sales;
					  @endphp
                        <div class="progress-bar bg-secondary" style="width: {{$sale5}}%"></div>
                      </div>

                    </div>
					@endif
                    <!-- /.progress-group -->

			@endforeach
				@endisset

					</div>
					 <span class="cr"></span>
					<div class="card-footer">
					<a href="#" class="btn btn-primary float-right dist" value="distrinutor" id="distributor">More info</a>

			  </div>

                  </div>
            <!--/.direct-chat -->


          </section>
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-6 connectedSortable">

            <!-- Map card -->
            <div class="card">
              <div class="card-header border-0">
                <h3 class="card-title">
				 <i class="fas fa-industry mr-1"></i>
                  Top Sales in Plants
                </h3>

              </div>
              <div class="card-body">
			   @php
			  $plant_sales = json_encode($top_plant);
			  @endphp
			  <canvas id="world-map" value="{{$plant_sales}}" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
              <!-- /.card-body-->

            </div>
            <!-- /.card -->

            <!-- solid sales graph -->

            <!-- /.card -->

            <!-- Calendar -->
            <div class="card">

             <div class="card-header bg-light">
			<h3 class="card-title">
                 <div class="row">  <i class="fas fa-shopping-cart"></i>&nbsp;
               Top Products <small style="position: absolute; right: 20px;">&nbsp;&nbsp;<ion-icon name="water" color="primary"></ion-icon>&nbsp;Liquid&nbsp;&nbsp;&nbsp;<ion-icon name="layers" color="success"></ion-icon>&nbsp;Unit&nbsp;&nbsp;&nbsp;<ion-icon name="apps" color="warning"></ion-icon>&nbsp;Dust</small></div>
                </h3>
			 </div><br>
			 <div class="col-md-12">
			 <p><strong>Product <span style="position: absolute; right: 10px;">Sold</span></strong></p>
					<hr>
					 @php
					$sum_prod = 0;
					@endphp

				    @isset($top_prod)
				@foreach($top_prod as $values)
				@php
					$sum_prod += $values['TOTAL_SKU'];
					@endphp
				@endforeach
				@endisset

					 @isset($top_prod)
				@foreach($top_prod as $key => $values)
					@php
					$top_prod_sales = round($values['TOTAL_SKU']);
					$variable_prod = $values['SKU_DESCRIPTION'];

					@endphp


					@if($key == 0)

				  <div class="progress-group">
                       @if ($values['CATEGORY'] =='LIQUID')

			  <ion-icon name="water" class="text-primary text-lg" title="Liquid"></ion-icon>

						@elseif ($values['CATEGORY'] =='UNIT')
						<ion-icon name="layers" class="text-success text-lg" title="Unit"></ion-icon>

						@elseif ($values['CATEGORY'] =='DUST')
							<ion-icon name="apps" class="text-warning text-lg" title="Dust"></ion-icon>

						@endif {{$variable_prod}}
                      <span class="float-right"><b>{{$top_prod_sales}}</b></span>
                      <div class="progress progress-sm">
					  @php
					  $prod1 = ($top_prod_sales*100)/$sum_prod;
					  @endphp
                        <div class="progress-bar bg-primary" style="width: {{$prod1}}%"></div>
                      </div>
                    </div>
					@endif
                    <!-- /.progress-group -->
					@if($key == 1)
                    <div class="progress-group">

                     @if ($values['CATEGORY'] =='LIQUID')

			  <ion-icon name="water" class="text-primary text-lg" title="Liquid"></ion-icon>

						@elseif ($values['CATEGORY'] =='UNIT')
						<ion-icon name="layers" class="text-success text-lg" title="Unit"></ion-icon>

						@elseif ($values['CATEGORY'] =='DUST')
							<ion-icon name="apps" class="text-warning text-lg" title="Dust"></ion-icon>

						@endif {{$variable_prod}}
                      <span class="float-right"><b>{{$top_prod_sales}}</b></span>
                      <div class="progress progress-sm">
					  @php
					  $prod2 = ($top_prod_sales*100)/$sum_prod;
					  @endphp
                        <div class="progress-bar bg-danger" style="width: {{$prod2}}%"></div>
                      </div>
                    </div>
					@endif
                    <!-- /.progress-group -->
					@if($key == 2)
                    <div class="progress-group">
                      <span class="progress-text"> @if ($values['CATEGORY'] =='LIQUID')

			  <ion-icon name="water" class="text-primary text-lg" title="Liquid"></ion-icon>

						@elseif ($values['CATEGORY'] =='UNIT')
						<ion-icon name="layers" class="text-success text-lg" title="Unit"></ion-icon>

						@elseif ($values['CATEGORY'] =='DUST')
							<ion-icon name="apps" class="text-warning text-lg" title="Dust"></ion-icon>

						@endif {{$variable_prod}}</span>
                      <span class="float-right"><b>{{$top_prod_sales}}</b></span>
                      <div class="progress progress-sm">
					   @php
					  $prod3 = ($top_prod_sales*100)/$sum_prod;
					  @endphp
                        <div class="progress-bar bg-success" style="width: {{$prod3}}%"></div>
                      </div>
                    </div>
					@endif
                    <!-- /.progress-group -->
					@if($key == 3)
                    <div class="progress-group">
					 @if ($values['CATEGORY'] =='LIQUID')

			  <ion-icon name="water" class="text-primary text-lg" title="Liquid"></ion-icon>

						@elseif ($values['CATEGORY'] =='UNIT')
						<ion-icon name="layers" class="text-success text-lg" title="Unit"></ion-icon>

						@elseif ($values['CATEGORY'] =='DUST')
							<ion-icon name="apps" class="text-warning text-lg" title="Dust"></ion-icon>

						@endif {{$variable_prod}}
                      <span class="float-right"><b>{{$top_prod_sales}}</b></span>
                      <div class="progress progress-sm">
					   @php
					  $prod4 = ($top_prod_sales*100)/$sum_prod;
					  @endphp
                        <div class="progress-bar bg-warning" style="width: {{$prod4}}%"></div>
                      </div>
                    </div>
					@endif

					@if($key == 4)
					<div class="progress-group">
				 @if ($values['CATEGORY'] =='LIQUID')

			  <ion-icon name="water" class="text-primary text-lg" title="Liquid"></ion-icon>

						@elseif ($values['CATEGORY'] =='UNIT')
						<ion-icon name="layers" class="text-success text-lg" title="Unit"></ion-icon>

						@elseif ($values['CATEGORY'] =='DUST')
							<ion-icon name="apps" class="text-warning text-lg" title="Dust"></ion-icon>

						@endif {{$variable_prod}}
                      <span class="float-right"><b>{{$top_prod_sales}}</b></span>
                      <div class="progress progress-sm">
					   @php
					  $prod5 = ($top_prod_sales*100)/$sum_prod;
					  @endphp
                        <div class="progress-bar bg-secondary" style="width: {{$prod5}}%"></div>
                      </div>
                    </div>
					@endif
                    <!-- /.progress-group -->

			@endforeach
				@endisset
                    <!-- /.progress-group -->
					</div>
					<div class="card-footer">
					<a href="#" class="btn btn-primary float-right products" value="1" id="1">More info</a>
		       </div>
                  </div>
            <!-- /.card -->
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>

@endsection
