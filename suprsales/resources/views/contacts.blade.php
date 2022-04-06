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
            <div class="col-sm-3">
              <h1>Contacts</h1>
            </div>

            <div class="col-sm-9">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('dashboard.index')}}">Home</a></li>
                <li class="breadcrumb-item active">Contacts</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
 <!-- Main content -->
    <section class="content" style="background-color: white;">
	
  <div class="container">
  
   <div class="card">
   @isset($details)
   @foreach($details as $value)
   @isset($value['NAME'])
   <h3 class="level-1 rectangle">
   <div class="card-header">
   
  <div class="row">
  <div class="col-md-2">
  @php
			$profile = $value['REPORTING_MANAGER_ID'];
			@endphp
 <a href="{{ route('profile.show',$profile)}}" class="text-navy">  
 @if(filled($value['IMAGE']))
 <img src="{{ URL::asset('storage/'.$value['IMAGE']) }}" class="img-circle elevation-2" style="width:60px; height:60px; position: absolute; top: 0px; left: 0px;" alt="">
  @else
 <img src="/suprsales_resource/dist/img/usericon.png"  class="img-circle elevation-2" style="width:60px; height:60px; position: absolute; top: 0px; left: 0px;" alt="">	
  @endif
  </a> 
  </div>
   <div class="col-md-10">
   
  <a href="{{ route('profile.show',$profile)}}" class="text-navy"> {{$value['NAME']}}</a>
  <div class="text-muted text-sm"><b>Employee Code </b>&nbsp;{{ $value['CODE'] }}</div>
                    <div class="text-muted text-sm"><b>Designation </b>&nbsp;{{ $value['DESIGNATION'] }}</div>
   </div>
   </div>
   <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Expand">
                <i class="fas fa-plus text-navy"></i></button>
             
            </div>
          </div>
		  <small>
		   <ul class="ml-4 mb-0 fa-ul text-muted text-md">
                        @if(filled($value['MOB']))<li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span>{{ $value['MOB'] }}</li>@endif
                      @if(filled($value['EMAIL']))<li class="small"><span class="fa-li"><i class="fas fa-envelope-square"></i></span>{{ $value['EMAIL'] }}</li>@endif
					  @if(filled($value['REPORTING_MANAGER']))<li class="small"><span class="fa-li"><i class='fas fa-user-tie'></i></span>{{ $value['REPORTING_MANAGER'] }}</li>@endif
					  @if(filled($value['AREA']))<li class="small"><span class="fa-li"><i class="fas fa-map-marker-alt"></i></span>{{ $value['AREA'] }}</li>@endif
					  @if(filled($value['PLANT']))<li class="small"><span class="fa-li"><i class="fas fa-industry"></i></span>{{ $value['PLANT'] }}</li>@endif
					 
					  </ul>
		  </small>
		   </h3>
 @endisset
		  <div class="card-body">
		 
  <ol class="level-2-wrapper">
   @foreach ($value['EMPLOYEE'] as $employee)
    <li>
	<div class="card">
	<h4 class="level-2 rectangle">
   <div class="card-header">
     <div class="row">
  <div class="col-md-3">
  @php
			$profile = $employee['EMP_ID'];
			@endphp
  <a href="{{ route('profile.show',$profile)}}" class="text-navy">
  @if(filled($employee['EMP_IMAGE']))
       <img src="{{ URL::asset('storage/'.$employee['EMP_IMAGE']) }}" class="img-circle elevation-2" style="width:60px; height:60px; position: absolute; top: 0px; left: 0px;" alt="">
	 @else
 <img src="/suprsales_resource/dist/img/usericon.png"  class="img-circle elevation-2" style="width:60px; height:60px; position: absolute; top: 0px; left: 0px;" alt="">	
  @endif
   </a></div>
   
   <div class="col-md-9">
  
   <a href="{{ route('profile.show',$profile)}}" class="text-navy">{{ $employee['EMP_NAME'] }}</a>
   <div class="text-muted text-sm"><b>Employee Code </b>&nbsp;{{ $employee['EMP_CODE'] }}</div>
   <div class="text-muted text-sm"><b>Designation </b>&nbsp;{{ $employee['EMP_DESIGNATION'] }}</div>
                   
   </div>
   </div>
      
	  <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Expand">
                @if($employee['TOTAL_EMPLOYEE2'] > 0)
				<i class="fas fa-plus text-navy"></i>
             @else
				 <i class="fas fa-minus text-navy"></i>
				 @endif
				 </button>
            </div>
			</div>
			<small>
			<ul class="ml-4 mb-0 fa-ul text-muted text-md">
                       @if(filled($employee['EMP_MOBILE_NO']))<li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span>{{ $employee['EMP_MOBILE_NO'] }}</li>@endif
                       @if(filled($employee['EMP_EMAIL']))<li class="small"><span class="fa-li"><i class="fas fa-envelope-square"></i></span>{{ $employee['EMP_EMAIL'] }}</li>@endif
					   @if(filled($employee['REPORTING_MANAGER']))<li class="small"><span class="fa-li"><i class='fas fa-user-tie'></i></span>{{ $employee['REPORTING_MANAGER'] }}</li>@endif
					   @if(filled($employee['AREA']))<li class="small"><span class="fa-li"><i class="fas fa-map-marker-alt"></i></span>{{ $employee['AREA'] }}</li>@endif
					   @if(filled($employee['PLANT']))<li class="small"><span class="fa-li"><i class="fas fa-industry"></i></span>{{ $employee['PLANT'] }}</li>@endif
					 
					  </ul>
					  </small>
          
		  </h4>
		   <div class="card-body">
      <ol class="level-3-wrapper">
	  @foreach ($employee['EMPLOYEE'] as $emp)
        <li>
		<div class="card">
		
		<h5 class="level-3 rectangle">
   <div class="card-header">
    <div class="row">
	@php
			$profile = $emp['EMP_ID'];
			@endphp
  <div class="col-md-4">
  
  <a href="{{ route('profile.show',$profile)}}" class="text-navy">
  @if(filled($emp['EMP_IMAGE']))
  <img src="{{ URL::asset('storage/'.$emp['EMP_IMAGE']) }}" class="img-circle elevation-2" style="width:40px; height:40px; position: absolute; top: 0px; left: 0px;" alt="">
   @else
 <img src="/suprsales_resource/dist/img/usericon.png"  class="img-circle elevation-2" style="width:40px; height:40px; position: absolute; top: 0px; left: 0px;" alt="">	
  @endif
   </a></div>
   <div class="col-md-8">
   
  <a href="{{ route('profile.show',$profile)}}" class="text-navy" style="font-size:12.5px">{{ $emp['EMP_NAME'] }}</a>
   
   
                 
   </div>
   </div>
         <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Expand">
                 @if($emp['TOTAL_EMPLOYEE3'] > 0)
				<i class="fas fa-plus text-navy"></i>
             @else
				 <i class="fas fa-minus text-navy"></i>
				 @endif
				
				</button>
             
            </div>
          </div>
		  <ul class="ml-4 mb-0 fa-ul text-muted text-sm">
                      @if(filled($emp['EMP_CODE']))<li class="small"><span class="fa-li"><i class="fas fa-dot-circle"></i></span> {{ $emp['EMP_CODE'] }} (Employee Code)</li>@endif
                      @if(filled($emp['EMP_DESIGNATION']))<li class="small"><span class="fa-li"><i class="fas fa-dot-circle"></i></span> {{ $emp['EMP_DESIGNATION'] }} (Designation)</li>@endif
					   @if(filled($emp['EMP_MOBILE_NO']))<li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span>{{ $emp['EMP_MOBILE_NO'] }}</li>@endif
                      @if(filled($emp['EMP_EMAIL']))<li class="small"><span class="fa-li"><i class="fas fa-envelope-square"></i></span>{{ $emp['EMP_EMAIL'] }}</li>@endif
					  @if(filled($emp['REPORTING_MANAGER']))<li class="small"><span class="fa-li"><i class='fas fa-user-tie'></i></span>{{ $emp['REPORTING_MANAGER'] }}</li>@endif
					  @if(filled($emp['AREA']))<li class="small"><span class="fa-li"><i class="fas fa-map-marker-alt"></i></span>{{ $emp['AREA'] }}</li>@endif
					  @if(filled($emp['PLANT']))<li class="small"><span class="fa-li"><i class="fas fa-industry"></i></span>{{ $emp['PLANT'] }}</li>@endif
					 
					  </ul>
		   </h5>
		   <div class="card-body">
          <ol class="level-4-wrapper">
		  @foreach ($emp['EMPLOYEE'] as $emps)
            <li>
              <h5 class="level-4 rectangle">
			  <div class="row">
			   @php
			$profile = $emps['EMP_ID'];
			@endphp
  
			  <div class="col">
			  
			 <small><a href="{{ route('profile.show',$profile)}}" class="text-navy text-sm">{{ $emps['EMP_NAME'] }}</a></small>
			  </div>
			  </div>
			  </h5>
            </li>
            @endforeach
          </ol>
		  </div>
		  </div>
        </li>
        @endforeach
      </ol>
	  </div>
	  </div>
    </li>
   @endforeach
  </ol>
  </div>
   
    @endforeach
	
	 @endisset
			@empty($details)
			<script>toastr.warning("No records found.");</script>
			@endempty
  </div>
</div>


    </section>
@endsection