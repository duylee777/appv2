<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public $table = "products";

    protected $fillable = [
        'code',
        'name',
        'slug',
        'description',
        'origin',
        'image',
        'document',
        'software',
        'driver',
        'specifications',
        'is_active',
        'is_featured',
        'cost_price',
        'odd_price',
        'discount_id',
        'inventory_id',
        'category_id',
        'unit_id',
        'brand_id',
        'created_at',
        'updated_at'
    ];
}
