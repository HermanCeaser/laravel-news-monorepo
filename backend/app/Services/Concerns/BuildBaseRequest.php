<?php

declare(strict_types=1);

namespace App\Services\Concerns;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

trait BuildBaseRequest
{
    public function withBaseUrl(): PendingRequest
    {
        $request = Http::baseUrl(
            url: $this->baseUrl,
        )->timeout(
            seconds: $this->timeout,
        );

        if (! is_null($this->retryTimes) && ! is_null($this->retrySleep)) {
            $request->retry(
                times: $this->retryTimes,
                sleepMilliseconds: $this->retrySleep,
            );
        }

        return $request;
    }

    public function buildRequestWithToken(): PendingRequest
    {
        return $this->withBaseUrl()->withToken(
            token: $this->key,
        );
    }

    public function buildRequestWithHttpHeader(): PendingRequest
    {
        return $this->withBaseUrl()->withHeaders(
            ['X-Api-Key' => $this->key]
        );
    }

    public function buildRequestWithUrlParams(array $urlParams): PendingRequest
    {
        return $this->withBaseUrl()->withUrlParameters($urlParams);
    }
}
