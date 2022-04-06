{{-- It is for layout header, footer and sidebar --}}
@extends('layouts.app')
{{-- Main section is for the content when the working shows --}}
@section('content')

  {{-- It is for veryfy the customer and verified by their ids --}}

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

{{-- This tab is for Material Group inside Product --}}
 <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Material Group</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                {{-- It give the link to home page in the top right corner --}}
              <li class="breadcrumb-item"><a href="{{ route('dashboard.index')}}">Home</a></li>
              <li class="breadcrumb-item active">Material Group</li>
            </ol>
          </div>
        </div>
		<br>
		<div class="row"><small>&nbsp;&nbsp;<ion-icon name="water" color="primary"></ion-icon>&nbsp;Liquid&nbsp;&nbsp;&nbsp;<ion-icon name="layers" color="success"></ion-icon>&nbsp;Unit&nbsp;&nbsp;&nbsp;<ion-icon name="apps" color="warning"></ion-icon>&nbsp;Dust</small></div>

      </div><!-- /.container-fluid -->
    </section>
    <section class="content">
      <div class="container-fluid">
            <!-- /.row -->

		<div class="row">
          <div class="col-12">
    <div class="card">

{{-- This is for the edit btn inside the table but there is not edit btn shown in the UI --}}
	   <div class="modal fade text-left materialModal">
        <div class="modal-dialog">
          <div class="modal-content" style="width: 600px; height: 100px;">
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Edit Material Group</h3>
				 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

      <form class="form-horizontal" id="material_form" method="POST">

            <div class="card-body">
				<input type="hidden" name="group_id" id="group_id" class="form-control"  value="">
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Group ID</label>
                   <div class="col-sm-8">
                    <input name="GROUP_ID" id="GROUP_ID" class="form-control">
                   </div>
                </div>

				<div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Group Name</label>
                   <div class="col-sm-8">
                    <input name="GROUP_NAME" id="GROUP_NAME" class="form-control">
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

{{-- This is for the table data and table heading --}}
			  <div class="card-body">

			  <table id="material" class="table table-bordered table-hover" >
			  <thead>
                  <tr>
				    <th>Group ID</th>
                    <th>Group Name</th>
                    <th>Category</th>
                   	<th>SKU</th>
					<th>Status</th>
                  </tr>
                  </thead>
                  <tbody>
              {{-- //$mat contain GROUP_ID","GROUP_NAME","CATEGORY_ID","CATEGORY","SKU",FLAG
          //$mat get from the materiagroupController.php --}}
			   @isset($mat)
				 @foreach ($mat as $value)
            <tr>

                  {{-- This is for Group ID tab contain all GROUP_ID  --}}
					<td>{{$value['GROUP_ID']}}</td>
                 {{-- This is for Group Name tab contain all GROUP_NAME  --}}
					<td>{{$value['GROUP_NAME']}}</td>
					@if (empty($value['CATEGORY'] ))
				<td>
			  <div class="text-primary text-lg" title="Undefined Category"><ion-icon name="help-outline"></ion-icon>

                   </div>   </td>
				   @else
                   {{-- It define the CATEGORY in the category tab --}}
             @if ($value['CATEGORY'] =='LIQUID')
							<td>
			  <div class="text-primary text-lg" title="Liquid"><ion-icon name="water"></ion-icon>

                   </div>   </td>
						@elseif ($value['CATEGORY'] =='UNIT')
							<td> <div class="text-success text-lg" title="Unit"><ion-icon name="layers"></ion-icon>
                    </div>  </td>
						@elseif ($value['CATEGORY'] =='DUST')
							 <td><div class="text-warning text-lg" title="Dust"><ion-icon name="apps"></ion-icon>
                 </div>    </td>
						@endif
			@endif

					 <td>
                         {{-- IT is for the SKU column and it shows the SKU value with a box --}}
					  @php
			$material = $value['GROUP_ID'];
			@endphp
            {{-- After clicking the sku it will redirect to  packging SKU tab  and the blade file name is sku.blade.php --}}
					 <a class='btn btn-warning btn-app btn-xs' href="{{ route('material.show',$material)}}" style="height:25px; max-width:1%; padding-left:0px; padding-right:0px;" title='View Packaging SKU'>
                      <b>{{$value['SKU']}}</b>
                          </a>
                      </td>
            {{-- It is for the status Column as the FLAG value it shows Activated or Deactivated --}}
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
             {{-- if there is no record inside the $mat it shows No records found --}}
			@empty($mat)
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
