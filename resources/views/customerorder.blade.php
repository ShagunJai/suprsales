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
            <h1>Customer Orders</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard.index')}}">Home</a></li>
              <li class="breadcrumb-item active">Customer Orders</li>
            </ol>
          </div>
        </div>
      </div><!--/.container-fluid -->
 </section>











  <section class="content">
	 <!-- used to make data selector -->
    <form class="form-horizontal" action="{{route('corder.store')}}" method="POST">
    {{ csrf_field() }}
    <div class="row">
    <div class="col-md-3">
    <label>Date Range</label>
    <div class="form-group">
    <div class="input-group">
    <div class="input-group-prepend">
    <span class="input-group-text">
        <i class="far fa-calendar-alt"></i>
    </span>
    </div>
    <input type="text" name="days"  class="form-control float-right" id="reservation">
    </div>
    <!-- /.input group -->
    </div>
    <!-- /.form-group -->
	</div>
     <!-- create a drop-down to select status -->
	<div class="col-md-3">
                <div class="form-group select2-teal">
                <label>Status</label>
                  <select class="form-control select2" name="status" data-dropdown-css-class="select2-teal" style="width: 100%;">
                  <option value="0">Select Status</option>
                    <option value="1">Approved</option>
					<option value="2">Pending</option>
          <option value="3">Rejected</option>
          <option value="4">Partially Approved</option>

				
                  </select>
                </div>
				</div>    <div class="col-md-3">
        <label>Search</label>
			  <div class="form-group row">
			  <button type="submit" class="btn btn-flat btn-success" style="float:right;">Search &nbsp;<i class="fas fa-search"></i></button>
               </div></div>
                    <!-- /.form-group -->
              <!-- /.col -->

            </div></form></section>  


            <section class="content">
 
     <div class="row">
     <div class="col-12">		
     <div class="card">
     <div class="modal fade text-left" id="corders" role="dialog">
     <div class="modal-dialog">
     <!-- Modal content-->
     <div class="modal-content" style="width: 900px; height:100px;">
	   <div class="card card-info">
     <div class='card-header'>
		 <h3 class='card-title'>Order Details of  - <span id="total_vals"></span>(<span id="id"></span>)</h3>  
     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
     <span aria-hidden="true">&times;</span>
     </button>
		 </div>
     
     <form class="form-horizontal" id="edit_form"  method="POST">
     @isset($ORD)
@foreach ($ORD as $valuess)
@php
$ords_id = $valuess['ORDER_ID'];
 @endphp
@endforeach
@endisset
     <div class="card-body">
       
     <input type="hidden" name="ord_id" id="ord_id" class="form-control"  value="">

     <div class="form-group row select2-teal">
     <label class="col-sm-4 col-form-label">Select Plant</label>
     <div class="col-sm-8">
     <select class="select2" name="plant_id" id="plant_id" data-placeholder="Select a Plant" data-dropdown-css-class="select2-teal" required>
       
     @foreach ($plant as $value)
		 <option value="{{ $value['PLANT_ID'] }}">{{ $value['PLANT_DESCRIPTION'] }}({{ $value['PLANT_ID'] }})</option>
		 @endforeach 
     <br>
     <!-- <label class="col-sm-4 col-form-label">Select Me To Approve Partially</label> -->
     </select>
    
     </div>     
     </div> 
         
    <!--<div>
     <label for="inputPassword3" class="col-sm-4 col-form-label">Approve</label>
     <div class="col-sm-8">
     <input type="checkbox" name="flag" id="flag" class="flag" data-bootstrap-switch data-off-color="danger" data-on-color="success" data-bootstrap-switch data-off-text="Reject" data-on-text="Approve" >
     <div class="col-sm-8">
     <button type="button" class="btn btn-success btn-sm" title="Activate">Approve</button>
     <button type="button" class="btn btn-danger btn-sm" title="Activate">Reject</button></div>
     <div class="col-sm-8">
     <button type="button" class="btn btn-success btn-sm" title="Activate">Approve All</button>
     <button type="button" class="btn btn-danger btn-sm" title="Activate">Reject All</button>

</div>
     </div>-->
     <!--<div class="btn-group"><button type="button" class="btn btn-info btn-sm" style="float:right;" title="Activate">Action</button><button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown"><div class="dropdown-menu" role="menu"><a class="dropdown-item " id="btnSelectedRowss" >Approve</a><div class="dropdown-divider"></div><a class="dropdown-item" id="btnSelectedRoww">Approve All</a><div class="dropdown-divider"></div><a class="dropdown-item" id="btnSelectedRoow">Reject All</a></div>
</button></div>-->
</div>
     <div class="modal-body" id="corder_detail">
     </div>
     <div class="card-footer">
     <p>* - Price may varry according to plant</p>
     
     
    
     </div>
     </form>
			
    
     </div>
     </div>
     </div>
     </div>
     </div>
     </div>
     </div>

       

<div class="card">
<div class="card-body">
        
  
<br>
	<table id="corderss" class="table table-bordered table-hover" >
			  <thead>
                  <tr style="text-align:center;">

                   <th> 
                   Order No. 
                  </th>
                    
				    <th>Date of Order</th>
                    <th>Customer</th>
               <th>Plant</th>
				  <th style="text-align:center;">Action</th>
        <th>Approved</th> 
       <th>Acknowledged</th>
        
        <!--<th>s</th>-->
                  </tr>
                  </thead>
                 <tbody>
                 <div class="row">
				   <div class="col">
                 @isset($order)
			 @foreach($order as $values)  
     
			 
            <tr>
				  
	
                       
				  <td style="text-align:center;"> {{$values['ORDER_ID']}}
        </td>
                  <td style="text-align:center;">	{{ \Carbon\Carbon::parse($values['ORDER_DATE'])->format('d/m/Y')}}</td>
                  <td style="text-align:left;">{{$values['CUSTOMER_NAME']}}
          &nbsp;&nbsp;
          <br>
                    <span class='badge badge-info'>{{ $values['CUSTOMER_ID'] }}</span>
                   </td>
                  @if($values['APPROVE_STATUS'] =='1' )
					 <td style="text-align:center;">{{$values['PLANT_DESCRIPTION']}}	</td>
@else
<td style="text-align:center;">	</td>
@endif
           <td style="text-align:center;">
           @if($values['APPROVE_STATUS'] =='2') 
           @php
				$plant = json_encode($values);
				@endphp
           <a class='btn btn-warning btn-sm corders' value="{{$plant}}"  href='#' id="{{$values['ORDER_ID']}}_{{$values['CUSTOMER_NAME']}}"  class="text-center" title="Ordered Items">
                            <i class="fas fa-edit" style="text-align:center;"></i>
                          </a>
                         @else
                         <a class='btn btn-warning btn-sm disabled' href='#' disabled="disabled" title="No Edit Option">
                             <i class='fas fa-edit'></i>       
                          </a>
                          @endif
                      </td>
       
        @if($values['APPROVE_STATUS'] =='1')         
						<td style="text-align:center;" class='project-state'>
                          <span class='badge badge-success'>Approved</span>
                      </td>
				@elseif($values['APPROVE_STATUS'] =='2')  
						<td style="text-align:center;" class='project-state'>
                          <span class='badge badge-warning'>Pending</span>
                      </td>       
        @elseif($values['APPROVE_STATUS'] =='3')  
            <td style="text-align:center;" class='project-state'>
                          <span class='badge badge-danger'>Rejected</span>
                      </td> 
                      @elseif($values['APPROVE_STATUS'] =='4')  
            <td style="text-align:center;" class='project-state'>
                          <span class='badge badge-info'>Partial Approved</span>
                      </td> 
                     <!-- <td> <input type="checkbox" name="chk" value=""><br></td> -->
				@endif
        @if($values['ACKNOWLEDGE_STATUS'] =='1')         
						<td style="text-align:center;" class='project-state'>
                          <span class='badge badge-danger'>Not Acknowledged</span>
                      </td>
				@elseif($values['ACKNOWLEDGE_STATUS'] =='2')  
						<td style="text-align:center;" class='project-state'>
                          <span class='badge badge-success'>Acknowledged</span>
                      </td>       
        
                     <!-- <td> <input type="checkbox" name="chk" value=""><br></td> -->
				@endif
        
        <!--<td>{{$values['APPROVE_STATUS']}}</td>-->
                    </tr>
                 
                    @endforeach
			 @endisset
       </div></div>
             @empty($order)
			<script>toastr.warning("No records found.");</script>
			@endempty	
                 </tbody>
					</table></div></div></section>
          
<script type="text/javascript">
 /* document.addEventListener("contextmenu",function(w){
  w.preventDefault( alert("NOT ALLOWED TO USE RIGHT CLICK"));
  });
  document.addEventListener("keydown", function (event) {
    if (event.ctrlKey) {
        event.preventDefault(alert("NOT ALLOWED TO USE CONTROL CLICK "));
    }   
});*/

  </script>


                 @endsection