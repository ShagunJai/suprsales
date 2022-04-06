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
{{-- It will show after clicking My Orders inside the Sales sidebar --}}

 <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">

            <h1>My Orders</h1>

          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard.index')}}">Home</a></li>
              <li class="breadcrumb-item active">My Orders</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
 <section class="content">

         <form class="form-horizontal" action="{{route('myorder.store')}}" method="POST">
         {{-- This function can be used to generate the hidden input field in the HTML form --}}
			 {{ csrf_field() }}
            <div class="row">


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
                 {{-- This is the submit btn as search by which it gives the data define by the ids --}}
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

   {{-- IT shows Ordered Items if any for the particular ID  --}}
	 <div class="modal fade text-left" id="myorders" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content" style="width: 900px; height:100px;">
	   <div class="card card-info">
        <div class='card-header'>
		<h3 class='card-title'>Ordered Items (Total Value - <span id="total_vals"></span>)</h3>
		 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
		</div>
        <div class="modal-body" id="myorder_detail">

        </div>

      </div>
      </div>
    </div>
  </div>


{{-- This is the table shown after clicking My Orders  --}}
	  <div class="card-body">
			  <table id="myorder" class="table table-bordered table-hover" >
			  <thead>
                  <tr>
				    <th>Customer</th>
                    <th>Order No.</th>
                    <th>Plant</th>

					<th>Total</th>
					<th>Date</th>
					<th>Action</th>

                  </tr>
                  </thead>
                  <tbody>
     {{-- $Order is contain all the individual order details and define by the ID sales data of individual user and store as a $values --}}
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
				     <a class='btn btn-info btn-sm myorders' href='#' id="{{$values['ORDER_ID']}}_{{$values['TOTAL_ORDER_VALUE']}}_{{$values['REGION_ID']}}" title="Ordered Items">
                            <i class="fas fa-truck"></i>
                          </a>


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
