<?php

declare(strict_types=1);

namespace App\Services\Concerns;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\Response;

trait CanSendGetRequest
{
    public function get(PendingRequest $request, string $url, ?array $queryParams = null): Response
    {
        return $request->get(
            url: $url,
            query: $queryParams
        );
    }
}
