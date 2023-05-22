<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $fillable = [
        'brand_name',
        'brand_desc',
        'slug',
        'brand_status',
    ];
    protected $primaryKey = 'brand_id';
    protected $table = 'tbl_brand_product';

    //1 thuong hieu co nhieu san pham
    public function product()
    {
        return $this->hasMany(Product::class)->orderBy('product_id', 'desc');
    }
    //1 san pham co nhieu thuong hieu
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
    
}
