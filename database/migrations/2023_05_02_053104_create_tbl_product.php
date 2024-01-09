<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_product', function (Blueprint $table) {
            $table->increments('product_id');
            $table->integer('category_id');
            $table->integer('brand_id');
            $table->string('product_name', 100);
            $table->text('product_desc');
            $table->text('product_title');
            $table->string('product_quantity');
            $table->string('product_tag');
            $table->text('product_content');
            $table->text('slug');
            $table->string('product_price');
            $table->string('product_sold');
            $table->string('product_cost');
            $table->integer('product_views');
            $table->string('product_image');
            $table->string('product_file');
            $table->integer('product_status')->default(0);
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
        Schema::dropIfExists('tbl_product');
    }
}
