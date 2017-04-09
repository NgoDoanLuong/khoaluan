<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMonhocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('monhocs',function (Blueprint $table){
          $table->increments('id');
          $table->string('mamon');
          $table->string('magv');
          $table->string('tenmon');
          $table->integer('hocky_id')->unsigned();
          $table->foreign('hocky_id')->references('id')->on('hockys')->onDelete('cascade');
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
        Schema::dropIfExists('monhocs');
    }
}
