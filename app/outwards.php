<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class outwards extends Model
{
    
    /**

     * The attributes that are mass assignable.

     *

     * @var array

     */
    protected $table= 'inwards';

   
    
    protected $fillable = [

        'date', 'rf', 'brand', 'Q', 'gsm', 'reelno', 'Gross', 'net'

    ];
}
