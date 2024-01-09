<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public $table = "products";

    protected $fillable = [
        'id','code', 'name', 'slug', 'description', 'images', 'category_id', 'active', 'featured', 'origin', 'unit_id', 'brand_id'
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function brand(){
        return $this->belongsTo(Brand::class);
    }
    public function unit(){
        return $this->belongsTo(Unit::class);
    }

    public function specTypes(){
        return $this->belongsToMany(SpecType::class,'product_specifications','product_id','type_id')->withPivot('value');
    }
}
