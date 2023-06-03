<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $fillable = [
        'info_title',
        'info_desc',
        'info_logo',
        'info_phone',
        'info_email',
    ];
    protected $primaryKey = 'info_id';
    protected $table = 'tbl_info';
}
