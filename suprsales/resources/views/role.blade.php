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
            <h1>Create Role</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard.index')}}">Home</a></li>
              <li class="breadcrumb-item active">Create Role</li>
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
			
			 <div class="modal fade text-left roleModal">
        <div class="modal-dialog">
          <div class="modal-content" style="width: 600px; height: 100px;">
           
                <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Edit Role</h3>
				 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              </div>
          <input type="hidden" name="role_id" id="role_Id" class="form-control"  value="">
                
      <form class="form-horizontal" id="role_form" method="POST">
             {{ csrf_field() }}
			  {{ method_field('PUT') }}
                <div class="card-body">
				<div class="form-group row">
                    <label class="col-sm-4 col-form-label">Role Name</label>
                    <div class="col-sm-8">
                      <input  class="form-control" name="role_name" id="role_name" value="">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Role Description</label>
                    <div class="col-sm-8">
                      <input class="form-control" name="role_description" id="role_description" value="">
                    </div>
                  </div>
				  <div class="form-group row select2-teal">
                  <label class="col-sm-4 col-form-label">Authorization</label>
				  <div class="col-sm-8">
                  <select class="select2" multiple="multiple" name="auth_id[]" id="auth_id" data-placeholder="Select Authorization" data-dropdown-css-class="select2-teal">
               @foreach ($auths as $auth)
			   <option value="{{$auth['AUTH_ID']}}">
						  {{ $auth['AUTH_NAME'] }}
			   </option>
			   @endforeach 
                  </select>
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
                
			 <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content" style="width: 600px; height: 100px;">
           
                <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Create Role</h3>
				 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
			  <form role="form-horizontal" action="{{route('roles.store')}}" method="POST">
			 {{ csrf_field() }}
                <div class="card-body">
				<div class="form-group row">
                    <label class="col-sm-4 col-form-label">Role Name</label>
                    <div class="col-sm-8">
                      <input class="form-control" name="role_name" placeholder="Role Name" required>
                    </div>
                  </div>
                  
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Role Description</label>
                    <div class="col-sm-8">
                      <input class="form-control" name="role_description" placeholder="Role Description" required>
                    </div>
                  </div>
				  
				   <div class="form-group row select2-teal">
                  <label class="col-sm-4 col-form-label">Authorization</label>
				  <div class="col-sm-8">
				  
                  <select class="select2" multiple="multiple" name="auth_id[]" data-placeholder="Select Authorization" data-dropdown-css-class="select2-teal" required>
                  
				   @foreach ($auths as $value)
				    @if($value['FLAG'] == '1')
				<option value="{{ $value['AUTH_ID'] }}">{{ $value['AUTH_NAME'] }}</option>
			@endif
				@endforeach 
                  </select>
				 
				  </div>
                </div>
                </div>
                <!-- /.card-body -->
                
                <!-- /.card-footer -->
				<div class="card-footer">
                  <button type="submit" class="btn btn-info float-right">Create</button>
                  <button type="submit" class="btn btn-info" data-dismiss="modal">Cancel</button>
                </div>
              </form>
			  
            </div>

               
              
           
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>




				
				   
			 	
				 

			 
          <!-- /.modal-content -->
        
        <!-- /.modal-dialog -->
      
              
			  <div class="card-body">
			  
			  
			 
			 
			  <table id="create_role" class="table table-bordered table-hover" >
			  <thead>
                  <tr>
                    <th>Name</th>
                    <th>Description</th>
					<th>Authorization</th>
					<th>Action</th>
					<th class="text-center">
                          Status
                      </th>
                  </tr>
                  </thead>
				 <tbody>
				@isset($roles)
				  @foreach ($roles as $value)
			 
            <tr>
			
					<td>{{ $value['ROLE_NAME'] }}</td>
					<td>{{ $value['ROLE_DESCRIPTION'] }}</td>
					
					<td>
					@foreach ($value['AUTH'] as $auth_name)
					@if($auth_name['FLAG'] == '1')
					   <span class='badge badge-secondary'>{{ $auth_name['AUTH_NAME'] }}</span>
				   @else
					   <span class='badge badge-danger'>{{ $auth_name['AUTH_NAME'] }}</span>
				   @endif
					@endforeach
					</td>
					
					<td>
				     @php
				$role = json_encode($value);
				@endphp
				
					   <a class='btn btn-warning btn-sm role' href='#' value="{{$role}}" id="{{$value['ROLE_ID']}}" title="Edit">
                             <i class='fas fa-edit'></i>       
                          </a>
					
                      </td>
					  
         <td class='project-state'>
						@if($value['FLAG'] == '1') 
							
                          <span class='badge badge-success'>Activated</span>
					  @else
						 
						   <span class='badge badge-danger'>Deactivated</span>
					   @endif
                      </td>
		 
						
				
					
					      
				
				</tr>
		 @endforeach 
		 @endisset
			@empty($roles)
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