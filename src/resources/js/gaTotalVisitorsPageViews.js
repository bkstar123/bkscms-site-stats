/**
 * GA - Resources/Assets/js/gaTotalVisitorsPageViews.js
 *
 * @author: tuanha
 * @last-mod: 25/06/2017
 */
 $(function () {
    Highcharts.theme = {
        colors: ['#058DC7', '#50B432', '#ED561B', '#DDDF00', '#24CBE5', '#64E572', 
                 '#FF9655', '#FFF263', '#6AF9C4'],
        chart: {
            backgroundColor: {
                linearGradient: [0, 0, 500, 500],
                stops: [
                    [0, 'rgb(255, 255, 255)'],
                    [1, 'rgb(240, 240, 255)']
                ]
            },
        },
        title: {
            style: {
                color: '#000',
                font: 'bold 16px "Trebuchet MS", Verdana, sans-serif'
            }
        },
        subtitle: {
            style: {
                color: '#666666',
                font: 'bold 12px "Trebuchet MS", Verdana, sans-serif'
            }
        },
        legend: {
            itemStyle: {
                font: '9pt Trebuchet MS, Verdana, sans-serif',
                color: 'black'
            },
            itemHoverStyle:{
                color: 'gray'
            }   
        }
    };

    Highcharts.setOptions(Highcharts.theme);

    Highcharts.setOptions({
        global: {
            useUTC: useUTC,
        }
    });

    var dataVisitors = [];
    var dataPageViews = [];

    $.each(totalVisitorsPageViews, function(index, totalVisitorsPageView){
        dataVisitors.push([totalVisitorsPageView.date, totalVisitorsPageView.visitors]);
        dataPageViews.push([totalVisitorsPageView.date, totalVisitorsPageView.pageViews]);
    });

    var myChart = Highcharts.chart({
        chart: {
            type: 'spline',
            renderTo: 'totalVisitorsPageViews'
        },
        title: {
            text: 'Total PageViews and Visitors'
        },
        xAxis: {
            title: {
                    text: 'Date',                   
                },
            type: 'datetime',
            crosshair: true,
        },
        yAxis: {
            title: {
                text: 'Counts'
            },
            crosshair: true,
        },
        series: [{
            name: 'PageViews',
            data: []
        }, {
            name: 'Visitors',
            data: []
        }]
    });

    myChart.series[0].setData(dataPageViews);
    myChart.series[1].setData(dataVisitors);
});