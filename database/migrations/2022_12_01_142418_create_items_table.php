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
        Schema::create('items', function (Blueprint $table) {
            $table->id();

            $table->string('name', 120);
            $table->unsignedBigInteger('price')->nullable();
            $table->unsignedBigInteger('cost')->nullable();
            $table->unsignedBigInteger('stock')->nullable();
            $table->unsignedBigInteger('low_stock_threshold')->nullable();

            $table->boolean('track_stock')->default(false);
            $table->boolean('sell')->default(true);

            $table->foreignId('store_id');
            $table->foreign('store_id')->references('id')->on('stores');

            $table->foreignId('parent_id')->nullable();
            $table->foreign('parent_id')->references('id')->on('items');

            $table->foreignId('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('item_categories');

            $table->foreignId('created_by')->nullable();
            $table->foreign('created_by')->references('id')->on('users');

            $table->foreignId('updated_by')->nullable();
            $table->foreign('updated_by')->references('id')->on('users');

            $table->timestamps();

            $table->index(['store_id', 'name']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
};
