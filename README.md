# bkscms-site-stats

> A bkstar123/bkscms's package visualizes some basic Google Analytics data for a website from a **BKSCMS** CMS project

The following information is included in the site statistics:  
- Number of new visitor  
- Number of returning visitor  
- Page view per session  
- Average session duration  
- Bounce rate  
- Average page load time  
- Total page views and visitors  
- Browser usage  
- Top visited pages  
- Top visiting countries  
- Top visiting operating systems  
- Total 1-day, 7-day, 30-day active users  

For creating a **BKSCMS** project, run the following command:  
```composer create-project --prefer-dist bkstar123/bkscms <your-project>```  

## 1. Requirement
It is recommended to install this package with PHP version 7.1.3+ and Laravel Framework version 5.6+.  

## 2. Installation
    composer require bkstar123/bkscms-site-stats

Then, publish the package's configuration & assets:     
```php artisan vendor:publish --provider="Bkstar123\BksCMS\SiteStats\Providers\SiteStatsServiceProvider"```  

In the underlaying layer, it uses ***spatie/laravel-analytics*** package to retrieve data from Google Analytics. Please refer to https://github.com/spatie/laravel-analytics for more details on how to obtain the credentials to communicate with Google Analytics.  

You can also tweak ***spatie/laravel-analytics***'s configuration by publishing its assets to ***config/analytics.php***as follows:  
```php artisan vendor:publish --provider="Spatie\Analytics\AnalyticsServiceProvider"```.  

## 3. Usage

In **.env**, set the environment variable **ANALYTICS_VIEW_ID** to the value of ***View ID*** of the monitored site on Google Analytics console.  

Download ***service-account-credentials.json*** file from Google Analytics, and put it to ***storage/app/analytics/service-account-credentials.json***.  

The Google Analytics dashboard will be exposed under the path ***/cms/sitestatistics*** with the route name of **cms.sitestatistics**.  

Finally, you can add the link of the Google Analytics dashboard to the **/config/bkstar123_bkscms_sidebarmenu**.  
