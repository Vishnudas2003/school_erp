<?php

namespace App\Http\Controllers;

use App\Models\Parents;
use App\Models\Students;
use App\Models\Teachers;
use App\Pipelines\SanitizeInput;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //

    public function index()
    {

        $studentCount = Students::count();
        $teacherCount = Teachers::count();

        $data = [
            'studentCount' => $studentCount,
            'teacherCount' => $teacherCount,
        ];

        return view('admin.dashboard')->with('data', $data);
    }

    public function viewStudent($id)
    {

        $id = SanitizeInput::run([$id])[0];
        if (! ctype_digit((string) $id)) {
            abort(404, 'Invalid student ID');
        }

        $student = Students::with('parent')
        ->find($id);

        if (! $student) {
            abort(404, 'Student not found');
        }
       if($student->parent) {
        $parent_email = Parents::with('login')->find($student->parent->id);
       }
        $data = [
            'student_id' => 'No data Found',
            'roll_number' => 'No data Found',
            'status' => 1,
            'student_name' => $student->first_name.' '.$student->last_name,
            'parent_name' => optional($student->parent)
                                ? $student->parent->first_name.' '.$student->parent->last_name
                                : 'N/A',
            'parent_email' => $parent_email->login->email,
            'address_line_1' => optional($student->parent) ? $student->parent->address_line_1 : 'N/A',
            'address_line_2' => optional($student->parent) ? $student->parent->address_line_2 : 'N/A',
            'city' => optional($student->parent) ? $student->parent->city : 'N/A',
            'province' => optional($student->parent) ? $student->parent->province : 'N/A',
            'country' => optional($student->parent) ? $student->parent->country : 'N/A',
            'postal' => optional($student->parent) ? $student->parent->postal : 'N/A',
        ];



        return view('student.profile')->with('data', $data);

    }

    public function addStudent()
    {
        $parents = Parents::all();
        $data = $parents->map(function ($parent) {
            return [
                'id' => $parent->id,
                'name' => $parent->first_name.' '.$parent->last_name,
            ];
        })->toArray();

        return view('student.add')->with('data', $data);
    }

    public function getParentByEmail(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|string|email',
        ]);

        $parent = Parents::join('login', 'login.id', '=', 'parents.login_id')
            ->where('login.email', $validated['email'])
            ->value('parents.id');

        return response()->json([
            'parent_id' => $parent,
        ]);
    }
}
