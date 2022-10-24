<?php

namespace App\Models;;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{

    use HasFactory;

    protected $table = 'school';

    protected $fillable = ['id','name', 'municipality_id'];

    public function professors()
    {
        return $this->hasMany(Professor::class);
    }

    public function students(): \Illuminate\Database\Eloquent\Relations\HasManyThrough
    {
        return $this->hasManyThrough(Student::class, Professor::class);
    }

    public function grades(): \Illuminate\Database\Eloquent\Relations\HasManyThrough
    {
        return $this->hasManyThrough(Grade::class, [Student::class,Professor::class]);
    }

    public function municipality() {
        return $this->belongsTo(Municipality::class);
    }
}
