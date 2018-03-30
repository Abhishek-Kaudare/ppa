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
    protected $table= 'outwards';

   
    
    protected $fillable = [

       'cname', 'date', 'tdn', 'odn', 'wt', 'mtr', 'reelno', 'remarks'

    ];

    public function inwards(){
        return $this->belongsTo('App\inwards');
    }
}
