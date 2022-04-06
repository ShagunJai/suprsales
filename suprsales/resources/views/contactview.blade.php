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
          <div class="col-sm-2">
            <h1>Contacts</h1>
          </div>
		   
		   <div class="col-sm-6">
		  
			</div>	
          <div class="col-sm-4">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard.index')}}">Home</a></li>
              <li class="breadcrumb-item active">Contacts</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
 <!-- Main content -->
    <section class="content">

      <!-- Default box -->
	   
      
        <div class="card-body pb-0">
          <div class="row ">
		  @isset($details)
		@foreach ($details as $value)
		@isset($value['NAME'])
			<div class="col-4 ">
              <div class="card bg-light">
                <div class="card-footer">
				<div class="text-muted border-bottom-0"> 
				@php
			$profile = $value['REPORTING_MANAGER_ID'];
			@endphp
        <a href="{{ route('profile.show',$profile)}}"> <h3 class="card-title">{{ $value['NAME'] }}</h3></a>
				  </div>
                </div>
				<br>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-7">
                    <div class="text-muted text-sm"><b>Employee Code </b>&nbsp;{{ $value['CODE'] }}</div>
                    <div class="text-muted text-sm"><b>Designation </b>&nbsp;{{ $value['DESIGNATION'] }}</div>
                  <br>
                      <ul class="ml-4 mb-0 fa-ul text-muted">
                       @if(filled($value['MOB']))<li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span>{{ $value['MOB'] }}</li>@endif
                      @if(filled($value['EMAIL']))<li class="small"><span class="fa-li"><i class="fas fa-envelope-square"></i></span>{{ $value['EMAIL'] }}</li>@endif
					  @if(filled($value['REPORTING_MANAGER']))<li class="small"><span class="fa-li"><i class='fas fa-user-tie'></i></span>{{ $value['REPORTING_MANAGER'] }}</li>@endif
					  @if(filled($value['AREA']))<li class="small"><span class="fa-li"><i class="fas fa-map-marker-alt"></i></span>{{ $value['AREA'] }}</li>@endif
					  @if(filled($value['PLANT']))<li class="small"><span class="fa-li"><i class="fas fa-industry"></i></span>{{ $value['PLANT'] }}</li>@endif
					 
					  </ul>
                    </div>
                    <div class="col-5 text-center" href="#">
                     <a href="{{ route('profile.show',$profile)}}"> 
					 @if(filled($value['IMAGE']))
					 <img src="{{ URL::asset('storage/'.$value['IMAGE']) }}"  alt="" class="img-circle img-fluid">
					@else
					<img src="/suprsales_resource/dist/img/usericon.png" alt="" class="img-circle img-fluid">	
                    @endif
					</a>
					</div>
					
                  </div>
                </div>
				<div class="card-footer">
				<div class="panel-group">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" href="#collapse1"> <h3 class="card-title">View Team</h3></a> 
        </h4>
		&nbsp;&nbsp;&nbsp;&nbsp;<span class="badge badge-success">{{ $value['TOTAL_EMPLOYEE'] }} Members</span>        
      </div>
	 
      <div id="collapse1" class="panel-collapse collapse">
        <div class="panel-body">
		 <hr>
		 <ul class="users-list clearfix">
		 @foreach ($value['EMPLOYEE'] as $employee)
                      <li>
					   @php
			$profile = $employee['EMP_ID'];
			@endphp
                        <a href="{{ route('profile.show',$profile)}}">
						@if(filled($employee['EMP_IMAGE']))
						<img src="{{ URL::asset('storage/'.$employee['EMP_IMAGE']) }}" alt="">
					@else
					<img src="/suprsales_resource/dist/img/usericon.png"  alt="">	
               @endif
			   </a>
						<a class="users-list-name" href="{{ route('profile.show',$profile)}}">{{ $employee['EMP_NAME'] }}</a>
                        
                      </li>
					   @endforeach
                      
                    </ul>
		</div>
        
      </div>
    </div>
  </div>
                </div>
				
				
              </div>
			  
            </div>
			@endisset
			 @foreach ($value['EMPLOYEE'] as $employee)
			
			
			<div class="col-4">
              <div class="card bg-light">
                <div class="card-footer">
				<div class="text-muted border-bottom-0"> 
				@php
			$profile = $employee['EMP_ID'];
			@endphp
        <a href="{{ route('profile.show',$profile)}}"> <h3 class="card-title">{{ $employee['EMP_NAME'] }}</h3></a>
				  </div>
                </div>
				<br>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-7">
                    <div class="text-muted text-sm"><b>Employee Code </b>&nbsp;{{ $employee['EMP_CODE'] }}</div>
                    <div class="text-muted text-sm"><b>Designation </b>&nbsp;{{ $employee['EMP_DESIGNATION'] }}</div>
                   <br>
                      <ul class="ml-4 mb-0 fa-ul text-muted">
                      @if(filled($employee['EMP_MOBILE_NO']))<li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span>{{ $employee['EMP_MOBILE_NO'] }}</li>@endif
                       @if(filled($employee['EMP_EMAIL']))<li class="small"><span class="fa-li"><i class="fas fa-envelope-square"></i></span>{{ $employee['EMP_EMAIL'] }}</li>@endif
					   @if(filled($employee['REPORTING_MANAGER']))<li class="small"><span class="fa-li"><i class='fas fa-user-tie'></i></span>{{ $employee['REPORTING_MANAGER'] }}</li>@endif
					   @if(filled($employee['AREA']))<li class="small"><span class="fa-li"><i class="fas fa-map-marker-alt"></i></span>{{ $employee['AREA'] }}</li>@endif
					   @if(filled($employee['PLANT']))<li class="small"><span class="fa-li"><i class="fas fa-industry"></i></span>{{ $employee['PLANT'] }}</li>@endif
					 
					  </ul>
                    </div>
                    <div class="col-5 text-center">
                      <a href="{{ route('profile.show',$profile)}}">
					  @if(filled($employee['EMP_IMAGE']))
					  <img src="{{ URL::asset('storage/'.$employee['EMP_IMAGE']) }}"  alt="" class="img-circle img-fluid">
				  @else
					<img src="/suprsales_resource/dist/img/usericon.png"  alt="" class="img-circle img-fluid">	
				  @endif
				  </a>
                    
					</div>
                  </div>
                </div>
                <div class="card-footer">
				<div class="panel-group">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" href="#collapse2"> <h3 class="card-title">View Team</h3></a> 
        </h4>
		&nbsp;&nbsp;&nbsp;&nbsp;<span class="badge badge-success">{{ $employee['TOTAL_EMPLOYEE2'] }} Members</span>        
      </div>
	 
      <div id="collapse2" class="panel-collapse collapse">
        <div class="panel-body">
		 <hr>
		 <ul class="users-list clearfix">
		  @foreach ($employee['EMPLOYEE'] as $emp)
                      <li>
					   @php
			$profile = $emp['EMP_ID'];
			@endphp
                       <a href="{{ route('profile.show',$profile)}}">
					   @if(filled($emp['EMP_IMAGE']))
					   <img src="{{ URL::asset('storage/'.$emp['EMP_IMAGE']) }}" alt="">
				   @else
					<img src="/suprsales_resource/dist/img/usericon.png" alt="">	
				   @endif
				   </a>
                        <a class="users-list-name" href="{{ route('profile.show',$profile)}}">{{ $emp['EMP_NAME'] }}</a>
                        
                      </li>
                    @endforeach 
                     
                    </ul>
		</div>
        
      </div>
    </div>
  </div>
                </div>
              </div>
            
     </div>
	    
			 @foreach ($employee['EMPLOYEE'] as $emp)
			
			<div class="col-4">
              <div class="card bg-light">
                <div class="card-footer">
				<div class="text-muted border-bottom-0"> 
				@php
			$profile = $emp['EMP_ID'];
			@endphp
        <a href="{{ route('profile.show',$profile)}}"> <h3 class="card-title">{{ $emp['EMP_NAME'] }}</h3></a>
				  </div>
                </div>
				<br>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-7">
                      <div class="text-muted text-sm"><b>Employee Code </b>&nbsp;{{ $emp['EMP_CODE'] }}</div>
                    <div class="text-muted text-sm"><b>Designation </b>&nbsp;{{ $emp['EMP_DESIGNATION'] }}</div>
                  <br>
                      <ul class="ml-4 mb-0 fa-ul text-muted">
                      @if(filled($emp['EMP_MOBILE_NO'])) <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span>{{ $emp['EMP_MOBILE_NO'] }}</li>@endif
                      @if(filled($emp['EMP_EMAIL']))<li class="small"><span class="fa-li"><i class="fas fa-envelope-square"></i></span>{{ $emp['EMP_EMAIL'] }}</li>@endif
					  @if(filled($emp['REPORTING_MANAGER']))<li class="small"><span class="fa-li"><i class='fas fa-user-tie'></i></span>{{ $emp['REPORTING_MANAGER'] }}</li>@endif
					  @if(filled($emp['AREA']))<li class="small"><span class="fa-li"><i class="fas fa-map-marker-alt"></i></span>{{ $emp['AREA'] }}</li>@endif
					  @if(filled($emp['PLANT']))<li class="small"><span class="fa-li"><i class="fas fa-industry"></i></span>{{ $emp['PLANT'] }}</li>@endif
					 
					  </ul>
                    </div>
                    <div class="col-5 text-center">
                      <a href="{{ route('profile.show',$profile)}}">
					   @if(filled($emp['EMP_IMAGE']))
					  <img src="{{ URL::asset('storage/'.$emp['EMP_IMAGE']) }}"  alt="" class="img-circle img-fluid">
				  @else
					<img src="/suprsales_resource/dist/img/usericon.png" alt="" class="img-circle img-fluid">	
				  @endif
				  </a>
                    </div>
                  </div>
                </div>
                <div class="card-footer">
				<div class="panel-group">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" href="#collapse2"> <h3 class="card-title">View Team</h3></a> 
        </h4>
		&nbsp;&nbsp;&nbsp;&nbsp;<span class="badge badge-success">{{ $emp['TOTAL_EMPLOYEE3'] }} Members</span>        
      </div>
	 
      <div id="collapse2" class="panel-collapse collapse">
        <div class="panel-body">
		 <hr>
		 <ul class="users-list clearfix">
		  @foreach ($emp['EMPLOYEE'] as $emps)
                      <li>
					   @php
			$profile = $emps['EMP_ID'];
			@endphp
                       <a href="{{ route('profile.show',$profile)}}">
					    @if(filled($emps['EMP_IMAGE']))
					   <img src="{{ URL::asset('storage/'.$emps['EMP_IMAGE']) }}"  alt="">
				   @else
					<img src="/suprsales_resource/dist/img/usericon.png"   alt="">	
				   @endif
				   </a>
                        <a class="users-list-name" href="{{ route('profile.show',$profile)}}">{{ $emps['EMP_NAME'] }}</a>
                        
                      </li>
                   @endforeach  
                     
                    </ul>
		</div>
        
      </div>
    </div>
  </div>
                </div>
              </div>
			  
            </div>
			
			
			@endforeach 
			
			 @endforeach
			
			</div>
	  
          
        </div>
        <!-- /.card-body -->
       
        <!-- /.card-footer -->
     
      <!-- /.card -->
@endforeach
 @endisset
			@empty($details)
			<script>toastr.warning("No records found.");</script>
			@endempty
    </section>
@endsection