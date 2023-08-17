<?php

namespace Tests\Feature\Services;

use App\Services\NewsApi\NewsApiService;
use Illuminate\Http\Client\PendingRequest;

it('can build a new NewsApi Service', function () {
    expect(
        new NewsApiService(
            baseUrl: 'BASE_URL',
            key: 'KEY',
            timeout: 10,
        )
    )->toBeInstanceOf(NewsApiService::class);
});

it('can create a Pending Request', function () {
    $service = new NewsApiService(
        baseUrl: 'BASE_URL',
        key: 'KEY',
        timeout: 10,
    );

    expect(
        $service->withBaseUrl(),
    )->toBeInstanceOf(PendingRequest::class);
});
