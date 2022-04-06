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

{{-- This is for Packaging Unit inside the sidebar product tab  --}}
 <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Packaging Unit</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                {{-- It give the link to home page in the top right corner --}}
              <li class="breadcrumb-item"><a href="{{ route('dashboard.index')}}">Home</a></li>
              <li class="breadcrumb-item active">Packaging Unit</li>
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
			  <div class="card-body">
			  <table id="packing" class="table table-bordered table-hover" >
			  <thead>
          {{-- It is the table head in  row wise inside My Stocks  --}}
                    <tr>
                        <th class="text-center">Packaging Size</th>
						<th class="text-center">Packaging Unit</th>
                        <th class="text-center">Category</th>
                    </tr>
                </thead>

                  <tbody>
                {{-- $admins contain UNIT_VALUE","UNIT_TYPE","CATEGORY_NAME" and get from PackingController.php--}}
  				@isset($admins)
                  {{-- For each $admin values set $values --}}
     			@foreach ($admins as $value)

            <tr>
                 {{-- This is for Packaging Size tab contain all UNIT_VALUE  --}}
			 <td>{{ $value['UNIT_VALUE'] }}</td>
                 {{-- This is for Packaging Unit tab contain all UNIT_TYPE  --}}
			 <td>{{ $value['UNIT_TYPE'] }}</td>
             {{-- here if use to define category  --}}
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


		 @endforeach

		@endisset
         {{-- If there is no record it shows at first that No records found --}}
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





