<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;
    
    protected $fillable = ['title', 'slug'];

    // creo un one to many relationship con la tabella products
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
