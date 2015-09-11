<!DOCTYPE html>
<html>
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>@yield('Step') | Tres Niños</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link href='https://fonts.googleapis.com/css?family=Oswald:400,700,300' rel='stylesheet' type='text/css'/>
        <link rel="stylesheet" href="{{ URL::asset('public/css/main.css') }}" type="text/css" />
    </head>
    
    <body>
        <nav class="navbar navbar-default">
          <div class="container-fluid">
            <div class="navbar-header">
                <a href="#" class="navbar-brand">Tres Niños</a>
            </div>
            @if(Auth::check())
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#">Welcome, {{ Auth::user()->name }}</a></li>
                    <li> <a href="#" class="glyphicon glyphicon-shopping-cart">&nbsp;</a></li>
                    <li>
                        <a href="{{ URL::to('dashboard/logout') }}" class="btn" title="logout">
                            <span class="glyphicon glyphicon-off"></span>
                        </a>
                    </li>
                </ul>
            </div>
            @endif
          </div>
        </nav>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    @yield("error_message")
                </div>
                <div class="col-md-3">
                    @yield('steps')
                </div>
                <div class="col-md-9">
                    @yield("todo")
                </div>
            </div>
        </div>
        <footer>
            <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
            <script type="text/javascript">
                var base_url = "{{URL::to('/')}}"
                  jQuery.ajaxSetup({
                      headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      }
                  });
            </script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
            <script type="text/javascript" src="{{ URL::asset('public/js/main.js') }}"></script>
            @yield('more_assets')
            <script type="text/javascript" src="{{ URL::asset('public/js/custom.js') }}"></script>
        </footer>
    </body>
</html>