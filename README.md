# Laravel Sanctum Practice ...

## Steps to configure Sanctum

1. Install Laravel Sanctum
    ```
    composer require laravel/sanctum
    ```
2. Publish Sanctum configuration and migration files
    ```
    php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"
    ```
3. Run migration
    ```
    php artisan migrate
    ```
4. Add Sanctum's middleware to the api middleware group within your app/Http/Kernel.php file:
    ```
    'api' => [
        \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
        'throttle:api',
        \Illuminate\Routing\Middleware\SubstituteBindings::class,
    ],
    ```
5. Add the Sanctum's service provider to the providers array within your config/app.php configuration file:
    ```
    'providers' => [
        // Other service providers...

        Laravel\Sanctum\SanctumServiceProvider::class,
    ],
    ```
6. Add the Sanctum's authentication guard to the guards array within your config/auth.php configuration file:
    ```
    'guards' => [
        // Other guards...

        'sanctum' => [
            'driver' => 'sanctum',
            'provider' => null,
        ],
    ],
    ```
7. Add the Sanctum's middleware to the web middleware group within your app/Http/Kernel.php file:
    ```
    'web' => [
        // Other middleware...

        \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
    ],
    ```
