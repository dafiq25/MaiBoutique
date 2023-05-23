<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pemesanan extends Model
{
    use HasFactory;

    protected $table = 'pemesanan';
    protected $primaryKey = 'id_pemesanan';

    public $created_at = false;
    public $updated_at = false;

    public function users(){
        return $this->belongsTo(users::class, 'id');
    }

    public function detail_pemesanan(){
        return $this->hasMany(detail_pemesanan::class, 'id_pemesanan');
    }
}
