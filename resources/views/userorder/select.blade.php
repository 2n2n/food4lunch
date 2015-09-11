@extends('layouts.master')
@section("steps")
    <div class="list-group">
        <div class="list-group-item">Login/Register</div>
        <div class="list-group-item active">Place your order</div>
        <div class="list-group-item">Done!</div>
    </div>
@endsection

@section('statement')
<!--<div class="panel panel-success">-->
    <!-- Default panel contents -->
<!--    <div class="panel-heading">Order Statement</div>-->
<!--    <div class="panel-body">-->
<!--    <p>Thank you for ordering, <br/> total amount to be payed is <b>P 1,960.00</b> </p>-->
<!--    </div>-->

    <!-- Table -->
<!--    <table class="table">-->
<!--        <tr>-->
<!--            <th>-->
<!--                Order-->
<!--            </th>-->
<!--            <th>-->
<!--                Quantity-->
<!--            </th>-->
<!--            <th>-->
<!--                Price-->
<!--            </th>-->
<!--        </tr>-->
<!--        <tr>-->
<!--            <td>Yollow1</td>-->
<!--            <td>Yollow2</td>-->
<!--            <td>Yollow4</td>-->
<!--        </tr>-->
<!--    </table>-->
<!--</div>-->
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
                                    <span class="input-group-addon" id="basic-addon1">Main Dish</span>
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
                                    <span class="input-group-addon" id="basic-addon1">Side Dish</span>
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
                            <li class="note">Free Chocolate</li>
                            <li>
                                <input type="checkbox" name="rice" id="rice" checked/> <label for="rice">with Rice</label>
                            </li>
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
@section("more_assets")
<script type="text/javascript" src="{{ URL::asset('public/js/form_extender.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('public/js/step2/modules.js') }}"></script>
@endsection