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
            <h1>My Stocks</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard.index')}}">Home</a></li>
              <li class="breadcrumb-item active">Stock List</li>
            </ol>
          </div>
        </div>
		<br>
		<div class="row"><small>&nbsp;&nbsp;<ion-icon name="water" color="primary"></ion-icon>&nbsp;Liquid&nbsp;&nbsp;&nbsp;<ion-icon name="layers" color="success"></ion-icon>&nbsp;Unit&nbsp;&nbsp;&nbsp;<ion-icon name="apps" color="warning"></ion-icon>&nbsp;Dust</small></div>
      
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
			
			   <div class="modal fade" id="modal-def">
        <div class="modal-dialog">
          <div class="modal-content" style="width: 700px; height:100px;">
           
                <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Details</h3>
				 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal">
                <div class="card-body">
				<dl class="form-group row">
                  <dt class="col-sm-4">Product Type</dt>
                  <dd class="col-sm-8">Dust</dd>
                </dl>
				<dl class="form-group row">
                  <dt class="col-sm-4">Product ID</dt>
                  <dd class="col-sm-8">112345</dd>
                </dl>
				<dl class="form-group row">
                  <dt class="col-sm-4">Packaging</dt>
                  <dd class="col-sm-8">new packet</dd>
                </dl>
				<dl class="form-group row">
                  <dt class="col-sm-4">Description</dt>
                  <dd class="col-sm-8">new packet 1</dd>
                </dl>
				<dl class="form-group row">
                  <dt class="col-sm-4">Region</dt>
                  <dd class="col-sm-8">Delhi</dd>
                </dl>
                  <dl class="form-group row">
                  <dt class="col-sm-4">Plant</dt>
                  <dd class="col-sm-8">IIT</dd>
                </dl>
				 <dl class="form-group row">
                  <dt class="col-sm-4">Unit</dt>
                  <dd class="col-sm-8">14</dd>
                </dl>
				<dl class="form-group row">
                  <dt class="col-sm-4">Stock</dt>
                  <dd class="col-sm-8">500</dd>
                </dl>
				<dl class="form-group row">
                  <dt class="col-sm-4">Rate list</dt>
                  <dd class="col-sm-8">120</dd>
                </dl>
				<dl class="form-group row">
                  <dt class="col-sm-4">Updated at</dt>
                  <dd class="col-sm-8">Jan</dd>
                </dl>
                </div>
                <!-- /.card-body -->
                
                <!-- /.card-footer -->
              </form>
            </div>

               
              
           
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
	  
	  <div class="modal fade" id="modal-de">
        <div class="modal-dialog">
          <div class="modal-content" style="width: 700px; height:100px;">
           
                <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Edit Customer</h3>
				 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal">
                <div class="card-body">
				
				<div class="form-group row">
                    <label class="col-sm-4 col-form-label">Type</label>
                    <div class="col-sm-8">
                      <input type="email" class="form-control" placeholder="">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Name</label>
                    <div class="col-sm-8">
                      <input type="password" class="form-control" placeholder="">
                    </div>
                  </div>
				  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Address</label>
                    <div class="col-sm-8">
                      <input type="password" class="form-control" placeholder="">
                    </div>
                  </div>
				  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Phone</label>
                    <div class="col-sm-8">
                      <input type="password" class="form-control" placeholder="">
                    </div>
                  </div>
				  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Account</label>
                    <div class="col-sm-8">
                      <input type="password" class="form-control" placeholder="">
                    </div>
                  </div>
				 
				  <div class="card-footer">
                  <button type="submit" class="btn btn-warning float-right">Update</button>
                  <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                </div>
                </div>
                <!-- /.card-body -->
                
             
              </form>
            </div>

               
              
           
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
			  
			  <div class="card-body">
			  
			  <table id="stock" class="table table-bordered table-hover">
			  <thead>
                  <tr>
				  <th></th>
                    <th>SKU</th>
					
					<th>Description</th>
					<th>Region</th>
					<th>Plant</th>
					<th>Unit</th>
					<th>Stock</th>
					<th>Rate list</th>
					<th>Updated At <br><small>(dd-mm-yyyy)</small></th>
					
					
					 
                  </tr>
                  </thead>
                  <tbody>
				  @isset($admins)
				   @foreach ($admins as $value)
			 
            <tr>
			@if (empty($value['CATEGORY_NAME'] ))
				<td> 
			  <div class="text-primary text-lg" title="Undefined Category"><ion-icon name="help-outline"></ion-icon>
                       
                   </div>   </td>
				   @else
             @if ($value['CATEGORY_NAME'] =='LIQUID')
							<td> 
			  <div class="text-primary text-lg" title="Liquid"><ion-icon name="water"></ion-icon>
                       
                   </div>   </td>
						@elseif ($value['CATEGORY_NAME'] =='UNIT')
							<td> <div class="text-success text-lg" title="Unit"><ion-icon name="layers"></ion-icon>
                    </div>  </td>
						@elseif ($value['CATEGORY_NAME'] =='DUST')
							 <td><div class="text-warning text-lg" title="Dust"><ion-icon name="apps"></ion-icon> 
                 </div>    </td>
						@endif
			@endif
					<td>{{ $value['SKU_ID'] }}</td>
					<td>{{ $value['SKU_DESCRIPTION'] }}</td>
					<td>{{ $value['REGION_NAME'] }}</td>
					<td>{{ $value['PLANT_DESCRIPTION'] }}</td>
					<td>{{ $value['UNIT'] }}</td>
					<td>{{ $value['QUANTITY'] }}</td>
					<td><i class="fas fa-rupee-sign"></i> {{ $value['PRICE'] }}</td>
					<td>{{ \Carbon\Carbon::parse($value['UPDATED_ON'])->format('d/m/Y')}}</td>
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