<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ClassRoom extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'grade_level',
        'academic_year',
        'homeroom_teacher_id',
        'room_number',
        'capacity'
    ];

    public function students()
    {
        return $this->hasMany(Student::class, 'class_id');
    }

    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'class_subject');
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'homeroom_teacher_id');
    }
}