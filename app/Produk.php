<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{

    protected $table = 'produks';


    protected $fillable = [
        'name',
        'harga',
        'stok'
    ];

    // 'kategori_id',

    // public function kategori()
    // {
    //     return $this->belongsTo(Kategori::class);
    // }
}
