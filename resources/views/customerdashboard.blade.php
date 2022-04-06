@extends('layouts.dashborad_layout')
 <!-- to show the flex message of success -->
@section('content')
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
	<!-- to show the flex message of error -->
	@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<script src="{!! asset('suprsales_resource/plugins/chart.js/Chart.min.js') !!}" type="text/javascript"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.min.js" integrity="sha512-vBmx0N/uQOXznm/Nbkp7h0P1RfLSj0HQrFSzV8m7rOGyj30fYAOKHYvCNez+yM8IrfnW0TCodDEjRqf6fodf/Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<br>
<section class="content">
      <div class="container-fluid">
        
        <div class="row">
		<div class="col-md-12">

		<div class="info-box mb-12 bg-secondary">
		@isset($user)
				@foreach($user as $val)
              <span class="info-box-icon">
				 
			    <img src="/suprsales_resource/dist/img/usericon.png"  class="img-circle elevation-3" alt="User">
               
			  </span>
               <!-- in box welcome message with the user name and id -->
              <div class="info-box-content">
                <span class="info-box-number">Welcome,{{$val['DISTRIBUTOR_NAME']}} ({{$val['DISTRIBUTOR_ID']}})</span>
			
               
              </div>
              <!-- /.info-box-content -->
			  @endforeach
				@endisset
            </div>
            <!-- Widget: user widget style 2 -->

          </div>
		  </div></section>


          <section class="content">
          <div class="container-fluid">
          <div class="row">
<div class="col-lg-3 col-6">
  <div class="small-box bg-success">
    <div class="inner">
      @isset($details)
      @foreach($details as $val)
      @php
					 $complet = ($val['Approved_Order']);
					 @endphp
   
     @endforeach
			 @endisset
    
     <h3>{{$complet}}</h3>
     <p>Approved</p>
</div>
<a href="{{ route('custallorder.index')}}" class="btn small-box-footer task">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
</div>
<div class="col-lg-3 col-6">
  <div class="small-box bg-warning">
    <div class="inner">
    @isset($details)
      @foreach($details as $val)
      @php
					 $completi = ($val['Pending_Order']);
					 @endphp
   
     @endforeach
			 @endisset
       <h3>{{$completi}}</h3>
     <p>Pending</p>

</div>
<a href="{{ route('custallorder.index')}}" class="btn small-box-footer task">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
</div>
<div class="col-lg-3 col-6">
  <div class="small-box bg-danger">
    <div class="inner">
    @isset($details)
      @foreach($details as $val)
      @php
					 $completio = ($val['Rejected_Order']);
					 @endphp
   
     @endforeach
			 @endisset
    
     <h3>{{$completio}}</h3>
     <p>Rejected</p>

</div>
<a href="{{ route('custallorder.index')}}" class="btn small-box-footer task">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
</div>
<div class="col-lg-3 col-6">
  <div class="small-box bg-info">
    <div class="inner">
    @isset($details)
      @foreach($details as $val)
      @php
					 $completion = ($val['Total_Order']);
					 @endphp
   
     @endforeach
			 @endisset
    
     <h3>{{$completion}}</h3>
     <p>Total Orders</p>

</div>
<a href="{{ route('custallorder.index')}}" class="btn small-box-footer task">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
</div>
</div>
</div>
</section>










<section class="content">
<div class="container-fluid">
<div class="row">

          <div class="col-md-12">
          <div class="card">
<!-- creates heading of Top-products -->
             <div class="card-header bg-light">
            
                <h5 class="card-title"><i class="fas fa-shopping-cart"></i>Sale</h5>

               
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-8">
                    <p class="text-center">
                      <strong></strong>
                    </p>

                    <div class="card-body">
                      <!-- Sales Chart Canvas -->
                      <canvas id="myChart" style="width:130%;max-width:700px"></canvas>
</div>
                      <!-- <canvas id="salesChart" height="180" style="height: 180px;"></canvas>
                    </div> -->
                    <!-- /.chart-responsive -->
                  </div>
                  <!-- /.col -->
                  <br>
                  
                  <div class="col-md-4">
                  <div class="card-body">
                    
<br>
<br>                    <p class="text-center">
                      <strong>Products</strong>
                    </p>

                    <div class="progress-group">
                    Agron 1 Kgx20 Pou
                                          <span class="float-right"><b>16</b>/20</span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-primary" style="width: 80%"></div>
                      </div>
                    </div>
                    <!-- /.progress-group -->
<br>
                    <div class="progress-group">
                    Agron 5 Kgx4 Pou                      <span class="float-right"><b>31</b>/40</span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-danger" style="width: 75%"></div>
                      </div>
                    </div>
<br>
                    <!-- /.progress-group -->
                    <div class="progress-group">
                      <span class="progress-text"> Agrospred Max 5MLX600 Pouch Jar Page</span>
                      <span class="float-right"><b>48</b>/80</span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-success" style="width: 60%"></div>
                      </div>
                    </div>
<br>
                    <!-- /.progress-group -->
                    <div class="progress-group">
                    Arrow 5 Gmx800 Pou
                      <span class="float-right"><b>25</b>/50</span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-warning" style="width: 50%"></div>
                      </div>
                    </div>
                    <!-- /.progress-group -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
</div>
              <!-- ./card-body -->
              
                <!-- /.row -->
              
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
       
<section class="col-lg-6 connectedSortable">
<div class="card">
<!-- creates heading of Top-products -->
             <div class="card-header bg-light"> <h3 class="card-title ">
				<i class="fas fa-chart-line mr-1"></i>
              Ageing                </h3>


              </div>
              <!--<div class="card">
              <div class="card-header p-2 bg-light">
                
                <ul class="nav nav-pills red">
                                
                <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Lists</a></li>
                               
                <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Charts</a></li>
                      
                </ul>
                            
                </div>-->
                
                <div class="card-body">
                
                <!--<div class="tab-content">
                               
                <div class="active tab-pane" id="activity">-->
                              
                <table id="ageing" class="table table-bordered ">
                <thead>                  
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>KPI Name</th>
                    <th class="text-center">Amount</th>
                   
                  </tr>
                </thead>
                <tbody>
                @isset($balances)
        @foreach ($balances as $values)
        
                  <tr>
                    <td>1.</td>
                    <td style="color:#FFC300">Opening Balance</td>
                    <td style="color:#FFC300">
                    {{$values['OPENING_BALANCE']}}
           
                    
                    </td>
                    
                  </tr>
                  <tr>
                    <td>2.</td>
                    <td style="color:navyblue">Closing Balance</td>
                    <td style="color:navyblue">
                    {{$values['CLOSING_BALANCE']}}
           
                    </td>
                    
                  </tr>
                  <tr>
                    <td>3.</td>
                    <td style="color:darkviolet">Imm. Dues</td>
                    <td style="color:darkviolet">
                    {{$values['IMM_DUES']}}
           
                    </td>
                    
                  </tr>
                  <tr>
                    <td>4.</td>
                    <td style="color:green";>Advance</td>
                    <td style="color:green">
                    {{$values['ADVANCE']}}
           
                    </td>
                   
                  </tr>
        <tr>
                    <td>5.</td>
                    <td style="color:blue">Total Credit Limit</td>
                    <td style="color:blue">
                    {{$values['TOTAL_CREDIT_LIMIT']}}
           
                    </td>
                   
                  </tr>
        <tr>
                    <td>6.</td>
                    <td style="color:red">Remaining Credit Limit</td>
                    <td style="color:red">
                    {{$values['REMAINING_CREDIT_LIMIT']}}
           
                    </td>
                   
                  </tr>
        <tr>
                    <td>7.</td>
                    <td style="color:grey">Total Outstanding</td>
                    <td style="color:grey" >
                    {{$values['TOTAL_OUTSTANDING']}}
           
                    </td>
                   
                  </tr>
                  @endforeach
           @endisset
                </tbody>
              </table></div>
				
              
         <!-- <div class="active tab-pane" id="settings">-->
          
</div>
<div class="card">
<!-- creates heading of Top-products -->
             <div class="card-header bg-light"><h3 class="card-title">
				    <i class="fas fa-industry mr-1"></i>
                  Comparison
                </h3>

              </div>
              <div class="card-body">
                      <!-- Sales Chart Canvas -->
                      <canvas id="comparison" style="min-height: 430px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
</div>
        
              <!-- /.card-body-->

</div>
          
         
           </section>














            <section class="col-lg-6 connectedSortable">
            <div class="card">
<!-- creates heading of Top-products -->
             <div class="card-header bg-light">
          <h3 class="card-title">
          <i class="fas fa-industry mr-1"></i>
                Ageing Graph
              </h3>

            </div>
            
        <div class="card-body">
        @php
			  $graph = json_encode($balances);
			  @endphp
			  <canvas id="bar" value="{{$graph}}" style="min-height: 395px; height: 150px; max-height: 250px; max-width: 100%;"></canvas>
               </div>
         </div>
         

         <div class="card">
<!-- creates heading of Top-products -->
             <div class="card-header bg-light"> <h3 class="card-title">
                <i class="fas fa-money-check-alt"></i>
                Ledger
                </h3>
             

                
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                
                 
<table id="ledger" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>Transaction ID</th>
                      <th>Description</th>
                      
                      <th>Amount</th>
                      <th>Balance</th>
                      <th>Transaction_Type</th>
                      <th>Type</th>
                      
                      <th>Date</th>
                    </tr>
                    </thead>
                    <tbody>
                    @isset($ledger)
        @foreach ($ledger as $val)
                    <tr>
                      <td>{{$val['TRANSACTION_ID']}}</td>
                      <td>{{$val['TRANSACTION_DESCRIPTION']}}</td>
                      <td>{{$val['TRANSACTION_AMOUNT']}}</td>
                      <td>{{$val['BALANCE']}}</td>
                      @if ($val['TRANSACTION_TYPE'] =='H')
							
              <td style="text-align:center;" class='project-state'>
                          <span class='badge badge-success'>Credit</span>
                        </td>
						@elseif ($val['TRANSACTION_TYPE'] =='S')
            <td style="text-align:center;" class='project-state'>
                          <span class='badge badge-warning'>Debit</span>
                        </td>
                        @endif
                      <td>{{$val['TYPE']}}</td>
                     
                     
                      <td>{{ \Carbon\Carbon::parse($val['TRANSACTION_TIME'])->format('d/m/Y')}}</td>

                    </tr>
                   @endforeach
					   @endisset
                    </tbody>
                  </table>
                
              </div>
             
            </div>
          
           
        </div></div></section>
                  
     

        <script type="text/javascript">
var ctx = document.getElementById("bar");
//console.log(ctx);
var valu = document.getElementById("bar").getAttribute("value");
		var ageing = JSON.parse(valu);
		//console.log(ageing);
	let region = [];//tota_sales
	let range = [];//mon_yea
	 var start = 0;//monle
           if(ageing != null){
              start = ageing.length;
           }
           //alert(start);
		   if(start > 0){
	for(var j=0; j<start; j++){
	
    region.push(Math.abs(ageing[j].UPTO30_DAYS))
                 
                 region.push(Math.abs(ageing[j].UPTO60_DAYS))
                 region.push(Math.abs(ageing[j].UPTO90_DAYS))
                 region.push(Math.abs(ageing[j].UPTO120_DAYS))
                 region.push(Math.abs(ageing[j].UPTO180_DAYS))
                 region.push(Math.abs(ageing[j].ABOVE180_DAYS))
     
  }
		
	//	console.log(region);	
	}
  //console.log(range);
var barGraphy = new Chart(ctx, {
    // The type of chart we want to create
    type: 'bar',

    // The data for our dataset
    data: {
      labels: ["0-30 Days", "31-60 Days", "61-90 Days", "91-120 Days", "121-180 Days", "> 180 Days"],
     
                datasets: [{
                  label: 'Ageing',
                  backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                  ],
                  borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                  ],
                  
                  borderWidth: 1,
                  hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
                  hoverBorderColor: 'rgba(200, 200, 200, 1)',
                  data: [...region]
                }]
              }})
    // Configuration options go here
  //   console.log(barGraphy);
		   
		   

</script>
<script>
var xValues = ["Liquid", "Dust", "Unit"];
var yValues = [55, 70, 44];
var barColors = [
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)'];
    var border= ['rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)'];


new Chart("myChart", {
  type: "bar",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      borderColor:border,
      data: yValues
    }]
  },
  options: {
    legend: {display: false},
    title: {
      display: true,
      text: "Sales"
    }
  }
});
</script>

<script>
var xValues = ["2019", "2021"];
var yValues = [55000, 40000];
var barColors = ["rgba(255, 99, 132, 0.2)", "rgba(255, 99, 132, 0.2)"];

new Chart("comparison", {
  type: "line",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor:'rgba(255, 206, 86, 0.2)',
      borderColor:'rgba(255, 206, 86, 1)',
      data: yValues
    }]
  },
  options: {
    legend: {display: false},
    title: {
      display: true,
      text: "Comparison"
    }
  }
});
</script>

<!-- 



  -->
@endsection