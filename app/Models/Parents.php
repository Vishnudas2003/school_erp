<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Parents extends Model
{
    use HasFactory;
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
        'area_code',
        'phone_number'
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

