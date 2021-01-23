<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'user', 'access', 'type', 'title', 'thumbnail', 'pdf', 'voice', 'description', 'body', 'tags', 'slug', 'status', 'updated', 'time'
    ];


    public function categories()
    {
        return $this->belongsToMany(Category::class, 'article_category', 'article', 'category');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user', 'id');
    }
}
