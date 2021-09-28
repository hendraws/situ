<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ScanIn extends Model
{
    protected $fillable = [ 'master_items_id', 'master_id', 'qty', 'status', 'keterangan', 'created_by',     ]
}
