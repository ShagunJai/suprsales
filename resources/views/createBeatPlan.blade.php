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


<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Create Beat Plan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard.index')}}">Home</a></li>
              <li class="breadcrumb-item active">Create Beat Plan</li>
            </ol>
          </div>
        </div>
      </div>
    </section>


    <div class="card">

<div class="modal fade text-left BeatPlanModel">
 <div class="modal-dialog">
   <div class="modal-content" style="width: 750px; height: 100px;">


   <div class="card card-warning">
       <div class="card-header">
         <h3 class="card-title">Edit Beat Plan</h3>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
         <span aria-hidden="true">&times;</span>
       </button>
       </div>
       <input type="hidden" name="assign_id" id="assign_Id" class="form-control"  value="">
       <form class="form-horizontal" id="editBeatPlan_form" method="PUT">

{{ csrf_field() }}
 {{ method_field('PUT') }}

      <div class="card-body">
       <div class="form-group row">
       &nbsp;&nbsp;&nbsp;
           <div class="form-group row">
             <label class="col-sm-4 col-form-label">Employee Id</label>
             <div class="col-sm-8">
               <input  class="form-control" name="rept_id" id="rept_id" value="" disabled>
             </div>
           </div>
           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           <div class="form-group row">
             <label class="col-sm-3 col-form-label">Name</label>
             <div class="col-sm-9">
               <input class="form-control" name="rept_name" id="rept_name" value="" disabled>
             </div>
           </div>
           </div>


           <div class="form-group row select2-teal">
              <label class="col-sm-4">Beat Plan Date</label>
          <div class="col-sm-7">
                <div class="input-group date" data-target-input="nearest">
                   <input id="beat_plan_date" name="beat_plan_date" onchange="myBeatPlan(event)" class="form-control datetimepicker-input"
                    placeholder="Start Date"  required />
                    <input type="hidden" name="rept_id_id" id="rept_id"  class="form-control" value="">
                   <div class="input-group-append" data-target="#beat_plan_date" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                   </div>
                </div>
          </div>
          </div>
     <div class="form-group row select2-teal">
           <label class="col-sm-4 col-form-label">Customers</label>
      <div class="col-sm-7">
          <select class="form-control select2" multiple="multiple" name="custs_id[]" id="custs_id" data-placeholder="Select Customer" data-dropdown-css-class="select2-teal">                
          <option value="" selected>Select Plant</option>

           </select>
       </div>
      </div>
     </div>

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




		<div class="card-body">
			<table id="beat-plan-table" class="table table-bordered table-hover" >
		<thead>

        <tr>
            {{-- This all are table heading  --}}
                       
                        <th>Name</th>
                        <th>Email</th>
                        <th>Action</th>
                        <th>View</th>
                        <th>Customer</th>
                        <th>Status</th>

                    </tr>

                  </thead>
        <tbody>
                {{-- Get the employees details from the API and store the details inside $admins --}}
                @isset($emp)
                @foreach ($emp as $value)

                <tr >



                
                  <td>  {{ $value['EMP_NAME'] }} <br> <span class='badge badge-secondary'>{{ $value['EMP_ID'] }}</span></td>

                  <td>{{ $value['EMP_EMAIL'] }}</td>
                  <td>
                    @php
                    $beatplan = $value['EMP_ID'];
                    @endphp
                   
                    <a class='btn btn-info view_cust'  value="{{$beatplan}}" href="{{ route('createbeatplan.show',$beatplan)}}" title="Create Beat Plan">
                        <i class='fas fa-plus-square'></i></a>

                      @php
                      $reptsplan = json_encode($value);
                      @endphp
                     
                      <a class='btn btn-warning edit_beat_plan' herf="#" value="{{$reptsplan}}"  id="{{$value['EMP_ID']}}"  title="Edit Beat Plan">
                        <i class='fas fa-edit'></i></a>
                     
                  

                        
                        
                  </td>

                  @php
                    $beatplans = $value['EMP_ID'];
                    @endphp
                   <td>
                       <a class='btn btn-success btn-sm mybeat'  value="{{$beatplans}}" href="{{ route('reptsbeatview.show',$beatplans)}}"   title="View Beat Plan"  >
                        <i class="fas fa-eye"></i></a>
                  </td>
                     @php
                    $beatcust = $value['EMP_ID'];
                    @endphp
                  <td>
                     <a class='btn btn-warning btn-app btn-xs' value="{{$beatcust}}" href="{{ route('beatplan.show',$beatcust)}}"  style="height:40px; max-width:1%; padding-left:0px; padding-right:0px;" title="View assigned customers">
                      <span class='badge bg-teal'>{{ $value['no_of_customer'] }}</span>
                      <i class='fas fa-users'></i>Customers
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

                <!--  If there is no record when the search by the name or ID -->
                @empty($emp)
                <script>
                  toastr.warning("No records found.");
                </script>
                @endempty



              </tbody>
             </table>
          </table>

</div>



    </section>

</div>
    <!-- /.content -->


@endsection
