<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    //view attendance status
    public function attendancestatus(){
        $attendance = Attendance::where('student_id',Auth::user()->id)->get();
        // $data = $attendance->groupBy('date');
         return view('attendance_view_student',['attendanceStatus'=>$attendance]);
    }
    //view student details
    public function viewstudentdetails(){
       
        $student = User::find(Auth::user()->id);
        $details = $student->studentDetail;

        return view('add_student_details',[
            'details'=>$details,
            'student' => $student
        ]);
    }


     //student details
     public function addStudentDetail(Request $request,$id){
        $validator = Validator::make($request->all(),[
            'course'=>'required|string',
            'address'=>'required|string',
            'class'=>'required|string',
            'phone'=>'required|string|min:10'
        ]);

        if($validator->fails()){
            return response()->json([
                'status'=>false,
                'message'=>'validation failed',
                'error'=>$validator->errors()
            ]);
        }

         $user = User::findOrFail($id);  
         $details = $user->studentDetail()->where('user_id',$id)->first();

         if($details){
            $datas = [
                'course',
                'address',
                'class',
                'phone'
            ];

            $final = [];
           
         
            //     if($request->filled($data))
            foreach($datas as $data){
                if(filled($request->$data)){
                    $final[$data] = $request->input($data);
                }
            }

            // $details->update($data);
            $details->update($final);

            return response()->json([
                'status'=>true,
                'message'=>'student details updated'
            ]);
         }

         else{
            $data = [
                'course'=> $request->course,
                'address'=>$request->address,
                'class'=>$request->class,
                'phone'=>$request->phone
            ];

            $user->studentDetail()->create($data);

            return response()->json([
                'status'=>true,
                'message'=>'student details added'
            ]);
         }

    }


}
