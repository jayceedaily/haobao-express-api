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
        Schema::create('item_modifier', function (Blueprint $table) {
            $table->id();

            $table->foreignId('item_id')->nullable();
            $table->foreign('item_id')->references('id')->on('items');

            $table->foreignId('modifier_id')->nullable();
            $table->foreign('modifier_id')->references('id')->on('modifiers');


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
        Schema::dropIfExists('item_modifier');
    }
};
