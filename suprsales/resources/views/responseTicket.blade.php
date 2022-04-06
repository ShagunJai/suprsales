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
        <div class="row mb-2">
          <div class="col-sm-9">
		  
		  <div class="row">
            &nbsp;&nbsp;
			<button class="btn btn-info"><a href="Javascript:history.go(-1);Location.reload()" class="text-white"><i class="fas fa-arrow-alt-circle-left"></i> Go Back</a></button>
           &nbsp;&nbsp;
		   <div id="accordion">
		  <div class="card-header bg-success">
                      <h6 class="card-title">
                        <a data-toggle="collapse" class="text-white" data-parent="#accordion" href="#collapseOne">
                          Add Response
                        </a>
                      </h6>
                    </div>
           </div> 
		   &nbsp;&nbsp;
		   @isset($tic)
			 @foreach($tic as $values)
			 
		  @if($values['CURRENT_PROCESSOR_ID'] != $values['COMPONENT_OWNER'])
					
		   <div id="accordion">
		  <div class="card-header bg-warning">
                      <h6 class="card-title">
                        <a data-toggle="collapse" class="text-dark" data-parent="#accordion" href="#collapseTwo">
                          Return Ticket  
                        </a>
                      </h6>
                    </div>
           </div> 
			
				
		  @endif
		  
		  @endforeach
		  @endisset
		  </div>
		 
		  </div>
          <div class="col-sm-3">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard.index')}}">Home</a></li>
              <li class="breadcrumb-item active">Ticket Response</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>



<div class="modal fade text-left authsModal">
        <div class="modal-dialog">
          <div class="modal-content" style="width: 600px; height: 100px;">
           
                <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Edit Ticket</h3>
				 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              </div>
       <input type="hidden" name="Task_id" id="Task_Id" class="form-control"  value=""> 
      
	  <form class="form-horizontal" id="ticket_form" method="POST">
	  <input type="hidden" name="start_date" value="{{$start_date}}">
	  <input type="hidden" name="end_date" value="{{$end_date}}">
	  @csrf
            @method('PUT')
                <div class="card-body">
				<input type="hidden" name="task_id" value="">
				<div class="form-group row">
                    <label  class="col-sm-3 col-form-label">Ticket ID</label>
                    <div class="col-sm-9">
                      <input id="tic_id" class="form-control" value="" placeholder="Name" readonly>
                    </div>
                  </div>
                  <div class="form-group row select2-teal">
                                  <label class="col-sm-3 col-form-label">Status</label>
                                  <div class="col-md-9">
                                 
                                   <select class="form-control select2" name="status" id="status" style="width: 100%;" data-dropdown-css-class="select2-teal" required> 
									 <option value="1">Pending</option>
									 <option value="2">Resolved</option>
									</select>
                                  
                                  </div>
                  
                                </div>
                 
				  <div class="form-group row select2-teal">
                                  <label class="col-sm-3 col-form-label">Priority</label>
                                  <div class="col-md-9">
                                 
                                    <select class="form-control select2" name="prior_id" id="prior_id" style="width: 100%;" data-dropdown-css-class="select2-teal" required>
										 <option value="1">Very High</option>
										 <option value="2">High</option>
										  <option value="3">Medium</option>
										   <option value="4">Low</option>
                                      </select>
                                  
                                  </div>
                  
                                </div>
								
								
                              <div class="form-group row select2-teal">
                                  <label class="col-sm-3 col-form-label">Component</label>
                                  <div class="col-md-9">
                                 
                                   <select class="form-control select2" name="component" onchange="mycomp(event)" id="component" style="width: 100%;" data-dropdown-css-class="select2-teal" required>
									 @isset($comp)
									@foreach ($comp as $values)
									<option value="{{ $values['COMPONENT_ID'] }}">{{ $values['COMPONENT_NAME'] }}</option>
									@endforeach 
									@endisset
									 
									</select>
                                  
                                  </div>
                  
                                </div>
								
									<div class="form-group row select2-teal">
                                  <label class="col-sm-3 col-form-label">Processor</label>
                                  <div class="col-md-9">
                                 
                                   <select class="form-control select2" name="processorr" id="processorr" style="width: 100%;" data-dropdown-css-class="select2-teal" required>
									
									</select>
                                  
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

	  

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
	  @isset($tic)
			 @foreach($tic as $values)
			 
			


        <div class="row">
		<div class="col-md-4">

            <!-- Profile Image -->
             <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Details</h3>
				  <div class="card-tools">
				  @php
				  $Tic = json_encode($values);
				  @endphp
				  <input type="hidden" id="procs" value="{{$values['CURRENT_PROCESSOR_ID']}}">
			 <a class='btn btn-warning btn-sm tickets' href='#' value="{{$Tic}}" id="{{$values['TICKET_ID']}}" title="Edit">
                             <i class='fas fa-edit text-dark'></i>       
                          </a>
            </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong>Ticket ID</strong>

                <p class="text-muted">
                  {{$values['TICKET_ID']}}
                </p>
				<hr>
				 <strong>Status</strong>

                <p class="text-muted">{{$values['STATUS_DESC']}}</p>
				
				<hr>

                <strong>Priority</strong>

                <p class="text-muted">
                 {{$values['TICKET_PRIORITY_DESC']}}
                </p>
				
                <hr>

                <strong>Component Name</strong>

                <p class="text-muted">{{$values['COMPONENT_NAME']}}</p>

                

                <hr>

                <strong>Processor</strong>

                <p class="text-muted">{{$values['PROCESSOR_EMP_NAME']}}
				
				</p>
				 <span class="cr"></span>
              </div>
              <!-- /.card-body -->
            </div>
				  
				
				 
          </div>
          <div class="col-md-8">
            <div class="card ex1">
			
              <div class="card-header p-2 bg-light">
                <ul class="nav nav-pills red">
                 <li class="nav-item" style="width:1000px">
				 
				 <a class="nav-link active bg-primary" href="#timeline" data-toggle="tab">
				 Subject : {{$values['TICKET_SUBJECT']}}
				 <div style="float:right;">{{ \Carbon\Carbon::parse($values['CREATED_ON'])->format('d/m/Y')}}</div>
						
				 </a>
				 <div class="card-footer">
				
                          <h6 class="timeline-header"><a>Created By : {{$values['CREATED_EMP_NAME']}} (Employee Code : {{$values['CREATED_BY']}} )</a></h6>
							
                          <div class="timeline-body bg-white">
						 <textarea class="text-primary"
                          style="width: 100%; height: 40px; line-height: 18px; border: 0px; padding: 10px;" disabled>{{$values['TICKET_DESCRIPTION']}}</textarea>
                 
                         
                          </div>
                        
						</div>
				 </li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  
					<div class="active tab-pane" id="timeline">
					<div id="collapseOne" class="panel-collapse collapse in">
                      <div class="card-body">
					  <form class="form-horizontal" action="{{route('response.store')}}" method="POST">
			 {{ csrf_field() }}
			 <input name="start_date" class="form-control" value="{{$start_date}}" type="hidden">
             <input name="end_date" class="form-control" value="{{$end_date}}" type="hidden">
                 
			 <input name="ticket_id" class="form-control" value="{{$values['TICKET_ID']}}" type="hidden">
			 
			 
						<div class="row">
                        <div class="custom-control custom-radio">
                          <input class="custom-control-input" type="radio" id="customRadio2" name="customRadio" value="1" checked>
                          <label for="customRadio2" class="custom-control-label">External</label>
                        </div>&nbsp;&nbsp;&nbsp;&nbsp;
						 <div class="custom-control custom-radio">
                          <input class="custom-control-input" type="radio" id="customRadio1" name="customRadio" value="2">
                          <label for="customRadio1" class="custom-control-label">Internal</label>
                        </div>
						</div>
						
                       <textarea placeholder="Enter response" name="RESPONSE_DESC"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
						<button type="submit" class="btn btn-flat btn-success">Submit</button>
                      </form>
					  </div>
                    </div>
					
					<div id="collapseTwo" class="panel-collapse collapse in">
                      <div class="card-body">
					 @php
			  $response = $values['TICKET_ID']
			  @endphp
              <form class="form-horizontal" action="{{route('response.update',$response)}}" method="POST">
			 {{ csrf_field() }}
			 {{ method_field('PUT') }}
			 <textarea placeholder="Enter reason" name="RESPONSE_DESC"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
						
			 <input type="hidden" value="{{$values['COMPONENT_OWNER']}}" name="processor">
						<button type="submit" class='btn btn-flat btn-warning processor'>
                           Return   
                          </button>
					</form>  
					  </div>
                    </div>
                    <!-- The timeline -->
                    <div class="timeline timeline-inverse">
                      <!-- timeline time label -->
					  
                     
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
					  @php
					  $firstTime = 0;
					  $co = 0;
					  @endphp
					 
					   
					   @foreach($values['respond_array'] as $val)
					   
					   @if(\Carbon\Carbon::parse($val['RESPONDED_ON'])->format('jS M Y') != $co || $firstTime == '0')
					   <div class="time-label">
                        <span class="bg-danger">
						{{ \Carbon\Carbon::parse($val['RESPONDED_ON'])->format('jS M Y')}}
                        </span>
                      </div>
					   @endif
					   
					   @php
					     $firstTime = 1;
						 $response = $val['RESPONSE_TYPE'];
					   @endphp
					   
						 <div>
					  @if($response == '1')
                        <i class="fas fa-comments bg-yellow" title="External Response"></i>
					@else
						 <i class="fas fa-comments bg-primary" title="Internal Response"></i>
					@endif
                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> {{$val['RESPONDED_ON']}}</span>

                          <h3 class="timeline-header"><a>{{$val['RESPONDED_EMP_NAME']}} (Employee Code : {{$val['RESPONDED_BY']}})</a></h3>

                          <div class="timeline-body">
						  <textarea class="text-primary bg-white"
                          style="width: 100%; height: 80px; line-height: 18px; border: 0px; padding: 10px;" disabled>{{$val['RESPONSE_DESC']}}</textarea>
                 
                           
                          </div>
                          
                        </div>
						
                      </div>  
					   
                      <!-- END timeline item -->
                      <!-- timeline item -->
                      
					  
					  @php
					   $co = \Carbon\Carbon::parse($val['RESPONDED_ON'])->format('jS M Y');
					   @endphp
					   
                     @endforeach
                      
                     
                     
                    </div>
                  </div>
                  
                    
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
				
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
			
          </div>
		  @endforeach
				@endisset
							@empty($tic)
			<script>toastr.warning("No records found.");</script>
			@endempty
          <!-- /.col -->
        </div>
        <!-- /.row -->
     <!-- /.container-fluid -->
    </section>
@endsection