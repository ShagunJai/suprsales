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
  {{-- If not verified it define Error --}}
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
            <h1>Admin</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
         {{-- this is the link for home btn --}}
              <li class="breadcrumb-item"><a href="{{ route('dashboard.index')}}">Home</a></li>
              <li class="breadcrumb-item active">Admin</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>


    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">

			  <div class="card-body">
			  <table id="example2" class="table table-bordered table-hover">

			  <thead>

                  <tr>
				  <th>
                  </th>
				  <th>Type</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
					<th class="text-center">
                          Status
                      </th>
					<th></th>
		 			<th></th>
                  </tr>
                  </thead>
                  <tbody>
         {{-- here IS_ADMIN came from store() inside CreateEmployeeController.php --}}
         {{-- here $details use to get admins form api it is inside AdminController.php --}}
			@isset($details)
			 @foreach ($details as $value)
     		  @if ($value['IS_ADMIN'] =='1')
            <tr id="{{ $value['EMP_ID'] }}">
			 <td></td>
             @if ($value['EMP_TYPE'] =='1')
							<td>
								<span class='badge badge-secondary'>Depot Manager</span>
							</td>
						@elseif ($value['EMP_TYPE'] =='2')
							<td>
								<span class='badge badge-primary'>Org Admin</span>
							</td>
						@else
							<td>
								<span class='badge badge-success'>Admin</span>
							</td>
						@endif
    {{-- Get the value of the Emp_name, Email and mobile number --}}
					<td>{{ $value['EMP_NAME'] }}</td>
					<td>{{ $value['EMP_EMAIL'] }}</td>
					<td>{{ $value['EMP_MOBILE_NO'] }}</td>
      {{-- This flag use for Action btn dropdown --}}
						<td class='project-state'>
						@if($value['FLAG'] =='1')
                          <span class='badge badge-success'>Activated</span>
					  @else
						   <span class='badge badge-danger'>Deactivated</span>
					   @endif
                      </td>
					  <td>{{ $value['EMP_ID'] }}</td>
					   <td>{{ $value['FLAG'] }}</td>
				</tr>
				@endif
		 @endforeach

	@endisset
    {{-- if we dont find any record then it shows  --}}
			@empty($details)
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
