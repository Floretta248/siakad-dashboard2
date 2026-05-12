<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['name', 'email', 'prodi', 'angkatan', 'is_graduated'];

    protected $casts = [
        'is_graduated' => 'boolean',
        'angkatan' => 'integer',
    ];
}
