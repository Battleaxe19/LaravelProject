<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">


	    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

    <!-- Bootstrap Core CSS -->
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	
		<style>

		body {
			padding-top: 70px; /* Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */
		}
	</style>
	
	@yield('header')
</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ URL::to('home') }}">Home</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
<!--                     <li>
                        <a href="#">Search</a>
                    </li> -->
					@if (Auth::check())
                    <li>
						@if(Auth::user()->type == 'ffls')
						<a href="{{ URL::to('ffls') }}">Profile</a>
						@else
						<a href="{{ URL::to('user') }}">Profile</a>
						@endif
                    </li>
                    <li>
						<a href="{{ URL::to('logout') }}">Logout</a>
					</li>
					@else
					<li>
						<a href="{{ URL::to('login') }}">Login</a>
					</li>
					<li>
						<a href="{{ URL::to('user/create') }}">Register</a>
					</li>
					@endif
					@yield('navbuttons')
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">
<!-- 		@if (Auth::check())
		<h1>{{Auth::id()}}	</h1>
		<h1>{{Auth::user()->email}}	</h1>
		<h1>{{Auth::user()->type}}	</h1>
		@endif -->
       @yield('content')

    </div>
    <!-- /.container -->

    <div class="container">

        <hr>

        <!-- Footer -->
        <footer>
			@yield('footer')
            <div class="row">
                <div class="col-lg-12">
                    <p>( ͡° ͜ʖ ͡°)  Copyright &copy; The Mighty Goslings 2015  ( ͡° ͜ʖ ͡°)</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->



</body>

</html>
