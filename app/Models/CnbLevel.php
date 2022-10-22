<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CnbLevel extends Model
{
    use HasFactory;

    protected $table = 'cnb_level';

    protected $fillable = [
        'id',
        'name',
        'description'
    ];

    public function grades(){
        return $this->hasMany(Grade::class);
    }

    public function courses() {
        return $this->hasMany(Course::class);
    }
}
