<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use Illuminate\Http\Request;

use DB;

class FacultyController extends Controller
{
    public function edit_faculty(Request $r, string $id)
    {
        $faculty = Faculty::where('faculty_id', '=', $id)
            ->update(
                [
                    'first_name' => $r->input('first_name'),
                    'last_name' => $r->input('last_name'),
                    'birthdate' => $r->input('birthdate'),
                    'gender' => $r->input('gender'),
                    'position' => $r->input('position'),
                    'department' => $r->input('department'),
                    'date_entered' => $r->input('date_entered'),
                    'mobile_number' => $r->input('mobile_number'),
                    'email_address' => $r->input('email_address'),
                ]
            );
        return redirect('/admin_faculty')
            ->with('success', 'Successfully edited.');
    }
    public function edit_faculty_form(string $id)
    {
        $faculty = Faculty::query()
           ->select('*')
           ->where('faculty_id', '=', $id)
           ->get()
           ->first();

           return view('admin_faculty_edit', compact('faculty'));

    }

    public function add_faculty(Request $r)
    {
       $faculty = new Faculty;
       $faculty->first_name = $r->input('first_name');
       $faculty->last_name = $r->input('last_name');
       $faculty->birthdate = $r->input('birthdate');
       $faculty->gender = $r->input('gender');
       $faculty->position = $r->input('position');
       $faculty->department = $r->input('department');
       $faculty->date_entered = $r->input('date_entered');
       $faculty->mobile_number = $r->input('mobile_number');
       $faculty->email_address = $r->input('email_address');
       $faculty->save();

        return redirect("/admin_faculty")
            ->with('success', 'Successfully added');
    }


    public function add_faculty_form()
    {
        return view ('admin_faculty_create');
    }

    public function admin_faculty_show(string $id)
    {
        $faculty = Faculty::query()
            ->select('*')
            ->where('faculty_id', '=', $id)
            ->get()
            ->first();

        return view('admin_faculty_show', compact('faculty'));
    }

        public function index()
        {
            $total_faculty = DB::select("SELECT COUNT(*) AS total FROM faculty");
            $faculty=DB::select("SELECT faculty_id, last_name, first_name, email_address  FROM faculty ORDER BY faculty_id ASC LIMIT 10");

            return view('admin_faculty', compact('total_faculty', 'faculty'));
        }
}
