<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'produks';

    protected $fillable = [
        'name',
        'harga',
        'kategori_id',
        'stok'
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

}
