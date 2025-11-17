<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    protected $table = 'classes';
    protected $primaryKey = 'id';

    protected $fillable = [
        'class_name'
    ];

    public function divisions()
    {
        return $this->hasMany(Divisions::class, 'class_id');
    }
}

