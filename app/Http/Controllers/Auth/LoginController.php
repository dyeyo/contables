<?php

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
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
    protected $redirectTo = '/home';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('guest')->except('logout');
    }
    /* @GET
     */
    /* AÑADIENDO LOGICA PARA EL LOGIN Y LOGOUT MANUAL */
    public function loginForm()
    {
        return view('auth.login');
    }
    /* @POST
     */
    public function login(Request $request){

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (\Auth::attempt([
            'email' => $request->email,
            'password' => $request->password])
        ){
            session(['year' => $request->year]);
            return redirect('/');
        }
        return redirect('/login')->with('error', 'Invalid Email address or Password');
    }
    /* GET
    */
    public function logout(Request $request)
    {
        if(\Auth::check())
        {
            \Auth::logout();
            $request->session()->invalidate();
        }
        session(['year' => '']);
        return  redirect('/login');
    }
}