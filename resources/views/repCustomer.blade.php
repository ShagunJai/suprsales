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
     @isset($cust)
		 @foreach ($cust as $value)
		  @php
		   $emp_name = $value['EMP_NAME'];

		  @endphp
	       @break
		 @endforeach
      @endisset


<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-10">
		 <div class="row">

            <h1>Customers of @isset($cust) {{$emp_name}} @endisset</h1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<button class="btn btn-info"><a href="Javascript:history.go(-1);Location.reload()" class="text-white"><i class="fas fa-arrow-alt-circle-left"></i> Go Back</a></button>

			</div>
          </div>
          <div class="col-sm-2">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard.index')}}">Home</a></li>
              <li class="breadcrumb-item active">Customers</li>
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

			   <div class="modal fade text-left mycusModal">
        <div class="modal-dialog modal-xl">
          <div class="modal-content" style="width: 980px; height:100px;">

                <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Details of Customer</h3>
				 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
                      <td class="text-success text-center" id="OPENING_BALANCES">


                      </td>

                    </tr>
                    <tr>
                      <td>2.</td>
                      <td>Closing Balance</td>
                      <td class="text-info text-center" id="CLOSING_BALANCES">


                      </td>

                    </tr>
                    <tr>
                      <td>3.</td>
                      <td>Imm. Dues</td>
                      <td class="text-warning text-center" id="IMM_DUESS">

                      </td>

                    </tr>
                    <tr>
                      <td>4.</td>
                      <td>Advance</td>
                      <td class="text-danger text-center" id="ADVANCES">

                      </td>

                    </tr>
					<tr>
                      <td>5.</td>
                      <td>Total Credit Limit</td>
                      <td class="text-muted text-center" id="TOTAL_CREDIT_LIMITS">

                      </td>

                    </tr>
					<tr>
                      <td>6.</td>
                      <td>Remaining Credit Limit</td>
                      <td class="text-maroon text-center" id="REMAINING_CREDIT_LIMITS">

                      </td>

                    </tr>
					<tr>
                      <td>7.</td>
                      <td>Total Outstanding</td>
                      <td class="text-purple text-center" id="TOTAL_OUTSTANDINGS">

                      </td>

                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->


			</div>
			<div class="col-sm-7">


			<canvas id="Chart" width="510" height="410">

				</canvas>


			</div>
			</div>



            </div>

          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

	   <div class="modal fade text-left" id="cusLedgers" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content" style="width: 900px; height:100px;">
	   <div class="card card-info">
        <div class='card-header'>
		<h3 class='card-title'>Ledger Details of <span id="customer_nam"></span>  (<span id="customer_typ"></span>)</h3>
		 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
		</div>
        <div class="modal-body" id="cusLedger_detail">

        </div>

      </div>
      </div>
    </div>
  </div>
			  <div class="card-body">

			  <table id="mycustomer" class="table table-bordered table-hover">
			  <thead>
                  <tr>
				  <th>Type</th>
                    <th>Name</th>

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
				 @php
				 $emp_name = $value['EMP_NAME'];
				 @endphp
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
			  @if($value['RELATIONSHIP'] =='1')
                          <span class='badge badge-secondary'>Direct</span>
				 @elseif($value['RELATIONSHIP'] =='0')
						 <span class='badge badge-primary'>Team</span>
					@endif
						&nbsp;&nbsp;
			  {{ $value['CUSTOMER_NAME'] }}

                      </td>

			 <td class="text-center">{{ $value['CUSTOMER_CITY'] }}</td>
			  <td class="text-right">{{ $value['CUSTOMER_MOB'] }}</td>


			  <td>
			  <div class="btn-group btn-group-sm">
			  @if($value['TYPE'] =='Distributor')
                       <a class='btn btn-success btn-sm mycus' href='#'  id="{{$value['CUSTOMER_ID']}}_{{$value['TYPE_CODE']}}" title="View">
                             <i class='fas fa-eye'></i>
                          </a>
			@else
				<a class='btn btn-success btn-sm mycus disabled' href='#'  id="{{$value['CUSTOMER_ID']}}_{{$value['TYPE_CODE']}}" title="View">
                             <i class='fas fa-eye'></i>
                          </a>
				@endif

				 @if($value['TYPE'] =='Distributor')
            <a class='btn btn-info btn-sm cusLedger' href='#' id="{{$value['CUSTOMER_ID']}}_{{$value['CUSTOMER_NAME']}}_{{$value['TYPE']}}_{{$value['TYPE_CODE']}}" title="View Ledger">
                            <i class="fas fa-money-check-alt"></i>
                          </a>
						  @else
				<a class='btn btn-info btn-sm cusLedger disabled' href='#' id="{{$value['CUSTOMER_ID']}}_{{$value['CUSTOMER_NAME']}}_{{$value['TYPE']}}_{{$value['TYPE_CODE']}}" title="View Ledger">
                            <i class="fas fa-money-check-alt"></i>
                          </a>
				@endif
			</div>

                     </td>

				     @if($value['CUSTOMER_STATUS'] =='1')
						<td class='project-state'>
                          <span class='badge badge-success'>Activated</span>
                      </td>
				@else
						<td class='project-state'>
                          <span class='badge badge-danger'>Deactivated</span>
                      </td>
				@endif



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
