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
            <h1>Approve Claim</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard.index')}}">Home</a></li>
              <li class="breadcrumb-item active">Approve Claim</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
	  
			 <form action="{{route('approveclaim.store')}}" method="POST">
		 <div class="row">&nbsp;&nbsp;
			 {{ csrf_field() }}	
			 <div class="col">
		<div class="form-group">
                
                  <select class="form-control select2"  name="cycle" data-dropdown-css-class="select2-teal" style="width: 100%;">
                    <option selected="selected" value="null">Submission Cycle</option>
                    <option value="h1">H1 (1st - 15th day)</option>
                    <option value="h2">H2 (16th - 31st day)</option>
                  </select>
                </div>
				</div>
		
		<div class="col">
		<div class="form-group">
                
                  <select class="form-control select2"  name="month" data-dropdown-css-class="select2-teal" style="width: 100%;">
                    <option selected="selected" value="null">Month</option>
                    <option value="01">January</option>
                    <option value="02">February</option>
                    <option value="03">March</option>
                    <option value="04">April</option>
                    <option value="05">May</option>
                    <option value="06">June</option>
					<option value="07">July</option>
					<option value="08">August</option>
					<option value="09">September</option>
					<option value="10">October</option>
					<option value="11">November</option>
					<option value="12">December</option>
                  </select>
                </div>
				</div>
				<div class="col">
		<div class="form-group">
                
                  <select class="form-control select2"  name="year" id='date-dropdown' data-dropdown-css-class="select2-teal" style="width: 100%;">
                    <option selected="selected" value="null">Year</option>
                  </select>
                </div>
				</div>
				<div class="col">
		
		<div class="form-group">
                
                 <button type="submit"  class="btn btn-success">Submit</button>
					
                </div>
				</div>
				</div>
				</form>
				
				<div class="row">
          <div class="col-12">
            <div class="card">
			
			<div class="modal fade text-left" id="approves" role="dialog">
    <div class="modal-dialog modal-xl">
    
      <!-- Modal content-->
      <div class="modal-content" style="width: 1100px; height:100px;">
	   <div class="card card-success">
        <div class='card-header'>
		<h3 class='card-title'>Approved Claims</h3>
		 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
		</div>
		
		<div class="row">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<small><i class="fas fa-bus text-maroon"></i>&nbsp;Bus/Train &nbsp;&nbsp;&nbsp;<i class="fas fa-plane text-indigo"></i>&nbsp;Air &nbsp;&nbsp;&nbsp;<i class="fas fa-taxi text-success"></i>&nbsp;Taxi/Auto/Rickshaw &nbsp;&nbsp;&nbsp;<i class="fas fa-hotel text-purple"></i>&nbsp;<b>(H)</b>&nbsp;Hotel &nbsp;&nbsp;&nbsp;<i class="fas fa-gas-pump text-pink"></i>&nbsp;Fuel &nbsp;&nbsp;&nbsp;<i class="fas fa-tools text-lime"></i>&nbsp;Vehicle Repair &nbsp;&nbsp;&nbsp;<i class="fas fa-route text-primary"></i>&nbsp;DA Outstation &nbsp;&nbsp;&nbsp;<i class="fas fa-map-marker-alt text-fuchsia"></i>&nbsp;DA Local &nbsp;&nbsp;&nbsp;<i class="fas fa-wifi text-orange"></i>&nbsp;<b>(I)</b>&nbsp;Internet/Phone &nbsp;&nbsp;&nbsp;<i class="fas fa-mobile-alt text-info"></i>&nbsp;<b>(S)</b>&nbsp;Stationary&nbsp;&nbsp;&nbsp;<i class="fab fa-medium-m text-secondary"></i>&nbsp;Miscellaneous</small></div>       
        
        <div class="modal-body" id="approve_detail">
         
        </div>
       
      </div>
      </div>
    </div>
  </div>
  
  <div class="modal fade text-left" id="rejects" role="dialog">
    <div class="modal-dialog modal-xl">
    
      <!-- Modal content-->
      <div class="modal-content" style="width: 1100px; height:100px;">
	   <div class="card card-danger">
        <div class='card-header'>
		<h3 class='card-title'>Rejected Claims</h3>
		 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
		</div>
		
		<div class="row">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<small><i class="fas fa-bus text-maroon"></i>&nbsp;Bus/Train &nbsp;&nbsp;&nbsp;<i class="fas fa-plane text-indigo"></i>&nbsp;Air &nbsp;&nbsp;&nbsp;<i class="fas fa-taxi text-success"></i>&nbsp;Taxi/Auto/Rickshaw &nbsp;&nbsp;&nbsp;<i class="fas fa-hotel text-purple"></i>&nbsp;<b>(H)</b>&nbsp;Hotel &nbsp;&nbsp;&nbsp;<i class="fas fa-gas-pump text-pink"></i>&nbsp;Fuel &nbsp;&nbsp;&nbsp;<i class="fas fa-tools text-lime"></i>&nbsp;Vehicle Repair &nbsp;&nbsp;&nbsp;<i class="fas fa-route text-primary"></i>&nbsp;DA Outstation &nbsp;&nbsp;&nbsp;<i class="fas fa-map-marker-alt text-fuchsia"></i>&nbsp;DA Local &nbsp;&nbsp;&nbsp;<i class="fas fa-wifi text-orange"></i>&nbsp;<b>(I)</b>&nbsp;Internet/Phone &nbsp;&nbsp;&nbsp;<i class="fas fa-mobile-alt text-info"></i>&nbsp;<b>(S)</b>&nbsp;Stationary&nbsp;&nbsp;&nbsp;<i class="fab fa-medium-m text-secondary"></i>&nbsp;Miscellaneous</small></div>       
        
        <div class="modal-body" id="reject_detail">
         
        </div>
       
      </div>
      </div>
    </div>
  </div>
  
  <div class="modal fade text-left" id="submitted" role="dialog">
    <div class="modal-dialog modal-xl">
    
      <!-- Modal content-->
      <div class="modal-content" style="width: 1100px; height:100px;">
	   <div class="card card-warning">
        <div class='card-header'>
		<h3 class='card-title'>Submitted Claims</h3>
		 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
		</div>
		
		 <div class="row">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<small><i class="fas fa-bus text-maroon"></i>&nbsp;Bus/Train &nbsp;&nbsp;&nbsp;<i class="fas fa-plane text-indigo"></i>&nbsp;Air &nbsp;&nbsp;&nbsp;<i class="fas fa-taxi text-success"></i>&nbsp;Taxi/Auto/Rickshaw &nbsp;&nbsp;&nbsp;<i class="fas fa-hotel text-purple"></i>&nbsp;<b>(H)</b>&nbsp;Hotel &nbsp;&nbsp;&nbsp;<i class="fas fa-gas-pump text-pink"></i>&nbsp;Fuel &nbsp;&nbsp;&nbsp;<i class="fas fa-tools text-lime"></i>&nbsp;Vehicle Repair &nbsp;&nbsp;&nbsp;<i class="fas fa-route text-primary"></i>&nbsp;DA Outstation &nbsp;&nbsp;&nbsp;<i class="fas fa-map-marker-alt text-fuchsia"></i>&nbsp;DA Local &nbsp;&nbsp;&nbsp;<i class="fas fa-wifi text-orange"></i>&nbsp;<b>(I)</b>&nbsp;Internet/Phone &nbsp;&nbsp;&nbsp;<i class="fas fa-mobile-alt text-info"></i>&nbsp;<b>(S)</b>&nbsp;Stationary&nbsp;&nbsp;&nbsp;<i class="fab fa-medium-m text-secondary"></i>&nbsp;Miscellaneous</small></div>       
        
        <div class="modal-body" id="submit_detail">
         
        </div>
       
      </div>
      </div>
    </div>
  </div>
			  
			  <div class="card-body">
			  
			  <table id="approvals" class="table table-bordered table-hover" >
			  
			  <thead>
			 
                  <tr>
				  <th>Name</th>
                    
                    <th>Type</th>
					<th>Region</th>
                    <th>Submitted</th>
					<th>
                          Approved
                      </th>
					<th>Pending</th>
					<th>Rejected</th>
					<th></th>
					
                  </tr>
                  </thead>
                  <tbody>
				   @isset($claim)
				 @foreach ($claim as $value)
				  <tr>
				<td>{{$value['EMPLOYEE_NAME']}}</td>
				  @if ($value['EMP_CONTRACT_TYPE'] =='0')
							<td>
								<span class='badge badge-secondary'>Permanent</span>
							</td>
						@elseif ($value['EMP_CONTRACT_TYPE'] =='1')
							<td>
								<span class='badge badge-primary'>Contract</span>
							</td>
						
						@endif
				  <td>
				  @foreach ($value['REGION'] as $val)
				  <span class='badge badge-info'>{{$val['REGION_NAME']}}</span>
				  @endforeach
				  </td>
				  
				  <td>
				    <a class='btn btn-warning btn-app btn-xs submits' href='#' id="{{$value['EMPLOYEE_ID']}}_{{$start_date}}_{{$end_date}}_true_submitted" style="height:25px; max-width:1%; padding-left:0px; padding-right:0px;" title="View submitted claims">
                            <b>{{$value['SUBMITTED']}}</b>
                          </a>
				
				  </td>
				  
				  <td>
				  
				  <a class='btn btn-warning btn-app btn-xs ap' href='#' id="{{$value['EMPLOYEE_ID']}}_{{$start_date}}_{{$end_date}}_1" style="height:25px; max-width:1%; padding-left:0px; padding-right:0px;" title="View approved claims">
                            <b>{{$value['APPROVED']}}</b>
                          </a>
					
				  </td>
				  
				  <td>
				  @php
				  $approveclaim = $value['EMPLOYEE_ID'];
				  @endphp
				   
				  <a class='btn btn-warning btn-app btn-xs' href="{{ url('approveclaim/' . $approveclaim . '/' . $start_date . '/' . $end_date) }}"  style="height:25px; max-width:1%; padding-left:0px; padding-right:0px;"  title="View pending claims">
                 <b>{{$value['PENDING']}}</b>
                </a>
				
			
				  </td>
				  
				 <td>
				  <a class='btn btn-warning btn-app btn-xs rejected' href='#' id="{{$value['EMPLOYEE_ID']}}_{{$start_date}}_{{$end_date}}_2" style="height:25px; max-width:1%; padding-left:0px; padding-right:0px;" title="View rejected claims">
                            <b>{{$value['REJECTED']}}</b>
                          </a>
				
				
				 </td>
				 
				 <td>{{$value['EMPLOYEE_ID']}}</td>
				  </tr>
				  
				@endforeach
			 @endisset
			@empty($claim)
			<script>toastr.warning("No records found.");</script>
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

<script>
    let dateDropdown = document.getElementById('date-dropdown');

    let currentYear = new Date().getFullYear();
    let earliestYear = 2000;

    while (currentYear >= earliestYear) {
      let dateOption = document.createElement('option');
      dateOption.text = currentYear;
      dateOption.value = currentYear;
      dateDropdown.add(dateOption);
      currentYear -= 1;
    }
  </script>
@endsection