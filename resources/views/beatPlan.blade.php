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
{{-- $cust should contain any value and it store at value store at $emp_name --}}
  {{--NOT USABLE BECAUSE IT REDIRECT TO ANOTHER PAGE}}--}}
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
          <div class="col-sm-10">
		 <div class="row">

            <h1>Beat Plan for @isset($cust) {{$emp_name}} @endisset</h1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<button class="btn btn-info"><a href="Javascript:history.go(-1);Location.reload()" class="text-white"><i class="fas fa-arrow-alt-circle-left"></i> Go Back</a></button>

			</div>
          </div>
          <div class="col-sm-2">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard.index')}}">Home</a></li>
              <li class="breadcrumb-item active">Beat Plan</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>


   <section class="content">

       <form class="form-horizontal" id='beatform'  method="POST">
            @csrf

      <div class="container-fluid">


			<div class="row mb-2">
           
				
    <div class="col-sm-4">
				  <div class="icheck-primary d-inline">
               <label for="chkYes">
					<input type="radio" id="chkYes" name="chkPassPort" onClick="initMap(5)"/>
					5 km
				</label>
				</div>
               

				   <div class="icheck-primary d-inline">
				 <label for="chkYes2">
					<input type="radio" id="chkYes2" name="chkPassPort" onClick="initMap(10)"/>
					10 km
				</label>
                   </div>
               
                   <div class="icheck-primary d-inline">
                        <label for="chkYes3">
					           <input type="radio" id="chkYes3" name="chkPassPort" onClick="initMap(15)"/>
					             15 km
				             </label>

                </div>
            </div>

           <div class="col-sm-3">
                <div class="input-group date" data-target-input="nearest">
                   <input id="beat_plan_date" name="beat_plan_date"  class="form-control datetimepicker-input"
                    placeholder="Start Date"  required />
                   <div class="input-group-append" data-target="#beat_plan_date" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                   </div>
                </div>
                
         <div class="col-sm-2">
          <div class="col">
            <div class="form-group" id="select-boxes">
              <select class="form-control select" data-placeholder="Select Days" id="planDays"name="planDays" data-dropdown-css-class="select2-teal" style="width: 100%;" required>
              <option >Select Days</option>  
              <option value="00">Daily</option>    
              <option value="07">Weekly</option>
              <option value="30">Monthly</option>
              <option value="91">Quarterly</option>
              <option value="182">Half Yearly</option>
              <option value="365">Yearly</option>
             </select>
            </div>
           </div>
         </div>


                <div class="col-sm-3">  
               <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">To:</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="endDatee" placeholder="End Date" disabled>
                    </div>
                  </div>
               </div>
              </div>
        <div class="row mb-2">

           <div class="col-sm-4">
                <body class="hold-transition sidebar-mini accent-teal">
                    {{-- https://developers.google.com/maps/documentation/javascript/examples/marker-accessibility --}}
                    <div id="map" style="width:100%;height:480px;border:solid black 1px;"></div>
                </body>
            
          </div>


    <div class="col-sm-8">
    <div class="card">
     <div class="card-body">

			  <table id="beat_table" class="table table-bordered table-hover">
			  <thead>
                  <tr>
				    <th></th>
           <th class="text-center"  >Id</th>
					<th class="text-center"   >Name</th>
					<th class="text-center"   >City</th>
					<th class="text-center"  > Phone No</th>
                  </tr>
               </thead>
                     <tbody >
                     @isset($cust)
 @foreach ($cust as $values)
 <tr>

<td></td>
<td>{{ $values['CUSTOMER_ID'] }}</td>
<td>{{ $values['CUSTOMER_NAME'] }} </td>

<td>{{ $values['CUSTOMER_CITY'] }}</td>
<td>{{ $values['CUSTOMER_MOB'] }}</td>



</tr>
@endforeach
@endisset
                 
                           
</tbody>
			@empty($cust)
			<script>toastr.warning("No records found.");</script>
			@endempty

</table>

</div>



            <!-- /.card -->
            <!-- /.card -->

				</div>
          </div>
		  </div>
		  </div>


      @isset($cust)
        @php

     	  $custss =json_encode($cust)
		@endphp
     @endisset

{{-- @php
    print_r($cust)
@endphp --}}



 <input name="custdata" type="hidden" id="tbldata5"  class="form-control" value="">

 <input   id="allcustd"  value="{{$custss}}" type="hidden" class="form-control" >
 <input   id="created_for"  value="{{$value['EMP_ID']}}" type="hidden" class="form-control" >
 <input   id="empl_long"  value="{{$value['EMP_LONG']}}" type="hidden" class="form-control" >
 <input   id="empl_lat"  value="{{$value['EMP_LAT']}}" type="hidden" class="form-control" >
		  </form>

<br>
 
<!----
<section class="content">
	
    <form class="form-horizontal" action="{{route('createbeatplan.store')}}" method="POST">
    {{ csrf_field() }}
    <div class="row">
    
    <div class="col-sm-3">
                     <div class="input-group date" data-target-input="nearest">
                   <input id="plans_date" name="plans_date"  class="form-control datetimepicker-input"
                    placeholder="mm/dd/yyyy" required />
                   <div class="input-group-append" data-target="#plans_date" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                     </div>
                     </div>
    
    
	<div class="col-md-3">
               
        
			  <div class="form-group row">
			  <button type="submit" class="btn btn-flat btn-success" style="float:right;">Search &nbsp;<i class="fas fa-search"></i></button>
               </div></div>
                  

            </div>

            
          </form>
          </section>  
 

          <section class="content">






  <br> <br>

  <div class="row">
    <div class="col-12">
     <div class="card">
          <div class="card-body">
          <table id="mycustomer" class="table table-bordered table-hover">

        <thead>
          <tr>
            <th>Type</th>
            <th>Name</th>
            <th>City</th>
            <th class="text-right">Phone No</th>
            <th>Action</th>
            <th class="text-center">Status</th>
          </tr>
        </thead>
  <tbody>


  @isset($custdata)
 @foreach ($custdata as $values)
<tr>
  <td>{{ $values['CUSTOMER_ID'] }}</td>
  <td>{{ $values['CUSTOMER_NAME'] }}</td>
  <td>{{ $values['CUSTOMER_PHN'] }}</td>
  <td>{{ $values['CUSTOMER_DISTRICT'] }}</td>
  <td>{{ $values['CUSTOMER_LAT'] }}</td>
  <td>{{ $values['CUSTOMER_LONG'] }}</td>

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
  </section>--->
 
    <script

      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDEt3gl2F9BE8W15uny6waTMOog-rfDSes&callback=initMap&v=weekly&channel=2"
      async
    ></script>

<script>

    var count = 1;


    var custval = document.getElementById("allcustd").getAttribute("value");
	var employee_lat = document.getElementById("empl_lat").getAttribute("value");
    var employee_long = document.getElementById("empl_long").getAttribute("value");
    let customers;
    var custvals = JSON.parse(custval);
    var custjs
    //var myJSON;
	//console.log(employee_lat,employee_long)
    function initMap(value) {
{
          var custj= [];
          var custjcity= [];
          var custjph= []
		    let myCust=[];
            const rad=value*1000;
			  var radi=value;
         const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 10,
            center: { lat: parseFloat(employee_lat), lng: parseFloat(employee_long) },
         });


    new google.maps.Circle({
      strokeColor: "#FF0000",
      strokeOpacity: 0.8,
      strokeWeight: 2,
      fillColor: "#FF0000",
      fillOpacity: 0.35,
      map,

      center: { lat: parseFloat(employee_lat), lng: parseFloat(employee_long) },
      radius:rad,

    });

     var lenn = 0;
    if(custvals != null){
        lenn = custvals.length;
    }
	if(lenn > 0){
	for(var j=0; j<lenn; j++){
        var customer_lat = custvals[j].CUSTOMER_LAT;
		var customer_long = custvals[j].CUSTOMER_LONG;
		var customer_name = custvals[j].CUSTOMER_NAME;
        var customer_region = custvals[j].REGION;
        var customer_city = custvals[j].CUSTOMER_CITY;
		var customer_mob = custvals[j].CUSTOMER_MOB;
        var customer_id = custvals[j].CUSTOMER_ID;

	     //Reportee coordinate
		 var lat3 = parseFloat(employee_lat);
		 var long3= parseFloat(employee_long);

         var locations = [
         [ parseFloat(customer_lat),parseFloat(customer_long),customer_name,customer_city,customer_id],
         ];

         var contents = "<h6>"  + "Name:"  +customer_name + "<h6>" +
         "ID:"   +"<span class='badge badge-secondary'>"+customer_id+"</span>"+"<br>"+"City:"   +"<span class='badge badge-warning'>" +customer_city+"</span>";;
                

         const  infowindow = new google.maps.InfoWindow({
                content: contents,
                
        	});

         for (var i = 0; i < locations.length; i++) {

	        var distance = Math.sqrt(Math.pow((locations[i][0] - lat3),2)+ Math.pow((locations[i][1] - long3),2));


		       //var cust_nm=[];
		    if(distance<radi/100){
			  	var marker
                    marker = new google.maps.Marker({
                    position: new google.maps.LatLng(locations[i][0], locations[i][1]),
                    map
             });
               //console.log(locations[i][0],locations[i][1]);
              google.maps.event.addListener(marker, 'click', (function(marker, i) {
              return function() {
              infowindow.open(map, marker);
              }
              })(marker, i));

                myCust.push(locations[i]);
				//console.log(locations[i][2]);
			//	console.log(myCust);
	      	  }
		   }
	    }
		}


		for (var s=0;s<myCust.length;s++)
        {


		customers={
		   name: myCust[s][2],
		   city: myCust[s][3],
		   id: myCust[s][4]

        }
          custj.push(customers);
         // var myJSON = customers;

         }
      var custjs = JSON.stringify(custj);
      console.log(custjs);
      

  
    }
    document.getElementById("tbldata5").value=custjs;
    // $.ajax({
    //    url:"show",
    //    method:"POST",
    //    data:{custj:JSON.stringify(custj)},
    //    success:function (res) {
    //      console.log(res);
         
    //    }
    // })
  }
// console.log(custj);
// console.log(customers);




 //console.log(x);
 //{$custjs = custj}
// var m,x;
            // for ( m=0;m<custj.length;m++){
            //
            //     }

//alert(custj[m]);
      //;
//var pus=[custjs]



        //alert(custjs);



    //     var k = '<tbody>' ;
    //     for(p = 0;p < custj.length; i++){
    //       k+= '<tr>';
    //       k+= '<td>' + custj[p].name + '</td>';
    //       k+= '<td>' + custj[p].age + '</td>';
    //       k+= '<td>' + custj[p].phone + '</td>';
    //       k+= '</tr>';
    //   }
    //   k+='</tbody>';
    //   document.getElementById('beat_table').innerHTML = k;




    //   var arrayOfObj =custj;
    //       var table = document.getElementById('beat_table')
    //       arrayOfObj.forEach((obj)=>{
    //       	var tds = ''
    //         // Build every <td> and append to tds string
    //         for (var k in obj){
    //         	tds += `<td class='${k}'>${obj[k]}</td>\n`
    //         }
    //         // <tr> Complete! Append to table!
    //         var objTr = `<tr>${tds}</tr>`
    //         table.innerHTML += objTr
    //       });


 //  document.write(custj);




// function loadTableData(custj){
//          //
//           const t_body=document.getElementById('table_body'),
//           let dataHtml='';
//           for(let cust_data of custj){
//               dataHtml+=`<tr> <td></td>
//                               <td>${cust_data.name}</td>
//                               <td>${cust_data.city}</td>
//                               <td>${cust_data.phone}</td>
//                               <td>${cust_data.city}</td> </tr>`;

//           }
//           t_body.innerHTML = dataHtml;
// }




</script>



@endsection

<!-- 

<script

src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDEt3gl2F9BE8W15uny6waTMOog-rfDSes&callback=initMap&v=weekly&channel=2"
async
></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.14.1/moment.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>

<script>
$('#dpFrom').datetimepicker({
format: 'MM/DD/YYYY'
}).on('dp.change', function(e) {
//
// on date change get current date and add txtDays days
//
var txtTo = e.date.add(+$('#planDays').val() || 0, 'days');
//
// format result and save to txtDays
//
$('#txtTo').val(txtTo.format('MM/DD/YYYY')); -->
