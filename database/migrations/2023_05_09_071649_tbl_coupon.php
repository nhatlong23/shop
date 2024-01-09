<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblCoupon extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_coupon', function (Blueprint $table) {
            $table->increments('coupon_id');
            $table->string('coupon_name', 150);
            $table->string('coupon_code', 50);
            $table->integer('coupon_time');
            $table->integer('coupon_number');
            $table->integer('coupon_condition');
            $table->string('coupon_start');
            $table->string('coupon_end');
            $table->integer('coupon_used');
            $table->integer('coupon_status');
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
        Schema::dropIfExists('tbl_coupon');
    }
}
