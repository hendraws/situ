<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScanInsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scan_ins', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('master_items_id')->nullable();
            $table->bigInteger('master_id')->nullable();
            $table->string('qty');
            $table->string('status')->nullable();
            $table->string('keterangan')->nullable();
            $table->string('created_by')->nullable();
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
        Schema::dropIfExists('scan_ins');
    }
}
