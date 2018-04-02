<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOutwardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outwards', function (Blueprint $table) {
            $table->increments('id');
            $table->string('CustomerName');
            $table->date('DateOfDispatch');
            $table->string('TheirDesignNo');
            $table->string('OurDesignNo');
            $table->integer('Weight');
            $table->integer('Meter');
            $table->string('ReelNo');
            $table->string('Remarks')->nullable();
            $table->integer('next_outwards_id')->nullable();
            $table->integer('remaining_wt');
            $table->integer('inwards_id');
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
        Schema::dropIfExists('outwards');
    }
}
