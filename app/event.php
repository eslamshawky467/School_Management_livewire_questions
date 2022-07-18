<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class event extends Model
{
    protected $table="events1";
    protected $fillable=["title","color","start_date","end_date"];
}
