<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $fillable = [
        'name',
    ];
    protected $primaryKey = 'id_roles';
    protected $table = 'tbl_roles';

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
