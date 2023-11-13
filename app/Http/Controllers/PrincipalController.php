<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PrincipalController extends Controller
{
    //

    // view user
    public function viewTeachers(Request $request){
        
        $teachers = User::where('role','1')->where('name','like','%'.$request->search.'%')->get();
        // $teachers = User::where('role','1')->Paginate(3);
        return view('teachers_list',['teachers'=>$teachers]);
    }


    //view students
    public function viewStudents(Request $request) {
        //display and filter by name
        $students= User::where('role','2')->where('name','like','%'.$request->search.'%')->get();

        return view('students_list',['students'=>$students]);
    }
}
