<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
    public function fireman()
    {
        return $this->belongsTo(User::class, "fireman_id");
    }

    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }

}
