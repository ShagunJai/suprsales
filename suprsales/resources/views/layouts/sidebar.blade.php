 <aside class="main-sidebar sidebar-dark-navy elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link bg-light">
      <img src="suprsales_resource/dist/img/suprsales.png" class="brand-image img-circle elevation-3"
           style="opacity: .8" style="height:10%; width:10%;">
      <span class="brand-text font-weight-light"><img src="suprsales_resource/dist/img/SuprsalesText.png" style="height:50%; width:50%;"></span>
    </a>
@php
  $username = Auth::user()->name;
  $image = Auth::user()->image;
  @endphp
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
     

      <!-- Sidebar Menu -->
	
      <nav class="mt-2">
	  
         <ul class="nav nav-pills nav-sidebar nav-flat nav-compact flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
		@isset($ann)
			@php
			$count = 0;
			@endphp
			
			 @foreach ($ann as $val)
			 @if($val['auth_reference'] == 'adminn' || $val['auth_reference'] == 'empss' || $val['auth_reference'] == 'createemployee' || $val['auth_reference'] == 'assignplant' || $val['auth_reference'] == 'changelevel')
		  <li class="nav-item has-treeview">
		  @if($count==0)
            <a href="#" class="nav-link">
             <i class="nav-icon fas fa-user-tie"></i>
              <p>
                User
				<i class="right fas fa-angle-left">
				
				</i>
			  </p>
            </a>
			@endif
			
			@php
			$count++;
			@endphp
            <ul class="nav nav-treeview">
			@foreach ($ann as $val)
			@if($val['auth_reference'] == 'adminn')
              <li class="nav-item">
			  
                <a href="adminn" class="nav-link">
                  <i class="nav-icon fas fa-users-cog"></i>
                  <p>All Admins</p>
                </a>
				
              </li>
			 @endif
			 @if($val['auth_reference'] == 'empss')
              <li class="nav-item">
			   
                <a href="empss" class="nav-link">
                 <i class="nav-icon fas fa-user-friends"></i>
                  <p>All Employees</p>
                </a>
				
              </li>
			  
			 @endif 
			 @if($val['auth_reference'] == 'createemployee')
              <li class="nav-item">
                <a href="createemployee" class="nav-link">
                  <i class="nav-icon fas fa-plus-square"></i>
                  <p>Create Employee</p>
                </a>
              </li>
			  @endif
			 @if($val['auth_reference'] == 'assignplant')
		  <li class="nav-item">
            <a href="assignplant" class="nav-link">
              <i class="nav-icon fas fa-user-check"></i>
              <p>
                Assign Region
              </p>
            </a>
          </li>
		  @endif
		  @if($val['auth_reference'] == 'changelevel')
			  <li class="nav-item">
                <a href="changelevel" class="nav-link">
					<i class="nav-icon fas fa-layer-group"></i>
                  <p>Level</p>
                </a>
              </li>
			  @endif
		  @endforeach	
            </ul>
			
          </li>
		  @endif 
		  @endforeach	
			
			
			@php
			$counter = 0;
			@endphp
			
			@foreach ($ann as $val)
             @if($val['auth_reference'] == 'auths' || $val['auth_reference'] == 'screens' || $val['auth_reference'] == 'mods')
			<li class="nav-item has-treeview">
		@if($counter==0)
            <a href="#" class="nav-link">
            <i class="nav-icon fas fa-user-lock"></i>
              <p>
                 Authorization
                <i class="right fas fa-angle-left">
				</i>
              </p>
            </a>
			@endif
			
			@php
			$counter++;
			@endphp
			
            <ul class="nav nav-treeview">
			@foreach ($ann as $val)
			 @if($val['auth_reference'] == 'auths')
              <li class="nav-item">
                <a href="auths" class="nav-link">
                  <i class="nav-icon fas fa-plus-square"></i>
                  <p>Create Authorization</p>
                </a>
              </li>
			  @endif
			  @if($val['auth_reference'] == 'screens')
              <li class="nav-item">
                <a href="screens" class="nav-link">
                  <i class="nav-icon fas fa-tablet-alt"></i>
                  <p>Create Screen</p>
                </a>
              </li>
			  @endif
			  @if($val['auth_reference'] == 'mods')
			  <li class="nav-item">
                <a href="mods" class="nav-link">
                 <i class="nav-icon fas fa-cubes"></i>
                  <p>Create Module</p>
                </a>
              </li>
			  @endif
			  @endforeach
            </ul>
          </li>
		  @endif
              @endforeach
		   
		   @php
			$counterr = 0;
			@endphp
			
			@foreach ($ann as $val)
             @if($val['auth_reference'] == 'roles' || $val['auth_reference'] == 'roless')
		  <li class="nav-item has-treeview">
	  @if($counterr==0)
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user-tag"></i>
              <p>
                Role
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
			@endif
			
			@php
			$counterr++;
			@endphp
			
            <ul class="nav nav-treeview">
			@foreach ($ann as $val)
			@if($val['auth_reference'] == 'roles')
              <li class="nav-item">
                <a href="roles" class="nav-link">
                  <i class="nav-icon fas fa-plus-square"></i>
                  <p>Create</p>
                </a>
              </li>
			  @endif
			  @if($val['auth_reference'] == 'roless')
              <li class="nav-item">
                <a href="roless" class="nav-link">
                  <i class="nav-icon fas fa-user-check"></i>
                  <p>Assign</p>
                </a>
              </li>
			  @endif
			  @endforeach
            </ul>
          </li>
		  @endif
			  @endforeach
		  
			@php
			$counters = 0;
			@endphp
			
			@foreach ($ann as $val)
             @if($val['auth_reference'] == 'custs' || $val['auth_reference'] == 'customer' || $val['auth_reference'] == 'mycutomer' || $val['auth_reference'] == 'createfarmer' || $val['auth_reference'] == 'createretailer' || $val['auth_reference'] == 'verifydistributor')
		  <li class="nav-item has-treeview">
	  @if($counters==0)
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Customer
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
			@endif
			
			@php
			$counters++;
			@endphp
			
            <ul class="nav nav-treeview">
			@foreach ($ann as $val)
			@if($val['auth_reference'] == 'custs')
              <li class="nav-item">
                <a href="custs" class="nav-link">
                  <i class="nav-icon fas fa-user-check"></i>
                  <p>Assign</p>
                </a>
              </li>
			  @endif
			  @if($val['auth_reference'] == 'customer')
              <li class="nav-item">
                <a href="customer" class="nav-link">
                  <i class="nav-icon fas fa-eye"></i>
                  <p>All Customers</p>
                </a>
              </li>
			  @endif
			  @if($val['auth_reference'] == 'mycutomer')
			   <li class="nav-item">
                <a href="mycutomer" class="nav-link">
                  <i class="nav-icon fas fa-users"></i>
                  <p>My Customers</p>
                </a>
              </li>
			   @endif
			@if($val['auth_reference'] == 'createfarmer')  
		  <li class="nav-item">
            <a href="createfarmer" class="nav-link">
              <i class="nav-icon fas fa-plus-square"></i>
              <p>
                Create Farmer
              </p>
            </a>
          </li>
		  @endif
		  @if($val['auth_reference'] == 'createretailer')
		  <li class="nav-item">
            <a href="createretailer" class="nav-link">
              <i class="nav-icon fas fa-plus-square"></i>
              <p>
                Create Retailer
              </p>
            </a>
          </li>
		  @endif
		   @if($val['auth_reference'] == 'verifydistributor')
		  <li class="nav-item">
            <a href="verifydistributor" class="nav-link">
             <i class="nav-icon fas fa-user-check"></i>
              <p>
                Verify Distributor
              </p>
            </a>
          </li>
		  @endif
			@endforeach  
            </ul>
          </li>
		  @endif
		 @endforeach
		  
			@php
			$counterss = 0;
			@endphp
			
			@foreach ($ann as $val)
             @if($val['auth_reference'] == 'asales'|| $val['auth_reference'] == 'myorder' || $val['auth_reference'] == 'regionorder' || $val['auth_reference'] == 'depotorder')
		   <li class="nav-item has-treeview">
	   @if($counterss==0)
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-line"></i>
              <p>
                Sales
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
			@endif
			
			@php
			$counterss++;
			@endphp
            <ul class="nav nav-treeview">
			@foreach ($ann as $val)
			  @if($val['auth_reference'] == 'asales')
              <li class="nav-item">
                <a href="asales" class="nav-link">
                  <i class="nav-icon fas fa-truck"></i>
                  <p>All Orders</p> 
                </a>
              </li>
			  @endif
			  @if($val['auth_reference'] == 'myorder')
              <li class="nav-item">
                <a href="myorder" class="nav-link">
                  <i class="nav-icon fas fa-truck"></i>
                  <p>My Orders</p> 
                </a>
              </li>
			  @endif
			  @if($val['auth_reference'] == 'regionorder')
              <li class="nav-item">
                <a href="regionorder" class="nav-link">
                  <i class="nav-icon fas fa-truck"></i>
                  <p>My Region Orders</p> 
                </a>
              </li>
			  @endif
			  @if($val['auth_reference'] == 'depotorder')
              <li class="nav-item">
                <a href="depotorder" class="nav-link">
                  <i class="nav-icon fas fa-truck"></i>
                  <p>My Depot Orders</p> 
                </a>
              </li>
			  @endif
			  @endforeach  
            </ul>
          </li>
		  @endif
		@endforeach 
		
		
		@php
			$salesview = 0;
			@endphp
			
			@foreach ($ann as $val)
             @if($val['auth_reference'] == 'stock' || $val['auth_reference'] == 'stocklist' || $val['auth_reference'] == 'plantview' || $val['auth_reference'] == 'myplant' || $val['auth_reference'] == 'material' || $val['auth_reference'] == 'packing')
		   <li class="nav-item has-treeview">
	   @if($salesview==0)
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-shopping-cart"></i>
              <p>
                Products
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
			@endif
			
			@php
			$salesview++;
			@endphp
            <ul class="nav nav-treeview">
			@foreach ($ann as $val)
			@if($val['auth_reference'] == 'stock')
              <li class="nav-item">
                <a href="stock" class="nav-link">
                  <i class="nav-icon fas fa-shopping-cart"></i>
                  <p>All Stocks</p>
                </a>
              </li>
			  @endif
			  @if($val['auth_reference'] == 'stocklist')
              <li class="nav-item">
                <a href="stocklist" class="nav-link">
                  <i class="nav-icon fas fa-shopping-cart"></i>
                  <p>My Stocks</p>
                </a>
              </li>
			  @endif
			   @if($val['auth_reference'] == 'plantview')
		  <li class="nav-item">
            <a href="plantview" class="nav-link">
              <i class="nav-icon fas fa-industry"></i>
              <p>
                All Plants
              </p>
            </a>
          </li>
		  @endif
		  @if($val['auth_reference'] == 'myplant')
		  <li class="nav-item">
            <a href="myplant" class="nav-link">
              <i class="nav-icon fas fa-industry"></i>
              <p>
                My Plants
              </p>
            </a>
          </li>
		  @endif
		  @if($val['auth_reference'] == 'material')
              <li class="nav-item">
                <a href="material" class="nav-link">
                  <i class="nav-icon fas fa-cube"></i>
                  <p>Material Groups</p>
                </a>
              </li>
			 
		  @endif
		   @if($val['auth_reference'] == 'packing')
			  <li class="nav-item">
                <a href="packing" class="nav-link">
                  <i class="nav-icon fas fa-box-open"></i>
                  <p>Packaging Units</p>
                </a>
              </li>
			  @endif
		@endforeach
		 </ul>
          </li>
			 @endif
			  @endforeach  
           
		
		
		@php
			$county = 0;
			@endphp
			
			@foreach ($ann as $val)
             @if($val['auth_reference'] == 'createclaim' || $val['auth_reference'] == 'viewclaim' || $val['auth_reference'] == 'approveclaim' || $val['auth_reference'] == 'allclaims' || $val['auth_reference'] == 'rejectedclaim')
           <li class="nav-item has-treeview">
	   @if($county==0)
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-file-signature"></i>
              <p>
                Claim 
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
			@endif
			
			@php
			$county++;
			@endphp
            <ul class="nav nav-treeview">
			@foreach ($ann as $val)
			@if($val['auth_reference'] == 'createclaim')
              <li class="nav-item">
                <a href="createclaim" class="nav-link">
                  <i class="nav-icon fas fa-plus-square"></i>
                  <p>Create Claim</p>
                </a>
              </li>
			  @endif
			  @if($val['auth_reference'] == 'viewclaim')
			  <li class="nav-item">
                <a href="viewclaim" class="nav-link">
                  <i class="nav-icon fas fa-eye"></i>
                  <p>My Claims</p>
                </a>
              </li>
			  @endif
			  @if($val['auth_reference'] == 'allclaims')
			  <li class="nav-item">
                <a href="allclaims" class="nav-link">
                  <i class="nav-icon fas fa-eye"></i>
                  <p>All Claims</p>
                </a>
              </li>
			  @endif
			  @if($val['auth_reference'] == 'approveclaim')
			  <li class="nav-item">
                <a href="approveclaim" class="nav-link">
                  <i class="nav-icon fas fa-user-check"></i>
                  <p>Approve Claim</p>
                </a>
              </li>
			  @endif
			   @if($val['auth_reference'] == 'rejectedclaim')
			  <li class="nav-item">
                <a href="rejectedclaim" class="nav-link">
                  <i class="nav-icon fas fa-exclamation-triangle"></i>
                  <p>Rejected Claims</p>
                </a>
              </li>
			  @endif
			  @endforeach  
            </ul>
          </li>
		  @endif
			  @endforeach  
			
			

		  @php
			$counteryu = 0;
			@endphp
			
			@foreach ($ann as $val)
             @if($val['auth_reference'] == 'contactss' || $val['auth_reference'] == 'conatctview')
          <li class="nav-item has-treeview">
	  @if($counteryu==0)
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-address-card"></i>
              <p>
               Contacts
                <i class="right fas fa-angle-left"></i> 
              </p>
			 
            </a>
			@endif
			
			@php
			$counteryu++;
			@endphp
            <ul class="nav nav-treeview">
			@foreach ($ann as $val)
			@if($val['auth_reference'] == 'contactss')
              <li class="nav-item">
                <a href="contactss" class="nav-link">
                  <i class="nav-icon fas fa-sitemap"></i>
                  <p>Org Chart</p>
                </a>
              </li>
			  @endif
			  @if($val['auth_reference'] == 'conatctview')
              <li class="nav-item">
                <a href="conatctview" class="nav-link">
                 <i class="nav-icon fas fa-address-card"></i>
                  <p>My Contacts</p>
                </a>
              </li>
			  @endif
			  @endforeach
            </ul>
          </li>
          @endif
		@endforeach
		
		
			
			@php
			$countery = 0;
			@endphp
			
			@foreach ($ann as $val)
             @if($val['auth_reference'] == 'myticket' || $val['auth_reference'] == 'ticket' || $val['auth_reference'] == 'openticket')
          <li class="nav-item has-treeview">
	  @if($countery==0)
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-ticket-alt"></i>
              <p>
                Tickets 
				<i class="right fas fa-angle-left"></i>
              </p>
			  
            </a>
			@endif
			
			@php
			$countery++;
			@endphp
            <ul class="nav nav-treeview">
			@foreach ($ann as $val)
			@if($val['auth_reference'] == 'myticket')
              <li class="nav-item">
                <a href="myticket" class="nav-link">
                  <i class="nav-icon fas fa-ticket-alt"></i>
                  <p>My Tickets</p>
                </a>
              </li>
			  @endif
			  @if($val['auth_reference'] == 'ticket')
              <li class="nav-item">
                <a href="ticket" class="nav-link">
                 <i class="nav-icon fas fa-eye"></i>
                  <p>All Tickets</p>
                </a>
              </li>
			  @endif
			  @if($val['auth_reference'] == 'openticket')
              <li class="nav-item">
                <a href="openticket" class="nav-link">
                <i class="nav-icon fas fa-user-check"></i>
                  <p>Assigned Tickets</p>
                </a>
              </li>
			  @endif
			  @endforeach
            </ul>
          </li>
          @endif
		@endforeach
		
		
		@php
			$tic_comp = 0;
			@endphp
			
			@foreach ($ann as $val)
             @if($val['auth_reference'] == 'component' || $val['auth_reference'] == 'assigncomponent')
          <li class="nav-item has-treeview">
	  @if($tic_comp==0)
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-swatchbook"></i>
              <p>
                Ticket Component 
				<i class="right fas fa-angle-left"></i>
              </p>
			  
            </a>
			@endif
			
			@php
			$tic_comp++;
			@endphp
            <ul class="nav nav-treeview">
			@foreach ($ann as $val)
			@if($val['auth_reference'] == 'component')
              <li class="nav-item">
                <a href="component" class="nav-link">
                  <i class="nav-icon fas fa-plus-square"></i>
                  <p>Create Component</p>
                </a>
              </li>
			  @endif
			  @if($val['auth_reference'] == 'assigncomponent')
              <li class="nav-item">
                <a href="assigncomponent" class="nav-link">
                  <i class="nav-icon fas fa-user-check"></i>
                  <p>Assign Component</p>
                </a>
              </li>
			  @endif
			  @endforeach
            </ul>
          </li>
          @endif
		@endforeach
		
		 @php
			$countersss1 = 0;
			@endphp
			
			@foreach ($ann as $val)
             @if($val['auth_reference'] == 'task' || $val['auth_reference'] == 'assigntask' || $val['auth_reference'] == 'delegatedtask')
          <li class="nav-item has-treeview">
	  @if($countersss1==0)
            <a href="#" class="nav-link">
		<i class="nav-icon fas fa-tasks"></i>
              <p>
                Task
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
			@endif
			
			@php
			$countersss1++;
			@endphp
            <ul class="nav nav-treeview">
			@foreach ($ann as $val)
			@if($val['auth_reference'] == 'task')
              <li class="nav-item">
                <a href="task" class="nav-link">
                  <i class="nav-icon fas fa-plus-square"></i>
                  <p>Create Task</p>
                </a>
              </li>
			  @endif
			 @if($val['auth_reference'] == 'assigntask')
              <li class="nav-item">
                <a href="assigntask" class="nav-link">
                  <i class="nav-icon fas fa-user-check"></i>
                  <p>Assigned Tasks</p>
                </a>
              </li>
			  @endif
			   @if($val['auth_reference'] == 'delegatedtask')
              <li class="nav-item">
                <a href="delegatedtask" class="nav-link">
                  <i class="nav-icon fas fa-sitemap"></i>
                  <p>Delegated Tasks</p>
                </a>
              </li>
			  @endif
			  @endforeach
            </ul>
          </li>
          @endif
		@endforeach    
		
			@php
			$countersss = 0;
			@endphp
			
			@foreach ($ann as $val)
             @if($val['auth_reference'] == 'announce' || $val['auth_reference'] == 'announcetype' || $val['auth_reference'] == 'myann')
          <li class="nav-item has-treeview">
	  @if($countersss==0)
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-bullhorn"></i>
              <p>
                Announcement
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
			@endif
			
			@php
			$countersss++;
			@endphp
            <ul class="nav nav-treeview">
			@foreach ($ann as $val)
			@if($val['auth_reference'] == 'announce')
              <li class="nav-item">
                <a href="announce" class="nav-link">
                  <i class="nav-icon fas fa-plus-square"></i>
                  <p>Create</p>
                </a>
              </li>
			  @endif
			  @if($val['auth_reference'] == 'announcetype')
              <li class="nav-item">
                <a href="announcetype" class="nav-link">
                  <i class="nav-icon fas fa-plus-square"></i>
                  <p>Create Type</p>
                </a>
              </li>
			  @endif
			   @if($val['auth_reference'] == 'myann')
              <li class="nav-item">
                <a href="myann" class="nav-link">
                  <i class="nav-icon fas fa-eye"></i>
                  <p>My Announcements</p>
                </a>
              </li>
			  @endif
			  @endforeach
            </ul>
          </li>
          @endif
		@endforeach
		
		@php
			$arae = 0;
			@endphp
			
			@foreach ($ann as $val)
             @if($val['auth_reference'] == 'levelsettings' || $val['auth_reference'] == 'area' || $val['auth_reference'] == 'zone')
          <li class="nav-item has-treeview">
	  @if($arae==0)
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                Settings
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
			@endif
			
			@php
			$arae++;
			@endphp
            <ul class="nav nav-treeview">
			@foreach ($ann as $val)
			 @if($val['auth_reference'] == 'levelsettings')
			  <li class="nav-item">
                <a href="levelsettings" class="nav-link">
                  <i class="nav-icon fas fa-wrench"></i>
                  <p>Configurations</p>
                </a>
              </li>
			  @endif
			  @if($val['auth_reference'] == 'area')
              <li class="nav-item">
                <a href="area" class="nav-link">
                  <i class="nav-icon fas fa-map-marked-alt"></i>
                  <p>Area</p>
                </a>
              </li>
			  @endif
			   @if($val['auth_reference'] == 'zone')
              <li class="nav-item">
                <a href="zone" class="nav-link">
                  <i class="nav-icon fas fa-broadcast-tower"></i>
                  <p>Zone</p>
                </a>
              </li>
			  @endif
			  @endforeach
            </ul>
          </li>
          @endif
		@endforeach
		
			  
		
     
		  
		  
          

@endisset		
        </ul>
		 
      </nav>
	 
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
	
	<!-- <footer align="center" style="bottom: 0; width: 100%; position: absolute;">
 <br>
    <a href="https://mdbootstrap.com/education/bootstrap/"><img src=""
           alt=""
           class=""
           style="">Samishti Infotech Pvt Ltd</a>
</footer>-->
	
  </aside>  