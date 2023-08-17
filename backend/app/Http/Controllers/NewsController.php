<?php

namespace App\Http\Controllers;

use App\Models\NewsArticle;
use App\Services\Contracts\NewsService;
use App\Services\GuardianApi\GuardianApiService;
use App\Services\NewsApi\DTO\NewsApiData;
use App\Services\NewyorkTimesApi\NewyorkTimesApiService;
use Illuminate\Http\Request;

// use jcobhams\NewsApi\NewsApi;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(
        NewsService $newsService,
        NewyorkTimesApiService $timesService,
        GuardianApiService $guardianApiService)
    {
       // show all the news from all the resources
        $sources = [
            'newsapi',
            'newyork_times',
            'guardian',
        ];

        $response1 = $newsService->getNews()->topHeadlines();
        // $response2 = $timesService->getNews()->topHeadlines();
        // $response3 = $guardianApiService->getNews()->topHeadlines();

        $news_articles = NewsApiData::collection(NewsArticle::all())->toJson();

        return $news_articles;

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
