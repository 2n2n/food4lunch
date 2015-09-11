@extends('layouts.master')
@section("steps")
     <div class="list-group">
        <div class="list-group-item">Login/Register</div>
        <div class="list-group-item active">Place your order</div>
        <div class="list-group-item">Confirm Order</div>
        <div class="list-group-item">Done!</div>
    </div>
@endsection

@section("todo")
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
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
        
    </div>
@endsection

@section("more_assets")
<script type="text/javascript" src="{{ URL::asset('public/js/form_extender.js') }}"></script>
@endsection