<?php


namespace App\Services;


use App\Exceptions\ApiErrorException;
use App\Http\Requests\Api\Auth\LoginRequest;
use App\Models\User;
use App\Services\Interfaces\AuthServiceInterface;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Laravel\Passport\Token;

class AuthService extends BaseService implements AuthServiceInterface
{
    public function login(LoginRequest $request)
    {
        $credentials = $request->only(['email', 'password']);
        $isRememberMe = $request->input('remember_me', false);

        if (! Auth::guard('web')->attempt($credentials)) {
            throw new ApiErrorException(__('auth.failed'));
        }

        $user = Auth::guard('web')->user();
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;

        if ($isRememberMe) {
            if (! $this->changeExpireTime($token, 365)) {
                throw new ApiErrorException(__('http_errors.500'));
            }
        }

        return [
            'username' => $user->username,
            'email' => $user->email,
            'avatar' => $user->avatar ?? User::AVATAR_DEFAULT,
            'description' => $user->description ?? '',
            'token_type' => 'Bearer',
            'access_token' => $tokenResult->accessToken,
            'expires_at' => Carbon::parse($token->expires_at)->toDateTimeString(),
        ];
    }

    private function changeExpireTime(Token $token, int $periodDays = 1)
    {
        return $token->update([
            'expires_at' => Carbon::now()->addDays($periodDays)->toDateTimeString(),
        ]);
    }
}
