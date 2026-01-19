<?php

namespace App\Http\Controllers;

use App\Models\Divisions;
use App\Models\Login;
use App\Models\StudentClass;
use App\Models\Students;
use App\Models\Parents;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    //

    public function index()
    {
        return view('student.dashboard');
    }

    public function addStudent(Request $request)
    {


        DB::beginTransaction();

        try {
            // --- 1. VALIDATION ---
            $validated = $request->validate([
                'first_name' => 'required|max:255|string',
                'last_name' => 'required|max:255|string',

                'dob' => 'required|string',
                'gender' => 'required|string',
                'blood_group' => 'required|string',

                'address_line_1' => 'required|max:255|string',
                'address_line_2' => 'nullable|max:255|string',
                'city' => 'required|max:255|string',
                'province' => 'required|max:255|string',
                'country' => 'required|max:255|string',
                'postal' => 'required|max:255|string',

                'email' => 'required|email|max:255|unique:login,email',
                'password' => 'required|max:255',
            ]);

            $parentLogin = Login::where('email', $request->p_email)->where('role', 4)->first();

            if (! $parentLogin) {
                $parentLoginValidated = $request->validate([
                    'parent_first_name' => 'required|string',
                    'parent_last_name' => 'required|string',
                    'parent_area_code' => 'required|string',
                    'parent_phone' => 'required|string',
                    'p_email' => 'required|email|max:255|unique:login,email',
                    'parent_password' => 'required|max:255',
                ]);
                //Create Parent Login
                $newParentlogin = Login::create([
                    'email' => $parentLoginValidated['p_email'],
                    'password' => bcrypt($parentLoginValidated['parent_password']),
                    'role' => 4,
                    'is_active' => true,
                ]);
                $finalParentLoginId = $newParentlogin->id;

                //create parent record
                $newParentRecord = Parents::create([
                    'login_id' => $finalParentLoginId,
                    'first_name' => $parentLoginValidated['parent_first_name'],
                    'last_name' => $parentLoginValidated['parent_last_name'],

                    'address_line_1' => $validated['address_line_1'],
                    'address_line_2' => $validated['address_line_2'] ?? null,
                    'city' => $validated['city'],
                    'province' => $validated['province'],
                    'country' => $validated['country'],
                    'postal' => $validated['postal'],

                    'area_code' => $parentLoginValidated['parent_area_code'],
                    'phone_number' => $parentLoginValidated['parent_phone'],
                ]);
                $finalParentId = $newParentRecord->id;
            } else {
                $parentLoginValidated = $request->validate([
                    'parent_id' => 'required|integer',
                ]);
                $finalParentId = $parentLoginValidated['parent_id'];
            }

            // --- 2. CREATE LOGIN USER STUDENT---
            $login = Login::create([
                'email' => $validated['email'],
                'password' => bcrypt($validated['password']),
                'role' => 3, // student = 3
                'is_active' => true,
            ]);

            // --- 3. CREATE STUDENT RECORD ---
            $student = Students::create([
                'login_id' => $login->id,
                'parent_id' => $finalParentId,
                'first_name' => $validated['first_name'],
                'last_name' => $validated['last_name'],

                'address_line_1' => $validated['address_line_1'],
                'address_line_2' => $validated['address_line_2'] ?? null,
                'city' => $validated['city'],
                'province' => $validated['province'],
                'country' => $validated['country'],
                'postal' => $validated['postal'],
                'date_of_birth' => $validated['dob'],
                'gender' => $validated['gender'],
                'blood_group' => $validated['blood_group'],
            ]);

            DB::commit();

            return redirect()->back()->with('success', 'Student added successfully!');

        } catch (\Exception $e) {

            DB::rollBack();

            return redirect()->back()->with('error', 'Failed to add student: '.$e->getMessage());
        }
    }

    public function assignClass($student_id, $division_id)
    {
        if ($student_id != null && $division_id != null) {
            $current_class = StudentClass::create([
                'student_id' => $student_id,
                'class_division_id' => $division_id,
                'is_active' => true,
            ]);

            return $current_class->id;
        }

        return false;

    }

    /**
     * Don't run this function, It's a seeder function for student_classes table
     */
    public function randomizeClass()
    {
        // $divisions = Divisions::all();
        $students = Students::all();

        $students->map(function ($student) {
            $this->assignClass($student->id, random_int(1, 6));
        });
    }

    public function getStudent($id = null)
    {
        if ($id) {
            $student = Students::with('parent')
                ->find($id);

            if (! $student) {
                abort(404, 'Student not found');
            }

            $data = [[
                'sfname' => $student->first_name,
                'slname' => $student->last_name,
                'pfname' => $student->parent->first_name ?? '',
                'plname' => $student->parent->last_name ?? '',
            ]];
        } else {
            $students = Students::with('parent')->get();

            $data = $students->map(function ($student) {
                return [
                    'sid' => $student->id,
                    'sfname' => $student->first_name,
                    'slname' => $student->last_name,
                    'pfname' => $student->parent->first_name ?? '',
                    'plname' => $student->parent->last_name ?? '',
                ];
            })->toArray();
        }

        return view('student.list')->with('data', $data);
    }
}
