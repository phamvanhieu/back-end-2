<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    //khoa chinh neu khac id
    public $primaryKey = "bill_id";
    public $timestamps = false;
}
