<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buying extends Model
{
    use HasFactory;

    /**
     * 
     * 
     * @var array
     *  */ 

    protected $fillable = [
        'nama', 
        'email',
        'no_telp',
        'alamat',
        'nama_brg',
        'harga'
    ];
}
