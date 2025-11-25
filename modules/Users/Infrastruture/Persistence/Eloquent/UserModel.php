<?php

namespace Modules\Users\Infrastruture\Persistence\Eloquent;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class UserModel extends Authenticatable {
    use HasApiTokens;

    protected $table = 'users';
    protected $fillable = [
        'id', 'name','email','password',
    ];

    protected $hidden = ['password'];
}