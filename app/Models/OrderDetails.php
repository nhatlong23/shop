<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $fillable = [
        'product_id',
        'product_name',
        'product_price',
        'product_sales_quantity',
        'product_coupon',
        'product_feeship',
        'order_code',
    ];
    protected $primaryKey = 'order_details_id';
    protected $table = 'tbl_order_details';

    public function product(){
        return $this->belongsTo(Product::class, 'product_id');
    }
}
