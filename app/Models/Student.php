<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = 'student';

    protected $keyType = 'string';
    protected $primaryKey = 'personal_code';
    public $incrementing = false;

    protected $fillable = [
        'personal_code',
        'name',
        'last_name',
        'birth_date',
        'identification_document',
        'identification_document_number',
        'tutelary_name',
        'tutelary_dpi'
    ];

    public function student_enrollments(){
        return $this->hasMany(StudentEnrollment::class);
    }


}
