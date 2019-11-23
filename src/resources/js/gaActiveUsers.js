/**
 * GA - Resources/Assets/js/gaActiveUsers.js
 *
 * @author: tuanha
 * @last-mod: 01/07/2017
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

    var data1DayUsers = [];
    $.each(oneDayActiveUsers, function(index, oneDayActiveUser){
        data1DayUsers.push([
            oneDayActiveUser[0], 
            parseInt(oneDayActiveUser[1])
        ]);
    });

    var data7DayUsers = [];
    $.each(oneWeekActiveUsers, function(index, oneWeekActiveUser){
        data7DayUsers.push([
            oneWeekActiveUser[0], 
            parseInt(oneWeekActiveUser[1])
        ]);
    });

    var data30DayUsers = [];
    $.each(oneMonthActiveUsers, function(index, oneMonthActiveUser){
        data30DayUsers.push([
            oneMonthActiveUser[0], 
            parseInt(oneMonthActiveUser[1])
        ]);
    });

    var myChart = Highcharts.chart({
        chart: {
            type: 'spline',
            renderTo: 'activeUsers'
        },
        title: {
            text: 'Active users'
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
            name: '1-day active users',
            data: []
        }, {
            name: '7-day active users',
            data: [] 
        }, {
            name: '30-day active users',
            data: []
        }]
    });
    myChart.series[0].setData(data1DayUsers);
    myChart.series[1].setData(data7DayUsers);
    myChart.series[2].setData(data30DayUsers);
});