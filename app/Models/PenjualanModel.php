<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenjualanModel extends Model
{
    use HasFactory;
    protected $table = 'm_penjualan';
    protected $primaryKey = 'penjualan_id';

    protected $guarded = [];
}
