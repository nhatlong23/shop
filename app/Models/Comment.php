<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $fillable = [
        'comment',
        'name',
        'product_id',
        'avatar',
        'comment_parent_comment',
    ];
    protected $primaryKey = 'id';
    protected $table = 'tbl_comment';

    //1 comment thuộc 1 product
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
