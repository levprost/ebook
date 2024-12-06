<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'discription', 'sumary','image','category_id','author_id'];

    public function category()
    {
        return $this->belongsTo(Category::class); 
    }
    public function author()
    {
        return $this->belongsTo(Author::class); 
    }
}
