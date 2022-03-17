<?php

use App\Models\User;
use function Pest\Laravel\postJson;

test('user cannot login with invalid credentials', function () {
    $response = postJson('/api/v1/auth/login', [
        'email' => 'admin@gmail.com',
        'password' => 'password',
    ]);

    $response->assertStatus(400);
});

test('user can login', function () {
    User::query()->forceCreate([
        'name' => 'Taylor Otwell',
        'username' => 'Taylor',
        'email' => 'taylor@laravel.com',
        'password' => bcrypt('secret'),
    ]);

    $response = postJson('/api/v1/auth/login', [
        'email' => 'taylor@laravel.com',
        'password' => 'secret',
    ]);

    $response->assertStatus(200);
});

test('user can register', function () {
    $response = postJson('/api/v1/auth/register', [
        'name' => 'Taylor Otwell',
        'username' => 'Taylor',
        'email' => 'taylor@laravel.com',
        'password' => 'password',
        'password_confirmation' => 'password',
    ]);

    $response->assertStatus(201);
    expect($response->json('meta.token'))->not->toBeEmpty();
});
