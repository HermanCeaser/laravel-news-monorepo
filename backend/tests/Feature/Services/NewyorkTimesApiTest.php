<?php

namespace Tests\Feature\Services;

use App\Services\NewyorkTimesApi\NewyorkTimesApiService;
use Illuminate\Http\Client\PendingRequest;

it('can build a new NewyorkTimesApi Service', function () {
    expect(
        new NewyorkTimesApiService(
            baseUrl: 'BASE_URL',
            key: 'KEY',
            timeout: 10,
        )
    )->toBeInstanceOf(NewyorkTimesApiService::class);
});

it('can create a Pending Request', function () {
    $service = new NewyorkTimesApiService(
        baseUrl: 'BASE_URL',
        key: 'KEY',
        timeout: 10,
    );

    expect(
        $service->withBaseUrl(),
    )->toBeInstanceOf(PendingRequest::class);
});
