<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sell_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('sell_id');
            $table->unsignedBigInteger('product_id');
            $table->unsignedInteger('qty')->default(0);
            $table->float('total')->default(0);

            $table->foreign('sell_id')->references('id')->on('sells')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sell_items');
    }
}
