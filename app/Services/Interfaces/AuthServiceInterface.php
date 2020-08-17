<?php


namespace App\Services\Interfaces;


use App\Http\Requests\Api\Auth\LoginRequest;

interface AuthServiceInterface
{
    public function login(LoginRequest $request);
}
