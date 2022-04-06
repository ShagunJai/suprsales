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
            <div class="col-sm-3">
              <h1>Configuration</h1>
            </div>

            <div class="col-sm-9">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('dashboard.index')}}">Home</a></li>
                <li class="breadcrumb-item active">Configuration</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          
          
				
                  <div class="card card-success">
				   <div class="card-header">
            <h3 class="card-title">Maximum Number Of Days To Raise Claim</h3>
  
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Expand">
                <i class="fas fa-minus"></i></button>
             
            </div>
          </div>
                  
                      <div class="card-body">
					   <form class="form-horizontal" action="{{route('levelsettings.globalsettings')}}" method="POST">
			  {{ csrf_field() }}  
				  <h6 class="bg-light">Maximum Allowed Number Of Days To Raise Claim</h6><hr>
				  
                        <div class="form-group row">
                      <label class="col-sm-2 col-form-label">No of days</label>
                      <div class="col-sm-10">
					  @isset($global)
						@foreach ($global as $values)
                       <input name="MAX_CLAIM_DAYS_LIMIT" class="form-control" value="{{$values['MAX_CLAIM_DAYS_LIMIT']}}" placeholder="Enter Days" required>
                    @endforeach
					@endisset
					@empty($global)
					 <input name="MAX_CLAIM_DAYS_LIMIT" class="form-control" value="" placeholder="Enter Days" required>
                   
					@endempty
                      </div>
                    </div>
                      </div>
					  <div class="card-footer">
                    <button type="submit" class="btn btn-success btn-normal" style="float:left;"><i class="fa fa-save"></i> Save</button>
                  </div>
                   </form> 
                  </div>
				  
				  <div class="card card-success">
				   <div class="card-header">
            <h3 class="card-title">Create Level</h3>
  
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Expand">
                <i class="fas fa-minus"></i></button>
             
            </div>
          </div>
                  
                   
			 
                <div class="card-body">
				 <form class="form-horizontal" action="{{route('levelsettings.store')}}" method="POST">
			  {{ csrf_field() }}  
				<div class="row">
				
				<div class="col-md-4">
				 <label>Level ID</label>
                        <div class="form-group">
                   
                    
                      <input name="level_id" class="form-control"  placeholder="Enter level ID" required>
                   
                  </div>
                      </div>
				<div class="col-md-4">
				 <label>Level Name</label>
                        <div class="form-group">
                   
                    
                      <input name="level_name" class="form-control"  placeholder="Enter name" required>
                    
                  </div>
                      </div>
					  
                      <div class="col-md-4">
                        <label>Description</label>
                        <div class="form-group">

                          
                            <input name="level_description" class="form-control" placeholder="Enter Description" required>
                          
                        </div>
                      </div>
                      
                    </div> 
                  
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-success btn-normal" style="float:left;"><i class="fa fa-save"></i>   Save</button>
                </div>
                <!-- /.card-footer -->
				</form>
              
                    
                  </div>
				  
				 
				  
				  <div class="card card-success">
				   <div class="card-header">
            <h3 class="card-title">Level Settings </h3>
  
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Expand">
                <i class="fas fa-minus"></i></button>
             
            </div>
          </div>
		   
                   
                      <div class="card-body">
                      
					  <div class="row">
					   <div class="col-md-12">
					   <label>Select Level</label>
					   <div class="form-group">
                        
                          <select class="form-control select2" onchange="myFunction(event)" data-dropdown-css-class="select2-teal" required>
					 <option value="" selected>Select Level</option>
					 @isset($levels)
					 @foreach($levels as $value)
					 <option value="{{$value['LEVEL_RANK_ID']}}">{{$value['LEVEL_NAME']}}</option>
					 @endforeach
					 @endisset
				  </select>    
						
                        </div>
						</div>
						</div>
						
            
      
						<div class="row">
				
				<div class="col-md-4">
				<label><i class="fas fa-route text-primary"></i>
				  &nbsp;&nbsp; Daily Allowance Outstation (Daily)</label>
						 <div class="form-group">
                      
                       <input id="DA_RATES_OUTST" class="form-control" value=""  placeholder="Enter Daily Allowance Outstation" required>
                    
                    </div>
					</div>
					
					<div class="col-md-4">
					 <label><i class="fas fa-map-marker-alt text-fuchsia"></i>
				  &nbsp;&nbsp; Daily Allowance Local (Daily)</label>
                     <div class="form-group">
                     
                       <input id="DA_RATES_LOCAL" class="form-control" value="" placeholder="Enter Daily Allowance Local" required>
                    
                    </div>
					</div>
					<div class="col-md-4">
					<label><i class="fas fa-bus text-maroon"></i>
				  &nbsp;&nbsp; Bus/Train Expense (Daily)</label>
					<div class="form-group">
                      
                       <input id="exp_bus_train"  class="form-control" value="" placeholder="Enter Bus/Train Expense" required>
                    
                    </div>
					</div>
					</div>
					
					<div class="row">
				
				<div class="col-md-4">
				<label><i class="fas fa-taxi text-success"></i>
				  &nbsp;&nbsp; Taxi/Auto/Rickshaw Exepnse (Daily)</label>
                      
					<div class="form-group">
                      
                       <input id="EXP_TAXI_AUTO" class="form-control" value="" placeholder="Enter Taxi/Auto/Rickshaw Exepnse" required>
                    
                    </div>
					</div>
					<div class="col-md-4">
					 <label><i class="fas fa-plane text-indigo"></i>
				  &nbsp;&nbsp; Air Expense (Daily)</label>
					<div class="form-group">
                     
                      
                       <input id="EXP_PLANE" class="form-control" value=""  placeholder="Enter Air Expense" required>
                    
                    </div>
					</div>
					<div class="col-md-4">
					<label><i class="fas fa-percentage text-lightblue"></i>
				  &nbsp;&nbsp; Per Km Rate (Daily)</label>
					<div class="form-group">
                      
                      
                       <input id="EXP_PER_KM_RATE" class="form-control" value="" placeholder="Enter Per Km Rate" required>
                    
                    </div>
					</div>
					
					</div>
					
					<div class="row">
				
				<div class="col-md-4">
				<label><i class="fas fa-tools text-lime"></i>
				  &nbsp;&nbsp; Vehicle Repair Expense (Daily)</label>
                      
					<div class="form-group">
                      

                       <input id="EXP_VEH_REPAIR" class="form-control" value="" placeholder="Enter Vehicle Repair Expense" required>
                    
                      
                    </div>
					</div>
					<div class="col-md-4">
					 <label><i class="fas fa-hotel text-purple"></i>
				  &nbsp;&nbsp; Hotel Expense (Daily)</label>
					<div class="form-group">
                     
                      

                       <input id="EXP_HOTEL" class="form-control" value="" placeholder="Enter Hotel Expense" required>
                    
                     
                    </div>
					</div>
					<div class="col-md-4">
					 <label><i class="fas fa-wifi text-orange"></i>
				  &nbsp;&nbsp; Internet/Phone Expense (Monthly)</label>
					<div class="form-group">
                     
                      
                       <input id="EXP_MOBILE_INTERNET" class="form-control" value=""  placeholder="Enter Internet\Phone Expense" required>
                    
                     
                    </div>
					</div>
					
					</div>
					
					<div class="row">
				
				<div class="col-md-4">
				 <label><i class="fas fa-mobile-alt text-info"></i>
				  &nbsp;&nbsp; Stationary Expense (Daily)</label>
					<div class="form-group">
                     
                       <input id="EXP_STATIONARY" class="form-control" value="" placeholder="Enter Stationary Expense" required>
                    
                    </div>
					</div>
					
					<div class="col-md-4">
				 <label><i class="fas fa-gas-pump text-pink"></i>
				  &nbsp;&nbsp; Max Allowed Fuel (Monthly)</label>
					<div class="form-group">
                     
                       <input id="EXP_FUEL" class="form-control" value="" placeholder="Enter Max Allowed Fuel" required>
                    
                    </div>
					</div>
					
					<div class="col-md-4">
					<label><i class="fas fa-tachometer-alt text-danger"></i>
				  &nbsp;&nbsp; Max Allowed KM (Monthly)</label>
					  <div class="form-group">
                       <input id="MAX_ALLOWED_KM" class="form-control" value="" placeholder="Enter Max Allowed Km" required>
                    
                    </div>
					</div>
                     
						</div>
						
						<div class="row">
						<div class="col-md-4">
					<label><i class="fab fa-medium-m text-secondary"></i>
				  &nbsp;&nbsp; Miscellaneous Expense (Monthly)</label>
					  <div class="form-group">
                       <input id="EXP_MISC" class="form-control" value="" placeholder="Enter Miscellaneous Expense" required>
                    
                    </div>
					</div>
					</div>
					
					
                    </div> 
						
					<div class="card-footer">
					
                    <button type="submit" id="btnSelectedRows" class="btn btn-success btn-normal" style="float:left;"><i class="fa fa-save"></i> Save</button>
                  </div>	
                     
					
                    </div>
					
			
			
        </div>
		
      </section>

@endsection