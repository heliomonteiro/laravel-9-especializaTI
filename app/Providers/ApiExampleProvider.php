<?php

namespace App\Providers;

use App\Facades\ApiExample;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\ServiceProvider;

class ApiExampleProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

        $this->app->bind('api-example', function () {
            return Http::withOptions([
                'verify'=>false,
                'base_uri'=>getenv('TESTE_JSON_BASE_URI')
            ])->withHeaders([
                'Authorization' => 'Bearer',
            ]);
        });

        //return ApiExample::get('/posts')->json();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
