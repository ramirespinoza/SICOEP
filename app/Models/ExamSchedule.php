<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamSchedule extends Model
{
    use HasFactory;

    protected $table = 'exam_schedules';
    protected $fillable = [
        'course_id','bimestre','date_'
        ];

    public function course(){
        return $this->belongsTo(Course::class);
    }
}
