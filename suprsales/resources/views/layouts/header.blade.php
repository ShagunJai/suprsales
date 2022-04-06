<nav class="main-header navbar navbar-expand navbar-dark purplenavbar">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('dashboard.index')}}" class="nav-link">Home</a>
      </li>
      
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3" action="/search" method="POST" role="search">
	{{ csrf_field() }}
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" name="q" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item">
	  <a class="nav-link" title="Help" href="faq">
        <i class="nav-icon fas fa-question-circle fa-lg"></i>
        </a>
		</li>
		 <li class="nav-item">
      <form action="/announce" method="GET">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="nav-icon fas fa-bullhorn"></i>
		  
          <span class="badge navbar-badge bg-teal">@isset($announcement) {{count($announcement)}} @endisset</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header bg-light">@isset($announcement) {{count($announcement)}} Announcements @endisset</span>
		  @isset($announcement)
		  @foreach ($announcement as $index => $value)
		  @if($value['FLAG'] == "1")
		  @if((count($announcement) - 1) == $index)
          <a href="#" class="dropdown-item">
		  {{ $value['TITLE'] }}
            <span class="float-right text-muted text-sm">{{ \Carbon\Carbon::parse($value['VALID_TILL'])->format('d/m/Y')}}</span> 
          </a>
		  @endif
          
          @if((count($announcement) - 2) == $index)
          <a href="#" class="dropdown-item">
		  {{ $value['TITLE'] }}
            <span class="float-right text-muted text-sm">{{ \Carbon\Carbon::parse($value['VALID_TILL'])->format('d/m/Y')}}</span> 
          </a>
		  @endif
          
         @if((count($announcement) - 3) == $index)
          <a href="#" class="dropdown-item">
		  {{ $value['TITLE'] }}
            <span class="float-right text-muted text-sm">{{ \Carbon\Carbon::parse($value['VALID_TILL'])->format('d/m/Y')}}</span> 
          </a>
		  @endif
		  
		  @endif
		  @endforeach
        @endisset
          <a href="myann" class="dropdown-item dropdown-footer bg-light">See All Announcements</a>
        </div>
		
		</form>
      <!-- Notifications Dropdown Menu -->
      </li>
	  @php
  $username = Auth::user()->name;
  $image = Auth::user()->image;
  $email = Auth::user()->email;
  @endphp
	   <li class="dropdown user user-menu nav-item">
	    <a class="nav-link" data-toggle="dropdown" href="#">
		@if (filled($image))
         <img src="{{ URL::asset('storage/'.$image) }}" class="user-image" alt=""/>
	 @else
		<img src="suprsales_resource/dist/img/usericon.png" class="user-image" alt="User">	
        @endif      
        </a>
                
                <ul class="dropdown-menu">
				
                  <!-- User image -->
                  <li class="user-header bg-secondary">
				  <br/>
                   @if (filled($image))
         <img src="{{ URL::asset('storage/'.$image) }}" class="user-image" alt=""/>
	 @else
		<img src="suprsales_resource/dist/img/usericon.png" class="user-image" alt="User">	
        @endif    
			<p>
                      {{ $username }}
                      <small>{{ $email }}</small>
                    </p>
                  </li>
                  
                  <!-- Menu Footer-->
                  <li class="user-footer bg-white">
                    <div class="pull-left">
                      <a href="loginprofile" class="btn btn-default btn-flat bg-primary">Profile</a>
                    
                      <a href="{{ route('userlogin.logout')}}" style="float:right;" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
		 
      
	  
    </ul>
  </nav>