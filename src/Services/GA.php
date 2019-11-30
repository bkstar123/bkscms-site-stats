<?php
/**
 * @author: tuanha
 * @last-mod: 30-Nov-2019
 */
namespace Bkstar123\BksCMS\SiteStats\Services;

use Analytics;
use Spatie\Analytics\Period;
use Bkstar123\BksCMS\SiteStats\Contracts\GA as GAContract;

class GA implements GAContract
{
    /**
     * Get total visitors and pageviews over the given period
     *
     * @param \Spatie\Analytics\Period\Period $period
     * @return array
    */
    public function getTotalVisitorsAndPageViews(Period $period)
    {
        $totalVisitorsPageViews = Analytics::fetchTotalVisitorsAndPageViews($period)->toArray();
        for ($i = 0; $i < count($totalVisitorsPageViews); $i++) {
            // convert Carbon object to miliseconds
            $totalVisitorsPageViews[$i]['date'] = strtotime($totalVisitorsPageViews[$i]['date'])*1000;
        }
        return $totalVisitorsPageViews;
    }

    /**
     * Get most visited page over the given period
     *
     * @param \Spatie\Analytics\Period\Period $period
     * @param int $maxResults optional
     * @return array
     */
    public function getMostVisitedPages(Period $period, $maxResults = 20)
    {
        return Analytics::fetchMostVisitedPages($period, $maxResults)->toArray();
    }

    /**
     * Get top browsers over the given period
     *
     * @param \Spatie\Analytics\Period\Period $period
     * @param int $maxResults optional
     * @return array
     */
    public function getTopBrowsers(Period $period, $maxResults = 20)
    {
        return Analytics::fetchTopBrowsers($period, $maxResults)->toArray();
    }

    /**
     * Get top countries over the given period
     *
     * @param \Spatie\Analytics\Period\Period $period
     * @param int $maxResults default -1 (unlimited)
     * @return array
     */
    public function getTopCountries(Period $period, $maxResults = -1)
    {
        $data = Analytics::performQuery($period, 'ga:sessions', [
            'dimensions' => 'ga:country',
            'sort' => '-ga:sessions'
        ])->rows;

        if (is_null($data)) {
            return [];
        } else if ($maxResults < 0) {
            return $data;
        } else {
            return array_slice($data, 0, $maxResults);
        }
    }

    /**
     * Get top operating systems over the given period
     *
     * @param \Spatie\Analytics\Period\Period $period
     * @param int $maxResults default -1 (unlimited)
     * @return array
     */
    public function getTopOperatingSystems(Period $period, $maxResults = -1)
    {
        $data = Analytics::performQuery($period, 'ga:sessions', [
            'dimensions' => 'ga:operatingSystem',
            'sort' => '-ga:sessions'
        ])->rows;

        if (is_null($data)) {
            return [];
        } else if ($maxResults < 0) {
            return $data;
        } else {
            return array_slice($data, 0, $maxResults);
        }
    }

    /**
     * Get returning sessions over the given period
     *
     * @param \Spatie\Analytics\Period\Period $period
     * @return array
     */
    public function getReturningSessions(Period $period)
    {
        return Analytics::performQuery($period, 'ga:sessions', [
            'dimensions' => 'ga:userType',
        ])->rows;
    }

    /**
     * Get 1-day active users over the given period
     *
     * @param \Spatie\Analytics\Period\Period $period
     * @return array
     */
    public function getOneDayActiveUsers(Period $period)
    {
        $oneDayActiveUsers = Analytics::performQuery($period, 'ga:1dayUsers', [
            'dimensions' => 'ga:date',
        ])->rows;
        for ($i = 0; $i < count($oneDayActiveUsers); $i++) {
            // convert Carbon object to miliseconds
            $oneDayActiveUsers[$i][0] = strtotime($oneDayActiveUsers[$i][0])*1000;
        }
        return $oneDayActiveUsers;
    }

    /**
     * Get 1-week active users over the given period
     *
     * @param \Spatie\Analytics\Period\Period $period
     * @return array
     */
    public function getOneWeekActiveUsers(Period $period)
    {
        $oneWeekActiveUsers = Analytics::performQuery($period, 'ga:7dayUsers', [
            'dimensions' => 'ga:date',
        ])->rows;
        for ($i = 0; $i < count($oneWeekActiveUsers); $i++) {
            // convert Carbon object to miliseconds
            $oneWeekActiveUsers[$i][0] = strtotime($oneWeekActiveUsers[$i][0])*1000;
        }
        return $oneWeekActiveUsers;
    }

    /**
     * Get 1-month active users over the given period
     *
     * @param \Spatie\Analytics\Period\Period $period
     * @return array
     */
    public function getOneMonthActiveUsers(Period $period)
    {
        $oneMonthActiveUsers = Analytics::performQuery($period, 'ga:30dayUsers', [
            'dimensions' => 'ga:date',
        ])->rows;
        for ($i = 0; $i < count($oneMonthActiveUsers); $i++) {
            // convert Carbon object to miliseconds
            $oneMonthActiveUsers[$i][0] = strtotime($oneMonthActiveUsers[$i][0])*1000;
        }
        return $oneMonthActiveUsers;
    }

    /**
     * Get the average number of pageviews per session over the given period
     *
     * @param \Spatie\Analytics\Period\Period $period
     * @return double
     */
    public function getPageviewsPerSession(Period $period)
    {
        $data = Analytics::performQuery($period, 'ga:pageviewsPerSession', [])->rows;
        $pageviewsPerSession = round((float) $data[0][0], 2);
        return $pageviewsPerSession;
    }

    /**
     * Get the average duration of user sessions over the given period
     *
     * @param \Spatie\Analytics\Period\Period $period
     * @return double
     */
    public function getAverageDurationOfSessions(Period $period)
    {
        $data = Analytics::performQuery($period, 'ga:avgSessionDuration', [])->rows;
        $avgSessionDuration = round((float) $data[0][0], 2);
        return $avgSessionDuration;
    }

    /**
     * Get the bounce rate (single-page session) over the given period
     *
     * @param \Spatie\Analytics\Period\Period $period
     * @return double
     */
    public function getBounceRate(Period $period)
    {
        $data = Analytics::performQuery($period, 'ga:bounceRate', [])->rows;
        $avgSessionDuration = round((float) $data[0][0], 2);
        return $avgSessionDuration;
    }

    /**
     * Get the average page load time over the given period
     *
     * @param \Spatie\Analytics\Period\Period $period
     * @return double
     */
    public function getAveragePageLoadTime(Period $period)
    {
        $data = Analytics::performQuery($period, 'ga:avgPageLoadTime', [])->rows;
        $avgPageLoadTime = round((float) $data[0][0], 2);
        return $avgPageLoadTime;
    }
}
