<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExtendProduct extends Model
{
    use HasFactory;

    public $table = 'extend_products';

    protected $fillable = [
        'product_id', 'document', 'software', 'driver'
    ];
}
