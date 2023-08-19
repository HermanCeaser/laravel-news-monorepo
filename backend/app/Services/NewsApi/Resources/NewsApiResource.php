<?php

namespace App\Services\NewsApi\Resources;

use App\Actions\AddNewsArticlesAction;
use App\Models\NewsArticle;
use App\Services\Contracts\NewsClient;
use App\Services\NewsApi\DTO\NewsApiData;
use App\Services\NewsApi\NewsApiService;
use Illuminate\Support\Facades\Log;

class NewsApiResource implements NewsClient
{
    public function __construct(
        private readonly NewsApiService $service,
    ) {
    }

    public function search(string $query)
    {
        // "/everything?q=bitcoin&apiKey=API_KEY"
        return $this->service->get(
            request: $this->service->buildRequestWithToken(),
            url: "/top-headlines?q=$query",

        );
    }

    public function topHeadlines()
    {

        $params = [];
        $params['country'] = 'us';
        $params['pageSize'] = '50';

        $request = $this->service->buildRequestWithToken();
        try {
            $response = $this->service->get(
                request: $request,
                url: '/top-headlines',
                queryParams: $params
            );
            if ($response->getStatusCode() == 200) {
                $responseData = json_decode($response->getBody());

                // Clean the data and Post to DB
                $articles = collect($responseData->articles);

                // dd($articles);
                $addNewsArticlesAction = new AddNewsArticlesAction();
                $hasInserted = $addNewsArticlesAction($articles, $params);

                if (! $hasInserted) {
                    Log::info('Failed to fetch News');
                }

            // return NewsApiData::collection(NewsArticle::all());

            } else {

                $response_body = json_decode($response->getBody());
                throw new \Exception($response_body->message);
            }
        } catch (\Exception $e) {
            throw new \Exception("There is an error: {$e}");
        }
    }

    public function all()
    {
        return $this->service->get(
            request: $this->service->buildRequestWithHttpHeader(),
            url: '/everything'
        );
    }
}
