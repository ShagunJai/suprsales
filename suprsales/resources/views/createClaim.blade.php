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

@isset($exp)
@foreach($exp as $value)
<input name="EXP_FUEL" type="hidden" id="expense"  value="{{$value['EXP_PER_KM_RATE']}}"> 
@endforeach
@endisset
                

      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-3">
              <h1>Create Claim</h1>
            </div>

            <div class="col-sm-9">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('dashboard.index')}}">Home</a></li>
                <li class="breadcrumb-item active">Create Claim</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
	  @isset($claim_day) 
			 @foreach ($claim_day as $value)
          <input type="hidden" id="claim_day_limit" value="{{$value['MAX_CLAIM_DAYS_LIMIT']}}">
		  @endforeach
		  @endisset


      <!-- Main content -->
      <section class="content">
	  
        <div class="container-fluid">
	  <div class="icheck-primary d-inline">
                        <input type="checkbox" id="mark_zero_claim">
                        <label for="mark_zero_claim">
                        </label>
                      </div> Mark No Claim (Set Zero Claim Value)
	  
					  <hr>
					  
					  <div class="card" id="mark_claim">
					  @php
					  $createclaim = 3;
					  @endphp
					  <form class="form-horizontal" action="{{route('createclaim.update',$createclaim)}}" method="POST">
			 {{ csrf_field() }}
			{{ method_field('PUT') }}
			<div class="row">
				&nbsp;&nbsp;&nbsp;&nbsp;
			 <div class="col-md-4">
           <div class="form-group markclaimDay">
                  <label>Date</label>
                    <div class="input-group date" id="markclaimdate" data-target-input="nearest">
                        <input type="text" name="mark_claim_date" class="form-control" data-target="#markclaimdate" placeholder="MM/DD/YYYY" required/>
                        <div class="input-group-append" data-target="#markclaimdate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>
				</div>
				</div>
				<div class="row">
				&nbsp;&nbsp;&nbsp;&nbsp;
				<div class="col-md-11">
					<label>Comments</label>
					<div class="form-group">
                      
                       <input name="MISCL_COMMENTS" class="form-control"  placeholder="Enter Comments">
                    
                    </div>
					</div>
				</div>
				<div class="card-footer">
				<button type="submit" class="btn btn-success btn-normal" style="float:left;"><i class="fa fa-save"></i> Save</button>
				</div>	
			 </form>
					  </div>
					  
				<div class="card" id="create_claim">
				
				<form class="form-horizontal" action="{{route('createclaim.store')}}" method="POST">
			 {{ csrf_field() }} 
				<div class="row">
				&nbsp;&nbsp;&nbsp;&nbsp;
			 <div class="col-md-4">
           <div class="form-group claimDay">
                  <label>Date</label>
                    <div class="input-group date" id="claimdate" data-target-input="nearest">
                        <input type="text" name="claim_date" class="form-control" data-target="#claimdate" placeholder="MM/DD/YYYY" required/>
                        <div class="input-group-append" data-target="#claimdate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>
				</div>
				
				</div>
			  <div class="card-body">
			  
                
				  <div class="card card-success">
				  <div class="card-header">
            <h3 class="card-title">Travel</h3>
  
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Expand">
                <i class="fas fa-minus"></i></button>
             
            </div>
          </div>
                    
                      <div class="card-body">
                      @isset($emp_details)
					  @foreach($emp_details as $emp_value)
					  
					   @php
					  $ownership = $emp_value['VEHICLE_OWNERSHIP'];
					  @endphp
					   <input type="hidden" id="ownership" value="{{$ownership}}" readonly> 
               
					  @endforeach
					  @endisset
					
					  
					  @if($ownership == 2)
					  <div class="card card-info">
                    <div class="card-header">
            <h3 class="card-title">Personal Vehicle</h3>
  
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Expand">
                <i class="fas fa-minus"></i></button>
             
            </div>
          </div>
                  
                      <div class="card-body">
					  <p style="color:red;" class="text-sm">Remaining kilometers sholud be less than maximum allowed kilometers</p>
				<div class="row">
				
				<div class="col-md-4">
				 <label>From</label>
                        <div class="form-group">
                   
                    
                      <input name="START_KM"  id="START_KM" value="0" class="form-control pwc"  placeholder="Enter Start Km">
                    
                  </div>
                      </div>
				<div class="col-md-4">
				 <label>To</label>
                        <div class="form-group">
                   
                    
                      <input name="END_KM" id="END_KM" value="0" class="form-control pwc"  placeholder="Enter End Km">
                    
                  </div>
                      </div>
					  
					  <div class="col-md-4">
					  <label><i class="fas fa-gas-pump text-pink"></i>
				  &nbsp;&nbsp; Fuel Expense</label><br>
					  <div class="form-group">
					<input name="EXP_FUEL" type="hidden" id="rest" class="form-control"  value="0" readonly> 
                 <output id="personal" class="form-control"  value="" readonly></output>
                    
                
				</div>
				</div>
                  </div>
				  <div class="row">
				  <div class="col-md-4">
					  <label><i class="fas fa-tachometer-alt text-danger"></i>
				  &nbsp;&nbsp; Max Allowed KM</label><br>
					  <div class="form-group">
					  @isset($user)
					  @foreach($user as $val)
					  @php
					  $max = $val['LEFT_MAX_ALLOWED_KM'];
					  @endphp
					  @endforeach
					  @endisset
					<input class="form-control"  id="max_km" value="{{$max}}" readonly></input>
                    <input  type="hidden" name="START_END" class="form-control"  id="start_end" value="0" readonly></input>
                
				</div>
				</div>
				<div class="col-md-4">
					  <label><i class="fas fa-tachometer-alt text-danger"></i>
				  &nbsp;&nbsp; Remaining KM</label><br>
					  <div class="form-group">
                 <output id="allowed_km" name="LEFT_MAX_ALLOWED_KM" class="form-control "  value="" readonly></output>
                    
                
				</div>
				</div>
				  </div>
                
				
				</div>
					  
                    
                  </div>
				  
				  @elseif($ownership == 1)
					 
					 <div class="card card-info">
                    <div class="card-header">
            <h3 class="card-title">Company Owned Vehicle</h3>
  
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Expand">
                <i class="fas fa-minus"></i></button>
             
            </div>
          </div>
                  
                      <div class="card-body">
				<div class="row">
				
					  <div class="col-md-4">
					  <label><i class="fas fa-gas-pump text-pink"></i>
				  &nbsp;&nbsp; Fuel Expense</label><br>
					  <div class="form-group">
					<input name="EXP_FUEL" id="fuel_exp" value="0" class="form-control prc"  placeholder="Enter Fuel Expense">
                    
                
				</div>
				</div>
                  </div>
				  
                </div>
					  
                    
                  </div>
				  
				  
					  @endif
				  
				  <div class="card card-info">
                    <div class="card-header">
            <h3 class="card-title">Public Transport</h3>
  
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Expand">
                <i class="fas fa-minus"></i></button>
             
            </div>
          </div>
                    
                      <div class="card-body">
					  
					   <div class="row">
					   
					  <div class="col-md-4">
					   <label><i class="fas fa-bus text-maroon"></i>
				  &nbsp;&nbsp; Bus/Train Expense</label>
                      <div class="form-group">
                     
                       <input name="EXP_BUS_TRAIN" value="0" id="EXP_BUS_TRAIN" class="form-control prc"  placeholder="Enter Bus/Train Expense">
                    
                    </div>
					</div>
					
					<div class="col-md-4">
					<label><i class="fas fa-taxi text-success"></i>
				  &nbsp;&nbsp; Taxi/Auto/Rickshaw Exepnse</label>
					<div class="form-group">
                     
                       <input name="EXP_TAXI_AUTO" value="0" id="EXP_TAXI_AUTO" class="form-control prc"  placeholder="Enter Taxi/Auto Exepnse">
                    
                    </div>
					</div>
					
					<div class="col-md-4">
					 <label><i class="fas fa-plane text-indigo"></i>
				  &nbsp;&nbsp; Air Expense</label>
					<div class="form-group">
                     
                       <input name="EXP_PLANE" value="0" id="EXP_PLANE" class="form-control prc"  placeholder="Enter Air Expense">
                    
                    </div>
					</div>
					
					</div>
					
					<div class="row">
					   
					 
					<div class="col-md-4">
					 <label><i class="fas fa-tools text-lime"></i>
				  &nbsp;&nbsp; Vehicle Repair Expense</label>
					<div class="form-group">
                     
                       <input name="EXP_VEH_REPAIR" value="0" id="EXP_VEH_REPAIR" class="form-control prc"  placeholder="Enter Vehicle Repair Expense">
                    
                    </div>
					</div>
					</div>
					
					  </div>
					  
                    
                  </div>
				  
					
					  
					  
					  
					  
					  </div>
					  
                    
                  </div>
				  
				  
				  <div class="card card-success">
				  <div class="card-header">
            <h3 class="card-title">Other</h3>
  
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Expand">
                <i class="fas fa-minus"></i></button>
             
            </div>
          </div>
                    
                      <div class="card-body">
					  
					  <div class="row">
					   
					  <div class="col-md-4">
					   <label><i class="fas fa-hotel text-purple"></i>
				  &nbsp;&nbsp; Hotel Expense</label>
                         <div class="form-group">
                     
                       <input name="EXP_HOTEL" value="0" id="EXP_HOTEL" class="form-control prc"  placeholder="Enter Hotel Expense">
                    
                    </div>
					</div>
					<div class="col-md-4">
					<label><i class="fas fa-wifi text-orange"></i>
				  &nbsp;&nbsp; Internet/Phone Expense</label>
					<div class="form-group">
                       <input name="EXP_MOBILE_INTERNET" value="0" id="EXP_MOBILE_INTERNET" class="form-control prc"  placeholder="Enter Internet\Phone Expense">
                    </div>
					</div>
					<div class="col-md-4">
					<label><i class="fas fa-mobile-alt text-info"></i>
				  &nbsp;&nbsp; Stationary Expense</label>
					<div class="form-group">
                     
                       <input name="EXP_STATIONARY" value="0" id="EXP_STATIONARY" class="form-control prc"  placeholder="Enter Stationary Expense">
                    
                    </div>
					</div>
					
					</div>
					
					<div class="row">
					   
					  <div class="col-md-4">
					  <label><i class="fas fa-map-marker-alt text-fuchsia"></i>
				  &nbsp;&nbsp; Daily Allowance Local</label>
					<div class="form-group">
                     
                       <input name="DA_RATES_LOCAL" value="0" id="DA_RATES_LOCAL" class="form-control prc"  placeholder="Enter Daily Allowance Expense">
                    
                    </div>
					</div>
					<div class="col-md-4">
					<label><i class="fas fa-route text-primary"></i>
				  &nbsp;&nbsp; Daily Allowance Outstation</label>
					<div class="form-group">
                      
                       <input name="DA_RATES_OUTST" value="0" id="DA_RATES_OUTST" class="form-control prc"  placeholder="Enter Daily Allowance Outstation Expense">
                    
                    </div>
					</div>
					<div class="col-md-4">
					<label><i class="fab fa-medium-m text-secondary"></i>
				  &nbsp;&nbsp; Miscellaneous</label>
					<div class="form-group">
                      
                       <input name="EXP_MISC" value="0" id="EXP_MISC" class="form-control prc"  placeholder="Enter Miscellaneous Expense">
                    
                    </div>
					</div>
					<div class="col-md-12">
					<label>Comments</label>
					<div class="form-group">
                      
                       <input name="MISC_COMMENTS" id="MISC_COMMENTS" class="form-control"  placeholder="Enter Comments">
                    
                    </div>
					</div>
				
				</div>
				
                      </div>
					  
                    
                  </div>
				  
				</div>
				
				<div class="card-footer">
				<dl class="form-group row"  style="float:right;">
				<dt class="col"><b>&nbsp;&nbsp;</b></dt>
                  <dd class="col">
                   <input type="hidden" id="res" class="form-control"  value="" readonly>
                   <output id="result" class="form-control"  value="" readonly></output>
				   </dd>
                </dl>
                    <button type="submit" id="new" class="btn btn-success btn-normal" style="float:left;"><i class="fa fa-save"></i> Save</button>
					<button type="button" onclick="check_total()" class="btn btn-success btn-normal" style="float:right;"><i class="fas fa-check-circle"></i> Check Total</button>
					
                  </div>
				  
				</div>
              </form>
			
		</div>
      </section>

@endsection