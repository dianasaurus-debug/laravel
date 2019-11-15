<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
class PenyediaLoginController extends Controller
{
    use AuthenticatesUsers;

    protected $guard = 'penyedia';

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
        return view('auth.penyediaLogin');
    }
   public function guard()
    {
        return auth()->guard('penyedia');
    }
    public function login(Request $request)
    {
        if (auth()->guard('penyedia')->attempt(['email' => $request->email, 'password' => $request->password ])) {
            return redirect()->route('penyediapage');
        }
        return back()->withErrors(['email' => 'Email or password are wrong.']);
    }
}
