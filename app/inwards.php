<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class inwards extends Model
{
    
    /**

     * The attributes that are mass assignable.

     *

     * @var array

     */
    protected $table= 'inwards';

    public $primaryKey ='ReelNo';
    
    protected $fillable = [

        'date', 'rf', 'brand', 'Q', 'gsm', 'reelno', 'Gross', 'net'

    ];
}
