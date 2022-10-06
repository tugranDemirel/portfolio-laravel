<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Project;

class Image extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $casts = [
        'project_id' => 'integer',
    ];
    protected $fillable = [
        'path',
        'project_id',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }


}
