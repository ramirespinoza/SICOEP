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
        'grade_id',
        'section',
        'birth_date',
        'identification_document',
        'identification_document_number',
        'class_schedule_id',
        'professor_dpi',
        'tutelary_name',
        'tutelary_dpi'
    ];
}
