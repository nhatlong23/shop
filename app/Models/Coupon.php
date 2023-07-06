<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $fillable = [
        'coupon_name',
        'coupon_code',
        'coupon_time',
        'coupon_condition',
        'coupon_number',
        'coupon_start',
        'coupon_end',
        'coupon_used',
        'counpon_status',
    ];
    protected $primaryKey = 'coupon_id';
    protected $table = 'tbl_coupon';
}
