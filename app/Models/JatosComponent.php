<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JatosComponent extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'json', 'json_file'];

    public function builds()
    {
        return $this->belongsToMany(Build::class);
    }
}
