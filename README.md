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
### Make a folder into `app/` folder called Traits and make a file called `HttpResponses.php` and paste the following code
```
<?phpnamespace App\Traits;
       
   trait HttpResponses{
      protected function success($data, $message = null, $code = 200){
         return response()->json([
            'status' => 'success',
            'data' => $data,
            'message' => $message
            ], $code);
      }
          
      protected function error($data, $message = null, $code){
         return response()->json([
            'status' => 'error',
               'data' => $data,
               'message' => $message
               ], $code);
      }
   }
```

### To make a request run the following command
```
php artisan make:request RequestName
```

### To protect routes with sanctum, add the following code to `routes/api.php`
```
Route::middleware('auth:sanctum')->group(function () {
    // Protected routes
});

or
 
Route::group(['middleware' => ['auth:sanctum']], function () {
    // Protected routes
});
```
