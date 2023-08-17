<?php

namespace App\Actions;

use App\Models\NewsArticle;
use App\Services\NewsApi\DTO\NewsApiData;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class AddNewsArticlesAction
{
    public function __invoke(Collection $articlesData, ?array $params): bool
    {
        // dd($articlesData);
        $newsArticles = $articlesData->map(function ($articleData) use ($params) {
            return $this->mapToNewsArticle($articleData, $params);
        });
        try {
            NewsArticle::insert($newsArticles->toArray());

            return true;

        } catch (\Exception $e) {
            return false;
        }
    }

    private function mapToNewsArticle($articleData, array $params = []): array
    {

        $newsData = new NewsApiData(
            title: $articleData->title,
            description: $articleData->description,
            content: $articleData->content,
            author: $articleData->author,
            image: $articleData->urlToImage,
            published_at: Carbon::createFromFormat('Y-m-d\TH:i:sP', $articleData->publishedAt) ?? null,
            source: $articleData->source->name,
            url: $articleData->url
        );

        return [
            ...($newsData->toArray()),
            'image' => json_encode(['image_url' => $newsData->image, 'alt' => substr($newsData->title, 0, 50).'...']),
            'feed' => 'newsapi',
            'created_at' => now()->toDateTimeString(),
            'updated_at' => now()->toDateTimeString(),
            'country' => array_key_exists('country', $params) ? $params['country'] : null,
        ];
    }
}
