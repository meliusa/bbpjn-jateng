<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;

    protected $fillable = [
        'member_id',
        'gate_id',
        'created_at',
        'updated_at',
    ];

    // Define the relationship to the Member model
    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    // Define the relationship to the Gate model
    public function gate()
    {
        return $this->belongsTo(Gate::class);
    }
}
