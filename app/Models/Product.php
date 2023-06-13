<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $fillable = [
        'category_id',
        'brand_id',
        'product_name',
        'product_title',
        'product_desc',
        'product_quantity',
        'product_tag',
        'product_content',
        'slug',
        'product_price',
        'product_image',
        'category_status',
    ];
    protected $primaryKey = 'product_id';
    protected $table = 'tbl_product';
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }
    
}
