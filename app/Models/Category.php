<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'title', 'father'
    ];


    public function articles()
    {
        return $this->belongsToMany(Article::class, 'article_category', 'category', 'article');
    }
}
