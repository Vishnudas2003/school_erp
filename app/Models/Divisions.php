<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Divisions extends Model
{
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
}
