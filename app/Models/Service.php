<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Service extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'title', 'description', 'body', 'tags',  'icon', 'order', 'slug'
    ];


    public function path()
    {
        return route('app.services.show', ['slug' => $this->slug]);
    }
}
