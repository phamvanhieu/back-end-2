<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //khoa chinh neu khac id
    public $primaryKey = "comment_id";
    public $timestamps = false;
}
