/**
 * GA - Resources/Assets/js/gaTopCountries.js
 *
 * @author: tuanha
 * @last-mod: 25/06/2017
 */
 $(function () {
    Highcharts.createElement('link', {
            href: 'https://fonts.googleapis.com/css?family=Dosis:400,600',
            rel: 'stylesheet',
            type: 'text/css'
    }, null, document.getElementsByTagName('head')[0]);

    Highcharts.theme = {
        colors: ['#7cb5ec', '#f7a35c', '#90ee7e', '#7798BF', '#aaeeee', '#ff0066', '#eeaaee',
                '#55BF3B', '#DF5353', '#7798BF', '#aaeeee'],
        chart: {
            backgroundColor: null,
            style: {
                fontFamily: 'Dosis, sans-serif'
            }
        },
        title: {
            style: {
                fontSize: '16px',
                fontWeight: 'bold',
                textTransform: 'uppercase'
            }
        },
        tooltip: {
            borderWidth: 0,
            backgroundColor: 'rgba(219,219,216,0.8)',
            shadow: false
        },
        legend: {
            itemStyle: {
                fontWeight: 'bold',
                fontSize: '13px'
            }
        },
        xAxis: {
            gridLineWidth: 1,
            labels: {
                style: {
                    fontSize: '12px'
                }
            }
        },
        yAxis: {
            minorTickInterval: 'auto',
            title: {
                style: {
                    textTransform: 'uppercase'
                }
            },
            labels: {
                style: {
                    fontSize: '12px'
                }
            }
        },
        plotOptions: {
            candlestick: {
                lineColor: '#404048'
            }
        },
        background2: '#F0F0EA'
    };

    Highcharts.setOptions(Highcharts.theme);

    Highcharts.setOptions({
        global: {
            useUTC: useUTC,
        }
    });

    var dataCountries = [];
    var dataSessions = [];

    $.each(topCountries, function(index, topCountry){
        dataCountries.push(topCountry[0]);
        dataSessions.push(parseInt(topCountry[1], 10));
    });

    var myChart = Highcharts.chart({
        chart: {
            type: 'bar',
            renderTo: 'topCountries'
        },
        title: {
            text: 'Top visiting countries'
        },
        xAxis: {
            categories: dataCountries,
            crosshair: true,
        },
        yAxis: {
            title: {
                text: 'Number of sessions'
            },
            crosshair: true,
        },
        series: [{
            name: 'Vistited',
            data: []
        }]
    });
    
    myChart.series[0].setData(dataSessions);
});