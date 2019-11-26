<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //khoa chinh neu khac id
    public $primaryKey = "product_id";
    public $timestamps = false;
}
