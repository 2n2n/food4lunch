@extends("layouts.master")

@section("Step", "Welcome")

@section("steps")
    <div class="list-group">
        <div class="list-group-item disabled">Login/Register</div>
        <div class="list-group-item">Place your order</div>
        <div class="list-group-item">Check-out</div>
        <div class="list-group-item">Success!</div>
    </div>
@endsection

@section("error_message")
    @if( count($errors) > 0 )
        <div class="alert alert-danger" role="alert">
            @foreach($errors->all() as $error)
                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                <span class="sr-only">Error:</span>
                {{ $error }} <br/>
            @endforeach
              
        </div>
    @endif
@endsection

@section("todo")
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Sign In</div>
                <div class="panel-body">
                    <form method="POST" action="auth/login">
                        {!! csrf_field() !!}
                        <div class="form-group">
                            <input type="text" name="email" class="form-control" placeholder="email">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" placeholder="password">
                        </div>
                        <button type="submit" class="btn btn-default">Proceed</button>
                         <a href="#" class="align-left">Forgot Password?</a> | Sign in using <a href="{{URL::to('auth/google')}}" class="align-left">google+</a>
                        
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form method="POST" action="auth/register">
                        {!! csrf_field() !!}
                        <div class="form-group">
                            <input type="text" name="fullname" value="{{ old('name') }}" class="form-control" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <input type="text" name="email" value="{{ old('email') }}" class="form-control" placeholder="email">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" placeholder="password">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password_confirmation" class="form-control" placeholder="confirm password">
                        </div>
                        <button type="submit" class="btn btn-default">Register and Order</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection