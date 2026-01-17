<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    public function roles() {
        return $this->belongsToMany(Role::class);
    }

    public function enrollments() {
        return $this->hasMany(Enrollment::class);
    }

    public function submissions() {
        return $this->hasMany(Submission::class);
    }

    public function coursesTeaching() {
        return $this->hasMany(Course::class, 'teacher_id');
    }
}

