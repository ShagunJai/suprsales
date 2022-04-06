@extends('layouts.show_by_id')
@section('content')
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
	 @isset($task_det)
			  @foreach($task_det as $val)
			  
			  @php
			  $taskID = $val['TASK_ID'];
			  @endphp
			  
			  @endforeach
			  @endisset 
			  
			  <input type="hidden" value="{{$taskID}}" id="TASK_IDS">
			    <div class="modal fade text-left authModal">
        <div class="modal-dialog">
          <div class="modal-content" style="width: 600px; height: 100px;">
           
                <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Edit Activity</h3>
				 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              </div>
         <input type="hidden" name="act_id" id="act_Id" class="form-control"  value=""> 
      
	  <form class="form-horizontal" id="activity_form" method="POST">
	  @csrf
            @method('PUT')
                <div class="card-body">
				<input type="hidden" name="task_id" value="{{$taskID}}">
				<div class="form-group row">
                    <label  class="col-sm-4 col-form-label">Name</label>
                    <div class="col-sm-8">
                      <input id="act_name" class="form-control" value="" placeholder="Name" readonly>
                    </div>
                  </div>
                  
                 
				  <div class="form-group row select2-teal">
                                  <label class="col-sm-4 col-form-label">Status</label>
                                  <div class="col-md-8">
                                 
                                    <select class="form-control select2" name="status" id="status" style="width: 100%;" data-dropdown-css-class="select2-teal" required>
										<option value="0">Not Started</option>
										<option value="25">In Progress (25% Complete)</option>
										<option value="50">In Progress (50% Complete)</option>
										<option value="75">In Progress (75% Complete)</option>
										<option value="100">Completed</option>
                                      </select>
                                  
                                  </div>
                  
                                </div>
                                
                                <div class="form-group row select2-teal">
          <label class="col-sm-4 col-form-label">Delegate</label>
          <div class="col-sm-8">
            <select class="select2"  name="assignment_id"  data-dropdown-css-class="select2-teal">
			<option value="" selected>Select Employee</option>
               @isset($emp)
				@foreach ($emp as $acts)
				<option value="{{ $acts['EMP_ID'] }}">{{ $acts['EMP_NAME'] }}</option>
				@endforeach 
				@endisset
              </select>
            
          </div>     
            </div> 
               
			<div class="form-group row">
                                    <label  class="col-sm-4 col-form-label">Start Date</label>
                                    <div class="col-sm-8">
									 <input type="date" class="form-control" id="start_date" value="" readonly />
									</div>
                                  </div>
                                   
                                    <div class="form-group row edit_due">
                                        <label class="col-sm-4 col-form-label">Due Date</label>
                                        <div class="col-sm-8">
										<input type="date" class="form-control" name="duedate" id="duedate" value="" required />
									                    
                                        </div>
                                    </div>

			   
			<div class="form-group row">
                    <label for="inputPassword3" class="col-sm-4 col-form-label">Activate</label>
                    <div class="col-sm-8">
                     
                    <input type="checkbox" name="flag" id="flags" class="flag" data-bootstrap-switch data-off-color="danger" data-on-color="success" value="">
                       </div>
                  </div>
              
			   <div class="form-group row">
                    <label  class="col-sm-4 col-form-label">Description</label>
                     <div class="col-sm-8">              
			 <textarea placeholder="Enter Description" name="act_desc" id="act_desc"
				style="width: 100%; height: 150px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
				Activity of Task 1
				</textarea>
										
					</div>
                  </div>
                <!-- /.card-body -->
              </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" id="act_btn" class="btn btn-warning float-right">Update</button>
                  <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
                </div>
             
              </form>
			 
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>     
			  
			  
			  
	  
	  
	  
	   <div class="modal fade" id="modal-attach">
        <div class="modal-dialog">
          <div class="modal-content" style="width: 600px; height: 100px;">
           
                <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Add Attachment</h3>
				 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
			  
      <form role="form-horizontal" action="{{route('assignactivity.store')}}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="card-body">
				<input type="hidden" name="task_id" value="{{$taskID}}">
				<div class="form-group row">
				  <label class="col-sm-4 col-form-label">Attachment</label>
				  <div class="col-sm-8">
				  <input type="file" name="TASK_ATTACHMENT[]" multiple>
												   
				</div>
				</div>
               
              </div>
                <!-- /.card-footer -->
				<div class="card-footer">
                  <button type="submit" class="btn btn-info float-right">Create</button>
                  <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
                </div>
              </form>
            </div>
          
               
              
           
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
	  
	  
	   <div class="modal fade activityDetailModal">
        <div class="modal-dialog">
          <div class="modal-content" style="width: 600px; height: 100px;">
           
                <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title" id="act_title"></h3>
				 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
			  
     
                <div class="card-body">
				 <div class="progress progress-sm" id="completion_status">
				 </div>
				 
				 <small id="complete_stat"><br></small>
				 <br><br>
				 <span class="projects">
					 <ul class="list-inline" id="delegated_act">
					 </ul>
					 </span>
				 
               
			   <div class="text-muted text-sm"><b>Status </b>&nbsp;<span id="activation_status"></span></div>
			   <div class="text-muted text-sm"><b>Start Date </b>&nbsp;<span id="Start_Date"></span></div>
			   <div class="text-muted text-sm"><b>Due Date </b>&nbsp;<span id="DUEDAte"></span></div>
			   <div id="LATE_BY"></div>
			   <br>
			    <div class="card card-primary">
                     <div class="card-header">
            <h3 class="card-title">Description</h3>
  
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Expand">
                <i class="fas fa-minus"></i></button>
             
            </div>
          </div>
                    
                      <div class="card-body">
					  <textarea class="text-primary" id="DESCRIPTION"
                          style="width: 100%; height: 100px; line-height: 18px; border: 0px; padding: 10px;" disabled></textarea>
                  
                      </div>
					
                    
                  </div>
			    <div class="card card-primary">
                     <div class="card-header">
            <h3 class="card-title">Attachments</h3>
  
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Expand">
                <i class="fas fa-minus"></i></button>
             
            </div>
          </div>
		  
                    
                      <div class="card-body" id="activity_ATTACHMENT">
			
                      </div>
                  </div>
				  
				  
              </div>
                <!-- /.card-footer -->
				<div class="card-footer">
				<div class="panel-group">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" href="#collapse1"> <h3 class="card-title text-primary">View Team</h3></a> 
        </h4>
		&nbsp;&nbsp;&nbsp;&nbsp;<span class="badge badge-primary" id="team_member"></span>        
      </div>
	 
      <div id="collapse1" class="panel-collapse collapse">
        <div class="panel-body">
		 <hr>
		 <ul class="users-list clearfix" id="act_team">
			
                    </ul>
		</div>
        
      </div>
    </div>
  </div>
                </div>	
            </div>
          
               
              
           
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
	  
	  
	 
		 <div class="modal fade modal-attachment">
        <div class="modal-dialog">
          <div class="modal-content" style="width: 600px; height: 100px;">
           
                <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Add Attachment</h3>
				 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
			  
      <form role="form-horizontal" action="{{route('assignactivity.store')}}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="card-body">
				<input type="hidden" name="task_id" value="{{$taskID}}">
				<input type="hidden" name="activity_id" id="activity_id" value="">
				<div class="form-group row">
				  <label class="col-sm-4 col-form-label">Attachment</label>
				  <div class="col-sm-8">
				  <input type="file" name="ACTIVITY_ATTACHMENT[]" multiple>
												   
				</div>
				</div>
               
              </div>
                <!-- /.card-footer -->
				<div class="card-footer">
                  <button type="submit" class="btn btn-info float-right">Create</button>
                  <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
                </div>
              </form>
            </div>
          
               
              
           
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
	  
        <div class="row mb-2">
          <div class="col-sm-6">
		  
			<button class="btn btn-info"><a href="Javascript:history.go(-1);Location.reload()" class="text-white"><i class="fas fa-arrow-alt-circle-left"></i> Go Back</a></button>
           
			<br>
			
         
		   </div>
		   <div class="col-sm-6">
		  <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard.index')}}">Home</a></li>
              <li class="breadcrumb-item active">My Activites</li>
            </ol>
			</div>	
         
        </div>
		
		
		
		
		@php
	$login_id = Auth::user()->emp_id;
	$assigned_counter = 0;
	$delegated_counter = 0;
	$others_counter = 0;
	$assignedByDelegation_counter = 0;
	$currentActivity = 0;
	$previousActivity = 0;
	$assignedActivitiesArray = [];
	$delegatedActivitiesArray = [];
	$assignedByDelegationActivitiesArray = [];
	$otherActivitiesArray = [];
	$allActivityExceptAssigned = [];
	$activityOwners = [];
	$act_id = 0;
	$is_exist = 0;
	@endphp


<!-- Code to create a key-value pair of all activity and their activity owners -->	
@isset($task_det)
		@foreach($task_det as $value)
@foreach($value['ACTIVITY'] as $act)
	@php
		$act_id = $act['ACTIVITY_ID'];
	@endphp
	
	@if($act['ACTIVITY_OWNER'] != null)
		@foreach($act['ACTIVITY_OWNER'] as $activity)	
			@php
				$activityOwners[$activity['ACTIVITY_OWNER']] = $act_id;
			@endphp
		@endforeach
	@endif
@endforeach



@foreach($value['ACTIVITY'] as $act)

	<!-- This is done to check whether current activity is equal/not equal to previous iterated activity. -->
	@php
		$currentActivity = $act['ACTIVITY_ID'];
	@endphp
	
<!-- Below code check the Key-value pair made above to identify whether the logged user is associated with currently iterated activity  -->
@foreach ($activityOwners as $key => $node)
	@if($node == $currentActivity)
		@if($key == $login_id)
			@php
				$is_exist = 1;
			@endphp
		@endif
	@endif
@endforeach

<!-- Checking for all the activity owners in the for loop -->	
@if($act['ACTIVITY_OWNER'] != null)
	@foreach($act['ACTIVITY_OWNER'] as $activity)

	    @if($is_exist == '1')
			<!-- Resetting the is_exist to 0 to check in the above loop -->
		@php	
			$is_exist = 0;
		@endphp
			<!-- Case when delegation != null -->
			@if($act['ACTIVITY_DELIGATION'] != null)
				
				@foreach($act['ACTIVITY_DELIGATION'] as $del)
					@if($loop->last)					
						@if($del['DELIGATED_TO'] == $login_id)
							@if($currentActivity!= $previousActivity)
								@php
									$assignedByDelegation_counter = $assignedByDelegation_counter + 1;
									array_push($assignedByDelegationActivitiesArray, $currentActivity);
									array_push($allActivityExceptAssigned, $currentActivity);
									$previousActivity = $currentActivity;
								@endphp
							@endif
							
							@else
							@if($currentActivity!= $previousActivity)
								@php
									$delegated_counter = $delegated_counter + 1;
									array_push($delegatedActivitiesArray, $currentActivity);
									array_push($allActivityExceptAssigned, $currentActivity);
									$previousActivity = $currentActivity;
								@endphp
							@endif
						@endif
					@endif
				@endforeach
		   <!-- Case when delegation = null -->		
		   @else
			   @if($currentActivity!= $previousActivity)
					@php
						$assigned_counter = $assigned_counter + 1;
						array_push($assignedActivitiesArray, $currentActivity);
						$previousActivity = $currentActivity;
					@endphp
			@endif
		   @endif
		<!-- End Case 1 --> 
		<!-- When logged in user is not in activity owner list -->
		@else
			
			@if($act['ACTIVITY_DELIGATION'] != null)	
					@foreach($act['ACTIVITY_DELIGATION'] as $del)
						@if($loop->last)
							@if($del['DELIGATED_TO'] == $login_id)	
								@if($currentActivity!= $previousActivity)
										@php
											$assignedByDelegation_counter = $assignedByDelegation_counter + 1;
											array_push($assignedByDelegationActivitiesArray, $currentActivity);
											array_push($allActivityExceptAssigned, $currentActivity);
											$previousActivity = $currentActivity;
										@endphp
									@endif
							@else
								@if($currentActivity!= $previousActivity)
									@php
										$others_counter = $others_counter + 1;
										array_push($otherActivitiesArray, $currentActivity);
										array_push($allActivityExceptAssigned, $currentActivity);
										$previousActivity = $currentActivity;
									@endphp	
								@endif
								
							@endif
						@endif
					@endforeach
			@else
				@if($currentActivity!= $previousActivity)
					@php
						$others_counter = $others_counter + 1;
						array_push($otherActivitiesArray, $currentActivity);
						array_push($allActivityExceptAssigned, $currentActivity);
						$previousActivity = $currentActivity;
					@endphp	
				@endif
			@endif
		
		 @endif	
	@endforeach	 		

@else
	
	@if($act['ACTIVITY_DELIGATION'] != null)	
					@foreach($act['ACTIVITY_DELIGATION'] as $del)
						@if($loop->last)
							@if($del['DELIGATED_TO'] == $login_id)	
								@if($currentActivity!= $previousActivity)
										@php
											$assignedByDelegation_counter = $assignedByDelegation_counter + 1;
											array_push($assignedByDelegationActivitiesArray, $currentActivity);
											array_push($allActivityExceptAssigned, $currentActivity);
											$previousActivity = $currentActivity;
										@endphp
									@endif
							@else
								@if($currentActivity!= $previousActivity)
									@php
										$others_counter = $others_counter + 1;
										array_push($otherActivitiesArray, $currentActivity);
										array_push($allActivityExceptAssigned, $currentActivity);
										$previousActivity = $currentActivity;
									@endphp	
								@endif	
							@endif
						@endif
					@endforeach
			@else
				@if($currentActivity!= $previousActivity)
					@php
						$others_counter = $others_counter + 1;
						array_push($otherActivitiesArray, $currentActivity);
						array_push($allActivityExceptAssigned, $currentActivity);
						$previousActivity = $currentActivity;
					@endphp	
				@endif
			@endif
		  
	@endif		
  
@endforeach	

@endforeach
@endisset
		
		
		@isset($task_det)
		@foreach($task_det as $value)
		<input type="hidden" id="task_start" value="{{$value['START_DATE']}}">
		<input type="hidden" id="task_end" value="{{$value['DUE_DATE']}}">
		<div class="info-box bg-light">
           

              <div class="info-box-content">
			  
				<div class="row">
			  @php
			  $color = $value['COLOR'];
			  @endphp
			  
			  @if($color == '11')
			  <div class="square" title="task : red" style="background-color: #dc3545;"></div>
				@elseif($color == '12')
				 <div class="square" title="task : green" style="background-color: #28a745;"></div>
				@elseif($color == '13')
				 <div class="square" title="task : blue" style="background-color: #007bff;"></div>
				 @elseif($color == '14')
				 <div class="square" title="task : yellow" style="background-color: #ffc107;"></div>
				  @elseif($color == '15')
				 <div class="square" title="task : aqua" style="background-color: #17a2b8;"></div>
				   @elseif($color == '16')
				 <div class="square" title="task : grey" style="background-color: #6c757d;"></div>
				 @else 
				<div class="square" title="no color defined"></div>
				@endif
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<h1>{{$value['TASK_NAME']}}</h1>
			  </div><br>
			   <div class="row">
			   
			   <div class="col-md-4 col-sm-6 col-12">
            <div class="info-box shadow">
              <span class="info-box-icon bg-info"><i class="fas fa-hourglass-half"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">
				 <div class="progress progress-sm">
                              <div class="progress-bar bg-green" role="progressbar" aria-valuenow="{{$value['COMPLETION_STATUS']}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$value['COMPLETION_STATUS']}}%">
                              </div>
                          </div>
                          <small>
						
                             {{$value['COMPLETION_STATUS']}}% Completed
							  <br>
                          </small>
				</span>
                <span class="info-box-number"></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
		  
		   <div class="col-md-4 col-sm-6 col-12">
            <div class="info-box shadow">
              <span class="info-box-icon bg-success"><i class="far fa-bookmark"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">
				 <b>Priority :</b>
				  @if($value['PRIORITY'] == '0')
				 <span class='badge badge-danger'>High<br></span><br>
			@elseif($value['PRIORITY'] == '1')
			 <span class='badge badge-success'>Medium<br></span><br>
			 @elseif($value['PRIORITY'] == '2')
			 <span class='badge badge-warning'>Low<br></span><br>
			 @else
				  <span class='badge badge-light'>No Priority</span>
			  @endif
				 <b>Status&nbsp;&nbsp;&nbsp;&nbsp;:</b>
				 @if($value['FLAG'] == '1')
			 <span class='badge badge-success'>Activated<br></span>
			 @else
				  <span class='badge badge-danger'>Deactivated<br></span>
			  @endif
				</span>
                <span class="info-box-number"></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
		  
		  <div class="col-md-4 col-sm-6 col-12">
            <div class="info-box shadow">
              <span class="info-box-icon bg-warning"><i class="far fa-calendar-alt"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">
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
				
	      
				<b>Start Date :</b> {{ \Carbon\Carbon::parse($value['START_DATE'])->format('jS M Y')}}<br>
				<b>Due Date&nbsp;&nbsp;&nbsp;:</b> {{ \Carbon\Carbon::parse($value['DUE_DATE'])->format('jS M Y')}}<br>
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
				</span>
                <span class="info-box-number"></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
			   
         
        </div>
		
				
                <span class="projects">
			 	@php
				  $image = Auth::user()->image;
				  @endphp
			   	
					 <ul class="list-inline">
					  <li class="list-inline-item">
					    @php
				  $assignactivity = $value['CREATED_BY'];
				  @endphp
					  @if(filled($image))
						
			<a href="{{route('assignactivity.show', $assignactivity)}}"><img alt="Lead" class="table-avatar" title="{{$value['CREATED_BY_NAME']}}"  src="{{ URL::asset('storage/'.$image) }}"></a>
		@else
		 <a href="{{route('assignactivity.show', $assignactivity)}}"><img alt="Lead" class="table-avatar" title="{{$value['CREATED_BY_NAME']}}" src="/suprsales_resource/dist/img/usericon.png"></a>
        @endif
                                </li>
							   <li class="list-inline-item">
                                 <i class="fas fa-long-arrow-alt-right"></i>
								 </li>
								 @foreach ($value['TEAM'] as $assigned)
								 @php
								 $img = $assigned['EMP_IMAGE'];
								 $assignactivity = $assigned['EMP_ID'];
								 @endphp
								 @if(filled($img))
									 <li class="list-inline-item">
                                 <a href="{{route('assignactivity.show', $assignactivity)}}"> <img alt="Member" class="table-avatar" title="{{$assigned['EMP_NAME']}}" src="{{ URL::asset('storage/'.$img) }}"></a>
                              </li>
                          
								@else
									 <li class="list-inline-item">
                                 <a href="{{route('assignactivity.show', $assignactivity)}}"> <img alt="Member" class="table-avatar" title="{{$assigned['EMP_NAME']}}" src="/suprsales_resource/dist/img/usericon.png"></a>
                              </li>
                          
								@endif
                             
						  @endforeach
						</ul> 
						  </span>
						
					<span class="info-box-number">
					  <blockquote>
                  <textarea class="text-primary"
                          style="width: 100%; height: 80px; line-height: 18px; border: 0px; padding: 10px;" disabled>Notes : {{$value['NOTES']}}</textarea>
                 
                  <small class="text-primary">Last Updation Of Task - <cite class="text-primary">{{ \Carbon\Carbon::parse($value['UPDATED_ON'])->format('jS M Y')}}</cite></small>
                </blockquote>
				</span>
						   
              </div>
              <!-- /.info-box-content -->
            </div>
		
		
      </div><!-- /.container-fluid -->
    </section>
 <!-- Main content -->
    <section class="content">
 <div class="container-fluid">
        <div class="row">
          <div class="col-12">
		 
      <!-- Default box -->
	

  
 
	   <div class="card card-success">
                     <div class="card-header">
					
            <h3 class="card-title">
			
			{{$assigned_counter}} Assigned Activities
			</h3>
			
			
   
            <div class="card-tools">
			  <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Expand">
                <i class="fas fa-minus"></i></button>
             
            </div>
          </div>
	
                 <div class="card-body pb-0">
				   <div class="row ">
				 @foreach($value['ACTIVITY'] as $act)
				 
				 @php
				$auths = json_encode($act);
				$login_id  = Auth::user()->emp_id;
				$count = 0;
				$actID = $act['ACTIVITY_ID'];
				@endphp
				

			@if(in_array($actID, $assignedActivitiesArray))	 
			
		 
			<div class="col-6">
              <div class="card bg-light">
                <div class="card-footer">
				<div class="text-muted border-bottom-0"> 
				
        <h3 class="card-title text-primary">{{$act['ACTIVITY_HEADER']}}</h3>
		  
				
				
			
		 <span class="float-right">
		 
						
						  <a class='btn btn-warning btn-sm auths' href='#' value="{{$auths}}" id="{{$act['ACTIVITY_ID']}}" title="Edit">
                             <i class='fas fa-edit'></i>       
                          </a>
						  <button type="button" class="btn btn-info btn-sm activity_attach" id="{{$act['ACTIVITY_ID']}}" title="Add Activity Attachment"><i class="fas fa-paperclip"></i></button>
          
						
						 
						  </span>
				  </div>
                </div>
				<br>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-12">
					  @if($act['COMPLETION_STATUS'] == '0')
					 <div class="progress progress-sm">
                              <div class="progress-bar bg-green" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                              </div>
                          </div>
                          <small>
						
                              0% Completed
							  <br>
                          </small>
						@elseif($act['COMPLETION_STATUS'] == '25')  
						 <div class="progress progress-sm">
                              <div class="progress-bar bg-green" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%">
                              </div>
                          </div>
                          <small>
						
                              25% Completed
							  <br>
                          </small>
						  @elseif($act['COMPLETION_STATUS'] == '50')  
						 <div class="progress progress-sm">
                              <div class="progress-bar bg-green" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%">
                              </div>
                          </div>
                          <small>
						
                              50% Completed
							  <br>
                          </small>
						  @elseif($act['COMPLETION_STATUS'] == '75')  
						 <div class="progress progress-sm">
                              <div class="progress-bar bg-green" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%">
                              </div>
                          </div>
                          <small>
						
                              75% Completed
							  <br>
                          </small>
						  @elseif($act['COMPLETION_STATUS'] == '100')  
						 <div class="progress progress-sm">
                              <div class="progress-bar bg-green" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                              </div>
                          </div>
                          <small>
						
                              100% Completed
							  <br>
                          </small>
						  @endif
                  <br>
					 <span class="projects" style="width: 30%">
			 	
			   	
					 <ul class="list-inline">
					 
					 @foreach($act['ACTIVITY_DELIGATION'] as $del)
						 @if ($loop->first)
					@php
				  $image = $del['DELIGATION_FROM_IMAGE'];
				  $delegatedactivity = $del['DELIGATION_FROM'].'_'.$value['TASK_ID'];
				  @endphp
				  
					  <li class="list-inline-item">
					   
					  @if(filled($image))
						
			<a href="{{route('delegatedactivity.show', $delegatedactivity)}}"><img alt="Lead" class="table-avatar" title="{{$del['DELIGATION_FROM_NAME']}}"  src="{{ URL::asset('storage/'.$image) }}"></a>
		@else
		 <a href="{{route('delegatedactivity.show', $delegatedactivity)}}"><img alt="Lead" class="table-avatar" title="{{$del['DELIGATION_FROM_NAME']}}" src="/suprsales_resource/dist/img/usericon.png"></a>
        @endif
                                </li>
								@endif
								  <li class="list-inline-item">
                                 <i class="fas fa-long-arrow-alt-right"></i>
						   </li>
						@php
						  $image = $del['DELIGATED_TO_IMAGE'];
						  $delegatedactivity = $del['DELIGATED_TO'].'_'.$value['TASK_ID'];
						  @endphp
							  <li class="list-inline-item">
							   
							@if(filled($image))
											
								<a href="{{route('delegatedactivity.show', $delegatedactivity)}}"><img alt="Lead" class="table-avatar" title="{{$del['DELIGATED_TO_NAME']}}"  src="{{ URL::asset('storage/'.$image) }}"></a>
							@else
							 <a href="{{route('delegatedactivity.show', $delegatedactivity)}}"><img alt="Lead" class="table-avatar" title="{{$del['DELIGATED_TO_NAME']}}" src="/suprsales_resource/dist/img/usericon.png"></a>
							@endif
									
								
							 
								
							@endforeach	
						</ul> 
						  </span>
						  <br>
                   <div class="text-muted text-sm"><b>Status </b>&nbsp;  
				    @if($act['FLAG'] == '1')
			 <span class='badge badge-success'>Activated</span>
			 @else
				  <span class='badge badge-danger'>Deactivated</span>
			  @endif
				   </div>  
                   <div class="text-muted text-sm"><b>Start Date </b>&nbsp; {{ \Carbon\Carbon::parse($act['START_DATE'])->format('jS M Y')}}</div>
				   <div class="text-muted text-sm"><b>Due Date </b>&nbsp; {{ \Carbon\Carbon::parse($act['DUE_DATE'])->format('jS M Y')}}</div>
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
                   
					<br><br>
					
				     <div class="card card-primary">
                     <div class="card-header">
            <h3 class="card-title">Description</h3>
  
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Expand">
                <i class="fas fa-minus"></i></button>
             
            </div>
          </div>
                    
                      <div class="card-body">
					  <textarea class="text-primary"
                          style="width: 100%; height: 100px; line-height: 18px; border: 0px; padding: 10px;" disabled>{{$act['ACTIVITY_DESCRIPTION']}}</textarea>
                  
                      </div>
					
                    
                  </div>
				    <div class="card card-primary">
                     <div class="card-header">
            <h3 class="card-title">Attachments</h3>
  
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Expand">
                <i class="fas fa-minus"></i></button>
             
            </div>
          </div>
		  
                    
                      <div class="card-body">
					   @foreach($act['ATTACHMENT'] as $atach)
					   <blockquote>
					  
					@php
					$str = $atach['ACTIVITY_ATTACHMENT'];
					if(strlen($str) > 40) {
					$split = str_split($str, 40);
					$assignactivity = $split[0] . "...";
					}
					else{
						$assignactivity = $str;
					}
					@endphp
                  <a class="text-primary" href="{{ URL::asset('storage/task/'.$taskID.'/'.$actID.'/'.$assignactivity) }}" target="_blank">{{$assignactivity}}</a>
				   <div class="btn-group btn-group-sm" style="position: absolute; right: 20px;">
                         
						
						 <form class="form-horizontal" action="{{route('assignactivity.destroy', $assignactivity)}}" method="POST">
						  @csrf
								@method('DELETE')
								<input type="hidden" name="task_id" value="{{$taskID}}">
								<input type="hidden" name="activity_id" value="{{$actID}}">
					   <button class='btn btn-secondary btn-sm' type="submit"  title="Download Attachment">
                             <i class='fas fa-download'></i>       
                          </button> 
						  </form>
						 </div>
                </blockquote>
				@endforeach
                      </div>
					
                    
                  </div>
                   </div>
                  
					
                  </div>
                </div>
				<div class="card-footer">
				<div class="panel-group">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" href="#collapse1"> <h3 class="card-title text-primary">View Team</h3></a> 
        </h4>
		&nbsp;&nbsp;&nbsp;&nbsp;<span class="badge badge-primary">{{$act['ACTIVITY_OWNER_COUNT']}} Members</span>        
      </div>
	 
      <div id="collapse1" class="panel-collapse collapse">
        <div class="panel-body">
		 <hr>
		 <ul class="users-list clearfix">
					@foreach($act['ACTIVITY_OWNER'] as $owners)
					
								@php
								 $img = $owners['ACTIVITY_OWNER_IMAGE'];
								 $assignactivity = $owners['ACTIVITY_OWNER'];
								 @endphp
								 
						@if(filled($img))
									  <li class="col-2">
                        <a href="{{route('assignactivity.show', $assignactivity)}}">
						<img src="{{ URL::asset('storage/'.$img) }}" alt="Member" title="{{$owners['ACTIVITY_OWNER_NAME']}}">
						</a>
						<a class="users-list-name" href="{{route('assignactivity.show', $assignactivity)}}">{{$owners['ACTIVITY_OWNER_NAME']}}</a>
                      </li>
									
								@else
									 <li class="col-2">
                        <a href="{{route('assignactivity.show', $assignactivity)}}">
						<img src="/suprsales_resource/dist/img/usericon.png" alt="Member" title="{{$owners['ACTIVITY_OWNER_NAME']}}">
						</a>
						<a class="users-list-name" href="{{route('assignactivity.show', $assignactivity)}}">{{$owners['ACTIVITY_OWNER_NAME']}}</a>
                      </li>
                          
								@endif
                     
					 @endforeach
                      
                    </ul>
		</div>
        
      </div>
    </div>
  </div>
                </div>
				
				
              </div>
			  
            </div>
		
	  @endif
          
        
		@endforeach
		</div>
		 </div>     
                     
                    
                  </div>
				  
		
		<div class="card card-success">
                     <div class="card-header">
					
            <h3 class="card-title">
			@php 
			$total_other = $delegated_counter + $others_counter + $assignedByDelegation_counter;
			@endphp
			Details of Other Related Activities [{{$total_other}}]
			</h3>
			
			
   
            <div class="card-tools">
			  <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Expand">
                <i class="fas fa-minus"></i></button>
             
            </div>
          </div>
	
                 <div class="card-body pb-0">
				 <div class="row">
				
				 <span class="badge badge-success col">{{$delegated_counter}} Delegated Activities</span>
				 
				 
				 <span class="badge badge-warning col">{{$others_counter}} Other Activities</span>
				
				 <span class="badge badge-info col">{{$assignedByDelegation_counter}} Assigned Activities via Delegation</span>
				 
				 </div>
				 <br>
				 <table id="task" class="table table-bordered table-hover bg-light projects" >
			  <thead>
        <tr>
						<th class="text-center">Type</th>
                      
                        <th>Name</th>
                        <th>Completion</th>
                       
					  <th>Due Date</th>
					  <th>View</th>
                        <th>Status</th>
                       
                        
                    </tr>
                  </thead>
                 
				  
					 <tbody>
				 @php
				 $task = "Not Defined";
				 @endphp
				 
			   @foreach ($value['ACTIVITY'] as $act)	
			   @if(in_array($act['ACTIVITY_ID'], $assignedByDelegationActivitiesArray))
						@php
							$task = "Assigned via Delegation";
						@endphp
				   @elseif(in_array($act['ACTIVITY_ID'], $delegatedActivitiesArray))	
							@php
								$task = "Delegated";
							@endphp
						@elseif(in_array($act['ACTIVITY_ID'], $otherActivitiesArray))
								@php
									$task = "Other";
								@endphp		
				@endif
				
				@if(in_array($act['ACTIVITY_ID'], $allActivityExceptAssigned))	
            <tr>
            <td class="text-center"> 
			@if($task == 'Assigned via Delegation')
				<span class="badge badge-info">{{$task}}</span>
			@elseif($task == 'Delegated')
				<span class="badge badge-success">{{$task}}</span>
			@elseif($task == 'Other')
				<span class="badge badge-warning">{{$task}}</span>
			@endif
			   </td>
			 <td>
				  {{$act['ACTIVITY_HEADER']}}
					</td>
					 <td class="project_progress">
                          <div class="progress progress-sm">
                              <div class="progress-bar bg-green" role="progressbar" aria-valuenow="{{$act['COMPLETION_STATUS']}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$act['COMPLETION_STATUS']}}%">
                              </div>
                          </div>
                          <small>
                              {{$act['COMPLETION_STATUS']}}% Completed
                          </small>
						  <br>
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
                      </td>
				
						<td>
						{{ \Carbon\Carbon::parse($act['DUE_DATE'])->format('d/m/Y')}}
                      </td>
					  <td>
				@php
				$activity_detail  = $act['ACTIVITY_ID'];
				$acti_det = json_encode($act);
				@endphp
				 
                      
				
				<a class='btn btn-success btn-sm activity_detail' href='#'  id="{{$activity_detail}}" value="{{$acti_det}}" title="Activity Details">
                             <i class='fas fa-eye'></i>       
                          </a>	
			  
                     </td>
					
			    <td>
				
				 @if($act['FLAG'] == '1')
			 <span class='badge badge-success'>Activated</span>
			 @else
				  <span class='badge badge-danger'>Deactivated</span>
			  @endif
					</td>
					
				
				</tr>
				@endif
	 @endforeach 
           
				</tbody>

	
</table>
				 </div>
               
                  </div>
				  
			
	   <div class="card card-success">
                     <div class="card-header">
            <h3 class="card-title">{{$value['NO_OF_ATTACHMENTS']}} Task Attachments
			</h3>
  
            <div class="card-tools">
			 <button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#modal-attach"><i class="fas fa-paperclip"></i> Add Attachment</button>
              
              <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Expand">
                <i class="fas fa-minus"></i></button>
             
            </div>
          </div>
        <div class="card-body pb-0">
		@foreach($value['ATTACHMENT'] as $atach)
          <blockquote>
					@php 
						 $assignactivity = $atach['TASK_ATTACHMENT'];
						 @endphp
                  <a class="text-primary" href="{{ URL::asset('storage/task/'.$taskID.'/'.$assignactivity) }}" target="_blank">{{$atach['TASK_ATTACHMENT']}}</a>
				   <div class="btn-group btn-group-sm" style="position: absolute; right: 20px;">
                          <a class='btn btn-info btn-sm' href="{{ URL::asset('storage/task/'.$taskID.'/'.$assignactivity) }}" target="_blank" title='View Attachment'>
                           <i class="fas fa-paperclip"></i>
                         </a> 
						
						 <form class="form-horizontal" action="{{route('assignactivity.destroy', $assignactivity)}}" method="POST">
						  @csrf
								@method('DELETE')
								<input type="hidden" name="task_id" value="{{$taskID}}">
					   <button class='btn btn-secondary btn-sm' type="submit"  title="Download Attachment">
                             <i class='fas fa-download'></i>       
                          </button> 
						  </form>
						 </div>
                </blockquote>
			@endforeach	
			
		 </div>     
                     
                    
                  </div>
      
        <!-- /.card-body -->
       
        <!-- /.card-footer -->
     
      <!-- /.card -->
</div>
</div>
</div>
    </section>
	@endforeach
	@endisset
	@empty($task_det)
			<script>toastr.warning("No records found.");</script>
			@endempty 
@endsection