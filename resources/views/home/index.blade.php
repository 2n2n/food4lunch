@extends("layouts.master")

@section("Step", "Welcome")

@section("todo")
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Sign In</div>
                <div class="panel-body">
                    <form>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="username/email">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="password">
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
                    <form>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="username/email">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="password">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="confirm password">
                        </div>
                        <button type="submit" class="btn btn-default">Register and Order</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection