<?php
/**
 * @author: tuanha
 * @last-mod: 23-Nov-2019
 */

Route::group(
    [
        'prefix' => 'cms',
        'namespace' => 'Bkstar123\BksCMS\SiteStats\Http\Controllers',
        'middleware' => [
            'web', 'bkscms-auth:admins'
        ],
    ],
    function () {
        Route::match(['get', 'post'], '/sitestatistics', 'SiteStatsController@index')
            ->name('cms.sitestatistics');
    }
);
