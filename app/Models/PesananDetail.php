<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesananDetail extends Model
{
    public function post(){
        return $this->belongsTo('App\Models\Post', 'barang_id', 'id');
    }

    public function pesanan(){
        return $this->belongsTo('App\Models\Pesanan', 'pesanan_id', 'id');
    }
}

