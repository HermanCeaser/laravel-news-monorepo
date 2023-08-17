<?php

declare(strict_types=1);

namespace App\Services\GuardianApi;

use App\Services\Concerns\BuildBaseRequest;
use App\Services\Concerns\CanSendGetRequest;
use App\Services\Contracts\NewsService;
use App\Services\GuardianApi\Resources\GuardianApiResource;

class GuardianApiService implements NewsService
{
    use BuildBaseRequest;
    use CanSendGetRequest;

    public function __construct(
        private readonly string $baseUrl,
        public readonly string $key,
        public readonly int $timeout,
        public readonly null|int $retryTimes = null,
        public readonly null|int $retrySleep = null,
    ) {
    }

    public function getNews(): GuardianApiResource
    {
        return new GuardianApiResource(service: $this);
    }
}
