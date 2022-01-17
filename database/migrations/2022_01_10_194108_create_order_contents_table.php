<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_contents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id'); 
            $table->unsignedBigInteger('product_id'); 
            $table->integer('quantity');
            $table->float('price_per', 8, 2);
            $table->integer('discount');
            $table->float('final_price', 8, 2);
            $table->date('shipped_at')->nullable();            
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
        Schema::dropIfExists('order_content');
    }
}
