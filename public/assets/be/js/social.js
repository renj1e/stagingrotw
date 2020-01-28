"use strict";
$(document).ready(function () {
    /* chart js charts   */
    var ctx = document.getElementById("linechart").getContext('2d');

    var gradient2 = ctx.createLinearGradient(0, 0, 0, 300);
    gradient2.addColorStop(0, 'rgba(13,208,229,1)');
    gradient2.addColorStop(1, 'rgba(255,255,255,0.0)');

    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep"],
            datasets: [{
                label: ' Used MB',
                backgroundColor: gradient2,
                data: [65, 59, 60, 71, 56, 55, 40, 65, 59, 60, 71, 56, 55, 40],
                borderColor: "rgba(13,208,229,1)",
                borderCapStyle: 'butt',
                borderDash: [],
                borderWidth: 2,
                borderDashOffset: 1,
                borderJoinStyle: 'bevel',
                pointBorderColor: "#ffffff",
                pointBackgroundColor: "#7b65f4",
                pointBorderWidth: 3,
                pointHoverRadius: 6,
                pointHoverBackgroundColor: "#000000",
                pointHoverBorderColor: "#ffffff",
                pointHoverBorderWidth: 0,
                pointRadius: 6,
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
                        beginAtZero: true,
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


    /* datepicker   */
    $('.datepicker').daterangepicker({
        showDropdowns: true,
        minYear: 1901
    }, function (start, end, label) {});

    /* footable  */
    $(".footable").footable({
        "paging": {
            "enabled": true,
            "limit": 4,
            "position": "right",
            "size": 5
        }
    });

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
                fill: 'rgba(118, 229, 255, 0.5)'
            }
        },
        series: {
            regions: [{
                values: gdpData,
                scale: ['#ffffff', '#0dd0e5'],
                normalizeFunction: 'polynomial'
                }]
        },
        onRegionTipShow: function (e, el, code) {
            el.html(el.html() + ' (GDP - ' + gdpData[code] + ')');
        }
    });
});
