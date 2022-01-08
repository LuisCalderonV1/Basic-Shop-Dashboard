<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();      
            $table->unsignedBigInteger('user_id');       
            $table->string('phone',10);
            $table->string('street',100);
            $table->string('enumber',10);
            $table->string('inumber',10)->nullable();
            $table->string('city',30);
            $table->string('state',30);
            $table->string('suburb',30);
            $table->string('zip',10);
            $table->string('phone2',10)->nullable();
            $table->string('instructions',100)->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('addresses');
    }
}
