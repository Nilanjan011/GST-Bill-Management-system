<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Distributo extends Model

{
    protected $table="Distributors";
    public $timestamps = true;

    protected $fillable=[ 'name', 'email','gstin', 'phone','address','date','user_status','payment_status'];
}
