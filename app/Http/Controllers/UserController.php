<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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

    public function create()
    {
        return view('pages.users.create');
    }

    public function store(StoreUserRequest $request)
    {
        User::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role' => $request->role
        ]);

        return redirect(route('users.index'))->with(['success' => true, 'message' => 'New User account has been successfully added']);
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect(route('users.index'))->with(['success' => true, 'message' => 'User account has been successfully deleted']);
    }
}


