<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Divisions extends Model
{
    use HasFactory;

    protected $table = 'divisions';

    protected $primaryKey = 'id';

    protected $fillable = [
        'division_name',
        'class_id',
    ];

    public function class()
    {
        return $this->belongsTo(Classes::class, 'class_id');
    }

    public function studentClasses()
    {
        return $this->hasMany(StudentClass::class, 'class_division_id');
    }
}
