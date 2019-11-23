<?php
/**
 * @author: tuanha
 * @last-mod: 23-Nov-2019
 */
namespace Bkstar123\BksCMS\SiteStats\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Spatie\Analytics\Period;
use App\Http\Controllers\Controller;
use Bkstar123\BksCMS\SiteStats\Contracts\GA;

class GAController extends Controller
{

    /**
     * @var \Bkstar123\BksCMS\SiteStats\Services\GA
     */
    protected $ga;

    /**
     * default settings
     */
    protected $timeRange;
    protected $maxMostVisitedPages;
    protected $maxTopBrowsers;
    protected $maxTopCountries;
    protected $maxTopOperatingSystem;

    /**
     * Create instance
     *
     * @param App\Modules\GA\Contracts\GA $ga
     */
    public function __construct(GA $ga)
    {
        $this->ga = $ga;
        $this->initializeDefaults();
    }

    /**
     * Initialize the default settings
     *
     * @return void
     */
    protected function initializeDefaults()
    {
        $this->timeRange = config('ga.timeRange', 30);
        $this->maxMostVisitedPages = config('ga.maxMostVisitedPages', 20);
        $this->maxTopBrowsers = config('ga.maxTopBrowsers', 10);
        $this->maxTopCountries = config('ga.maxTopCountries', 10);
        $this->maxTopOperatingSystem = config('ga.maxTopOperatingSystem', 10);
    }

    /**
     * get the specified time range
     *
     * @return Spatie\Analytics\Period
     */
    protected function getTimeRange()
    {
        if (request()->input('startDate') && request()->input('startDate')) {
            $startTimeStamp = strtotime(request()->input('startDate'));
            $endTimeStamp = strtotime(request()->input('endDate'));
            if ($endTimeStamp >= $startTimeStamp) {
                $startTime = Carbon::createFromTimestamp($startTimeStamp);
                $endTime = Carbon::createFromTimestamp($endTimeStamp);
                $period = Period::create($startTime, $endTime);
                return $period;
            }
        }
        return Period::days($this->timeRange);
    }

    /**
     * index method
     *
     * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $timeRange = $this->getTimeRange();

        $totalVisitorsPageViews = $this->ga->getTotalVisitorsAndPageViews($timeRange);
        $mostVisistedPages = $this->ga->getMostVisitedPages($timeRange, $this->maxMostVisitedPages);
        $topBrowsers = $this->ga->getTopBrowsers($timeRange, $this->maxTopBrowsers);
        $topCountries = $this->ga->getTopCountries($timeRange, $this->maxTopCountries);
        $topOperatingSystems = $this->ga->getTopOperatingSystems($timeRange, $this->maxTopOperatingSystem);

        $visitors = $this->ga->getReturningSessions($timeRange);

        $oneDayActiveUsers = $this->ga->getOneDayActiveUsers($timeRange);
        $oneWeekActiveUsers = $this->ga->getOneWeekActiveUsers($timeRange);
        $oneMonthActiveUsers = $this->ga->getOneMonthActiveUsers($timeRange);

        $pageviewsPerSession = $this->ga->getPageviewsPerSession($timeRange);
        $avgSessionDuration = $this->ga->getAverageDurationOfSessions($timeRange);
        $bounceRate = $this->ga->getBounceRate($timeRange);
        $avgPageLoadTime = $this->ga->getAveragePageLoadTime($timeRange);

        return view('bkstar123_bkscms_site_stats::ga.index', compact([
            'totalVisitorsPageViews', 'mostVisistedPages', 'topBrowsers',
            'topCountries', 'topOperatingSystems', 'visitors',
            'oneDayActiveUsers', 'oneWeekActiveUsers', 'oneMonthActiveUsers',
            'pageviewsPerSession', 'avgSessionDuration', 'bounceRate',
            'avgPageLoadTime',
            'timeRange',
        ]));
    }
}
