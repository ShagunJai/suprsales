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
            <h1>My Plants</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">My Plants</li>
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
			  <table id="plant-table" class="table table-bordered table-hover" >
			  <thead>
                
				  
        <tr>
                         <th >Description</th>
                        <th>Region</th>
                        <th>Contact Person</th>
						 <th>Mobile</th>
                        <th>Status</th>
                        
                    </tr>
               
                  </thead>
                  <tbody>
				  @isset($admins)
				  @foreach ($admins as $value)
			 
            <tr>
			 
					<td>{{ $value['PLANT_DESCRIPTION'] }}</td>
					<td>{{ $value['REGION_NAME'] }}	</td>
					<td>{{ $value['EMPLOYEE_NAME'] }}
					
					</td>
					<td>{{ $value['EMPLOYEE_MOB'] }}</td>
					
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