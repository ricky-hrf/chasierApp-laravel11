<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $fillable = [
        'kode_transaksi',
        'total_transaksi',
        'status_transaksi',
    ];
    public function detailTransaksi()
    {
        return $this->hasMany(DetailTransaksi::class);
    }
}
