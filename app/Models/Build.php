<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Build extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'jas',
        'jas_json_file_name',
        'zip_file',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function jatos_components()
    {
        return $this->belongsToMany(JatosComponent::class);
    }
}
