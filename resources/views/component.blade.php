
@extends('layouts.app')
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

 <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Create Ticket Component</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard.index')}}">Home</a></li>
              <li class="breadcrumb-item active">Ticket Component</li>
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




         <div class="modal fade text-left compModal">
        <div class="modal-dialog">
          <div class="modal-content" style="width: 600px; height: 100px;">

                <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Update Component</h3>
				 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              </div>


		    <!--form id="screen_form" set akrn h-->

      <form class="form-horizontal" id="comp_form" method="POST">
            {{ csrf_field() }}
			  {{ method_field('PUT') }}
                <div class="card-body">
				<input type="hidden" name="comp_id" id="comp_Id" class="form-control"  value="">
                   <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-4 col-form-label">Component Name</label>
                    <div class="col-sm-8">
                      <input class="form-control"  name="comp_name" id="comp_name" value="">
                    </div>
                  </div>
				  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-4 col-form-label">Description</label>
                    <div class="col-sm-8">
                      <input  class="form-control" name="comp_description" id="comp_description" value="">
                    </div>
                  </div>


		<div class="form-group row select2-teal">
                  <label class="col-sm-4 col-form-label">Component Owner</label>
			 <div class="col-sm-8">
           <select class="select2" name="comp_owner" id="comp_owner" style="width: 100%;" data-dropdown-css-class="select2-teal" required>
                   @foreach ($emp as $valuee)
				<option value="{{ $valuee['EMP_ID'] }}">{{ $valuee['EMP_NAME'] }}</option>
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



              <div class="modal fade" id="component-default">
        <div class="modal-dialog">
          <div class="modal-content" style="width: 600px; height: 100px;">

                <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Create Component</h3>
				 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
             <form role="form-horizontal" action="{{route('component.store')}}" method="POST">
			 {{ csrf_field() }}
                <div class="card-body">
				<div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Component Name</label>
                    <div class="col-sm-8">
                      <input class="form-control" name="comp_name" placeholder="Component Name" required>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-4 col-form-label">Description</label>
                    <div class="col-sm-8">
                      <input class="form-control" name="comp_description" placeholder="Description" required>
                    </div>
                  </div>
		 <div class="form-group row select2-teal">
          <label class="col-sm-4 col-form-label">Component Owner</label>
          <div class="col-sm-8">
            <select class="select2" name="emp_name" data-dropdown-css-class="select2-teal" required>
			<option value="" selected>Select Employee</option>
			 @foreach ($emp as $valu)
				<option value="{{ $valu['EMP_ID'] }}">{{ $valu['EMP_NAME'] }}</option>
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





			  <div class="card-body">

			  <table id="component" class="table table-bordered table-hover" >
			  <thead>
        <tr>

                        <th>Component Name</th>
                        <th>Component Description</th>
                       <th>Component Owner</th>
                        <th>Action</th>
                        <th>Status</th>

                    </tr>
                  </thead>


					 <tbody>
					 @isset($admins)
					@foreach ($admins as $value)
            <tr>

			 <td>{{ $value['COMPONENT_NAME'] }}</td>
					<td>{{ $value['COMPONENT_DESCRIPTION'] }}</td>
					<td>{{ $value['COMPONENT_OWNER_NAME'] }}</td>
					<td>
					 @php
				$comp = json_encode($value);
				@endphp

					   <a class='btn btn-warning btn-sm comp' href='#' value="{{$comp}}" id="{{$value['COMPONENT_ID']}}" title="Edit">
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
