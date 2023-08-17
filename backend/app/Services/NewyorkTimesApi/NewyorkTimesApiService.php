<?php

declare(strict_types=1);

namespace App\Services\NewyorkTimesApi;

use App\Services\Concerns\BuildBaseRequest;
use App\Services\Concerns\CanSendGetRequest;
use App\Services\Contracts\NewsService;
use App\Services\NewyorkTimesApi\Resources\NewyorkTimesApiResource;

class NewyorkTimesApiService implements NewsService
{
    use CanSendGetRequest;
    use BuildBaseRequest;

    public function __construct(
        private readonly string $baseUrl,
        public readonly string $key,
        public readonly int $timeout,
        public readonly null|int $retryTimes = null,
        public readonly null|int $retrySleep = null,
    ) {
    }

    public function getNews(): NewyorkTimesApiResource
    {
        return new NewyorkTimesApiResource(service: $this);
    }
}
