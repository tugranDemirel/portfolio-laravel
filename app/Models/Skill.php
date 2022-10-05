<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'skills';
    protected $fillable = [
        'name',
        'level',
        'start_date',
    ];
    protected $casts = [
        'start_date' => 'date',
    ];
}
