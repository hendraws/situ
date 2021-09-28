<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColomnCartonToScanInsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::table('scan_ins', function (Blueprint $table) {
    		$table->integer('barcode_ctn')->after('master_id')->nullable();
    		$table->integer('no_ctn')->after('master_id')->nullable();
    		$table->integer('pairs')->default(0)->after('master_id');
    		$table->string('size')->after('master_id');
    		$table->dropColumn('qty');
    	});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    	Schema::table('scan_ins', function (Blueprint $table) {
            //
    	});
    }
}
