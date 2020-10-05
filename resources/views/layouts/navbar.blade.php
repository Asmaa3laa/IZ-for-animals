<div class="wrap">
			<div class="container">
				<div class="col-md-6 d-flex justify-content-md-end">
						<div class="social-media">
			    		<p class="mb-0 d-flex">
			    			<a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-facebook"><i class="sr-only">Facebook</i></span></a>
			    			<a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-twitter"><i class="sr-only">Twitter</i></span></a>
			    			<a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-instagram"><i class="sr-only">Instagram</i></span></a>
			    			<a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-dribbble"><i class="sr-only">Dribbble</i></span></a>
			    		</p>
					  </div>
				  </div>
			  </div>
		  </div>
		<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
      <a class="navbar-brand" href="{{url('/')}}"><span class="flaticon-pawprint-1 mr-2"></span>All About Animals</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="fa fa-bars"></span> Menu
	      </button>
	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
            
          <li class="nav-item {{(request()->is('/')) ? 'active' : '' }}"><a href="{{route('index')}}" class="nav-link">HOME</a></li>
          <li class="nav-item {{(request()->is('about')) ? 'active' : '' }}"><a href="#" class="nav-link">ABOUT</a></li>
	        	{{-- <li class="nav-item"><a href="#" class="nav-link">SERVICES</a></li>
	        	<li class="nav-item"><a href="#" class="nav-link">DIAGNOSES OF ILLnESSES</a></li> --}}
            <li class="nav-item {{(request()->is('clinic')) ? 'active' : '' }}"><a href="{{route('clinic.index')}}" class="nav-link">CLINICS</a></li>
          <li class="nav-item {{(request()->is('blog')) ? 'active' : '' }}"><a href="{{route('blog.index')}}" class="nav-link">BLOGS</a></li>            
	          {{-- <li class="nav-item"><a href="#" class="nav-link">CONTACT</a></li> --}}
	        </ul>
        </div>
        <div>
          <!-- Right Side Of Navbar -->
          <ul class="navbar-nav ml-auto">
            <!-- Authentication Links -->
            @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('login') }}</a>
                </li>
                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('login-role') }}">{{ __('create acount') }}</a>
                    </li>
                @endif
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->user_name }} <span class="caret"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right " aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="{{route('profile.show',Auth::id())}}">
                        <i class="fa fa-user"></i>
                              {{ __('profile') }}
                          </a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            <i class="fa fa-sign-out"></i>

                            {{ __('logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
                <li class="nav-item">
                  <div>
                      @if(Auth::user()->image)
                      <img  style=" vertical-align: middle; width: 80px;height: 80px;border-radius: 50%; margin-top: 9px" src="{{asset('storage/'.Auth::user()->image)}}"> 
                      @else
                      <img  style=" vertical-align: middle; width: 80px;height: 80px;border-radius: 50%; margin-top: 9px" src="/images/doctor avatar.jpg" alt="avatar"> 
                      @endif
                  </div>
              </li>
            @endguest
        </ul>
        </div>
        
	    </div>
	  </nav>
    <!-- END nav -->
