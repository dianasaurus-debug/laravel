<?php

namespace App\Http\Controllers\Auth;

use App\Student;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class StudentLoginController extends Controller
{
    use AuthenticatesUsers;
    protected $guard = 'student';
    protected $redirectTo = '/home';
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function showLoginForm()
    {
        return view('auth.studentLogin');
    }
    public function guard()
    {
        return auth()->guard('student');
    }
    public function login(Request $request)
    {
        if (auth()->guard('student')->attempt(['email' => $request->email, 'password' => $request->password ])) {
            return redirect()->route('studentpage');
        }
        return back()->withErrors(['email' => 'Email or password are wrong.']);
    }
    public function showRegisterPage()
    {
        return view('auth.studentregister');
    }
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:199',
            'email' => 'required|string|email|max:255|unique:students',
            'password' => 'required|string|min:6|confirmed'
        ]);
        Student::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        return redirect()->route('student-login')->with('success','Registration Success');
    }
}
