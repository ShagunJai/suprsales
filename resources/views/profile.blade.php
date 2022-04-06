@extends('layouts.show_by_id')
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
		  <div class="row">
            <h1>Profile</h1>&nbsp;&nbsp;&nbsp;&nbsp;
			<button class="btn btn-info"><a href="Javascript:history.go(-1);Location.reload()" class="text-white"><i class="fas fa-arrow-alt-circle-left"></i> Go Back</a></button>
           
          </div>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard.index')}}">Home</a></li>
              <li class="breadcrumb-item active">User Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
		@isset($data)
		@foreach ($data as $value)
          <div class="col-md-4">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">

            
      <form class="form-horizontal" method="GET">
              {{ csrf_field() }}
              <div class="card-body box-profile">
                <div class="text-center">
				@if(filled($value['EMP_IMAGE']))
                  <img class="profile-user-img img-fluid img-circle"
                       src="{{ URL::asset('storage/'.$value['EMP_IMAGE']) }}"
                       alt="User profile picture">
					   @else
		<img src="/suprsales_resource/dist/img/usericon.png" class="profile-user-img img-fluid img-circle" alt="User">	
        @endif
                </div>
				
                <h3 class="profile-username text-center">{{ $value['EMP_NAME'] }}</h3>
					
                <p class="text-muted text-center">{{ $value['EMP_DESIGNATION'] }}</p>
					
                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Mobile</b> <a class="float-right">{{ $value['EMP_MOBILE_NO'] }}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Email</b> <a class="float-right">{{ $value['EMP_EMAIL'] }}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Report To</b> <a class="float-right">{{ $value['REPORTING_MANAGER'] }}</a>
                  </li>
                </ul>

                
              </div>
              <!-- /.card-body -->
			  </form>
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-8">
            <div class="card">
              <div class="card-header p-2 bg-primary">
                <ul class="nav nav-pills red">
                  <li class="nav-item"><a class="nav-link text-white" href="#activity" data-toggle="tab">Details</a></li>
                 
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <!-- Post -->
					
                   <form class="form-horizontal">
                
				<dl class="form-group row">
                  <dt class="col-sm-3"><a><b>Employee ID</b></a></dt>
                  <dd class="col-sm-7">{{ $value['EMP_ID'] }}</dd>
                </dl>
				<dl class="form-group row">
                  <dt class="col-sm-3"><a><b>Employee Type</b></a></dt>
                  <dd class="col-sm-7">		  
		    @if ($value['EMP_CONTRACT_TYPE'] =='0')
				<span class='badge badge-secondary'>Permanent</span>
			@elseif ($value['EMP_CONTRACT_TYPE'] =='1')
				<span class='badge badge-info'>Contract</span>
				@endif
				</dd>
                </dl>
				<dl class="form-group row">
                  <dt class="col-sm-3"><a><b>Is Admin</b></a></dt>
                  <dd class="col-sm-7">
				  @if ($value['IS_ADMIN'] =='0')
				        No 
			  @elseif ($value['IS_ADMIN'] =='1')
			          Yes &nbsp;&nbsp;
					   @if ($value['EMP_TYPE'] =='0')
								<span class='badge badge-secondary'>Depot Manager</span>
						@elseif ($value['EMP_TYPE'] =='1')
								<span class='badge badge-primary'>Org Admin</span>
					     @endif
					  @endif
					  </dd>
                </dl>
				<dl class="form-group row">
                  <dt class="col-sm-3"><a><b>Is Approver</b></a></dt>
                  <dd class="col-sm-7">
				  @if ($value['IS_APPROVER'] =='0')
				    No
				  @elseif ($value['IS_APPROVER'] =='1')
				  Yes
				  @endif
				  </dd>
                </dl>
				<dl class="form-group row">
                  <dt class="col-sm-3"><a><b>Region</b></a></dt>
                  <dd class="col-sm-7">
				  @foreach($value['REGION'] as $valu)
				  {{ $loop->first ? '' : ', ' }}
					{{ $valu['REGION_NAME'] }}
				  @endforeach
				  </dd>
                </dl>
				<dl class="form-group row">
                  <dt class="col-sm-3"><a><b>Plant</b></a></dt>
                  <dd class="col-sm-7">{{ $value['PLANT'] }}</dd>
                </dl>
               
              </form>
                  </div>
                  <!-- /.tab-pane -->
                  
                  <!-- /.tab-pane -->

                  
                    
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
			@endforeach
			@endisset
			@empty($data)
			<script>toastr.warning("No records found.");</script>
			@endempty
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
     <!-- /.container-fluid -->
    </section>
@endsection