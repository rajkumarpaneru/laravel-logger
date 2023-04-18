
## About this package

Log your request to response time in database for each query.


## Installation

The package can be installed via composer.

`composer require raajkumarpaneru/laravel-logger`


The migrations of this package are now publishable under the “migrations” tag via:

` php artisan vendor:publish --provider="Raajkumarpaneru\LaravelLogger\LaravelLoggerServiceProvider" --tag="migrations"`

Now run: 
`php artisan migrate`

## Usage

Apply `enable-log` middleware in your route definition and new database entry will be created on a table `laravel_query_execution_logs` for every time a route applying `enable-log` middleware executes. 

For example, in your route file:

      
             ...
             Route::get('posts', [PostController::class, 'index'])
             ->middleware([...,'enable-log']);
             ...
        


## License

[MIT license](https://opensource.org/licenses/MIT)
