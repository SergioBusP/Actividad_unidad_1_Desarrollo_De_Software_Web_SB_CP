<?php

namespace Infrastructure\Adapters\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    protected $table = 'users';

    protected $fillable = [
        'id',
        'username',
        'email',
        'password',
        'role',
        'active'
    ];
}
