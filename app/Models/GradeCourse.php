<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GradeCourse extends Model
{
    use HasFactory;

    protected $table = 'grade_course';

    protected $fillable = [
        'grade_id',
        'course_id',
    ];

    public function course(){
        return $this->belongsTo(Course::class);
    }

    public function grade() {
        return $this->hasMany(Grade::class);
    }
}
