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
            <h1>Plant</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard.index')}}">Home</a></li>
              <li class="breadcrumb-item active">Plant</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

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
          
      <form class="form-horizontal" id="plant_form" method="POST">
            
                <div class="card-body">
				<input type="hidden" name="plant_id" id="plant_Id" class="form-control"  value="">
                 <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Plant</label>
                    <div class="col-sm-8">
                   <input id="plant_name" class="form-control"  value="" readonly>
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
						 <th>Action</th>
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
					<td>{{ $value['EMPLOYEE_MOB'] }}</td>
					
					<td>
				     @php
				$auths = json_encode($value);
				@endphp
				
					   <a class='btn btn-warning btn-sm plant' href='#' value="{{$auths}}" id="{{$value['PLANT_ID']}}" title="Edit">
                             <i class='fas fa-edit'></i>       
                          </a>
				
	
                      </td>
					
					</td>
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