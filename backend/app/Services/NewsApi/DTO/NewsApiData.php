<?php

namespace App\Services\NewsApi\DTO;

use Carbon\Carbon;
use Illuminate\Support\Optional;
use Spatie\LaravelData\Data;

class NewsApiData extends Data
{
    public function __construct(
        public string $title,
        public ?string $description,
        public ?string $content,
        public ?string $author,
        public ?string $image,
        public ?Carbon $published_at,
        public ?string $source,
        public ?string $url,
        public int|Optional $category_id = 1,
        public ?string $country = null,
        public string|Optional $language = 'en',
    ) {
    }
}
