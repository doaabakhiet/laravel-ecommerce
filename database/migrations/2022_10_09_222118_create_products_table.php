<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('catId');
            $table->string('name');
            $table->mediumText('small_description');
            $table->longText('description');
            $table->float('original_Price');
            $table->float('selling_price');
            $table->string('image');
            $table->string('qty');
            $table->string('taxes');
            $table->tinyInteger('status');
            $table->tinyInteger('trending');
            $table->string('meta_title');
            $table->string('meta_description');
            $table->string('meta_keywords');
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
        Schema::dropIfExists('products');
    }
}
