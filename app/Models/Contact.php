<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'contacts';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'email',
        'subject',
        'message',
        'read_receipt',
        'important',
        'deleted_at',
    ];

    protected $casts = [
        'read_receipt' => 'boolean',
        'important' => 'boolean',
    ];
}
