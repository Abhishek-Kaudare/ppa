<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class reel_history extends Model
{
    protected $fillable = [

        'reel', 'out', 'remains', 'active'
    ];
}
