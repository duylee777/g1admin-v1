<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    
    public $table = "tags";

    protected $fillable = [
        'id', 'name', 'slug'
    ];

    public function articles(){
        return $this->belongsToMany(Article::class,'article_tag', 'article_id', 'tag_id');
    }
}
