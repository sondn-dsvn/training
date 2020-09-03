<?php

namespace App\Models;


class Role extends BaseModel
{
    protected $table = 'roles';
    protected $hidden = ['pivot'];
}
