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
        Schema::create('item_categories', function (Blueprint $table) {
            $table->id();

            $table->string('name');

            $table->longText('description')->nullable();

            $table->foreignId('store_id')->nullable();
            $table->foreign('store_id')->references('id')->on('stores');

            $table->foreignId('created_by')->nullable();
            $table->foreign('created_by')->references('id')->on('users');

            $table->foreignId('updated_by')->nullable();
            $table->foreign('updated_by')->references('id')->on('users');

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
        Schema::dropIfExists('item_categories');
    }
};
