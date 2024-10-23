<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    // Specify the table if it's not the plural form of the model name
    protected $table = 'members';

    // Fillable attributes for mass assignment
    protected $fillable = [
        'name',
        'phone_number',
        'address',
        'photo',
        'department',
        'nip',
        'position',
        'barcode',
    ];

}
