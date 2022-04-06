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

 @isset($emp)
		 @foreach ($emp as $value)
		  @php
		   $emid = $value['EMP_ID'];

		  @endphp
	       @break
		 @endforeach
      @endisset
<section>
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-9">
		 <div class="row">

            <h1>Attendance Regularity</h1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<!-- <button class="btn btn-info"><a href="Javascript:history.go(-1);Location.reload()" class="text-white"><i class="fas fa-arrow-alt-circle-left"></i> Go Back</a></button> -->

			</div>
          </div>
          <div class="col-sm-3">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard.index')}}">Home</a></li>
              <li class="breadcrumb-item active">Attendance Regularity</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
@if(isset(Auth::user()->id))


    <section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">


          {{-- This is the table heading inside the all employees --}}
          <div class="card-body">

            <table id="atnreg_table" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th></th>
                  <th>Employee Name</th>
                  
                  <th>Date</th>
                  
                  <th>Action</th>
                  <th class="text-center">Status</th>

                </tr>
              </thead>
              <tbody>
                {{-- Get the employees details from the API and store the details inside $admins --}}
                @isset($admins)
                @foreach ($admins as $value)

                <tr>
                  <td> </td>

                  {{-- It gives the Employee ID from API --}}
                  <td>{{ $value['EMP_NAME'] }}</td>


                  <td>
                    {{-- inside the name column It shows permanent or contract --}}
                    @if ($value['EMP_CONTRACT_TYPE'] =='0')
                    <span class='badge badge-secondary'>Permanent</span>
                    @elseif ($value['EMP_CONTRACT_TYPE'] =='1')

                    <span class='badge badge-primary'>Contract</span>
                    @endif
                    &nbsp;&nbsp;
                    {{ $value['EMP_NAME'] }}


                  </td>
                  {{-- It gives the Employee Email from API --}}
                  <td>{{ $value['EMP_EMAIL'] }}</td>

                  
                  <td>
            {{-- Value inside EMP_id Stored at $empss --}}
                    @php
                    $empss = $value['EMP_ID'];
                    @endphp
                      {{-- For the FLag 1 users the Customer is enable inside view  otherwise it is disable --}}
                    @if($value['FLAG'] =='1')
                    <a class='btn btn-warning btn-app btn-xs' href="{{ route('empss.show',$empss)}}" style="height:40px; max-width:1%; padding-left:0px; padding-right:0px;" title="View assigned customers">
                      <span class='badge bg-teal'>{{ $value['EMP_TOTAL_CUSTOMER'] }}</span>
                      <i class='fas fa-users'></i>Customers
                    </a>
                    @else
                    <a class='btn btn-warning btn-app btn-xs disabled' href="{{ route('empss.show',$empss)}}" style="height:40px; max-width:1%; padding-left:0px; padding-right:0px;" title="View assigned customers">
                      <span class='badge bg-teal'>{{ $value['EMP_TOTAL_CUSTOMER'] }}</span>
                      <i class='fas fa-users'></i>Customers
                    </a>
                    @endif

                  </td>

                      {{-- For the FLag 1 users the Activated is enable otherwise it is deActivated --}}
                  @if($value['FLAG'] =='1')
                  <td class='project-state'>
                    <span class='badge badge-success'>Activated</span>
                  </td>
                  @else
                  <td class='project-state'>
                    <span class='badge badge-danger'>Deactivated</span>
                  </td>
                  @endif
                  <td>{{ $value['EMP_ID'] }}</td>

                  <td>{{ $value['FLAG'] }}</td>
                </tr>
                @endforeach
                @endisset

                <!--  If there is no record when the search by the name or ID -->
                @empty($admins)
                <script>
                  toastr.warning("No records found.");
                </script>
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
@endif

@endsection
