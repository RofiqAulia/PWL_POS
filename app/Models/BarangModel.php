<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangModel extends Model
{
    use HasFactory;

    protected $table = 'm_barang';
    protected $primaryKey = 'barang_id';

    protected $guarded = [];

    public function kategori()
    {
        return $this->belongsTo(KategoriModel::class, 'kategori_id');
    }

}
