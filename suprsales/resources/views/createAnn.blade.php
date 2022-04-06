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
            <h1>Create Announcement</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard.index')}}">Home</a></li>
              <li class="breadcrumb-item active">Announcement</li>
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
			
			    <div class="modal fade text-left announceModal">
        <div class="modal-dialog">
          <div class="modal-content" style="width: 600px; height: 100px;">
           
                <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Update Announcement</h3>
				 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              </div>
          <input type="hidden" name="announce_id" id="announce_Id" class="form-control"  value="">
                 
      <form class="form-horizontal" id="announce_form" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
			{{ method_field('PUT') }}
                <div class="card-body">
				 
				 <div class="form-group row">
                    <label  class="col-sm-4 col-form-label">Name</label>
                    <div class="col-sm-8">
                      <input class="form-control" name="announcement_name" id="announcement_name" value="" required>
                    </div>
                  </div>
                  
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Description</label>
                    <div class="col-sm-8">
                      <input  class="form-control" name="announcement_description" id="announcement_description" value="" required>
                    </div>
                  </div>
				  <div class="form-group row select2-teal">
                                  <label class="col-sm-4 col-form-label">Type</label>
                                  <div class="col-md-8">
                                 
                                    <select class="form-control select2" name="announcement_id" id="announcement_id" style="width: 100%;" data-dropdown-css-class="select2-teal" required>
                                         @isset($type)
										 @foreach ($type as $valuess)
										<option value="{{ $valuess['ANNOUNCEMENT_ID'] }}">{{ $valuess['ANNOUNCEMENT_TYPE'] }}</option>
										@endforeach 
										@endisset
                                      </select>
                                  
                                  </div>
                  
                                </div>
                                
                                <div class="form-group row select2-teal">
                                  <label  class="col-sm-4 col-form-label">Region</label>
                                  <div class="col-md-8">
                                  
                                    <select class="form-control select2" name="region_id" id="region_id" style="width: 100%;" data-dropdown-css-class="select2-teal" required>
                                          @isset($region)
										 @foreach ($region as $values)
										<option value="{{ $values['REGION_ID'] }}">{{ $values['REGION_NAME'] }}</option>
										@endforeach 
                                      </select>
                                 @endisset
                                  </div>
                  
                                </div>

                <div class="form-group row">
                  <label  class="col-sm-4 col-form-label">Valid From</label>
                  <div class="col-sm-8">
                 
                        <div>
                          <input type="date" class="form-control" name="announcement_valid_from" id="announcement_valid_from" value="" required />
                        
                             
                  </div>
              </div>
              
                            </div>
                 
                  <div class="form-group row">
                      <label  class="col-sm-4 col-form-label">Valid To</label>
                      <div class="col-sm-8">
                     
                            <div>
                              <input type="date" name="announcement_valid_to" id="announcement_valid_to" class="form-control" value=""  required />
                             
                                 
                      </div>
                  </div>
                  
                                </div>
                            
									<div class="form-group row">
                                      <label  class="col-sm-4 col-form-label">Image</label>
                                      <div class="col-sm-8">
                                      
                                        <div class="custom-file">
                                          <input type="file" name="filename" id="filename" class="custom-file-input" value="">
                                          <label class="custom-file-label" id="file_img" for="exampleInputFile"></label>
                                        </div> 
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
			
			  <div class="modal fade text-left imgModal">
        <div class="modal-dialog">
          <div class="modal-content" style="height: 100px;">
           
                 <div class="card card-info">
              <div class="card-header select2-info">
                <h3 class="card-title">Announcement Image</h3>
				 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              </div>
      
            
                <div class="modal-body" id="annsimage" align="center">
				
                </div>
             
			 
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
                <h3 class="card-title">Create Announcement</h3>
				 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
      <form role="form-horizontal" action="{{route('announce.store')}}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="card-body">
				
				<div class="form-group row">
                    <label  class="col-sm-4 col-form-label">Name</label>
                    <div class="col-sm-8">
                      <input  name="announcement_name" class="form-control"  placeholder="Name" required>
                    </div>
                  </div>
                  
                  <div class="form-group row">
                    <label  class="col-sm-4 col-form-label">Description</label>
                    <div class="col-sm-8">
                      <input  name="announcement_description" class="form-control" placeholder="Description" required>
                    </div>
                  </div>
				  <div class="form-group row select2-teal">
                                  <label class="col-sm-4 col-form-label">Type</label>
                                  <div class="col-md-8">
                                 
                                    <select class="form-control select2" name="announcement_id" style="width: 100%;" data-dropdown-css-class="select2-teal" required>
                                         <option value="" selected>Select Announcement Type</option>
										 @isset($type)
										 @foreach ($type as $val)
										 @if($val['FLAG'] == '1')
										<option value="{{ $val['ANNOUNCEMENT_ID'] }}">{{ $val['ANNOUNCEMENT_TYPE'] }}</option>
									@endif
										@endforeach 
										@endisset
                                      </select>
                                  
                                  </div>
                  
                                </div>
                                
                                <div class="form-group row select2-teal">
                                  <label  class="col-sm-4 col-form-label">Region</label>
                                  <div class="col-md-8">
                                  
                                    <select class="form-control select2" name="region_id" style="width: 100%;" data-dropdown-css-class="select2-teal" required>
                                         <option value="" selected>Select Region</option>
										 @isset($region)
										 @foreach ($region as $valu)
										<option value="{{ $valu['REGION_ID'] }}">{{ $valu['REGION_NAME'] }}</option>
										@endforeach
										@endisset
                                      </select>
                                 
                                  </div>
                  
                                </div>
                                
								<div class="form-group row">
                                    <label  class="col-sm-4 col-form-label">Valid From</label>
                                    <div class="col-sm-8">
                                       <div class="input-group date" id="reservationdate" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" name="announcement_valid_from" data-target="#reservationdate" placeholder="Start Date" required />
                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>                                       
                                    </div>
                                  </div>
                                   
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Valid To</label>
                                        <div class="col-sm-8">
                                              <div class="input-group date" id="anndate" data-target-input="nearest">
                        <input type="text" name="announcement_valid_to" class="form-control datetimepicker-input" data-target="#anndate" placeholder="End Date" required />
                        <div class="input-group-append" data-target="#anndate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>        
                                             
                                                        
                                        </div>
                                    </div>
                                    
								
									<div class="form-group row">
                                      <label class="col-sm-4 col-form-label">Image</label>
                                      <div class="col-sm-8">
                                      
                                        <div class="custom-file">
                                          <input type="file" name="filename"  class="custom-file-input" />
                                          <label class="custom-file-label">Choose file</label>
                                        </div>                                 
									</div>
									</div>
				  
              
                <!-- /.card-body -->
              </div>
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
			 
			  <table id="announcement-table" class="table table-bordered table-hover" >
			  <thead>
                
				  
        <tr>
                         <th>Type</th>
						 <th>Title </th> 
                        <th>Description</th>
						<th>Region</th>
                        <th>Valid From <br><small>(dd-mm-yyyy)</small></th>
                        <th>Valid Till <br><small>(dd-mm-yyyy)</small></th>
                        <th>Action</th>
                        <th>Status</th>
                        
                    </tr>
               
                  </thead>
                  <tbody>
                  @isset($announc)
                  @foreach ($announc as $value)
                    <tr>
                   
                        
						
							<td>
							
								<span class='badge badge-secondary'>{{ $value['TYPE'] }}</span>
							</td>
						
						 <td>{{ $value['TITLE'] }}</td>
                        <td>{{ $value['DESCRIPTION'] }}</td>
						<td>{{ $value['REGION_NAME'] }}</td>
                        <td>{{ \Carbon\Carbon::parse($value['VALID_FROM'])->format('d/m/Y')}}</td>
                        <td>{{ \Carbon\Carbon::parse($value['VALID_TILL'])->format('d/m/Y')}}</td>
            
                        <td>
						 <div class="btn-group btn-group-sm">
                          @php
				$imgs = json_encode($value);
				@endphp
				
						 <div class="btn-group btn-group-sm">
						  @if($value['FLAG'] =='1')  
                          <a class='btn btn-info btn-sm img' href='#' value="{{$imgs}}" id="{{$value['ANNOUNCE_ID']}}" title='image'>
                            <i class='fas fa-image'></i>    
                         </a> 
						 @else
						 <a class='btn btn-info btn-sm img disabled' href='#' value="{{$imgs}}" id="{{$value['ANNOUNCE_ID']}}" title='image'>
                            <i class='fas fa-image'></i>    
                         </a>     
				@endif
						  @php
				$update_ann = json_encode($value);
				@endphp
				
					   <a class='btn btn-warning btn-sm updateann' href='#' value="{{$update_ann}}" id="{{$value['ANNOUNCE_ID']}}" title="Edit">
                             <i class='fas fa-edit'></i>       
                          </a>
                        
						
						 
						 </div>
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
			@empty($announc)
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