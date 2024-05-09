<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model; use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Foundation\Auth\User as Authenticatable;


class UserModel extends Authenticatable implements JWTSubject
{

public function getJWTIdentifier(){ return $this->getKey();
}

public function getJWTCustomClaims(){ return [];
}

protected $table = 'm_user'; protected $primaryKey = 'user_id';

protected $fillable = [ 'username', 'nama', 'password', 'level_id', 'image'//tambahan
];

public function level()
{
return $this->belongsTo(LevelModel::class, 'level_id', 'level_id');
}
protected function image(): Attribute
{
return Attribute::make(
get: fn ($image) => url('/storage/posts/' . $image),
);
}

}
