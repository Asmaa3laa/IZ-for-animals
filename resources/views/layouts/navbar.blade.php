<div class="wrap">
			<div class="container">
				<div class="col-md-6 d-flex justify-content-md-end" style="display: inline;">
						<div class="social-media">
			    		<p class="mb-0 d-flex">
			    			<a href="https://www.facebook.com/groups/2875962215993069/" class="d-flex align-items-center justify-content-center"><span class="fa fa-facebook"><i class="sr-only">Facebook</i></span></a>
			    			<a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-twitter"><i class="sr-only">Twitter</i></span></a>
			    			<a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-instagram"><i class="sr-only">Instagram</i></span></a>
			    		</p>
					  </div>
        </div> 
			  </div>
		  </div>
		<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar"style="width:100%">
	    <div class="container">
        <div class="panel-body">
          <img src="{{ asset("/images/All About Animals_ logo photoshop.png") }}" style="width:80px;height:80px;"/>
      </div>
        <p class="navbar-brand" style="align-content: center;margin-top:30px;">All About Animals</p>
        
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="fa fa-bars"></span> Menu
	      </button>
	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
            <li class="dropdown dropdown-user">
{{--             <div class="dropdown dropdown-user" style="height: 100%;">
 --}}          <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
              <span class="mr-1">
                  <span class="user-name text-bold-700"> {{App::getLocale()}}</span>
              </span>
          </a>
          <div class="dropdown-menu dropdown-menu-right">
              @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                  <a class="dropdown-item" style="height: 100%;"rel="alternate" hreflang="{{ $localeCode }}"
                      href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                      {{ $properties['native'] }}
                  </a>
              @endforeach
{{--           </div>
 --}}      </div> 
            </li>
          <li class="nav-item {{(request()->is('/')) ? 'active' : '' }}"><a href="{{route('index')}}" class="nav-link">@lang('trans.home.home')</a></li>
          <li class="nav-item {{(request()->is('about')) ? 'active' : '' }}"><a href="{{route('about')}}" class="nav-link">@lang('trans.about.about')</a></li>
            <li class="nav-item {{(request()->is('clinic')) ? 'active' : '' }}"><a href="{{route('clinic.index')}}" class="nav-link">@lang('trans.clinics')</a></li>
          <li class="nav-item {{(request()->is('blog')) ? 'active' : '' }}"><a href="{{route('blog.index')}}" class="nav-link">@lang('trans.blogs.blogs')</a></li>            
	        </ul>
        </div>
        <div>
          <!-- Right Side Of Navbar -->
          <ul class="navbar-nav ml-auto">
            <!-- Authentication Links -->
            @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('trans.login') }}</a>
                </li>
                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('login-role') }}">{{ __('trans.create_acount') }}</a>
                    </li>
                @endif
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->user_name }} <span class="caret"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right " aria-labelledby="navbarDropdown">
                      @if(Auth::user()->role == 'doctor'or Auth::user()->role =='clinic')
                      <a class="dropdown-item" href="{{route('profile.show',Auth::id())}}">
                        <i class="fa fa-user"></i>
                              {{ __('profile') }}
                          </a>
                      @else
                      <a class="dropdown-item" href="{{route('admin.home',Auth::id())}}">
                        <i class="fa fa-user"></i>
                              {{ __('admin panel') }}
                          </a>
                      @endif
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
