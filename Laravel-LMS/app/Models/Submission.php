<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    public function student() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function assignment() {
        return $this->belongsTo(Assignment::class);
    }

    public function files() {
        return $this->hasMany(SubmissionFile::class);
    }

    public function review() {
        return $this->hasOne(Review::class);
    }
}
