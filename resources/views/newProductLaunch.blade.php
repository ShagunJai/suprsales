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
{{-- After verification It is for create Retailer inside the user --}}

      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-4">
              <h1>New Product Launch</h1>
            </div>
    {{-- It is the link of Home btn top right corner --}}
            <div class="col-sm-8">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('dashboard.index')}}">Home</a></li>
                <li class="breadcrumb-item active">New Product Launch</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
<section class="content">
     <div class="container-fluid">


				<div class="card">
				<div class="card-header">
                <h3 class="card-title">Upload New Product on YouTube</h3>&nbsp;<ion-icon name="logo-youtube" style="font-size:24px;color:red"></ion-icon> 
              </div>
			  <div class="card-body">
             	<form class="form-horizontal" action="" method="POST" >
                 <div class="card-body">
                       
                  
                      <div class="row">
                      <div class="col-md-12">
                        <label>Header*</label>
                        <div class="form-group">
                        <input name="youTubeAbout" class="form-control" placeholder="About The Video" required>
                        </div>
                      </div>

                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <label>Link*</label>
                        <div class="form-group">
                        <input name="youTubeLink" class="form-control" placeholder="Link" required>
                        </div>
                      </div>

                    </div>

                  



                    <div class="row">
                      <div class="col-md-12">
                      <label>Region*</label>

                      <select class="form-control select2" multiple="multiple" onchange="myRegion(event)" name="regionname[]" data-placeholder="Select Region" id="regionname"data-dropdown-css-class="select2-teal" required>
					 
					             @isset($region)
					             @foreach ($region as $valu)
					            <option  value="{{ $valu['REGION_ID'] }}">{{ $valu['REGION_NAME'] }}</option>
					            @endforeach
					            @endisset
				              </select>
                        </div>
                      
					 
                    </div>
                      </div>
					  <div class="card-footer">
                    <button type="submit" class="btn btn-success btn-normal" style="float:left;" onclick="spinner()"><i class="fa fa-upload"></i>Save</button>
                  <div class="loader">
					  <div class="loading">
					  </div>
					</div>
				  </div>

                  </div>
				  </form>  
    </div>
</section>

      
@endsection
