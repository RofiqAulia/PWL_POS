<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class t_penjualan extends Model
{
    use HasFactory;

    protected $table = 't_penjualan';
    protected $primaryKey = 'penjualan_id';

 
    protected $fillable = ['user_id', 'pembeli', 'penjualan_kode','penjualan_tanggal'];
 
    public function user(): BelongsTo
    {
        return $this->belongsTo(m_user::class, 'user_id', 'user_id');
    }

    public function penjualan_detail(): HasMany
    {
        return $this->hasMany(t_penjualan_detail::class, 'penjualan_id', 'penjualan_id');
    }
}