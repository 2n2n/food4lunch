@extends('layouts.master')

@section("steps")
    <div class="list-group">
        <div class="list-group-item">Login/Register</div>
        <div class="list-group-item">Place your order</div>
        <div class="list-group-item active">Done!</div>
    </div>
@endsection

@section('todo')
      <div class="row">
          <div class="col-md-12">
            <div class="panel panel-success">
                <!-- Default panel contents -->
                <div class="panel-heading"><h1 class="lead">
                    <span class="glyphicon glyphicon-check"></span> Thank You!</h1>
                    </div>
                <div class="panel-body">
                <p>Thank you! You're order is now complete, <br/> total amount to be payed is <b>P {{ number_format($total,2) }}</b> </p>
                </div>
            </div>
            <div class="alert alert-warning" role="alert">
                <a href="{{ URL::to('dashboard/logout') }}" class="btn btn-danger pull-right">Logout</a>
                <p>
                    You can always Contact us at 09272672644 / 09162991496 or add Anthony on skype. :)
                </p>
                <br class="clearfix"/>
            </div>
            
          </div>
      </div>
@endsection