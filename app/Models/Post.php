<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'image',
        'title',
        'harga',
        'stok',
        'desc'
    ];

    public function pesananDetail(){
        return $this->hasMany('App\PesananDetail', 'barang_id','id');
    }
}
