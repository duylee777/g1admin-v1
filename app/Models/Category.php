<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public $table = "categories";

    protected $fillable = [
        'id',
        'slug',
        'name',
        'email',
        'description',
        'parent_id',
    ];

    public function childs() {
        return $this->hasMany(Category::class,'parent_id','id') ;
    }
    public function parent()
    {
        return $this->belongsTo(Category::class,'parent_id');
    }
}
