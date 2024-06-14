<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class TransaksiModel extends Model
{
    use HasFactory;
    // table name, primary key, and other property related to database
    protected $table = 't_penjualan';
    protected $primarykey = 'penjualan_id';

    // fillable field
    protected $fillable =[
        'penjualan_id',
        'user_id',
        'pembeli',
        'penjualan_kode',
        'penjualan_tanggal',
        'image'
    ];

    // relationship with user
    public function user()
    {
        return $this->belongsTo(UserModel::class, 'user_id', 'user_id');
    }

    // relationship with detail penjualan
    public function detail_penjualan()
    {
        return $this->hasMany(TransaksiModel::class, 'penjualan_id', 'penjualan_id');
    }

    public function image(): Attribute
    {
        return Attribute::make(
            get:fn($image) => url('/storage/posts/'.$image),
        );
    }
}
