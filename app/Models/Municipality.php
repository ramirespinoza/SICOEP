<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipality extends Model
{
    use HasFactory;

    protected $table = 'municipality';

    protected $fillable = [
        'name'
    ];

    public function departament(){
        return $this->belongsTo(Departament::class);
    }
    public function schools() {
        return $this->hasMany(School::class);
    }

}
