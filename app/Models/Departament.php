<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departament extends Model
{
    use HasFactory;

    protected $table = 'departament';

    Protected $fillable = [
        'name'
    ];

    public function municipalities() {
        return $this->hasMany(Municipality::class);
    }

    public function students() {
        return $this->hasMany(Student::class);
    }
}
