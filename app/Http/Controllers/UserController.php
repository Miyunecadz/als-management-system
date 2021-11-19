<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
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

    public function index()
    {
        return view('pages.users.index', ['users' => User::where('role', USER::$TEACHER)])
            ->with(['title' => 'ALS list | ALS DATABASE', 'linkname' => 'list student']);
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

        return redirect(route('users.index'))->with(['success' , 'New User account has been successfully added']);
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect(route('users.index'))->with(['success' , 'User account has been successfully deleted']);
    }

    public function edit(User $user)
    {
        return view('pages.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $data = $request->all();
        $data['auth_id'] = $user->id;
        $validator = Validator::make($request->all(), [
            'username' => [
                'required',
                Rule::unique('users')->ignore($data['auth_id'])
            ],
            'oldpass' => [
                'required',
                function ($attribute, $value, $fail) {
                    if (!Hash::check($value, Auth::user()->password)) {
                        $fail('Old Password didn\'t match');
                    }
                }
            ],
            'password' => [
                'required'
            ]
        ]);

        if($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator)->with(compact('user'));
        }

        $request->merge(['password' => Hash::make($request->password)]);

        $user->update($request->except('_token', 'id', 'fullname', 'oldpass'));
        return redirect(route('dashboard'))->with('success', 'Profile has been successfully updated');
    }

    public function profile()
    {
        $user = auth()->user();
        return view('pages.users.edit', compact('user'))
            ->with(['title' => 'Edit Profile | ALS DATABASE', 'linkname' => 'dashboard']);
    }

    public function datatable(Request $request)
    {

        if($request->ajax()){

            $data = User::query();
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
            return \response()->json(['error' => 'Bad Request.'], Response::HTTP_BAD_REQUEST) ;
        }
    }
}



