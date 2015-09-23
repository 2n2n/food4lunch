@extends('layouts.master')
@section("more_assets")
<script type="text/javascript" src="{{ URL::asset('public/js/objects/Food.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('public/js/objects/Menu.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('public/js/objects/Order.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('public/js/form_extender.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('public/js/step2/modules.js') }}"></script>
@endsection
@section("steps")
    <div class="list-group">
        <div class="list-group-item">Login/Register</div>
        <div class="list-group-item active">Place your order</div>
        <div class="list-group-item">Done!</div>
    </div>
@endsection

@section('statement')
<div class="panel panel-success">
    <div class="panel-heading">Order Statement</div>
    <div class="panel-body">
    <p>Thank you for ordering, <br/> total amount to be payed is <b id="total_amount">P 60.00</b> </p>
    </div>
    <table class="table" id="orders_table">
        <thead>
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
        </thead>
        <tbody>
            
        </tbody>
    </table>
</div>
@endsection

@section("todo")
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Menu</div>
                <div class="panel-body">
                    <form method="POST" action="{{ URL::to('order/step/3') }}">
                        {!! csrf_field() !!}
                        <ul class="my-form-list">
                            <li>
                                <div class="input-group">
                                    <span class="input-group-addon">Main Dish</span>
                                    <select class="form-control" name="maindish">
                                        @foreach($menu as $food) 
                                            @if($food->type == 'main')
                                            <option value="{{$food->id}}"> {{ $food->description }} </option>
                                            @endif
                                        @endforeach
                                        <option value="0">-- No Main dish --</option>
                                    </select>
                                </div>
                            </li>
                            <li>
                                <div class="input-group">
                                    <span class="input-group-addon">Side Dish</span>
                                    <select class="form-control" name="sidedish">
                                        @foreach($menu as $food) 
                                            @if($food->type == 'side')
                                            <option value="{{$food->id}}"> {{ $food->description }} </option>
                                            @endif
                                        @endforeach
                                        <option value="0">-- No Side dish --</option>
                                    </select>
                                </div>
                            </li>
                            <li>
                                <div class="input-group">
                                    <span class="input-group-addon">Rice</span>
                                    <select class="form-control" name="rice">
                                        @foreach($menu as $food) 
                                            @if($food->type == 'rice')
                                            <option value="{{$food->id}}"> {{ $food->description }} </option>
                                            @endif
                                        @endforeach
                                        <option value="0">-- No Rice --</option>
                                    </select>
                                </div>
                            </li>
                            <li class="note">Free Chocolate</li>
                            <li class="extras"></li>
                            
                        </ul>
                        <br/>
                        <button type="submit" class="btn btn-primary pull-right">Proceed to checkout</button>
                        
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            @yield('statement')
        </div>
    </div>
@endsection
