<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    //

    protected $fillable = [
        'foto',
        'judul',
        'isi',
        'penulis',
        'view',
        'like'
    ];

    public function komentars()
    {
        return $this->hasMany(BlogKomentar::class);
    }
}
