<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

//teacher
    public function teacherdetail(){
       return $this->hasOne(TeacherDetail::class , 'user_id');
    }

    public function studentDetail(){
        return $this->hasOne(StudentDetail::class , 'user_id');
    }

    public function teacherAttendance(){
        return $this->hasMany(Attendance::class , 'teacher_id');
    }

    public function studentattendance(){
        return $this->hasMany(Attendance::class , 'student_id');
    }

    
}
