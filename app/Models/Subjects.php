<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subjects extends Model
{
    protected $table = 'subjects';
    protected $primaryKey = 'id';

    protected $fillable = [
        'subject_name',
    ];

    public function teachers()
    {
        return $this->hasMany(Teachers::class, 'subject_id');
    }
}

