<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
class AdminLoginController extends Controller
{
    use AuthenticatesUsers;

    protected $guard = 'admin';

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
        $this->middleware('guest')->except('logout');
    }
    public function showLoginForm()
    {
        return view('auth.adminLogin');
    }
   public function guard()
    {
        return auth()->guard('admin');
    }
    public function login(Request $request)
    {
        if (auth()->guard('admin')->attempt(['email' => $request->email, 'password' => $request->password ])) {
            return redirect()->route('adminpage');
        }
        return back()->withErrors(['email' => 'Email or password are wrong.']);
    }
}
