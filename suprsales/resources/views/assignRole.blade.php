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
            <h1>Assign Role</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard.index')}}">Home</a></li>
              <li class="breadcrumb-item active">Assign Role</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
	
	
	  <div class="modal fade text-left assignroleModal">
        <div class="modal-dialog">
          <div class="modal-content" style="width: 600px; height: 100px;">
           
                <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Assign Role</h3>
				 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              </div>
          <input type="hidden" name="non_id" id="non_Id" class="form-control"  value="">
                
      <form class="form-horizontal" action="{{route('roless.store')}}" method="POST">
             {{ csrf_field() }}
			 
                <div class="card-body">
				
				<div class="form-group row">
                    <label  class="col-sm-4 col-form-label">User ID</label>
                    <div class="col-sm-8">
                   <input name="emp_name[]" id="employees_Id" class="form-control"  value="" readonly>
                    </div>
                  </div>
				  <div class="form-group row">
                    <label  class="col-sm-4 col-form-label">User Name</label>
                    <div class="col-sm-8">
                   <input name="employees_name" id="employees_name" class="form-control"  value="" readonly>
                    </div>
                  </div>
		<div class="form-group row select2-teal">
          <label class="col-sm-4 col-form-label">Assign Role</label>
          <div class="col-sm-8">
            <select class="select2" multiple="multiple" name="role_name[]" data-placeholder="Select Role" data-dropdown-css-class="select2-teal">
                 @isset($role)
				 @foreach ($role as $values)
				<option value="{{ $values['ROLE_ID'] }}">{{ $values['ROLE_NAME'] }}</option>
				@endforeach 
				@endisset
              </select>
            
          </div>     
            </div>       
				 
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info float-right">Assign</button>
                  <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
                </div>
             
              </form>
			 
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>  
	
	 <div class="modal fade text-left assignModal">
        <div class="modal-dialog">
          <div class="modal-content" style="width: 600px; height: 100px;">
           
                <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Update Role</h3>
				 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              </div>
          <input type="hidden" name="assign_id" id="assign_Id" class="form-control"  value="">
                
      <form class="form-horizontal" id="assign_form" method="POST">
             {{ csrf_field() }}
			  {{ method_field('PUT') }}
                <div class="card-body">
				<div class="form-group row">
                    <label  class="col-sm-4 col-form-label">User ID</label>
                    <div class="col-sm-8">
                      <input class="form-control" id="user_id" value="" readonly>
                    </div>
                  </div>
				<div class="form-group row">
                    <label  class="col-sm-4 col-form-label">User Name</label>
                    <div class="col-sm-8">
                      <input class="form-control" id="user_name" value="" readonly>
                    </div>
                  </div>
		<div class="form-group row select2-teal">
          <label class="col-sm-4 col-form-label">Assign</label>
          <div class="col-sm-8">
            <select class="select2" multiple="multiple" name="role_id[]" id="role_id" data-placeholder="Select a Role" data-dropdown-css-class="select2-teal">
                @foreach ($role as $values)
				<option value="{{ $values['ROLE_ID'] }}">{{ $values['ROLE_NAME'] }}</option>
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
                <h3 class="card-title">Assign Role</h3>
				 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" action="{{route('roless.store')}}" method="POST">
			  {{ csrf_field() }}
                <div class="card-body">
				<div class="form-group row select2-teal">
          <label class="col-sm-4 col-form-label">Select User</label>
          <div class="col-sm-8">
            <select class="select2" name="emp_name[]" multiple="multiple" data-placeholder="Select User" data-dropdown-css-class="select2-teal" required>
			 @foreach ($emp as $valu)
				<option value="{{ $valu['EMP_ID'] }}">{{ $valu['EMP_NAME'] }} [{{ $valu['EMP_ID'] }}]</option>
				@endforeach 
                
              </select>
          </div>
        </div>
		<div class="form-group row select2-teal">
          <label class="col-sm-4 col-form-label">Assign Role</label>
          <div class="col-sm-8">
            <select class="select2" name="role_name[]" multiple="multiple" data-placeholder="Select Role" data-dropdown-css-class="select2-teal" required>
               @foreach ($role as $val)
			   @if($val['FLAG'] == '1')
				<option value="{{ $val['ROLE_ID'] }}">{{ $val['ROLE_NAME'] }}</option>
			@endif
				@endforeach 
              </select>
            
          </div>
                    
            </div> 
              
                </div>
                <!-- /.card-body -->
                
                <!-- /.card-footer -->
				<div class="card-footer">
                  <button type="submit" class="btn btn-info float-right">Assign</button>
                  <button type="submit" class="btn btn-info" data-dismiss="modal">Cancel</button>
                </div>
              </form>
            </div>

               
              
           
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div> 
				
	
	
	 <section class="content">
      <div class="container-fluid">
	  <div class="icheck-primary d-inline">
                        <input type="checkbox" id="assigned_roles">
                        <label for="assigned_roles">
                        </label>
                      </div> List of Employees with No Role Assigned
					  <hr>
					  
        <div class="row">
          <div class="col-12">
            <div class="card" id="assigned_role">
			
			  <div class="card-body">
			 
			  <table id="assign_role" class="table table-bordered table-hover">
			  <thead>
                
				  
                  <tr> 
                     <th>User ID</th>
                        <th>User Name</th>
                       <th>Roles</th>
                        <th>Action</th>
                        <th>Status</th>
                        
                    </tr>
                  </thead>
                  <tbody>
				  @isset($details)
				  @foreach ($details as $value)
				  <tr>
			  <td>{{ $value['EMP_ID'] }}</td>
					<td>{{ $value['EMP_NAME'] }}</td>
					<td>
					@foreach ($value['ROLE'] as $role_name)
					@if($role_name['FLAG'] == '1')
          <span class='badge badge-secondary'>{{ $role_name['ROLE_NAME'] }} </span>
			@else
		  <span class='badge badge-danger'>{{ $role_name['ROLE_NAME'] }} </span>
	  @endif
					@endforeach
					</td>
					<td> 
					 @php
				$assign = json_encode($value);
				@endphp
				
					   <a class='btn btn-warning btn-sm assign' href='#' value="{{$assign}}" id="{{$value['EMP_ID']}}" title="Edit">
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
		
		
		 <div class="card" id="non_assigned_role">
			
			  <div class="card-body">
			 
			  <table id="no_assign_role" class="table table-bordered table-hover">
			  <thead>
                
				  
                  <tr> 
                     <th>User ID</th>
                        <th>User Name</th>
                       <th>Action</th>
                       
                        
                    </tr>
                  </thead>
                  <tbody>
				  @isset($emp)
				  @foreach ($emp as $value)
				  <tr>
			  <td>{{ $value['EMP_ID'] }}</td>
					<td>{{ $value['EMP_NAME'] }}</td>
					
					<td> 
					 @php
				$assign_role = json_encode($value);
				@endphp
				<a class="btn btn-info btn-sm assignrole" href="#" value="{{$assign_role}}" id="{{$value['EMP_ID']}}" title="Assign">
				<i class="fas fa-user-plus"></i> Assign
				</a>
				
			   </td>
			          
						
				</tr>
					  @endforeach
					   @endisset
			
</tbody>
</table>

</div>			  
              
			  
              <!-- /.card-body -->
            </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>

@endsection