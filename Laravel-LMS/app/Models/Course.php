<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'title', 'description', 'teacher_id', 'status'
    ];

    public function teacher() {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    public function lessons() {
        return $this->hasMany(Lesson::class);
    }

    public function assignments() {
        return $this->hasMany(Assignment::class);
    }

    public function projects() {
        return $this->hasMany(Project::class);
    }

    public function enrollments() {
        return $this->hasMany(Enrollment::class);
    }
}
