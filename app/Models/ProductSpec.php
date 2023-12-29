<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSpec extends Model
{
    use HasFactory;

    public $table = "product_specifications";

    protected $fillable = [
        'product_id', 'type_id', 'value'
    ];

    // public function products(){
    //     return $this->belongsToMany(Product::class,'products');
    // }

    // public function specTypes(){
    //     return $this->belongsToMany(SpecType::class,'specification_types');
    // }
}
