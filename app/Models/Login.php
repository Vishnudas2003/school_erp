<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
    protected $table = 'login';
    protected $primaryKey = 'id';

    protected $fillable = [
        'email',
        'password',
        'role',
        'is_active',
    ];

    public function student()
    {
        return $this->hasOne(Students::class, 'login_id');
    }

    public function teacher()
    {
        return $this->hasOne(Teachers::class, 'login_id');
    }

    public function parent()
    {
        return $this->hasOne(Parents::class, 'login_id');
    }
}

