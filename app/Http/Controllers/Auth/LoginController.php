<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth; 

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
    // protected $redirectTo = '/myaccount';

    protected function authenticated()
    {
        if ( Auth::user()->role == "admin" || Auth::user()->role == "editor") {// do your magic here
            return redirect('/adminReview');
        }

        if(Auth::user()->role == "advertiser")
        {
            return redirect('/adminAdvertisement');
        }

        if(Auth::user()->role == "author")
        {
            return redirect('/adminArticle');
        }

        return redirect('/myaccount');
    }

    public function logout()
    {
        Auth::logout();

    return redirect('/homepage');
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
