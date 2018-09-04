<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    protected $table = 'shoppingCart';
    protected $primaryKey = 'id';
    protected $fillable = ['idProduct','idUser'];
    public $timestamps = false;
}
