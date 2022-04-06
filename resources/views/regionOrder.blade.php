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
		  <div class="row">
            <h1>My Region Orders</h1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			@php
			$regionorder = Auth::user()->emp_id;
			@endphp
			 <form class="form-horizontal" action="{{route('regionorder.update',$regionorder)}}" method="POST">
			 {{ csrf_field() }}
			 {{ method_field('PUT') }}
			 @isset($order)
			 
                <input name="start_date" type="hidden" value="{{$start_date}}" class="form-control" placeholder="Description">
				<input name="end_date" type="hidden" value="{{$end_date}}" class="form-control" placeholder="Description">
			  @endisset
			  <button type="submit" class="btn btn-info" style="float:right; height:32px; width:42px;"><i class="fas fa-download"></i></button>
			 </form>
			</div>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard.index')}}">Home</a></li>
              <li class="breadcrumb-item active">My Region Orders</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
 <section class="content">
      
         <form class="form-horizontal" action="{{route('regionorder.store')}}" method="POST">
			 {{ csrf_field() }}
            <div class="row">
			
              <div class="col-md-3">
                <div class="form-group select2-teal">
                  <label>Employee</label>
                  <select class="select2" multiple="multiple" name="emp[]" data-placeholder="Select Employee" data-dropdown-css-class="select2-teal" style="width: 100%;">
					@isset($admins)
					@foreach($admins as $value)
                    <option value="{{$value['EMP_ID']}}">{{$value['EMP_NAME']}}</option>
					@endforeach
					@endisset
                  </select>
                </div>
				</div>
                <!-- /.form-group -->
				
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
			 </form>
            <!-- /.row -->
			
			
			
            <!-- /.row -->
    
		<div class="row">
          <div class="col-12">		
    <div class="card">
    
	      <div class="modal fade text-left" id="reorders" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" style="width: 900px; height:100px;">
	   <div class="card card-info">
        <div class='card-header'>
		<h3 class='card-title'>Ordered Items (Total Value - <span id="total_val"></span>)</h3>
		 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
		</div>
        <div class="modal-body" id="order_detail">
         
        </div>
       
      </div>
      </div>
    </div>
  </div>
	
			   
			  
			  <div class="card-body">
			  
			 	
			 
			  <table id="order" class="table table-bordered table-hover" >
			  <thead>
                  <tr>
				    <th>Customer Code</th>
                    <th>Order No.</th>
                    <th>Plant</th>
                    
					<th>Total</th>
					<th>Date</th>
					<th>Action</th>
					
                  </tr>
                  </thead>
                  <tbody>
			  @isset($order)
			 @foreach($order as $values)  
            <tr>
			 
             
					<td>
					{{$values['CUSTOMER_ID']}}
							</td>		
						
			
					<td>{{$values['ORDER_ID']}}</td>
					<td>{{$values['PLANT_NAME']}}</td>
					<td>{{$values['TOTAL_ORDER_VALUE']}}</td>
					<td>{{ \Carbon\Carbon::parse($values['ORDER_DATE'])->format('d/m/Y')}}</td>
					 <td>
				      <a class='btn btn-info btn-sm reorders' href='#' id="{{$values['ORDER_ID']}}_{{$values['TOTAL_ORDER_VALUE']}}_{{$values['REGION_ID']}}" title="Ordered Items">
                            <i class="fas fa-truck"></i>
                          </a>
		
                      </td>
			  
						    
				
				</tr>
		@endforeach
			 @endisset
           @empty($order)
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
      
      <!-- /.container-fluid -->
    </section> 

@endsection