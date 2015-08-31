<form method="POST" action="{{ URL::to('/auth/login') }}">
 {!! csrf_field() !!}		
 <div>
 	Email
 	<input type="email" name="email" value="{{old('email')}}"/>
 </div>
 <div>
 	Password
 	<input type="password" name="password" id="password"/>
 </div>
 <div>
 	<button type="submit">Login</button>
 </div>
</form>

<a href="{{URL::to('/auth/google')}}">Login in with g+</a>
