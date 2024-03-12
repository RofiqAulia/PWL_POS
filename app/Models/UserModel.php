<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class UserModel extends Model
{
    use HasFactory;
    protected $primaryKey = 'user_id';
    protected $table = 'm_user';

    protected $fillable = ['level_id', 'username', 'nama', 'password'];
    public function level(): BelongsTo
    {

        return $this->belongsTo(LevelModel::class, 'level_id', 'level_id');
    }
}
