<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitors extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $fillable = [
        'ip_address',
    ];
    protected $primaryKey = 'id';
    protected $table = 'tbl_visitors';
}
