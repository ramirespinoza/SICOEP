<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $table = 'course';

    protected $fillable = [
        'id',
        'name',
        'description',
        'cnb_level_id'
    ];

    public function cnb_level(){
        return $this->belongsTo(CnbLevel::class);
    }

    public function grade_course() {
        return $this->hasMany(GradeCourse::class);
    }


    public function grade_courses() {
        return $this->hasMany(GradeCourse::class,);
    }

    public function grades() {
        return $this->belongsToMany(Grade::class,'grade_course');
    }

}
