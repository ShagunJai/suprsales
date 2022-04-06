{{-- It is for layout header, footer and sidebar --}}
@extends('layouts.app')
{{-- Main section is for the content when the working shows --}}
@section('content')

  {{-- It is for veryfy the customer and verified by their ids --}}

        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
{{-- If not verified it will give 404 error --}}
	@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
{{-- It will show after clicking My Depot Orders inside the Sales sidebar --}}
 <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
		  <div class="row">
            <h1>My Depot Orders</h1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         {{-- It will store the Authorized EMP_ID and it route the deport order with respective ids --}}
			@php
			$depotorder = Auth::user()->emp_id;
			@endphp
			 <form class="form-horizontal" action="{{route('depotorder.update',$depotorder)}}" method="POST">
         {{-- This function can be used to generate the hidden input field in the HTML form --}}
             {{ csrf_field() }}
             {{-- PUT method is used to update resource available on the server. --}}
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
              <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">Home</a></li>
              <li class="breadcrumb-item active">My Depot Orders</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
 <section class="content">

         <form class="form-horizontal" action="{{route('depotorder.store')}}" method="POST">
         {{-- This function can be used to generate the hidden input field in the HTML form --}}
			 {{ csrf_field() }}
            <div class="row">
       {{-- Here $admins contain all employee by plant get from the api getAllEmpByPlant.php inside DeportOrderController.php --}}
              <div class="col-md-3">
       {{-- It shows the Employee tab in the top in which we are using dropdown from which we are selecting enployee name to send CREATED_BY as EMP_ID--}}
                <div class="form-group select2-teal">
                  <label>Employee</label>
                  <select class="select2" multiple="multiple" name="emp[]" data-placeholder="Select Employee" data-dropdown-css-class="select2-teal" style="width: 100%;">
					@isset($admins)
					@foreach($admins as $value)
                    <option value="{{$value['CREATED_BY']}}">{{$value['EMP_NAME']}}</option>
					@endforeach
					@endisset
                  </select>
                </div>
				</div>
                <!-- /.form-group -->

              <!-- /.col -->
              {{-- This tab is for selecting the date range from which date to which date  --}}
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
                {{-- This is for status option in that there are two optin shown  --}}
				<div class="col-md-3">
                <div class="form-group select2-teal">
                  <label>Status</label>
                  <select class="select2" name="status" data-dropdown-css-class="select2-teal" style="width: 100%;">
				  <option value="" selected>Select Status</option>
                    <option value="1">New</option>
					<option value="2">Downloaded</option>
                  </select>
                </div>
				</div>
                 {{-- This is the submit btn as search by which it gives the data define by the ids --}}
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

	      <div class="modal fade text-left" id="deorders" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
    {{-- IT shows Ordered Items if any for the particular ID  --}}
      <div class="modal-content" style="width: 900px; height:100px;">
	   <div class="card card-info">
        <div class='card-header'>
		<h3 class='card-title'>Ordered Items (Total Value - <span id="total_val"></span>)</h3>
		 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
		</div>
        <div class="modal-body" id="deorder_detail">

        </div>

      </div>
      </div>
    </div>
  </div>


{{-- This is the table shown after clicking Depot order  --}}
	  <div class="card-body">
			  <table id="depot_order" class="table table-bordered table-hover" >
			  <thead>
                  <tr>
				    <th>Customer</th>
                    <th>Order No.</th>
                    <th>Plant</th>

					<th>Total</th>
					<th>Date</th>
					<th>Action</th>
					<th>Status</th>
                  </tr>
                  </thead>
                  <tbody>
          {{-- $Order is contain all the individual order details by the ID sales data of individual user and store as a $values --}}
			  @isset($order)
			 @foreach($order as $values)
            <tr>


					<td>
				   <div class="row">
				   <div class="col">

             {{-- THis is for the Customer Column it aontain all CUSTOMER_ID with their name and respective cities --}}
				  <span class='badge badge-info'>{{$values['CUSTOMER_ID']}}
				  </span>
				  @if(filled($values['CUSTOMER_CITY']))
				  <span class='badge badge-primary'>
				  {{$values['CUSTOMER_CITY']}}
				  </span>
				  @endif
				  <br>
				 {{$values['CUSTOMER_NAME']}}

				  </div>
				  </div>
					</td>


                     {{-- This is for Order No tab contain all order ID  --}}
					<td>{{$values['ORDER_ID']}}</td>
                     {{-- This is for Plant tab contain PLANT_NAME--}}
					<td>{{$values['PLANT_NAME']}}</td>
                     {{-- This is for Total contain TOTAL_ORDER_VALUE  --}}
					<td>{{$values['TOTAL_ORDER_VALUE']}}</td>
                     {{-- This is for Date tab contain ORDER_DATE  --}}
					<td>{{$values['ORDER_DATE']}}</td>
					 <td>
				      <a class='btn btn-info btn-sm depoorders' href='#' id="{{$values['ORDER_ID']}}_{{$values['TOTAL_ORDER_VALUE']}}_{{$values['REGION_ID']}}" title="Ordered Items">
                            <i class="fas fa-truck"></i>
                          </a>

                      </td>
			  <td>
             {{-- It is for Status Column if the status =1 then new means the data is not dowmloaded is 2 then downloaded --}}
				@if($values['STATUS'] == '1')
				<span class='badge badge-success'>New</span>
			@elseif($values['STATUS'] == '2')
				<span class='badge badge-warning'>Downloaded</span>
				@endif
				</td>


				</tr>
		@endforeach
			 @endisset
            {{-- If there is no record for the seaching Id then it will show No records found --}}
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
