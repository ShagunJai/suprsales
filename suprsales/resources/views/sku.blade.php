@extends('layouts.show_by_id')
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
		  <div class="row">
            <h1>Packaging SKU</h1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<button class="btn btn-info"><a href="Javascript:history.go(-1);Location.reload()" class="text-white"><i class="fas fa-arrow-alt-circle-left"></i> Go Back</a></button>
           
			</div>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard.index')}}">Home</a></li>
              <li class="breadcrumb-item active">Packaging SKU</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
 <section class="content">
      <div class="container-fluid">
        
            
			
			
            <!-- /.row -->
    
		<div class="row">
          <div class="col-12">		
    <div class="card">
    
	     
	
			  
			  <div class="card-body">
			 
			  <table id="sku" class="table table-bordered table-hover" >
			  <thead>
                  <tr>
				    <th>Code</th>
                    <th>Description</th>
                    <th>Group ID</th>
                    
					<th>Unit</th>
					<th>Factor</th>
					
					<th>Status</th>
					
                  </tr>
                  </thead>
                  <tbody>
			  @isset($sk)
				 @foreach ($sk as $value)  
            <tr>
			 
             
					<td>
						{{$value['SKU_ID']}}	
							</td>		
						
			
					<td>{{$value['SKU_DESCRIPTION']}}</td>
					<td>{{$value['GROUP_ID']}}</td>
					<td>{{$value['UNIT']}}</td>
					<td>{{$value['FACTOR']}}</td>
					
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
			@empty($sk)
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