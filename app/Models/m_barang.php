<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class m_barang extends Model
{
    use HasFactory;

    protected $table = 'm_barang';
    protected $primaryKey = 'barang_id';

    // @var array
    // protected $fillable = ['kategori_id', 'barang_kode', 'barang_nama', 'harga_beli', 'harga_jual'];
    // protected $fillable = ['level_id', 'username', 'nama'];
    protected $guarded = [];

    public function kategori(): BelongsTo
    {
        return $this->belongsTo(m_kategori::class, 'kategori_id', 'kategori_id');
    }

    public function stok(): HasMany
    {
        return $this->hasMany(t_stok::class, 'barang_id', 'barang_id');
    }
}