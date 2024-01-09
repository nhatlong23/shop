<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_info', function (Blueprint $table) {
            $table->increments('info_id');
            $table->string('info_title', 100);
            $table->text('info_desc');
            $table->string('info_logo');
            $table->string('info_phone');
            $table->string('info_email');
            $table->text('info_map');
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
        Schema::dropIfExists('tbl_info');
    }
}
