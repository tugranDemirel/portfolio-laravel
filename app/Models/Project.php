<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'projects';
    protected $fillable = [
        'title',
        'slug',
        'description',
        'link',
        'client',
        'role',
        'completed_at',
    ];
    protected $casts = [
        'completed_at' => 'date',
    ];

    public function images()
    {
        return $this->hasMany(Image::class);
    }

}
