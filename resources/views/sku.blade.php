{{-- It is for layout header, footer and sidebar --}}
@extends('layouts.show_by_id')
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
{{-- This tab is for Packaging SKU inside SKU column inside Material Group tab Product --}}
{{-- It shows SKU details after clicking SKU values --}}
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
                {{-- It give the link to home page in the top right corner --}}
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




{{-- This is for the table data and table heading --}}
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
                      {{-- $sk contain all the SKU detalis get from from APi and define in MaterialGroupController.php  --}}
			  @isset($sk)
				 @foreach ($sk as $value)
            <tr>


					<td>

                  {{-- This is for Code tab contain all SKU_ID  --}}
						{{$value['SKU_ID']}}
							</td>


                  {{-- This is for Description ID tab contain all SKU_DESCRIPTION  --}}
					<td>{{$value['SKU_DESCRIPTION']}}</td>
                  {{-- This is for Group ID tab contain all GROUP_ID  --}}
					<td>{{$value['GROUP_ID']}}</td>
                  {{-- This is for Unit tab contain all UNIT  --}}
					<td>{{$value['UNIT']}}</td>
                  {{-- This is for Factor tab contain all FACTOR  --}}
					<td>{{$value['FACTOR']}}</td>

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
             {{-- if there is no record inside the $sk it shows No records found --}}
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
