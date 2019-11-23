<?php
/**
 * SiteStatsServiceProvider
 *
 * @author: tuanha
 * @last-mod: 23-Nov-2019
 */
namespace Bkstar123\BksCMS\SiteStats\Providers;

use Illuminate\Support\ServiceProvider;
use Bkstar123\BksCMS\SiteStats\Services\GA as GAService;
use Bkstar123\BksCMS\SiteStats\Contracts\GA as GAContract;

class SiteStatsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/../routes/routes.php');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'bkstar123_bkscms_site_stats');

        $this->publishes([
            __DIR__.'/../config/bkstar123_bkscms_site_stats.php' => config_path('bkstar123_bkscms_site_stats.php'),
        ], 'bkstar123_bkscms_site_stats.config');

        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/bkstar123_bkscms_site_stats'),
        ], 'bkstar123_bkscms_site_stats.views');

        $this->publishes([
            __DIR__.'/../resources/js' => public_path('js/vendor/bkstar123_bkscms_site_stats'),
        ], 'bkstar123_bkscms_site_stats.assets');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/bkstar123_bkscms_site_stats.php',
            'bkstar123_bkscms_site_stats'
        );
        $this->app->singleton(GAContract::class, GAService::class);
    }
}
