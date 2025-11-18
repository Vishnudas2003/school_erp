<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subjects extends Model
{
    use HasFactory;
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

