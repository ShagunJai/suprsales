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
            <h1>My Announcements</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard.index')}}">Home</a></li>
              <li class="breadcrumb-item active">My Announcements</li>
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
			
			  <div class="modal fade text-left imageModal">
        <div class="modal-dialog">
          <div class="modal-content" style="height: 100px;">
           
                 <div class="card card-info">
              <div class="card-header select2-info">
                <h3 class="card-title">Announcement Image</h3>
				 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              </div>
      
            
                <div class="modal-body" id="annimage" align="center">
				
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
      <form role="form-horizontal"  method="POST" enctype="multipart/form-data">
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
										<option value="{{ $val['ANNOUNCEMENT_ID'] }}">{{ $val['ANNOUNCEMENT_TYPE'] }}</option>
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
                        <input type="text" class="form-control datetimepicker-input" name="announcement_valid_from" data-target="#reservationdate" placeholder="Start Date"/>
                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>                                       
                                    </div>
                                  </div>
                                   
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Valid To</label>
                                        <div class="col-sm-8">
                                              <div class="input-group date" id="ann-valid-till-reservationdate" data-target-input="nearest">
                        <input type="text" name="announcement_valid_to" class="form-control datetimepicker-input" data-target="#reservationdate" placeholder="End Date"/>
                        <div class="input-group-append" data-target="#ann-valid-till-reservationdate" data-toggle="datetimepicker">
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
			 
			  <table id="myan" class="table table-bordered table-hover" >
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
                  @isset($announcement)
                  @foreach ($announcement as $value)
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
						 @php
				$images = json_encode($value);
				@endphp
						 <div class="btn-group btn-group-sm">
						  @if($value['FLAG'] =='1') 
                          <a class='btn btn-info btn-sm images' href='#' value="{{$images}}" id="{{$value['ANNOUNCE_ID']}}" title='image'>
                            <i class='fas fa-image'></i>    
                         </a> 
						 @else
						<a class='btn btn-info btn-sm images disabled' href='#' value="{{$images}}" id="{{$value['ANNOUNCE_ID']}}" title='image'>
                            <i class='fas fa-image'></i>    
                         </a>  
						@endif
	
			 
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
			@empty($announcement)
			<script>toastr.warning("No records found.");</script>
			@endempty
</tbody>
</table>

</div>			  
                <!-- <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
				  <th></th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
				  <td></td>
                    <td>Bhushan Navneet Shinde</td>
                    <td>abc@example.com
                    </td>
                    <td>7588319972</td>
                    <td> 4</td>
                    
                  </tr>
                  <tr>
				  <td></td>
                    <td>VINOTH PALANIVEL</td>
                    <td>v.palanivel@iilindia.co.in
                    </td>
                    <td>8754262191</td>
                    <td>5</td>
                    
                  </tr>
                  <tr>
				  <td></td>
                    <td>Vipin Kumar</td>
                    <td>abc@example.com
                    </td>
                    <td>9690827718</td>
                    <td>5.5</td>
                    
                  </tr>
                  <tr>
				  <td></td>
                    <td>VINOTH PALANIVEL</td>
                    <td>v.palanivel@iilindia.co.in
                    </td>
                    <td>8754262191</td>
                    <td>5</td>
                    
                  </tr>
				  <tr>
				  <td></td>
                    <td>Vipin Kumar</td>
                    <td>abc@example.com
                    </td>
                    <td>9690827718</td>
                    <td>5.5</td>
                    
                  </tr>
                  <tr>
				  <td></td>
                    <td>Bhushan Navneet Shinde</td>
                    <td>abc@example.com
                    </td>
                    <td>7588319972</td>
                    <td> 4</td>
                    
                  </tr>
				  <tr>
				  <td></td>
                    <td>Bhushan Navneet Shinde</td>
                    <td>abc@example.com
                    </td>
                    <td>7588319972</td>
                    <td> 4</td>
                    
                  </tr>

            
                  
                  </tbody>
                  <tfoot>
                  <tr>
				  <th></th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Action</th>
                    
                  </tr>
                  </tfoot>
                </table>
             -->
			  
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