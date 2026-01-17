<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubmissionFile extends Model
{
    public function submission() {
        return $this->belongsTo(Submission::class);
    }
}

