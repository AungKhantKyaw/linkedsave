    <header id="header">
        <div class="top-bar">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-xs-4">
                       
                    </div>
                    <div class="col-sm-6 col-xs-8">
                       <div class="social">
                            <ul class="social-share">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            </ul>
                       </div>
                    </div>
                </div>
            </div><!--/.container-->
        </div><!--/.top-bar-->

        <nav class="navbar navbar-inverse" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{ url('/home') }}"><img src="{{ asset('images/logo.png') }}" /></a>
                </div>
				
                <div class="collapse navbar-collapse navbar-right">
                    <ul class="nav navbar-nav">
                        <li class="{!! (Request::segment(1) == 'home' ? 'active' : '') !!}"><a href="{{ URL::route('home.index') }}">Home</a></li>
<!--                         <li class="{!! (Request::segment(1) == 'about_us' ? 'active' : '') !!}"><a href="{{ URL::route('about_us.index') }}">About Us</a></li> -->
                         @if (Auth::guest())
                        <li><a href="{{ URL::route('user_login.index') }}">Login</a></li> 
                        <li><a href="{{ url('/register') }}">Register</a></li>
                        @else
                        <li class="{!! (Request::segment(1) == 'bookmark' ? 'active' : '') !!}"><a href="{{ url('bookmark/listing/'.Auth::user()->id ) }}">Your List</a></li>
                        <li><a href="{{ url('/logout') }}">Logout</a></li>
                        @endif
                       <!--  <li class="{!! (Request::segment(1) == 'contact' ? 'active' : '') !!}"><a href="{{ URL::route('contact.index') }}">Contact</a></li> -->                        
                    </ul>
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->
		
    </header><!--/header-->