<?php

use App\Models\User;

use function Pest\Laravel\actingAs;

test('quotes endpoint needs authentication', function () {
    $this->getJson('/api/quotes')->assertStatus(401);

    actingAs(User::factory()->create());
    $this->getJson('/api/quotes')->assertStatus(200);
});

test('the quotes are cached', function () {
    actingAs(User::factory()->create());

    $firstResult = $this->getJson('/api/quotes')->getContent();
    $secondResult = $this->getJson('/api/quotes')->getContent();

    expect($firstResult)->toEqual($secondResult);
});

test('the cache can be refreshed', function () {
    actingAs(User::factory()->create());

    $firstResult = $this->getJson('/api/quotes')->getContent();
    $secondResult = $this->getJson('/api/quotes/refresh')->getContent();

    expect($firstResult)->not->toEqual($secondResult);
});
