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

    public function masterItem()
    {
    	return $this->belongsTo(MasterItem::class, 'id', 'master_id');	
    }
}
