<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\AuthenticateUser;
use Validator;
use Socialite;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    
    protected $loginPath = "/";
    protected $redirectPath = "order/step/2";
    // protected $redirectPath = "dashboard";
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }
    
    /**
     * Registration and Login Page aka STEP 1
     */
    public function index() {
        return view("auth.index");    
    }
    
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'fullname' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['fullname'],
            'email' => $data['email'],
            'password' => $data['password'],
        ]);
    }
    
    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email', 'password' => 'required',
        ]);
        
        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        // $throttles = $this->isUsingThrottlesLoginsTrait();
        // if ($throttles && $this->hasTooManyLoginAttempts($request)) {
        //     return $this->sendLockoutResponse($request);
        // }
        $credentials = $this->getCredentials($request);
        
        if (Auth::attempt($credentials, true)) {
            return redirect()->intended($this->redirectPath());
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        
        
        // if ($throttles) {
        //     $this->incrementLoginAttempts($request);
        // }
        
        return redirect($this->loginPath())
            ->withInput($request->only($this->loginUsername()))
            ->withErrors([
               $this->loginUsername() => $this->getFailedLoginMessage(),
            ]);
    }
    
    public function postRegister(Request $request) {
        $validator = $this->validator($request->all());
        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        Auth::login($this->create($request->all()));

        return redirect($this->redirectPath());
    }

    public function redirectToProvider(AuthenticateUser $authenticateUser, Request $request, $provider = null) {
        return $authenticateUser->execute($request->all(), $this, $provider);
    }

    public function userHasLoggedIn($user) {
        return redirect()->intended($this->redirectPath());
    }
}
