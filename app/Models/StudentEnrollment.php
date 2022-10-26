<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentEnrollment extends Model
{
    use HasFactory;

    protected $table = 'student_enrollment';


    protected $fillable = [
        'student_personal_code',
        'grade_id',
        'section',
        'class_schedule_id',
        'professor_dpi',
        'enrollment_date'
    ];

    public function professor(){
        return $this->belongsTo(Professor::class);
    }

    public function grade(){
        return $this->belongsTo(Grade::class);
    }

    public function student(){
        return $this->belongsTo(Student::class);
    }

    public function grade_school($grade_id, $school_id){

        return Student::join('grade', 'grade.id','=','student.grade_id')
            ->join('professor', 'professor.dpi','=','student.professor_dpi')
            ->join('school', 'school.id', '=', 'professor.school_id')
            ->where([
                ['school.id', '=', '1'],
                ['grade.id', '=', '1'],
            ])->get();

    }
}
