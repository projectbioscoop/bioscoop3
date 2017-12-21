<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblTheathersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_theathers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('theather_id');
            $table->string('name');
            $table->integer('capacity');
            $table->integer('amount_of_chairs_row');
            $table->integer('amount_of_loverchairs');
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
        Schema::dropIfExists('tbl_theathers');
    }
}
