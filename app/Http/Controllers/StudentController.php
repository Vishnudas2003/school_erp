<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Students;

class StudentController extends Controller
{
    //

    public function index() {
        return view('student.dashboard');
    }

    public function getStudent($id = null) {
        if(!$id) {
            $record = Students::all();
        } else {
            $record = Students::find($id);
        }
        $data = $record->toArray();
        // var_dump($record->toArray());exit;
        return view('student.list')->with('data', $data);
    }
}
