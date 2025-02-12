<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Percentage extends Model
{
    use HasFactory;

    protected $fillable = ['student_id', 'year', 'standard', 'percentage'];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
