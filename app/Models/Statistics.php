<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statistics extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $fillable = [
        'order_date',
        'sales',
        'profit',
        'quantity',
        'total_order',
    ];
    protected $primaryKey = 'id';
    protected $table = 'tbl_statistical';
}
