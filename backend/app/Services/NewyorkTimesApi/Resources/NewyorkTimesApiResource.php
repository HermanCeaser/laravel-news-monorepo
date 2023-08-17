<?php

namespace App\Services\NewyorkTimesApi\Resources;

use App\Services\Contracts\NewsClient;
use App\Services\NewyorkTimesApi\NewyorkTimesApiService;

class NewyorkTimesApiResource implements NewsClient
{
    public function __construct(
        private readonly NewyorkTimesApiService $service,
    ) {
    }

    public function all()
    {
        // "/svc/news/v3/content/all/all.json"
        $queryParams = [
            'api-key' => $this->service->key,
        ];

        return $this->service->get(
            request: $this->service->withBaseUrl(),
            url: '/svc/news/v3/content/all/all.json',
            queryParams: $queryParams
        );
    }

    public function topHeadlines()
    {
        // "/svc/topstories/v2/home.json"
        $queryParams = [
            'api-key' => $this->service->key,
        ];

        return $this->service->get(
            request: $this->service->withBaseUrl(),
            url: '/svc/topstories/v2/home.json',
            queryParams: $queryParams
        );
    }

    public function search(string $query)
    {
        // "/search?api-key=test"
        $queryParams = [
            'api-key' => $this->service->key,
        ];

        return $this->service->get(
            request: $this->service->withBaseUrl(),
            url: '/search',
            queryParams: $queryParams
        );
    }
}
