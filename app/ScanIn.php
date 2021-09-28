<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ScanIn extends Model
{
	protected $fillable = [ 'master_items_id', 'master_id', 'barcode_ctn','no_ctn','pairs','size', 'status', 'keterangan', 'created_by' ];
	public function Master()
	{
		return $this->belongsTo(Master::class,  'master_id','id');	
	}
}
