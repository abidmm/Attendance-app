<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AttendanceController extends Controller
{

    //view all students and their attendance 
    public function markedAttendance(){
        //attendance relation
        $attendance = Attendance::where('teacher_id',Auth::user()->id)->get()->groupBy('date');
        //grouped by relationship (attendance table-> user table)
        $names = Attendance::where('teacher_id',Auth::user()->id)->get()->groupBy('studentuser.name');
        // $list = $attendance->groupBy('studentuser.name');
        return view('attendance_list',['attendance'=>$attendance,'data'=>$names]);
    }

    //view students to mark attendance
    public function view(Request $request)
    {
        $students = User::where('role', '2')->get();
            return view('attendance_mark', ['students' => $students]);
    }


    //Mark attendance 
    public function attendance(Request $request)
    {
        $today = now()->toDateString();
        $current = Attendance::where('date', $today)->get();

        if ($current->isEmpty()) {
            foreach ($request->input('attendance') as $studentId => $status) {

                $attendance = new Attendance();
                $attendance->student_id = $studentId;
                $attendance->teacher_id = Auth::user()->id;
                $attendance->date = now();
                $attendance->status = $status;
                $attendance->save();
            }
            return response()->json([
                'status' => true,
                'message' => 'attendance marked',
            ]);
        } else {

            foreach ($request->input('attendance') as $studentId => $status) {

                foreach ($current as $data) {
                    if ($data->student_id == $studentId) {
                        $data->status = $status;
                        $data->save();
                    }
                }
            }
            return response()->json([
                'status' => true,
                'message' => 'attendance updated',
            ]);
        }
    }



}
