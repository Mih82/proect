<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeCategoriesProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $table->bigIncrements('id');

        $table->bigInteger('categorie_id')->unsigned()->default(1);
        $table->foreign('categorie_id')->references('id')->on('categories');

        $table->bigInteger('product_id')->unsigned()->default(1);
        $table->foreign('product_id')->references('id')->on('products');

        $table->timestamps();
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
