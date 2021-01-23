<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'portfolio', 'customer', 'thumbnail', 'post', 'body', 'selected'
    ];


    public function portfolio()
    {
        return $this->belongsTo(Portfolio::class, 'portfolio', 'id');
    }
}
