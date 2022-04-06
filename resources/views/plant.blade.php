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

	@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

{{-- This tab is for All Plants inside Product --}}
 <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Plant</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                {{-- It give the link to home page in the top right corner --}}
              <li class="breadcrumb-item"><a href="{{ route('dashboard.index')}}">Home</a></li>
              <li class="breadcrumb-item active">Plant</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
 {{-- Edit plant inside the All Plant in the Action column --}}
<div class="modal fade text-left plantModal">
        <div class="modal-dialog">
          <div class="modal-content" style="width: 600px; height: 100px;">

                <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Edit Plant</h3>
				 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              </div>
    {{-- This form popup after clicking edit btn --}}
      <form class="form-horizontal" id="plant_form" method="POST">
            {{-- This tab is for plant --}}
                <div class="card-body">
				<input type="hidden" name="plant_id" id="plant_Id" class="form-control"  value="">
                 <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Plant</label>
                    <div class="col-sm-8">
                   <input id="plant_name" class="form-control"  value="" readonly>
				   </div>
                  </div>
               {{-- It is for Activate tab we can change On or off --}}
				  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-4 col-form-label">Activate</label>
                    <div class="col-sm-8">

                    <input type="checkbox" name="flag" id="flag" class="flag" data-bootstrap-switch data-off-color="danger" data-on-color="success" value="">
                       </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    {{-- This is for update btn inside edit iw will update the plant active or deactive --}}
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
{{-- It is for the table heading and table data --}}
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">

			  <div class="card-body">
			  <table id="plant-table" class="table table-bordered table-hover" >
			  <thead>


        <tr>
            {{-- This all are table heading  --}}
                        <th >Description</th>
                        <th>Region</th>
                        <th>Contact Person</th>
						 <th>Mobile</th>
						 <th>Action</th>
                        <th>Status</th>

                    </tr>

                  </thead>
                  <tbody>
             <!--$admins contain PLANT_ID","PLANT_DESCRIPTION","PLANT_ADDRESS","REGION_NAME","EMPLOYEE_NAME",EMPLOYEE_EMAIL,EMPLOYEE_MOB,FLAG
                  use as values get from the PlantController.php
             -->
                @isset($admins)
				  @foreach ($admins as $value)

            <tr>
                  {{-- This is for Description tab contain all PLANT_DESCRIPTION  --}}
					<td>{{ $value['PLANT_DESCRIPTION'] }}</td>
                 {{-- This is for Region tab contain all REGION_NAME  --}}
					<td>{{ $value['REGION_NAME'] }}	</td>
                 {{-- This is for Contact Person tab contain all EMPLOYEE_NAME  --}}
					<td>{{ $value['EMPLOYEE_NAME'] }}
                 {{-- This is for Mobile tab contain all EMPLOYEE_MOB  --}}
					<td>{{ $value['EMPLOYEE_MOB'] }}</td>

					<td>
                       {{-- The encoded value stored in the $auths  --}}
				     @php
				$auths = json_encode($value);
				@endphp

					   <a class='btn btn-warning btn-sm plant' href='#' value="{{$auths}}" id="{{$value['PLANT_ID']}}" title="Edit">
                             <i class='fas fa-edit'></i>
                          </a>


                      </td>

					</td>
                {{-- The FLAG value contain the Activation status --}}
			   @if($value['FLAG'] =='1')
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
         {{-- If there is no record for then it will shows at the first after clicking the tab --}}
			@empty($admins)
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
