<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produk extends Model
{
    use HasFactory;

    protected $table = 'produk';
    protected $primaryKey = 'id_product';

    public $created_at = false;
    public $updated_at = false;

    // public function detail_pemesanan(){
    //     return $this->hasMany(detail_pemesanan::class, 'id_pemesanan');
    // }
}
