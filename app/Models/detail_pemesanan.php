<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detail_pemesanan extends Model
{
    use HasFactory;

    protected $table = 'detail_pemesanan';
    protected $fillable = [
        'id_pemesanan',
        // 'id_product',
        // 'status',
        // 'quantity',
        'total_price',
    ];

    public $created_at = false;
    public $updated_at = false;

    public function pemesanan(){
        return $this->belongsTo(pemesanan::class, 'id_pemesanan');
    }
    // public function produk(){
    //     return $this->belongsTo(produk::class, 'id_product');
    // }
}
