# Laravel News API  (News Aggregation API)


_News Aggregation API service built on Laravel_

### Branches
 * `master` - Branch off it. Must be stable.
 * `dev` - For Development

### Configuration
Used for the API for News Aggregation, from NewsAPI, The Guardian & Newyork Times.
#### DB
 * `DB_DATABASE` - MySql DB Name. Defaults to laravel_new_api
 * `DB_USERNAME` - MySql DB Username.
 * `DB_PASSWORD` - MySql DB Password

#### NEWSAPI 

 * `NEWSAPI_KEY_DISABLED` - The API key is given at [NewsAPI](https://newsapi.org/register).
 * `NEWSAPI_TIMEOUT` - Defaults to 15, if not set.
 * `NEWSAPI_RETRY_TIMES` - The number of times to retry fetching updated if failed on first request. Defaults to null, if not set
 * `NEWSAPI_RETRY_SLEEP` - The amount of time to wait between failed requests. Defaults to null, if not set

#### THE GUARDIAN NEWS 
 * `GUARDIANAPI_KEY` - The API key is given at [The Guardian](https://open-platform.theguardian.com/access).
 * `GUARDIANAPI_TIMEOUT` - Defaults to 15, if not set
 * `GUARDIANAPI_RETRY_TIMES` - The number of times to retry fetching updated if failed on first request. Defaults to null, if not set
 * `GUARDIANAPI_RETRY_SLEEP` - The amount of time to wait between failed requests. Defaults to null, if not set

#### THE NEWYORK TIMES 
 * `NEWYORKTIMESAPI_KEY` - The API key is given at [The Newyork Times](https://developer.nytimes.com/)
 * `NEWYORKTIMESAPI_TIMEOUT` - Defaults to 15, if not set
 * `NEWYORKTIMESAPI_RETRY_TIMES` - The amount of time to wait between failed requests. Defaults to null, if not set
 * `NEWYORKTIMESAPI_RETRY_SLEEP` - The amount of time to wait between failed requests. Defaults to null, if not set


### Setup (Docker)
A docker-based infrastructure is available for development. If you wish to run directly on host, see [Setup](#setup) below.

1. `cp .env.example .env`
1. Set the database hostname in `.env` like `DB_HOST=laravel-news-db`
1. `docker compose --env-file .env -p laravel-news -f ./docker-compose.yml up -d`
1. `docker exec -it laravel-news-php php artisan key:generate`
1. `docker exec -it laravel-news-php php artisan migrate --seed`

* Nginx listens at your local IP address, port 8082, e.g. http://localhost:8082
* Mysql container's port 3306 is mapped to the host.


### Setup
1. PHP8.2
1. MySQL 8.0+
1. [Composer](https://getcomposer.org/) installed.
1. `cp .env.example .env`
1. Popuplate Your `.env` file with the keys and databases specifics as specified in the configuration section.
1. `composer install`
1. `php artisan key:generate`
1. `php artisan migrate`
1. `php artisan serve`

### Usage
* When you visit `http://localhost:8082/api/news/top-headlines` if you used docker or `http://localhost:8000/api/news/top-headlines` if you used local development, You should be able to see all the top-headlines

### Author
[Herman Ceaser](http://github.com/HermanCeaser)

## License
This Project is open sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
