<?php

namespace App\Http\Controllers\Auth;

use App\SocialProvider;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Session;
use Illuminate\Http\Request;
use Socialite;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = 'user/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function showLoginForm()
    {
        if(!session()->has('url.intended'))
        {
            session(['url.intended' => url()->previous()]);
        }
        return view('auth.loginRegister');
    }

    public function credentials(Request $request)
    {
        return [
            'email' => $request->email,
            'password' => $request->password,
            'verified' => 1,
        ];
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        $errors = [$this->username() => trans('auth.failed')];

        // Load user from database
        $user = \App\User::where($this->username(), $request->{$this->username()})->first();
        // Check if user was successfully loaded, that the password matches
        // and active is not 1. If so, override the default error message.
        if ($user && \Hash::check($request->password, $user->password) && $user->verified != 1) {
        $errors = ['verified' => 'Please verify your email address.  Check your email for our mail.'];
        }

        if ($request->expectsJson()) {
        return response()->json($errors, 422);
        }

        return redirect()->back()
        ->withInput($request->only($this->username(), 'remember'))
        ->withErrors($errors);
    }

    public function resendEmail($user)
    {
        $user->email_token = $user->email_token;
        $email = new EmailVerification();
            Mail::to($user->email)->send($email);
    }

    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallback($provider)
    {

        try
        {
            $socialUser = Socialite::driver($provider)->user();
        }

        catch(\Exception $e ){
            return redirect('/');
        }

        $socialProvider = socialProvider::Where('provider_id',$socialUser->getId())->first();

        if(!$socialProvider){
            $user = User::firstOrCreate(
                ['email' => $socialUser->getEmail()],
                ['name' => $socialUser->getName()]
            );

            $user->socialProviders()->create(
                ['provider_id' => $socialUser->getId(), 'provider' => $provider]
            );

        }else {
            $user = $socialProvider->user;   

            auth()->login($user);
            return redirect('/user/home'); 
        }
    }
}