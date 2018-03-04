<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Inwards extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inwards', function (Blueprint $table) {
            $table->increments('id');
            $table->date('Date');
            $table->string('RecievedFrom');
            $table->string('Brand');
            $table->string('Quality');
            $table->integer('Gsm');
            $table->integer('ReelNo');
            $table->integer('GrossWt');
            $table->integer('NetWt');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
