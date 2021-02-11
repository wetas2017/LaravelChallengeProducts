<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = ['name', 'description', 'price', 'image', 'category_id'];
    use HasFactory;


    // Relation that product belongsTo Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
