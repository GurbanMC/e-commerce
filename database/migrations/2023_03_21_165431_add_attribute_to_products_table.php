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
        Schema::table('products', function (Blueprint $table) {
            $table->unsignedBigInteger('gender_id')->index()->nullable();
            $table->foreign('gender_id')->references('id')->on('attribute_values')->nullOnDelete();
            $table->unsignedBigInteger('color_id')->index()->nullable();
            $table->foreign('color_id')->references('id')->on('attribute_values')->nullOnDelete();
            $table->unsignedBigInteger('size_id')->index()->nullable();
            $table->foreign('size_id')->references('id')->on('attribute_values')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['color_id', 'size_id']);
        });
    }
};
