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

    public function students() {
        return $this->hasMany(Student::class);
    }

    public function grade_course() {
        return $this->hasMany(GradeCourse::class);
    }
}
