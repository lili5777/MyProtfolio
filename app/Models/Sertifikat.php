<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sertifikat extends Model
{
    //
    protected $fillable = [
        'foto',
        'nama',
        'company',
        'terbit',
    ];
}
