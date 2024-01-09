<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblStatisticalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_statistical', function (Blueprint $table) {
            $table->id();
            $table->string('order_date');
            $table->integer('sales');
            $table->integer('profit');
            $table->integer('quantity');
            $table->integer('total_order');
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
        Schema::dropIfExists('tbl_statistical');
    }
}
