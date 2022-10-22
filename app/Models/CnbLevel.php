<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CnbLevel extends Model
{
    use HasFactory;

    protected $table = "cnb_level";
    protected $fillable = ['name', 'description'];
}
