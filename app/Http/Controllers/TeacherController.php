<?php

namespace App\Http\Controllers;

use App\Models\TeacherDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TeacherController extends Controller
{




    //view teacher details
    public function userdetails()
    {

        $id = Auth::user()->id;
        $teacher = User::find($id);
        // $details = $teacher->detail;
        $details = $teacher->teacherdetail;

        // $details = TeacherDetail::with('user')->where('user_id',Auth::user()->id)->get();

        return view('add_details', ['details' => $details]);
    }

    //Add teacher details
    public function addDetail(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'subject' => 'required|string',
            'department' => 'required|string',
            'joining_date' => 'required|date',
            'class' => 'required|string',
            'address' => 'required|string',
            'salary' => 'required|numeric'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'validation failed',
                'error' => $validator->errors()
            ]);
        }

        $teacher = User::findOrFail($id);
        $detail = $teacher->teacherdetail()->where('user_id', $id)->first();



        if ($detail) {

            $data = [
                'subject' => $request->subject,
                'department' => $request->department,
                'joining_date' => $request->joining_date,
                'class' => $request->class,
                'address' => $request->address,
                'salary' => $request->salary,
            ];

            $detail->update($data);
            return response()->json([
                'status' => true,
                'message' => 'teacher details updated',
            ]);
        } else {
            $data = [
                'subject' => $request->subject,
                'department' => $request->department,
                'joining_date' => $request->joining_date,
                'class' => $request->class,
                'address' => $request->address,
                'salary' => $request->salary
            ];

            $teacher->teacherdetail()->create($data);

            return response()->json([
                'status' => true,
                'message' => 'teacher details added'
            ]);
        }
    }


   
}
