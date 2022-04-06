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
      
	  <form class="form-horizontal" id="act_form" method="POST">
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
          <label class="col-sm-4 col-form-label">Assign</label>
          <div class="col-sm-8">
            <select class="select2" multiple="multiple" name="assignment_id[]" id="assignment_id"  data-placeholder="Select Employees" data-dropdown-css-class="select2-teal" required>
                @isset($task_det)
			  @foreach($task_det as $val)
			   @foreach($val['TEAM'] as $team)
			 <option value="{{$team['EMP_ID']}}">{{$team['EMP_NAME']}}</option>
			 @endforeach
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
			  
			  
			  
	    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content" style="width: 600px; height: 100px;">
           
                <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Add Activity</h3>
				 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
      <form role="form-horizontal" action="{{route('activity.store')}}" method="POST">
                {{ csrf_field() }}
                <div class="card-body">
				<input type="hidden" name="task_id" value="{{$taskID}}">
				<div class="form-group row">
                    <label  class="col-sm-4 col-form-label">Name</label>
                    <div class="col-sm-8">
                      <input  name="activity_name" class="form-control"  placeholder="Name" required>
                    </div>
                  </div>
                  
				 <div class="form-group row add_activity">
                                        <label class="col-sm-4 col-form-label">Start Date</label>
                                        <div class="col-sm-8">
                                              <div class="input-group date" id="startdate" data-target-input="nearest">
										<input type="text" name="startdate" class="form-control datetimepicker-input" data-target="#startdate" placeholder="Start Date" required />
										<div class="input-group-append" data-target="#startdate" data-toggle="datetimepicker">
											<div class="input-group-text"><i class="fa fa-calendar"></i></div>
										</div>
										</div>                         
                                        </div>
                                    </div>
				 <div class="form-group row end_activity">
                                        <label class="col-sm-4 col-form-label">Due Date</label>
                                        <div class="col-sm-8">
                                              <div class="input-group date" id="enddate" data-target-input="nearest">
										<input type="text" name="enddate" class="form-control datetimepicker-input" data-target="#enddate" placeholder="End Date" required />
										<div class="input-group-append" data-target="#enddate" data-toggle="datetimepicker">
											<div class="input-group-text"><i class="fa fa-calendar"></i></div>
										</div>
										</div>                         
                                        </div>
                                    </div>
                                
                                <div class="form-group row select2-teal">
          <label class="col-sm-4 col-form-label">Assign</label>
          <div class="col-sm-8">
            <select class="select2" multiple="multiple" name="assigned[]" data-placeholder="Select Employees" data-dropdown-css-class="select2-teal" required>
                 @isset($task_det)
			  @foreach($task_det as $val)
			   @foreach($val['TEAM'] as $team)
			 <option value="{{$team['EMP_ID']}}">{{$team['EMP_NAME']}}</option>
			 @endforeach
			  @endforeach
			  @endisset
				
				
              </select>
            
          </div>     
            </div> 
                                
				 <div class="form-group row">
                    <label  class="col-sm-4 col-form-label">Description</label>
                     <div class="col-sm-8">              
			 <textarea placeholder="Enter Description" name="description"
				style="width: 100%; height: 150px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required></textarea>
										
					</div>
                  </div>
                 			
                  
                <!-- /.card-body -->
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
			  
      <form role="form-horizontal" action="{{route('activity.store')}}" method="POST" enctype="multipart/form-data">
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
	  
	    <div class="modal fade text-left authsModal">
        <div class="modal-dialog">
          <div class="modal-content" style="width: 600px; height: 100px;">
           
                <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Edit Task</h3>
				 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              </div>
       <input type="hidden" name="Task_id" id="Task_Id" class="form-control"  value=""> 
      
	  <form class="form-horizontal" id="task_form" method="POST">
	  @csrf
            @method('PUT')
                <div class="card-body">
				<input type="hidden" name="task_id" value="{{$taskID}}">
				<div class="form-group row">
                    <label  class="col-sm-4 col-form-label">Name</label>
                    <div class="col-sm-8">
                      <input  id="task_name" class="form-control" value="" placeholder="Name" readonly>
                    </div>
                  </div>
                  
                 
				  <div class="form-group row select2-teal">
                                  <label class="col-sm-4 col-form-label">Priority</label>
                                  <div class="col-md-8">
                                 
                                    <select class="form-control select2" name="prior_id" id="prior_id" style="width: 100%;" data-dropdown-css-class="select2-teal" required>
										 <option value="0">High</option>
										  <option value="1">Medium</option>
										   <option value="2">Low</option>
                                      </select>
                                  
                                  </div>
                  
                                </div>
								
								<div class="form-group row select2-teal">
                                  <label class="col-sm-4 col-form-label">Color</label>
                                  <div class="col-md-8">
                                 
                                   <select class="select2" name="colr_id" id="colr_id" style="width: 100%;" data-dropdown-css-class="select2-teal" required>
									 
									 <option value="11" class="red-option">Red</option>
									  <option value="12" class="green-option">Green</option>
									  <option value="13" class="blue-option">Blue</option>
									  <option value="14" class="yellow-option">Yellow</option>
									  <option value="15" class="lightblue-option">Aqua</option>
									  <option value="16" class="grey-option">Grey</option>
									</select>
                                  
                                  </div>
                  
                                </div>
                                
                                <div class="form-group row select2-teal">
          <label class="col-sm-4 col-form-label">Assign</label>
          <div class="col-sm-8">
            <select class="select2" multiple="multiple" onChange="getSelectedOptions(this)" name="team_mem[]" id="team_mem" data-placeholder="Select Employees" data-dropdown-css-class="select2-teal">
                 @isset($emp)
				@foreach ($emp as $values)
				<option value="{{ $values['EMP_ID'] }}">{{ $values['EMP_NAME'] }}</option>
				@endforeach 
				@endisset
              </select>
            
          </div>     
            </div> 
                                
								<div class="form-group row">
                                    <label  class="col-sm-4 col-form-label">Start Date</label>
                                    <div class="col-sm-8">
                                      <input  type="date" id="Start_date" class="form-control" value="" placeholder="Start Date" readonly>                    
                                    </div>
                                  </div>
                                   
                                    <div class="form-group row task_due">
                                        <label class="col-sm-4 col-form-label">Due Date</label>
                                        <div class="col-sm-8">
                                          <input type="date" class="form-control" name="Duedate" id="Duedate" value="" required />
									                              
                                        </div>
                                    </div>
                                    
									
								
								<div class="form-group row">
                    <label for="inputPassword3" class="col-sm-4 col-form-label">Activate</label>
                    <div class="col-sm-8">
                     
                    <input type="checkbox" name="flag" id="flag" class="flag" data-bootstrap-switch data-off-color="danger" data-on-color="success" value="">
                       </div>
                  </div>
								
									<div class="form-group row">
                                      <label class="col-sm-4 col-form-label">Notes</label>
                                      <div class="col-sm-8">
                                      
                                          <textarea placeholder="Enter Notes" name="notes" id="notes"
                          style="width: 100%; height: 150px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
						                                
									</div>
									</div>
				  
              
                <!-- /.card-body -->
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
			  
      <form role="form-horizontal" action="{{route('activity.store')}}" method="POST" enctype="multipart/form-data">
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
		
		@isset($task_det)
		@foreach($task_det as $value)
		<input type="hidden" id="task_start" value="{{$value['START_DATE']}}">
		<input type="hidden" id="task_end" value="{{$value['DUE_DATE']}}">
		<div class="info-box bg-light">
           

              <div class="info-box-content">
			  <span style="position: absolute; right: 20px; top:10px;">
			  @php
				$tasks = json_encode($value);
				@endphp
				<input type="hidden" id="task_val" value="{{$tasks}}">
				 <a class='btn btn-warning btn-sm authss' href='#' value="{{$tasks}}" id="task_{{$value['TASK_ID']}}" title="Edit">
                             <i class='fas fa-edit'></i>       
                          </a>
				</span>
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
				  $activity = Auth::user()->emp_id;
				  @endphp
					  @if(filled($image))
						
			<a href="{{route('activity.show', $activity)}}"><img alt="Lead" class="table-avatar" title="{{$value['CREATED_BY_NAME']}}"  src="{{ URL::asset('storage/'.$image) }}"></a>
		@else
		 <a href="{{route('activity.show', $activity)}}"><img alt="Lead" class="table-avatar" title="{{$value['CREATED_BY_NAME']}}" src="/suprsales_resource/dist/img/usericon.png"></a>
        @endif
                                </li>
							   <li class="list-inline-item">
                                 <i class="fas fa-long-arrow-alt-right"></i>
								 </li>
								 @foreach ($value['TEAM'] as $assigned)
								 @php
								 $img = $assigned['EMP_IMAGE'];
								 $activity = $assigned['EMP_ID'];
								 @endphp
								 @if(filled($img))
									 <li class="list-inline-item">
                                 <a href="{{route('activity.show', $activity)}}"> <img alt="Member" class="table-avatar" title="{{$assigned['EMP_NAME']}}" src="{{ URL::asset('storage/'.$img) }}"></a>
                              </li>
                          
								@else
									 <li class="list-inline-item">
                                 <a href="{{route('activity.show', $activity)}}"> <img alt="Member" class="table-avatar" title="{{$assigned['EMP_NAME']}}" src="/suprsales_resource/dist/img/usericon.png"></a>
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
			
			{{$value['NO_OF_ACTIVITIES']}} Activities
			</h3>
			
			
   
            <div class="card-tools">
			 <button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#modal-default"><i class="fas fa-user-clock"></i> Add Activity</button>
              <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Expand">
                <i class="fas fa-minus"></i></button>
             
            </div>
          </div>
                 <div class="card-body pb-0">
				   <div class="row ">
				 @foreach($value['ACTIVITY'] as $act)
         @php
			  $actID = $act['ACTIVITY_ID'];
			  @endphp
			<div class="col-6">
              <div class="card bg-light">
                <div class="card-footer">
				<div class="text-muted border-bottom-0"> 
				
        <h3 class="card-title text-primary">{{$act['ACTIVITY_HEADER']}}</h3>
		  @php
				$auths = json_encode($act);
				@endphp
				
		<span class="float-right">
		@if($act['ACTIVITY_DELIGATION'] == null)
			 <a class='btn btn-warning btn-sm auths' href='#' value="{{$auths}}" id="activity_{{$act['ACTIVITY_ID']}}" title="Edit">
                             <i class='fas fa-edit'></i>       
                          </a>
		 <button type="button" class="btn btn-info btn-sm activity_attach" id="{{$act['ACTIVITY_ID']}}" title="Add Activity Attachment"><i class="fas fa-paperclip"></i></button>
         
			@else
						
		 <a class='btn btn-warning btn-sm auths disabled' href='#' value="{{$auths}}" id="activity_{{$act['ACTIVITY_ID']}}" title="Edit">
                             <i class='fas fa-edit'></i>       
                          </a>
		 <button type="disabled" class="btn btn-info btn-sm  disabled" id="{{$act['ACTIVITY_ID']}}" title="Add Activity Attachment"><i class="fas fa-paperclip"></i></button>
        
		@endif
			
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
					$activity = $split[0] . "...";
					}
					else{
						$activity = $str;
					}
					@endphp
                  <a class="text-primary" href="{{ URL::asset('storage/task/'.$taskID.'/'.$actID.'/'.$activity) }}" target="_blank">{{$activity}}</a>
				   <div class="btn-group btn-group-sm" style="position: absolute; right: 20px;">
                         
						
						 <form class="form-horizontal" action="{{route('activity.destroy', $activity)}}" method="POST">
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
								 $activity = $owners['ACTIVITY_OWNER'];
								 @endphp
								 
						@if(filled($img))
									  <li class="col-2">
                        <a href="{{route('activity.show', $activity)}}">
						<img src="{{ URL::asset('storage/'.$img) }}" alt="Member" title="{{$owners['ACTIVITY_OWNER_NAME']}}">
						</a>
						<a class="users-list-name" href="{{route('activity.show', $activity)}}">{{$owners['ACTIVITY_OWNER_NAME']}}</a>
                      </li>
									
								@else
									 <li class="col-2">
                        <a href="{{route('activity.show', $activity)}}">
						<img src="/suprsales_resource/dist/img/usericon.png" alt="Member" title="{{$owners['ACTIVITY_OWNER_NAME']}}">
						</a>
						<a class="users-list-name" href="{{route('activity.show', $activity)}}">{{$owners['ACTIVITY_OWNER_NAME']}}</a>
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
		
	  
          
        
		@endforeach
		</div>
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
						 $activity = $atach['TASK_ATTACHMENT'];
						 @endphp
                  <a class="text-primary" href="{{ URL::asset('storage/task/'.$taskID.'/'.$activity) }}" target="_blank">{{$atach['TASK_ATTACHMENT']}}</a>
				   <div class="btn-group btn-group-sm" style="position: absolute; right: 20px;">
                          <a class='btn btn-info btn-sm' href="{{ URL::asset('storage/task/'.$taskID.'/'.$activity) }}" target="_blank" title='View Attachment'>
                           <i class="fas fa-paperclip"></i>
                         </a> 
						
						 <form class="form-horizontal" action="{{route('activity.destroy', $activity)}}" method="POST">
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