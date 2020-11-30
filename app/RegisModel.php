<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegisModel extends Model
{
    public $timestamps = true;

    protected $fillable=[ 'name', 'email', 'password'];
}
