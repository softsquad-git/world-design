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
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->string('title');
            $table->integer('category_id');
            $table->decimal('price');
            $table->text('description')->nullable();
            $table->longText('content')->nullable();
            $table->text('colors')->nullable();
            $table->text('sizes')->nullable();
            $table->integer('quantity')->default(0);
            $table->boolean('availability')->default(1); #dostępne
            $table->boolean('is_promo')->default(0);     #brak promocji
            $table->boolean('is_news')->default(0);      #nie jest nowością
            $table->decimal('old_price')->nullable();
            $table->string('status')->default('AVAILABLE');
            $table->integer('views')->default(0);
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
