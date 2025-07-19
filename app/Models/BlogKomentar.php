<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogKomentar extends Model
{
    //
    protected $fillable = [
        'blog_id',
        'komentar',
    ];
}
