<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = [
       'teacher_id',
       'student_id', 
        'date',
        'status'
    ];

    public function teacheruser(){
        return $this->belongsTo(User::class,'teacher_id');
    }


    public function studentuser(){
        return $this->belongsTo(User::class,'student_id');
    }
    
}
