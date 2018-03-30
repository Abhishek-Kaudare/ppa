<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class reel extends Model
{
    protected $fillable = [

        'reel', 'out', 'remains', 'active'
    ];
}
