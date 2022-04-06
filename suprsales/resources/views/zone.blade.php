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
            <h1>Create Zone</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard.index')}}">Home</a></li>
              <li class="breadcrumb-item active">Create Zone</li>
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
			
				 <div class="modal fade text-left zoneModal">
        <div class="modal-dialog">
          <div class="modal-content" style="width: 600px; height: 100px;">
           
                <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Update Zone</h3>
				 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              </div>
          <input type="hidden" name="zone_id" id="zone_Id" class="form-control"  value="">
                
      <form class="form-horizontal" id="zone_form" method="POST">
             {{ csrf_field() }}
			  {{ method_field('PUT') }}
                <div class="card-body">
				
				<div class="form-group row">
                    <label  class="col-sm-4 col-form-label">Zone</label>
                    <div class="col-sm-8">
                      <input class="form-control" id="zone_names" value="" readonly>
                    </div>
                  </div>
		<div class="form-group row select2-teal">
          <label class="col-sm-4 col-form-label">Regions</label>
          <div class="col-sm-8">
            <select class="select2" multiple="multiple" name="region_id[]" id="region_id" data-placeholder="Select Regions" data-dropdown-css-class="select2-teal">
                 @isset($region)
					 @foreach ($region as $values)
					<option value="{{ $values['REGION_ID'] }}">{{ $values['REGION_NAME'] }} 	
					</option>
					@endforeach 
					@endisset
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
                <h3 class="card-title">Create Zone</h3>
				 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" action="{{route('zone.store')}}" method="POST">
			  {{ csrf_field() }}
                <div class="card-body">
				<div class="form-group row">
                    <label  class="col-sm-4 col-form-label">Zone</label>
                    <div class="col-sm-8">
                      <input class="form-control" name="zone_name" value="" placeholder="Zone">
                    </div>
                  </div>
		<div class="form-group row select2-teal">
          <label class="col-sm-4 col-form-label">Region</label>
          <div class="col-sm-8">
            <select class="select2" name="region_name[]" multiple="multiple" data-placeholder="Select Regions" data-dropdown-css-class="select2-teal" required>
              @isset($region)
					 @foreach ($region as $valuess)
					<option value="{{ $valuess['REGION_ID'] }}">{{ $valuess['REGION_NAME'] }} 	
					</option>
					@endforeach 
					@endisset
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
				
    
			  
			  <div class="card-body">
			 
			  <table id="zone" class="table table-bordered table-hover">
			  <thead>
                
				  
                  <tr> 
                        <th>Zone</th>
                       <th>Regions</th>
                        <th>Action</th>
                        <th>Status</th>
                        
                    </tr>
                  </thead>
                  <tbody>
				  @isset($details)
				  @foreach ($details as $value)
				  <tr>
					<td>{{ $value['ZONE_NAME'] }}</td>
					<td>
					@foreach ($value['REGION'] as $region_name)
          <span class='badge badge-secondary'>{{ $region_name['REGION_NAME'] }} </span>
					@endforeach
					</td>
					<td> 
					 @php
				$zone = json_encode($value);
				@endphp
				
					   <a class='btn btn-warning btn-sm zone' href='#' value="{{$zone}}" id="{{$value['ZONE_ID']}}" title="Edit">
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
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>

@endsection