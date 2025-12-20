<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('product_id');
            $table->string('customer_name');
            $table->text('customer_address');
            $table->string('delivery_option'); // 'delivery' or 'pickup'
            $table->string('status')->default('pending');
            $table->timestamps();

            // Optional: Foreign key constraint (if product is deleted, what happens? maybe cascade or set null)
            // For simplicity in this project, we might skip strict FK or just add it.
            // $table->foreign('product_id')->references('id')->on('ecommerce')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
