<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //khoa chinh neu khac id
    public $primaryKey = "customer_id";
    public $timestamps = false;
}
