<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $fillable = [
        'provider_user_id',
        'provider',
        'user',
    ];
    protected $primaryKey = 'user_id';
    protected $table = 'tbl_social';

    public function admin(){
        return $this->belongsTo('App\Models\Admin', 'user');
    }
}
