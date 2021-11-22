<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{

    public function dashboard()
    {
        if (! auth()->user()->isAdmin()) return view('pages.dashboard')
            ->with(['title' => 'Dashboard | ALS DATABASE', 'linkname' => 'dashboard']);

        $years = DB::table('students')
            ->select(DB::raw('
                    YEAR(enroldate) as years,
                    count(*) as year_total
                '))
            ->groupBy('years')
            ->get();

        $res = DB::table('students')
            ->select(DB::raw('
                count(case when sex = "male" then 1 else null end ) as total_male,
                count(case when sex = "female" then 1 else null end ) as total_female,
                count(case when(datediff(current_date, enroldate)) < 30  then 1 else null end) as new_student,
                count(*) as total_student
                '))
            ->get();
        $years_cleaned = [];
        foreach ($years as $year)
        {
            $years_cleaned[$year->years] = $year->year_total;
        }

        $data = $res->toArray();
        $data['trend'] = $years_cleaned;

        return view('pages.dashboard', compact('data'))
            ->with(['title' => 'Dashboard | ALS DATABASE', 'linkname' => 'dashboard']);
    }

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
            ->with(['title' => 'Teachers | ALS DATABASE', 'linkname' => 'list teacher']);
    }

    public function create()
    {
        return view('pages.users.create')
            ->with(['title' => 'Create Teacher | ALS DATABASE', 'linkname' => 'create teacher']);
    }

    public function store(Request $request)
    {
        User::create([
            'fullname' => $request->fullname,
            'designation' => $request->designation,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role' => 'teacher'
        ]);

        return redirect(route('dashboard'))->with(['success' , 'New User account has been successfully added']);
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect(route('dashboard'))->with(['success' , 'User account has been successfully deleted']);
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
            'fullname' => 'required',
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

    public function teacherEdit($id)
    {
        $user = User::find($id);
        return view('pages.users.edit', compact('user'))
            ->with(['title' => 'Edit Profile | ALS DATABASE', 'linkname' => 'dashboard']);
    }

    public function toggleStatus($id)
    {
        $user = User::find($id);
        $user->status = !$user->status;
        $user->save();

        return redirect()->back()->with('success', 'Teacher status changed!');
    }

    public function datatable(Request $request)
    {

        if($request->ajax()){

            $data = User::query()->where('role','<>', 'teacher');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '
                                <div class="d-flex">
                                     <a href="'. route('teachers.edit', $row->id ) .'" class="edit btn btn-success me-2 btn-sm">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </a>
                                    <a href="'. route('teachers.status', $row->id ) .'"
                                    class="edit btn '. ($row->status == true? 'btn-success': 'btn-danger') . ' btn-sm">
                                        '. ($row->status == true? '<i class="bi bi-eye"></i> Active' : '<i class="bi bi-eye-slash"></i> InActive') . '
                                    </a>
                                </div>   ';
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



