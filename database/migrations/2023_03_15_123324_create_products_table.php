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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories')->cascadeOnDelete();
            $table->unsignedBigInteger('brand_id');
            $table->foreign('brand_id')->references('id')->on('brands')->cascadeOnDelete();
            $table->string('code')->index();
            $table->string('name_tm');
            $table->string('name_en')->nullable();
            $table->string('full_name_tm');
            $table->string('full_name_en')->nullable();
            $table->string('slug')->unique();
            $table->string('image')->nullable();
            $table->string('barcode')->nullable();
            $table->unsignedDouble('price')->default(0);
            $table->unsignedInteger('stock')->default(0);
            $table->unsignedFloat('discount_percent')->default(0);
            $table->dateTime('discount_start');
            $table->dateTime('discount_end');
            $table->unsignedInteger('sold');
            $table->unsignedInteger('favorites');
            $table->unsignedInteger('viewed');
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
};
