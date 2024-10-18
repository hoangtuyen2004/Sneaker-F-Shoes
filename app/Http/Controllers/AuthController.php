<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Mail\MailRegister;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function formLogin()
    {
        //
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        //
        $account = $request->only('email','password');
        $user = User::where('email', $account['email'])->first();
        if ($user && !Hash::check($account['password'], $user->password)) {
            Auth::login($user);
            if(Auth::user()->role === "Khách hàng") {
                return redirect()->intended('/'); 
            }
            elseif (Auth::user()->role === "Quản lý" || Auth::user()->role === "Nhân viên") {
                return redirect()->intended('/wp-admin');
            }
        }
        return back()->with('message', 'Thông tin đăng nhập không chính xác!');
    }

    public function formRegister()
    {
        //
        return view('auth.register');
    }
    public function register(RegisterRequest $request) {
        $account = $request->only('name','email','phone_number','gender','password');
        $account['user_code'] = "KH_". User::query()->max('id')+1;
        $account['status'] = "Hoạt động";
        $account['role'] = "Khách hàng";
        // dd($account);
        $create_account = User::create($account);
        Auth::login($create_account);
        Mail::to($account['email'])->send(new MailRegister($create_account));
        return redirect()->route('/');
    }

    public function logout(Request $request)
    {
        //
        if($request->isMethod('POST')) {
            Auth::logout();
            return redirect()->route('login');
        }
        return back();
    }

}
