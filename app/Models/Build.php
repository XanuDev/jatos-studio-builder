<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Build extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'jas',
        'jas_file',
        'zip_file',
    ];

    public function users()
    {   
        return $this->belongsToMany(User::class);
    }
}