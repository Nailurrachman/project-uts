<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'description',
        'credits',
        'teacher_id',
        'semester'
    ];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function classes()
    {
        return $this->belongsToMany(ClassRoom::class, 'class_subject');
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }

    public function grades()
    {
        return $this->hasMany(Grade::class);
    }
}