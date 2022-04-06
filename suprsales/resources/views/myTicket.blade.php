@extends('layouts.app')
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
            <h1>My Tickets</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard.index')}}">Home</a></li>
              <li class="breadcrumb-item active">My Tickets</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
 <section class="content">
      <div class="container-fluid">
        <form class="form-horizontal" action="{{route('myticket.store')}}" method="POST">
			 {{ csrf_field() }}
            <div class="row">
              
				
              <!-- /.col -->
              <div class="col-md-3">
                <label>Date Range</label>
                <div class="form-group row ">        
               
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="far fa-calendar-alt"></i>
                      </span>
                    </div>
                    <input type="text" name="days" class="form-control float-right" id="reservation">
                  </div>
              </div>
                <!-- /.form-group -->
				</div>
				&nbsp;&nbsp;&nbsp;
				<div class="col-md-3">
                 <label>Submit</label>
			  <div class="form-group row">
			  <button type="submit" class="btn btn-flat btn-success" style="float:right;">Search &nbsp;<i class="fas fa-search"></i></button>
              
			  </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
			</form>
			
			
            <!-- /.row -->
    
		<div class="row">
          <div class="col-12">		
    <div class="card">
    
	     
	
				 
			  
			   
			  
			  <div class="card-body">
			 
			  <table id="myticket" class="table table-bordered table-hover" >
			  <thead>
                  <tr>
				  <th>Ticket No.</th>
				    <th>Description</th>
                    
                    <th>Date</th>
                    
					<th>Processor</th>
					<th>Priority</th>
					<th>Status</th>
					
                  </tr>
                  </thead>
                  <tbody>
			   
           @isset($tickets)
			 @foreach($tickets as $values)  
            <tr>
			   
             
				 <td>
					 @php
			$myticket = $values['TICKET_ID'];
			@endphp
					<a class='btn btn-warning btn-app btn-xs' href="{{ url('myticket/' . $myticket . '/' . $start_date . '/' . $end_date) }}" style="height:25px; max-width:1%; padding-left:0px; padding-right:0px;" title='View Ticket Details'>
                      <b>{{$values['TICKET_ID']}}</b>  
                          </a>
					</td>
             
					<td>
					{{$values['TICKET_DESCRIPTION']}}	
							</td>		
						
			
					
					<td>{{ \Carbon\Carbon::parse($values['CREATED_ON'])->format('d/m/Y')}}</td>
					
					
					 
					 <td>
				    {{$values['PROCESSOR_EMP_NAME']}}
					</td>
			  
					<td>
				    {{$values['TICKET_PRIORITY_DESC']}}
					</td>	    
				<td>{{$values['STATUS_DESC']}}</td>
				</tr>
		
           @endforeach
		   @endisset
      @empty($tickets)
			<script>toastr.warning("No records found.");</script>
			@endempty
           
      
</tbody>
</table>

</div>			  
               
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
@endsection