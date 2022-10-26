<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;

    protected $table = 'grade';

    protected $fillable = [
        'id',
        'name',
        'description',
        'cnb_level_id'
    ];

    public function cnb_level(){
        return $this->belongsTo(CnbLevel::class);
    }

    public function student_enrollments() {
        return $this->hasMany(StudentEnrollment::class);
    }


    public function courses() {
        return $this->belongsToMany(Course::class,'grade_course');
    }

}
