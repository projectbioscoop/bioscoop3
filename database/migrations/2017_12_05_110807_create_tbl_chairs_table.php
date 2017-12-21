<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblChairsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_chairs', function (Blueprint $table) {
            $table->increments('chair_id');
            $table->integer('theather_id');
            $table->integer('chairnumber');
            $table->integer('rownumber');
            $table->tinyInteger('used');
            $table->integer('display_id');
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
        Schema::dropIfExists('tbl_chairs');
    }
}
