<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeTypeDataBarcodeCtnOnMasterItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::table('master_items', function (Blueprint $table) {
    		$table->string('barcode_ctn')->change();
    	});	

    	Schema::table('masters', function (Blueprint $table) {
    		$table->string('barcode')->after('id')->nullable();
    	});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
