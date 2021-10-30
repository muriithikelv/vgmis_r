"use strict";

// Class definition
var KTWidgets = function () {
    // Statistics widgets


    // Mixed widgets
    var initMixedWidget2 = function() {
        var charts = document.querySelectorAll('.mixed-widget-2-chart');

        var color;
        var strokeColor;
        var height;
        var labelColor = KTUtil.getCssVariableValue('--bs-gray-500');
        var borderColor = KTUtil.getCssVariableValue('--bs-gray-200');
        var options;
        var chart;

        [].slice.call(charts).map(function(element) {
            height = parseInt(KTUtil.css(element, 'height'));
            color = KTUtil.getCssVariableValue('--bs-' + element.getAttribute("data-kt-color"));
            strokeColor = KTUtil.colorDarken(color, 15);

            options = {
                series: [{
                    name: 'Net Profit',
                    data: [30, 45, 32, 70, 40, 40, 40]
                }],
                chart: {
                    fontFamily: 'inherit',
                    type: 'area',
                    height: height,
                    toolbar: {
                        show: false
                    },
                    zoom: {
                        enabled: false
                    },
                    sparkline: {
                        enabled: true
                    },
                    dropShadow: {
                        enabled: true,
                        enabledOnSeries: undefined,
                        top: 5,
                        left: 0,
                        blur: 3,
                        color: strokeColor,
                        opacity: 0.5
                    }
                },
                plotOptions: {},
                legend: {
                    show: false
                },
                dataLabels: {
                    enabled: false
                },
                fill: {
                    type: 'solid',
                    opacity: 0
                },
                stroke: {
                    curve: 'smooth',
                    show: true,
                    width: 3,
                    colors: [strokeColor]
                },
                xaxis: {
                    categories: ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug'],
                    axisBorder: {
                        show: false,
                    },
                    axisTicks: {
                        show: false
                    },
                    labels: {
                        show: false,
                        style: {
                            colors: labelColor,
                            fontSize: '12px'
                        }
                    },
                    crosshairs: {
                        show: false,
                        position: 'front',
                        stroke: {
                            color: borderColor,
                            width: 1,
                            dashArray: 3
                        }
                    }
                },
                yaxis: {
                    min: 0,
                    max: 80,
                    labels: {
                        show: false,
                        style: {
                            colors: labelColor,
                            fontSize: '12px'
                        }
                    }
                },
                states: {
                    normal: {
                        filter: {
                            type: 'none',
                            value: 0
                        }
                    },
                    hover: {
                        filter: {
                            type: 'none',
                            value: 0
                        }
                    },
                    active: {
                        allowMultipleDataPointsSelection: false,
                        filter: {
                            type: 'none',
                            value: 0
                        }
                    }
                },
                tooltip: {
                    style: {
                        fontSize: '12px',
                    },
                    y: {
                        formatter: function (val) {
                            return "$" + val + " thousands"
                        }
                    },
                    marker: {
                        show: false
                    }
                },
                colors: ['transparent'],
                markers: {
                    colors: [color],
                    strokeColor: [strokeColor],
                    strokeWidth: 3
                }
            };

            chart = new ApexCharts(element, options);
            chart.render();
        });
    }



    // Public methods
    return {
        init: function () {
            // Statistics widgets

            // Charts widgets

            // Mixed widgets
            initMixedWidget2();
            // Feeds

            // Follow button
        }
    }
}();

// Webpack support
if (typeof module !== 'undefined') {
    module.exports = KTWidgets;
}

// On document ready
KTUtil.onDOMContentLoaded(function() {
    KTWidgets.init();
});
