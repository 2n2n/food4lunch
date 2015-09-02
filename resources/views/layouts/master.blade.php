<!DOCTYPE html>
<html>
    <head>
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
        
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="list-group">
                      <a href="#" class="list-group-item disabled">Login/Register</a>
                      <a href="#" class="list-group-item">Place your order</a>
                      <a href="#" class="list-group-item">Check-out</a>
                      <a href="#" class="list-group-item">Success!</a>
                    </div>
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