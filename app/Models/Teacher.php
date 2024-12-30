<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'nip',
        'name',
        'email',
        'phone',
        'address',
        'specialization',
        'join_date',
        'education_level'
    ];

    public function homeroom()
    {
        return $this->hasOne(ClassRoom::class, 'homeroom_teacher_id');
    }

    public function subjects()
    {
        return $this->hasMany(Subject::class);
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }
}