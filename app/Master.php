<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Master extends Model
{
    protected $fillable = [
    	"po_no",
    	"order_no",
    	"customer",
    	"customer_no",
    	"item",
    	"article",
    	"colour",
    	"total_qty",
    	"created_by",
    	"updated_by",
    ];

    public function masterItems()
    {
    	return $this->hasMany(MasterItem::class,  'master_id','id');	
    }    
    public function masterItemDetail()
    {
    	return $this->hasMany(MasterItem::class,  'master_id','id')->whereNotNull('pairs')->get();	
    }    
    public function masterItemWarehouse()
    {
    	return $this->hasMany(ScanIn::class,  'master_id','id');	
    }
}
