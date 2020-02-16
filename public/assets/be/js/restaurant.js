/* chart js charts   */



// var ctx3 = document.getElementById('charttime').getContext('2d');
// var gradient4 = ctx3.createLinearGradient(0, 0, 0, 350);
// gradient4.addColorStop(0, '#ff4e00');
// gradient4.addColorStop(1, 'rgba(255,255,255,0.0)');
// var myLineChart = new Chart(ctx3, {
//     type: 'line',
//     data: {
//         labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun"],
//         datasets: [{
//             label: '',
//             data: [59, 60, 71, 56, 55, 40, 65, 59, 60, 71, 56, 55, 40, 65],
//             borderColor: "#ff9300",
//             backgroundColor: gradient4,
//             borderDash: [],
//             borderWidth: 2,
//             borderDashOffset: 1,
//             borderJoinStyle: 'miter',
//             pointBorderColor: "#ffffff",
//             pointBackgroundColor: "#ff9300",
//             pointBorderWidth: 1,
//             pointHoverRadius: 2,
//             pointHoverBackgroundColor: "#000000",
//             pointHoverBorderColor: "#ffffff",
//             pointHoverBorderWidth: 0,
//             pointRadius: 2,
//             pointHitRadius: 10,
//             lineTension: 0
//         }]
//     },
//     options: {
//         responsive: true,
//         maintainAspectRatio: false,
//         title: {
//             display: false,
//             text: 'Chart.js  Line Chart',
//         },
//         legend: {
//             display: false,
//             labels: {
//                 fontColor: "#ffffff"
//             }
//         },
//         scales: {
//             yAxes: [{
//                 ticks: {
//                     fontColor: "rgba(255,255,255,0.5)",
//                     beginAtZero: true,
//                 },
//                 gridLines: {
//                     color: "rgba(255,255,255,0.1)",
//                     zeroLineColor: "rgba(255,255,255,0.15)"
//                 }
//                 }],
//             xAxes: [{
//                 ticks: {
//                     fontColor: "rgba(255,255,255,0.5)",
//                 },
//                 gridLines: {
//                     color: "rgba(255,255,255,0.1)",
//                     zeroLineColor: "rgba(255,255,255,0.15)"
//                 }
//                 }]
//         },
//         layout: {
//             padding: {
//                 left: 0,
//                 right: 0,
//                 top: 0,
//                 bottom: 0
//             }
//         }
//     }
// });

/* footable  */
$(".footable").footable({
    "paging": {
        "enabled": true,
        "limit": 4,
        "position": "right",
        "size": 6
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

// $('#mapwrap2').vectorMap({
//     map: 'world_mill',
//     focusOn: {
//         x: 0.65,
//         y: 0.48,
//         scale: 5
//     },
//     backgroundColor: 'transparent',
//     regionStyle: {
//         initial: {
//             fill: 'rgba(255, 137, 0, 0.6)'
//         }
//     },
//     series: {
//         regions: [{
//             values: gdpData,
//             scale: ['#ff9d00', '#ff0000'],
//             normalizeFunction: 'polynomial'
//                 }]
//     },
//     onRegionTipShow: function (e, el, code) {
//         el.html(el.html() + ' (GDP - ' + gdpData[code] + ')');
//     }
// });
/* vector map uae  */
$('#mapusawrap').vectorMap({
    map: 'us_aea',
    regionStyle: {
        initial: {
            fill: '#ff3b00'
        }
    },
    backgroundColor: 'transparent',
});
