<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('master_id');
            $table->string('size');
            $table->integer('pairs')->default(0);
            $table->integer('no_ctn')->nullable();
            $table->integer('barcode_ctn')->nullable();
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
        Schema::dropIfExists('master_items');
    }
}
