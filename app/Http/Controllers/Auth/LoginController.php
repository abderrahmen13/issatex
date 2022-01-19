<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function authenticated(Request $request, $user)
    {
        if($user->role == 'admin')
            return redirect()->route('admin');
        else if($user->role == 'gerant')
            return redirect()->route('gerant');
        else if($user->role == 'client')
            return redirect()->route('client');
        else if($user->role == 'clientprivilege')
            return redirect()->route('clientprivilege');
        else if($user->role == "comptable")
            return redirect()->route('comptable');
        else if($user->role == "douanier")
            return redirect()->route('douanier');
        else if($user->role == "magasinier")
            return redirect()->route('magasinier');
        else if($user->role == "secretaire")
            return redirect()->route('secretaire');
        else if($user->role == "transitaire")
            return redirect()->route('transitaire');
        else
            return redirect()->route('home');
    }
}
