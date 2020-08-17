<?php

use Illuminate\Support\Facades\Auth;

if (! function_exists('me')) {
    function me($key = null) {
        if (! Auth::guard('api')->check()) {
            return null;
        }

        return $key ? Auth::guard('api')->user()->getAttribute($key) : Auth::guard('api')->user();
    }
}
