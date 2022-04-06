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
          <div class="col-sm-6">
		  <div class="row">
            &nbsp;&nbsp;
			<button class="btn btn-info"><a href="Javascript:history.go(-1);Location.reload()" class="text-white"><i class="fas fa-arrow-alt-circle-left"></i> Go Back</a></button>
            
			</div>
		  </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard.index')}}">Home</a></li>
              <li class="breadcrumb-item active">View Ticket</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
	  @isset($tic)
			 @foreach($tic as $values) 
        <div class="row">
		<div class="col-md-4">
			 <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Details</h3>
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

                <p class="text-muted">{{$values['PROCESSOR_EMP_NAME']}}</p>
				 <span class="dr"></span>
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
          <!-- /.col -->
        </div>
        <!-- /.row -->
     <!-- /.container-fluid -->
    </section>
@endsection