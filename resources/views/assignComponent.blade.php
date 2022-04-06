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
            <h1>Assign Ticket Component</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard.index')}}">Home</a></li>
              <li class="breadcrumb-item active">Assign Ticket Component</li>
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
			
				 <div class="modal fade text-left assigncompModal">
        <div class="modal-dialog">
          <div class="modal-content" style="width: 600px; height: 100px;">
           
                <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Update Processor</h3>
				 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              </div>
          <input type="hidden" name="comp_id" id="comp_Id" class="form-control"  value="">
                
      <form class="form-horizontal" id="assign_comp_form" method="POST">
             {{ csrf_field() }}
			  {{ method_field('PUT') }}
                <div class="card-body">
				
				<div class="form-group row">
                    <label  class="col-sm-4 col-form-label">Component</label>
                    <div class="col-sm-8">
                      <input class="form-control" id="compo_name" value="" readonly>
                    </div>
                  </div>
		<div class="form-group row select2-teal">
          <label class="col-sm-4 col-form-label">Processors</label>
          <div class="col-sm-8">
            <select class="select2" multiple="multiple" name="proc_id[]" id="proc_id" data-placeholder="Select Processors" data-dropdown-css-class="select2-teal">
                 @isset($emp)
				@foreach ($emp as $values)
				<option value="{{ $values['EMP_ID'] }}">{{ $values['EMP_NAME'] }}</option>
				@endforeach 
				@endisset
              </select>
            
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
                <h3 class="card-title">Assign Ticket Component</h3>
				 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" action="{{route('assigncomponent.store')}}" method="POST">
			  {{ csrf_field() }}
                <div class="card-body">
				<div class="form-group row select2-teal">
          <label class="col-sm-4 col-form-label">Select Component</label>
          <div class="col-sm-8">
            <select class="select2" name="comp_name" data-dropdown-css-class="select2-teal" required>
			<option value="" selected>Select Component</option>
			  @isset($comp)
			 @foreach ($comp as $valu)
			 @if($valu['FLAG'] == '1')
				<option value="{{ $valu['COMPONENT_ID'] }}">{{ $valu['COMPONENT_NAME'] }}</option>
			@endif
				@endforeach 
                 @endisset
              </select>
          </div>
        </div>
		<div class="form-group row select2-teal">
          <label class="col-sm-4 col-form-label">Assign Processor</label>
          <div class="col-sm-8">
            <select class="select2" name="proc_name[]" multiple="multiple" data-placeholder="Select Employee" data-dropdown-css-class="select2-teal" required>
			 @isset($emp)
			 @foreach ($emp as $valu)
				<option value="{{ $valu['EMP_ID'] }}">{{ $valu['EMP_NAME'] }}</option>
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
                  <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
                </div>
              </form>
            </div>

               
              
           
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div> 
				
    
			  
			  <div class="card-body">
			 
			  <table id="assign_comp" class="table table-bordered table-hover">
			  <thead>
                
				  
                  <tr> 
                        <th>Component</th>
                       <th>Processors</th>
                        <th>Action</th>
                        
                        
                    </tr>
                  </thead>
                  <tbody>
				  @isset($details)
				  @foreach ($details as $value)
				  <tr>
					<td>{{ $value['COMPONENT_NAME'] }}</td>
					<td>
					@foreach ($value['PROCESSOR'] as $proc_name)
          <span class='badge badge-secondary'>{{ $proc_name['PROCESSOR_NAME'] }} </span>
					@endforeach
					</td>
					<td> 
					 @php
				$assign = json_encode($value);
				@endphp
				
					   <a class='btn btn-warning btn-sm assigncomp' href='#' value="{{$assign}}" id="{{$value['COMPONENT_ID']}}" title="Edit">
                             <i class='fas fa-edit'></i>       
                          </a>
			
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