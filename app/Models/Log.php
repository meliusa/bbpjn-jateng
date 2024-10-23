<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    public function gate()
    {
        return $this->belongsTo(Gate::class);
    }
}
