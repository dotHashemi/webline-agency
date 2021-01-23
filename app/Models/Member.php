<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name', 'email', 'phone', 'ip', 'isEmailNewsLetter', 'isSMSNewsLetter', 'updated'
    ];
}
