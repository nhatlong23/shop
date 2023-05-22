<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $fillable = [
        'category_name',
        'category_desc',
        'slug',
        'category_status',
    ];
    protected $primaryKey = 'category_id';
    protected $table = 'tbl_category_product';

    //1 danh muc co nhieu san pham
    public function product()
    {
        return $this->hasMany(Product::class)->orderBy('product_id', 'desc');
    }
    //1 san pham co nhieu danh muc
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
