<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcademicYear extends Model
{
    //
    use HasFactory;

    protected $table = 'academic_year';

    protected $primaryKey = 'id';

    protected $fillable = [
        'academic_year',
        'is_active',
    ];

    public function studentClass() {
        return $this->hasMany(StudentClass::class, 'academic_year_id');
    }
}
