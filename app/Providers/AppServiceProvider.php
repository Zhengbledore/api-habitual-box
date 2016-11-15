<?php

namespace App\Providers;

use App\Api\Extensions\CustomScout\Engine\CustomElasticsearchEngine;
use Illuminate\Support\ServiceProvider;
use Laravel\Scout\EngineManager;
use Elasticsearch\ClientBuilder as Elasticsearch;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        resolve(EngineManager::class)->extend('customElasticSearch', function () {
            return new CustomElasticSearchEngine(
                Elasticsearch::fromConfig(config('scout.elasticsearch.config')),
                config('scout.elasticsearch.index'));
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
