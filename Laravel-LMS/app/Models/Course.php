<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Course extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'category_id',
        'teacher_id',
        'status'
    ];

    protected static function booted()
    {
        static::creating(function ($course) {
            $course->slug = Str::slug($course->title);
        });
    }

    // ✅ FIXED HERE
    public function category()
    {
        return $this->belongsTo(CourseCategory::class, 'category_id');
    }

    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }
}
