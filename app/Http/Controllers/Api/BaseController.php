<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Traits\ApiResponsive;

class BaseController extends Controller
{
    use ApiResponsive;

    public function __construct()
    {
    }
}
