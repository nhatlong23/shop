<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $fillable = [
        'name',
        'images',
        'product_id',
    ];
    protected $primaryKey = 'id';
    protected $table = 'tbl_gallery';
}
