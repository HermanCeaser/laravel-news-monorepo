<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
        'scheme' => 'https',
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],
    'news-api' => [
        'url' => env('NEWSAPI_BASE_URL', 'https://newsapi.org/v2'),
        'key' => env('NEWSAPI_KEY'),
        'timeout' => env('NEWSAPI_TIMEOUT', 10),
        'retry' => [
            'times' => env('NEWSAPI_RETRY_TIMES', null),
            'sleep' => env('NEWSAPI_RETRY_SLEEP', null),
        ],
    ],
    'guardian-api' => [
        'url' => env('GUARDIANAPI_BASE_URL', 'https://content.guardianapis.com'),
        'key' => env('GUARDIANAPI_KEY'),
        'timeout' => env('GUARDIANAPI_TIMEOUT', 10),
        'retry' => [
            'times' => env('GUARDIANAPI_RETRY_TIMES', null),
            'sleep' => env('GUARDIANAPI_RETRY_SLEEP', null),
        ],
    ],
    'newyork-times-api' => [
        'url' => env('NEWYORKTIMESAPI_BASE_URL', 'https://api.nytimes.com'),
        'key' => env('NEWYORKTIMESAPI_KEY'),
        'timeout' => env('NEWYORKTIMESAPI_TIMEOUT', 10),
        'retry' => [
            'times' => env('NEWYORKTIMESAPI_RETRY_TIMES', null),
            'sleep' => env('NEWYORKTIMESAPI_RETRY_SLEEP', null),
        ],
    ],
    'github' => [
        'uri' => env('GITHUB_URI', 'https://api.github.com'),
        'key' => env('GITHUB_KEY'),
        'timeout' => env('GITHUB_TIMEOUT', 10),
        'retry' => [
            'times' => env('GITHUB_RETRY_TIMES', null),
            'sleep' => env('GITHUB_RETRY_SLEEP', null),
        ],
    ],

];
