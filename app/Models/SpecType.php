<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpecType extends Model
{
    use HasFactory;

    public $table = "specification_types";

    protected $fillable = [
        'id','name',
    ];

    public function specProducts(){
        return $this->belongsToMany(Product::class,'product_specifications','product_id','type_id')->withPivot('value');
    }
}
