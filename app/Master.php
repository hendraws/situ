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
    	return $this->belongsTo(MasterItem::class, 'id', 'master_id');	
    }    
    public function masterItemDetail()
    {
    	return $this->belongsTo(MasterItem::class, 'id', 'master_id')->whereNotNull('pairs')->get();	
    }
}
