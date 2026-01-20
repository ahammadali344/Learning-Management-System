<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    protected $table = 'enrollments';

    /**
     * IMPORTANT
     * Your enrollments table DOES NOT have created_at / updated_at
     */
    public $timestamps = false;

    protected $fillable = [
        'student_id',
        'course_id',
        'status',
        'enrolled_at',
        'completed_at',
    ];

    /* =====================
       STATUS CONSTANTS
    ===================== */
    const STATUS_PENDING  = 'pending';
    const STATUS_APPROVED = 'approved';
    const STATUS_REJECTED = 'rejected';

    /* =====================
       RELATIONSHIPS
    ===================== */
    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
