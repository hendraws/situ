<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTblToMasterItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('master_items', function (Blueprint $table) {
            $table->string('status')->after('barcode_ctn')->nullable();
            $table->string('modul')->after('barcode_ctn')->nullable();
            $table->string('keterangan')->after('barcode_ctn')->nullable();
            $table->string('lokasi')->after('barcode_ctn')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('master_items', function (Blueprint $table) {
            //
        });
    }
}
