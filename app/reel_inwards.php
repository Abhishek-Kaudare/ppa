<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class reel_inwards extends Model
{
    protected $fillable = [

        'reel', 'out', 'remains', 'active'
    ];
}
