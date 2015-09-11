@extends('layouts.master')

@section("steps")
    <div class="list-group">
        <div class="list-group-item">Login/Register</div>
        <div class="list-group-item">Place your order</div>
        <div class="list-group-item active">Confirm Order</div>
        <div class="list-group-item">Done!</div>
    </div>
@endsection

@section('todo')
      <div class="row">
          <div class="col-md-12">
            <div class="panel panel-success">
                <!-- Default panel contents -->
                <div class="panel-heading">Order Statement</div>
                <div class="panel-body">
                <p>Thank you for ordering, <br/> total amount to be payed is <b>P 1,960.00</b> </p>
                </div>
            
                <!-- Table -->
                <table class="table">
                    <tr>
                        <th>
                            Order
                        </th>
                        <th>
                            Quantity
                        </th>
                        <th>
                            Price
                        </th>
                    </tr>
                    @foreach($collection as $row)
                    <tr>
                        <td>{{ $row['description'] }}</td>
                        <td>{{ $row['qty'] }}</td>
                        <td>{{ $row['price'] }}</td>
                    </tr>
                    @endforeach
                </table>
            </div>
            <a href="{{ URL::to('order/step/2') }}" class="btn btn-danger pull-left">Modify order</a>
            <a href="#" class="btn btn-primary pull-right">Proceed to checkout</a>
          </div>
      </div>
@endsection