"use strict";
$(document).ready(function () {
    /* chart js charts   */
    var ctx2 = document.getElementById("linechart2").getContext('2d');
    var gradient3 = ctx2.createLinearGradient(0, 0, 0, 250);
    gradient3.addColorStop(0, 'rgb(121, 13, 229)');
    gradient3.addColorStop(1, 'rgba(255,255,255,0.0)');

    var myChart2 = new Chart(ctx2, {
        type: 'line',
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep"],
            datasets: [{
                label: ' Used MB',
                backgroundColor: gradient3,
                data: [59, 60, 71, 56, 55, 40, 65, 59, 60, 71, 56, 55, 40, 65],
                borderColor: "#7b65f4",
                borderCapStyle: 'butt',
                borderDash: [],
                borderWidth: 2,
                borderDashOffset: 1,
                borderJoinStyle: 'bevel',
                pointBorderColor: "#ffffff",
                pointBackgroundColor: "#7b65f4",
                pointBorderWidth: 1,
                pointHoverRadius: 4,
                pointHoverBackgroundColor: "#000000",
                pointHoverBorderColor: "#ffffff",
                pointHoverBorderWidth: 0,
                pointRadius: 4,
                pointHitRadius: 10,
        }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            title: {
                display: false,
                text: 'Chart.js  Line Chart',
            },
            legend: {
                display: false,
                labels: {
                    fontColor: "#888888"
                }
            },
            scales: {
                yAxes: [{
                    ticks: {
                        fontColor: "#888888",
                        beginAtZero: false,
                    },
                    gridLines: {
                        color: "rgba(160,160,160,0.1",
                        zeroLineColor: "rgba(160,160,160,0.15)"
                    }
                }],
                xAxes: [{
                    ticks: {
                        fontColor: "#888888"
                    },
                    gridLines: {
                        color: "rgba(160,160,160,0.1)",
                        zeroLineColor: "rgba(160,160,160,0.15)"
                    }
                }]
            },
            layout: {
                padding: {
                    left: 0,
                    right: 0,
                    top: 0,
                    bottom: 0
                }
            }
        }
    });

    /* circular progress */
    $('.progress-success').circleProgress({
        fill: '#00ca47',
        lineCap: 'butt'
    }).on('circle-animation-progress', function (event, progress, stepValue) {
        $(this).find('strong').html(Math.round(100 * progress * stepValue) + '<i>%</i>');
    });

    $('.progress-danger').circleProgress({
        fill: '#fe656f',
    }).on('circle-animation-progress', function (event, progress, stepValue) {
        $(this).find('strong').html(Math.round(100 * progress * stepValue) + '<i>%</i>');
    });

    $('.progress-warning').circleProgress({
        fill: '#ffb400',
        lineCap: 'butt'
    }).on('circle-animation-progress', function (event, progress, stepValue) {
        $(this).find('strong').html(Math.round(100 * progress * stepValue) + '<i>%</i>');
    });

    $('.progress-primary').circleProgress({
        fill: '#4690ff',
        lineCap: 'butt'
    }).on('circle-animation-progress', function (event, progress, stepValue) {
        $(this).find('strong').html(Math.round(100 * progress * stepValue) + '<i>%</i>');
    });

    function donutchart() {
        var ctx3 = document.getElementById("donutchart-area").getContext("2d");
        window.myDoughnut = new Chart(ctx3, {
            type: 'doughnut',
            data: {
                datasets: [{
                    data: [
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                ],
                    backgroundColor: [
                    '#7b65f4',
                    '#00ceff',
                    '#00ca47',
                    '#fc4141',
                    '#e430ad',
                ],
                    label: 'Dataset 1'
            }],
                labels: [
                "Purple",
                "Skyblue",
                "Green",
                "Red",
                "Pink"
            ]
            },
            options: {
                responsive: true,
                legend: {
                    display: false,
                    position: 'top',
                },
                title: {
                    display: false,
                    text: 'Chart.js Doughnut Chart'
                },
                animation: {
                    animateScale: true,
                    animateRotate: true
                }
            }
        });

        setInterval(function () {
            myDoughnut.data.datasets.forEach(function (dataset) {
                dataset.data = dataset.data.map(function () {
                    return randomScalingFactor();
                });
            });
            window.myDoughnut.update();
        }, 2000);


    }
    donutchart();

    /* footable  */
    $(".footable").footable({
        "paging": {
            "enabled": true,
            "limit": 4,
            "position": "right",
            "size": 5
        }
    });

    /* datepicker   */
    $('.datepicker').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        minYear: 1901
    }, function (start, end, label) {});

    /* vector map world  */
    var gdpData = {
        "AF": 16.63,
        "AL": 11.58,
        "AU": 158.97,
        "IN": 100.97,
    };

    $('#mapwrap2').vectorMap({
        map: 'world_mill',
        focusOn: {
            x: 0.65,
            y: 0.48,
            scale: 5
        },
        backgroundColor: 'transparent',
        regionStyle: {
            initial: {
                fill: '#76e5ff'
            }
        },
        series: {
            regions: [{
                values: gdpData,
                scale: ['#00ceff', '#7b65f4'],
                normalizeFunction: 'polynomial'
                }]
        },
        onRegionTipShow: function (e, el, code) {
            el.html(el.html() + ' (GDP - ' + gdpData[code] + ')');
        }
    });
    /* vector map uae  */
    $('#mapusawrap').vectorMap({
        map: 'us_aea',
        regionStyle: {
            initial: {
                fill: '#7b65f4'
            }
        },
        backgroundColor: 'transparent',
    });
});
