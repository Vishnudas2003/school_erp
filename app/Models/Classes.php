<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Classes extends Model
{
    use HasFactory;
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

