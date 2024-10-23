<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gate extends Model
{
    use HasFactory;

    protected $fillable = [
        'gate_code',
        'gate_number',
        'door_number',
        'created_at',
        'updated_at',
    ];
}
