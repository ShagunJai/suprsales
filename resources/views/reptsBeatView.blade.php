{{-- It is use for the header footer sidebar --}}
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

@isset($cust)
		 @foreach ($cust as $value)
		  @php
		   $emp_name = $value['EMP_NAME'];
           $emp_ids = $value['EMP_ID'];
		  @endphp
	       @break
		 @endforeach
      @endisset



      <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-9">
		 <div class="row">

            <h1>View Beat Plan for @isset($cust) {{$emp_name}} @endisset</h1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<button class="btn btn-info"><a href="Javascript:history.go(-1);Location.reload()" class="text-white"><i class="fas fa-arrow-alt-circle-left"></i> Go Back</a></button>

			</div>
          </div>
          <div class="col-sm-3">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard.index')}}">Home</a></li>
              <li class="breadcrumb-item active">View Beat Plan</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

<section class="content">
	 <!-- used to make data selector -->
  
                  
@isset($cust)
		
		  
		   
       
		  
    <form class="form-horizontal" action="{{route('reptsbeatview.store')}}" method="POST">
   
    {{ csrf_field() }}
    <div class="row">
    
    <div class="col-sm-3">
                     <div class="input-group date" data-target-input="nearest">
                   <input id="show_plan_date" name="show_plan_date"  class="form-control datetimepicker-input"
                    placeholder="mm/dd/yyyy" required />
                   <div class="input-group-append" data-target="#show_plan_date" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                     </div>
                     </div>
    <!-- /.input group -->
    
     <!-- create a drop-down to select status -->
	<div class="col-md-3">
    <input type="hidden" id="crtfor"  name="crtfor" Value="{{$emp_ids}}" /> 


              <!-- creates  a button of type submit -->
			  <div class="form-group row">
			  <button type="submit" class="btn btn-flat btn-success" style="float:right;">Search &nbsp;<i class="fas fa-search"></i></button>
               </div></div>
                    <!-- /.form-group -->
              <!-- /.col -->

            </div>
            

          
          </form>
        
          @endisset

          <div class="row">
          <div class="col-12">
    <div class="card">

          <div class="card-body">
          <table id="viewbeattable" class="table table-bordered table-hover">
          <thead>
          <tr>
            
            <th class="text-center">Name</th>
            <th>City</th>
            <th>State</th>
            <th class="text-center">Phone No</th>
            
            <th class="text-center">Status</th>
          </tr>
        </thead>
 <tbody>


  @isset($custdata)
 @foreach ($custdata as $values)
 <tr>


<td> {{ $values['CUSTOMER_NAME'] }} <br><span class='badge badge-secondary'>{{ $values['CUSTOMER_ID'] }} </span> </td>
<td>{{ $values['CUSTOMER_DISTRICT'] }}</td>
<td>{{ $values['CUSTOMER_STATE'] }}</td>
<td>{{ $values['CUSTOMER_PHN'] }}</td>
@if($values['STATUS'] =='1')
						<td class='project-state'>
            <span class='badge badge-warning'>Planned</span>
             </td>
				@elseif($values['STATUS'] =='2')
						<td class='project-state'>
            <span class='badge badge-success'>Attended</span>
            </td>
            @elseif($values['STATUS'] =='3')
						<td class='project-state'>
            <span class='badge badge-danger'>Not Attended</span>
             </td>
				@endif

</tr>
@endforeach
@endisset
{{-- It shows that if there is no record inside $cust by the clicking attr --}}
@empty($custdata)
<script>toastr.warning("No records found.");</script>
@endempty
</tbody>
</table>

</div>


    </div>

    </div>
		 



</section>

<script type="text/javascript">
$(document).ready(function () {
  bsCustomFileInput.init();
  $("[data-card-widget='collapse']").click()
});
</script>
@endsection