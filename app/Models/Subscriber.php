<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'subscribers';
    protected $fillable = [
        'email',
        'status',
    ];
    protected $casts = [
        'status' => 'boolean',
    ];
}
