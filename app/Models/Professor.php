<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    use HasFactory;

    protected $table = 'professor';

    protected $primaryKey = 'dpi';
    protected $keyType = 'unsignedBigInteger';
    public $incrementing = false;

    protected $fillable = [
        'dpi',
        'name',
        'last_name',
        'school_id'
    ];

    public function school(){
        return $this->belongsTo(School::class);
    }

    public function student_enrollments() {
        return $this->hasMany(StudentEnrollment::class);
    }


}
