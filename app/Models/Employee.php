<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    //use HasFactory;

    use HasFactory;

    protected $fillable = [
        'nama',
        'alamat',
        'gender',
        'joined_date',
        'phone_number',
    ];
}
