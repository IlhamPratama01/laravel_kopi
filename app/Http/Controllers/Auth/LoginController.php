<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    // protected $redirectTo = RouteServiceProvider::HOME;

    protected function authenticated()
    {
        if(Auth::user()->role == 'admin') {
            return redirect('admin/produk')->with('status','Welcome to Dashboard');
        
        } elseif(Auth::user()->role == 'user'){
            return redirect('user/menu')->with('status','Acess sukses');  

        } elseif (Auth::user()->role == 'manager'){
            return redirect('manager/dashboard');
        
        }else{
            return redirect('/')->with('status','Username dan passwor yang dimaksukan gagal');
        }
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
