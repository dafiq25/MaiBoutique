<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    use HasFactory;

    protected $table = 'cart';
    protected $primaryKey = 'id_cart';

    public $created_at = false;
    public $updated_at = false;

    public function pemesanan(){
        return $this->belongsTo(pemesanan::class, 'id_pemesanan');
    }

    public function users(){
        return $this->belongsTo(users::class, 'id');
    }

    public function produk(){
        return $this->belongsTo(produk::class, 'id_product');
    }
}
