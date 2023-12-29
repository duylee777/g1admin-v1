<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public $table = "products";

    protected $fillable = [
        'id','code', 'name', 'slug', 'description', 'images', 'category_id', 'active',
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function specTypes(){
        return $this->belongsToMany(SpecType::class,'product_specifications','product_id','type_id')->withPivot('value');
    }
}
