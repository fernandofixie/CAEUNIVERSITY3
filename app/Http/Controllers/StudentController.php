<?php

namespace App\Http\Controllers;

use App\Models\Students;
use Illuminate\Http\Request;

use DB;

class StudentController extends Controller
{

    public function edit_student(Request $r, string $id)
    {
        $students = Students::where('student_id', '=', $id)
            ->update(
                [
                    'first_name' => $r->input('first_name'),
                    'last_name' => $r->input('last_name'),
                    'birthdate' => $r->input('birthdate'),
                    'year_level' => $r->input('year_level'),
                    'gender' => $r->input('gender'),
                    'mobile_number' => $r->input('mobile_number'),
                    'email_address' => $r->input('email_address'),
                ]
            );
        return redirect('/students')
            ->with('success', 'Successfully edited.');
    }
    public function edit_student_form(string $id)
    {
        $students = Students::query()
           ->select('*')
           ->where('student_id', '=', $id)
           ->get()
           ->first();

           return view('students_edit', compact('students'));

    }

    public function add_student(Request $r)
    {
        $student = new Students;
        $student->first_name = $r->input('first_name');
        $student->last_name = $r->input('last_name');
        $student->birthdate = $r->input('birthdate');
        $student->year_level = $r->input('year_level');
        $student->gender = $r->input('gender');
        $student->mobile_number = $r->input('mobile_number');
        $student->email_address = $r->input('email_address');
        $student->save();

        return redirect("/students")
            ->with('success', 'Successfully added');
    }


    public function add_student_form()
    {
        return view ('students_create');
    }

    public function student_show(string $id)
    {
        $students = Students::query()
            ->select('*')
            ->where('student_id', '=', $id)
            ->get()
            ->first();

        return view('student_show', compact('students'));
    }

    public function view_account()
    {
        $students = Students::query('student_id', '=', '1')
            ->select('*')
            ->get()
            ->first();

        return view('user_account', compact('students'));
    }


    public function index()
    {
        $total_students = DB::select("SELECT COUNT(*) AS total FROM students");
        $students=DB::select("SELECT student_id, last_name, first_name, year_level, date_enrolled  FROM students ORDER BY student_id ASC LIMIT 10");

        return view('students', compact('total_students', 'students'));
    }

}
