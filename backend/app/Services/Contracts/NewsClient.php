<?php

namespace App\Services\Contracts;

/**
 * NewsClient interface
 *
 *
 * @method public all() Returns all news articles
 * @method public search() Searches news articles by query string
 * @method public topHeadlines() Returns top news headlines
 */
interface NewsClient
{
    public function all();

    public function search(string $query);

    public function topHeadlines();
}
