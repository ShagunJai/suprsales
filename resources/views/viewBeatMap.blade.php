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
            <h1>View Beat Map</h1>

          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard.index')}}">Home</a></li>
              <li class="breadcrumb-item active">View Beat Map</li>
            </ol>
          </div>
        </div>
      </div><!--/.container-fluid -->
 </section>



 <section class="content">
	 <!-- used to make data selector -->
    <form class="form-horizontal"  action="{{route('viewbeatmap.store')}}" method="POST">
    {{ csrf_field() }}
    <div class="row">
    
    <div class="col-sm-3">
                     <div class="input-group date" data-target-input="nearest">
                   <input id="plan_date" name="plan_date"  class="form-control datetimepicker-input"
                    placeholder="mm/dd/yyyy" required />
                   <div class="input-group-append" data-target="#plan_date" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                     </div>
                     </div>
    <!-- /.input group -->
    
     <!-- create a drop-down to select status -->
	<div class="col-md-3">
               
        
              <!-- creates  a button of type submit -->
			  <div class="form-group row">
			  <button type="submit" class="btn btn-flat btn-success" style="float:right;">Search &nbsp;<i class="fas fa-search"></i></button>
               </div></div>
                    <!-- /.form-group -->
              <!-- /.col -->

            </div>

            
          </form>
          </section>  
 

          <section class="content">





  <!-- <div id="map" style="width:100%; height: 450px;"></div>

  <br> <br> -->

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


  <td> {{ $values['CUSTOMER_NAME'] }} <br><span class='badge badge-secondary'>{{ $values['CUSTOMER_ID'] }} </span></td>
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
                 @isset($custdata)
        @php

     	  $custtss =json_encode($custdata)
		@endphp
     @endisset




<!-- 
 <input name="custdata" type="hidden" id="tbldata5"  class="form-control" value="">

 <input   id="allcustdata"  value="" type="hidden" class="form-control" > -->

  </section>
  <br>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDEt3gl2F9BE8W15uny6waTMOog-rfDSes&callback=initMap&v=weekly&channel=2"
          type="text/javascript"></script>

         
  <script type="text/javascript">


var custval = document.getElementById("allcustdata").getAttribute("value");
     console.log(custval);

     var custvals = JSON.parse(custval);

     var lenn = 0;
    if(custvals != null){
        lenn = custvals.length;
    }
	if(lenn > 0){
	for(var j=0; j<lenn; j++){
        var customer_lat = custvals[j].CUSTOMER_LAT;
		var customer_long = custvals[j].CUSTOMER_LONG;
		var customer_name = custvals[j].CUSTOMER_NAME;
    console.log(customer_name);
  

  }}
    var locations = [
      ['Bondi Beach', -33.890542, 151.274856, 4],
      ['Coogee Beach', -33.923036, 151.259052, 5],
      ['Cronulla Beach', -34.028249, 151.157507, 3],
      ['Manly Beach', -33.80010128657071, 151.28747820854187, 2],
      ['Maroubra Beach', -33.950198, 151.259302, 1]
    ];
  
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 10,
      center: new google.maps.LatLng(-33.92, 151.25),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });
    
    var infowindow = new google.maps.InfoWindow();

    var marker, i;
    
    for (i = 0; i < locations.length; i++) {  
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map
      });
      
      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(locations[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));
    }
  </script>

@endsection