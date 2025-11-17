<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Parents extends Model
{
    protected $table = 'parents';
    protected $primaryKey = 'id';

    protected $fillable = [
        'login_id',
        'first_name',
        'last_name',
        'address_line_1',
        'address_line_2',
        'city',
        'province',
        'country',
        'postal',
    ];

    public function login()
    {
        return $this->belongsTo(Login::class, 'login_id');
    }

    public function students()
    {
        return $this->hasMany(Students::class, 'parent_id');
    }
}

