# Laravel News App 
_News Aggregation APP service built on Laravel for the backend and NextJs 13(React.Js) on the frontend

## Folder Structure
 * `frontend` - This Folder contains the frontend NextJs code
 * `backend` - Ths folder contains the Laravel API backend Code

### Branches
 * `master` - Branch off it. Must be stable.
 * `dev` - For Development

### Requirements
1. Docker if you are going to use the docker based setup
1. PHP8.2
1. MySQL 8.0+
1. [Composer](https://getcomposer.org/) installed.
1. `cp .env.example .env`
1. Popuplate Your `.env` file with the keys and databases specifics as specified in the configuration section.
1. `composer install`
1. `php artisan key:generate`
1. `php artisan migrate`
1. `php artisan serve`



### Setup (Docker Compose)
 * The detailed setup for the backend and the frontend are each in the respective backend and frontend README files in the folders
 * Add your Env variables for each of the projects
 1. `cp .env.example .env`
 1. Set the database hostname in `.env` like `DB_HOST=laranews-db`
 * Run `docker compose --env-file path/to/env/file_with_db_credentials` to spin up the services. 
 * Forexample `docker compose --env-file ./config/.env.db up -d` if the config file is stored in the config directory.
 * If the container starts, then run the following commands to install composer and migrate db
 1. `docker exec -it laranews-api composer install`
 1. `docker exec -it laranews-api php artisan key:generate`
 1. `docker exec -it laranews-api php artisan migrate --seed`


### Author
[Herman Ceaser](http://github.com/HermanCeaser)

## License
This Project is open sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
