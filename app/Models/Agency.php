<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agency extends Model
{
    use HasFactory;

    public $table = "agencies";

    protected $fillable = [
        'slug', 'name', 'logo', 'email', 'phone', 'address', 'city', 'map_link', 'product_link' 
    ];
}
