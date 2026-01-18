<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    protected $fillable = [
        'assignment_id',
        'student_id',
        'status',
        'file_path',
        'grade',
    ];

    public function assignment()
    {
        return $this->belongsTo(Assignment::class);
    }
}
