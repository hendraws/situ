<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterItem extends Model
{
    protected $fillable = ['master_id', 'size','pairs','no_ctn','barcode_ctn'];
}
