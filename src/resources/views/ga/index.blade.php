@extends('cms.layouts.master')
@section('title','Site Google Analytics')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <span class="badge bg-maroon"> 
                        Period of measurement
                    </span>
                </h3>
            </div>
            <div class="card-body">
                <strong>
                    {{ $timeRange->startDate->toDateString() }} 
                    - {{ $timeRange->endDate->toDateString() }}
                </strong>
            </div>
        </div>
    </div>
</div>
<!--Basic information-->
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <span class="badge bg-maroon"> 
                        Basic Information 
                    </span>
                </h3>
            </div>
            <div class="card-body">
                <div class="row">
                    @if(isset($visitors[0]))
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>{{ $visitors[0][1] }}</h3>
                                <p>{{ $visitors[0][0] }}</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-users"></i>
                            </div>
                        </div>
                    </div>
                    @endif

                    @if(isset($visitors[1]))
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{ $visitors[1][1] }}</h3>
                                <p>{{ $visitors[1][0] }}</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-refresh"></i>
                            </div>
                        </div>
                    </div>
                    @endif

                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="small-box bg-blue">
                            <div class="inner">
                                <h3>{{ $pageviewsPerSession }}</h3>
                                <p>Pageviews/session</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-star"></i>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="small-box bg-teal">
                            <div class="inner">
                                <h3>{{ gmdate("H:i:s", $avgSessionDuration) }}</h3>
                                <p>Average session duration</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-clock"></i>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="small-box bg-pink">
                            <div class="inner">
                                <h3>{{ $bounceRate }}%</h3>
                                <p>Bounce rate</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-android-share-alt"></i>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="small-box bg-purple">
                            <div class="inner">
                                <h3>{{ $avgPageLoadTime }} secs</h3>
                                <p>Average page load time</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-ios-cloud-download"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <!--Total visitors & pageviews -->
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <span class="badge bg-maroon"> 
                        Total pageviews and visitors 
                    </span>
                </h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div id="totalVisitorsPageViews" style="width:100%; height:400px;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Top browsers -->
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <span class="badge bg-maroon"> 
                        Browser usage 
                    </span>
                </h3>
           </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div id="topBrowsers" style="width:100%; height:400px;"></div>  
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <!--Top visited pages -->
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="box-title">
                    <span class="badge bg-maroon"> 
                        Top visited pages 
                    </span>
                </h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div id="mostVisistedPages" style="width:100%; height:600px;"></div>    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
            
<div class="row">
    <!--Top countries -->
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <span class="badge bg-maroon"> 
                        Top countries 
                    </span>
                </h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div id="topCountries" style="width:100%; height:400px;"></div> 
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Top operating systems -->
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <span class="badge bg-maroon"> 
                        Top operating systems 
                    </span>
                </h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div id="topOperatingSystems" style="width:100%; height:400px;"></div>  
                    </div>
                </div>
            </div>
        </div>
    </div>  
</div>

<!--Active users-->
<div class="row">
    <div class="col-md-12">
        <!--Active Users -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <span class="badge bg-maroon"> 
                        Active users 
                    </span>
                </h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div id="activeUsers" style="width:100%; height:400px;"></div>  
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--Report time range -->
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <h3 class="card-title">
                <span class="badge bg-maroon"> 
                    Set time range 
                </span>
            </h3>
            <div class="card-body">
                <form class="form-vertical" role="form" method="POST" 
                    action="{{ route('cms.sitestatistics') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="StartDate">Start date</label>
                                <div class="input-group">
                                    <input type="date" id="StartDate" name="startDate" 
                                           value="{{ $timeRange->startDate->format('Y-m-d') }}" 
                                           class="form-control" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="StartDate">End date</label>
                                <div class="input-group">
                                    <input type="date" id="EndDate" name="endDate" 
                                            value="{{ $timeRange->endDate->format('Y-m-d') }}" 
                                            class="form-control" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Apply</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scriptBottom')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/offline-exporting.js"></script>

<script type="text/javascript">
    var useUTC = @json(config('bkstar123_bkscms_site_stats.useUTC'));
    var totalVisitorsPageViews = @json($totalVisitorsPageViews);
    var mostVisistedPages = @json($mostVisistedPages);
    var topBrowsers = @json($topBrowsers);
    var topCountries = @json($topCountries);
    var topOperatingSystems = @json($topOperatingSystems);
    var oneDayActiveUsers = @json($oneDayActiveUsers);
    var oneWeekActiveUsers = @json($oneWeekActiveUsers);
    var oneMonthActiveUsers = @json($oneMonthActiveUsers);
    $(document).ready(function(){
        $.datetimepicker.setLocale('en');
        let settings = {
            inline:false,
            weeks: true,
            format: 'Y-m-d',
            timepicker : false,
        }
        $("#StartDate").datetimepicker(settings);
        $("#EndDate").datetimepicker(settings);
    });
</script>

<script src="/js/vendor/bkstar123_bkscms_site_stats/dist/gaTotalVisitorsPageViews.min.js"></script>
<script src="/js/vendor/bkstar123_bkscms_site_stats/dist/gaMostVisistedPages.min.js"></script>
<script src="/js/vendor/bkstar123_bkscms_site_stats/dist/gaTopBrowsers.min.js"></script>
<script src="/js/vendor/bkstar123_bkscms_site_stats/dist/gaTopCountries.min.js"></script>
<script src="/js/vendor/bkstar123_bkscms_site_stats/dist/gaTopOperatingSystems.min.js"></script>
<script src="/js/vendor/bkstar123_bkscms_site_stats/dist/gaActiveUsers.min.js"></script>
@endpush