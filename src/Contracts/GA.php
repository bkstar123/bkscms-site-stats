<?php
/**
 * @author: tuanha
 * @last-mod: 23-Nov-2019
 */
namespace Bkstar123\BksCMS\SiteStats\Contracts;

use Spatie\Analytics\Period;

interface GA
{
    /**
     * get total visitors and pageviews over the given period
     *
     * @param Spatie\Analytics\Period\Period $period
     * @return array
     */
    public function getTotalVisitorsAndPageViews(Period $period);

    /**
     * get most visited page over the given period
     *
     * @param Spatie\Analytics\Period\Period $period
     * @param int $maxResults optional
     * @return array
     */
    public function getMostVisitedPages(Period $period, $maxResults = 20);

    /**
     * get top browsers over the given period
     *
     * @param Spatie\Analytics\Period\Period $period
     * @param int $maxResults optional
     * @return array
     */
    public function getTopBrowsers(Period $period, $maxResults = 20);

    /**
     * get top countries over the given period
     *
     * @param Spatie\Analytics\Period\Period $period
     * @param int $maxResults default -1 (unlimited)
     * @return array
     */
    public function getTopCountries(Period $period, $maxResults = -1);

    /**
     * get top operating systems over the given period
     *
     * @param Spatie\Analytics\Period\Period $period
     * @param int $maxResults default -1 (unlimited)
     * @return array
     */
    public function getTopOperatingSystems(Period $period, $maxResults = -1);

    /**
     * get returning sessions over the given period
     *
     * @param Spatie\Analytics\Period\Period $period
     * @return array
     */
    public function getReturningSessions(Period $period);

    /**
     * get 1-day active users over the given period
     *
     * @param Spatie\Analytics\Period\Period $period
     * @return array
     */
    public function getOneDayActiveUsers(Period $period);

    /**
     * get 1-week active users over the given period
     *
     * @param Spatie\Analytics\Period\Period $period
     * @return array
     */
    public function getOneWeekActiveUsers(Period $period);

    /**
     * get 1-month active users over the given period
     *
     * @param Spatie\Analytics\Period\Period $period
     * @return array
     */
    public function getOneMonthActiveUsers(Period $period);

    /**
     * get the average number of pageviews per session over the given period
     *
     * @param Spatie\Analytics\Period\Period $period
     * @return double
     */
    public function getPageviewsPerSession(Period $period);

    /**
     * get the average duration of user sessions over the given period
     *
     * @param Spatie\Analytics\Period\Period $period
     * @return double
     */
    public function getAverageDurationOfSessions(Period $period);

    /**
     * get the bounce rate (single-page session) over the given period
     *
     * @param Spatie\Analytics\Period\Period $period
     * @return double
     */
    public function getBounceRate(Period $period);

    /**
     * get the average page load time over the given period
     *
     * @param Spatie\Analytics\Period\Period $period
     * @return double
     */
    public function getAveragePageLoadTime(Period $period);
}
