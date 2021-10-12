<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'username' => 'required',
            'password' => 'required'
        ]);

        if($validator->fails())
        {
            return redirect(route('login-page'))->withErrors($validator->errors())->withInput();
        }

        if(Auth::attempt($request->all()))
        {
            $request->session()->regenerate();
            return redirect()->intended(route('dashboard'));
        }

        return redirect(route('login-page'))->withErrors([
            'success' => false,
            'message' => "Invalid username or password!"
        ]);
    }
}



