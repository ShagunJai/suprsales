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
            <h1>Create Order</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Create Order</li>
            </ol>
          </div>
        </div>
      </div>
      <br>
		<div class="row"><small>&nbsp;&nbsp;<ion-icon name="water" color="primary"></ion-icon>&nbsp;Liquid&nbsp;&nbsp;&nbsp;<ion-icon name="layers" color="success"></ion-icon>&nbsp;Unit&nbsp;&nbsp;&nbsp;<ion-icon name="apps" color="warning"></ion-icon>&nbsp;Dust</small></div>
  
 </section>

<div>
@isset($custo)
				  @foreach ($custo as $valu)

         
<input type="hidden" name="approve_status" id="approve_status" class="form-control"  value="{{$valu['APPROVE_STATUS']}}">
<input type="hidden" name="acknowledge_status" id="acknowledge_status" class="form-control"  value="{{$valu['ACKNOWLEDGE_STATUS']}}">

@endforeach
@endisset
</div> 


                <div class="card">
                <div class="card-body">
			  
			 	
              
                  
                  <h6 style="text-align:right;">* - Price may varry according to plant</h6>
                  <br>
                  <table id="createorder" class="table table-bordered table-hover" >
			  <thead>
                  <tr style="text-align:center;">
                    <th></th>
				            <th></th>
                    <th>SKU </th>
                    <th>Description</th>
                    <th>Region</th>
                    <th>Unit</th>
                    <th>Estimated Price*</th>
                    <th >Quantity</th>
                    <th>Type</th>
                   
                    
                    
        
                  </tr>
                  </thead>
                  <tbody>

                  @isset($details)
				  @foreach ($details as $values)
                    <tr style="text-align:center;">
                      <td>
</td>
                      @if (empty($values['CATEGORY_NAME'] ))
				<td> 
			  <div class="text-primary text-lg" title="Undefined Category"><ion-icon name="help-outline"></ion-icon>
                       
                   </div>   </td>
				   @else
             @if ($values['CATEGORY_NAME'] =='LIQUID')
							<td> 
			  <div class="text-primary text-lg" title="Liquid"><ion-icon name="water"></ion-icon>
                       
                   </div>   </td>
						@elseif ($values['CATEGORY_NAME'] =='UNIT')
							<td> <div class="text-success text-lg" title="Unit"><ion-icon name="layers"></ion-icon>
                    </div>  </td>
						@elseif ($values['CATEGORY_NAME'] =='DUST')
							 <td><div class="text-warning text-lg" title="Dust"><ion-icon name="apps"></ion-icon> 
                 </div>    </td>
						@endif
			@endif
                      <td>{{$values['SKU_ID']}}</td>
                      <td style="text-align:left;">{{$values['SKU_DESCRIPTION']}}</td>
                    
                      
                     
                      <td>{{$values['REGION_NAME']}}</td>
                      <td>{{$values['UNIT']}}</td>
                      <td>{{$values['PRICE']}}</td>
                      <td > <input   class="form-control" size="4" style="text-align:center;" name="quantity" id="qnt" value="" > </input></td>
                      <td>{{$values['CATEGORY_NAME']}}</td>
                      <td>{{$values['FACTOR']}}</td>
                      
                       
                    </tr>


          @endforeach
					   @endisset
        
        </tbody>
      
       
                  </table>
                  
                 
                
			 
</div></div>

@endsection