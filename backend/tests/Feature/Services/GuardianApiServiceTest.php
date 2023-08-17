<?php

namespace Tests\Feature\Services;

use App\Services\GuardianApi\GuardianApiService;
use Illuminate\Http\Client\PendingRequest;

it('can build a new GuardianApi Service', function () {
    expect(
        new GuardianApiService(
            baseUrl: 'BASE_URL',
            key: 'KEY',
            timeout: 10,
        )
    )->toBeInstanceOf(GuardianApiService::class);
});

it('can create a Pending Request', function () {
    $service = new GuardianApiService(
        baseUrl: 'BASE_URL',
        key: 'KEY',
        timeout: 10,
    );

    expect(
        $service->withBaseUrl(),
    )->toBeInstanceOf(PendingRequest::class);
});
