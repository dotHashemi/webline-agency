<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'email', 'name', 'password', 'version', 'updated', 'role'
    ];

    protected $hidden = [
        'password'
    ];
    

    public function articles()
    {
        return $this->hasMany(Article::class, 'user', 'id');
    }
}
