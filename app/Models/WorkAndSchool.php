<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\WorkAndSchoolEnum;

class WorkAndSchool extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'work_and_schools';
    protected $fillable = [
        'name',
        'slug',
        'description',
        'start_date',
        'end_date',
        'location',
        'type',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date'
    ];



}
