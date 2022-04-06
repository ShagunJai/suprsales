{{-- It is use for the header footer sidebar --}}
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
{{-- It is for create Module inside Authorization --}}
 <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Create Module Reference</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              {{-- It is the link of Home btn top right corner --}}
              <li class="breadcrumb-item"><a href="{{ route('dashboard.index')}}">Home</a></li>
              <li class="breadcrumb-item active">Module</li>
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




         <div class="modal fade text-left moduleModal">
        <div class="modal-dialog">
          <div class="modal-content" style="width: 600px; height: 100px;">
  {{-- It is for the edit btn inside the Action bar inside create Module tab --}}

                <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Update Module</h3>
				 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              </div>
 {{-- This form will popup after clicking the edit btn --}}
      <form class="form-horizontal" id="insert_form" method="POST">

                <div class="card-body">
           <!-- This is the tag for the Module Name -->
				<input type="hidden" name="module_id" id="module_Id" class="form-control"  value="">
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-4 col-form-label">Module Name</label>
                    <div class="col-sm-8">
                      <input name="module_name" id="name" class="form-control"  value="">
                    </div>
                  </div>
                           <!-- This is the tag for the Description -->
				  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-4 col-form-label">Description</label>
                    <div class="col-sm-8">
                      <input name="module_description" id="desc" class="form-control"  value="">
                    </div>
                  </div>
                     <!-- This is the tag for the Module Path -->
				  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-4 col-form-label">Module Path</label>
                    <div class="col-sm-8">
                      <input  class="form-control" id="path" placeholder="" readonly>
                    </div>
                  </div>
                  <!-- This is the tag for the Activate btn on/off -->
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-4 col-form-label">Activate</label>
                    <div class="col-sm-8">
                 {{-- It is for the Activate  check box --}}
                    <input type="checkbox" name="flag" id="flag" class="flag" data-bootstrap-switch data-off-color="danger" data-on-color="success" value="">
                       </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    {{-- TO submit the form with Update --}}
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
             {{-- blue color Create btn on the top of the table --}}
                <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Create Module Reference</h3>
				 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
    {{-- It shows on click of blue color Create btn on the top of the table --}}
              <form role="form-horizontal" action="{{route('mods.store')}}" method="POST">
             {{-- generate the hidden input field in the HTML form --}}
			 {{ csrf_field() }}
                <div class="card-body">
				<div class="form-group row">
            <!-- This is the tag for the Module Name -->
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Module Name</label>
                    <div class="col-sm-8">
                      <input class="form-control" name="module_name" placeholder="Module Name" required>
                    </div>
                  </div>
           <!-- This is the tag for the Module Description -->
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-4 col-form-label">Module Description</label>
                    <div class="col-sm-8">
                      <input class="form-control" name="module_description" placeholder="Description" required>
                    </div>
                  </div>
             <!-- This is the tag for the Module Path -->
				  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Module Path</label>
                    <div class="col-sm-8">
                      <input class="form-control" name="module_path" placeholder="Module Path" required>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->

                <!-- /.card-footer -->
        {{-- TO submit the form with Create it will submit the form  --}}
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

   {{-- It it will show the data inside the table after clicking the Create Module --}}

			  <div class="card-body">

			  <table id="module" class="table table-bordered table-hover" >
			  <thead>


                  <tr>

                        <th>Module Name</th>
                        <th >Module Description</th>
                        <th >Module Path</th>
                        <th>Action</th>
                        <th>Status</th>


                    </tr>
                  </thead>
                  <tbody>
 {{-- $admins contain Module_id, Module_name and Module_details and get from the ModuleController.php --}}
				  @isset($admins)
				  @foreach ($admins as $value)
            <tr>

			 <td>{{ $value['MODULE_NAME'] }}</td>
					<td>{{ $value['MODULE_DESCRIPTION'] }}</td>
					<td>{{ $value['MODULE_PATH'] }}</td>
					<td>


					 @php
				$module = json_encode($value);
				@endphp

					   <a class='btn btn-warning btn-sm module' href='#' value="{{$module}}" id="{{$value['MODULE_ID']}}" title="Edit">
                             <i class='fas fa-edit'></i>
                          </a>

			   </td>
           {{-- IF the FLAG value is 1 then the employee is Activated otherwise it is Deactivated  --}}
			   @if($value['FLAG'] =='1')
						<td class='project-state'>
                          <span class='badge badge-success'>Activated</span>
                      </td>
		@else
						<td class='project-state'>
                          <span class='badge badge-danger'>Deactivated</span>
                      </td>
		@endif
		 @endforeach
		 @endisset
          {{-- If there is no match wih the data inside $admins it will show No RECORD --}}
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
