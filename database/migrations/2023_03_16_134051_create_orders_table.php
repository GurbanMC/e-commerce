<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('location_id')->index()->default(1);
            $table->foreign('location_id')->references('id')->on('locations')->cascadeOnDelete();
            $table->unsignedBigInteger('customer_id')->index()->nullable();
            $table->foreign('customer_id')->references('id')->on('customers')->nullOnDelete();
            $table->string('code')->unique();
            $table->string('customer_name');
            $table->string('customer_phone');
            $table->string('customer_username');
            $table->string('customer_address');
            $table->string('customer_note')->nullable();
            $table->unsignedDouble('products_price')->nullable();
            $table->unsignedDouble('delivery_fee')->default(0);
            $table->unsignedDouble('total_price')->default(0);
            $table->unsignedTinyInteger('platform')->default(0);
            $table->unsignedTinyInteger('language')->default(0);
            $table->unsignedTinyInteger('payment')->default(0);
            $table->unsignedTinyInteger('status')->default(0);
            $table->softDeletes();
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
        Schema::dropIfExists('orders');
    }
};
