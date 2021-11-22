<?php

namespace App\Http\Controllers;

use App\Http\Requests\AccessibilityAndAvailabilityRequest;
use App\Http\Requests\EducationalInformationRequest;
use App\Http\Requests\PersonalDetailsRequest;
use App\Http\Requests\StoreStudentRequest;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Yajra\DataTables\DataTables;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_column = false;
        return view('pages.als_list')
            ->with(['title' => 'Student list | ALS DATABASE', 'linkname' => 'list student'])
            ->with(compact('all_column'));
    }

    public function displayAllColumn()
    {
        $all_column = true;
        return view('pages.als_list')
            ->with(['title' => 'Student list | ALS DATABASE', 'linkname' => 'list student'])
            ->with(compact('all_column'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

//        dd('hello');
        return view('pages.als_add')
            ->with(['title' => 'Enroll Form | ALS DATABASE', 'linkname' => 'create student']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\StoreStudentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStudentRequest $request)
    {
        $data = $request->except('_token');
        $data['user_id'] = $request->user()->id;
        Student::create($data);
        return redirect(route('dashboard'))
            ->with('success','New Student has been successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        $name= $student->firstname . ' '. $student->middlename. ' '. $student->lastname;
        return view('pages.als_edit', compact('student'))
            ->with(['title' => 'Edit Form | '. $name, 'linkname' => 'dashboard']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\StoreStudentRequest  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(StoreStudentRequest $request, Student $student)
    {
        $student->update($request->except('_token', 'id'));
        return redirect()->route('students.index')
            ->with('success','Student updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')
            ->with('success','Student deleted successfully');
    }


    public function personal_details_validation(PersonalDetailsRequest $request)
    {
        return response()->json(['validated' => true]);
    }

    public function educational_information_validation(EducationalInformationRequest $request)
    {
        return response()->json(['validated' => true]);
    }

    public function accessibility_and_availability_validation(AccessibilityAndAvailabilityRequest $request)
    {
        return response()->json(['validated' => true]);
    }


    public function datatable(Request $request)
    {

        if($request->ajax()){
            $data = Student::query()->where('user_id', $request->user()->id);
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<div class="d-flex">
                                    <a href="'. route('students.edit', $row->id ) .'" class="edit btn btn-success me-2 btn-sm">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </a>
                                    <form action="'. route('students.destroy', $row) . '" onsubmit="return confirm(\'Are you sure?\');" method="POST">
                                         <input type="hidden" name="_token" value="'. csrf_token() .'">
                                         <input type="hidden" name="_method" value="DELETE">
                                         <button class="btn btn-danger" type="submit"><i class="bi bi-trash"></i> Delete</button>
                                    </form>
                                </div>    ';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        else{
            return response()->json(['error' => 'Bad Request.'], Response::HTTP_BAD_REQUEST) ;
        }
    }
}
