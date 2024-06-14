<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiDetailModel extends Model
{
    use HasFactory;

    // table name, primary key, and other property related to database
    protected $table = 't_penjualan_detail';
    protected $primaryKey = 'detail_id';

    // fillable field
    protected $fillable = [
        'detail_penjualan_id',
        'penjualan_id',
        'barang_id',
        'jumlah',
        'harga'
    ];

    // relationship with barang
    public function barang()
    {
        return $this->belongsTo(BarangModel::class, 'barang_id', 'barang_id');
    }

    // relationship with penjualan
    public function penjualan()
    {
        return $this->belongsTo(TransaksiModel::class, 'penjualan_id', 'penjualan_id');
    }
}