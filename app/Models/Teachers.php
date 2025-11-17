<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teachers extends Model
{
    protected $table = 'teachers';
    protected $primaryKey = 'id';

    protected $fillable = [
        'login_id',
        'subject_id',
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

    public function subject()
    {
        return $this->belongsTo(Subjects::class, 'subject_id');
    }
}

