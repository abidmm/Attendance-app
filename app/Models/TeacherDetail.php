<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'subject',
        'department',
        'joining_date',
        'class',
        'address',
        'salary'
    ];


    public function user(){
       return $this->belongsTo(User::class , 'user_id');
    }
}
