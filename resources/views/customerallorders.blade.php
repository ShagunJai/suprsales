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
            <h1>All Orders</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard.index')}}">Home</a></li>
              <li class="breadcrumb-item active">All Orders</li>
            </ol>
          </div>
        </div>
      </div><!--/.container-fluid -->
 </section>

 <section class="content">
	 <!-- used to make data selector -->
    <form class="form-horizontal" action="{{route('custallorder.store')}}" method="POST">
    {{ csrf_field() }}
    <div class="row">
    <div class="col-md-3">
    <div class="form-group">
    <div class="input-group">
    <div class="input-group-prepend">
    <span class="input-group-text">
        <i class="far fa-calendar-alt"></i>
    </span>
    </div>
    <input type="text" name="days" class="form-control float-right" id="reservation">
    </div>
    <!-- /.input group -->
    </div>
    <!-- /.form-group -->
	</div>
     <!-- create a drop-down to select status -->
	 <div class="col-md-3">
              <!-- creates  a button of type submit -->
			  <div class="form-group row">
			  <button type="submit" class="btn btn-flat btn-success" style="float:right;">Search &nbsp;<i class="fas fa-search"></i></button>
               </div></div>
                    <!-- /.form-group -->
              <!-- /.col -->

            </div></form> 
            <div class="row">
     <div class="col-12">		
     <div class="card">
     <div class="modal fade text-left" id="allords" role="dialog">
     <div class="modal-dialog">
     <!-- Modal content-->
     <div class="modal-content" style="width: 900px; height:100px;">
	   <div class="card card-info">
     <div class='card-header'>
		 <h3 class='card-title'>Order Details</h3>  
     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
     <span aria-hidden="true">&times;</span>
     </button>
		 </div>
     <div class="modal-body" id="allord_detail">
     </div>
     
     <div class="card-footer">
  
     <form class="form-horizontal" id="acknowledge_form" method="PUT">
     {{ csrf_field() }}   
     {{method_field('PUT')}}
            <div class="card-body">

    <input type="hidden" name="orderr_id" id="orderr_id" class="form-control"  value="">
    <input type="hidden" name="acknowledge_status" id="acknowledge_status" class="form-control"  value="2">
                  
                  
                  
    @isset($cust)
				  @foreach ($cust as $valued)

         
<input type="hidden" name="statuses" id="statuses" class="form-control"  value="{{$valued['APPROVE_STATUS']}}" disabled>
 
      
@endforeach
@endisset 

<button type="submit" class="btn btn-info float-right" id="acknowledge_button" >Acknowledge</button>

      </div>      
</form>  
     <p>* -&nbsp;&nbsp; Price may varry according to plant</p></div>
     </div>
     </div>
     </div>
     </div>
     </div>
     </div>
     </div>
     
    
                <div class="card">
                <div class="card-body">
			  
			 	
			 
			  <table id="customerorder" class="table table-bordered table-hover" >
			  <thead>
                  <tr style="text-align:center;">
                    <th>Order Id</th>
				    <th>Date</th>
                    <th >Action</th>
                    <th>Status</th>
                    <th>Acknowledge</th>

                  </tr>
                  </thead>
                  <tbody >
                  @isset($cust)
				  @foreach ($cust as $value)
                    <tr  style="text-align:center;">
                      <td style="text-align:center;" >{{$value['ORDER_ID']}}</td>
                      <td style="text-align:center;">{{ \Carbon\Carbon::parse($value['ORDER_DATE'])->format('d/m/Y')}}</td>
                      <td style="text-align:center;">
                      @php
				$order = json_encode($value);
				@endphp
           <a class='btn btn-warning btn-sm allord' href='#' value="{{$order}}" id="{{$value['ORDER_ID']}}_{{$value['APPROVE_STATUS']}}"  class="text-center" title="Ordered Items">
                            <i class="fas fa-edit" style="text-align:center;"></i>
                          </a></td>
                       @if($value['APPROVE_STATUS'] =='1')         
						<td style="text-align:center;" class='project-state'>
                          <span class='badge badge-success'>Approved</span>
                      </td>
				@elseif($value['APPROVE_STATUS'] =='2')  
						<td style="text-align:center;" class='project-state'>
                          <span class='badge badge-warning'>Pending</span>
                      </td>       
        @elseif($value['APPROVE_STATUS'] =='3')  
            <td style="text-align:center;" class='project-state'>
                          <span class='badge badge-danger'>Rejected</span>
                      </td> 
                      @elseif($value['APPROVE_STATUS'] =='4')  
            <td style="text-align:center;" class='project-state'>
                          <span class='badge badge-info'>Partially Approved</span>
                      </td>   
				@endif
        @if($value['ACKNOWLEDGE_STATUS'] =='2')         
						<td style="text-align:center;" class='project-state'>
                          <span class='badge badge-success'>Acknowledged</span>
                      </td>
				@elseif($value['ACKNOWLEDGE_STATUS'] =='1')  
						<td style="text-align:center;" class='project-state'>
                          <span class='badge badge-danger'>Not Acknowledged</span>
                      </td>
                       @endif       
                      @endforeach
					   @endisset
             @empty($cust)
			<script>toastr.warning("No records found.");</script>
			@endempty
        
</tr>

</tbody>

			 
                  </table>
</div></div></section>
<script>
   $(function () {
    //Initialize Select2 Elements
    

	 $('#reservation').daterangepicker()
    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });

  })
</script>
<script type="text/javascript">
$(document).ready(function () {
  bsCustomFileInput.init();
  $("[data-card-widget='collapse']").click()
});
</script>



    @endsection