<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Students;
use App\Models\Teachers;

class AdminController extends Controller
{
    //

    public function index() {

        $studentCount = Students::count();
        $teacherCount = Teachers::count();


        $data = [
            'studentCount' => $studentCount,
            'teacherCount' =>$teacherCount
        ];
        return view('admin.dashboard')->with('data', $data);
    }


}
