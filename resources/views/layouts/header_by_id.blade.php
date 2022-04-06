<nav class="main-header navbar navbar-expand navbar-dark purplenavbar">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
          {{-- this gives the home link inside the home  --}}
        <a href="{{ route('dashboard.index')}}" class="nav-link">Home</a>
      </li>

    </ul>
 {{-- this is for the top navbar option where tere is  a search bar for searching --}}
    <!-- SEARCH FORM -->
    <form class="form-inline ml-3" action="/search" method="POST" role="search">
	{{ csrf_field() }}
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" name="q" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
              {{-- This is for the searching the content the option for the employee  --}}
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
<ul class="navbar-nav ml-auto">

         <!-----------    <li class="nav-item" id="timer">

			 {{ csrf_field() }}
        <a class="nav-link" title="Attendance" data-toggle="dropdown" href="#">
                    <i class="nav-icon fas fa-clock nav-icon">

                    </i>
                    <span></span>
                </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <form action="/empatten" method="POST">
        <span class="dropdown-item dropdown-header bg-light">



  		<div id="date"></div>
      <div id="time" class="bold"></div>


</span>
  @php
  $ide = Auth::user()->emp_id;
  @endphp
			 <div class="input-group mb-3">

          <input id="emp_attn" name="emp_attn" class="form-control"value="{{$ide}}" disabled></input>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user-tie"></span>
            </div>
          </div>
             </div>
          <div class="input-group mb-3">
        <div class="col-4">
            <input type="submit" value="Present" class="btn btn-primary btn-block" {{--onclick="return change(this)";--}} />
          </div>
          </div>

	</form>
        </div>




            </li>--------->


    <li class="nav-item">
	 <a class="nav-link" title="Help" href="http://127.0.0.1:8000/faq">
        <i class="nav-icon fas fa-question-circle fa-lg"></i>
        </a>
		</li>

        {{-- it shows the dropdown in the announcement bar on the top and the announcement number  --}}
      <!-- Messages Dropdown Menu -->
      <li class="nav-item">
      <form action="/announce" method="GET">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="nav-icon fas fa-bullhorn"></i>
          <span class="badge navbar-badge bg-teal">@isset($announcement) {{count($announcement)}} @endisset</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header bg-light">@isset($announcement){{count($announcement)}} Announcements @endisset</span>
	      {{-- isset($announcement) checks whether announcement is set and is not NULL. --}}
          @isset($announcement)
           {{-- i is use to execute a function on each element in an array --}}
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

          <a href="http://127.0.0.1:8000/myann" class="dropdown-item dropdown-footer bg-light">See All Announcements</a>
        </div>

		</form>
      <!-- Notifications Dropdown Menu -->
      </li>
      {{-- it gives the name image and the respective email on click the  profile --}}
	  @php
  $username = Auth::user()->name;
  $image = Auth::user()->image;
  $email = Auth::user()->email;
  @endphp

  {{-- it get the image from the store and set in the profile picture --}}
	   <li class="dropdown user user-menu nav-item">
	    <a class="nav-link" data-toggle="dropdown" href="#">
          @if (filled($image))
         <img src="{{ URL::asset('storage/'.$image) }}" class="user-image" alt=""/>
	 @else
		<img src="/suprsales_resource/dist/img/usericon.png" class="user-image" alt="User">
        @endif
        </a>

                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header bg-secondary">
				  <br/>
                     @if (filled($image))
         <img src="{{ URL::asset('storage/'.$image) }}" class="user-image" alt=""/>
	@else
		<img src="/suprsales_resource/dist/img/usericon.png" class="user-image" alt="User">
        @endif
				   <p>
                      {{ $username }}
                      <small>{{ $email }}</small>
                    </p>
                  </li>

                  <!-- Menu Footer-->
                  {{-- this is the footer of the dropdown --}}
                  <li class="user-footer bg-white">
                      <div class="pull-left">
                      <a href="http://127.0.0.1:8000/loginprofile" class="btn btn-default btn-flat bg-primary">Profile</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                    <div class="pull-right" style="float:right;">
                      <a href="{{ route('userlogin.logout')}}" class="btn btn-default btn-flat">Sign out</a>
                    </div>
					</div>
                  </li>
                </ul>
              </li>



    </ul>
  </nav>
