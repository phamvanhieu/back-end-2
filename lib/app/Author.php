<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    //khoa chinh neu khac id
    public $primaryKey = "au_id";
    public $timestamps = false;
}
