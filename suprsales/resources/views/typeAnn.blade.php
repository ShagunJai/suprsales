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
           <h1>Create Announcement Type</h1>
         </div>
         <div class="col-sm-6">
           <ol class="breadcrumb float-sm-right">
             <li class="breadcrumb-item"><a href="{{ route('dashboard.index')}}">Home</a></li>
             <li class="breadcrumb-item active">Announcement Type</li>
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
     
            
           <div class="modal fade text-left annModal">
        <div class="modal-dialog">
          <div class="modal-content" style="width: 600px; height: 100px;">
           
                <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Update Announcement Type</h3>
				 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              </div>
          
      <form class="form-horizontal" id="ann_form" method="POST">
            
                <div class="card-body">
				<input type="hidden" name="ann_id" id="ann_Id" class="form-control"  value="">
                 
				  <div class="form-group row">
                  <label  class="col-sm-4 col-form-label">Type</label>
                  <div class="col-sm-8">
                    <input  name="announcement_type" id="announcement_type" class="form-control"  value="">
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
         <div class="modal-content">


          <div class="card card-info">
             <div class="card-header">
               <h3 class="card-title">Create Announcement Type</h3>
        
          
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
             </button>
           </div>

</div>

          
            
            <form role="form-horizontal" action="{{route('announcetype.store')}}" method="POST">
              {{ csrf_field() }}
               <div class="card-body">
               <div class="form-group row">
                                 <label  class="col-sm-5 col-form-label">Announcement Type</label>
                                 <div class="col-sm-7">
                                   <input  name="announcement_type" class="form-control" id="ScreenName13" placeholder="Announcement Type" required>
                                 </div>
                               </div>
                              
                            </div>  
                              
                        
       
       
              <div class="card-footer">
                  <button type="submit" class="btn btn-info float-right">Create</button>
                  <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
                </div>
               <!-- /.card-body -->

               
            
             </form>
         
           
          
           
         </div>
         <!-- /.modal-content -->
       </div>
       <!-- /.modal-dialog -->
     </div>
             
       
     
       
       <div class="card-body">
      
       <table id="type-announcement" class="table table-bordered table-hover" >
       <thead>
       <tr>
                 
                       <th>Announcement Type</th>
                      
                       <th class="text-center">Action</th>
                    <th class="text-center">Status</th>
                   </tr>
                 </thead>
                 <tbody>
              @isset($admins)  
		 @foreach ($admins as $value)
     <tr>
							<td>{{ $value['ANNOUNCEMENT_TYPE'] }}</td>
		
         <td>
      
                  
               @php
				$announces = json_encode($value);
				@endphp
				
					   <a class='btn btn-warning btn-sm announces' href='#' value="{{$announces}}" id="{{$value['ANNOUNCEMENT_ID']}}" title="Edit">
                             <i class='fas fa-edit'></i>       
                          </a>
				 
				
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