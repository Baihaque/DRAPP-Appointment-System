<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    // use AuthenticatesUsers;

    // public function __construct(){
    //     $this->middleware('auth:admin');
    // }

    public function postLogin(Request $request)
    {
        $credential = $request->only('email', 'password');
        if (Auth::guard('admin')->attempt(['email' => $credential['email'], 'password' => $credential['password']])) {

            return redirect('/admin/dashboard')->with('success', 'Successfully logged in.');
        } else {
            return redirect()
                ->back()
                ->withInput($request->except('password'))
                ->withErrors(["Incorrect user login details!"]);
        }
    }


    public function getRegister()
    {

        return view('admin.auth.register');
    }

    public function postRegister(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'username' => 'required',
            'email' => 'bail|email|required|unique:admins',
            'password' => 'bail|required|min:8|same:c_password',
            'c_password' => 'required',
        ]);

        $data = [
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'status' => 1
        ];

        if ($validate->fails()) {
            return redirect()->back()
                ->withErrors($validate)
                ->withInput();
        } else {
            $admin = Admin::create($data);
            return redirect('/admin/login')->with('success', 'Successfully signed up.')->withInput();
        }
    }

    public function logout()
    {
        auth()->guard('admin')->logout();
        session()->flush();

        return redirect('/admin/login')->with('success', 'Successfully logged out.');
    }

    public function getLogin()
    {
        return view('admin.auth.login');
    }
}
