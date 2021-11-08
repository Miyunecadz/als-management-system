<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

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

        if(Auth::attempt(['username' => $request->username, 'password' => $request->password]))
        {
            $request->session()->regenerate();
            return redirect()->intended(route('dashboard'));
        }


        return redirect(route('login-page'))->withErrors([
            'message' => "Invalid username or password!"
        ])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect(route('login'));
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

    public function datatable(Request $request)
    {

        if($request->ajax()){

            $data = User::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        else{
            return "Hello";
        }
    }
}



