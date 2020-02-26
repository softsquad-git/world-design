<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCheckoutTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checkout', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->nullable()->index();
            $table->text('product_ids');
            $table->string('name');
            $table->string('post_code');
            $table->string('city');
            $table->string('address');
            $table->string('email');
            $table->decimal('total_price');
            $table->string('shipment');
            $table->string('status');
            $table->string('size');
            $table->integer('quantity');
            $table->string('country');
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
        Schema::dropIfExists('checkout');
    }
}
