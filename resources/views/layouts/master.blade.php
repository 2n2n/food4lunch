<!DOCTYPE html>
<html>
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>@yield('Step') | Tres Niños</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link href='https://fonts.googleapis.com/css?family=Oswald:400,700,300' rel='stylesheet' type='text/css'/>
        <link rel="stylesheet" href="{{ URL::asset('css/main.css') }}" type="text/css" />
    </head>
    
    <body>
        <nav class="navbar navbar-default">
          <div class="container-fluid">
            <a href="#" class="navbar-brand">Tres Niños</a>
          </div>
        </nav>
        @if(Auth::check())
            <h2>yolow!</h2>
        @endif
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
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
            <script type="text/javascript" src="{{ URL::asset('js/custom.js') }}"></script>
        </footer>
    </body>
</html>