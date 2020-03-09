<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShipmentPriceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipment_price', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->decimal('dpd_classic')->nullable();
            $table->decimal('dpd_download')->nullable();
            $table->decimal('inpost_classic')->nullable();
            $table->decimal('inpost_download')->nullable();
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
        Schema::dropIfExists('shipment_price');
    }
}
