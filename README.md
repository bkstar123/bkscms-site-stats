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

## 3. Usage
