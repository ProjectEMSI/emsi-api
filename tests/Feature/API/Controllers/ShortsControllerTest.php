<?php

use function Pest\Laravel\get;

it('returns latest shorts', function () {
    $response = get('/api/v1/shorts');

    $response->assertStatus(200);
});

it('returns shorts widget', function () {
    $response = get('/api/v1/shorts/widget');

    $response->assertStatus(200);
});
