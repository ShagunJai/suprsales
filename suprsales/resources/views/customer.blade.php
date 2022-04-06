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
            <h1>Customer</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard.index')}}">Home</a></li>
              <li class="breadcrumb-item active">Customer</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
	
	

	
 
 <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
			
			 <div class="modal fade text-left" id="ledgers" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" style="width: 900px; height:100px;">
	   <div class="card card-info">
        <div class='card-header'>
		<h3 class='card-title'>Ledger Details of <span id="customer_name"></span>  (<span id="customer_type"></span>)</h3>
		 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
		</div>
        <div class="modal-body" id="ledger_detail">
         
        </div>
       
      </div>
      </div>
    </div>
  </div>
 
  
  	  <div class="modal fade text-left cusModal">
        <div class="modal-dialog modal-xl">
          <div class="modal-content" style="width: 980px; height:100px;">
           
                <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Details of Customer</h3>
				 <button type="button" onclick="destroyChart()" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
			
			
			<div class="row">
            <div class="col-sm-5">
              
			
             <div class="card-header bg-light">
			 Financial KPI
			 </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>KPI Name</th>
                      <th class="text-center">Amount</th>
                     
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1.</td>
                      <td>Opening Balance</td>
                      <td class="text-success text-center" id="OPENING_BALANCE">
                       
                      
                      </td>
                      
                    </tr>
                    <tr>
                      <td>2.</td>
                      <td>Closing Balance</td>
                      <td class="text-info text-center" id="CLOSING_BALANCE">
                       
					   
                      </td>
                      
                    </tr>
                    <tr>
                      <td>3.</td>
                      <td>Imm. Dues</td>
                      <td class="text-warning text-center" id="IMM_DUES">
                      
                      </td>
                      
                    </tr>
                    <tr>
                      <td>4.</td>
                      <td>Advance</td>
                      <td class="text-danger text-center" id="ADVANCE">
                       
                      </td>
                     
                    </tr>
					<tr>
                      <td>5.</td>
                      <td>Total Credit Limit</td>
                      <td class="text-muted text-center" id="TOTAL_CREDIT_LIMIT">
                      
                      </td>
                     
                    </tr>
					<tr>
                      <td>6.</td>
                      <td>Remaining Credit Limit</td>
                      <td class="text-maroon text-center" id="REMAINING_CREDIT_LIMIT">
                      
                      </td>
                     
                    </tr>
					<tr>
                      <td>7.</td>
                      <td>Total Outstanding</td>
                      <td class="text-purple text-center" id="TOTAL_OUTSTANDING">
                     
                      </td>
                     
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
             
            
			</div>
			<div class="col-sm-7">
              
				
			<canvas id="Charts" width="510" height="410">
				
				</canvas>
				
			
			</div>
			</div>
           
			
			
            </div>

          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
	  
			
			 <div class="modal fade text-left custModal">
        <div class="modal-dialog">
          <div class="modal-content" style="width: 600px; height: 100px;">
           
                <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Edit Customer</h3>
				 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              </div>
          
      <form class="form-horizontal" id="cust_form" method="POST">
            
                <div class="card-body">
				<input type="hidden" name="customer" id="customers" class="form-control"  value="">
				<input type="hidden" name="code" id="code" class="form-control"  value="">
                  	<div class="form-group row select2-teal">
                  <label class="col-sm-4 col-form-label">Type</label>
				  <div class="col-sm-8">
                  <input class="form-control"  id="type" value="" readonly>
				  </div>
                </div>
				
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Name</label>
                    <div class="col-sm-8">
                      <input  class="form-control" name="cust_name" id="cust_name" value="">
                    </div>
                  </div>
				  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Phone</label>
                    <div class="col-sm-8">
                      <input  class="form-control" name="cust_mob" id="cust_mob" value="">
                    </div>
                  </div>
				  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Account</label>
                    <div class="col-sm-8">
                      <input class="form-control" name="cust_bank" id="cust_bank" value="">
                    </div>
                  </div>
				  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-4 col-form-label">Activate</label>
                    <div class="col-sm-8">
                     
                    <input type="checkbox" name="flag" id="flag" class="flag" data-bootstrap-switch data-off-color="danger" data-on-color="success" value="">
                       </div>
                  </div>
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
			  <div class="card-body">
			  
			  <table id="customer" class="table table-bordered table-hover">
			  <thead>
                  <tr>
				  <th>Type</th>
                    <th>Name</th>
					<th>Assigned To</th>
					<th>City</th>
					<th class="text-right">Phone No</th>
					
					<th>Action</th>
					
					<th class="text-center">
                          Status
                      </th>
					
                  </tr>
                  </thead>
                  <tbody>
				  @isset($cust)
				  @foreach ($cust as $value)
			  <tr id="{{$value['CUSTOMER_ID']}}_{{$value['TYPE_CODE']}}">
			   
			   @if($value['TYPE'] =='Farmer')         
						<td class='project-state'>
                           <span class='badge badge-warning'>Farmer</span>
                      </td>
				@elseif($value['TYPE'] =='Retailer') 
						<td class='project-state'>
                           <span class='badge badge-success'>Retailer</span>
                      </td>  
				@elseif($value['TYPE'] =='Distributor') 
						<td class='project-state'>
                          <span class='badge badge-info'>Distributor</span>
                      </td>  
				@endif
			   
			 
			  <td class='project-state'>
			 
						{{$value['CUSTOMER_NAME']}}
			  
                      </td>
			  <td>{{ $value['EMP_NAME'] }}</td>
			  <td class="text-center">{{ $value['CUSTOMER_CITY'] }}</td>
			  <td class="text-right">{{ $value['CUSTOMER_MOB'] }}</td>
			  
			  <td>
			  <div class="btn-group btn-group-sm">
                       
					@if($value['TYPE'] =='Distributor') 	  
					 <a class='btn btn-success btn-sm cus' href='#'  id="{{$value['CUSTOMER_ID']}}_{{$value['TYPE_CODE']}}" title="View">
                             <i class='fas fa-eye'></i>       
                          </a>
					@else
					<a class='btn btn-success btn-sm cus disabled' href='#'  id="{{$value['CUSTOMER_ID']}}_{{$value['TYPE_CODE']}}" title="View">
                             <i class='fas fa-eye'></i>       
                          </a>	
					@endif
						  
						  @if($value['TYPE'] =='Distributor') 
						   <a class='btn btn-warning btn-sm disabled' href='#' disabled="disabled" title="No Edit Option">
                             <i class='fas fa-edit'></i>       
                          </a>
						  @else
                           @php
				$custo = json_encode($value);
				@endphp
				
				
					   <a class='btn btn-warning btn-sm custo' href='#' value="{{$custo}}" id="view9_{{$value['CUSTOMER_ID']}}_{{$value['TYPE_CODE']}}" title="Edit">
                             <i class='fas fa-edit'></i>       
                          </a>
						  @endif
					
					@if($value['TYPE'] =='Distributor') 
					 <a class='btn btn-info btn-sm ledger' href='#' id="{{$value['CUSTOMER_ID']}}_{{$value['CUSTOMER_NAME']}}_{{$value['TYPE']}}_{{$value['TYPE_CODE']}}" title="View Ledger">
                            <i class="fas fa-money-check-alt"></i>
                          </a>
					@else
						 <a class='btn btn-info btn-sm ledger disabled' href='#' id="{{$value['CUSTOMER_ID']}}_{{$value['CUSTOMER_NAME']}}_{{$value['TYPE']}}_{{$value['TYPE_CODE']}}" title="View Ledger">
                            <i class="fas fa-money-check-alt"></i>
                          </a>
					@endif
						   <!--if($value['verify status'] =='verified') else disabled-->
						  
				
				@if($value['VERIFICATION_DOC'] == '') 
					<a class='btn btn-secondary btn-sm disabled' title="No Verification Document">
                            <i class="fas fa-download"></i>
                          </a> 

						 
						  @else
							
							 @php
				$customer = $value['VERIFICATION_DOC'];
				@endphp
						<a class='btn btn-secondary btn-sm' href="{{ route('customer.show',$customer)}}"  title="Download Verification Document">
                            <i class="fas fa-download"></i>
                          </a>
						
					@endif
						   
						
                      </div>
                     </td>
				
				<td class='project-state'>
				 @if($value['CUSTOMER_STATUS'] =='1')         
						
                          <span class='badge badge-success'>Activated</span>
						  
							  @if($value['VERIFICATION_STATUS'] =='2') 
								  <span class='badge badge-secondary'>Not Verified</span>
							  @elseif($value['VERIFICATION_STATUS'] =='1')
							  <span class='badge badge-primary'>Verified</span>
								  @endif
							  
                      
				@else
						
                          <span class='badge badge-danger'>Deactivated</span>
                            @if($value['VERIFICATION_STATUS'] =='2') 
								  <span class='badge badge-secondary'>Not Verified</span>
							  @elseif($value['VERIFICATION_STATUS'] =='1')
							  <span class='badge badge-primary'>Verified</span>
								  @endif
				@endif
			   </td> 
			  
			  </tr>
			
	@endforeach 
 @endisset
			@empty($cust)
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
@endsection