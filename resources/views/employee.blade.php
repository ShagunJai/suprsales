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



<div class="modal fade text-left" id="vie">
{{-- It is use for the submit function --}}
  <script>
    //It calls on click function at the time reset password the element get by employee_id
    $("body").on("click", ".reset", function(event) {
      var emp = $(this).attr("id");
      document.getElementById("employee_id").value = emp;
    });
  </script>

  <div class="modal-dialog">
    <div class="modal-content" style="width: 700px; height:100px;">

      {{-- This is the Reset Password Btn inside the Action bar --}}
      <div class="card card-info">
        <div class="card-header">
          <h3 class="card-title">Reset Password</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

       {{-- It generates a random string and store the value in $empss --}}
        @php
        $empss = Str::random(60);
        @endphp


        {{-- This is form inside the reset password btn for update and reset the new password --}}
        <form class="form-horizontal" action="{{route('empss.update',$empss)}}" method="POST">
          {{ csrf_field() }}
          {{ method_field('PUT') }}

          <div class="card-body">

            {{-- Employee Id shows inside the reset password form --}}
            <div class="form-group row">
              <label for="inputName" class="col-sm-4 col-form-label">Employee ID</label>
              <div class="col-sm-8">
                <input class="form-control" name="emp_id" id="employee_id" value="" readonly>
              </div>
            </div>


            <div class="form-group row">
              <label for="inputName" class="col-sm-4 col-form-label">New Password</label>
              <div class="col-sm-8">
                <input type="password" class="form-control" name="password" placeholder="Enter Password">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputSkills" class="col-sm-4 col-form-label">Confirm Password</label>
              <div class="col-sm-8">
                <input type="password" class="form-control" name="password_confirmation" placeholder="Renter Password">
              </div>
            </div>
          </div>
          <div class="card-footer">
            {{-- For update the new password as reset btn and if Cancel thn cancel btn inside Reset Password form --}}
            <button type="submit" class="btn btn-info float-right">Reset</button>
            <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
          </div>


        </form>


      </div>

    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>




{{-- This is the Edit Btn inside the Action tabil --}}

<div class="modal fade text-left dataModal" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content" style="width: 700px; height:100px;">
      <div class="card card-success">
        <div class='card-header'>
          <h3 class='card-title'>Edit Employee Details</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        {{-- This is the form for Edit employee details --}}
        <form class="form-horizontal" id="employee_form" method="POST">




            <div class="card-body">
            <div class="form-group row">
              <label class="col-sm-4 col-form-label">Employee ID</label>
              <div class="col-sm-8">
                <input id="employees_id" class="form-control" value=""  readonly>
              </div>
            </div>

            <div class="form-group row select2-teal">
              <label class="col-sm-4">Name</label>
              <div class="col-sm-8">
                <input id="emp_name" class="form-control" value="" readonly>
              </div>
            </div>

            <div class="form-group row select2-teal">
              <label class="col-sm-4">Mobile</label>
              <div class="col-sm-8">
                <input id="emp_mobile" class="form-control" value="" readonly>
              </div>
            </div>
           <!-- This is the tag for the reporting manager -->
           {{-- We selected the EMP_NAME from the list and we set the Query to change Employee name to employee id at the time of update --}}
            <div class="form-group row select2-teal">
                <label  class="col-sm-4 col-form-label">Reporting Manager</label>
                  <div class="col-md-8">
                    <select class="select2" name="rep_mgr" id="rep_mgr" style="width: 100%;" data-dropdown-css-class="select2-teal" required>
                       @isset($admins)
                        @foreach ($admins as $valuess)
                          <option value="{{ $valuess['EMP_NAME'] }}">{{ $valuess['EMP_NAME'] }}</option>
                        @endforeach
                       @endisset
                    </select>
                  </div>
            </div>
           <!-- This is the tag for the Area -->
            <div class="form-group row select2-teal">
              <label class="col-sm-4">Area</label>
              <div class="col-sm-8">
                <input id="emp_area" class="form-control" value="" readonly>
              </div>
            </div>
           <!-- This is the tag for the Region -->
            <div class="form-group row select2-teal">
              <label class="col-sm-4">Region</label>
              <div class="col-sm-8">
                <input id="emp_region" class="form-control" value="" readonly>
              </div>
            </div>
           <!-- This is the tag for the Level -->
            <div class="form-group row select2-teal">
              <label class="col-sm-4">Level</label>
              <div class="col-sm-8">
                <input id="emp_level" class="form-control" value="" readonly>
              </div>
            </div>
           <!-- This is the tag for the Approver and the value get from $admins which contain the data -->
           {{-- We selected the EMP_NAME from the list and we set the Query to change Employee name to employee id at the time of update --}}
           <div class="form-group row select2-teal">
              <label class="col-sm-4">Approver</label>
              <div  class="col-sm-8">
                <select class="select2" name="emp_approver" id="emp_approver" style="width: 100%;" data-dropdown-css-class="select2-teal" required>
                 @isset($admins)
                  @foreach ($admins as $approver_values)
                    <option value="{{ $approver_values['EMP_NAME'] }}">{{ $approver_values['EMP_NAME'] }}</option>
                  @endforeach
                 @endisset
                </select>
              </div>
            </div>
           <!-- This is the tag for the Plant -->
            <div class="form-group row select2-teal">
              <label class="col-sm-4">Plant</label>
              <div class="col-sm-8">
                <input id="emp_plant" class="form-control" value="" readonly>
              </div>
            </div>
           <!-- This is the tag for the Vehicle Ownership -->
            <div class="form-group row">
              <label class="col-sm-4 col-form-label">Vehicle Ownership</label>
              <div class="col-sm-8">
                <select class="select2" name="ownership" id="ownership" style="width: 100%;" data-dropdown-css-class="select2-teal" required>
                  <option value="1">Company</option>
                  <option value="2">Self</option>
                  <option value="0">None</option>
                </select>
              </div>
            </div>
 <!-- This is the tag for the Vehicle Type -->
            <div class="form-group row">
              <label class="col-sm-4 col-form-label">Vehicle Type</label>
              <div class="col-sm-8">
                <select class="select2" name="vehicle_type" id="vehicle_type" style="width: 100%;" data-dropdown-css-class="select2-teal" required>
                  <option value="1">Car</option>
                  <option value="2">Motorcycle</option>
                  <option value="0">None</option>
                </select>
              </div>
            </div>

          </div>

          {{-- TO update the edited employee details --}}
          <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" class="btn btn-success float-right">Update</button>
            <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


{{-- This is for LogIn details  and shows the LogIn details form for the employees with LogIn ,LogOut, LogInDevice --}}
<div class="modal fade text-left" id="logins" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content" style="width: 900px; height:100px;">
      <div class="card card-warning">
        <div class='card-header'>
          <h3 class='card-title'>Login Details</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" id="login_detail">
        </div>
      </div>
    </div>
  </div>
</div>



<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Employee</h1>
      </div>
      {{-- This is the lonk of Home Btn beside it shows in which page we are --}}
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('dashboard.index')}}">Home</a></li>
          <li class="breadcrumb-item active">Employee</li>
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


          {{-- This is the table heading inside the all employees --}}
          <div class="card-body">

            <table id="employee" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th></th>
                  <th>Employee Code</th>

                  <th>Name</th>
                  <th>Email</th>
                  <th>Action</th>
                  <th>View</th>
                  <th class="text-center">
                    Status
                  </th>

                </tr>
              </thead>
              <tbody>
                {{-- Get the employees details from the API and store the details inside $admins --}}
                @isset($admins)
                @foreach ($admins as $value)

                <tr>
                  <td> </td>

                  {{-- It gives the Employee ID from API --}}
                  <td>{{ $value['EMP_CODE'] }}</td>


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
                      {{-- For the FLag 1 users the eye btn is enable otherwise it is disable --}}
                    <div class="btn-group btn-group-sm">
                      @if($value['FLAG'] =='1')
                      <a class='btn btn-info reset' href='#' id="{{$value['EMP_ID']}}" data-target="#vie" data-toggle="modal" title="reset password">
                        <i class='fa fa-key'></i></a>
                      @else
                      <a class='btn btn-info reset disabled' href='#' id="{{$value['EMP_ID']}}" data-target="#vie" data-toggle="modal" title="reset password">
                        <i class='fa fa-key'></i></a>
                      @endif
                    {{-- It encode the value as Admins and store in $emp_record in json format --}}
                      @php
                      $emp_record = json_encode($value);
                      @endphp

                      {{-- For the FLag 1 users the edit btn is enable otherwise it is disable --}}
                      @if($value['FLAG'] =='1')
                      <a class='btn btn-success view_data' href='#' value="{{$emp_record}}" id="view1_{{$value['EMP_ID']}}" title="View/Edit Employee Details">
                        <i class='fas fa-edit'></i>
                      </a>
                      @else
                      <a class='btn btn-success view_data disabled' href='#' value="{{$emp_record}}" id="view1_{{$value['EMP_ID']}}" title="View/Edit Employee Details">
                        <i class='fas fa-edit'></i>
                      </a>
                      @endif
                       {{-- For the FLag 1 users the login btn is enable otherwise it is disable define by EMP_ID --}}
                      @if($value['FLAG'] =='1')
                      <a class='btn btn-warning login_details' href='#' id="{{$value['EMP_ID']}}_Desktop" title="login details">
                        <i class='fas fa-sign-in-alt'></i>
                      </a>
                      @else
                      <a class='btn btn-warning login_details disabled' href='#' id="{{$value['EMP_ID']}}_Desktop" title="login details">
                        <i class='fas fa-sign-in-alt'></i>
                      </a>
                      @endif

                    </div>
                  </td>
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
@endsection
