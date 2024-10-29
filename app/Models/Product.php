<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'cover_image',
        'published',
        'slug',
        'type_id'
    ];


    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
