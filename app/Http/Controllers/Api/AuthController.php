<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\Auth\LoginRequest;
use App\Services\Interfaces\AuthServiceInterface;

class AuthController extends BaseController
{
    private $authService;

    public function __construct(AuthServiceInterface $authService)
    {
        parent::__construct();

        $this->authService = $authService;
    }

    public function login(LoginRequest $request)
    {
        $response = $this->authService->login($request);

        return $this->responseSuccess(__('auth.login-success'), $response);
    }
    public function formLogin() {
        return view('auth/login');
    }
}
