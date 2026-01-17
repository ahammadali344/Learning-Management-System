<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentActivityLog extends Model
{
    public function student() {
        return $this->belongsTo(User::class, 'user_id');
    }
}

