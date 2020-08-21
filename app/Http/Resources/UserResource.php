<?php

namespace App\Http\Resources;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\URL;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @param null $tokenResult
     * @param null $token
     * @return array
     */
    public function toArray($request = null, $tokenResult = null, $token = null)
    {
        return array_merge([
            'username' => $this->username,
            'email' => $this->email,
            'avatar' => $this->avatar ?? User::AVATAR_DEFAULT,
            'description' => $this->description ?? '',
            'roles' => RoleResource::collection($this->whenLoaded('roles')),
        ], $this->mergeWhen(URL::current() === route('login'), [
            'token_type' => 'Bearer',
            'access_token' => $tokenResult->accessToken ?? '',
            'expires_at' => Carbon::parse($token->expires_at ?? now())->toDateTimeString(),
        ])->data);
    }
}
