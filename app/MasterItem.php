<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterItem extends Model
{
	protected $fillable = ['master_id', 'size','pairs','no_ctn','barcode_ctn','status','modul','keterangan','lokasi'];

	public function Master()
	{
		return $this->belongsTo(Master::class,  'master_id','id');	
	}

}
