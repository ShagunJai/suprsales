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
            <h1>Create Area</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard.index')}}">Home</a></li>
              <li class="breadcrumb-item active">Area</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
				@php
				$region_zone = json_encode($zone);
				@endphp
				<input type="hidden" value="{{$region_zone}}" id="region_zone">

 <section class="content">
      <div class="container-fluid">

	  <form action="{{route('area.store')}}" method="POST">
		 <div class="row">&nbsp;&nbsp;
			 {{ csrf_field() }}
			<div class="col-sm-4">
		<div class="form-group">

                  <select class="form-control select2"  name="zone" onchange="region_zones(event)" data-dropdown-css-class="select2-teal" style="width: 100%;">
                    <option selected="selected" value="null" disabled>Select Zone</option>
                     @isset($zone)
					 @foreach ($zone as $values)
					 @if($values['FLAG'] == '1')
					<option value="{{ $values['ZONE_ID'] }}">{{ $values['ZONE_NAME'] }}
					</option>
					@endif
					@endforeach
					@endisset
                  </select>
                </div>
				</div>

		<div class="col-sm-4">
		<div class="form-group">

                  <select class="form-control select2"  name="region" id="regionss" data-dropdown-css-class="select2-teal" style="width: 100%;" data-placeholder="Select Region">

                  </select>
                </div>
				</div>

				<div class="col">

		<div class="form-group">

                 <button type="submit"  class="btn btn-success">Submit</button>

                </div>
				</div>
				</div>
				</form>

        <div class="row">
          <div class="col-12">
            <div class="card">




         <div class="modal fade text-left areaModal">
        <div class="modal-dialog">
          <div class="modal-content" style="width: 600px; height: 100px;">

                <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Update Area</h3>
				 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              </div>




      <form class="form-horizontal" id="area_form" method="POST">

                <div class="card-body">
				<input type="hidden" name="area_id" id="area_Id" class="form-control"  value="">
                   <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-4 col-form-label">Zone</label>
                    <div class="col-sm-8">
                      <input  class="form-control"  id="zones" placeholder="" readonly>
                    </div>
                  </div>

				  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-4 col-form-label">Region</label>
                    <div class="col-sm-8">
                      <input  class="form-control"  id="regions" placeholder="" readonly>
                    </div>
                  </div>

				  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-4 col-form-label">Area</label>
                    <div class="col-sm-8">
                      <input class="form-control"  name="Area" id="Area" value="">
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
                <h3 class="card-title">Create Area</h3>
				 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
             <form role="form-horizontal" action="{{route('area.createarea')}}" method="POST">
			 {{ csrf_field() }}
                <div class="card-body">
				 <div class="form-group row select2-teal">
                  <label class="col-sm-4">Region</label>
				  <div class="col-sm-8">
						<select class="form-control select2" name="region_name" data-dropdown-css-class="select2-teal" required>
					 <option value="" selected>Select Region</option>
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
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Area</label>
                    <div class="col-sm-8">
                      <input class="form-control" name="area_name" placeholder="Area Name" required>
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

			  <table id="area" class="table table-bordered table-hover" >
			  <thead>
        <tr>


                        <th>Region</th>
						 <th>Area</th>
                        <th>Action</th>
                        <th>Status</th>

                    </tr>
                  </thead>
					 <tbody>
					 @isset($admins)
					@foreach ($admins as $value)
            <tr>

			 <td>{{ $value['REGION_NAME'] }}<br><span class="badge badge-primary">{{ $value['ZONE_NAME'] }}</span></td>

					<td>{{ $value['AREA_NAME'] }}</td>
					<td>
					 @php
				$areas = json_encode($value);
				@endphp

					   <a class='btn btn-warning btn-sm areas' href='#' value="{{$areas}}" id="{{$value['AREA_ID']}}" title="Edit">
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
