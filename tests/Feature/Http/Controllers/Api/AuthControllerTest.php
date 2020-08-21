<?php

namespace Tests\Feature\Http\Controllers\Api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use Tests\TestCase;

class AuthControllerTest extends TestCase
{
    const HEADERS = [
        'Accept' => 'application/json',
    ];
    const OVER_MAX_LENGTH = 256;

    public function testRequiredFieldsForLogin()
    {
        $message = 'The given data was invalid.';
        $errors = [
            'email' => [
                'The Email field is required.'
            ],
            'password' => [
                'The Password field is required.'
            ],
        ];

        $this->postJson(route('login'), [], self::HEADERS)
            ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY)
            ->assertJson($this->responseValidationJson($message, $errors));
    }

    public function testEmailIsInvalidForLogin()
    {
        $data = [
            'email' => '123',
            'password' => '123456',
        ];
        $message = 'The given data was invalid.';
        $errors = [
            'email' => [
                'The Email must be a valid email address.'
            ],
        ];

        $this->postJson(route('login'), $data, self::HEADERS)
            ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY)
            ->assertJson($this->responseValidationJson($message, $errors));
    }

    public function testFieldIsOverMaxLengthForLogin()
    {
        $data = [
            'email' => Str::random(self::OVER_MAX_LENGTH) . '@gmail.com',
            'password' => Str::random(self::OVER_MAX_LENGTH),
        ];
        $message = 'The given data was invalid.';
        $errors = [
            'email' => [
                'The Email may not be greater than 255 characters.'
            ],
        ];

        $this->postJson(route('login'), $data, self::HEADERS)
            ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY)
            ->assertJson($this->responseValidationJson($message, $errors));
    }

    public function testRememberMeFieldIsNotBoolean()
    {
        $data = [
            'email' => 'duongson29111997@gmail.com',
            'password' => 'password',
            'remember_me' => 'isNotBoolean',
        ];
        $message = 'The given data was invalid.';
        $errors = [
            'remember_me' => [
                'The remember me field must be true or false.'
            ],
        ];

        $this->postJson(route('login'), $data, self::HEADERS)
            ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY)
            ->assertJson($this->responseValidationJson($message, $errors));
    }

    protected function responseValidationJson(string $message, array $errors) : array
    {
        return [
            'type' => 'Error',
            'message' => $message,
            'data' => [],
            'meta' => [
                'code' => 0,
                'errors' => $errors
            ]
        ];
    }

    public function testCredentialsIsInvalidForLogin()
    {
        $data = [
            'email' => 'duongson29111997@gmail.com',
            'password' => 'wrongPassword',
            'remember_me' => true,
        ];

        $this->postJson(route('login'), $data, self::HEADERS)
            ->assertStatus(Response::HTTP_INTERNAL_SERVER_ERROR)
            ->assertJson([
                'type' => 'Error',
                'message' => 'These credentials do not match our records.',
                'data' => [],
                'meta' => []
            ]);
    }

    public function testSuccessLogin()
    {
        $data = [
            'email' => 'duongson29111997@gmail.com',
            'password' => '123456',
            'remember_me' => true,
        ];

        $this->postJson(route('login'), $data, self::HEADERS)
            ->assertOk()
            ->assertJsonStructure([
                'type',
                'message',
                'data' => [
                    'username',
                    'email',
                    'avatar',
                    'description',
                    'roles',
                    'token_type',
                    'access_token',
                    'expires_at'
                ],
                'meta'
            ]);
    }
}
