<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Role extends BaseModel
{
    protected $table = 'roles';
    protected $hidden = ['pivot'];
    const ROLE_ADMIN = 1;
    const ROLE_LEADER = 2;
    const ROLE_EMPLOYEE = 3;

    protected $fillable = [
        'name'
    ];

    public function roles()
    {
        return $this->belongsToMany('App\Models\User');
    }
}
