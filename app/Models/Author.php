<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Author extends Model
{
    use HasFactory;

    protected $fillable = ['first_name', 'last_name', 'nationality'];
    public function book() 
    { 
        return $this->hasMany(Book::class); 
    }
}
