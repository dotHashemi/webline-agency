<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'service', 'title', 'customer', 'thumbnail', 'link', 'body', 'tags', 'slug', 'updated'
    ];


    public function service()
    {
        return $this->belongsTo(Service::class, 'service', 'id');
    }

    public function feedback()
    {
        return $this->hasMany(Feedback::class, 'portfolio', 'id');
    }

    public function path()
    {
        return route('app.portfolio.show', ['slug' => $this->slug]);
    }
}
